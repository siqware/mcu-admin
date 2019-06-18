<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Staff::class, function (Faker $faker) {
    return [
        'gov_official_no' => 1,
        'khmer_name' => 'ទុន ​ចំរ៉ើន',
        'latin_name' => 'Tun Cham Roeun',
        'sex' => 'Male',
        'dob' => '10-01-1999',
        'id_no' => '938984uf8',
        'bank_acc_no' => '0002559',
        'last_appointment' => '10-01-2015',
        'start_work' => '10-01-2016',
        'real_appoint' => '10-01-2017',
        'skill' => 'IT',
        'pod' => 'Siem Reap',
        'address' => 'Siem Reap',
        'phone_num' => '078654923',
        'email' => 'chamroeuntun25@outlook.com',
    ];
});
