<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\models\Book;
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
        // create a user (john doe) and create 20 fake posts  with their user_id point towards john doe. 
        // so john doe is the author of the 20 posts
        
        // $user = User::factory()->create([
        //     'name' => 'john doe',
        //     'email' => 'john@gmail.com',
        // ]);

        // Book::factory(20)->create([
        //     'user_id' => $user->id
        // ]);
    }
    
}
