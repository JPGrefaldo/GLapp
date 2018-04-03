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

    Route::get('role', 'RoleController@index')->name('role');
    Route::get('role-list', 'RoleController@getList')->name('role-list');
    Route::get('role-show/{id}', 'RoleController@show')->name('role-show');


    Route::resource('user', 'UserController');
    Route::get('user-list', 'UserController@getList')->name('user-list');

    Route::get('profile', 'UserController@userProfileShow')->name('profile');
    Route::get('profile-create', 'UserController@userProfileCreate')->name('profile-create');
    Route::get('profile-edit', 'UserController@userProfileEdit')->name('profile-edit');
    Route::post('profile-update', 'UserController@userProfileUpdate')->name('profile-update');
    Route::post('profile-store', 'UserController@userProfileStore')->name('profile-store');

    Route::group(['middleware' => ['role:admin']], function () {



    });

});
