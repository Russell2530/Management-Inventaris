@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="max-w-3xl mx-auto bg-white shadow-lg rounded-2xl p-8 mt-10">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Tambah Produk Baru</h2>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <!-- Nama Produk -->
        <div>
            <label class="block font-semibold text-gray-700">Nama Produk</label>
            <input type="text" name="nama_produk" class="w-full border rounded-xl p-3 focus:ring focus:ring-blue-400" placeholder="Masukkan nama produk">
            @error('nama_produk') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Stok Produk -->
        <div>
            <label class="block font-semibold text-gray-700">Stok Produk</label>
            <input type="number" name="stok" class="w-full border rounded-xl p-3 focus:ring focus:ring-blue-400" placeholder="Masukkan jumlah stok">
            @error('stok') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Kategori Produk -->
        <div>
            <label class="block font-semibold text-gray-700">Kategori</label>
            <input type="text" name="kategori" class="w-full border rounded-xl p-3 focus:ring focus:ring-blue-400" placeholder="Masukkan kategori barang">
            @error('kategori') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <!-- Gambar Produk + Preview -->
        <div>
            <label class="block font-semibold text-gray-700">Gambar Barang</label>
            <input type="file" name="gambar" id="gambarInput" class="w-full border rounded-xl p-3 bg-gray-50">
            @error('gambar') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror

            <!-- Preview Container -->
            <div class="mt-4">
                <p class="text-sm text-gray-500 mb-2">Preview:</p>
                <img id="previewImage" class="w-40 h-40 object-cover rounded-xl border hidden">
            </div>
        </div>

        <!-- Tombol Submit -->
        <div class="text-center">
            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-xl shadow-lg hover:bg-blue-700 transition">
                Simpan Produk
            </button>
        </div>
    </form>
</div>

<!-- Script Preview Gambar -->
<script>
    document.getElementById('gambarInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('previewImage');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = "";
            preview.classList.add('hidden');
        }
    });
</script>
@endsection
