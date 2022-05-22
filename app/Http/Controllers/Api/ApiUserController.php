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

    public function getProfile(Request $request)
    {

        try {
            //code...
            $user_id = $request->id;
            $user = User::where('id', $user_id)->first();
            return response()->json([
                'success' => 1,
                'message' => 'Successfully Get User Profile!',
                'user' => $user
            ]);
        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'success' => 0,
                'message' => $e->getMessage(),
                'data' => []
            ], 500);
        }
    }

    public function userProfileUpdate(Request $request)
    {

        try {
            //nama, email, password
            $validasi = Validator::make($request->all(), [
                'email' => 'unique:users',
                'phone' => 'unique:users',
            ]);

            if ($validasi->fails()) {
                $val = $validasi->errors()->all();
                return $this->errorMessage($val[0]);
            } else {
                $user = User::find($request->id);

                // validasi update email
                if($request->email != null){
                    $user->email = $request->email;
                }

                // validasi update phone
                if($request->phone != null){
                    $user->phone = $request->phone;
                }

                // validasi update phone
                if($request->address != null){
                    $user->address = $request->address;
                }
                
                $user->name = $request->name;

                // if ($request->file('profile_photo_path')) {
                //     $file = $request->file('profile_photo_path');
                //     @unlink(public_path('upload/user_images/' . $user->profile_photo_path));
                //     $fileName = date('YmdHi') . $file->getClientOriginalName();
                //     $file->move(public_path('upload/user_images'), $fileName);
                //     $user['profile_photo_path'] = $fileName;
                // }

                $user->update();
                return response()->json([
                    'success' => 1,
                    'message' => 'Successfully Update the User Profile!',
                    'user' => $user
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => 0,
                'message' => $e->getMessage(),
                'user' => []
            ], 500);
        }

    }
}