<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::error(function(Exception $exception, $code)
{
//    return View::make('hello');
});

Route::get('/', function()
{
	return View::make('hello');
});



Route::group(array('prefix' => 'api', 'before' => 'api.basic'), function() {
    Route::controller('userprofiles', 'UserprofilesController');


});

Route::group(array('before' => 'app.basic'), function() {
//Route::resource('api/users', 'UsersController');
    Route::resource('userprofiles', 'UserprofilesController');

});
