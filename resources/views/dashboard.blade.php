@extends('layouts.app')

@section('content')
    <div class="p-4">
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-blue-100 p-4 rounded shadow">
                <p class="text-gray-700">Total Produk</p>
                <h2 class="text-3xl font-bold">{{ $totalProducts }}</h2>
            </div>
            <div class="bg-green-100 p-4 rounded shadow">
                <p class="text-gray-700">Total Pesanan</p>
                <h2 class="text-3xl font-bold">{{ $totalOrders }}</h2>
            </div>
            <div class="bg-red-100 p-4 rounded shadow">
                <p class="text-gray-700">Stok Habis</p>
                <h2 class="text-3xl font-bold">{{ $outOfStock }}</h2>
            </div>
        </div>
    </div>
@endsection
