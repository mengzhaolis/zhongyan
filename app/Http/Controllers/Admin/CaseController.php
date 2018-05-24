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
           return view("Admin.Case.ca_add",['type'=>$type]);
        }
        $id = $this->model->new_add($this->database,$data);
        return $id;
    }
}