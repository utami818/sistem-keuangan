<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Student::class, function (Faker $faker) {
    $nama = $faker->sentece;
    return [
        'name' => $nama,
        'slug' => Str::slug($nama),
        'description' => $faker->paragraph,
    ];
});
