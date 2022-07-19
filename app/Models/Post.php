<?php

namespace App\Models;

class Post 
{
    public static function find($slug)
    {
        $path = resource_path("posts/{$slug}.html");

        if (!file_exists($path)) {
            throw new ModelNotFoundException();
        }
        $post = cache()->remember("posts.{$slug}", now()->addMinutes(20), function() use ($path){
            // var_dump('file_get_contents');
            return file_get_contents($path);
        });

        return $post;
    }
}
?>