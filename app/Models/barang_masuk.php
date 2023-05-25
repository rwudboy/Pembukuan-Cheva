<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_masuk extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $fillable = [
        'nama_supplier',
        'barang_id',
        'status',
        'keterangan',
        'stok_masuk'
    ];
}
