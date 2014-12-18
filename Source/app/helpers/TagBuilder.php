<?php

class TagBuilder
{
	private $tagNames;

	private $errors;

	private $ids;

	public function TagBuilder($tagNames)
	{
		$this->tagNames = $tagNames;
	}

	public function isValid()
	{
   		$dbTagIds = [];

		foreach ($this->tagNames as $tag) {
			$dbTag = $this->getTagByName($tag);

			if (is_null($dbTag)) {
		        $tagValidator = Validator::make(['name' => $tag], Tag::$validationRules);
		 		if ($tagValidator->fails()) {
					$this->errors = $tagValidator;

					return false;
				}

				$dbTag = $this->createTagByName($tag);
			}
       		
			array_push($dbTagIds, $dbTag->id);
		}

		$this->ids = $dbTagIds;

		return true;
	}

	public function getIds()
	{
		return $this->ids;
	}

	public function getErrors()
	{
		return $this->errors;
	}

	private function getTagByName($name)
	{
		return Tag::where('name', $name)->first();
	}

	private function createTagByName($name)
	{
		return Tag::create(['name' => $name]);
	}
}
