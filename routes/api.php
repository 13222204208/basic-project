<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('minapp')->group(function (){

    Route::group(['namespace' => 'Minapp'], function () {

        //Route::post('login', 'LoginController@login');//用户登陆
        Route::get('banner', 'BannerController@banner');//获取banner列表;
        Route::get('affiche', 'AfficheController@affiche');//获取公告;
        Route::get('activity', 'ActivityController@activity');//获取活动;

        Route::group(['middleware' => 'auth:api'], function () {   


        });
    });

});

Route::prefix('admin')->group(function (){

    Route::group(['namespace' => 'Admin'], function () {

        Route::post('login','LoginController@adminLogin');//登录

        Route::post('logout','LoginController@adminLogout');//登出

        Route::post('upload/img','UploadImgController@uploadImg');//上传图片
        
        Route::group(['middleware' => 'auth:admin'], function () {
            Route::get('info','LoginController@info');//获取后台登陆信息    
            
            Route::resource('admin', 'AdminController');//后台帐号  
           
            Route::resource('banner', 'BannerController');//banner图
            
            Route::resource('activity', 'ActivityController');//活动
            
            Route::resource('channel', 'ChannelController');//频道

            Route::resource('content', 'ContentController');//内容

            Route::resource('course', 'CourseController');//课程

            Route::resource('affiche', 'AfficheController');//公告
        });
    });

});