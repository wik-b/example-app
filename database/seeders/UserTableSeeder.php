<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
 public function definition()
 {
    return [
     'name' => fake()->name(),
     'username' => fake()->username(),
     'email' => fake()->email(),
     'password' => fake()->password(),
    ]
 }


}
