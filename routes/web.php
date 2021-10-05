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
    return redirect('home/home');
});
Route::get('/test', function () {
    return view('admintest.layout.index');
});

Route::get('/register', 'App\Http\Controllers\UserController@getRegister');
Route::post('/register', 'App\Http\Controllers\UserController@postRegister');
Route::get('/login', 'App\Http\Controllers\UserController@getLogin');
Route::post('/login', 'App\Http\Controllers\UserController@postLogin');
Route::get('/forgotPassWord', 'App\Http\Controllers\UserController@getForgotPassWord');
Route::post('/forgotPassWord', 'App\Http\Controllers\UserController@postForgotPassWord');
Route::get('otp/{id}', 'App\Http\Controllers\UserController@getOTP');
Route::post('otp/{id}', 'App\Http\Controllers\UserController@postOTP');
Route::get('resetPass/{id}', 'App\Http\Controllers\UserController@getresetPass');
Route::post('resetPass/{id}', 'App\Http\Controllers\UserController@postresetPass');

Route::group(['prefix' => 'home'], function () {
    Route::get('/home/{id}', 'App\Http\Controllers\HomeController@homeUser');
    Route::get('/home', 'App\Http\Controllers\HomeController@home');
    // tìm kiếm
    Route::post('/search', 'App\Http\Controllers\HomeController@search');
    Route::post('/search/{id}', 'App\Http\Controllers\HomeController@searchUser');
    Route::group(['prefix' => 'dacdiem'], function () {
        Route::get('/search/{id}', 'App\Http\Controllers\HomeController@DacDiemSearch');
        Route::get('/search/{id}/{idUser}', 'App\Http\Controllers\HomeController@DacDiemSearchUser');
    });
    // trang chi tiết
    Route::get('/view/{id}/{tacgia}', 'App\Http\Controllers\HomeController@view');
    Route::get('/view/{id}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@viewUser');
    Route::get('/viewMonAn/{id}/{idDiaDiem}', 'App\Http\Controllers\HomeController@viewMonAn');

    // comment
    Route::post('/comment/{idUser}/{idDiaDiem}', 'App\Http\Controllers\HomeController@comment');
    Route::get('/deleteCmt/{idcmt}/{idDiaDiem}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@commentDelete');
    // viết bài
    Route::get('/reply/{id}', 'App\Http\Controllers\HomeController@getReply');
    Route::post('/reply/{id}', 'App\Http\Controllers\HomeController@postReply');
    Route::get('/notify/{id}/{idDiaDiem}', 'App\Http\Controllers\HomeController@getNotify');
    
    Route::get('/deleteView/{id}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@getDeleteView');
    Route::get('/acceptDelete/{id}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@getAcceptDelete');
    Route::get('/backView/{id}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@getBackView');
    // cập nhật bài viết
    Route::get('/notifyUpdate/{id}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@notifyUpdate');
    Route::get('/updateView/{id}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@getUpdateView');
    Route::post('/updateView/{id}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@postUpdateView');
    Route::get('/updateCulinary/{id}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@getUpdateCulinary');
    Route::get('/showFormUpdate/{id}/{tacgia}/{idUser}/{idMonAn}', 'App\Http\Controllers\HomeController@showFormUpdate');
    Route::post('/updateCulinary/{id}/{tacgia}/{idUser}/{idMonAn}', 'App\Http\Controllers\HomeController@postUpdateCulinary');
    Route::get('/updateVideo/{id}/{tacgia}/{idUser}', 'App\Http\Controllers\HomeController@getUpdateVideo');
    Route::post('/updateVideo/{id}/{tacgia}/{idUser}/{idVideo}', 'App\Http\Controllers\HomeController@postUpdateVideo');
    // món ăn

    Route::get('/culinary/{id}/{idDiaDiem}','App\Http\Controllers\HomeController@notifyCulinary');
    Route::get('/getCulinary/{id}/{idDiaDiem}','App\Http\Controllers\HomeController@getCulinary');
    Route::post('/getCulinary/{id}/{idDiaDiem}','App\Http\Controllers\HomeController@postCulinary');
    // video
    Route::get('/video/{id}/{idDiaDiem}','App\Http\Controllers\HomeController@notifyVideo');
    Route::get('/getVideo/{id}/{idDiaDiem}','App\Http\Controllers\HomeController@getVideo');
    Route::post('/Video/{id}/{idDiaDiem}','App\Http\Controllers\HomeController@postVideo');
});


Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function () {
    Route::get('adminHome', 'App\Http\Controllers\DiaDiemController@getList');
    Route::group(['prefix' => 'vungmien'], function () {
        Route::get('list', 'App\Http\Controllers\VungMienController@getList');
        Route::get('add', 'App\Http\Controllers\VungMienController@getAdd');
        Route::post('add', 'App\Http\Controllers\VungMienController@postAdd');
        Route::get('update/{id}', 'App\Http\Controllers\VungMienController@getUpdate');
        Route::post('update/{id}', 'App\Http\Controllers\VungMienController@postUpdate');
        Route::get('delete/{id}', 'App\Http\Controllers\VungMienController@getDelete');

    });
    Route::group(['prefix' => 'dacdiem'], function () {
        Route::get('list', 'App\Http\Controllers\DacDiemController@getList');
        Route::get('add', 'App\Http\Controllers\DacDiemController@getAdd');
        Route::post('add', 'App\Http\Controllers\DacDiemController@postAdd');
        Route::get('update/{id}', 'App\Http\Controllers\DacDiemController@getUpdate');
        Route::post('update/{id}', 'App\Http\Controllers\DacDiemController@postUpdate');
        Route::get('delete/{id}', 'App\Http\Controllers\DacDiemController@getDelete');
        Route::post('search', 'App\Http\Controllers\DacDiemController@search');

    });
    Route::group(['prefix' => 'user'], function () {
        Route::get('list', 'App\Http\Controllers\UserController@getList');
        Route::get('add', 'App\Http\Controllers\UserController@getAdd');
        Route::post('add', 'App\Http\Controllers\UserController@postAdd');
        Route::get('level/{id}', 'App\Http\Controllers\UserController@getLevel');
        Route::post('level/{id}', 'App\Http\Controllers\UserController@postLevel');
        Route::get('delete/{id}', 'App\Http\Controllers\UserController@getDelete');
        Route::get('update/{id}', 'App\Http\Controllers\UserController@getUpdate');
        Route::post('update/{id}', 'App\Http\Controllers\UserController@postUpdate');
        Route::post('search', 'App\Http\Controllers\UserController@search');
        Route::get('showSearch/{key}', 'App\Http\Controllers\UserController@showSearch');

    });
    Route::group(['prefix' => 'diadiem'], function () {
        Route::get('list', 'App\Http\Controllers\DiaDiemController@getList');
        Route::get('duyetbai', 'App\Http\Controllers\DiaDiemController@getListDuyet');
        Route::get('add', 'App\Http\Controllers\DiaDiemController@getAdd');
        Route::post('add', 'App\Http\Controllers\DiaDiemController@postAdd');
        Route::get('update/{id}', 'App\Http\Controllers\DiaDiemController@getUpdate');
        Route::post('update/{id}', 'App\Http\Controllers\DiaDiemController@postUpdate');
        Route::get('delete/{id}', 'App\Http\Controllers\DiaDiemController@getDelete');
        Route::post('search', 'App\Http\Controllers\DiaDiemController@search');
        Route::get('showSearch/{key}', 'App\Http\Controllers\DiaDiemController@showSearch');
        Route::get('/view/{id}/{tacgia}', 'App\Http\Controllers\DiaDiemController@view');
        Route::get('/duyet/{id}', 'App\Http\Controllers\DiaDiemController@duyet');
    });
    Route::group(['prefix' => 'video'], function () {
        Route::get('list', 'App\Http\Controllers\VideoController@getList');
        Route::get('add', 'App\Http\Controllers\VideoController@getAdd');
        Route::post('add', 'App\Http\Controllers\VideoController@postAdd');
        Route::get('update/{id}', 'App\Http\Controllers\VideoController@getUpdate');
        Route::post('update/{id}', 'App\Http\Controllers\VideoController@postUpdate');
        Route::get('delete/{id}', 'App\Http\Controllers\VideoController@getDelete');
        Route::post('search', 'App\Http\Controllers\VideoController@search');
        Route::get('showSearch/{key}', 'App\Http\Controllers\VideoController@showSearch');

    });
    Route::group(['prefix' => 'comment'], function () {
        Route::get('list', 'App\Http\Controllers\CommentController@getList');
        Route::get('delete/{id}', 'App\Http\Controllers\CommentController@getDelete');
        Route::post('search', 'App\Http\Controllers\CommentController@search');
        Route::get('showSearch/{key}', 'App\Http\Controllers\CommentController@showSearch');
    });
    Route::group(['prefix' => 'thongke'], function () {
        Route::get('list', 'App\Http\Controllers\ThongKeController@getList');

    });

    Route::group(['prefix' => 'monan'], function () {
        Route::get('list', 'App\Http\Controllers\MonAnController@getList');
        Route::get('add', 'App\Http\Controllers\MonAnController@getAdd');
        Route::post('add', 'App\Http\Controllers\MonAnController@postAdd');
        Route::get('update/{id}', 'App\Http\Controllers\MonAnController@getUpdate');
        Route::post('update/{id}', 'App\Http\Controllers\MonAnController@postUpdate');
        Route::get('delete/{id}', 'App\Http\Controllers\MonAnController@getDelete');
        Route::post('search', 'App\Http\Controllers\MonAnController@search');
        Route::get('showSearch/{key}', 'App\Http\Controllers\MonAnController@showSearch');
        // Route::post('search', 'App\Http\Controllers\MonAnController@postSearch');
        Route::get('duyetbai', 'App\Http\Controllers\MonAnController@getListDuyet');
        Route::get('duyet/{id}', 'App\Http\Controllers\MonAnController@getDuyet');
    });

    Route::group(['prefix' => 'ajax'], function () {
        Route::get('dacdiem/{idvm}', 'App\Http\Controllers\AjaxController@getDacDiem');
    });
});
