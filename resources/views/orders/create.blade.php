@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Buat Pesanan Baru</h1>

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold">Nama Pelanggan</label>
                <input name="customer_name" class="border p-2 w-full rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Alamat</label>
                <textarea name="customer_address" class="border p-2 w-full rounded" required></textarea>
            </div>

            <h2 class="text-lg font-semibold mb-2">Item Pesanan</h2>
            <div id="items-wrapper">
                <div class="flex items-center space-x-4 mb-2">
                    <select name="items[0][product_id]" class="border p-2 rounded w-1/2">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }} -
                                Rp{{ number_format($product->price) }}</option>
                        @endforeach
                    </select>
                    <input type="number" name="items[0][quantity]" class="border p-2 rounded w-1/4" placeholder="Qty"
                        required>
                </div>
            </div>

            <button type="button" onclick="addItem()" class="bg-gray-300 px-3 py-1 rounded mb-4">+ Tambah Item</button>

            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan Pesanan</button>
            </div>
        </form>
    </div>

    <script>
        let itemIndex = 1;

        function addItem() {
            const wrapper = document.getElementById('items-wrapper');
            const html = `
    <div class="flex items-center space-x-4 mb-2">
      <select name="items[${itemIndex}][product_id]" class="border p-2 rounded w-1/2">
        @foreach ($products as $product)
          <option value="{{ $product->id }}">{{ $product->name }} - Rp{{ number_format($product->price) }}</option>
        @endforeach
      </select>
      <input type="number" name="items[${itemIndex}][quantity]" class="border p-2 rounded w-1/4" placeholder="Qty" required>
    </div>`;
            wrapper.insertAdjacentHTML('beforeend', html);
            itemIndex++;
        }
    </script>
@endsection
