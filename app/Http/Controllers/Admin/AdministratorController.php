<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;

class AdministratorController extends CommonController
{
    private $database = 'juris';
    public function __construct()
    {
        $this->model = new Cms;
        $this->menu = new menu;
    }
    //角色管理
    public function role(Request $request)
    {
        $data = $request->input();
        if(empty($data))
        {
           
            return view('Admin.Administrator.administrator');
        }
    }
    //添加角色
    public function role_add()
    {
         $data = $this->menu->first($this->database); 
        return view('Admin.Administrator.admin-role-add',['data'=>$data]);
    }
    //权限管理列表页
    public function permission()
    {
        $data = $this->menu->first($this->database);
        return view('Admin.Administrator.admin-permission',['data'=>$data]);
    }
    //权限添加页面展示
    public function permission_add(Request $request)
    {
        
        $data = $request->except('_token');
        
        if(empty($data))
        {
            $data =DB::table("$this->database")->where("pid",'=',0)->get();
            // var_dump($data);die;
            return view('Admin.Administrator.premission_add',['data'=>$data]);
        }
        // return $request->input('_token');
        $id = $this->model->new_add($this->database,$data);
        return $id;
    }
    //管理员列表
    public function admin_list()
    {
        return view('Admin.Administrator.admin_list');
    }
    //添加管理员
    public function admin_add()
    {
        return view('Admin.Administrator.admin_add');
    }
}