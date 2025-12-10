<!-- Redesigned edit product form with modern styling and improved layout -->
@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="rounded-2xl p-8" style="background: linear-gradient(135deg, #ffffff 0%, #faf8f5 100%); border: 1px solid #e8e4df; box-shadow: 0 8px 24px rgba(30, 27, 24, 0.1);">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold" style="color: #1e1b18;">Edit Produk</h2>
            <p class="mt-2 text-base" style="color: #8b7f78;">Perbarui informasi produk yang sudah ada</p>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Nama Produk -->
            <div>
                <label class="block font-semibold mb-2" style="color: #1e1b18;">Nama Produk</label>
                <input type="text" name="nama_produk" value="{{ old('nama_produk', $product->nama_produk) }}" class="w-full rounded-xl p-3 transition-all" style="background-color: #f5f3f0; border: 1px solid #e8e4df; color: #1e1b18;" onmouseover="this.style.borderColor='#2d7a6f'" onmouseout="this.style.borderColor='#e8e4df'" onfocus="this.style.borderColor='#2d7a6f'; this.style.background='#ffffff'" onblur="this.style.borderColor='#e8e4df'; this.style.background='#f5f3f0'">
                @error('nama_produk') <p class="text-sm mt-1" style="color: #dc4a3c;">{{ $message }}</p> @enderror
            </div>

            <!-- Stok Produk -->
            <div>
                <label class="block font-semibold mb-2" style="color: #1e1b18;">Stok Produk</label>
                <input type="number" name="stok" value="{{ old('stok', $product->stok) }}" class="w-full rounded-xl p-3 transition-all" style="background-color: #f5f3f0; border: 1px solid #e8e4df; color: #1e1b18;" onmouseover="this.style.borderColor='#2d7a6f'" onmouseout="this.style.borderColor='#e8e4df'" onfocus="this.style.borderColor='#2d7a6f'; this.style.background='#ffffff'" onblur="this.style.borderColor='#e8e4df'; this.style.background='#f5f3f0'">
                @error('stok') <p class="text-sm mt-1" style="color: #dc4a3c;">{{ $message }}</p> @enderror
            </div>

            <!-- Kategori Produk -->
            <div>
                <label class="block font-semibold mb-2" style="color: #1e1b18;">Kategori</label>
                <input type="text" name="kategori" value="{{ old('kategori', $product->kategori) }}" class="w-full rounded-xl p-3 transition-all" style="background-color: #f5f3f0; border: 1px solid #e8e4df; color: #1e1b18;" onmouseover="this.style.borderColor='#2d7a6f'" onmouseout="this.style.borderColor='#e8e4df'" onfocus="this.style.borderColor='#2d7a6f'; this.style.background='#ffffff'" onblur="this.style.borderColor='#e8e4df'; this.style.background='#f5f3f0'">
                @error('kategori') <p class="text-sm mt-1" style="color: #dc4a3c;">{{ $message }}</p> @enderror
            </div>

            <!-- Gambar Produk -->
            <div>
                <label class="block font-semibold mb-2" style="color: #1e1b18;">Gambar Produk</label>
                <input type="file" name="gambar" id="gambarInput" class="w-full rounded-xl p-3 transition-all" style="background-color: #f5f3f0; border: 1px solid #e8e4df; color: #1e1b18;" onmouseover="this.style.borderColor='#2d7a6f'" onmouseout="this.style.borderColor='#e8e4df'" onfocus="this.style.borderColor='#2d7a6f'; this.style.background='#ffffff'" onblur="this.style.borderColor='#e8e4df'; this.style.background='#f5f3f0'">

                @if($product->gambar)
                    <div class="mt-4">
                        <p class="text-sm font-medium mb-2" style="color: #1e1b18;">Gambar Lama:</p>
                        <img src="{{ asset('storage/'.$product->gambar) }}" class="w-40 h-40 object-cover rounded-xl border" style="border-color: #e8e4df;">
                    </div>
                @endif

                <!-- Preview Baru -->
                <div class="mt-4">
                    <p class="text-sm font-medium mb-2" style="color: #1e1b18;">Preview Gambar Baru:</p>
                    <img id="previewImage" class="w-40 h-40 object-cover rounded-xl border hidden" style="border-color: #e8e4df;">
                </div>
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" class="w-full py-3 rounded-xl font-semibold text-white text-center transition-all duration-200 hover:shadow-lg hover:scale-105" style="background: linear-gradient(135deg, #2d7a6f 0%, #2a6d63 100%);">
                    Update Produk
                </button>
            </div>
        </form>
    </div>
</div>

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
