<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Category;
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
        //Admins
        User::factory()->create([
            'name' => 'Marc Shelby',
            'username' => 'marc21',
            'email' => 'marc12@gmail.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Kyaw Kyaw',
            'username' => 'kyawZ',
            'email' => 'kyaw@gmail.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Pai',
            'username' => 'paiP',
            'email' => 'pai@gmail.com',
            'role' => 'admin',
        ]);

        // authors
        User::factory(5)->create([
            'role' => 'author'
        ]);

        // normal users
        User::factory(10)->create();

        // categories
        Category::factory(5)->create();

        // articles
        Article::factory(20)->create();

        // comments
        Comment::factory(40)->create();
    }
}
