<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth']], function () {

    // -------------------- Category ----------------------------------------------------------------------------------------------------
    Route::get('/category', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@index')->name('list.category');
    Route::get('/category/add', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@create')->name('create.category');
    Route::post('/category/add', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@store')->name('store.category');
    Route::get('/category/edit/{id}', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@edit')->name('edit.category');
    Route::put('/category/edit/{id}', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@update')->name('update.category');
    Route::put('/category/edit/description/{id}', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@updateCategoryDescription')->name('update.category.description');
    Route::put('/category/edit/meta/{id}', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@updateCategoryMeta')->name('update.category.meta');
    Route::put('/category/edit/thumbnail/{id}', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@updateCategoryThumbnail')->name('update.category.thumbnail');
    Route::put('/category/edit/icon/{id}', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@updateCategoryIcon')->name('update.category.icon');
    Route::put('/category/edit/cover/{id}', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@updateCategoryCover')->name('update.category.cover');
    Route::post('/category/status', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@statusUpdate')->name('status.change.category');
    Route::post('/category/delete', 'App\Http\Controllers\Jpanel\Catalog\CategoryController@destroy')->name('category.delete');

    //--------------------- Brand -----------------------------------------------------------------------------------------------
    Route::get('/brands', 'App\Http\Controllers\Jpanel\Catalog\BrandController@index')->name('list.brands');
    Route::get('/brand/add', 'App\Http\Controllers\Jpanel\Catalog\BrandController@create')->name('create.brand');
    Route::post('/brand/add', 'App\Http\Controllers\Jpanel\Catalog\BrandController@store')->name('store.brand');
    Route::get('/brand/edit/{id}', 'App\Http\Controllers\Jpanel\Catalog\BrandController@edit')->name('edit.brand');
    Route::put('/brand/edit/{id}', 'App\Http\Controllers\Jpanel\Catalog\BrandController@update')->name('update.brand');
    Route::put('/brand/edit/description/{id}', 'App\Http\Controllers\Jpanel\Catalog\BrandController@updateBrandDescription')->name('update.brand.description');
    Route::put('/brand/edit/meta/{id}', 'App\Http\Controllers\Jpanel\Catalog\BrandController@updateBrandMeta')->name('update.brand.meta');
    Route::put('/brand/edit/icon/{id}', 'App\Http\Controllers\Jpanel\Catalog\BrandController@updateBrandLogo')->name('update.brand.logo');
    Route::put('/brand/edit/cover/{id}', 'App\Http\Controllers\Jpanel\Catalog\BrandController@updateBrandCover')->name('update.brand.cover');
    Route::post('/brand/status', 'App\Http\Controllers\Jpanel\Catalog\BrandController@statusUpdate')->name('status.change.brand');
    Route::post('/brand/delete', 'App\Http\Controllers\Jpanel\Catalog\BrandController@destroy')->name('brand.delete');

});
