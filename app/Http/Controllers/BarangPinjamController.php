<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\barang_masuk;
use Illuminate\Http\Request;
use App\Models\barang_pinjam;
use App\Http\Requests\BarangPinjamRequest;
use App\Http\Resources\BarangPinjamResource;
use Carbon\Carbon;

class BarangPinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangPinjam = barang_pinjam::with("Barang_masuk:id,nama_supplier,barang_id")->get();

        return BarangPinjamResource::collection($barangPinjam);
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
    public function store(BarangPinjamRequest $request)
    {
        $barangMasuk = barang_masuk::findOrFail($request->barang_masuk_id);
        if ($barangMasuk->stok_masuk < $request->stok_pinjam) {
            return response()->json([
                'error' => 'Stok barang tidak cukup/ tidak ada',
            ], 400);
        } else {

            try {

                // $barangMasuk->decrement('stok_masuk', $request->stok_pinjam);
                // DB::beginTransaction();
                $barangPinjam = barang_pinjam::create($request->all());
                $barangMasuk = barang_masuk::findOrFail($request->barang_masuk_id);
                //Kurangangi stok_masuk dii tabel barang masuk
                $barangMasuk->stok_masuk -= $request->stok_pinjam;
                $barangMasuk->save();
                // DB::commit();
                return response()->json([
                    "success" => true,
                    "message" => " successfully",
                    "data" => $barangPinjam
                ], 200);
            } catch (Exception $e) {
                // DB::rollBack();
                return response()->json([
                    "message" => $e->getMessage()
                ], 500);
            }
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
        $barangPinjam = barang_pinjam::with("Barang_masuk:id,nama_supplier,barang_id")->findOrFail($id);
        return new BarangPinjamResource($barangPinjam);
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
    public function update(BarangPinjamRequest $request, $id)
    {
        $barangMasuk = barang_masuk::findOrFail($request->barang_masuk_id);
        // if ($barangMasuk->stok_masuk < $request->stok_pinjam) {
        //     return response()->json([
        //         'error' => 'Stok barang tidak cukup/ tidak ada',
        //     ], 400);
        // } else {
        try {

            // $barangMasuk->decrement('stok_masuk', $request->stok_pinjam);
            // DB::beginTransaction();
            $barangPinjam = barang_pinjam::findOrFail($id)->where("barang_masuk_id", $request->barang_masuk_id)->where("tanggal_pengembalian", null);
            $tanggalPinjam = $barangPinjam->first();
            $megitungTanggal = $barangPinjam->count();
            // dd($megitungTanggal);    
            $barangMasuk = barang_masuk::findOrFail($request->barang_masuk_id);
            if ($megitungTanggal == 8) { // Angka selalu di ganti jika tidak berhasil, cara lihat lakukan  dd($megitungTanggal);
                $tanggalPinjam->tanggal_pengembalian = Carbon::now()->toDateString();
                //Kurangangi stok_masuk dii tabel barang masuk
                $barangMasuk->stok_masuk += $request->stok_pinjam;
                // dd($tanggalPinjam);
                // $barangMasuk->save();
                $tanggalPinjam->save();
                // DB::commit();
                return response()->json([
                    "success" => true,
                    "message" => " successfully",
                    "data" => $barangPinjam
                ], 200);
            }
        } catch (Exception $e) {
            // DB::rollBack();
            return response()->json([
                "message" => $e->getMessage()
            ], 500);
        }
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangPinjam = barang_pinjam::findOrFail($id)
            ->delete();
        // $barangKeluar = $barangPinjam->where('barang_masuk_id', $barangPinjam->barang_masuk_id)->first();
        // //Kurangangi stok_masuk dii tabel barang masuk
        // $barangKeluar->stok_masuk += $barangPinjam->stok_keluar;
        // $barangKeluar->save();
        return response()->json([
            "data" => $barangPinjam
        ]);
    }
}
