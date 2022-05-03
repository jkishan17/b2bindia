<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Jpanel\DashboardController;

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/admin-settings', [DashboardController::class,'adminSettings'])->name('admin.settings');
});
