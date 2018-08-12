<?php
Route::Auth();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/handle_youtube', 'youtubeController@index');
Route::post('/unprocessed', 'youtubeController@unProcessed');
Route::post('/file/setProcessed', 'youtubeController@setProcessed');

Route::group(['middleware' => ['auth'], 'prefix' => "files", 'as' => "files."], function () {
    Route::post('/endpoint', 'fileController@handle')->name('endpoint');
    Route::post('/save_file', 'fileController@saveFile')->name('save_file');
    Route::delete('/endpoint/{file}', 'fileController@handle')->name('delete_endpoint');
    Route::post('/get_file_info', 'fileController@getFileInfo')->name('get_file_info');
    Route::get('{model}/{field}/{id}/sign_now', 'fileController@signNow')->name('sign_now');
    Route::post('/addSignature', 'fileController@addSignature')->name('addSignature');
    Route::delete('{id}/{model}/{file_column}/delete_file', 'fileController@deleteFile')->name('delete_file');
    Route::get('/getFiles', ['uses' => 'fileController@getUserFiles', 'middleware' => 'authorize', 'roles' => []])->name('getFiles');
    Route::post('{multiple}/{model_name}/{model_field}/{id}/getFiles', ['uses' => 'fileController@postFiles', 'middleware' => 'authorize', 'roles' => []])->name('getFiles');
    Route::get('/', ['uses' => 'AdminController@index', 'middleware' => 'authorize', 'roles' => []])->name('index');

    /*--routes@@files*/
});

Route::group(['middleware' => ['auth', /*'chooseRole'*/]], function () {

    Route::get('create_token/{token}', 'NotificationController@createToken');
    Route::get('trial', 'NotificationController@trial');
    Route::get('send', 'NotificationController@send');
    Route::get('get_notifications', 'NotificationController@getNotifications');
    Route::post('read_notification/{id}', 'NotificatiaonController@read_notification');
    Route::post('read_notifications', 'NotificationController@read_notifications');
    /*--routes@@notifications*/
});

Route::get('/choose_role_view', ['uses' => 'AdminController@choose_role_view', 'middleware' => 'auth', 'roles' => []])->name('choose_role_view');
Route::get('{role_id}/choose_role', ['uses' => 'AdminController@choose_role', 'middleware' => 'auth', 'roles' => []])->name('choose_role');

Route::group(['middleware' => ['auth'], 'prefix' => "log", 'as' => "log."], function () {
    Route::get('/', ['uses' => 'logController@index'])->name('index');
    /*--routes@@log*/
});
//crud operations on the Adjustments
Route::group(['middleware' => ['auth'], 'prefix' => "adjustment", 'as' => "adjustment."], function () {
    Route::get('/', 'AdjustmentController@index')->name('index');
    Route::get('{id}/edit', ['uses'=>'AdjustmentController@edit', 'middleware'=>'adjustment'])->name('edit');
    Route::post('{id}/update', ['uses'=>'AdjustmentController@update', 'middleware'=>'adjustment'])->name('update');
    Route::get('create', 'AdjustmentController@init')->name('init');
    Route::delete('{id}', ['uses'=>'AdjustmentController@destroy', 'middleware'=>'adjustment']);
});
//crud operations on the users
Route::group(['middleware' => ['auth'], 'prefix' => "user", 'as' => "user."], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('{id}/edit', 'UserController@edit')->name('edit');
    Route::post('{id}/update', 'UserController@update')->name('update');
    Route::get('create', 'UserController@init')->name('init');
    Route::delete('{id}', 'UserController@destroy');
    Route::post('{id}/image', 'UserController@upload')->name('upload');
});
//crud operations on the payments
Route::group(['middleware' => ['auth'], 'prefix' => "payment", 'as' => "payment."], function () {
    Route::get('/', 'PaymentController@index')->name('index');
    Route::get('{id}/edit', 'PaymentController@edit')->name('edit');
    Route::post('{id}/update', 'PaymentController@update')->name('update');
    Route::get('create', 'PaymentController@init')->name('init');
    Route::delete('{id}', 'PaymentController@destroy');
});
//crud operations on the currencies
Route::group(['middleware' => ['auth'], 'prefix' => "currency", 'as' => "currency."], function () {
    Route::get('/', 'CurrencyController@index')->name('index');
    Route::get('{id}/edit', 'CurrencyController@edit')->name('edit');
    Route::post('{id}/update', 'CurrencyController@update')->name('update');
    Route::get('create', 'CurrencyController@init')->name('init');
    Route::delete('{id}', 'CurrencyController@destroy');
});
//crud operations on the units
Route::group(['middleware' => ['auth'], 'prefix' => "unit", 'as' => "unit."], function () {
    Route::get('/', 'UnitController@index')->name('index');
    Route::get('{id}/edit', 'UnitController@edit')->name('edit');
    Route::post('{id}/update', 'UnitController@update')->name('update');
    Route::get('create', 'UnitController@init')->name('init');
    Route::delete('{id}', 'UnitController@destroy');
});
//crud operations on the services
Route::group(['middleware' => ['auth'], 'prefix' => "service", 'as' => "service."], function () {
    Route::get('/', 'ServiceController@index')->name('index');
    Route::get('{id}/edit', 'ServiceController@edit')->name('edit');
    Route::post('{id}/update', 'ServiceController@update')->name('update');
    Route::get('create', 'ServiceController@init')->name('init');
    Route::delete('{id}', 'ServiceController@destroy');
});
//crud operations on the clients
Route::group(['middleware' => ['auth'], 'prefix' => "client", 'as' => "client."], function () {
    Route::get('/', 'ClientController@index')->name('index');
    Route::get('{id}/edit', 'ClientController@edit')->name('edit');
    Route::post('{id}/update', 'ClientController@update')->name('update');
    Route::get('create', 'ClientController@init')->name('init');
    Route::delete('{id}', 'ClientController@destroy');
});
//crud operations on the invoices
Route::group(['middleware' => ['auth'], 'prefix' => "invoice", 'as' => "invoice."], function () {
    Route::get('/', 'InvoiceController@index')->name('index');
    Route::get('{id}/edit', 'InvoiceController@edit')->name('edit');
    Route::post('{id}/update', 'InvoiceController@update')->name('update');
    Route::get('create', 'InvoiceController@init')->name('init');
    Route::delete('{id}', 'InvoiceController@destroy');
});
//crud operations on the tasks
Route::group(['middleware' => ['auth'], 'prefix' => "task", 'as' => "task."], function () {
    Route::get('/', 'TaskController@index')->name('index');
    Route::get('/getData','TaskController@anyData')->name('data');
    Route::get('{id}/edit', 'TaskController@edit')->name('edit');
    Route::post('{id}/update', 'TaskController@update')->name('update');
    Route::post('{id}/parsedata', 'TaskController@parsedata')->name('parsedata');
    Route::get('create', 'TaskController@init')->name('init');
    Route::delete('{id}', 'TaskController@destroy');
});
//crud operations on the contacts
Route::group(['middleware' => ['auth'], 'prefix' => "contact", 'as' => "contact."], function () {
    Route::get('/', 'ContactController@index')->name('index');
    Route::get('{id}/edit', 'ContactController@edit')->name('edit');
    Route::post('{id}/update', 'ContactController@update')->name('update');
    Route::get('create', 'ContactController@init')->name('init');
    Route::delete('{id}', 'ContactController@destroy');
});
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
//--routes--