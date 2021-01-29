<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->text(50),
        'slug' => $faker->unique()->slug(),
        'body' => '<p>' . $faker->text(500) . '</p>',
        'image' => 'storage/images/posts/' . $faker->image('public/storage/images/posts', 640, 480, null, false),
        'user_id' => User::all()->random()->id,
        'category_id' => Category::all()->random()->id,
    ];
});
