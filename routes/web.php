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

Route::group(['middleware'=> ['auth'],'prefix' => "song",'as' => "song."],function(){
			Route::get('/',['as' => "index",'uses' => "LyricsController@index"]);
			Route::get('create',['as' => "create",'uses' => "LyricsController@create"]);
			Route::post('create',['uses' => "LyricsController@store"]);
			Route::get('edit/{id?}',['as' => "edit",'uses' => "LyricsController@edit"]);
			Route::post('edit/{id?}',['uses' => "LyricsController@update"]);
			Route::get('delete/{id?}',['as'=> "delete",'uses' => "LyricsController@destroy"]);
			Route::get('show/{id?}',['as'=> "show",'uses' => "LyricsController@show"]);
		});
