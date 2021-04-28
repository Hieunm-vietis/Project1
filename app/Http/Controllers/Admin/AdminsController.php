<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Admins\CreateAdminRequest;
use App\Services\Admin\Interfaces\AdminServiceInterface;

class AdminsController extends Controller
{
    protected $adminService;

    public function __construct(AdminServiceInterface $adminService)
    {
        $this->adminService = $adminService;
    }

    public function index()
    {
        $admins = $this->adminService->getAllAdmin();

        return view('admins.admin.index', compact('admins'));
    }

    public function create()
    {
        return view('admins.admin.create');
    }

    public function store(CreateAdminRequest $request)
    {
        $params = $request->only('name', 'email', 'password', 'role');

        if ($this->adminService->createAdmin($params)) {
            return back()->withSuccess('Create is successfuly');
        } else {
            return back()->withInput()->withErrors([
                'errorCreareAdmin' => 'Have Error'
            ]);
        }
    }
}
