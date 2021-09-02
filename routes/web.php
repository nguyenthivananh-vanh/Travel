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

Route::get('/register','App\Http\Controllers\UserController@getRegister');
Route::post('/register','App\Http\Controllers\UserController@postRegister');
Route::get('/login','App\Http\Controllers\UserController@getLogin');
Route::post('/login','App\Http\Controllers\UserController@postLogin');

Route::group(['prefix'=>'home'],function(){
    Route::get('/home','App\Http\Controllers\HomeController@home');
    Route::post('/search','App\Http\Controllers\HomeController@search');
    Route::get('/view/{id}','App\Http\Controllers\HomeController@view');
});
Route::group(['prefix'=>'admin'],function(){
    Route::get('adminHome','App\Http\Controllers\DiaDiemController@getList');
    Route::group(['prefix'=>'vungmien'],function(){
        Route::get('list','App\Http\Controllers\VungMienController@getList');
        Route::get('add','App\Http\Controllers\VungMienController@getAdd');
        Route::post('add','App\Http\Controllers\VungMienController@postAdd');
        Route::get('update/{id}','App\Http\Controllers\VungMienController@getUpdate');
        Route::post('update/{id}','App\Http\Controllers\VungMienController@postUpdate');
        Route::get('delete/{id}','App\Http\Controllers\VungMienController@getDelete');

    });
    Route::group(['prefix'=>'dacdiem'],function(){
        Route::get('list','App\Http\Controllers\DacDiemController@getList');
        Route::get('add','App\Http\Controllers\DacDiemController@getAdd');
        Route::post('add','App\Http\Controllers\DacDiemController@postAdd');
        Route::get('update/{id}','App\Http\Controllers\DacDiemController@getUpdate');
        Route::post('update/{id}','App\Http\Controllers\DacDiemController@postUpdate');
        Route::get('delete/{id}','App\Http\Controllers\DacDiemController@getDelete');

    });
    Route::group(['prefix'=>'user'],function(){
        Route::get('list','App\Http\Controllers\UserController@getList');
        Route::get('add','App\Http\Controllers\UserController@getAdd');
        Route::post('add','App\Http\Controllers\UserController@postAdd');
        Route::get('level/{id}','App\Http\Controllers\UserController@getLevel');
        Route::post('level/{id}','App\Http\Controllers\UserController@postLevel');
        Route::get('delete/{id}','App\Http\Controllers\UserController@getDelete');
        Route::get('update/{id}','App\Http\Controllers\UserController@getUpdate');
        Route::post('update/{id}','App\Http\Controllers\UserController@postUpdate');

    });
    Route::group(['prefix'=>'diadiem'],function(){
        Route::get('list','App\Http\Controllers\DiaDiemController@getList');
        Route::get('add','App\Http\Controllers\DiaDiemController@getAdd');
        Route::post('add','App\Http\Controllers\DiaDiemController@postAdd');
        Route::get('update/{id}','App\Http\Controllers\DiaDiemController@getUpdate');
        Route::post('update/{id}','App\Http\Controllers\DiaDiemController@postUpdate');
        Route::get('delete/{id}','App\Http\Controllers\DiaDiemController@getDelete');
    });
    Route::group(['prefix'=>'comment'],function(){
        Route::get('list','App\Http\Controllers\CommentController@getList');
        Route::get('delete/{id}','App\Http\Controllers\CommentController@getDelete');
    });
    Route::group(['prefix'=>'thongke'],function(){
        Route::get('list','App\Http\Controllers\ThongKeController@getList');
      
    });

    Route::group(['prefix'=>'ajax'],function(){
        Route::get('dacdiem/{idvm}','App\Http\Controllers\AjaxController@getDacDiem');
    });
});
