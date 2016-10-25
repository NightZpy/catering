<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\Models\Kitchen\Provider::class, function (Faker\Generator $faker) {
    return [
        'code' => $faker->unique()->numberBetween(1, 1000),
        'name' => $faker->unique()->company,
        'specialty' => $faker->randomElement([
        	'Breakfast and Sandwiches',
			'Chinese Restaurants',
			'Italian Restaurants',
			'Pizza',
			'Indian Restaurants',
			'Japanese Restaurants',
			'Thai Restaurants'
		]),
        'district' => $faker->city,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'movil1' => $faker->phoneNumber,
        'movil2' => $faker->phoneNumber,
        'contact' => $faker->name,
        'email' => $faker->companyEmail,
    ];
});

$factory->define(App\Models\Presentation::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->randomElement([
            'Botella',
            'Saco',
            'Enlatado'
        ])
    ];
});

$factory->define(App\Models\Unit::class, function (Faker\Generator $faker) {
    $names = [
        'Litros',
        'Gramos',
        'Kilos',
    ];

    $symbols = [
        'L',
        'g',
        'Kg',
    ];

    $i = $faker->unique()->numberBetween(0, 2);
    return [
        'name' => $names[$i],
        'symbol' => $symbols[$i]
    ];
});