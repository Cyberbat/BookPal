<?php

use Faker\Generator;


$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'phone'=>$faker->phonenumber,
        'avatar_path'=>'http://via.placeholder.com/150x150',
    ];
});

$factory->define(App\message::class, function (Faker $faker) {

	do{
		$from = rand(1,15);
		$to = rand(1,15);
	}while($from===$to);


    return [
        'from' => $from,
        'to' => $to,
        'text' => $faker->sentence,
       
    ];
});



$factory->define(App\Thread::class, function($faker) {

	return[
			'user_id' => function(){

				return factory('App\User')->create()->id;

			},
			'channel_id' => function(){

				return factory('App\Channel')->create()->id;

			},

			'title' => $faker->sentence,
			'body' => $faker->paragraph,


	];
});

$factory->define(App\Books::class, function($faker) {

	return[
			'user_id' => function(){

				return factory('App\User')->create()->id;

			},
				'genre_id' => function(){

				return factory('App\Genre')->create()->id;

			},
			'title' => $faker->sentence,
			'body' => $faker->paragraph,
			'author' => $faker->name,
			'condition' => $faker->name,
			'tumbnail_image'=>'http://via.placeholder.com/150x150'


	];
});





$factory->define(App\Genre::class, function($faker) {

	$faker = Faker\Factory::create('sk_SK');

		$name=$faker->country;

	$pop2 = App\Channel::where('name', '=', $name);

	

if ($pop2->exists()) {
 
}else{

	return[

	'name'=>$name,

	'slug'=>$name,
 ];
};

	
});

$factory->define(App\Channel::class, function($faker) {

	$faker = Faker\Factory::create('sk_SK');

	$name=$faker->streetSuffix;

	$pop2 = App\Channel::where('name', '=', $name);

	

if ($pop2->exists()) {
 
}else{

	return[

	'name'=>$name,

	'slug'=>$name,
 ];
};

	
});

$factory->define(App\Reply::class, function($faker) {

	return[
			'thread_id' => function(){

				return factory('App\Thread')->create()->id;

			},
			'user_id' => function(){

				return factory('App\User')->create()->id;

			},
			'body' => $faker->paragraph,



	];
});