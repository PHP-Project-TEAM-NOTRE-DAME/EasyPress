<?php

class UsersTableSeeder extends BaseSeeder {

	public function run()
	{
		for ($i=0; $i < 10; $i++) { 
			User::create([
				'email' => $this->faker->email(), // TODO: Secure unique emails!
				'password' => $this->faker->sha256()
			]);
		}

		User::create([
			'email' => 'admin@admin.com',
			'password' => Hash::make('admin')
		]);

		User::create([
			'email' => 'user@user.com',
			'password' => Hash::make('user')
		]);
	}
}