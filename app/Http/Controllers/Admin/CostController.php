<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;

class CostController extends CommonController
{ 
    /**
     * 费用计算器-计算器数据展示
     * mzl 2018-06-22
     */
    public function cost_list()
    {
        $data = DB::table('cost')->where('status','=',1)->get();

        return view('Admin.Cost.cost_list',['data'=>$data]);
    }
    /**
     * 费用计算器-调研分类添加
     * mzl 2018-06-22
     */
    public function cost_add(Request $request)
    {   
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $id = DB::table('cost')->insertGetId($data);
        return $id;
    }
    //费用计算器-计算器数据删除
    public function cost_del(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        
        $id = DB::table('cost')->where('id','=',$data['id'])->delete();
        return $id;
    }
    //费用计算器-数据编辑
    public function cost_up(Request $request)
    {
        $data = $request->except('_token');
        $data = DB::table('cost')->where('id','=',$data['id'])->first();
        $data = json_encode($data);
        // var_dump($data);die;
        return $data;
    }
    //费用计算器-调研类型-数据更改
    public function cost_update_add(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $id = DB::table('cost')->where('id','=',$data['id'])->update($data);
        return $id;
    }
}