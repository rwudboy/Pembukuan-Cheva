<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRusakRequest;
use Exception;
use App\Models\barang_masuk;
use App\Models\barang_rusak;
use Illuminate\Http\Request;
use App\Http\Resources\BarangRusakResourcs;

class BarangRusakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangRusak = barang_rusak::with("Barang_masuk")->get();

        return BarangRusakResourcs::collection($barangRusak);
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
    public function store(BarangRusakRequest $request, Request $request2)
    {
        dd($request->all());
        $barangMasuk = barang_masuk::findOrFail($request->barang_masuk_id)->only("stok_masuk");
        // $jumlah = $barangMasuk->barang_id()->where("barang_masuk_id", $request->id)->first();
        if ($barangMasuk->stok_masuk < $request->stok_keluar) {
            return response()->json([
                'error' => 'Stok barang tidak cukup'
            ], 400);
        }
        try {
            $barangMasuk->decrement('stok_masuk', $request->stok_keluar);
            $barangRusak = barang_rusak::create($request->all());
            // Kurangangi stok_masuk dii tabel barang masuk
            // $barangMasuk->stok_masuk -= $request->stok_keluar;
            // $barangMasuk->save();
            return response()->json([
                "success" => true,
                "message" => " successfully",
                "data" => $barangRusak
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
