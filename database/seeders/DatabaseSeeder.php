<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create([
            'name' => 'lisa laravel'
        ]);

        Post::factory(5)->create([
            'user_id' => $user->id
        ]);

        // // \App\Models\User::factory()->create([
        // //     'name' => 'Test User',
        // //     'email' => 'test@example.com',
        // // ]);
        // $personal = Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal'
        // ]);

        // $work = Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work'
        // ]);

        // $hobby = Category::create([
        //     'name' => 'Hobby',
        //     'slug' => 'hobby'
        // ]);
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $personal->id,
        //     'title' => 'My family Post',
        //     'slug' => 'My-first-post',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime qui architecto quis reiciendis repellendus minima neque natus reprehenderit dolores veniam tempore sint, itaque dicta, eos ipsum. Nihil libero expedita animi!'
        // ]);

        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $work->id,
        //     'title' => 'My Work Post',
        //     'slug' => 'My-second-post',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime qui architecto quis reiciendis repellendus minima neque natus reprehenderit dolores veniam tempore sint, itaque dicta, eos ipsum. Nihil libero expedita animi!'
        // ]);
        // Post::create([
        //     'user_id' => $user->id,
        //     'category_id' => $hobby->id,
        //     'title' => 'My Hobby Post',
        //     'slug' => 'My-third-post',
        //     'excerpt' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit.',
        //     'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maxime qui architecto quis reiciendis repellendus minima neque natus reprehenderit dolores veniam tempore sint, itaque dicta, eos ipsum. Nihil libero expedita animi!'
        // ]);
    }
}
