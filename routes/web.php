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
// Route::get('/test', function () {
//     return view('admin.user.list');
// });
Route::group(['prefix'=>'admin'],function(){
    Route::get('adminHome','App\Http\Controllers\DiaDiemController@getList');
    Route::group(['prefix'=>'user'],function(){
        Route::get('list','App\Http\Controllers\UserController@getList');
        
    });
    Route::group(['prefix'=>'diadiem'],function(){
        Route::get('list','App\Http\Controllers\DiaDiemController@getList');       
    });
    Route::group(['prefix'=>'comment'],function(){
        Route::get('list','App\Http\Controllers\CommentController@getList');       
    });
});
