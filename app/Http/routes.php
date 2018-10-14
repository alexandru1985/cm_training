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
    return view('welcome');
});

Route::post('groups/store', ['uses' => 'GroupsController@store', 'as' => 'groups.store']);
Route::get('contacts/autocomplete', ['uses' => 'ContactsController@autocomplete', 'as' => 'contacts.autocomplete']);
Route::resource('contacts', 'ContactsController');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::resource('city', 'CityController');
Route::get('/one_to_many_belongs', 'TestController@one_to_many_belongs');
Route::get('/one_to_many_belongs_param/{user_id}', 'TestController@one_to_many_belongs_param');
Route::get('/one_to_many_has_many/{username}', 'TestController@one_to_many_has_many');
Route::get('my-form','HomeController@myform');
Route::post('my-form','HomeController@myformPost');
Route::post('upload', ['uses' => 'HomeController@uploadSubmit', 'as' => 'upload']);

Route::match(['get', 'post'], 'ajax-image-upload', 'ImageController@ajaxImage');
Route::delete('ajax-remove-image/{filename}', 'ImageController@deleteImage');