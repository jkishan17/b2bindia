<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\Jpanel\DashboardController@index')->name('dashboard');
    Route::get('/admin-settings', 'App\Http\Controllers\Jpanel\DashboardController@adminSettings')->name('admin.settings');
});