<?php

use Illuminate\Database\Seeder;
use App\Post;
use App\User;
use Faker\Generator as Faker;

// Import Str per slug e operazioni stringhe:
use Illuminate\Support\Str;

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
            $title = $faker->text(50);

            // Prende un id random della tabella users
            $newPost->user_id = $users->random()->id;

            $newPost->title = $title;
            $newPost->body = $faker->text(250);

            // Creazione Slug
            $newPost->slug = Str::slug($title, '-');

            $newPost->save();
        }
    }
}
