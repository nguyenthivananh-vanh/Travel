<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('admin.layout.index');
});
Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'user'],function(){
        Route::get('list','App\Http\Controllers\UserController@getList');
        Route::get('update/{id}','App\Http\Controllers\TheLoaiController@getUpdate');
        Route::post('update/{id}','App\Http\Controllers\TheLoaiController@postUpdate');
        Route::get('add','App\Http\Controllers\TheLoaiController@getAdd');
        Route::post('add','App\Http\Controllers\TheLoaiController@postAdd');
        Route::get('delete/{id}','App\Http\Controllers\TheLoaiController@getDelete');
    });
});
