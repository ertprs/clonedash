<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $senha = str_pad(rand(0,99999), 5, '0', STR_PAD_LEFT);
    $key   = env("DB_ENCRYPY_KEY");
    $token = DB::select(DB::raw("SELECT AES_ENCRYPT('$senha','$key') as token"));
    $token = $token[0]->token;

    return  [
        'id_cadastro' => 23096,
        'nome_usuario' => $faker->name,
        'login' => str_pad(rand(0,99999), 5, '0', STR_PAD_LEFT),
        'senha' => $senha,
        'email' => $faker->unique()->safeEmail,        
        'api_key' => $token,
    ];
 
});
