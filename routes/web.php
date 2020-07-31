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

Route::get('login', 'LoginController@showFormLogin');
Route::get('register','LoginController@showFormRegister');
Route::post('login','LoginController@login')->name('user.login');
Route::post('register', 'LoginController@register')->name('user.register');

Route::prefix('houses')->group(function () {
    Route::get('/', 'HouseController@index')->name('houses.list');
    Route::get('/post-form','HouseController@postForm')->name('houses.postForm');
    Route::post('/post-form/{idCity}','DistrictController@showDistrictInCity');
    Route::post('/post-form/road/{idDistrict}','RoadController@showRoadInDistrict');
    Route::get('/{id}/show', 'HouseController@show')->name('houses.show');
});


Route::get('house/form-image', 'ImageController@index')->name('house.form-image');



