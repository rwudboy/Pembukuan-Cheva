<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequests extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_user' => 'required|unique:users|max:255',
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ];
    }
}
