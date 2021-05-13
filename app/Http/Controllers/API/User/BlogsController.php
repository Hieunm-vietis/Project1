<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->search) {
            $blogs = Blog::with('user')->where('title', 'LIKE','%'.$request->search.'%')->paginate(5);
        } else {
            $blogs = Blog::with('user')->paginate(5);
        }

        return response()->json($blogs);
    }

    public function search(Request $request)
    {
        return response()->json($data);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('ImgBlog', $imageName);

            Blog::create([
                'title' => $request->input('title'),
                'content' => $request->input('content'),
                'user_id' => 1,
                'image' => '/ImgBlog/' . $imageName
            ]);

            return response([
                'messseger' => 'Succcess'
            ], 200);
        } else {
            return response()->json(['errorsFile' => 'Have errors'], 500);
        }
    }
}
