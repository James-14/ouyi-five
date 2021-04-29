<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',function(){
    return 'hello,world!' ;
});

//后端路由群组
Route::group(array('prefix'=>'admin','namespace'=>'Admin','middleware' =>'auth'),function(){
    Route::get('/qrcode', 'QrcodeController@index');

    Route::get('/activity', 'ActivityController@index');
});


Route::auth();

//web接口群组
Route::group(array('prefix'=>'web','namespace'=>'Web'),function(){
    Route::get('/activity', 'WebApiController@activity');
    Route::get('/qrcode', 'WebApiController@qrcode');
    Route::get('/quotations', 'WebApiController@quotations');
});