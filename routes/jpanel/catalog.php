<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth']], function () {

      // -------------------- Category ----------------------------------------------------------------------------------------------------
      Route::get('/category', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@index')->name('list.category');
      Route::get('/category/add', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@create')->name('create.category');
      Route::post('/category/add', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@store')->name('store.category');
      Route::get('/category/edit/{id}', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@edit')->name('edit.category');
      Route::put('/category/edit/{id}', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@update')->name('update.category');
      Route::post('/category/status', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@statusUpdate')->name('status.change.category');
      Route::post('/category/delete', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@destroy')->name('category.delete');
      
})

?>