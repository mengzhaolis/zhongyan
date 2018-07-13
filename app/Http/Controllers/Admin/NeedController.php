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
error_reporting(E_ALL ^ E_NOTICE);
class NeedController extends CommonController
{
    //需求评估-数据列表
    public function need_list()
    {
        $list = DB::table('need')->where([['status','=',1],['pid','=',0]])->get();
        $data = DB::table('need')->where('pid','=',0)->get();
        return view('Admin.Need.need_list',['list'=>$list,'data'=>$data]);
    }    
    //需求评估-行业数据添加
    public function need_data_add(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        $data['pid']=0;
        $id = DB::table('need')->insertGetId($data);
        return $id;
    }
    //需求评估-调研类型数据添加
    public function type_data_add(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        $id = DB::table('need')->insertGetId($data);
        return $id;
    }
    //需求评估-调研类型数据列表
    public function type_list(Request $request)
    {
        $pid = $request->input('pid');
        if(empty($pid))
        {
            return '参数错误';
        }
        $data = DB::table('need')->where('pid','=',$pid)->get();
        return view('Admin.Need.type_list',['data'=>$data]);
    }
    //需求评估-调研类型删除
    public function type_stop(Request $request)
    {
        $id = $request->input('id');
        if(empty($id))
        {
            return '';
        }
        $ret =DB::table('need')->where('id','=',$id)->delete();
        return $ret;
    }
}