<?php

namespace App\Services\Admin;

use App\Models\Admin;
use App\Services\Admin\Interfaces\AdminServiceInterface;
use App\Services\Service;

class AdminService extends Service implements AdminServiceInterface
{
    public function createAdmin($params)
    {
        return Admin::create([
            'name' => $params['name'],
            'email' => $params['email'],
            'password' => \Hash::make($params['password']),
            'role' => $params['role']
        ]);
    }

    public function getAllAdmin()
    {
        return Admin::all();
    }
}
