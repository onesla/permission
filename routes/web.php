<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web', 'as' => 'web.'], function () {
    Route::post('register', 'Onesla\Permission\Http\Controllers\AuthController@register')->name('register');
    Route::post('login', 'Onesla\Permission\Http\Controllers\AuthController@login')->name('login');
    Route::post('logout', 'Onesla\Permission\Http\Controllers\AuthController@logout')->name('logout');
});