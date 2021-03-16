<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20 ; $i++) {
            $newRestaurant = new Restaurant;
            $newRestaurant->name = $faker->name();
            $newRestaurant->address = $faker->address();
            $newRestaurant->phone = $faker->phoneNumber();
            $newRestaurant->cover = $faker->imageUrl(640, 480, true);       
            $newRestaurant->save();
        }
    }
}