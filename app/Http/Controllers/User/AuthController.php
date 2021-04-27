<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\User\Auth\LoginUserRequest;
use App\Http\Requests\User\Auth\RegisterUserRequest;
use App\Services\User\Interfaces\UserServiceInterface;
use Auth;
use App\Models\User;

class AuthController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function showFormLogin()
    {
        return view('users.login');
    }

    public function login(LoginUserRequest $request)
    {
        $email = $request->input('email');
    	$password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('users.blog.index');
        } else {
            dd(2);
        }
    }

    public function showFormRegister()
    {
        return view('users.register');
    }

    public function register(RegisterUserRequest $request)
    {
        if ($this->userService->storeUser($request)) {
            return view('blogs.index');
        } else {
            dd(2);
        }
    }

    public function setStatus()
    {
            dd('status');
    }
}
