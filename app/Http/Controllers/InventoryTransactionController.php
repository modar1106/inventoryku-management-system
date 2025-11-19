<?php

namespace App\Http\Controllers;

use App\Models\InventoryTransaction;
use App\Models\Product;
use Illuminate\Http\Request;

class InventoryTransactionController extends Controller
{
    public function index()
        {
            $transactions = InventoryTransaction::with('product')->latest()->paginate(20);

            return view('transactions.index', compact('transactions'));
        }
    public function createStockIn()
    {
        $products = Product::orderBy('name', 'asc')->get();
        
        return view('transactions.stock_in', compact('products'));
    }

    public function storeStockIn(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'transaction_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        InventoryTransaction::create([
            'product_id' => $request->product_id,
            'type' => 'in', // Hardcode 'in' karena ini fitur barang masuk
            'quantity' => $request->quantity,
            'transaction_date' => $request->transaction_date,
            'notes' => $request->notes,
        ]);

        $product = Product::findOrFail($request->product_id);
        $product->increment('stock', $request->quantity);

        return redirect()->route('products.index') // Redirect ke daftar produk
                         ->with('success', 'Stock added successfully! Inventory updated.');
    }

    public function createStockOut()
    {
        // Ambil produk yang stoknya > 0 saja (biar dropdown rapi)
        $products = Product::where('stock', '>', 0)->orderBy('name', 'asc')->get();
        
        return view('transactions.stock_out', compact('products'));
    }

    public function storeStockOut(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'transaction_date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return back()->withErrors([
                'quantity' => 'Stock insufficient! Current stock is only ' . $product->stock
            ])->withInput();
        }

        InventoryTransaction::create([
            'product_id' => $request->product_id,
            'type' => 'out', // Tipe Keluar
            'quantity' => $request->quantity,
            'transaction_date' => $request->transaction_date,
            'notes' => $request->notes,
        ]);

        $product->decrement('stock', $request->quantity);

        return redirect()->route('products.index')
                         ->with('success', 'Stock removed successfully.');
    }
}