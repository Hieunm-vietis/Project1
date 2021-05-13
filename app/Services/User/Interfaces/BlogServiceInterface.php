<?php

namespace App\Services\User\Interfaces;

use Illuminate\Http\Request;

interface BlogServiceInterface
{
    public function getAllBlogs();
    public function getBlogsFollowing();
    public function getBlogsForMe();
    public function update($params, $blog);
    public function delete($blog);
    public function store($params, $fileImg);
}
