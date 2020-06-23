<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Post;
use Faker\Generator as Faker;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $records = 30;
        $posts = Post::all();

        for ($i = 0; $i < $records ; $i++) { 
            
            $newComment = new Comment();

            $newComment->post_id = $posts->random()->id;

            $newComment->author = $faker->name();
            $newComment->message = $faker->text();
            $newComment->vote = $faker->numberBetween(1,10);

            $newComment->save();
            
        }
    }
}
