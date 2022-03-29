<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth']], function () {

    // -------------------- Users --------------------------------------------------
    Route::get('/users', 'App\Http\Controllers\Jpanel\User\UserController@index')->name('list.users');
    Route::get('/create-users', 'App\Http\Controllers\Jpanel\User\UserController@createUsers')->name('create.users');
    Route::post('/add-users', 'App\Http\Controllers\Jpanel\User\UserController@addUser')->name('add.user');
    Route::get('/edit-user/{id}', 'App\Http\Controllers\Jpanel\User\UserController@editUser')->name('edit.user');
    Route::put('/update-user/{id}', 'App\Http\Controllers\Jpanel\User\UserController@updateUser')->name('update.user');
    Route::get('/view-user/{id}', 'App\Http\Controllers\Jpanel\User\UserController@viewUser')->name('view.user');
    Route::post('/user-status-change', 'App\Http\Controllers\Jpanel\User\UserController@userStatusChange')->name('status.change.user');
    Route::post('/user-delete', 'App\Http\Controllers\Jpanel\User\UserController@userDelete')->name('user.delete');
    

    // -------------------- Role --------------------------------------------------
    Route::get('/role', 'App\Http\Controllers\Jpanel\User\RoleController@index')->name('list.role');
    Route::post('/add-role', 'App\Http\Controllers\Jpanel\User\RoleController@addRole')->name('add.role');
    Route::get('/edit-role/{id}', 'App\Http\Controllers\Jpanel\User\RoleController@editRole')->name('edit.role');
    Route::put('/update-role/{id}', 'App\Http\Controllers\Jpanel\User\RoleController@updateRole')->name('update.role');
    Route::post('/role-delete', 'App\Http\Controllers\Jpanel\User\RoleController@roleDelete')->name('role.delete');

      // -------------------- Language --------------------------------------------------
      Route::get('/language', 'App\Http\Controllers\Jpanel\User\LanguageController@index')->name('list.language');
      Route::post('/add-language', 'App\Http\Controllers\Jpanel\User\LanguageController@addLanguage')->name('add.language');
      Route::get('/edit-language/{id}', 'App\Http\Controllers\Jpanel\User\LanguageController@editLanguage')->name('edit.language');
      Route::put('/update-language/{id}', 'App\Http\Controllers\Jpanel\User\LanguageController@updateLanguage')->name('update.language');
      Route::post('/language-delete', 'App\Http\Controllers\Jpanel\User\LanguageController@languageDelete')->name('language.delete');

    // -------------------- Permission --------------------------------------------------
    Route::get('/module', 'App\Http\Controllers\Jpanel\User\ModuleController@index')->name('list.module');
    Route::post('/add-module', 'App\Http\Controllers\Jpanel\User\ModuleController@addModule')->name('add.module');
    Route::get('/edit-module/{id}', 'App\Http\Controllers\Jpanel\User\ModuleController@editModule')->name('edit.module');
    Route::put('/update-module/{id}', 'App\Http\Controllers\Jpanel\User\ModuleController@updateModule')->name('update.module');
    Route::post('/module-delete', 'App\Http\Controllers\Jpanel\User\ModuleController@moduleDelete')->name('module.delete');

    // -------------------- Role Permission --------------------------------------------------
    Route::post('/role-module', 'App\Http\Controllers\Jpanel\User\roleController@roleModule')->name('role.module');

    // -------------------- User Role --------------------------------------------------
    Route::post('/user-role', 'App\Http\Controllers\Jpanel\User\UserController@userRole')->name('user.role');

    // -------------------- User Module --------------------------------------------------
    Route::get('/user-permission/{id}', 'App\Http\Controllers\Jpanel\User\UserController@userPermissions')->name('user.permissions');
    Route::post('/user-permission-update', 'App\Http\Controllers\Jpanel\User\UserController@userPermissionsUpdate')->name('user.permissionsUpdate');
});