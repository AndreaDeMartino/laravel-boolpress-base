<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use Faker\Generator as Faker;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $records = 10;
        $users = User::all();

        for ($i = 0; $i < $records; $i++) { 
            
            $newPost = new Post();

            // Prende un id random della tabella users
            $newPost->user_id = $users->random()->id;

            $newPost->title = $faker->text(40);
            $newPost->body = $faker->text(250);

            $newPost->save();
        }
    }
}
