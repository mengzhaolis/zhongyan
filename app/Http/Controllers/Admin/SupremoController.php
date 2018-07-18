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
error_reporting(E_ALL ^ E_NOTICE);
class SupremoController extends CommonController
{
    public function __construct()
    {
        $this->model = new Cms;
    }
    //总裁动态数据添加
    public function add(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return view('Admin.Supremo.add');
        }
        $data['created_at'] = time();
        $data['nums'] = rand(1,9999);
        $id = DB::table('supremo')->insertGetId($data);
        return $id;
    }    
    //封面图上传
    public function img_add(Request $request)
    {
        $path = $request->file('image');
        if(empty($path))
        {
            return \App\Tools\ajax_error();
        }
        $this->database = 'images';
        $this->file_name = 'zy'.'-'.date("YmdHis",time()).'-'.rand(1,9999).'.jpg';
        $add = $this->model->img_add($this->database,$this->file_name,$path);
        if($add==3)
        {
            return \App\Tools\ajax_error();
        }else if($add != '')
        {
            return $add;
        }
    }
    //总裁动态数据列表
    public function supremo_list()
    {
        $data = DB::table('supremo')->where('status','=',1)->orderBy('asc','desc')->orderBy('created_at','desc')->get();
        return view('Admin.Supremo.supremo_list',['data'=>$data]);
    }
    //最新资讯-列表展示-停用
    public function supremo_stop(Request $request)
    {
        if(empty($request->except('_token')))
        {       
            return '';
        }
        $id = DB::table('supremo')->where('id','=',$request->input('id'))->update(['status'=>0]);
        return $id;
    }
    //最新资讯-数据置顶
    public function top(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        if($data['type']==1)
        {
            $id = DB::table('supremo')->where('id','=',$request->input('id'))->update(['asc'=>1,'created_at'=>time()]);
            return $id;
        }
        if($data['type']==0)
        {
            $id =  DB::table('supremo')->where('id','=',$request->input('id'))->update(['asc'=>0,'created_at'=>time()]);
            return $id;
        }
    }
     //资讯编辑
    public function supremo_up(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table("supremo")->leftjoin('images',"supremo.face_img",'=','images.id')->select("supremo.*","images.id as img_id","img_path")->where("supremo.id",'=',$id)->first();
        return view('Admin.Supremo.supremo_up',['data'=>$data]);
    }
    //图片更改
    public function img_up()
    {
        $path = $request->file('image');
        $id = $request->input('id');
        if(empty($path) && empty($id))
        {
            return \App\Tools\ajax_error();
        }
        $id = DB::table('images')->where('id','=',$id)->update(['img_path'=>$path]);
        return $id;
    }
    //执行修改
    public function supremo_update(Request $request)
    {
        $data = $request->except('_token');
        // var_dump($data);die;
        if(!empty($data))
        {
            $id = $this->model->list_update("supremo",$data['id'],2,$data);
            return $id;
        }
        return '';
    }
}