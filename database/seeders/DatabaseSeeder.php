<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this -> call(UserTableSeeder::class);
        $this -> call(PostsTableSeeder::class);
        $this -> call(CommentsTableSeeder::class);
           
    }
}
