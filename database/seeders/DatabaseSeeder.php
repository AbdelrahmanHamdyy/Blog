<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $family = Category::create(['name'=>'Personal', 'slug' => 'personal']);
        $work = Category::create(['name'=>'Work', 'slug' => 'work']);
        $hobbies = Category::create(['name'=>'Hobbies', 'slug' => 'hobbies']);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Post::create(['user_id' => $user->id,
            'category_id' => $family->id,
            'title' => 'My Family Post',
            'slug' => 'my-first-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum
            dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.</p>']);

        Post::create(['user_id' => $user->id,
            'category_id' => $work->id,
            'title' => 'My Work Post',
            'slug' => 'my-second-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum
            dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.</p>']);

        Post::create(['user_id' => $user->id,
            'category_id' => $hobbies->id,
            'title' => 'My Hobbies Post',
            'slug' => 'my-third-post',
            'excerpt' => '<p>Lorem ipsum dolar sit amet.</p>',
            'body' => '<p>Lorem ipsum dolor sit amet,
            consectetur adipiscing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna
            aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation ullamco laboris nisi ut aliquip
            ex ea commodo consequat. Duis aute irure dolor
            in reprehenderit in voluptate velit esse cillum
            dolore eu fugiat nulla pariatur.
            Excepteur sint occaecat cupidatat non proident,
            sunt in culpa qui officia deserunt mollit anim id est laborum.</p>']);
    }
}
