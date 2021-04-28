<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\User\Interfaces\UserServiceInterface;
use App\Services\Service;
use App\Mail\SendMailSetStatus;
use App\Notifications\SetStatusUser;

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
        $blogs = $user->blogs()->get();
        
        return $blogs;
    }
}
