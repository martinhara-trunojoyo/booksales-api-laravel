<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // 1. setup validator
        $validator = Validator::make($request->all(), [ 
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);
        // 2. cel validator
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        // 3. create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // pastikan password di-hash
            'role' => 'customer', 
        ]);
        // 4. cek keberhasilan
        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'User registered successfully',
                'data' => $user,
            ], 201);
        }
        // 5. cek gagal
        return response()->json([
            'success' => false,
            'message' => 'User registration failed',
        ], 409);
    }
    /**
     * Login method to authenticate user and return JWT token.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){
            // 1. setup validator
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required',
            ]);

            // 2. cel validator
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            // 3. get kredensial dari request
            $credentials = $request->only('email', 'password');
            // 4. cek isFailed
            if (!$token = auth()->guard('api')->attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized',
                ], 401);
            }
            // 5. cek isSuccess
            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'user' => auth()->guard('api')->user(),
                'token' => $token,
            ], 200);
    }

    public function logout(Request $request)
    {
        //  try
        // 1. Invalidate token
        // 2. cek isSuccess
        
        //catch
        // 1. cek isFailed

        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully',
            ], 200);

        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to log out, please try again',
            ], 500);

        }
    }
}
