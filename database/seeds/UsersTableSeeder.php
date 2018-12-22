<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        User::create([
            'name' => 'Dante Rangel Robles',
            'email' => 'dante.rangelrobles@gmail.com',
            'password' => bcrypt('123456'),
            'id_permission' => 1
            ]
        );
        for($i = 0; $i < 100; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->freeEmail,
                'password' => bcrypt('123456'),
                'id_permission' => rand(2,3)
                ]
            );  
        }

    }
}
