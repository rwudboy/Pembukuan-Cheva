<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangMasukRequst;
use App\Http\Resources\BarangMasukResource;
use App\Models\barang;
use App\Models\barang_masuk;
use App\Models\Unit;
use Exception;
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
        $barangMasuk = barang_masuk::with("Barang:id,kode_barang,nama_barang")->get();

        return BarangMasukResource::collection($barangMasuk);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangMasukRequst $request)
    {
        // cek apakah stok barang sesuai dengan jumlah barang masuk
        try {
            $barangMasuk = barang_masuk::create($request->all());
            return response()->json([
                "success" => true,
                "message" => "Data created successfully",
                "data" => $barangMasuk
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barangMasuk = barang_masuk::with("Barang:id,kode_barang,nama_barang")->findOrFail($id);
        return new BarangMasukResource($barangMasuk);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barangMasuk = barang_masuk::find($id);
        return response()->json([
            "data" => $barangMasuk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BarangMasukRequst $request, string $id)
    {
        try {
            $barangMasuk = barang_masuk::find($id)->update($request->all());
            return response()->json([
                "success" => true,
                "message" => "Data updated successfully",
                "data" => $barangMasuk
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangMasuk = barang_masuk::find($id)
            ->delete();
        return response()->json([
            "success" => true,
            "message" => "Data deleted successfully",
            "data" => $barangMasuk
        ]);
    }
}
