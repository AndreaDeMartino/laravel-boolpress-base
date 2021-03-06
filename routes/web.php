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
    return view('home');
})->name('home');


// Risorsa per Tabella Users
Route::resource('users', 'UserController');

// Risorsa per Tabella Posts
// Route::get('/posts','PostController@index')->name('posts');
Route::resource('posts', 'PostController');
