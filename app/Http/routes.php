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
    Route::get('/user', 'IndexController@user');
    Route::get('/activitys', 'IndexController@activity');
    Route::post('/changRoomLook', 'IndexController@changRoomLook');
    Route::post('/changNameLook', 'IndexController@changNameLook');
    Route::get('/section/{id}', 'SectionController@index');
    Route::resource('post', 'PostController');
    Route::post('post/comment', 'PostController@comment');
    Route::resource('activity', 'ActivityController');
    Route::get('/admin', 'AdminController@index');
    Route::get('/admin/post', 'AdminController@post');
    Route::get('/admin/delPost/{id}', 'AdminController@delPost');
    Route::get('/activity/join/{id}', 'ActivityController@join');
});

Route::group(['namespace' => 'Home','prefix' => 'home','middleware' => ['web', 'wechat.oauth']], function () {
    Route::get('register', 'RegisterController@index');
    Route::post('register', 'RegisterController@register');
});