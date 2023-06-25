<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

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
    public function show($id)
    {
        $unit = Unit::where('id', $id)->first();

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

    public function getTokenCSRF()
    {
        return response()->json(["token" => csrf_token()]);
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
    public function index2()
    {
        $data['units'] = Unit::get();
        return view("tes", $data);
    }
    public function registerAdminn()
    {
        return view('registerAdmin');
    }
    public function registerSupplierr()
    {
        return view();
    }
    public function authentiocaating(Request $request)
    {
        $proses = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($proses)) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerate();
            return redirect('/tes');
            if (Auth::user()->role_id == 1) {
                return redirect("");
            } else {
                return redirect("");
            }
        };
        return redirect("tes");
    }
    public function registerAdmin(Request $request)
    {

        $request->validate([
            'nama_user' => 'required|unique:users|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255'
        ]);
        $request['password'] = Hash::make($request->password);
        $admin = User::create($request->all());
        // return redirect("");
        return response()->json([
            "data" => $admin
        ]);
    }
    public function registerSupplier(Request $request)
    {
        $request->validate([
            'role_id' => 'required|unique:users|max:255',
            'nama_user' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255'
        ]);

        $request['password'] = Hash::make($request->password);
        $supplier = User::create([
            'role_id' => $request->role_id,
            'nama_user' => $request->nama_user,
            'username' => $request->username,
            'password' => $request->password
        ]);
        // return redirect("");
        return response()->json([
            "data" => $supplier
        ]);


        // dd($supplier);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('tes');
    }
}
