<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('admin.home'));
});

// Configurações
Breadcrumbs::register('config', function ($breadcrumbs) {
    $breadcrumbs->push('Settings', route('admin.home'));
});

//user
Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->parent('config');
    $breadcrumbs->push('Users', route('admin.user'));
});

Breadcrumbs::register('add_user', function ($breadcrumbs, $user = null) {
    $breadcrumbs->parent('user');

    if (!$user) {
    	$breadcrumbs->push('New user', route('admin.user.add'));
    } else {
    	$breadcrumbs->push($user->name, route('admin.user.edit', $user->id));
    } 
});

Breadcrumbs::register('change_password', function ($breadcrumbs) {
    $breadcrumbs->push('Change password', route('admin.user.change_password'));
});

//group
Breadcrumbs::register('user_group', function ($breadcrumbs) {
    $breadcrumbs->parent('config');
    $breadcrumbs->push('Groups', route('admin.user_group'));
});

Breadcrumbs::register('add_user_group', function ($breadcrumbs, $userGroup = null) {
    $breadcrumbs->parent('user_group');

    if (!$userGroup) {
        $breadcrumbs->push('New group', route('admin.user_group.add'));
    } else {
        $breadcrumbs->push($userGroup->name, route('admin.user_group.edit', $userGroup->id));
    }
});

//photo
Breadcrumbs::register('photo', function ($breadcrumbs) {
    $breadcrumbs->push('Photos', route('admin.photo'));
});

Breadcrumbs::register('add_photo', function ($breadcrumbs, $photo = null) {
    $breadcrumbs->parent('photo');

    if (!$photo) {
        $breadcrumbs->push('New photo', route('admin.photo.add'));
    } else {
        $breadcrumbs->push($photo->name, route('admin.photo.edit', $photo->id));
    }
});

//event
Breadcrumbs::register('event', function ($breadcrumbs) {
    $breadcrumbs->push('Events', route('admin.event'));
});

Breadcrumbs::register('add_event', function ($breadcrumbs, $event = null) {
    $breadcrumbs->parent('event');

    if (!$event) {
        $breadcrumbs->push('New event', route('admin.event.add'));
    } else {
        $breadcrumbs->push($event->name, route('admin.event.edit', $event->id));
    }
});

//photographer
Breadcrumbs::register('photographer', function ($breadcrumbs) {
    $breadcrumbs->push('Photographers', route('admin.photographer'));
});

Breadcrumbs::register('add_photographer', function ($breadcrumbs, $photographer = null) {
    $breadcrumbs->parent('photographer');

    if (!$photographer) {
        $breadcrumbs->push('New photographer', route('admin.photographer.add'));
    } else {
        $breadcrumbs->push($photographer->name, route('admin.photographer.edit', $photographer->id));
    }
});
