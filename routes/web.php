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
    return view('welcome');
});

//index view  "have table of all posts"
Route::get('/Posts', 'PostController@index')->name('Posts.index')->middleware('auth');
//create view  "have form to add new post"
Route::get('/Posts/create', 'PostController@create')->name('Posts.create');
//store view to  get data from form then store it into database 
Route::post('/Posts/store', 'PostController@store')->name('Posts.store');
//show view "have all details about one post"
Route::get('/Posts/{Post}', 'PostController@show')->name('Posts.show');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
