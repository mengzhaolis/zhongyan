<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;
use Excel;

class SellController extends CommonController
{
    //用户注册-销售人员专用
    public function register_list(Request $request)
    {
        //登陆者id
        $id = DB::table('users')->where('email','=',$request->session()->get('email'))->select('id','name')->first();
        // var_dump($id->id);die;
        //通过登录者id匹配资源分配表news获取到该登陆者对应的注册资源
        $data = DB::table('news')->where('user_id','=',$id->id)->first();
        if(empty($data))
        {
            return "<script>alert('暂无数据')</script>";
        }
        // var_dump($data);die;
        //取得资源后做成数组
        $data_id = explode(',',$data->data_id);
        //将对应的资源id匹配注册表，获取到实际的数据
        $array = DB::table('register')->whereIn('id',$data_id)->get();
        // $people = DB::table('users')->where([['status','=',1],['role','=',4]])->get();
        return view('Admin.Sell.register_list',['array'=>$array,'user_name'=>$id->name]);
    }
}