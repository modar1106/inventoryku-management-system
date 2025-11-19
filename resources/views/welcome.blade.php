<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'InventoryKu') }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <style>
        body { font-family: 'Figtree', sans-serif; }
        .fade-in { animation: fadeIn 0.5s ease-in; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-indigo-500 selection:text-white">

        <div class="absolute top-0 right-0 p-6 w-full flex justify-end">
            @if (Route::has('login'))
                <div class="space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-indigo-600 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-indigo-600 transition">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-white bg-indigo-600 hover:bg-indigo-700 px-4 py-2 rounded-lg transition shadow-md">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="max-w-4xl mx-auto px-6 lg:px-8 flex flex-col items-center text-center fade-in">
            
            <div class="mb-8 bg-white p-4 rounded-2xl shadow-sm ring-1 ring-gray-200/50">
                <img src="{{ asset('images/inventoryku_logo.png') }}" alt="Logo" class="h-32 w-auto">
            </div>

            <h1 class="text-5xl font-extrabold tracking-tight text-gray-900 sm:text-7xl mb-4">
                Inventory<span class="text-indigo-600">Ku</span>
            </h1>

            <p class="mt-4 text-lg text-gray-600 leading-relaxed max-w-2xl">
                Sistem Manajemen Inventaris Modern. Kelola <span class="font-semibold text-gray-800">Stok Barang</span>, <span class="font-semibold text-gray-800">Supplier</span>, dan <span class="font-semibold text-gray-800">Transaksi</span> bisnis Anda dengan mudah, cepat, dan akurat dalam satu platform terintegrasi.
            </p>

            <div class="mt-10 flex gap-x-4 justify-center">
                @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-xl bg-indigo-600 px-8 py-3.5 text-base font-semibold text-white shadow-lg hover:bg-indigo-500 hover:shadow-indigo-500/30 transition-all duration-200">
                        Akses Dashboard &rarr;
                    </a>
                @else
                    <a href="{{ route('login') }}" class="rounded-xl bg-white px-8 py-3.5 text-base font-semibold text-gray-900 shadow-md ring-1 ring-inset ring-gray-300 hover:bg-gray-50 transition-all duration-200">
                        Masuk Akun
                    </a>
                    <a href="{{ route('register') }}" class="rounded-xl bg-indigo-600 px-8 py-3.5 text-base font-semibold text-white shadow-lg hover:bg-indigo-500 hover:shadow-indigo-500/30 transition-all duration-200">
                        Daftar Sekarang
                    </a>
                @endauth
            </div>

            <div class="mt-16 pt-8 border-t border-gray-200 w-full">
                <p class="text-sm text-gray-400">
                    &copy; {{ date('Y') }} InventoryKu System. Built with Laravel v{{ Illuminate\Foundation\Application::VERSION }}.
                </p>
            </div>

        </div>
    </div>
</body>
</html>