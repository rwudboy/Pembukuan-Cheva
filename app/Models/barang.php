<?php

namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $fillable = [
        'unit_id',
        'kode_barang',
        'nama_barang',
    ];
    protected $guarded = [];
    /**
     * Get the user that owns the RentLogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
