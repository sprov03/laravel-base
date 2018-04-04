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
if (env('APP_ENV') !== 'testing') {
    header('Access-Control-Allow-Origin:  *');
    header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
    header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
}

Route::post('/api/auth/login','Auth\AuthController@login');
Route::resource('/api/auth', 'Auth\AuthController');
Route::resource('/api/heroes', 'HeroController');
Route::resource('/api/users', 'UserController');
Route::resource('/api/sites', 'SiteController');
Route::resource('/api/forms', 'FormController');
Route::resource('/api/todos', 'TodoController');
Route::resource('/api/sync', 'SyncController');
Route::resource('/cows', 'CowController');
/** Routes File Marker: Do Not Remove Being Used Buy Code Generator */
