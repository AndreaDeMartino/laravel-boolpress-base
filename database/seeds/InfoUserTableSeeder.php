<?php

use Illuminate\Database\Seeder;
use App\InfoUser;
use App\User;
use Faker\Generator as Faker;

class InfoUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        $userData = User::all();

        foreach($userData as $user){

            $newInfo = new InfoUser();

            $newInfo->user_id = $user->id;
            $newInfo->phone = $faker->phoneNumber();
            $newInfo->address = $faker->address();
            $newInfo->avatar = $faker->imageUrl();
            
            $newInfo->save();
        }
    }
}
