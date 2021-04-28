<?php

namespace App\Services\User;

use App\Services\User\Interfaces\BlogServiceInterface;
use App\Services\Service;
use App\Models\Blog;

class BlogService extends Service implements BlogServiceInterface
{
    public function getAllBlogs()
    {
        return Blog::paginate(5);
    }
}
