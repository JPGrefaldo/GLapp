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
        Route::get('contract/create/{id}', 'ContractController@createClientContract')->name('contract/create');
        Route::get('contract-list', 'ContractController@getList')->name('contract-list');
        Route::post('contract-store', 'ContractController@contractStore')->name('contract-store');

        Route::resource('transaction', 'TransactionController');
        Route::get('fee-list', 'TransactionController@feeList')->name('fee-list');
        Route::get('tran-fee-list', 'TransactionController@tranFeeList')->name('tran-fee-list');
        Route::get('tran-case-list', 'TransactionController@tranCaseList')->name('tran-case-list');
        Route::post('tran-fee-store', 'TransactionController@tranFeeStore')->name('tran-fee-store');
        Route::get('tran-fee-action', 'TransactionController@tranFeeAction')->name('tran-fee-action');
        Route::get('tran-cost', 'TransactionController@tranCost')->name('tran-cost');

        Route::resource('counsel', 'CounselController');
        Route::get('counsel-list', 'CounselController@getList')->name('counsel-list');

        Route::resource('case', 'CaseManagementController');
        Route::get('create-case', 'CaseManagementController@createCase')->name('create-case');
        Route::post('store-case', 'CaseManagementController@storeCase')->name('store-case');
        Route::get('add-co-counsel', 'CaseManagementController@addCoCounsel')->name('add-co-counsel');
        Route::get('get-co-counsel', 'CaseManagementController@getCoCounsel')->name('get-co-counsel');
        Route::get('remove-co-counsel', 'CaseManagementController@removeCoCounsel')->name('remove-co-counsel');
        Route::get('load-counsel', 'CaseManagementController@loadCounsel')->name('load-counsel');
        Route::get('action-case', 'CaseManagementController@actionCase')->name('action-case');




        Route::get('client', 'ClientController@index');
        Route::post('client', 'ClientController@busAddress');
        Route::get('client/list','ClientController@show');
        Route::post('client/update','ClientController@update');
        Route::post('client/destroy','ClientController@destroy');

        /* Service Report Route */
        Route::get('service-report',[
            'uses'=>'ServiceReportController@index',
             'as' => 'servicereport'
        ]);
        Route::get('service-report/{id}','ServiceReportController@show'); 
    });

    Route::group(['middleware' => ['role:admin|council']], function () {

    });

    Route::group(['middleware' => ['role:admin|council|para-legal']], function () {
        Route::post('upload-image',array('as'=>'upload-image','uses'=>'ImageController@imageUpload'));

        Route::get('profile', 'UserController@userProfileShow')->name('profile');
        Route::get('profile-create', 'UserController@userProfileCreate')->name('profile-create');
        Route::get('profile-edit', 'UserController@userProfileEdit')->name('profile-edit');
        Route::post('profile-update', 'UserController@userProfileUpdate')->name('profile-update');
        Route::post('profile-store', 'UserController@userProfileStore')->name('profile-store');

        Route::view('googleapi','googleapi');
    });

});
