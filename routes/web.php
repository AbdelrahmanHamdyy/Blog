<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
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
})->name('home');

Route::get('posts/{post}', function(Post $post) {

    // Find a post by its slug and pass it to a view called "post"

    // $post = Post::findOrFail($id);

    return view('post', [
        'post' => $post
    ]);

});

Route::get('categories/{category}', function(Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
})->name('category');

Route::get('authors/{author:username}', function(User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});
