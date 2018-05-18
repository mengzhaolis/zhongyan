<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;

class AdminController extends CommonController
{
    //首页
    public function index()
    {
        return view('Admin.Index_User.index');
    }
    //首页中对应的欢迎页
    public function welcome()
    {
        return view('Admin.Index_User.welcome');
    }
    //数据不存在展示页
    public function news_list()
    {
        return view('Admin.List_error.404');
    }
}