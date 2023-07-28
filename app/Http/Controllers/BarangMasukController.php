<?php

namespace App\Http\Controllers;

use App\Http\Resources\BarangMasukResource;
use App\Models\barang;
use App\Models\barang_masuk;
use App\Models\Unit;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangMasuk = barang_masuk::with("Barang:id,nama_supplier,barang")->get();

        return BarangMasukResource::collection($barangMasuk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = Unit::all();
        $barang = barang::all();
        return view("");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => "required",
            'barang_id' => "required",
            'status' => "required",
            'keterangan' => "required",
            'stok_masuk' => "required|integer",
        ]);
        // cek apakah stok barang sesuai dengan jumlah barang masuk
        $barang = barang::findOrFail($request->barang_id);
        $barang->increment('stok_masuk', $request->keterangan);
        $barangMasuk = barang_masuk::create($request->all());
        return response()->json([
            "data" => $barangMasuk
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $barangMasuk = barang_masuk::find($id);
    //     return response()->json([
    //         "data" => $barangMasuk
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang_masuk $barangMasuk)
    {
        $request->validate([
            'nama_supplier' => "required",
            'barang_id' => "required",
            'status' => "required",
            'keterangan' => "required",
            'stok_masuk' => "required|integer",
        ]);
        // Hitung selisih jumlah barang masuk saat mengubah data
        $selisih = $request->keterangan - $barangMasuk->keterangan;
        // tambah atau kurangi stok barang sesuai dengan selisih 
        $barang = barang::findOrFail($request->barang_id);
        $barang->increment("stok_masuk", $selisih);
        $barangMasuk->update($request->all());
        return response()->json([
            "data" => $barangMasuk
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang_masuk $barangMasuk)
    {
        $barang = barang::findOrFail($barangMasuk->barang_id);
        $barang->decrement('stok_masuk', $barangMasuk->keterangan);
        $barangMasuk->delete();
        return response()->json([
            "data" => $barangMasuk
        ]);
    }
}
