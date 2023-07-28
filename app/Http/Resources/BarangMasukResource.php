<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangMasukResource extends JsonResource
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
            "nama_supplier" => $this->nama_supplier,
            "barang" => $this->whenLoaded("Barang"),
            "status" => $this->status,
            "keterangan" =>$this->keterangan,
            "stok_masuk" => $this->stok_masuk,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
