<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace' => 'Onesla\Permission\Http\Controllers',
    'middleware' => 'web',
    'as' => 'web.'
], function () {
    Route::post('register', 'AuthController@register')->name('register');
    Route::post('login', 'AuthController@login')->name('login');
    Route::post('logout', 'AuthController@logout')->name('logout');
});