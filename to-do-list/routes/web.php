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

Route::get('/', 'CollectionController@index');
Route::get('/task', 'TaskController@index');

Route::resources([
    'collection' => 'CollectionController',
    'task' => 'TaskController'
]);

Route::get('/task/create/{collection_id}', 'TaskController@create');
Route::get('collections/{collectionId}', 'CollectionController@show')->name('showCollection');

Auth::routes();

