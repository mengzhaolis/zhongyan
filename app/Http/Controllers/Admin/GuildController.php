<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use Illuminate\Support\Facades\Redis;
use App\Http\Models\Admin\menu;
use App\Http\Models\Admin\Cms;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
error_reporting(E_ALL ^ E_NOTICE);
class GuildController extends CommonController
{
    public function __construct()
    {
        $this->model = new Cms;
    }
    //行业管理列表数据展示
    public function guild_list()
    {
        $data = DB::table('guild')->leftJoin('images','guild.guild_img','=','images.id')->where('guild.status','=',1)->select('guild.id','guild_title','img_path','guild_url','created_at')->get();
        return view('Admin.Guild.guild_list',['data'=>$data]);
    }
    //行业封面图
    public function images_add(Request $request)
    {
        $path = $request->file('image');
        if(empty($path))
        {
            $data = DB::table("images")->where([['status','=',1],['pid','=',0]])->orderBy('asc','asc')->get();
            return view('Admin.Images.images_add',['data'=>$data]);
        }
        
        $this->file_name = 'message'.'-'.date("YmdHis",time()).'-'.rand(1,9999).'.jpg';
        $add = $this->model->img_add('images',$this->file_name,$path);
        if($add==3)
        {
            return \App\Tools\ajax_error();
        }else if($add != '')
        {
            return $add;
        }
        
    }
    //行业管理-行业添加
    public function guild_add(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $id = DB::table('guild')->insertGetId($data);
        return $id;
    }
    //行业删除
    public function guild_del(Request $request)
    {
        $id = $request->input('id');
        if(empty($id))
        {
            return '';
        }
        $id = DB::table('guild')->where('id','=',$id)->delete();
        return $id;
    }
    //行业数据编辑展示模板
    public function guild_up(Request $request)
    {
        $id = $request->input('id');
        if(empty($id))
        {
            return '';
        }
        $data = DB::table('guild')->where('id','=',$id)->first();
        $img = DB::table('images')->where('id','=',$data->guild_img)->select('img_path')->first();
        return view('Admin.Guild.guild_up',['data'=>$data,'img_path'=>$img->img_path]);
    }
    //执行数据编辑功能
    public function guild_update(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $id = DB::table('guild')->where('id','=',$data['id'])->update($data);
        return $id;
    }
}