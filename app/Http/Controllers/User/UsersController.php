<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\Interfaces\UserServiceInterface;
use App\Models\User;

class UsersController extends Controller
{
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function show(User $user)
    {
        return view('users.user.show', compact('user'));
    }
}
