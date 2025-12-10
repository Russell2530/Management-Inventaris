<!-- Redesigned form with modern card layout and improved typography -->
@extends('layouts.app')

@section('title', 'Form Peminjaman')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-12">
    <div class="rounded-2xl p-8" style="background: linear-gradient(135deg, #ffffff 0%, #faf8f5 100%); border: 1px solid #e8e4df; box-shadow: 0 8px 24px rgba(30, 27, 24, 0.1);">
        <!-- Header -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold" style="color: #1e1b18;">Form Peminjaman</h2>
            <p class="mt-2 text-base" style="color: #8b7f78;">Isi formulir di bawah untuk meminjam barang</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl border-l-4" style="background: rgba(45, 122, 111, 0.05); border-color: #2d7a6f; color: #2d7a6f;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('form.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Nama Barang -->
            <div>
                <label class="block font-semibold mb-2" style="color: #1e1b18;">Nama Barang</label>
                <input type="text" name="nama_produk" class="w-full rounded-xl p-3 transition-all" style="background-color: #f5f3f0; border: 1px solid #e8e4df; color: #1e1b18;" placeholder="Masukkan nama barang" onmouseover="this.style.borderColor='#2d7a6f'" onmouseout="this.style.borderColor='#e8e4df'" onfocus="this.style.borderColor='#2d7a6f'; this.style.background='#ffffff'" onblur="this.style.borderColor='#e8e4df'; this.style.background='#f5f3f0'">
                @error('nama_produk') <p class="text-sm mt-1" style="color: #dc4a3c;">{{ $message }}</p> @enderror
            </div>

            <!-- Nama Peminjam -->
            <div>
                <label class="block font-semibold mb-2" style="color: #1e1b18;">Nama Peminjam</label>
                <input type="text" name="nama_peminjam" class="w-full rounded-xl p-3 transition-all" style="background-color: #f5f3f0; border: 1px solid #e8e4df; color: #1e1b18;" placeholder="Masukkan nama peminjam" onmouseover="this.style.borderColor='#2d7a6f'" onmouseout="this.style.borderColor='#e8e4df'" onfocus="this.style.borderColor='#2d7a6f'; this.style.background='#ffffff'" onblur="this.style.borderColor='#e8e4df'; this.style.background='#f5f3f0'">
                @error('nama_peminjam') <p class="text-sm mt-1" style="color: #dc4a3c;">{{ $message }}</p> @enderror
            </div>

            <!-- Tanggal Pinjam -->
            <div>
                <label class="block font-semibold mb-2" style="color: #1e1b18;">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="w-full rounded-xl p-3 transition-all" style="background-color: #f5f3f0; border: 1px solid #e8e4df; color: #1e1b18;" onmouseover="this.style.borderColor='#2d7a6f'" onmouseout="this.style.borderColor='#e8e4df'" onfocus="this.style.borderColor='#2d7a6f'; this.style.background='#ffffff'" onblur="this.style.borderColor='#e8e4df'; this.style.background='#f5f3f0'">
                @error('tanggal_pinjam') <p class="text-sm mt-1" style="color: #dc4a3c;">{{ $message }}</p> @enderror
            </div>

            <!-- Tanggal Kembali -->
            <div>
                <label class="block font-semibold mb-2" style="color: #1e1b18;">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="w-full rounded-xl p-3 transition-all" style="background-color: #f5f3f0; border: 1px solid #e8e4df; color: #1e1b18;" onmouseover="this.style.borderColor='#2d7a6f'" onmouseout="this.style.borderColor='#e8e4df'" onfocus="this.style.borderColor='#2d7a6f'; this.style.background='#ffffff'" onblur="this.style.borderColor='#e8e4df'; this.style.background='#f5f3f0'">
                @error('tanggal_kembali') <p class="text-sm mt-1" style="color: #dc4a3c;">{{ $message }}</p> @enderror
            </div>

            <!-- Submit Button -->
            <div class="pt-4">
                <button type="submit" class="w-full py-3 rounded-xl font-semibold text-white text-center transition-all duration-200 hover:shadow-lg hover:scale-105" style="background: linear-gradient(135deg, #2d7a6f 0%, #2a6d63 100%);">
                    Kirim Permohonan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
