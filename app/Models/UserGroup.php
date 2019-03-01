<?php

namespace Broadcasting\Models;

use Broadcasting\Observers\DeleteObserver;
use Broadcasting\Observers\UserGroupObserver;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Broadcasting\Constants\UserStatusConstant;

/**
 * Class UserGroup
 * @package Broadcasting\Models
 */
class UserGroup extends Model
{
    use SoftDeletes;

    public static function boot() {
        parent::boot();
        self::observe(new UserGroupObserver());
        self::observe(new DeleteObserver());
    }

    /**
     * @return string
     */
    public function label()
    {
        switch ($this->status) {
            case UserStatusConstant::ACTIVE:
                return 'label label-success';
            break;

            case UserStatusConstant::INACTIVE:
                return 'label label-warning';
            break;
            
            default:
                return 'label label-success';
            break;
        }
    }
}
