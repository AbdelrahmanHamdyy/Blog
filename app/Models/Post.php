<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title, $excerpt, $date, $body, $slug;

    /**
     * @param $title
     * @param $excerpt
     * @param $date
     * @param $body
     */
    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    public static function find($slug)
    {
        // Of all the blog posts, find the one with a slug
        // that matches the one requested
        $posts = static::all();
        $post = $posts->firstWhere('slug', $slug);
        return $post;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function() {
            $files = File::files(resource_path("posts/"));
            $posts = collect($files)->map(function($file) {
                return YamlFrontMatter::parseFile($file);
            })->map(function ($document) {
                return new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                );
            })->sortByDesc('date');
            return $posts;
        });
        // You now have to forget the cache explicitly
    }
}
?>
