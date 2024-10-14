<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // ฟังก์ชันสำหรับเข้าสู่ระบบ
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            $user = User::where('email', $request->email)->first();
    
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['The provided credentials are incorrect.'],
                ]);
            }
    
            $token = $user->createToken('token-name')->plainTextToken;
    
            return response()->json([
                'token' => $token,
                'user' => $user->only(['id', 'name', 'email']),
                'message' => 'Login successful'
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Login failed',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    // ฟังก์ชันสำหรับออกจากระบบ
    public function logout(Request $request)
{
    try {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Logout failed',
            'message' => $e->getMessage()
        ], 500);
    }
}

}
