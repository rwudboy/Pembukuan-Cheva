<?php

namespace App\Http\Controllers;

use App\Http\Requests\SupplierRequest;
use App\Http\Resources\SupplierResource;
use App\Models\Supplier;
use Exception;
use Illuminate\Http\Request;

class supplierControlle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::with("user:id,role_id,nama_user")->get();
        return SupplierResource::collection($supplier);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        try {
            $supplier = Supplier::create($request->all());
            return response()->json([
                "success" => true,
                "message" => "Data created successfully",
                "data" => $supplier
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
        $supplier = Supplier::with("user:id,role_id,nama_user")->findOrFail($id);
        return new SupplierResource($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return response()->json([
            "data" => $supplier
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierRequest $request, string $id)
    {
        try {
            $supplier = Supplier::find($id)->update($request->all());
            return response()->json([
                "success" => true,
                "message" => "Data updated successfully",
                "data" => $supplier
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barangMasuk = Supplier::find($id)
            ->delete();
        return response()->json([
            "success" => true,
            "message" => "Data deleted successfully",
            "data" => $barangMasuk
        ]);
    }
}
