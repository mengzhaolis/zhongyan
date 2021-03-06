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

class CaseController extends CommonController
{
    public $database ='case';
     public function __construct()
    {
        $this->model = new Cms;
        $this->menu = new menu;
    }
    //案例数据展示页
    public function ca_list()
    {
        $data=$this->model->new_list($this->database,0,1);
        // var_dump($data);die;
        return view('Admin.Case.ca_list',['data'=>$data]);
    }
    //案例数据添加
    public function ca_add(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            $type = $this->menu->first('type');
            $data = DB::table('direction')->get();
           return view("Admin.Case.ca_add",['type'=>$type,'data'=>$data]);
        }
        $data['case_num']=rand(1111,9999);
        $data['created_at']=time();
        $id = DB::table('case')->insertGetId($data);
        return $id;
    }
    //案例封面图添加
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
    //案例停用(伪删除)
    public function stop(Request $request)
    {
        $data = $request->except('_token');
        
        if(empty($data['id']))
        {
            return '';
        }
        // return $request->input('id');
        $data['time'] = time();
        $id = $this->model->new_del($this->database,$request->input('id'));
        return $id;
    }
    //文章置顶
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
    public function ca_up(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table("$this->database")->leftjoin('images',"$this->database.face_img",'=','images.id')->where("$this->database.id",'=',$id)->first();
        return view('Admin.Message.message_up',['data'=>$data]);
    }
    //资讯回收站
    public function case_recycle(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            $data = $this->model->new_list($this->database,0,0);
            return view('Admin.Case.ca_recycle',['data'=>$data]);
        }
        if(empty($data['id']))
        {
            return '';
        }
        $data['created_at'] =time();
        $data['status'] =1;
        return $this->model->list_hd($this->database,$data['id'],$data['type'],$data);
    }
    //案例编辑
    public function case_up(Request $request)
    {
        $id = $request->input('id');
        // var_dump($id);die;
        $data = DB::table("$this->database")->leftjoin('images',"$this->database.face_img",'=','images.id')->where("$this->database.id",'=',$id)->first();
        $data->c_id =$id;
        $case_type = DB::table("$this->database")->leftJoin('type',"$this->database.case_type",'=','type.id')->where([["$this->database.status",'=',1],['case.id','=',$id]])->first();
        // var_dump($case_type);die;
        $type = $this->menu->first('type');
        return view('Admin.Case.case_up',['data'=>$data,'case_type'=>$case_type,'type'=>$type]);
    }
    //执行编辑
    public function case_update(Request $request)
    {
        $data = $request->except('_token');
        
        $data['created_at'] = time();
        $data['case_num'] = rand(1111,9999);
        $id = $this->model->list_update($this->database,$data['id'],2,$data);
        return $id;
    }
}