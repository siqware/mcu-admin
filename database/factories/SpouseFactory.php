<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Spouse::class, function (Faker $faker) {
    return [
        'staff_id'=> 1,
        'name'=> 'Theab Phany',
        'dob'=> '14-07-2000',
        'job'=> 'Investor',
        'department'=> 'BMC',
    ];
});
