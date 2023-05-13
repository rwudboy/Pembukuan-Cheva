<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_pinjam extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $fillable = [
        'barang_masuk_id';
        'keterangan';
        'status';
        'stok_pinjam';
        'tanggal_pinjam';
        'tanggal_pengembaian';
    ];
}
