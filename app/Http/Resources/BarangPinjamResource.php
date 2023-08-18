<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BarangPinjamResource extends JsonResource
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
            'barang_masuk_id' => $this->whenLoaded("Barang_masuk"),
            'keterangan' =>  $this->keterangan,
            'status' =>  $this->status,
            'stok_pinjam' => $this->stok_pinjam,
            'tanggal_pinjam' =>  $this->tanggal_pinjam,
            'tanggal_pengembalian' =>  $this->tanggal_pengembalian,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at
        ];
    }
}
