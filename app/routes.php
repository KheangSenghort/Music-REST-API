<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});


Route::when('*', 'auth.basic');


Route::get('api/getartistinfo/{artistname}', array('uses' =>
	'ArtistController@getArtistInfo'));

Route::get('api/getsonginfo/{songname}', array('uses' =>
	'SongController@getSongInfo'));

Route::put('api/addartist/{artistname}', array('uses' =>
	'ArtistController@putArtist'));

Route::put('api/addsong/{songname}/{songyear}', array('uses' =>
	'SongController@putSong'));

Route::delete('api/deleteartist/{id}', array('uses' =>
	'ArtistController@deleteArtist'));

Route::delete('api/deletesong/{id}', array('uses' =>
	'SongController@deleteSong'));