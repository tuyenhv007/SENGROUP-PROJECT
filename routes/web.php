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

Route::get('/forgot-password', 'ForgotPasswordController@index')->name('forgot.index');
Route::post('/forgot-password', 'ForgotPasswordController@sendCodeResetPassword')->name('forgot.sendCode');

Route::get('/reset-password', 'ForgotPasswordController@resetPassword')->name('reset.password');
Route::post('/reset-password', 'ForgotPasswordController@saveResetPassword')->name('save.reset.password');
//Route::get('/user/redirect','SocialController@redirectToProvider')->name('user.redirect');
//Route::get('/user/callback','SocialController@handleProviderCallback');


Route::prefix('user')->group(function () {
    Route::get('/profile', 'UserController@showProfile')->name('user.show');
    Route::post('/profile/edit/{id}', 'UserController@editProfile')->name('user.edit');
    Route::post('/profile/update/avatar/{id}', 'UserController@updateAvatar')->name('user.edit.avatar');
    Route::get('/change-password/{id}','UserController@formChangePassword')->name('user.formChangePassword');
    Route::post('/change-password/{id}','UserController@changePassword')->name('user.changePassword');

});


Route::prefix('houses')->group(function () {
    Route::get('/', 'HouseController@index')->name('houses.list');
    Route::get('/{id}/show', 'HouseController@show')->name('houses.show');
    Route::post('/search/', 'HouseController@search')->name('house.search');
    Route::post('/post-form/{idCity}', 'DistrictController@showDistrictInCity');
    Route::post('/post-form/road/{idDistrict}', 'RoadController@showRoadInDistrict');
    Route::middleware(['user'])->group(function () {
        Route::get('/post-form', 'HouseController@postForm')->name('houses.postForm');
        Route::post('/post-form/', 'HouseController@postHouse')->name('houses.postHouse');
        Route::post('/{id}/book-house', 'HouseController@bookHouse')->name('houses.bookHouse');
    });
});







