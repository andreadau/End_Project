<?php

use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;
use App\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $typesOfCuisines=[
            [
                'name' => 'Sushi',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/sushi.png',
            ],
            [
                'name' => 'Giapponese',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/japanese.png',
            ],
            [
                'name' => 'Asiatico',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/asian.png',
            ],
            [
                'name' => 'Cinese',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/chinese.png',
            ],
            [
                'name' => 'Frutti di mare',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/seafood.png',
            ],
            [
                'name' => 'Indiano',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/indian.png',
            ],
            [
                'name' => 'Hamburger',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/burger.png',
            ],
            [
                'name' => 'Americano',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/american.png',
            ],
            [
                'name' => 'BBQ',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/bbq.png',
            ],
            [
                'name' => 'Italiano',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/italian.png',
            ],
            [
                'name' => 'Comfort food',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/comfortfood.png',
            ],
            [
                'name' => 'Panini',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/sandwich.png',
            ],
            [
                'name' => 'Pizza',
                'src' => 'https://d4p17acsd5wyj.cloudfront.net/shortcuts/cuisines/pizza.png',
            ],
        ];
        
        foreach ($typesOfCuisines as $types) {
            $newType = new Type();
            $newType->name = $types['name'];
            $newType->src = $types['src'];   
            $newType->save();
        }
    }
}