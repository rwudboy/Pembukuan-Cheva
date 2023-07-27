<?php

namespace App\Models;

use App\Models\barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang_rusak extends Model
{
    use HasFactory;
    protected $table = 'barang_rusak';
    protected $fillable = [
        'barang_masuk_id',
        'keterangan',
        'stok_keluar'
    ];
    /**
     * Get the Barang_masuk that owns the barang_rusak
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Barang_masuk(): BelongsTo
    {
        return $this->belongsTo(barang_masuk::class, 'barang_masuk_id', 'id');
    }
}
