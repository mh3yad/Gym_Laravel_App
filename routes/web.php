<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
    return redirect('login');
});
Auth::routes();

Route::get('/pdf','TestController@generate')->name('pdf');
Route::get('/pdf2','TestController@generate2')->name('pdf2');

Route::resource('/users','UserController')->middleware('auth');

Route::get('/user/{id}','Auth\RegisterController@edit')->name('users.edit')->middleware('auth');
Route::post('/userss/{id}','Auth\RegisterController@update')->name('users1.update')->middleware('auth');
Route::get('/home', 'HomeController@index');
Route::middleware('auth')->group(function() {
    Route::resource('/members','MembersController')->middleware('CheckEndDate');
    Route::post('/members/{id}/renew','MembersController@renew');
    Route::get('/search','MembersController@search');
    Route::get('/members/{id}','MembersController@show');
    Route::get('/statistics', 'MembersController@money')->name('money.index');
});
Route::get('/{page}', 'AdminController@index');
