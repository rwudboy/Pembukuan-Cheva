<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangRusak extends JsonResource
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
            'id' => $this->id,
            'barang_masuk_id' => $this->barang_masuk_id,
            'keterangan' => $this->keterangan,
            'stok_keluar' => $this->stok_keluar
        ];
    }
}
