<?php

use App\Models\Category;
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

    /* \Illuminate\Support\Facades\DB::listen(function ($query) {
        logger($query->sql->bindings);
    }); This prints executed queries to the log */

    // Or use the clockwork tool for debugging

    $posts = Post::with('category')->get();

//    $posts = array_map(function ($file)  {
//        $document = YamlFrontMatter::parseFile($file);
//        return new Post(
//            $document->title,
//            $document->excerpt,
//            $document->date,
//            $document->body(),
//            $document->slug
//        );
//    }, $files);
//    foreach($files as $file) {
//        $document = YamlFrontMatter::parseFile($file);
//        $posts[] = new Post(
//            $document->title,
//            $document->excerpt,
//            $document->date,
//            $document->body(),
//            $document->slug
//        );
//    }

    // $posts = Post::all();
    return view('posts', [
    'posts' => $posts
    ]);
});

Route::get('posts/{post}', function(Post $post) {

    // Find a post by its slug and pass it to a view called "post"

    // $post = Post::findOrFail($id);

    return view('post', [
        'post' => $post
    ]);

});

Route::get('categories/{category}', function(Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
