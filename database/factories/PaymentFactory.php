<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        'student_id' =>function(){
            return factory(App\Student::class)->create()->id;
        },
        'nis' => function(){
            return factory(App\Payment::classs)->create()->id;
        },
        'payment' => $faker->sentence,
    ];
});
