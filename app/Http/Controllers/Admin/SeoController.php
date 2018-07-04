<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;

class SeoController extends CommonController
{ 
    //seo管理
    public function seo_list()
    {
        $data = DB::table('seo')->where([['status','=',1],['pid','=',0]])->get();
        // $data = json_decode(json_encode($data),true);
        // var_dump($data);die;
       
        return view('Admin.Seo.seo_list',['data'=>$data]);
    }
    //seo管理-sao分类添加
    public function seo_add(Request $requese)
    {
        $data = $requese->except('_token');
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $id = DB::table('seo')->insertGetId($data);
        return $id;
    }
    //seo分类数据编辑
    public function seo_up(Request $requese)
    {
        $id = $requese->except('_token');
        $data = DB::table('seo')->where('id','=',$id)->first();
        $data = json_decode(json_encode($data),true);
        return $data;
    }
    //seo数据分类编辑数据入库
    public function seo_type_update(Request $requese)
    {
        $data = $requese->except('_token');
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $id = DB::table('seo')->where('id','=',$data['id'])->update($data);
        return $id;
    }
    //seo分类数据删除
    public function seo_type_del(Request $requese)
    {
        $id = $requese->except('_token');
        if(empty($id))
        {
            return '';
        } 
        $del_id = DB::table('seo')->where('id','=',$id)->delete();
        return $del_id;
    }
    //seo分类对应数据展示
    public function seo_data_list(Request $requese)
    {
        $id = $requese->get('id');
        $data = DB::table('seo')->where([['status','=',1],['pid','=',$id]])->get();
        $type = DB::table('seo')->where('pid','=',0)->get();
        return view('Admin.Seo.seo_data_list',['data'=>$data,'type'=>$type]);
    }
    //seo数据添加
    public function seo_data_add(Request $requese)
    {
        $data = $requese->except('_token');
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $id = DB::table('seo')->insertGetId($data);
        return $id;
    }
    //seo数据编辑
    public function seo_data_up(Request $requese)
    {
        $id = $requese->except('_token');
        $data = DB::table('seo')->where(['id','=',$id])->first();
        $data = json_decode(json_encode($data),true);
        return $data;
    }
    //seo数据编辑
    public function seo_update(Request $requese)
    {
         $data = $requese->except('_token');
        //  return $data;
         $data['created_at'] = time();
         $id = DB::table('seo')->where('id','=',$data['id'])->update($data);
         return $id;
    }
}