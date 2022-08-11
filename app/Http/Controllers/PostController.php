<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()  {
        // $posts = Post::all();
        // $categories = Category::all();
        return view('posts.index', [
            'posts' => Post::latest()->filter(request(['search','category','author']))->get(),
        ]);
    }

    public function show(Post $post) {
        // Find a post by its slug and pass it to a view called "post"

        // $post = Post::findOrFail($id);

        return view('posts.show', [
            'post' => $post
        ]);
    }
}
