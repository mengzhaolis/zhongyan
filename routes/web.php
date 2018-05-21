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

// Route::get('/', function () {
//     return view('welcome');
// });

//数据不存在展示页
Route::get('/news_list','Admin\AdminController@news_list');

//后台首页and用户个人信息
Route::group(['prefix' => '/admin'],function(){
    Route::get('/index','Admin\AdminController@index');
    //后台首页中的欢迎页
    Route::get('/welcome','Admin\AdminController@welcome');
});
//后台分类添加
Route::group(['prefix' => '/type'],function(){
    //分类添加-显示模板
    Route::get('/type_add','Admin\TypeController@type_add');
    //分类添加-数据入库
    Route::post('/type_insert','Admin\TypeController@type_insert');
    //分类数据列表展示 
    Route::get('/type_list','Admin\TypeController@type_list');
    //分类列表页对应添加
    Route::get('/type_list_add','Admin\TypeController@type_list_add');
    //分类删除
    Route::post('/type_list_del','Admin\TypeController@type_list_del');
    //回收站数据硬删除
    Route::post('/type_y_del','Admin\TypeController@y_del');
    //分类中数据编辑
    Route::any('/type_list_update','Admin\TypeController@type_list_update');
    //分类回收站
    Route::any('/type_list_recycle','Admin\TypeController@type_list_recycle');
});
//后台最新资讯
Route::group(['prefix' => '/message'],function(){
    //资讯列表展示页
    Route::any('/message','Admin\MessageController@message');
    //文章置顶
    Route::any('/top','Admin\MessageController@top');
    //资讯添加模板展示
    Route::any('/message_add','Admin\MessageController@message_add');
    //资讯编辑
    Route::any('/message_up','Admin\MessageController@message_up');
    //资讯编辑更改图片
    Route::any('/img_up','Admin\MessageController@img_up');
    //回收站
    Route::any('/message_recycle','Admin\MessageController@message_recycle');
    //文章缩略图
    Route::post('/img_add','Admin\MessageController@img_add');
});
//专题管理
Route::group(['prefix' => '/zt'],function(){
    //专题列表展示页
    Route::any('/zt_list','Admin\ZhuantitleController@zt_list');
    //专题列表数据伪删除
    Route::any('/zt_del','Admin\ZhuantitleController@zt_del');
    //专题列表数据编辑功能
    Route::any('/zt_update','Admin\ZhuantitleController@zt_update');
    //执行数据修改
    Route::any('/zt_up','Admin\ZhuantitleController@zt_up');
    //专题回收站
    Route::any('/zt_recycle','Admin\ZhuantitleController@zt_recycle');
    //专题置顶-取消置顶
    Route::any('/zt_top','Admin\ZhuantitleController@zt_top');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//管理员管理
Route::group(['prefix' => '/administrator'],function(){
    //角色管理
    Route::any('/role','Admin\AdministratorController@role');
    //角色添加页面
    Route::any('/role_add','Admin\AdministratorController@role_add');
    //权限列表页
    Route::any('/permission','Admin\AdministratorController@permission');
    //权限添加
    Route::any('/permission_add','Admin\AdministratorController@permission_add');
    //专题回收站
    Route::any('/zt_recycle','Admin\AdministratorController@zt_recycle');
    //专题置顶-取消置顶
    Route::any('/zt_top','Admin\AdministratorController@zt_top');
});
//注册管理
Route::group(['prefix' => '/register'],function(){
    //注册数据列表
    Route::any('/register_list','Admin\RegisterController@register_list');
    //角色添加页面
    Route::any('/role_add','Admin\RegisterController@role_add');
    //权限列表页
    Route::any('/permission','Admin\RegisterController@permission');
    //权限添加
    Route::any('/permission_add','Admin\RegisterController@permission_add');
    //专题回收站
    Route::any('/zt_recycle','Admin\RegisterController@zt_recycle');
    //专题置顶-取消置顶
    Route::any('/zt_top','Admin\RegisterController@zt_top');
});