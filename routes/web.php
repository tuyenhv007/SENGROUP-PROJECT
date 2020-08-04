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


Route::get('/login', 'LoginController@showFormLogin')->name('login');
Route::get('/register', 'LoginController@showFormRegister')->name('register');
Route::post('/login', 'LoginController@login')->name('user.login');
Route::post('/register', 'LoginController@register')->name('user.register');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::prefix('houses')->group(function () {
    Route::get('/', 'HouseController@index')->name('houses.list');
    Route::get('/{id}/show', 'HouseController@show')->name('houses.show');
    Route::middleware(['user'])->group(function () {
        Route::get('/post-form', 'HouseController@postForm')->name('houses.postForm');
        Route::post('/post-form/{idCity}', 'DistrictController@showDistrictInCity');
        Route::post('/post-form/road/{idDistrict}', 'RoadController@showRoadInDistrict');
        Route::post('/post-form/', 'HouseController@postHouse')->name('houses.postHouse');
        Route::get('/book-house/{id}', 'HouseController@viewBookHouse')->name('houses.viewBookHouse');
        Route::post('/book-house/{id}', 'HouseController@bookHouse')->name('houses.bookHouse');
    });
});





