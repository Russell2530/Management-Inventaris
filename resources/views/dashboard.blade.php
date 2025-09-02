@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
<div class="max-w-6xl mx-auto mt-10">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl text-white font-bold">Daftar Produk</h1>
        <a href="{{ route('products.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">
            + Tambah Produk
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse bg-white shadow rounded-xl overflow-hidden">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left">#</th>
                <th class="p-3 text-left">Nama Produk</th>
                <th class="p-3 text-left">Stok</th>
                <th class="p-3 text-left">Kategori</th>
                <th class="p-3 text-left">Gambar</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr class="border-t">
                <td class="p-3">{{ $loop->iteration }}</td>
                <td class="p-3">{{ $product->nama_produk }}</td>
                <td class="p-3">{{ $product->stok }}</td>
                <td class="p-3">{{ $product->kategori }}</td>
                <td class="p-3">
                    @if($product->gambar)
                        <img src="{{ asset('storage/'.$product->gambar) }}" class="w-16 h-16 object-cover rounded">
                    @else
                        <span class="text-gray-500">-</span>
                    @endif
                </td>
                <td class="p-3 text-center flex gap-2 justify-center">
                    <a href="{{ route('products.edit', $product->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="px-3 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center p-4 text-gray-500">Belum ada produk</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection
