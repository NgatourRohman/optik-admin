@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto mt-8">
        <h1 class="text-2xl font-bold mb-6">Edit Produk</h1>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block font-semibold">Kategori</label>
                <select name="category_id" class="w-full border p-2 rounded">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-semibold">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" class="w-full border p-2 rounded"
                    required>
            </div>

            <div>
                <label class="block font-semibold">Harga</label>
                <input type="number" name="price" value="{{ $product->price }}" class="w-full border p-2 rounded"
                    required>
            </div>

            <div>
                <label class="block font-semibold">Stok</label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border p-2 rounded"
                    required>
            </div>

            <div>
                <label class="block font-semibold">Deskripsi</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ $product->description }}</textarea>
            </div>

            <div>
                <label class="block font-semibold">Gambar Baru (opsional)</label>
                <input type="file" name="image" class="w-full border p-2 rounded">
                @if ($product->image)
                    <p class="mt-2 text-sm text-gray-600">Gambar saat ini: <img
                            src="{{ asset('storage/' . $product->image) }}" class="h-16 mt-1"></p>
                @endif
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
            </div>
        </form>
    </div>
@endsection
