<?php

class TagsTableSeeder extends BaseSeeder {

	public function run()
	{
		$tagNames = [];
		while (count($tagNames) <= 20) { 
			$currentWord = $this->faker->word();
			if (in_array($currentWord, $tagNames)) {
				continue;
			}

			array_push($tagNames, $currentWord);

			Tag::create([
				'name' => $currentWord
			]);
		}
	}

}