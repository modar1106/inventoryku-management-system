<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Transaction History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <table class="mx-auto w-full divide-y divide-gray-200 rounded-lg">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Date</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Type</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Product</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Notes</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($transactions as $transaction)
                            <tr>
                                {{-- Tanggal --}}
                                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d M Y') }}
                                </td>

                                {{-- Tipe Transaksi (Badge Warna) --}}
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    @if ($transaction->type == 'in')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Stock In
                                        </span>
                                    @else
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Stock Out
                                        </span>
                                    @endif
                                </td>

                                {{-- Nama Produk --}}
                                <td class="px-6 py-4 whitespace-nowrap text-center font-medium">
                                    {{ $transaction->product->name ?? 'Product Deleted' }}
                                </td>

                                {{-- Jumlah --}}
                                <td class="px-6 py-4 whitespace-nowrap text-center font-bold {{ $transaction->type == 'in' ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $transaction->type == 'in' ? '+' : '-' }}{{ $transaction->quantity }}
                                </td>

                                {{-- Catatan --}}
                                <td class="px-6 py-4 text-center text-sm text-gray-500">
                                    {{ $transaction->notes ?? '-' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                                    No transactions found yet.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $transactions->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>