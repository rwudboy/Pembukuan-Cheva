<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\barang_masuk;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang_masuk::join('barangs', 'barang_masuks.barang_id', '=', 'barangs.id')->get();

        return response()->json([
            "data" => $barang
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
        $barang = barang::create([
            "unit_id" => $request->unit_id,
            "kode_barang" => $request->kode_barang,
            "nama_barang" => $request->nama_barang
        ]);
        return response()->json([
            "data" => $barang
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
        $barang = barang::find($id);
        return response()->json([
            "data" => $barang
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
        $barang = barang::find($id)
            ->update([
                "unit_id" => $request->unit_id,
                "kode_barang" => $request->kode_barang,
                "nama_barang" => $request->nama_barang
            ]);
        return response()->json([
            "data" => $barang
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
        $barang = barang::find($id)
            ->delete();
        return response()->json([
            "data" => $barang
        ]);
    }
}
