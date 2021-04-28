<?php

namespace App\Services\Admin\Interfaces;

use Illuminate\Http\Request;

interface AdminServiceInterface
{
    public function createAdmin($params);
    public function getAllAdmin();
}
