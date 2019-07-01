<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/test',function(){
    return "ok";
});

Route::group(['middleware' => ['cors']], function () {
	Route::namespace('Api')->group(function () {
	    Route::post('/upload', 'UploadPhotoController@upload')->name('api.upload_photo');

	    Route::get('/events', function (\Broadcasting\Services\EventService $eventService) {
	    	$events = $eventService->list()->orderBy('name')->get();

	    	return response()->json($events, 200);
	    });

        Route::get('/photographers', function (\Broadcasting\Services\PhotographerService $photographerService) {
            $photographers = $photographerService->list()->orderBy('name')->get();

            return response()->json($photographers, 200);
        });
	});
});
