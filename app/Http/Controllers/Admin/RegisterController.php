<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;

class RegisterController extends CommonController
{
    //注册用户数据列表
    public function register_list()
    {
        return view('Admin.Register.register_list');
    }
}