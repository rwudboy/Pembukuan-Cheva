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
        $BarangMasuk = barang_masuk::select("stok_masuk")->get();
        $BarangPinjam = barang_pinjam::select("stok_pinjam")->get();
        $BarangRusak = barang_rusak::select("stok_keluar")->get();
        for ($a = 0; $a < count($BarangMasuk); $a) {
            $masuk = $a;
        }
        for ($i = 0; $i < count($BarangPinjam); $i) {
            $pinjam = $i;
        }
        for ($u = 0; $u < count($BarangRusak); $u) {
            $rusak = $u;
        }
        return response()->json([
            "Barang Masuk" => $masuk,
            "Barang Pinjam" => $pinjam,
            "Barang keluar" => $rusak
        ]);
        // return response()->json([
        //     "Barang Masuk" => $BarangMasuk,
        //     "Barang Pinjam" => $BarangPinjam,
        //     "Barang keluar" => $BarangRusak
        // ]);
    }
}
