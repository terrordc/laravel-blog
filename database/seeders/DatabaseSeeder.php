<?php

namespace Database\Seeders;
use App\Models\Post;
use App\Models\User;
use App\Models\Role;
use App\Models\Comment;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        Post::factory(100)->create();
        User::factory(10)->create();

        Role::create(['name'=>'user']);
        Role::create(['name'=>'editor']);
        Role::create(['name'=>'administrator']);

        Comment::factory(100)->create();

        Category::factory(10)->create();

    }
}
