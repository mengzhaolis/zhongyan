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
Route::group(['prefix' => '/'],function(){
    Route::any('/','Home\IndexController@index');
    //首页-课程详情
    Route::any('/course','Home\IndexController@course');
    //首页-课程-更多(课程列表页)
    Route::any('/course_list','Home\IndexController@course_list');
    //首页-资讯详情页
    Route::any('/zx_details','Home\IndexController@zx_details');
    //首页-资讯-更多(资讯列表页)
    Route::any('/message_list','Home\IndexController@message_list');
    //案例详情页
    Route::any('/case_xiang','Home\IndexController@case_xiang');
    //首页-中研行业-换一批
    Route::any('/change_one','Home\IndexController@change_one');
    //首页-关于中研
    Route::any('/aboutcmrc','Home\IndexController@aboutcmrc');

    //首页-八项服务
    Route::any('/eight','Home\IndexController@eight');
    //首页-总裁专栏-总裁专题
    Route::any('/president','Home\IndexController@president');
    
});
    //首页-案例-了解更多
    Route::any('/casemore','Home\CasemoreController@casemore');
//首页-公共部分-计算、需求、留言
Route::group(['prefix' => '/online'],function(){
    //计算器
    Route::any('/counter','Home\OnlineController@counter');
    //计算器联动
    Route::any('/counter_type','Home\OnlineController@counter_type');
    //计算器结果
    Route::any('/jieguo','Home\OnlineController@jieguo');
    //首页-资讯详情页
    Route::any('/zx_details','Home\OnlineController@zx_details');
    //首页-中研行业-换一批
    Route::any('/change_one','Home\OnlineController@change_one');
    //首页头部-需求评估
    Route::any('/need','Home\OnlineController@need');
    //首页-头部-在线留言
    Route::any('/message','Home\OnlineController@message');
    //公共注册页
    Route::any('/login','Home\OnlineController@login');
});
//公共频道页
Route::any('/channel','Home\PublicController@channel');

//首页底部注册-省市二级联动
Route::any('/city','Home\IndexController@city');

/**专题页 */
//网站工业频道页-前端
Route::any('/park','Home\ParkController@park');
Route::any('/park_column','Home\ParkController@park_column');

//商业地产-前端
Route::any('/land','Home\LandController@index');
//竞争对手-前端
Route::any('/rival','Home\RivalController@rival');
//医药医疗-前端
Route::any('/doctor','Home\DoctorController@doctor');
//营销-咨询专题-前端
Route::any('/consult','Home\ConsultController@consult');












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
//总裁专享
Route::group(['prefix' => '/supremo'],function(){
    //总裁动态数据添加
    Route::any('/add','Admin\SupremoController@add');
    //总裁动态列表
    Route::any('/supremo_list','Admin\SupremoController@supremo_list');
    //总裁动态图片上传
    Route::any('/img_add','Admin\SupremoController@img_add');
    //总裁动态数据伪删除
    Route::any('/supremo_stop','Admin\SupremoController@supremo_stop');
    //总裁动态数据置顶-取消置顶
    Route::any('/top','Admin\SupremoController@top');
    //总裁动态数据编辑页面展示
    Route::any('/supremo_up','Admin\SupremoController@supremo_up');
   //总裁动态数据编辑图片更换
   Route::any('/img_up','Admin\SupremoController@img_up');
   //总裁动态数据编辑-编辑数据入库
   Route::any('/supremo_update','Admin\SupremoController@supremo_update');
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
    //管理员管理-A类数据控制
    Route::any('/a_list','Admin\AdministratorController@a_list');
    //管理员管理-A类数据控制-查看描述
    Route::any('/xiang','Admin\AdministratorController@xiang');
    //管理员管理-A类数据-更改数据状态
    Route::any('/status','Admin\AdministratorController@status');
    //管理员管理-需求评估注册
    Route::any('/need_add','Admin\AdministratorController@need_add');
    //管理员管理-需求评估列表、查看详情
    Route::any('/n_list','Admin\AdministratorController@n_list');
    //管理员管理-需求评估列表更改数据状态
    Route::any('/n_status','Admin\AdministratorController@n_status');
    //管理员管理-需求评估列表查看
    Route::any('/n_xiang','Admin\AdministratorController@n_xiang');
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
    //行业删除
    Route::any('/guild_del','Admin\GuildController@guild_del');
    //行业数据编辑
    Route::any('/guild_up','Admin\GuildController@guild_up');
    //执行编辑数据入库
    Route::any('/guild_update','Admin\GuildController@guild_update');
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
//需求评估
Route::group(['prefix' => '/need'],function(){
    //费用计算器-计算器数据展示
    Route::any('/need_list','Admin\NeedController@need_list');
    //费用计算器-数据添加
    Route::any('/need_data_add','Admin\NeedController@need_data_add');
    //费用计算器-调研类型添加
    Route::any('/type_data_add','Admin\NeedController@type_data_add');
    //费用计算器-调研类型列表
    Route::any('/type_list','Admin\NeedController@type_list');
    //费用计算器-调研类型删除
    Route::any('/type_stop','Admin\NeedController@type_stop');

});
//邮件发送
Route::group(['prefix' => '/email'],function(){
    //邮件发送
    Route::any('/mail','Admin\EmailController@mail');
    //请求发送邮件
    Route::any('/email_go','Admin\EmailController@email_go');
    

});
//客户评价图片上传
Route::group(['prefix' => '/evalute'],function(){
    //邮件发送
    Route::any('/eval_add','Admin\EvaluteController@eval_add');
    //请求发送邮件
    Route::any('/eval_list','Admin\EvaluteController@eval_list');
    

});