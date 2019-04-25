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
            Route::get('/photos', 'PhotoController@index')->name('admin.photo');
        });
        Route::group(['middleware' => ['permission:5-write']], function () {
            Route::any('/photos/add', 'PhotoController@add')->name('admin.photo.add');
            Route::any('/photos/edit/{photoId}', 'PhotoController@edit')->name('admin.photo.edit');
        });
        Route::group(['middleware' => ['permission:5-delete']], function () {
            Route::get('/photos/delete/{photoId}', 'PhotoController@delete')->name('admin.photo.delete');
        });
	});
});
