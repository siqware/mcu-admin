<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Bachelor::class, function (Faker $faker) {
    return [
        'staff_id' => 1,
        'specialty' => 'ពត៌មានវិទ្យា',
        'dob_teach' => '10-01-2015',
        'start_teach' => '10-01-2016',
        'end_teach' => '10-01-2019',
    ];
});
