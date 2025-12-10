@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header Section -->
    <div class="mb-12">
        <h2 class="text-4xl font-bold" style="color: #1e1b18; letter-spacing: -0.5px;">Selamat Datang, {{ Auth::user()->name }}</h2>
        <p class="mt-2 text-lg" style="color: #8b7f78;">Kelola data produk dan peminjaman Anda dengan mudah</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <!-- Stat Card 1 -->
        <div class="rounded-2xl p-8" style="background: linear-gradient(135deg, #ffffff 0%, #faf8f5 100%); border: 1px solid #e8e4df; box-shadow: 0 4px 16px rgba(30, 27, 24, 0.06);">
            <div style="color: #8b7f78;" class="text-sm font-medium">Total Produk</div>
            <div class="mt-3">
                <div class="text-3xl font-bold" style="color: #1e1b18;">{{ $productCount ?? 0 }}</div>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="rounded-2xl p-8" style="background: linear-gradient(135deg, #ffffff 0%, #faf8f5 100%); border: 1px solid #e8e4df; box-shadow: 0 4px 16px rgba(30, 27, 24, 0.06);">
            <div style="color: #8b7f78;" class="text-sm font-medium">Peminjaman Aktif</div>
            <div class="mt-3">
                <div class="text-3xl font-bold" style="color: #1e1b18;">{{ $borrowCount ?? 0 }}</div>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="rounded-2xl p-8" style="background: linear-gradient(135deg, #2d7a6f 0%, #2a6d63 100%); border: 1px solid rgba(45, 122, 111, 0.2); box-shadow: 0 4px 16px rgba(45, 122, 111, 0.2);">
            <div class="text-sm font-medium text-white opacity-90">Status Sistem</div>
            <div class="mt-3">
                <div class="text-3xl font-bold text-white">Aktif</div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="rounded-2xl p-8 mb-12" style="background: linear-gradient(135deg, #ffffff 0%, #faf8f5 100%); border: 1px solid #e8e4df; box-shadow: 0 4px 16px rgba(30, 27, 24, 0.06);">
        <h3 class="text-lg font-bold mb-6" style="color: #1e1b18;">Aksi Cepat</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <a href="{{ route('products.create') }}" class="px-6 py-3 rounded-xl font-medium text-white text-center transition-all duration-200 hover:shadow-lg hover:scale-105" style="background: linear-gradient(135deg, #2d7a6f 0%, #2a6d63 100%);">
                Tambah Produk Baru
            </a>
            <a href="{{ route('form.index') }}" class="px-6 py-3 rounded-xl font-medium text-center transition-all duration-200 hover:shadow-lg hover:scale-105" style="background: rgba(45, 122, 111, 0.1); color: #2d7a6f; border: 1px solid rgba(45, 122, 111, 0.2);">
                Lihat Daftar Peminjam
            </a>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="rounded-2xl p-8" style="background: linear-gradient(135deg, #ffffff 0%, #faf8f5 100%); border: 1px solid #e8e4df; box-shadow: 0 4px 16px rgba(30, 27, 24, 0.06);">
        <h3 class="text-lg font-bold mb-6" style="color: #1e1b18;">Produk Terbaru</h3>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr style="border-bottom: 1px solid #e8e4df;">
                        <th class="text-left py-3 px-4 font-semibold" style="color: #8b7f78;">Nama Produk</th>
                        <th class="text-left py-3 px-4 font-semibold" style="color: #8b7f78;">Kategori</th>
                        <th class="text-left py-3 px-4 font-semibold" style="color: #8b7f78;">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Added loop to display actual products from database -->
                    @forelse($products ?? [] as $product)
                        <tr style="border-bottom: 1px solid #e8e4df;">
                            <td class="py-3 px-4" style="color: #1e1b18;">{{ $product->nama_produk }}</td>
                            <td class="py-3 px-4" style="color: #6b6056;">{{ $product->kategori }}</td>
                            <td class="py-3 px-4" style="color: #1e1b18;">{{ $product->stok }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-3 px-4" style="color: #a89f96;">Belum ada produk</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
