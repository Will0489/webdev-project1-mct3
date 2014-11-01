<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
        Eloquent::unguard();

        $faker = Faker::create();

        $user = User::create(array(
            'email' => 'william.blommaert@student.kdg.be',
            'photo' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
            'about' => $faker->text,
            'location' => 'Belgium',
            'username' => 'William',
            'password' => 'feedr'
        ));

		foreach(range(1, 19) as $index)
		{
			User::create([
                'email' => $faker->email,
                'photo' => $faker->imageUrl($width = 100, $height = 100, 'cats'),
                'about' => $faker->text,
                'location' => $faker->country,
                'username' => $faker->userName,
                'password' => $faker->word
			]);
		}
	}

}