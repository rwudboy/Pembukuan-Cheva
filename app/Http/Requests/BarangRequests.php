<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequests extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "unit_id" => 'required|exists:units,id',
            "kode_barang" => 'required|string|',
            "nama_barang" => 'required|string'
        ];
    }
}
 