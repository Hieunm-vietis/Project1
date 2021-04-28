<?php

namespace App\Services\User\Interfaces;

use Illuminate\Http\Request;

interface UserServiceInterface
{
    public function storeUser($params);
    public function setStatusUser($user);
    public function show($user);
}
