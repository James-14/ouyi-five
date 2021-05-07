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

//获取token
Route::get('/admin/getApiToken', 'LoginController@getApiToken');

//后端路由群组
Route::group(array('prefix'=>'admin','namespace'=>'Admin', 'middleware' => 'auth.api'),function(){

    //活动
    //列表
    Route::get('/activity', 'ActivityController@index');
    //删除
    Route::get('/activity/del', 'ActivityController@delActivity');
    //保存
    Route::post('/activity/save', 'ActivityController@save');

    //文件上传
    Route::post('/upload', 'CommonController@upload');
    
    //广告信息
    Route::get('/advertising', 'CommonController@advertising');

    //广告信息
    Route::post('/saveAdvertising', 'CommonController@modifyAdvertising');


    
});


//Route::auth();

//web接口群组
Route::group(array('prefix'=>'api','namespace'=>'Web'),function(){
    //活动
    Route::get('/activity', 'WebApiController@activity');

    //获取二维码和跳转地址
    Route::get('/common', 'WebApiController@common');

    //主流币
    Route::get('/mainstream', 'WebApiController@mainstream');

    //涨幅榜
    Route::get('/upDown', 'WebApiController@upDown');

    //成交额榜
    Route::get('/volume', 'WebApiController@volume');

    Route::get('/articles', 'WebApiController@articles');
});