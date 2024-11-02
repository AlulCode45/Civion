<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $validated = $request->validated();
        $user = User::where('email', $validated['email'])->first();
        return ResponseHelper::success([
            'token' => $user->createToken('auth_token')->plainTextToken
        ], 'Login success');
    }
}