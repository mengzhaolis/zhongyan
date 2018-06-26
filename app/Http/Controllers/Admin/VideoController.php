<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;

class VideoController extends CommonController
{   
    public $database ='case';
     public function __construct()
    {
        $this->model = new Cms;
        $this->menu = new menu;
    }

    //标题管理列表展示
    public function video_list(Request $request)
    {
       
        $data=$this->model->new_list($this->database,0,1);
        // var_dump($data);die;
        return view('Admin.Video.video_list',['data'=>$data]);
       
        
    }
    //专题列表数据伪删除
    public function video_add(Request $request)
    {
        // return '';
        return view('Admin.Video.video_add');
    }
    //专题列表数据编辑
    public function course_update(Request $request)
    {
        $data = $request->except('_token');
        // print_r($data);die;
        $this->database = 'course';
        if(!empty($data['id']))
        {
            $data = DB::table('course')->where('id','=',$data['id'])->first();
            return view('Admin.Course.course_update',['data'=>$data]);
        }
        return '';
       
    }
    //执行数据修改
    public function course_up(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        // $data['created_at'] = time();
        $this->database = 'course';
        $id = $this->model->list_update($this->database,$data['id'],2,$data);
        return $id;
    }
    //数据回收站
    public function course_recycle(Request $request)
    {
        $data = $request->except('_token');
        
        $this->database = 'course';
        if(empty($data))
        {
            
            // $where='';
            $data = $this->model->new_list($this->database,0,0);
            // print_r($data);die;
            if(empty($data))
            {
                return view('Admin.List_error.404');
            }
            return view('Admin.Course.course_recycle',['data'=>$data]);
        }
        if(empty($data['id']))
        {
            return '';
        }
        // $data['created_at'] =time();
        $data['status'] =1;
        return $this->model->list_hd($this->database,$data['id'],$data['type'],$data);
    }
    //专题置顶
    public function course_top(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        if($data['type']==1)
        {
            $id = DB::table('course')->where('id','=',$data['id'])->update(['asc'=>1]);
            return $id;
        }
        if($data['type']==0)
        {
            $id =  $id = DB::table('course')->where('id','=',$data['id'])->update(['asc'=>0]);
            return $id;
        }
    }
    /**
     * 课程管理-课程添加
     * mzl 2018-06-19
     * 
     */
    public function course_add(Request $request)
    {
        $data = $request->except('_token');
        
        if(empty($data))
        {
            return view('Admin.Course.course_add');
        }
        // return $data;
        $this->database = 'course';
        $id = $this->model->new_add($this->database,$data);
        return $id;
        
    }
}