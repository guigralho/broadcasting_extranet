<?php

use Broadcasting\Models\Menu;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['id' => 1, 'name' => 'Dashboard', 'route' => 'admin.home', 'icon' => 'fas fa-tachometer fa-lg', 'order' => 0],
            ['id' => 2, 'name' => 'Settings', 'route' => '/', 'icon' => 'fas fa-sliders-h fa-lg', 'order' => 99],
            ['id' => 3, 'name' => 'Groups', 'route' => 'admin.user_group', 'icon' => 'fa fa-users', 'order' => 1, 'menu_id' => 2],
            ['id' => 4, 'name' => 'Users', 'route' => 'admin.user', 'icon' => 'fa fa-user-plus', 'order' => 2, 'menu_id' => 2],
            ['id' => 5, 'name' => 'Photos', 'route' => 'admin.photo', 'icon' => 'fal fa-camera-retro', 'order' => 1],
            ['id' => 6, 'name' => 'Events', 'route' => 'admin.event', 'icon' => 'fal fa-list', 'order' => 2],
            ['id' => 7, 'name' => 'Photographers', 'route' => 'admin.photographer', 'icon' => 'fal fa-portrait', 'order' => 3],
        ])->each(function ($data) {
            $menu = Menu::find($data['id']);
            if (!$menu instanceof Menu) {
                $menu = new Menu;
                $menu->id = $data['id'];
            }
            if (isset($data['menu_id'])){
                $menu->menu_id = $data['menu_id'];
            } else {
                $menu->menu_id = null;
            }
            $menu->name = $data['name'];
            $menu->route = $data['route'];
            $menu->icon = $data['icon'];
            $menu->order = $data['order'];
            $menu->save();
        });
        $this->command->info('Menu table Seeded');

    }
}
