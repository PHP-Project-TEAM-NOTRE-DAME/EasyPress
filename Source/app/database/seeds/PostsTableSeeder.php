<?php

class PostsTableSeeder extends BaseSeeder {

	public function run()
	{
		$userIds = User::all()->lists('id');
		$tagIds = Tag::all()->lists('id');

		for ($i=0; $i < 20; $i++) { 
			$post = Post::create([
				'title' => $this->faker->sentence(),
				'content' => $this->faker->realText(350),
				'user_id' => $userIds[rand(0, sizeof($userIds) - 1)]
			]);

			$randomTags = [];
			$tagsCount = rand(2, 6);
			for ($j=0; $j < $tagsCount; $j++) {
				$randomTag = $tagIds[rand(0, sizeof($tagIds) - 1)];
				array_push($randomTags, $randomTag);
			}

			$post->tags()->sync(array_unique($randomTags));
		}
	}
}