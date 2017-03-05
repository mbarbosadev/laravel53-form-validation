<?php

require_once __DIR__.'/documento.php';

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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {
	
	$cpfs = cpfs();
	
	return [
			'nome' => $faker->name,
			'documento'=>$cpfs[array_rand($cpfs, 1)],
			'email' => $faker->email,
			'telefone' => $faker->phoneNumber,
			'inadimplente' => rand(0, 1),
	];
});
	
