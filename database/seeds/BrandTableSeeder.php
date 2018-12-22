<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Brand;

class BrandTableSeeder extends Seeder
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
            Brand::create([
                'name' => $faker->jobTitle,
            ]);
        }
    }
}
