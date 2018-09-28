<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Onesla\Permission\Http\Controllers',
    'middleware' => 'web',
    'as' => 'web.'
], function () {
    Route::post('user', 'AuthController@createUser')->name('user');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::post('profile', 'ProfileController@store')->name('profile');

    Route::put('user/{id}', 'AuthController@updateUser');
    Route::put('profile/{id}', 'ProfileController@updateProfile');

    Route::delete('user/{id}', 'AuthController@deleteUser');
    Route::delete('profile/{id}', 'ProfileController@deleteProfile');
});
