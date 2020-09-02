<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Model\Cliente\Cliente;

$factory->define(Cliente::class, function (Faker $faker) {
    return [        
        "id_cadastro" => 23434,        
        "nome" => Str::random(10),        
        "email" => $faker->unique()->safeEmail,        
        "senha" => Str::random(10),
        "cnpj_cpf" => '00582918901'
    ];
});
