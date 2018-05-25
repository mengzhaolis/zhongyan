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

class AdministratorController extends CommonController
{
    private $database = 'juris';
    private $user = 'users';
    public function __construct()
    {
        $this->model = new Cms;
        $this->menu = new menu;
        $this->administrator = new administrator;
    }
    //角色管理
    public function role(Request $request)
    {
        $data = $request->input();
        if(empty($data))
        {
           $data = DB::table("role")->where('status','=',1)->get();
           return view('Admin.Administrator.administrator',['data'=>$data]);
        }
    }
    //添加角色
    public function role_add(Request $request)
    {
        $data = $request->except('_token');
        
        if(empty($data))
        {
            $data = $this->menu->first($this->database); 
            return view('Admin.Administrator.admin-role-add',['data'=>$data]);
        }
        // return $data;
        $data['created_at']=time();
        // return $data;
        $id = $this->model->new_add('role',$data);
        return $id;     
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
            $data =$this->menu->first('juris');
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
        $data = DB::table('users')->leftJoin('role','users.role','=','role.id')->where('users.status','=',1)->get();

        return view('Admin.Administrator.admin_list',['data'=>$data]);
    }
    //添加管理员
    public function admin_add(Request $request)
    {
        $data = $request->except('_token','password2');
        if(empty($data))
        {
            $data = DB::table('role')->where('status','=',1)->get();
            return view('Admin.Administrator.admin_add',['data'=>$data]);
        }
        $data['password']=bcrypt($data['password']);
        $data['created_at']=date();
        $id = $this->administrator->admin_add($this->user,$data);
        return $id;
    }
}