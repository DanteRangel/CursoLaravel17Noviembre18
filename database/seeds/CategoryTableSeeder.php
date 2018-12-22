<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create();

        for($i = 0; $i < 50; $i++) {
            Category::create([
                'name' => $faker->jobTitle,
            ]);
        }
    }
}
