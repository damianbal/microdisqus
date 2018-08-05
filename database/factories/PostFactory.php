<?php

use Faker\Generator as Faker;

use App\User;
use App\Tag;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        //
        'content' => $faker->text,
        'user_id' => factory(User::class)->create()->id,
        'tag_id' => factory(Tag::class)->create()->id,
        'image' => 'images/random.jpeg'
    ];
});
