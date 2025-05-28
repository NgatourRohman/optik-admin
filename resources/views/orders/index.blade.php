<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Daftar Pesanan</h1>
    </x-slot>

    <div class="p-4">
        <a href="{{ route('orders.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">+ Buat Pesanan</a>

        <table class="w-full border">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-2 border">Nama Pelanggan</th>
                    <th class="p-2 border">Alamat</th>
                    <th class="p-2 border">Status</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="border-t">
                        <td class="p-2 border">{{ $order->customer_name }}</td>
                        <td class="p-2 border">{{ $order->customer_address }}</td>
                        <td class="p-2 border">{{ ucfirst($order->status) }}</td>
                        <td class="p-2 border">Rp {{ number_format($order->total_price) }}</td>
                        <td class="p-2 border">
                            <a href="{{ route('orders.show', $order) }}" class="text-blue-600 hover:underline">Lihat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
