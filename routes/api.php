<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('minapp')->group(function (){

    Route::group(['namespace' => 'Minapp\User'], function () {

        Route::post('login', 'LoginController@login');//用户登陆
        Route::get('agreement', 'AgreementController@agreement');//服务协议

        Route::group(['middleware' => 'auth:api'], function () {   
            Route::post('upload-img', 'RealNameController@uploadImg');//上传图片      
            Route::post('real-name', 'RealNameController@realName');//实名认证    

            Route::post('store-address', 'AddressController@storeAddress');//添加新地址
            Route::get('address-list', 'AddressController@addressList');//地址列表
            Route::post('del-address', 'AddressController@delAddress');//删除地址
            Route::post('update-address', 'AddressController@updateAddress');//更新地址

        });
    });

    Route::group(['namespace' => 'Minapp\Order'], function () {
        
        Route::group(['middleware' => 'auth:api'], function () {   
            Route::post('store-order', 'ExpressOrderController@storeOrder');//发货
            Route::get('order-list', 'ExpressOrderController@orderList');//订单列表
        });
    });

    Route::group(['namespace' => 'Minapp\GoodsType'], function () {
            Route::get('goods-type', 'GoodsTypeController@goodsType');//物品类型
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