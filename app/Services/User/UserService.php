<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\User\Interfaces\UserServiceInterface;
use App\Services\Service;
use App\Mail\SendMailSetStatus;
use App\Notifications\SetStatusUser;
use Illuminate\Support\Facades\DB;

class UserService extends Service implements UserServiceInterface
{
    public function storeUser($params)
    {
        return \DB::transaction(function () use ($params) {
            $user = User::create([
                'name' => $params['name'],
                'email' => $params['email'],
                'password' => \Hash::make($params['password']),
            ]);
            
            // if ($user) {
            //     $this->sendEmailToSetStatus($user);
            // }
            
            return $user;
        });
    }

    public function setStatusUser($user)
    {
        if ($user->status == User::STATUS_VALID) {
            return $user;
        }

        return $user->update([
            'status' => User::STATUS_VALID,
        ]);
    }

    public function sendEmailToSetStatus($user)
    {
        $params = route('users.setStatus', $user->id);
        $user->notify(new SetStatusUser($params));
        // \Mail::to($user->email)->send(new SendMailSetStatus($user, $params));
    }

    public function show($user)
    {
        $blogs = $user->blogs()->paginate(5);
        $isFollow = DB::table('follows')->where('user_id', \Auth::user()->id)
                        ->where('user_follow_id', $user->id)
                        ->first();

        return [$blogs, $isFollow];
    }

    public function followUser($user)
    {
        $follower = \Auth::user();

        return $follower->followers()->attach($user->id);
    }

    public function unfollow($user)
    {
        $follower = \Auth::user();

        return $follower->followers()->detach($user->id);
    }

    public function updateAvatar($fileImg)
    {
        $filename = time() . $fileImg->getClientOriginalName();

        if ($fileImg->move('AvatarUser', $filename)) {
            $user = \Auth::user();

            return $user->update([
                'avatar' => '/AvatarUser/' . $filename
            ]);
        } else {
            return false;
        }  
        
    }
}
