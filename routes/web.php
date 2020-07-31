<?php

use Illuminate\Contracts\View\View;
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
Route::get('/homes', function () {
   return view('homes/home');
});
Route::get('login', function (){
   return view('users/login');
});
Route::get('register', function () {
   return view('users/register');
});




Route::prefix('houses')->group(function () {
    Route::get('/', 'HouseController@index')->name('houses.list');
    Route::get('/show', 'HouseController@show')->name('houses.show');
});

Route::get('/homes', function () {
    return view('homes/home');
});

Route::get('/login','LoginController@showFormLogin');
