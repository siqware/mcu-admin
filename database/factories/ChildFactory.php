<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Child::class, function (Faker $faker) {
    return [
        'staff_id'=> 1,
        'name'=> 'Chan Roeun',
        'dob'=> '10-01-2019',
        'job'=> 'Investor',
        'address'=> 'Siem Reap',
    ];
});
