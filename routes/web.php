<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/new', 'PostController@new')->name('new');
Route::post('/post/ajaxUpload', 'PostController@ajaxUpload');
Route::post('/post/ajax_get_weather', 'PostController@ajax_get_weather');
Route::post('/post/image_upload', 'PostController@image_upload');
Route::post('/post/detail', 'PostController@detail')->name('detail');
Route::get('/mypage/index', 'Mypagecontroller@index')->name('index');
Route::get('/feed', 'FeedController@index');
Route::post('/feed/ajax_register_favorite', 'FeedController@ajax_register_favorite');
Route::get('/setting', 'SettingController@index');