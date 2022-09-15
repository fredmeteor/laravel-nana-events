<?php

use Faker\Generator as Faker;
use App\Models\Category;
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name'           => 'PHP'
    ];
});
