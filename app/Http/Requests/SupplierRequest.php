<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "supplier_nama_user_id" => "required|exists:users,id",
            "ID_Supplier" => "required|unique:suppliers|min:10|integer",
            "email" => "required|unique:suppliers",
            "alamat" => "required",
        ];
    }
}
