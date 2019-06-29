<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();


Route::group(['middleware' => ['auth']], function () {
	Route::namespace('Admin')->group(function () {
        Route::get('/set_pin', 'HomeController@setPin')->name('admin.set_pin');

        Route::get('/home', 'HomeController@index')->name('admin.home');

		//users
        Route::group(['middleware' => ['permission:4-list']], function () {
            Route::get('/users', 'User\UserController@index')->name('admin.user');
        });
        Route::group(['middleware' => ['permission:4-write']], function () {
            Route::any('/users/add', 'User\UserController@add')->name('admin.user.add');
            Route::any('/users/edit/{userId}', 'User\UserController@edit')->name('admin.user.edit');
        });
        Route::group(['middleware' => ['permission:4-delete']], function () {
            Route::get('/users/delete/{userId}', 'User\UserController@delete')->name('admin.user.delete');
        });

		Route::any('/users/change_password/', 'User\UserController@changePassword')->name('admin.user.change_password');

		//groups
        Route::group(['middleware' => ['permission:3-list']], function () {
            Route::get('/groups', 'User\UserGroupController@index')->name('admin.user_group');
        });
        Route::group(['middleware' => ['permission:3-write']], function () {
            Route::any('/groups/add', 'User\UserGroupController@add')->name('admin.user_group.add');
            Route::any('/groups/edit/{userGroupId}', 'User\UserGroupController@edit')->name('admin.user_group.edit');
        });
        Route::group(['middleware' => ['permission:3-delete']], function () {
            Route::get('/groups/delete/{userGroupId}', 'User\UserGroupController@delete')->name('admin.user_group.delete');
        });

        //photos
        Route::group(['middleware' => ['permission:5-list']], function () {
            Route::get('/photo', 'PhotoController@index')->name('admin.photo');
        });
        Route::group(['middleware' => ['permission:5-write']], function () {
            Route::any('/photo/add', 'PhotoController@add')->name('admin.photo.add');
            Route::any('/photo/edit/{photoId}', 'PhotoController@edit')->name('admin.photo.edit');
        });
        Route::group(['middleware' => ['permission:5-delete']], function () {
            Route::get('/photo/delete/{photoId}', 'PhotoController@delete')->name('admin.photo.delete');
        });

        //events
        Route::group(['middleware' => ['permission:6-list']], function () {
            Route::get('/event', 'EventController@index')->name('admin.event');
        });
        Route::group(['middleware' => ['permission:6-write']], function () {
            Route::any('/event/add', 'EventController@add')->name('admin.event.add');
            Route::any('/event/edit/{eventId}', 'EventController@edit')->name('admin.event.edit');
        });
        Route::group(['middleware' => ['permission:6-delete']], function () {
            Route::get('/event/delete/{eventId}', 'EventController@delete')->name('admin.event.delete');
        });

        //photographer
        Route::group(['middleware' => ['permission:7-list']], function () {
            Route::get('/photographer', 'PhotographerController@index')->name('admin.photographer');
        });
        Route::group(['middleware' => ['permission:7-write']], function () {
            Route::any('/photographer/add', 'PhotographerController@add')->name('admin.photographer.add');
            Route::any('/photographer/edit/{photographerId}', 'PhotographerController@edit')->name('admin.photographer.edit');
        });
        Route::group(['middleware' => ['permission:7-delete']], function () {
            Route::get('/photographer/delete/{photographerId}', 'PhotographerController@delete')->name('admin.photographer.delete');
        });
	});
});
