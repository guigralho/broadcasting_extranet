<?php

namespace Broadcasting\Models;

use Broadcasting\Observers\DeleteObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

class Photo extends Model
{
    use SoftDeletes;

    const IMAGE_PATH = 'photos';

    public static function boot() {
        parent::boot();
        self::observe(new DeleteObserver());
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function imagePath()
    {
        $img = '/img/not-found.jpg';

        if (Storage::exists($this->image)) {
            $img = Storage::url($this->image);
        }

        return $img;
    }
}
