<?php

use Faker\Generator;
use Illuminate\Database\Seeder;

class CustomerFakerSeeder extends Seeder
{

    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i <= 100; $i++):
            \DB::table('customers')
                ->insert([
                    'name' => $faker->name,
                    'address' => $faker->address,
                    'city' => $faker->city,
                    'phone' => $faker->phoneNumber,
                    'since' => $faker->datetime(),
                ]);
        endfor;
    }

    public function __run()
    {
        //$factory = Faker\Factory::create();
        define(App\Customer::class, function (Faker\Generator $faker) {

            return [
                'name' => $faker->name,
                'address' => $faker->address,
                'city' => $faker->city,
                'phone' => $faker->phoneNumber,
                'since' => $faker->datetime(),
            ];
        });
        //$faker = Faker\Factory::create();

        
    }
}
