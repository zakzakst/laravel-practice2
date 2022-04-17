<?php
use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function(Faker $faker) {
  return [
    'name' => $faker->name,
    'mail' => $faker->email,
    'age' => $faker->numberBetween(1, 100),
  ];
});