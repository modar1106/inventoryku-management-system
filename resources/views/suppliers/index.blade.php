<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Suppliers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{-- Pesan Sukses --}}
                    @if (session('success'))
                        <div class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-green-100 p-4">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-700">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    @endif

                        <a href="{{ route('suppliers.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 mb-4">
                            Add New Supplier
                        </a>

                    {{-- Tabel --}}
                    <table class="mx-auto w-full divide-y divide-gray-200 rounded-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Person</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Address</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($suppliers as $supplier)    
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{  $supplier->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{  $supplier->contact_person }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{  $supplier->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{  $supplier->address }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    {{-- Tombol Action (Di Tengah) --}}
                                    <div class="flex items-center justify-center gap-x-4">
                                        
                                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="text-indigo-600 hover:text-indigo-900 px-2">
                                            Edit
                                        </a>
                                        
                                        <form action="{{ route('suppliers.destroy', $supplier->id) }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Are you sure you want to delete this supplier?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" style="background: none; border: none; padding: 0; cursor: pointer;">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                                    No Suppliers Found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $suppliers->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>