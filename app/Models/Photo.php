<?php

namespace Broadcasting\Models;

use Broadcasting\Observers\DeleteObserver;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use SoftDeletes;

    public static function boot() {
        parent::boot();
        self::observe(new DeleteObserver());
    }

    public function imageHomeBrPath()
    {
        $img = '/img/not-found.jpg';

        if (Storage::exists($this->image)) {
            $img = Storage::url($this->image);
        }

        return $img;
    }
}
