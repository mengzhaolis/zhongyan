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
//网站首页-前端
Route::any('/','Home\IndexController@index');
//首页底部注册-省市二级联动
Route::any('/city','Home\IndexController@city');
//网站工业频道页-前端
Route::any('/park','Home\ParkController@park');












Route::get('/login','Auth\LoginController@login');
Route::get('/logout','Auth\LoginController@logout');
Route::get('/left','Admin\CommonController@left');

//数据不存在展示页
Route::get('/news_list','Admin\AdminController@news_list');
//页面顶部信息数量
Route::post('/nums','Admin\AdminController@nums');

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
//后台最新动态
Route::group(['prefix' => '/message'],function(){
    //动态列表展示页
    Route::any('/message','Admin\MessageController@message');
    //文章置顶
    Route::any('/top','Admin\MessageController@top');
    //动态添加模板展示
    Route::any('/message_add','Admin\MessageController@message_add');
    //动态编辑
    Route::any('/message_up','Admin\MessageController@message_up');
    //执行文件编辑
    Route::any('/message_update','Admin\MessageController@message_update');
    //动态编辑更改图片
    Route::any('/img_up','Admin\MessageController@img_up');
    //回收站
    Route::any('/message_recycle','Admin\MessageController@message_recycle');
    //文章缩略图
    Route::post('/img_add','Admin\MessageController@img_add');
});
//课程管理
Route::group(['prefix' => '/course'],function(){
    //课程列表展示页
    Route::any('/course_list','Admin\CourseController@course_list');
    //课程管理-课程添加
    Route::any('/course_add','Admin\CourseController@course_add');
    //课程管理-列表数据伪删除
    Route::any('/course_del','Admin\CourseController@course_del');
    //课程管理-列表数据编辑
    Route::any('/course_update','Admin\CourseController@course_update');
    //执行数据修改
    Route::any('/course_up','Admin\CourseController@course_up');
    //课程管理-回收站
    Route::any('/course_recycle','Admin\CourseController@course_recycle');
    //课程管理-课程列表数据置顶
    Route::any('/course_top','Admin\CourseController@course_top');
});
//案例管理
Route::group(['prefix' => '/case'],function(){
    //案例数据列表展示页
    Route::any('/ca_list','Admin\CaseController@ca_list');
    //案例管理数据添加
    Route::any('/ca_add','Admin\CaseController@ca_add');
    //案例封面图片上传
    Route::any('/img_add','Admin\CaseController@img_add');
    //专题列表数据伪删除
    Route::any('/stop','Admin\CaseController@stop');
    //专题列表数据编辑功能
    Route::any('/case_up','Admin\CaseController@case_up');
    //执行数据修改
    Route::any('/case_update','Admin\CaseController@case_update');
    //专题回收站
    Route::any('/case_recycle','Admin\CaseController@case_recycle');
    //专题置顶-取消置顶
    Route::any('/top','Admin\CaseController@top');
});
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//团队管理
Route::group(['prefix' => '/team'],function(){
    //案例数据列表展示页
    Route::any('/team_list','Admin\TeamController@team_list');
    //案例管理数据添加
    Route::any('/team_add','Admin\TeamController@team_add');
    //案例封面图片上传
    Route::any('/img_add','Admin\TeamController@img_add');
    //专题列表数据伪删除
    Route::any('/stop','Admin\TeamController@stop');
    //专题列表数据编辑功能
    Route::any('/Team_up','Admin\TeamController@Team_up');
    //执行数据修改
    Route::any('/Team_update','Admin\TeamController@Team_update');
    //专题回收站
    Route::any('/Team_recycle','Admin\TeamController@Team_recycle');
    //专题置顶-取消置顶
    Route::any('/top','Admin\TimeController@top');
});
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
    //管理员列表
    Route::any('/admin_list','Admin\AdministratorController@admin_list');
    //添加管理员
    Route::any('/admin_add','Admin\AdministratorController@admin_add');
});
//注册管理
Route::group(['prefix' => '/register'],function(){
    //注册数据列表
    Route::any('/register_list','Admin\RegisterController@register_list');
    //注册列表数据导出
    Route::any('/excel_go','Admin\RegisterController@excel_go');
    //注册数据分发-数据入库
    Route::any('/share','Admin\RegisterController@share');
    //注册数据分发-查看分发数据的情况
    Route::any('/resource_list','Admin\RegisterController@resource_list');
    
    //注册管理-资源整合
    Route::any('/register_zheng','Admin\RegisterController@register_zheng');
    //注册管理-资源整合-分发资源
    Route::any('/double_fen','Admin\RegisterController@double_fen');
    //注册管理-资源整合-数据二次分发
    Route::any('/double_two_fen','Admin\RegisterController@double_two_fen');
    //注册管理-销售人员承接数据个人有效率
    Route::any('/is_ok','Admin\RegisterController@is_ok');
});
//资源分发-销售人员专用
Route::group(['prefix' => '/sell'],function(){
    //销售人员对应分配人员列表
    Route::any('/register_list','Admin\SellController@register_list');
    //销售人员查看对应注册数据的详情
    Route::any('/sell_xiang','Admin\SellController@sell_xiang');
    //销售人员记录自己对应数据的详细情况
    Route::any('/sell_add','Admin\SellController@sell_add');
    //注册数据分发-查看分发数据的情况
    Route::any('/resource_list','Admin\RegisterController@resource_list');
    
    //专题置顶-取消置顶
    Route::any('/zt_top','Admin\RegisterController@zt_top');
});
//图片管理
Route::group(['prefix' => '/images'],function(){
    //图片列表
    Route::any('/images_list','Admin\ImagesController@images_list');
    //图片分类-图片添加
    Route::any('/images_add','Admin\ImagesController@images_add');
    //图片分类-数据添加
    Route::any('/images_data_add','Admin\ImagesController@images_data_add');
    //添加图片-数据添加将图片图库
    Route::any('/images_add_img','Admin\ImagesController@images_add_img');
    //图片添加-将图片对应的描述进行添加入库
    Route::any('/images_data_update','Admin\ImagesController@images_data_update');
    //按分类图片展示
    Route::any('/images_show','Admin\ImagesController@images_show');
    //图片分类-置顶
    Route::any('/images_top','Admin\ImagesController@images_top');
    //图片分类-数据伪删除
    Route::any('/images_stop','Admin\ImagesController@images_stop');
    //图片分类-回收站
    // Route::any('/images_recycle','Admin\ImagesController@images_recycle');
});

