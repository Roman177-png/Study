<?php
use App\Models\Topic;
use App\Models\Article;
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

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text(900),
        'topic_id' => $faker->numberBetween(1,Topic::count()),
        'user_id' => $faker->numberBetween(1,User::count()),
        ];
});
