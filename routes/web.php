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
    $cmsmenu = DB::table('cms')->get();
    	return view('welcome',compact('cmsmenu'));
});

Route::get('/cms','HomeController@index');

Route::get('/cms/{id}','HomeController@cmspage');

Auth::routes();
Route::get('page/add', 'PageController@create');
Route::put('page/{pageid}/update', 'PageController@update');
Route::get('page/captcha', 'PageController@captchaget');
Route::post('page/captcha', 'PageController@captchapost');


Route::get('page/{page}/delete', [
    'as'   => 'page.delete',
    'uses' => 'PageController@destroy',
]);
Route::resource('/page', 'PageController');

Route::get('news/add', 'NewsController@create');
Route::put('news/{pageid}/update', 'NewsController@update');


Route::get('news/{page}/delete', [
    'as'   => 'news.delete',
    'uses' => 'NewsController@destroy',
]);
Route::resource('/news', 'NewsController');

Route::get('/cms', 'HomeController@index')->name('cms');
