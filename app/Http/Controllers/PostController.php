<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()  {
        $posts = Post::latest();

        if (request('search')) {
            $posts->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('body', 'like', '%' . request('search') . '%');
        }
        // $posts = Post::all();
        $categories = Category::all();
        return view('posts', [
            'posts' => $posts->get(),
            'categories' => $categories
        ]);
    }

    public function show(Post $post) {
        // Find a post by its slug and pass it to a view called "post"

        // $post = Post::findOrFail($id);

        return view('post', [
            'post' => $post
        ]);
    }
}
