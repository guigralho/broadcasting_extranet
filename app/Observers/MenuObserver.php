<?php

namespace Broadcasting\Observers;

use Broadcasting\Constants\PermissionTypeConstant;
use Broadcasting\Models\Menu;
use Spatie\Permission\Exceptions\PermissionAlreadyExists;
use Spatie\Permission\Models\Permission;

class MenuObserver
{

    public function saved(Menu $menu)
    {
        $permissionTypeConstant = collect(PermissionTypeConstant::getConstants());

        $permissionTypeConstant->flip()->each(function($permission) use ($menu) {
            try {
                Permission::create(['name' => str_slug("{$menu->id}_{$permission}", '-')]);
            } catch (PermissionAlreadyExists $alreadyExists) {
                //não fazer nada
            }
        });
    }
}