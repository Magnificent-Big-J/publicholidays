<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\PublicHolidays;
use Faker\Generator as Faker;

$factory->define(PublicHolidays::class, function (Faker $faker) {
    return [
        'name' => 'New Year\'s Day',
        'holiday_date' => '2020-01-01'
    ];
});
