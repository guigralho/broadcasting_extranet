<?php

namespace Broadcasting\Services;

use Broadcasting\Models\Photographer;
use Cache;

class PhotographerService
{
    
	private $photographer;

	public function __construct(Photographer $photographer)
	{
		$this->photographer = $photographer;
	}

	private function query()
	{
		return $this->photographer->query();
	}

	public function findPhotographerById($userId)
	{
		return $this->query()->find($userId);
	}

	public function list(array $search = [])
	{
		$searchString = data_get($search, 'searchString', false);
		$searchStatus = data_get($search, 'searchStatus', false);
		$query = $this->query();

		if ($searchString) {
			$query = $query->where(function($query) use($searchString) {
				return $query->where('name', 'like', "%{$searchString}%");
			});
		}

		if ($searchStatus) {
			$query = $query->where('status', $searchStatus);
		}

		return $query;
	}

	public function create(Photographer $photographer)
	{
		return $photographer->save();
	}

	public function update(Photographer $photographer)
	{
		return $this->create($photographer);
	}

	public function delete(Photographer $photographer)
	{
		return $photographer->delete();
	}

}
