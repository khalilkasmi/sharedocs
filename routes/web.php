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

Use App\Document;

Route::get('/', 'documentController@index');

Route::prefix('document')->group(function (){
    Route::get('add','documentController@create');
    Route::post('upload','documentController@store');
    Route::get('{id}/download','documentController@show');
    Route::get('{id}/edit','documentController@edit');
    Route::post('{id}/update','documentController@update');
    Route::get('{id}/delete','documentController@destroy');
    Route::get('search','documentController@search');
});
