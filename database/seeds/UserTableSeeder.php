<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        $records = 3;

        for ($i = 0; $i < $records; $i++) { 
            $newUser = new User();

            $newUser->name = $faker->name();
            $newUser->email = $faker->email();
            //Hash Laravel per password crittografata
            $newUser->password = Hash::make($faker->password);

            $newUser->save();
        }

    }
}
