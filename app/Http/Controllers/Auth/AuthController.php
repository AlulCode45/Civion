<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response as ResponseCode;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();
        if($user){
            return ResponseHelper::success([
                'token' => $user->createToken('auth_token')->plainTextToken
            ], 'Login success');
        }
        return ResponseHelper::error([
            'message' => 'Email or password is incorrect'
        ],code: ResponseCode::HTTP_UNAUTHORIZED);
    }

    public function logout()
    {
        $user = auth()->user();
        if($user){
            $user->tokens()->delete();
            return ResponseHelper::success(message: 'Logout success');
        }else{
            return ResponseHelper::error(message: 'Logout failed');
        }
    }
}
