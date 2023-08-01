<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    protected $table = "suppliers";
    protected $fillable = [
        "supplier_nama_user_id",
        "ID_Supplier",
        "email",
        "alamat"
    ];
    /**
     * Get the user that owns the Supplier
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'supplier_nama_user_id', 'id');
    }
}
