<?php

namespace Broadcasting\Services;

use Broadcasting\Models\Photo;
use Cache;
use Storage;

class PhotoService
{
    
	private $photo;

	public function __construct(Photo $photo)
	{
		$this->photo = $photo;
	}

	private function query()
	{
		return $this->photo->query();
	}

	public function findPhotoById($userId)
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
				return $query->where('name', 'like', "%{$searchString}%")
					->orWhere('code', 'like', "%{$searchString}%");
			});
		}

		if ($searchStatus) {
			$query = $query->where('status', $searchStatus);
		}

		return $query;
	}

	public function create(Photo $photo)
	{
        if (!Storage::exists($photo->image) and $photo->image != null) {
            $oldBlog = $this->findPhotoById($photo->id);
            if (!empty($oldBlog))
                Storage::delete($oldBlog->image);

            $photo->image = $this->saveFile($photo->image, Photo::IMAGE_PATH);
        }

        
        return $photo->save();
	}

	public function update(Photo $photo)
	{
		return $this->create($photo);
	}

	public function delete(Photo $photo)
	{
        Storage::delete($photo->image);

		return $photo->delete();
	}

    public function saveFile($file, $filePath)
    {
        $path = Storage::putFile($filePath, $file, 'public');

        return $path;
    }
}
