<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function Barang():  BelongsTo
    {
        return $this->belongsTo(barang::class, 'barang_id', "id");
    }
}
