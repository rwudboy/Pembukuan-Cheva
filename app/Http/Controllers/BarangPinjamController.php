<?php

namespace App\Http\Controllers;

use App\Models\barang_pinjam;
use Illuminate\Http\Request;

class BarangPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangPinjam = barang_pinjam::all();

        return response()->json([
            "data" => $barangPinjam
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
        $barangPinjam = barang_pinjam::create([
            'barang_masuk_id' => $request->barang_masuk_id,
            'keterangan' => $request->keterangan,
            'status' => $request->status,
            'stok_pinjam' => $request->stok_pinjam,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_pengembalian' => $request->tanggal_pengembalian
        ]);
        return response()->json([
            "data" => $barangPinjam
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
        $barangPinjam = barang_pinjam::find($id);
        return response()->json([
            "data" => $barangPinjam
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
        $barangPinjam = barang_pinjam::find($id)
            ->update([
                'barang_masuk_id' => $request->barang_masuk_id,
                'keterangan' => $request->keterangan,
                'status' => $request->status,
                'stok_pinjam' => $request->stok_pinjam,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_pengembalian' => $request->tanggal_pengembalian
            ]);
        return response()->json([
            "data" => $barangPinjam
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
        $barangPinjam = barang_pinjam::find($id)
            ->delete();
        return response()->json([
            "data" => $barangPinjam
        ]);
    }
}
