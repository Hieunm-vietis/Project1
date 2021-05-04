<?php

namespace App\Services\User;

use App\Services\User\Interfaces\BlogServiceInterface;
use App\Services\Service;
use App\Models\Blog;

class BlogService extends Service implements BlogServiceInterface
{
    public function getAllBlogs()
    {
        list($blogs, $isFollow) = $this->userService->show($user);

        return Blog::with('user')->paginate(5);
    }
}
