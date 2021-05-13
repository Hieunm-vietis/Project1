<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\Auth\RegisterUserRequest;
use App\Models\User;
use App\Models\PasswordReset;
use Validator;
use Illuminate\Support\Str;
use App\Notifications\ResetPasswordRequest;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function register(RegisterUserRequest $request)
    {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => \Hash::make($request->input('password')),
        ]);

        if ($user) {
            return response([
                'status' => true
            ], 200);
        } else {
            return response([
                'status' => false
            ], 500);
        }
    }

    public function forgetPassword(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);

        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
        }
  
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }

    public function reset_password(Request $request)
    {
        $token = $request->input('token');
        $passwordReset = PasswordReset::where('token', $token)->first();
        $user = User::where('email', $passwordReset->email)->first();
        $updatePasswordUser = $user->update(\Hash::make($request->only('password')));

        return response()->json([
            'success' => $updatePasswordUser,
            'status' => true
        ]);
    }

    public function me()
    {
        return response()->json($this->guard()->user());
    }

    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard();
    }
}
