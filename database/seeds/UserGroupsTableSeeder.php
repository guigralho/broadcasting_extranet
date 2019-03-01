<?php

use Illuminate\Database\Seeder;
use Broadcasting\Models\UserGroup;
use Spatie\Permission\Models\Role;

class UserGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userGroup = new Broadcasting\Models\UserGroup();
        $userGroup->name = 'Administrador';
        $userGroup->save();

        $userGroup = new Broadcasting\Models\UserGroup();
        $userGroup->name = 'Site';
        $userGroup->save();
    }
}
