@extends('layouts.app')

@section('content')
    <div class="p-4">
        <h1 class="text-xl font-bold mb-4">Daftar Produk</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Produk</a>

        <table class="w-full mt-4 border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="p-2">Nama</th>
                    <th class="p-2">Harga</th>
                    <th class="p-2">Stok</th>
                    <th class="p-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="border-t">
                        <td class="p-2">{{ $product->name }}</td>
                        <td class="p-2">Rp {{ number_format($product->price) }}</td>
                        <td class="p-2">{{ $product->stock }}</td>
                        <td class="p-2">
                            <a href="{{ route('products.edit', $product) }}" class="text-blue-600">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
