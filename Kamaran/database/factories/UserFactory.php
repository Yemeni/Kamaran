<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
	return [
		'name'           => $faker->name,
		'email'          => $faker->unique()->safeEmail,
		'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
		'remember_token' => str_random(10),
	];
});

$factory->define(\App\Category::class, function (Faker $faker) {
	return [
		'name' => $faker->colorName,
	];
});

$factory->define(\App\Order::class, function (Faker $faker) {
	return [
		'user_id'          => $faker->numberBetween(1, 2),
		'category_id'      => 1,
		'supplier_id'      => $faker->numberBetween(1, 2),
		'item_id'          => $faker->numberBetween(1, 10),
		'quantity'         => $faker->numberBetween(200, 1220),
		'cost'             => $faker->numberBetween(100000, 1000000),
		'order_status'     => $faker->randomElement(['pending', 'approved', 'cancelled']),
		'date'             => \Carbon\Carbon::now()->subMinutes(20),
		'letter_of_credit' => 'cif',
		'approval_date'    => \Carbon\Carbon::now(),
	];
});

$factory->define(\App\Supplier::class, function (Faker $faker) {
	return [
		'name'    => $faker->company,
		'address' => $faker->streetAddress,
		'phone'   => $faker->phoneNumber,
		'email'   => $faker->safeEmail
	];
});



$factory->define(\App\Item::class, function (Faker $faker) {
	return [
		'category_id'   => 1,
		'name'          => $faker->colorName,
		'description'   => $faker->paragraph,
		'specification' => $faker->paragraph,
		'unit'          => $faker->randomElement(['KG','Gram','Tonne','Liter','Milliliter','Barrel','Gallon','Bottle','Meter','Centimeter','Kilometer','Cartons','Pack','Packet','Box']),
		'danger_level'  => $faker->randomElement(['low', 'normal', 'high']),
	];
});

//$factory->define(\App\Inventory::class, function(Faker $faker){
//	return [
//		'user_id' => $faker->numberBetween(1,5),
//		'category_id' => 1,
//		'shipment_id' => $faker->
//	];
//});
