<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-green-100 p-4">
                             <p class="text-sm font-medium text-green-700">{{ session('success') }}</p>
                        </div>
                    @endif

                        <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mb-4">
                            Add New Product
                        </a>

                    <table class="mx-auto w-full divide-y divide-gray-200 rounded-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">SKU</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Name</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Category</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Supplier</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Price</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Stock</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($products as $product)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $product->sku }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center font-bold">{{ $product->name }}</td>
                                {{-- Mengambil nama dari relasi --}}
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $product->category->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $product->supplier->name }}</td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-center">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $product->stock > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center justify-center gap-x-4">
                                        <a href="{{ route('products.edit', $product->id) }}" class="text-indigo-600 hover:text-indigo-900 px-2">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" style="background: none; border: none; padding: 0; cursor: pointer;">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="px-6 py-4 text-center text-gray-500">No Products Found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="mt-4">{{ $products->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>