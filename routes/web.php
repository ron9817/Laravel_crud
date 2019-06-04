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

Route::resource('p','prod');
Route::post('/update/{id}', 'prod@myupdate');
Route::get('/delete/{id}', 'prod@mydestroy');
Route::get('', 'prod@index');
