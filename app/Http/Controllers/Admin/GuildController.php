<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use Illuminate\Support\Facades\Redis;
use App\Http\Models\Admin\menu;
use App\Http\Models\Admin\Cms;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class GuildController extends CommonController
{
    public function __construct()
    {
        $this->model = new Cms;
    }
    //行业管理列表数据展示
    public function guild_list()
    {
        $data = DB::table('guild')->leftJoin('images','guild.guild_img','=','images.id')->where('guild.status','=',1)->get();
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
}