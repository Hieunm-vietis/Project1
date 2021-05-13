<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\Interfaces\UserServiceInterface;
use App\Http\Requests\User\Users\UpdateAvatarRequest;
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
        list($blogs, $isFollow) = $this->userService->show($user);
    
        return view('users.user.show', compact('user', 'blogs', 'isFollow'));
    }

    public function follow(User $user)
    {
        if ($this->userService->followUser($user)) {
            return back();
        } else {
            return back();
        }
    }

    public function unfollow(User $user)
    {
        if ($this->userService->unfollow($user)) {
            return back();
        } else {
            return back();
        }
    }

    public function updateAvatar(Request $request)
    {
        $fileImg = $request->file('image');
        if ($this->userService->updateAvatar($fileImg)) {
            return back()->withSuccess([
                'Update Avatar Blog Success'
            ]);
        } else {
            return back()->withErrors([
                'updateAvatar' => 'Have'
            ]);
        }
    }
}
