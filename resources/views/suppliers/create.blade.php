<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Supplier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="{{ route('suppliers.store') }}">
                        @csrf

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                                   type="text" name="name" value="{{ old('name') }}" required autofocus />
                        </div>

                        <div class="mt-4">
                            <label for="contact_person" class="block font-medium text-sm text-gray-700">Contact Person</label>
                            <input id="contact_person" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                                   type="text" name="contact_person" value="{{ old('contact_person') }}" />
                        </div>

                        <div class="mt-4">
                            <label for="phone" class="block font-medium text-sm text-gray-700">Phone</label>
                            <input id="phone" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                                   type="text" name="phone" value="{{ old('phone') }}" />
                        </div>

                        <div class="mt-4">
                            <label for="address" class="block font-medium text-sm text-gray-700">Address</label>
                            <textarea id="address" name="address" rows="4" 
                                      class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('address') }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('suppliers.index') }}" class="text-sm text-gray-600 hover:text-gray-900 mr-4 px-4">
                                Cancel
                            </a>
                            
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900">
                                Save Supplier
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>