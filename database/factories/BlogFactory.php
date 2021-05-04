<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Blog;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => 'What the world needs now is love, sweet love
        Its the only thing that theres just too little of
        What the world needs now is love, sweet love
        No not just for some, but for everyone
        Lord, we dont need another mountain
        There are mountains and hillsides enough to climb
        There are oceans and rivers enough to cross
        Enough to last til the end of time',
        'user_id' => random_int(1, 3),
        'image' => 'https://imgd.aeplcdn.com/476x268/n/cw/ec/38904/mt-15-front-view.jpeg?q=80'
    ];
});
