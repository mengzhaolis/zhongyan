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
        $data = DB::table("$this->database")->where([['status','=',1],['pid','=',0]])->get();
        return view('Admin.Images.images_list',['data'=>$data]);
    }
    //图片分类-图片添加
    public function images_add(Request $request)
    {
        $path = $request->file('image');
        if(empty($path))
        {
            return view('Admin.Images.images_add');
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

}