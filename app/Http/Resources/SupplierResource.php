<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupplierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "supplier_nama_user_id" => $this->whenLoaded("user"),
            "email" => $this->email,
            "alamat" => $this->alamat,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
