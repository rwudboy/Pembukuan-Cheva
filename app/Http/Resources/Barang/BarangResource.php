<?php

namespace App\Http\Resources\Barang;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
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
            "unit" => $this->whenLoaded("unit"),
            "kode_barang" => $this->kode_barang,
            "nama_barang" => $this->nama_barang,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
