<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category; // Import model Category
use App\Models\Supplier; // Import model Supplier
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // "with" digunakan untuk Eager Loading (mengambil data relasi sekaligus biar cepat)
        $products = Product::with(['category', 'supplier'])->latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        // Kita butuh data ini untuk Dropdown Menu
        $categories = Category::all();
        $suppliers = Supplier::all();
        
        return view('products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products', // SKU harus unik
            'category_id' => 'required|exists:categories,id', // Pastikan ID kategori ada
            'supplier_id' => 'required|exists:suppliers,id', // Pastikan ID supplier ada
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        Product::create($validatedData);

        return redirect()->route('products.index')
                         ->with('success', 'Product created successfully!');
    }

    public function edit(Product $product)
    {
        // Kita juga butuh data dropdown saat edit
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'sku' => 'required|string|max:100|unique:products,sku,' . $product->id, // Pengecualian unik untuk diri sendiri
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')
                         ->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')
                         ->with('success', 'Product deleted successfully.');
    }
}