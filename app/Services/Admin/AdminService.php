<?php

namespace App\Services\Admin;

use App\Models\Admin;
use App\Services\Admin\Interfaces\AdminServiceInterface;
use App\Services\Service;

class AdminService extends Service implements AdminServiceInterface
{
    public function createAdmin($request)
    {
        return Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => \Hash::make($request->input('password')),
            'role' => $request->input('role')
        ]);
    }
}
