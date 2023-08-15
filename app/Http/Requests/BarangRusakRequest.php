<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRusakRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'barang_masuk_id' => "required|exists:barang_masuks,id",
            'keterangan' => "required",
            'stok_keluar' => "required|integer",
        ];
    }
}
