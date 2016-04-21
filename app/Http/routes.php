<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	$count = App\Photo::totalUploaded();

    return view('welcome')->with('photosUploaded', $count);
});

Route::post('/incoming', 'ListingsController@incoming');
Route::get('/import', 'ListingsController@import');