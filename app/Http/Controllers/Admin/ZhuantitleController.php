<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;

class ZhuantitleController extends CommonController
{   
    private $database = '';
    private $type = '';

    public function __construct()
    {
        $this->model = new Cms;
    }

    //标题管理列表展示
    public function zt_list(Request $request)
    {
        $data = $request->except('_token');
        
        if(empty($data))
        {
            $this->database = 'zhuan_title';
            // $where='';
            $data = $this->model->new_list($this->database,0,1);
            // print_r($data);die;
            if(empty($data))
            {
                return view('Admin.List_error.404');
            }
            return view('Admin.Zhuan_title.zhuan_title_list',['data'=>$data]);
        }
        $data['created_at'] = time();
        $this->database = 'zhuan_title';
        $add = $this->model->new_add($this->database,$data);
        if(empty($add))
        {
            return 3;
        }
        return $add;
    }
    //专题列表数据伪删除
    public function zt_del(Request $request)
    {
        // return '';
        if(empty($request->input('id')))
        {
            return '';
        }
        $this->database = 'zhuan_title';
        $int = $this->model->new_del($this->database,$request->input('id'));
        // return $int;
        if(!empty($int))
        {
            return $int;
        }else
        {
            return '';
        }
    }
    //专题列表数据编辑
    public function zt_update(Request $request)
    {
        $data = $request->except('_token');
        // print_r($data);die;
        $this->database = 'zhuan_title';
        if(!empty($data['id']))
        {
            $data = $this->model->list_update($this->database,$data['id'],1,0);
            // var_dump($data);die;
            return json_encode($data);
        }
        return '';
       
    }
    //执行数据修改
    public function zt_up(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $this->database = 'zhuan_title';
        $id = $this->model->list_update($this->database,$data['id'],2,$data);
        return $id;
    }
    //数据回收站
    public function zt_recycle(Request $request)
    {
        $data = $request->except('_token');
        
        $this->database = 'zhuan_title';
        if(empty($data))
        {
            
            // $where='';
            $data = $this->model->new_list($this->database,0,0);
            // print_r($data);die;
            if(empty($data))
            {
                return view('Admin.List_error.404');
            }
            return view('Admin.Zhuan_title.zhuan_recycle',['data'=>$data]);
        }
        if(empty($data['id']))
        {
            return '';
        }
        $data['created_at'] =time();
        $data['status'] =1;
        return $this->model->list_hd($this->database,$data['id'],$data['type'],$data);
    }
    //专题置顶
    public function zt_top(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data))
        {
            return '';
        }
        $this->database = 'zhuan_title';
        if($data['type']==1)
        {
            $id = $this->model->list_top($this->database,$data['id'],$data['type']);
            return $id;
        }
        if($data['type']==0)
        {
            $id = $this->model->list_top($this->database,$data['id'],$data['type']);
            return $id;
        }
    }
}