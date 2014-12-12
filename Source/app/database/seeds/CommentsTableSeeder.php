<?php

class CommentsTableSeeder extends BaseSeeder {

	public function run()
	{
		$userIds = User::all()->lists('id');
		$postIds = Post::all()->lists('id');

		for ($i=0; $i < 100; $i++) { 
			Comment::create([
				'content' => $this->faker->realText(rand(40, 100)),
				'used_id' => $userIds[rand(0, sizeof($userIds) - 1)],
				'post_id' => $postIds[rand(0, sizeof($postIds) - 1)]
			]);
		}
	}

}