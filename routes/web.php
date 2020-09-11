<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::get('/courses', 'StudentController@get_courses');
Route::put('/show', 'StudentController@show')->name('show');
Route::get('/add_student', 'StudentController@add_student')->name('add_student');
Route::post('/store_student', 'StudentController@store_student')->name('store_student');
Route::get('/add_score', 'StudentController@add_score')->name('add_score');
Route::post('/store_score', 'StudentController@store_score')->name('store_score');