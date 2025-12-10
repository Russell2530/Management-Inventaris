@extends('layouts.app')

@section('title', 'Daftar Peminjam')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold" style="color: #1e1b18;">Daftar Peminjam</h1>
        <p class="mt-2 text-base" style="color: #8b7f78;">Kelola permintaan peminjaman produk</p>
    </div>

    <!-- Forms Table -->
    <div class="rounded-2xl overflow-hidden" style="background: linear-gradient(135deg, #ffffff 0%, #faf8f5 100%); border: 1px solid #e8e4df; box-shadow: 0 4px 16px rgba(30, 27, 24, 0.06);">
        <table class="w-full">
            <thead style="background-color: rgba(45, 122, 111, 0.05); border-bottom: 1px solid #e8e4df;">
                <tr>
                    <th class="p-4 text-left font-semibold" style="color: #1e1b18;">#</th>
                    <th class="p-4 text-left font-semibold" style="color: #1e1b18;">Nama Barang</th>
                    <th class="p-4 text-left font-semibold" style="color: #1e1b18;">Nama Peminjam</th>
                    <th class="p-4 text-left font-semibold" style="color: #1e1b18;">Tanggal Pinjam</th>
                    <th class="p-4 text-left font-semibold" style="color: #1e1b18;">Tanggal Kembali</th>
                    <th class="p-4 text-center font-semibold" style="color: #1e1b18;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($form as $forms)
                <tr style="border-bottom: 1px solid #e8e4df; transition: background-color 0.2s;" class="hover:bg-opacity-50 hover:bg-gray-50">
                    <td class="p-4" style="color: #8b7f78;">{{ $loop->iteration }}</td>
                    <td class="p-4 font-medium" style="color: #1e1b18;">{{ $forms->nama_produk }}</td>
                    <td class="p-4" style="color: #6b6056;">{{ $forms->nama_peminjam }}</td>
                    <td class="p-4" style="color: #1e1b18;">{{ $forms->tanggal_pinjam }}</td>
                    <td class="p-4" style="color: #1e1b18;">{{ $forms->tanggal_kembali }}</td>
                    <td class="p-4 text-center">
                        <div class="flex gap-2 justify-center">
                            <!-- Approve button with correct route update -->
                            <form action="{{ route('form.update', $forms->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PUT')
                                <button class="px-4 py-1 rounded-lg text-sm font-medium transition-all" style="background: rgba(45, 122, 111, 0.1); color: #2d7a6f; border: 1px solid rgba(45, 122, 111, 0.2);" onmouseover="this.style.background='rgba(45, 122, 111, 0.15)'" onmouseout="this.style.background='rgba(45, 122, 111, 0.1)'">Approve</button>
                            </form>
                            <!-- Decline button with correct route destroy -->
                            <form action="{{ route('form.destroy', $forms->id) }}" method="POST" onsubmit="return confirm('Yakin mau menolak?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-1 rounded-lg text-sm font-medium transition-all" style="background: rgba(220, 74, 60, 0.1); color: #dc4a3c; border: 1px solid rgba(220, 74, 60, 0.2);" onmouseover="this.style.background='rgba(220, 74, 60, 0.15)'" onmouseout="this.style.background='rgba(220, 74, 60, 0.1)'">Decline</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center p-6" style="color: #a89f96;">Belum ada permintaan peminjaman</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $form->links() }}
    </div>
</div>
@endsection
