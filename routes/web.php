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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/','Links\LinksController@index')->name('index');
Route::get('/create','Links\LinksController@create')->name('createlink');
Route::post('/store-links','Links\LinksController@store')->name('storelink');
Route::post('/update-links/{id}','Links\LinksController@update')->name('updatelink');
Route::get('/detail-links/{id}','Links\LinksController@detail')->name('detaillink');
Route::get('/edit-links/{id}','Links\LinksController@edit')->name('editlink');
Route::get('/delete-links/{id}','Links\LinksController@delete')->name('deletelink');
Route::post('/delete-links-array','Links\LinksController@destroy')->name('deletelinkarray');
Route::get('/get-links','Links\LinksController@getLink')->name('getLink');
Route::get('/modal-edit-link/{id}','Links\LinksController@modaledit')->name('modaledit');
Route::get('/modal-view-link/{id}','Links\LinksController@views')->name('viewlist');