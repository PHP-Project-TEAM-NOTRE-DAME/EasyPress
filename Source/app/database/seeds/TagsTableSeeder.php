<?php

class TagsTableSeeder extends BaseSeeder {

	public function run()
	{
		for ($i=0; $i < 20; $i++) { 
			Tag::create([
				'name' => $this->faker->word()
			]);
		}
	}

}