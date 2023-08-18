<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangPinjamRequest extends FormRequest
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
            'status' => "required",
            'stok_pinjam' => "required|integer",
            'tanggal_pinjam' => "required|date",
            // 'tanggal_pengembalian' => "date"
        ];
    }
}
