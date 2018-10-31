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

Route::get('/', 'Todolist@index')->name('index');
Route::get('/table', 'Todolist@gettable')->name('getdata');

Route::put('/save', 'Todolist@save')->name('save');
Route::post('/store', 'Todolist@store')->name('store');
Route::post('/delete', 'Todolist@delete')->name('delete');
