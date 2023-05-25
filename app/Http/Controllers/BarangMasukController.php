<?php

namespace App\Http\Controllers;

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
        $barangMasuk = barang_masuk::all();

        return response()->json([
            "data" =>$barangMasuk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $barangMasuk = barang_masuk::create([
            'nama_supplier' =>$request->nama_supplier,
            'barang_id' =>$request->barang_id,
            'status' =>$request->status,
            'keterangan' =>$request->keterangan,
            'stok_masuk' =>$request->stok_masuk
        ]);
        return response()->json([
            "data" =>$barangMasuk
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
    public function edit($id)
    {
        $barangMasuk =barang_masuk::find($id);
        return response()->json([
            "data" =>$barangMasuk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barangMasuk = barang_masuk::find($id)
            ->update([
                'nama_supplier' =>$request->nama_supplier,
                'barang_id' =>$request->barang_id,
                'status' =>$request->status,
                'keterangan' =>$request->keterangan,
                'stok_masuk' =>$request->stok_masuk
            ]);
        return response()->json([
            "data" =>$barangMasuk
        ]);
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
            "data" =>$barangMasuk
        ]);
    }
}
