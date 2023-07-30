<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangMasukRequst extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_supplier' => "required|string",
            'barang_id' => "required|exists:barangs,id",
            'status' => "required|string",
            'keterangan' => "required|string",
            'stok_masuk' => "required|integer",
        ];
    }
}
 