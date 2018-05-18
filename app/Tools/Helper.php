<?php
	namespace app\Tools;
//自定义异常类

/*
*ajax请求类
*请求成功
*/
	function ajax_success()
	{
		return response()->json([
                            'status' => \Config::get('constants.success'), 
                            'message' => trans('common.request_successful')
                    ]);
	}
//请求失败
	function ajax_error()
	{
		return response()->json([
				'status'=>\Config::get('constants.success_end'),
				'message'=>trans('common.request_field')
		]);
		
	}
	//参数错误
	function ajax_news()
	{
		return response()->json([
				'status'=>\Config::get('constants.preferences_error'),
				'message'=>trans('common.request_field')
		]);
		
	}
    //权限不够
	function ajax_rbac()
	{
		return response()->json([
				'status'=>\Config::get('constants.limited authority'),
				'message'=>trans('common.quanxian_rbac')
		]);
		
	}
?>