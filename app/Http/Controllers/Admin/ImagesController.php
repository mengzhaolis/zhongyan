<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;

class ImagesController extends CommonController
{
    public $database = 'images_manage';
    public function __construct()
    {
        $this->model = new Cms;
    }
    //图片列表展示
    public function images_list()
    {
        $data = DB::table("$this->database")->where([['status','=',1],['pid','=',0]])->orderBy('asc','desc')->get();
        return view('Admin.Images.images_list',['data'=>$data]);
    }
    //图片分类-图片添加
    public function images_add(Request $request)
    {
        $path = $request->file('image');
        if(empty($path))
        {
            $data = DB::table("$this->database")->where([['status','=',1],['pid','=',0]])->orderBy('asc','asc')->get();
            return view('Admin.Images.images_add',['data'=>$data]);
        }
        
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
    //图片分类-图片分类名添加
    public function images_data_add(Request $request)
    {
        $data = $request->except('_token');
        // var_dump($data);die;
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $data['pid'] = 0;
        $id = $this->model->list_update($this->database,$data['id'],2,$data);
        return $id;
    }
    //图片分类-图片添加
    public function images_add_img(Request $request)
    {
        $path = $request->file('image');
        if(empty($path))
        {
            $data = DB::table("$this->database")->where([['status','=',1],['pid','=',0]])->orderBy('asc','asc')->get();
            return view('Admin.Images.images_add',['data'=>$data]);
        }
        
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
    //图片添加-将图片的描述进行添加入库
    public function images_data_update(Request $request)
    {
        $data = $request->except('_token');
        // var_dump($data);die;
        if(empty($data))
        {
            return '';
        }
        $data['updated_at'] = time();
        $id = $this->model->list_update($this->database,$data['id'],2,$data);
        return $id;
    }
    //按分类进行图片展示
    public function images_show(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table("$this->database")->where([["pid",'=',$id],['status','=',1]])->orderBy('asc','desc')->orderBy('updated_at','desc')->get();
        // var_dump($data);die;
        return view('Admin.Images.images_show',['data'=>$data]);
    }
    //设置图片分类数据置顶与取消置顶
    public function images_top(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        if($data['type']==1)
        {
            $id = $this->model->list_top($this->database,$data['id'],0);
            if(empty($id))
            {
                return '';
            }
            return $id;
        }
        if($data['type']==2)
        {
            $id = $this->model->list_top($this->database,$data['id'],10000);
            if(empty($id))
            {
                return '';
            }
            return $id;
        }
        return '';
    }
    //图片分类-伪删除
    public function images_stop(Request $request)
    {
        $id = $request->input('id');
        if(empty($id))
        {
            return '';
        }
        $ret = $this->model->new_del($this->database,$id);
        return $ret;
    }
    //图片分类-回收站
    public function images_recycle(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            $data = DB::table("$this->database")->where([['status','=',0],['pid','=',0]])->orderBy('asc','desc')->get();
            return view('Admin.Images.recycle_list',['data'=>$data]);
        }
    }

}