<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequests;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequests $request)
    {
        try {
            $request["password"] = Hash::make($request->password);
            $user = User::create($request->all());
            return response()->json([
                "mesaage" => "Pengguna berhasil dibuat",
                "data" => $user
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "message" => $e->getMessage(),
            ], 500);
        }
    }
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only("username", "password"))) {
            return response()->json([
                "message" => "invalid credentials",
            ], 500);
        }
        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken("token")->plainTextToken;
        return response()->json([
            "message" => "Login sukses",
            "data" => [
                "user" => $user,
                "token" => $token
            ]
        ], 200);
    }
    public function logout()
    {
        if (!Auth::check()) {
            return response()->json([
                "message" => "Anda belum masuk"
            ], 401);
        }
        auth()->user()->tokens()->delete();
        return response()->json([
            "message" => "Logout sukses"
        ], 200);
    }
}
