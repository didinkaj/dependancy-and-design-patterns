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

Route::get('/', 'HomeController@index')->name('/');
Route::get('/showblog/{id}','HomeController@show')->where('id', '[0-9]+');

Auth::routes();

Route::get('/home', 'BlogController@index')->name('home');
Route::get('/unpublished','BlogController@unpublished')->name('unpublished');
Route::get('/addBlog', 'BlogController@create')->name('addblog');
Route::post('add/blog','BlogController@store')->name('postblog');
Route::get('/blog/{id}','BlogController@show')->where('id', '[0-9]+');
Route::get('/editblog/{id}','BlogController@edit')->where('id','[0-9]+')->name('editblog');
Route::patch('/edit/blog/{id}', 'BlogController@update')->where('id', '[0-9]+');
Route::delete('deleteBlog/{id}','BlogController@destroy')->where('id', '[0-9]+')->name('deleteBlog');
Route::post('restoreBlog/{id}','BlogController@restore')->where('id', '[0-9]+')->name('restoreBlog');
Route::post('wipeBlog/{id}','BlogController@wipeBlog')->where('id', '[0-9]+')->name('wipeBlog');



Route::post('/subscribe', 'SubscribeController@store')->name('subscribe');
Route::get('/userLogs','LoggingController@index')->name('logs');

