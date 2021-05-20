<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login(Request $request)
    {
        [
            'email' => $email,
            'password' => $password
        ] = $request;
        if (!$email || !$password) {
            return response()->json([
                'code' => 400,
                'data' => null,
                'message' => 'Email atau Password tidak boleh kosong',
                'success' => false,
            ]);
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return response()->json([
                'code' => 404,
                'data' => null,
                'message' => 'User tidak ditemukan!',
                'success' => false,
            ]);
        }

        if (!Hash::check($password, $user->password)) {
            return response()->json([
                'code' => 400,
                'data' => null,
                'message' => 'Password salah!',
                'success' => false,
            ]);
        }

        $key = config('services.jwt.secret');
        $payload = [
            'iss' => config('app.url'),
            'aud' => config('app.url'),
            'iat' => round(microtime(true)),
            'exp' => round(microtime(true)) + 60 * 60 * 2,
            'sub' => $email,
            'data' => $user
        ];

        $jwt = JWT::encode($payload, $key);
        return response()->json([
            'code' => 200,
            'data' => [
                'token' => $jwt
            ],
            'message' => 'Login berhasil!',
            'success' => true
        ]);
    }
}
