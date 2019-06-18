<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Mother::class, function (Faker $faker) {
    return [
        'staff_id'=> 1,
        'name'=> 'Hem Oeurng',
        'dob'=> '10-01-1971',
        'job'=> 'Investor',
        'address'=> 'Siem Reap',
    ];
});
