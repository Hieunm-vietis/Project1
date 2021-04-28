<?php

namespace App\Services\User;

use App\Models\User;
use App\Services\User\Interfaces\UserServiceInterface;
use App\Services\Service;
use App\Mail\SendMailSetStatus;

class UserService extends Service implements UserServiceInterface
{
    public function storeUser($request)
    {
        return \DB::transaction(function () use ($request) {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => \Hash::make($request->input('password')),
            ]);
            
            if ($user) {
                $this->sendEmailToSetStatus($user);
            }
            
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
        \Mail::to($user->email)->send(new SendMailSetStatus($user, $params));
    }
}
