<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class BaseSeeder extends Seeder {

	protected $faker = null;
		
	public function __construct()  {
		$this->faker = Faker::create();
	}
}