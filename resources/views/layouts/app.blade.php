<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    <!-- ✅ Navigasi admin -->
    <nav class="bg-white shadow mb-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-gray-800 hover:text-blue-600">Dashboard</a>
                    <a href="{{ route('products.index') }}" class="text-gray-800 hover:text-blue-600">Produk</a>
                    <a href="{{ route('categories.index') }}" class="text-gray-800 hover:text-blue-600">Kategori</a>
                    <a href="{{ route('orders.index') }}" class="text-gray-800 hover:text-blue-600">Pesanan</a>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-600 hover:text-red-800">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- ✅ Kontainer utama -->
    <div class="min-h-screen bg-gray-100">
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Konten halaman -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>

@if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

</html>
