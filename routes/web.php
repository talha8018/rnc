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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::get('/challan', function () {
        return view('admin.challan');
    });

    Route::get('challan/file-upload','Challan\ChallanController@fileUploadPage');
    Route::post('challan/upload','Challan\ChallanController@fileUpload');
    Route::get('challan/student-list','Challan\ChallanController@studentList');

    Route::get('challan/student-list/search','Challan\ChallanController@searchStudentList');
    Route::get('challan/print','Challan\ChallanController@challanPrint');
    
});

Route::post('custom-login','Auth\LoginController@authenticate');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
