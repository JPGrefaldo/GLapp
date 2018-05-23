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

Route::get('test', function(){
    return view('test');
});

Route::get('add-to-log', 'HomeController@myTestAddToLog');
Route::get('logs', 'HomeController@logActivity')->name('logs');
Route::get('dt-get-logs', 'HomeController@dtGetLogs')->name('dt-get-logs');
Route::get('get-logs', 'HomeController@getLogs')->name('get-logs');

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'HomeController@index');

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('ars', 'ArsController@index');


        Route::get('role', 'RoleController@index')->name('role');
        Route::get('role-list', 'RoleController@getList')->name('role-list');
        Route::get('role-show/{id}', 'RoleController@show')->name('role-show');
        Route::post('role-update/{id}', 'RoleController@update')->name('role-update');

        Route::resource('user', 'UserController');
        Route::get('user-list', 'UserController@getList')->name('user-list');

        Route::resource('contract', 'ContractController');
        Route::get('create-contract/{id}', 'ContractController@createContract')->name('create-contract');
        Route::post('contract-store', 'ContractController@contractStore')->name('contract-store');
        Route::get('contract-list', 'ContractController@getList')->name('contract-list');

        Route::resource('transaction', 'TransactionController');
        Route::get('fees', 'TransactionController@feeList')->name('fees');
        Route::get('tran-fee-action', 'TransactionController@tranFeeAction')->name('tran-fee-action');
        Route::post('case-fee-store', 'TransactionController@caseFeeStore')->name('case-fee-store');
        Route::post('store-fund', 'TransactionController@storeTrustFund')->name('store-fund');
        Route::get('get-fund', 'TransactionController@getTrustFund')->name('get-fund');



        Route::resource('case', 'CaseManagementController');
        Route::get('action-contract-case', 'CaseManagementController@actionCase')->name('action-contract-case');
        Route::get('create-case', 'CaseManagementController@createCase')->name('create-case');
        Route::get('add-co-counsel', 'CaseManagementController@addCoCounsel')->name('add-co-counsel');
        Route::get('remove-co-counsel', 'CaseManagementController@removeCoCounsel')->name('remove-co-counsel');
        Route::post('store-contract-case', 'CaseManagementController@storeCase')->name('store-contract-case');
        Route::get('load-counsel', 'CaseManagementController@loadCounsel')->name('load-counsel');
        Route::get('create-contract-case-list', 'ContractController@caseList')->name('create-contract-case-list');

        Route::resource('chargeable', 'ChargeableExpenseController');

        Route::resource('billing', 'BillingController');



        /* Client Route */
        Route::resource('clients', 'ClientController');

        /* Service Report Route */
        Route::resource('service-report','ServiceReportController');

        /** Client Business Route */
        Route::resource('business','BusinessController');
        
    });

    Route::group(['middleware' => ['role:admin|counsel']], function () {
        Route::resource('counsel', 'CounselController');
        Route::get('counsel-list', 'CounselController@getList')->name('counsel-list');
    });

    Route::group(['middleware' => ['role:admin|council|para-legal']], function () {
        Route::post('upload-image',array('as'=>'upload-image','uses'=>'ImageController@imageUpload'));
        Route::get('move-image/{image}', 'ImageController@imageMove')->name('move-image');

        Route::get('profile', 'UserController@userProfileShow')->name('profile');
        Route::get('profile-create', 'UserController@userProfileCreate')->name('profile-create');
        Route::get('profile-edit', 'UserController@userProfileEdit')->name('profile-edit');
        Route::post('profile-update', 'UserController@userProfileUpdate')->name('profile-update');
        Route::post('profile-store', 'UserController@userProfileStore')->name('profile-store');

        Route::view('googleapi','googleapi');
    });







});
