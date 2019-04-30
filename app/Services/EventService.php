<?php

namespace Broadcasting\Services;

use Broadcasting\Models\Event;
use Cache;

class EventService
{
    
	private $event;

	public function __construct(Event $event)
	{
		$this->event = $event;
	}

	private function query()
	{
		return $this->event->query();
	}

	public function findEventById($userId)
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

	public function create(Event $event)
	{
		return $event->save();
	}

	public function update(Event $event)
	{
		return $this->create($event);
	}

	public function delete(Event $event)
	{
		return $event->delete();
	}

}
