<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'nama_produk',
        'nama_peminjam',
        'tanggal_pinjam',
        'tanggal_kembali'
    ];
}
