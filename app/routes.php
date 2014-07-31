<?php

/**
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', array('before' => 'auth', 'anyrole:Admin', function () {
	// FIXME use a controller, maybe?
	return View::make('pages.homepage');
}));

// FIXME split
Route::group(array(
	'before' => array(
		'auth',
		'anyrole:Admin' 
	) 
), function () {
	
	// UsersController
	// FIXME setup better routes for this
	// FIXME add except show
	Route::resource('users', 'UsersController');
	
	// RolesController
	// FIXME setup better routes for this
	// FIXME add exceptions
	Route::resource('roles', 'RolesController');
});

// AuthController
// FIXME clean
Route::group(array(
	'prefix' => 'login',
	'before' => 'guest' 
), function () {
	Route::get('', array(
		'as' => 'session.loginform',
		'uses' => 'SessionController@form' 
	));
	Route::post('', array(
		'as' => 'session.auth',
		'uses' => 'SessionController@auth' 
	));
});
Route::get('logout', array(
	'before' => 'auth',
	'as' => 'session.logout',
	'uses' => 'SessionController@logout' 
));