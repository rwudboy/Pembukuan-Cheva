<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Unit;

class MyUnitController extends Controller
{
    public function index()
    {
        $units = Unit::all();

        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully',
            'data' => $units
        ], 200);
    }
    public function index2(){
        $data['units'] = Unit::get();
        return view("tes",$data);
    }
    public function show($id)
    {
        $unit = Unit::where('id',$id)->first();

        if (!$unit) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully',
            'data' => $unit
        ], 200);
    }

    public function getTokenCSRF(){
        return response()->json(["token"=>csrf_token()]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_unit' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
                'data' => null
            ], 422);
        }

        $unit = new Unit;
        $unit->nama_unit = $request->nama_unit;
        $unit->save();

        return response()->json([
            'success' => true,
            'message' => 'Data created successfully',
            'data' => $unit
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_unit' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors(),
                'data' => null
            ], 422);
        }

        $unit = Unit::find($id);

        if (!$unit) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $unit->nama_unit = $request->nama_unit;
        $unit->save();

        return response()->json([
            'success' => true,
            'message' => 'Data updated successfully',
            'data' => $unit
        ], 200);
    }

    public function destroy($id)
    {
        $unit = Unit::find($id);

        if (!$unit) {
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
                'data' => null
            ], 404);
        }

        $unit->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data deleted successfully',
            'data' => null
        ]);
    }
}
