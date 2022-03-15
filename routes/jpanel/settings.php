<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth']], function () {
    Route::get('/settings', 'App\Http\Controllers\Jpanel\SettingsController@index')->name('settings');
    Route::post('/update-profile', 'App\Http\Controllers\Jpanel\SettingsController@profileUpdate')->name('profile.update');
    Route::put('/update-image-profile', 'App\Http\Controllers\Jpanel\SettingsController@profileImageUpdate')->name('profile.image.update');
    Route::post('/update-password', 'App\Http\Controllers\Jpanel\SettingsController@passwordUpdate')->name('password.update');
});