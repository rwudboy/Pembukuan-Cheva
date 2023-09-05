<?php

namespace App\Http\Controllers;

use App\Models\barang_masuk;
use App\Models\barang_pinjam;
use App\Models\barang_rusak;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class AnalisisController extends Controller
{
    public function home()
    {
        # code...
    }
    public function laporan(Request $request)
    {
        $BarangMasuk = barang_masuk::select(
            barang_masuk::raw('SUM(stok_masuk) as stok ')
        )->groupBy('stok_masuk')->first();
        $BarangPinjam = barang_pinjam::select(
            barang_pinjam::raw('SUM(stok_pinjam) as stok ')
        )->groupBy('stok_pinjam')->first();
        $BarangRusak = barang_rusak::select(
            barang_rusak::raw('SUM(stok_keluar) as stok ')
        )->groupBy('stok_keluar')->first();
        return response()->json([
            "Barang Masuk" => $BarangMasuk,
            "Barang Pinjam" => $BarangPinjam,
            "Barang keluar" => $BarangRusak
        ]);
    }
    public function datapengguna()
    {
        $pengguna = User::count();
        $supplier = Supplier::count();
        return response()->json([
            "Pengguna" => $pengguna,
            "Supplier" => $supplier,
        ]);
    }
}
