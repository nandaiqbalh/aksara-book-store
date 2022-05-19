<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiUserController extends Controller
{
    public function login(Request $request)
    {
        // dd($requset->all());die();
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (password_verify($request->password, $user->password)) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat datang, ' . $user->name . '!',
                    'user' => $user
                ]);
            }
            return $this->errorMessage('Password yang anda masukkan salah!');
        }
        return $this->errorMessage('Email yang anda masukkan tidak terdaftar!');
    }

    public function register(Request $request)
    {
        //nama, email, password
        $validasi = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->errorMessage($val[0]);
        }

        $user = User::create(array_merge($request->all(), [
            'password' => bcrypt($request->password)
        ]));

        if ($user) {
            return response()->json([
                'success' => 1,
                'message' => 'Welcome, ' . $user->name . '! Successfully Register!',
                'user' => $user
            ]);
        }

        return $this->errorMessage('Registrasi gagal!');
    }

    public function errorMessage($pesan)
    {
        return response()->json([
            'success' => 0,
            'message' => $pesan
        ]);
    }
}
