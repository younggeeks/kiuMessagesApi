<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
//
//$factory->define(App\User::class, function (Faker\Generator $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->email,
//        'password' => bcrypt(str_random(10)),
//        'remember_token' => str_random(10),
//    ];
//});
//$factory->define(App\Message::class, function (Faker\Generator $faker) {
//    return [
//        'title' => $faker->firstName,
//        'body' => $faker->paragraph(120),
//        'recepient' => $faker->domainWord,
//        'date' => $faker->date(),
//        'user_id' => 1,
//    ];
//});
$factory->define(App\Student::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->phoneNumber,
        'intake' => 100,
        'program_code' => str_random(3),
    ];
});



