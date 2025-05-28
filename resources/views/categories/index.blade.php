<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-bold">Manajemen Kategori</h1>
    </x-slot>

    <div class="p-4 max-w-xl mx-auto">
        <form action="{{ route('categories.store') }}" method="POST" class="flex gap-2 mb-6">
            @csrf
            <input name="name" class="border p-2 w-full rounded" placeholder="Nama kategori" required>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah</button>
        </form>

        <table class="w-full border">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="p-2 border">{{ $category->name }}</td>
                        <td class="p-2 border">
                            <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
