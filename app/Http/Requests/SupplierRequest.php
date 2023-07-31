<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplireRequest extends FormRequest
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
            "email" => "required|unique:suppliers",
            "alamat" => "required"
        ];
    }
}
