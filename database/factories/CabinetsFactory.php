<?php

use App\Models\Cabinet;
use App\Models\Category;
use App\Models\Offer;
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Cabinet::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'date_of_birth' => $faker->date(1999-12-10),
        'city_of_residence'=>$faker->city,
        'telegram'=>$faker->text(30),
        'user_id' => $faker->numberBetween(1,User::count()),
        'about_self' => $faker->text(500),
        ];
});
