<?php

namespace App\Http\Controllers;

use App\Models\barang_masuk;
use App\Models\barang_pinjam;
use App\Models\barang_rusak;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    public function home()
    {
        # code...
    }
    public function laporan(Request $request)
    {
        $BarangMasuk = barang_masuk::where($request->stok_masuk)->where("stok_masuk", "=", $request->stok_masuk)->count();
        $BarangPinjam = barang_pinjam::where($request->stok_pinjam)->where("stok_pinjam", "=", $request->stok_pinjam)->count();
        $BarangRusak = barang_rusak::where($request->stok_keluar)->where("stok_keluar", "=", $request->stok_keluar)->count();
        return response()->json([
            "Barang Masuk" => $BarangMasuk,
            "Barang Pinjam" => $BarangPinjam,
            "Barang keluar" => $BarangRusak
        ]);
    }
}