//行业管理
Route::group(['prefix' => '/guild'],function(){
    //行业列表
    Route::any('/guild_list','Admin\GuildController@guild_list');
    //行业管理-添加行业
    Route::any('/guild_add','Admin\GuildController@guild_add');
    //行业管理-添加封面图
    Route::any('/images_add','Admin\GuildController@images_add');
});


//视频管理
Route::group(['prefix' => '/video'],function(){
    //视频管理-视频列表
    Route::any('/video_list','Admin\VideoController@video_list');
    //视频管理-视频添加
    Route::any('/video_add','Admin\VideoController@video_add');
    //图片分类-数据添加
    Route::any('/images_data_add','Admin\ImagesController@images_data_add');
    //添加图片-数据添加将图片图库
    Route::any('/images_add_img','Admin\ImagesController@images_add_img');
    //图片添加-将图片对应的描述进行添加入库
    Route::any('/images_data_update','Admin\ImagesController@images_data_update');
    //按分类图片展示
    Route::any('/images_show','Admin\ImagesController@images_show');
    //图片分类-置顶
    Route::any('/images_top','Admin\ImagesController@images_top');
    //图片分类-数据伪删除
    Route::any('/images_stop','Admin\ImagesController@images_stop');
    //图片分类-回收站
    // Route::any('/images_recycle','Admin\ImagesController@images_recycle');
});
//费用计算器
Route::group(['prefix' => '/cost'],function(){
    //费用计算器-计算器数据展示
    Route::any('/cost_list','Admin\CostController@cost_list');
    //费用计算器-数据添加
    Route::any('/cost_add','Admin\CostController@cost_add');
    //编辑
    Route::any('/cost_up','Admin\CostController@cost_up');
    //执行编辑入库更改
    Route::any('/cost_update_add','Admin\CostController@cost_update_add');
});
//seo管理
Route::group(['prefix' => '/seo'],function(){
    //seo管理-数据分类
    Route::any('/seo_list','Admin\SeoController@seo_list');
    //seo管理-数据分类添加
    Route::any('/seo_add','Admin\SeoController@seo_add');
    //编辑
    Route::any('/seo_up','Admin\SeoController@seo_up');
    //执行编辑入库更改
    Route::any('/seo_type_update','Admin\SeoController@seo_type_update');
    //seo分类数据删除
    Route::any('/seo_type_del','Admin\SeoController@seo_type_del');
    //seo数据列表
    Route::any('/seo_data_list','Admin\SeoController@seo_data_list');
    //seo数据添加
    Route::any('/seo_data_add','Admin\SeoController@seo_data_add');
    //seo数据编辑
    Route::any('/seo_data_up','Admin\SeoController@seo_data_up');
    //seo数据编辑
    Route::any('/seo_update','Admin\SeoController@seo_update');
});