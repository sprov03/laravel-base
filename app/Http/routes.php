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

Route::get('/api/users/index', 'UserController@indexPage');
Route::resource('/api/users', 'UserController');

Route::resource('/api/forms', 'FormController');
Route::resource('/api/form_fields', 'FormFieldController');
Route::resource('/api/form_field_types', 'FormFieldTypeController');
Route::resource('/api/sites', 'SiteController');
Route::resource('/api/buying_websites', 'BuyingWebsiteController');
Route::resource('/api/selling_websites', 'SellingWebsiteController');
Route::resource('/api/histories', 'HistoryController');
Route::resource('/api/items', 'ItemController');
/** Routes File Marker: Do Not Remove Being Used Buy Code Generator */

Route::group([], function () {
    Route::get('/', function () {
        return View::make('app.app');
    });

    Route::resource('items', 'ItemController');
});
// Templates
Route::group(['prefix'=>'/templates/'],function(){
    Route::get('{template}', [function($template)
    {
        $template = str_replace(".html","",$template);
        View::addExtension('html','php');
        return View::make('templates.'.$template);
    }]);
});
