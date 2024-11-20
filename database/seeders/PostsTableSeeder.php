<?php

namespace Database\Seeders;

use App\Models\Posts;    
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run():void   
    {
        Posts::factory()->count(10)->create();
    }
}
