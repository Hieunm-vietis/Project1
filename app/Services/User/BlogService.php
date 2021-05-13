<?php

namespace App\Services\User;

use App\Services\User\Interfaces\BlogServiceInterface;
use App\Services\Service;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogService extends Service implements BlogServiceInterface
{
    public function getAllBlogs()
    {
        return Blog::with('user')->paginate(5);
    }

    public function getBlogsFollowing()
    {
        $user_ids = DB::table('follows')->where('user_id', \Auth::user()->id)->pluck('user_follow_id');
        $blogs = Blog::with('user')->wherein('user_id', $user_ids)->paginate(5);

        return $blogs;
    }

    public function getBlogsForMe()
    {
        $blogs = Blog::with('user')->where('user_id', \Auth::user()->id)->paginate(5);

        return $blogs;
    }

    public function store($params, $fileImg)
    {
        $filename = time() . $fileImg->getClientOriginalName();

        if ($fileImg->move('ImgBlog', $filename)) {
            return Blog::create([
                'title' => $params['title'],
                'user_id' => \Auth::user()->id,
                'content' => $params['content'],
                'image' => '/ImgBlog/' . $filename
            ]);
        } else {
            return false;
        }  
    }

    public function update($params, $blog)
    {
        return $blog->update([
            'title' => $params['title'],
            'content' => $params['content']
        ]);
    }

    public function delete($blog)
    {
        return $blog->delete();
    }
}
