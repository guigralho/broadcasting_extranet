<?php

namespace Broadcasting\Models;

use Broadcasting\Observers\DeleteObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Photographer extends Model
{
    use SoftDeletes;

    public static function boot() {
        parent::boot();

        self::observe(new DeleteObserver());
    }
}
