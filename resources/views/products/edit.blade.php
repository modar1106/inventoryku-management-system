<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Edit Product') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('products.update', $product->id) }}">
                        @csrf @method('PUT')

                        <div>
                            <label for="sku" class="block font-medium text-sm text-gray-700">SKU Code</label>
                            <input id="sku" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="sku" value="{{ old('sku', $product->sku) }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">Product Name</label>
                            <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="name" value="{{ old('name', $product->name) }}" required />
                        </div>

                        <div class="mt-4">
                            <label for="category_id" class="block font-medium text-sm text-gray-700">Category</label>
                            <select id="category_id" name="category_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <label for="supplier_id" class="block font-medium text-sm text-gray-700">Supplier</label>
                            <select id="supplier_id" name="supplier_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="price" class="block font-medium text-sm text-gray-700">Price (Rp)</label>
                                <input id="price" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="number" name="price" value="{{ old('price', $product->price) }}" required />
                            </div>
                            <div>
                                <label for="stock" class="block font-medium text-sm text-gray-700">Stock</label>
                                <input id="stock" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="number" name="stock" value="{{ old('stock', $product->stock) }}" required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <textarea id="description" name="description" rows="3" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('products.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4 px-4">Cancel</a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900">Update Product</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>