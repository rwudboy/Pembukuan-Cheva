<?php

namespace App\Http\Controllers;

use App\Http\Requests\BarangRequests;
use App\Http\Resources\Barang\BarangResource;
use App\Models\barang;
use App\Models\barang_masuk;
use Exception;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd($request->all());
        $barang = barang::with("unit:id,nama_unit")->get();
        return BarangResource::collection($barang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view("");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangRequests $request)
    {
        // dd($request->all());
        try {
            $barang = barang::create($request->all());
            // return new BarangResource($barang);
            return response()->json([
                'success' => true,
                'message' => 'Data created successfully',
                'data' => $$barang
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
        $barang = barang::with("unit:id,nama_unit")->findOrFail($id);
        return new BarangResource($barang);
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
        // $barang = barang::with("unit:id,nama_unit")->findOrFail($id);
        // return new BarangResource($barang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BarangRequests $request, string $id)
    {
        $barang = barang::find($id)->update($request->all());
        return response()->json([
            "success" => true,
            "message" => "Data updated successfully",
            "data" => $barang
        ], 200);
        // try {
        // } catch (Exception $e) {
        //     return response()->json([
        //         "message" => $e->getMessage()
        //     ], 500);
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
        $barang = barang::find($id)
            ->delete();
        return response()->json([
            "success" => true,
            "message" => "Data deleted successfully",
            "data" => $barang
        ]);
    }
}
