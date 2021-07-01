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

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')//tutte le Route::get('') iniziano con 'admin/'
    ->namespace('Admin')//nome cartella dentro app\Http\controller
    ->middleware('auth')//controlla se siamo loggati/autenticati o meno
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('home');

        //Route::get('/posts', 'PostController@index');
        Route::resource('/posts', 'PostController');
    });
