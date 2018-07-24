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
    Route::post('read_notification/{id}', 'NotificationController@read_notification');
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
    Route::get('{id}/edit', 'AdjustmentController@edit')->name('edit');
    Route::post('{id}/update', 'AdjustmentController@update')->name('update');
    Route::get('create', 'AdjustmentController@init')->name('init');
    Route::get('show/{id}', 'AdjustmentController@show')->name('show');
    Route::delete('{id}', 'AdjustmentController@destroy');
});
//crud operations on the users
Route::group(['middleware' => ['auth'], 'prefix' => "user", 'as' => "user."], function () {
    Route::get('/', 'UserController@index')->name('index');
    Route::get('{id}/edit', 'UserController@edit')->name('edit');
    Route::post('{id}/update', 'UserController@update')->name('update');
    Route::get('create', 'UserController@init')->name('init');
    Route::get('show/{id}', 'UserController@show')->name('show');
    Route::delete('{id}', 'UserController@destroy');
    Route::post('{id}/image', 'UserController@upload')->name('upload');
});
//crud operations on the payments
Route::group(['middleware' => ['auth'], 'prefix' => "payment", 'as' => "payment."], function () {
    Route::get('/', 'PaymentController@index')->name('index');
    Route::get('{id}/edit', 'PaymentController@edit')->name('edit');
    Route::post('{id}/update', 'PaymentController@update')->name('update');
    Route::get('create', 'PaymentController@init')->name('init');
    Route::get('show/{id}', 'PaymentController@show')->name('show');
    Route::delete('{id}', 'PaymentController@destroy');
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