<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use App\Http\Models\Admin\administrator;
use Illuminate\Support\Facades\Storage;

class CountsController extends CommonController
{
    //数据统计-销售人员成交率
    public function ok()
    {
        return view('Admin.Counts.oklv');
    }    
}