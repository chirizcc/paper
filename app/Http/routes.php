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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'IndexController@index');
Route::post('/', 'IndexController@serve');

Route::get('/menu', 'MenuController@setMenu');

Route::group(['namespace' => 'Home','prefix' => 'home','middleware' => ['web', 'wechat.oauth', 'user']], function () {
    Route::get('/', 'IndexController@index');
    Route::get('/section/{id}', 'SectionController@index');
});

Route::group(['namespace' => 'Home','prefix' => 'home','middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('/register', 'RegisterController@index');
    Route::post('/register', 'RegisterController@register');
});