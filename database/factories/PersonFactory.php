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

$factory->state(Person::class, 'upper', function($faker) {
  return [
    'name' => strtoupper($faker->name()),
  ];
});

$factory->state(Person::class, 'lower', function($faker) {
  return [
    'name' => strtolower($faker->name()),
  ];
});

$factory->afterMaking(Person::class, function($person, $faker) {
  $person->name .= ' [making]';
  $person->save();
});

$factory->afterCreating(Person::class, function($person, $faker) {
  $person->name .= ' [creating]';
  $person->save();
});

$factory->afterMakingState(Person::class, 'upper', function($person, $faker) {
  $person->name .= ' [making state]';
  $person->save();
});

$factory->afterCreatingState(Person::class, 'lower', function($person, $faker) {
  $person->name .= ' [creating state]';
  $person->save();
});