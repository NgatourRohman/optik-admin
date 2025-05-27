@extends('layouts.app')

@section('content')
    <div class="p-4 max-w-3xl mx-auto">
        <h1 class="text-2xl font-bold mb-4">Detail Pesanan</h1>

        <div class="bg-white p-4 rounded shadow">
            <p><strong>Nama Pelanggan:</strong> {{ $order->customer_name }}</p>
            <p><strong>Alamat:</strong> {{ $order->customer_address }}</p>
            <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            <p><strong>Total:</strong> Rp {{ number_format($order->total_price) }}</p>
        </div>

        <h2 class="text-xl font-semibold mt-6 mb-2">Item Pesanan</h2>
        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Produk</th>
                    <th class="p-2 border">Qty</th>
                    <th class="p-2 border">Harga Satuan</th>
                    <th class="p-2 border">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr class="border-t">
                        <td class="p-2 border">{{ $item->product->name }}</td>
                        <td class="p-2 border">{{ $item->quantity }}</td>
                        <td class="p-2 border">Rp {{ number_format($item->price) }}</td>
                        <td class="p-2 border">Rp {{ number_format($item->price * $item->quantity) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-xl font-semibold mt-6 mb-2">Ubah Status</h2>
        <form action="{{ route('orders.update', $order) }}" method="POST" class="flex items-center space-x-4">
            @csrf
            @method('PUT')
            <select name="status" class="border p-2 rounded">
                <option value="baru" {{ $order->status == 'baru' ? 'selected' : '' }}>Baru</option>
                <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
        </form>


        <div class="mt-4">
            <a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">← Kembali ke daftar pesanan</a>
        </div>
    </div>
@endsection
