<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        $user = User::factory()->create([
            'name' => "Alan Jack",
            'password' => "password123",
            'email' => "alan@email.com",
            'username' => 'aldojack1', 
            'verified' => 1,
            'isAdmin' => 1
        ]);
        Post::factory(2)->create([
            'user_id' => $user->id
        ]);
        Post::factory(12)->create();
    }
}
