<?php

class UsersTableSeeder extends BaseSeeder {

	public function run()
	{
		$userEmails = [];
		while (count($userEmails) <= 10) { 
			$currentEmail = $this->faker->email();
			if (in_array($currentEmail, $userEmails)) {
				continue;
			}

			array_push($userEmails, $currentEmail);

			User::create([
				'email' => $currentEmail,
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