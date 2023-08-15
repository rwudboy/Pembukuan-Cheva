<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequests;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Response;
use Illuminate\Auth\Events\PasswordReset;

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
    public function index()
    {
        return response()->json([
            'message' => 'Password reset link sent successfully'
        ], 200);
    }
    public function forgottpassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json([
                'message' => 'Password reset successful'
            ], 200);
        } else {
            return response()->json([
                'error' => 'Password reset failed'
            ], 400);
        }
    }
    public function token($token)
    {
        return  Response::json(['token' => $token], 200);
    }
    public function update(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();
                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json([
                'message' => 'Password reset successful'
            ]);
        } else {
            return response()->json([
                'message' => 'Password reset failed'
            ], 400);
        }
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
