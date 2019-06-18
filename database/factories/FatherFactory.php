<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Father::class, function (Faker $faker) {
    return [
        'staff_id'=> 1,
        'name'=> 'Ey Khon',
        'dob'=> '10-01-1970',
        'job'=> 'Investor',
        'address'=> 'Siem Reap',
    ];
});
