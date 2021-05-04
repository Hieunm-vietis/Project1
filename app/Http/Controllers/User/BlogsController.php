<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\Interfaces\BlogServiceInterface;
use App\Models\Blog;

class BlogsController extends Controller
{
    protected $blogService;

    public function __construct(BlogServiceInterface $blogService)
    {
        $this->blogService = $blogService;
    }

    public function index()
    {
        $blogs = $this->blogService->getAllBlogs();

        return view('users.blog.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('users.blog.show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view('users.blog.edit', compact('blog'));
    }
}
