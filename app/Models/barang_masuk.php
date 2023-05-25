<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang_masuk extends Model
{
    use HasFactory;
    protected $table = 'barang_masuks';
    protected $fillable = [
        'nama_supplier',
        'barang_id',
        'status',
        'keterangan',
        'stok_masuk'
    ];

    public function Barang()
    {
        return $this->belongsTo(barang::class, 'barang_id');
    }
}
