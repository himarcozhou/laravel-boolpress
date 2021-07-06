<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');
Route::get('/posts', 'PostController@index')->name('post.index');
Route::get('/posts/{slug}', 'PostController@show')->name('post.show');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin') //tutte le Route::get('') iniziano con 'admin/'
    ->namespace('Admin') //nome cartella dentro app\Http\controller
    ->middleware('auth') //controlla se siamo loggati/autenticati o meno
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');

        //Route::get('/posts', 'PostController@index');
        // genera tutte le rotte necessarie per la crud PER GLI ADMIN
        Route::resource('/posts', 'PostController');

        // Route::get('/posts', 'PostController@index')->name('posts.index');
        // Route::post("/posts", "PostController@store")->name("posts.store");
        // Route::get('/posts/create', 'PostController@create')->name('posts.create');
        // Route::get('/posts/{post}', 'PostController@show')->name('posts.show');
        // Route::match(["PUT", "PATCH"], '/posts/{post}', 'PostController@update')->name('posts.update');
        // Route::delete('/posts/{post}', 'PostController@destroy')->name('posts.destroy');
        // Route::get('/posts/{post}/edit', 'PostController@edit')->name('posts.edit');
    });
