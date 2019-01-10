<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use JWTAuthException;
use App\Component\Model\User;
class AuthController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('jwt.auth');
    }*/


    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $username = $request->input('username');
        $password = $request->input('password');

        if ($user = User::where('username',$username)->first()) {
            $credentials = [
                    'username' => $username,
                    'password' => $password
            ];

            $token = null;

            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    return response()->json([
                        'msg' => 'Username or Password are incorrect',
                    ],404);
                }
            } catch (JWTAuthException $e){
                return response()->json([
                    'msg' => 'failed_to_create_token',
                ], 404);
            }

            $response = [
                'msg' => 'User berhasil login',
                'user' => $user,
                'token' => $token
            ];

            return response()->json($response, 201);

        }

        $response = [
            'msg' => 'An error occurred'
        ];

            return response()->json($response, 404);        
    }
}
