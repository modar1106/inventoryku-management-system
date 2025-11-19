<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock In (Restock)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('transactions.storeStockIn') }}">
                        @csrf

                        <div>
                            <label for="product_id" class="block font-medium text-sm text-gray-700">Select Product</label>
                            <select id="product_id" name="product_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="">-- Choose Product --</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->sku }} - {{ $product->name }} (Current Stock: {{ $product->stock }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <div>
                                <label for="transaction_date" class="block font-medium text-sm text-gray-700">Date</label>
                                <input id="transaction_date" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                                       type="date" name="transaction_date" value="{{ date('Y-m-d') }}" required />
                            </div>
                            <div>
                                <label for="quantity" class="block font-medium text-sm text-gray-700">Quantity to Add</label>
                                <input id="quantity" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" 
                                       type="number" name="quantity" min="1" placeholder="e.g. 50" required />
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="notes" class="block font-medium text-sm text-gray-700">Notes (Optional)</label>
                            <textarea id="notes" name="notes" rows="3" placeholder="e.g. Restock from Supplier ABC"
                                      class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('products.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4 px-4">
                                Cancel
                            </a>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900">
                                Add Stock
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>