<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;


class MessageController extends CommonController
{
    private $database = 'channel_table';
    private $file_name= '';

    public function __construct()
    {
        $this->model = new Cms;
    }
    //最新资讯-列表展示
    public function message(Request $request)
    {
        if(empty($request->except('_token')))
        {
            $data = $this->model->new_list($this->database,0,1);
            // var_dump($data);die;
            return view('Admin.Message.message',['data'=>$data]);
        }
        $data = $request->input();
        $data['time'] = time();
        if(empty($data['id']))
        {
            return '';
        }
        // return $request->input('id');
        $id = $this->model->new_del($this->database,$request->input('id'));
        return $id;
    }
    //最新资讯数据添加
    public function message_add(Request $request)
    {
        if(empty($request->except('_token')))
        {
            return view('Admin.Message.message_add');
        }
        
        $data = $request->except('_token');
        $data['created_at'] = time();
        $data['look_num'] = rand(100,5000);
        $id = $this->model->new_add($this->database,$data);
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
        $this->file_name = 'message'.'-'.date("YmdHis",time()).'-'.rand(1,9999).'.jpg';
        $add = $this->model->img_add($this->database,$this->file_name,$path);
        if($add==3)
        {
            return \App\Tools\ajax_error();
        }else if($add != '')
        {
            return $add;
        }
    }
    //数据置顶
    public function top(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        if($data['type']==1)
        {
            $id = $this->model->list_top($this->database,$data['id'],1);
            return $id;
        }
        if($data['type']==0)
        {
            $id = $this->model->list_top($this->database,$data['id'],0);
            return $id;
        }
    }
    //资讯编辑
    public function message_up(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table("$this->database")->leftjoin('images',"$this->database.face_img",'=','images.id')->select("channel_table.*","images.id as img_id","img_path")->where("$this->database.id",'=',$id)->first();
        return view('Admin.Message.message_up',['data'=>$data]);
    }
    //资讯回收站
    public function message_recycle(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            $data = $this->model->new_list($this->database,0,0);
            return view('Admin.Message.message_recycle',['data'=>$data]);
        }
        if(empty($data['id']))
        {
            return '';
        }
        $data['created_at'] =time();
        $data['status'] =1;
        return $this->model->list_hd($this->database,$data['id'],$data['type'],$data);
    }
    ////封面图修改
    public function img_up(Request $request)
    {
        $path = $request->file('image');
        $id = $request->input('id');
        if(empty($path))
        {
            return \App\Tools\ajax_error();
        }
        $this->database = 'images';
        // $this->file_name = 'message'.'-'.date("YmdHis",time()).'-'.rand(1,9999).'.jpg';
        $data = DB::table("images")->where('id','=',16)->first();
        // return $data->img_name;
        if(!empty($data))
        {
            $del =Storage::delete('849.jpg');
            return $del;
        }
        // $add = $this->model->img_add($this->database,$this->file_name,$path);
        // if($add==3)
        // {
        //     return \App\Tools\ajax_error();
        // }else if($add != '')
        // {
        //     return $add;
        // }
    }
    //执行修改
    public function message_update(Request $request)
    {
        $data = $request->except('_token');
        // var_dump($data);die;
        if(!empty($data))
        {
            $id = $this->model->list_update("$this->database",$data['id'],2,$data);
            return $id;
        }
        return '';
    }
}