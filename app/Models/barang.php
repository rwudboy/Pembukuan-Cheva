<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $fillable = [
        'unit_id',
        'kode_barang',
        'nama_barang',
    ];
}
