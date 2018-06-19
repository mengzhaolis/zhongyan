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
    public $database = 'register';
    public function __construct()
    {
        $this->model = new Cms;
    }
    //用户注册-销售人员专用
    public function register_list(Request $request)
    {
        //登陆者id
        $id = DB::table('users')->where('email','=',$request->session()->get('email'))->select('id','name')->first();
        // var_dump($id->id);die;
        //通过登录者id匹配资源分配表news获取到该登陆者对应的注册资源
        $data = DB::table('news')->where('user_id','=',$id->id)->pluck('data_id');
        // var_dump($data);die;
        if(empty($data))
        {
            return "<script>alert('暂无数据')</script>";
        }
        // var_dump($data);die;
        //取得资源后做成数组
        // $data_id = json_decode(json_encode($data),true);
        //将对应的资源id匹配注册表，获取到实际的数据
        $array = DB::table('register')->whereIn('id',$data)->get();
        // $people = DB::table('news')->where([['status','=',1],['role','=',4]])->get();
        return view('Admin.Sell.register_list',['array'=>$array,'user_name'=>$id->name]);
    }
    //产看注册详情
    public function sell_xiang(Request $request)
    {
        $id = $request->except('_token');
        if(empty($id))
        {
            return '';
        }
        $xiang = DB::table('register')->where('id','=',$id['id'])->select('crcm_need')->first();
        return $xiang->crcm_need;
    }
    //销售人员操作数据进行入库
    public function sell_add(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data['id']))
        {
            return '';
        }
        $status = DB::table('register')->where('id','=',$data['id'])->first();
        $status_up = $status->status+$data['status'];
        $data['changed_at'] = time();
        $data['status'] =$status_up;
        $id = $this->model->list_update($this->database,$data['id'],2,$data);
        if(empty($id))
        {
            return '';
        }
        $ids = DB::table('news')->where('data_id','=',$data['id'])->update(['status'=>1]);
        return $ids;
    }
}