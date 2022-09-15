<?php

use Faker\Generator as Faker;
use App\Models\State;
$factory->define(App\State::class, function (Faker $faker) {
    return [
        'name' => 'Ohio',
        'abbreviation' => 'OH'
    ];
});
