<?php
use App\News;
use App\Page;

//Routes voor authenticatie
Auth::routes();

//Routes voor JSON files
Route::get('/ajax/newsinfo', 'AjaxController@newsinfo');

//Routes voor de news-pages
Route::get('/news', 'NewsController@index');
Route::get('/news/create', 'NewsController@create');
Route::get('/news/{item}', 'NewsController@show');
Route::post('/news', 'NewsController@store');
Route::delete('/news/{item}', 'NewsController@remove');
Route::post('/news/{item}', 'NewsController@update' );
Route::get('/news/{item}/edit', 'NewsController@edit');

//Routes voor de pages
Route::get('/', 'PageController@index');
Route::get('/home', 'PageController@index');
Route::get('/profile', 'PageController@profile')->middleware('auth');
Route::post('/profile', 'PageController@update_avatar');
Route::get('/{page}', 'PageController@show');