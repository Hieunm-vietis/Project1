<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\User\Interfaces\BlogServiceInterface;
use App\Models\Blog;
use App\Http\Requests\User\Blogs\UpdateBlogRequest;
use App\Http\Requests\User\Blogs\DeleteBlogRequest;

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

    public function follow()
    {
        $blogs = $this->blogService->getBlogsFollowing();

        return view('users.blog.follow', compact('blogs'));
    }

    public function myblog()
    {
        $blogs = $this->blogService->getBlogsForMe();

        return view('users.blog.my_blog', compact('blogs'));
    }

    public function update(Blog $blog, UpdateBlogRequest $request)
    {
        $params = $request->only('title', 'content'); 

        if ($this->blogService->update($params, $blog)) {
            return back()->withSuccess([
                'Update Blog Success'
            ]);
        } else {
            return back()->withErrors([
                'errorUpdateBlog' => 'Have an error while update'
            ]);
        }
    }

    public function delete(Blog $blog, DeleteBlogRequest $request)
    {
        if ($this->blogService->delete($blog)) {
            return redirect()->route('user.blogs.index')->withSuccess([
                'Delete Blog Success'
            ]);
        } else {
            return back()->withErrors([
                'errorUpdateBlog' => 'Have an error while delete'
            ]);
        }
    }
}
