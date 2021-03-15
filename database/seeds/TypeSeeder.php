<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            $type = new Type();
            $type->name = $faker->state();
            $type->save();
        }
    }
}