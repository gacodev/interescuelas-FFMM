<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Sport::class, static function (Faker\Generator $faker) {
    return [
        'sport' => $faker->sentence,
        'description' => $faker->sentence,
        'image' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Award::class, static function (Faker\Generator $faker) {
    return [
        'award' => $faker->sentence,
        'description' => $faker->sentence,
        'image' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Doc::class, static function (Faker\Generator $faker) {
    return [
        'doc_type' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Competence::class, static function (Faker\Generator $faker) {
    return [
        'sport_id' => $faker->sentence,
        'categorie_id' => $faker->sentence,
        'quantity_of_participants' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Score::class, static function (Faker\Generator $faker) {
    return [
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Participant::class, static function (Faker\Generator $faker) {
    return [
        'number_id' => $faker->sentence,
        'name' => $faker->firstName,
        'email' => $faker->email,
        'phone' => $faker->sentence,
        'birthday' => $faker->date(),
        'doc_id' => $faker->sentence,
        'force_id' => $faker->sentence,
        'nationality_id' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Nationality::class, static function (Faker\Generator $faker) {
    return [
        'nationality' => $faker->sentence,
        'flag_image' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, static function (Faker\Generator $faker) {
    return [
        'categorie' => $faker->sentence,
        'description' => $faker->sentence,
        'image' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Force::class, static function (Faker\Generator $faker) {
    return [
        'force' => $faker->sentence,
        'description' => $faker->sentence,
        'image' => $faker->sentence,
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Score::class, static function (Faker\Generator $faker) {
    return [
        'competence_id' => $faker->sentence,
        'participant_id' => $faker->sentence,
        'award_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
