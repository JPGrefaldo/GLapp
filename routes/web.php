<?php

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

Auth::routes();



Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('role', 'RoleController@index')->name('role');
        Route::get('role-list', 'RoleController@getList')->name('role-list');
        Route::get('role-show/{id}', 'RoleController@show')->name('role-show');
        Route::post('role-update/{id}', 'RoleController@update')->name('role-update');

        Route::resource('user', 'UserController');
        Route::get('user-list', 'UserController@getList')->name('user-list');

        Route::resource('contract', 'ContractController');
    });

    Route::group(['middleware' => ['role:admin|council']], function () {

    });

    Route::group(['middleware' => ['role:admin|council|para-legal']], function () {
        Route::get('profile', 'UserController@userProfileShow')->name('profile');
        Route::get('profile-create', 'UserController@userProfileCreate')->name('profile-create');
        Route::get('profile-edit', 'UserController@userProfileEdit')->name('profile-edit');
        Route::post('profile-update', 'UserController@userProfileUpdate')->name('profile-update');
        Route::post('profile-store', 'UserController@userProfileStore')->name('profile-store');
    });

});
