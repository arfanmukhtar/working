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

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE , ANY');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization , accept');
header('Access-Control-Allow-Credentials: true');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/map-home', 'HomeController@map');
Route::get('/all-agent', 'HomeController@agents');
Route::get('/listing', 'HomeController@listing');
Route::get('agent/properties/{id}/{name}', 'AgentsController@listing');
Route::get('/maplisting', 'HomeController@maplisting');
Route::get('/property/{id}/{name}', 'HomeController@detail');
Route::post('/send_request', 'HomeController@send_request');

Route::get('/contact-us', 'HomeController@contact');
Route::get('/about-us', 'HomeController@about');
Route::get('/loan-calculator', 'HomeController@calculator');
Route::get('localization/{locale}','LocalizationController@index');
Route::auth();

Route::group(['middleware' => 'web'], function () {



Route::get('/admin', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');
Route::get('/customer-requests', 'DashboardController@customer_requets');
Route::get('/profile', 'HomeController@profile');
Route::get('/categories', 'CategoryController@index');
Route::post('/category/save', 'CategoryController@save');
Route::post('/category/get', 'CategoryController@get');
Route::post('/category/delete', 'CategoryController@delete');

Route::get('/agents', 'AgentsController@index');
Route::post('/agents/save', 'AgentsController@save');
Route::post('/agents/get', 'AgentsController@get');
Route::post('/agents/delete', 'AgentsController@delete');
Route::get('/verify_email', 'AgentsController@verify_email');
Route::get('register/verify/{confirmationCode}' , 'AgentsController@confirm');
Route::post('agents/update_profile', 'AgentsController@update_profile');
Route::post('agents/password_reset/', 'AgentsController@password_reset');

Route::get('/features', 'FeatureController@index');
Route::post('/feature/save', 'FeatureController@save');
Route::post('/feature/get', 'FeatureController@get');
Route::post('/feature/delete', 'FeatureController@delete');

Route::post('/property/fileupload', 'PropertyController@fileupload');
Route::get('/properties', 'PropertyController@index');
Route::get('/property/add', 'PropertyController@form');
Route::get('/listing/edit/{id}', 'PropertyController@edit');
Route::get('/listing/image_delete/{id}', 'PropertyController@image_delete');
Route::post('/property/save', 'PropertyController@save');
Route::post('property/addTofeatured', 'PropertyController@addTofeatured');
Route::post('property/addToArchive', 'PropertyController@addToArchive');

Route::get('/settings', 'SettingController@index');
Route::post('/setting/save', 'SettingController@save');
});

Route::group(['prefix' => 'api/v1'], function() {
	Route::get('properties', 'ApiController@index');	
	
	
	
	
});
