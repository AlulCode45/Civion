<?php
namespace app\Http\Contracts\Repository;
class AuthRepository{
    public function login(\App\Http\Requests\AuthRequest $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){

        }
    }
}
