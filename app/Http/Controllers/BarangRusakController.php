<?php

namespace App\Http\Controllers;

use App\Models\barang_rusak;
use Illuminate\Http\Request;

class BarangRusakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangRusak = barang_rusak::all();

        return response()->json([
            "data" => $barangRusak
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
        $barangRusak = barang_rusak::create([
            'barang_masuk_id' => $request->barang_masuk_id,
            'keterangan' => $request->keterangan,
            'stok_keluar' => $request->stok_keluar
        ]);
        return response()->json([
            "data" => $barangRusak
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
        $barangRusak = barang_rusak::find($id);
        return response()->json([
            "data" => $barangRusak
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
        $barangRusak = barang_rusak::find($id)
            ->update([
                'barang_masuk_id' => $request->barang_masuk_id,
                'keterangan' => $request->keterangan,
                'stok_keluar' => $request->stok_keluar
            ]);
        return response()->json([
            "data" => $barangRusak
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
        $barangRusak = barang_rusak::find($id)
            ->delete();
        return response()->json([
            "data" => $barangRusak
        ]);
    }
}
