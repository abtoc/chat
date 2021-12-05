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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth','verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@view_own')->name('profile.view_own');
    Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
    Route::get('/profile/upload', 'ProfileController@upload_view')->name('profile.upload_view');
    Route::post('/profile/upload', 'ProfileController@upload')->name('profile.upload');
    Route::get('/profile/{user}', 'ProfileController@view')->name('profile.view');

    Route::get('/img/{path}', 'MediaController@download')->where('path', '.*')->name('media.download');
});
