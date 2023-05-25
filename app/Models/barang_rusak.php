<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_rusak extends Model
{
    use HasFactory;
    protected $table = 'barang_rusak';
    protected $fillable = [
        'barang_masuk_id',
        'keterangan',
        'stok_keluar'
    ];
}
