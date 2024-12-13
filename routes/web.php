<?php
use App\Routes\Route;
use App\Controllers\FilmController;
use App\Controllers\ActeurController;
use App\Controllers\GenreController;
use App\Controllers\RealisateurController;

Route::get('/home', 'FilmController@indexHome');

Route::get('/film', 'FilmController@index');
Route::get('/film/show', 'FilmController@show');
Route::get('/film/create', 'FilmController@create');
Route::post('/film/create', 'FilmController@store');
Route::get('/film/edit', 'FilmController@edit');
Route::post('/film/edit', 'FilmController@update');
Route::post('/film/delete', 'FilmController@delete');

Route::get('/acteur', 'ActeurController@index');

Route::get('/genre', 'GenreController@index');

Route::get('/realisateur', 'RealisateurController@index');

Route::get('user/create', 'UserController@create');
Route::post('user/create', 'UserController@store');

Route::dispatch();

?>