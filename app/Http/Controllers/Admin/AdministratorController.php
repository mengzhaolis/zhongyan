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
error_reporting(E_ALL ^ E_NOTICE);
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
        $data = DB::table('users')->leftJoin('role','users.role','=','role.id')->select('users.*', 'role.id as r_id', 'role.role_name')->where('users.status','=',1)->get();
        // var_dump($data);die;
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
        $data['created_at']=date("Y-m-d H-i-s",time());
        $id = $this->administrator->admin_add($this->user,$data);
        return $id;
    }
    //管理员管理-A类数据控制
    public function a_list()
    {
        $data = DB::table('jisuan_login')->leftJoin('type','jisuan_login.hangye','=','type.id')->leftJoin('cost','jisuan_login.type','=','cost.id')->orderBy('created_at','desc')->select('jisuan_login.*','type.type_name','cost.diaoyan_type')->get();

        return view('Admin.Administrator.a_list',['data'=>$data]);
    }
    //管理员管理-A类数据-查看描述
    public function xiang(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('jisuan_login')->where('id','=',$id)->select('miaoshu')->first();
        $data = json_decode(json_encode($data),true);
        return $data;
    }
    //管理员管理-A类数据-操作状态
    public function status(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('jisuan_login')->where('id','=',$id)->update(['status'=>0]);
        return $data;
    }
    //管理员管理-需求评估数据注册
    public function need_add(Request $request)
    {
        $data = $request->input();
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $id = DB::table('need_list')->insertGetId($data);
        return $id;
    }
    //管理员管理-需求读取、标记状态
    public function n_list()
    {
         $data = DB::table('need_list')->leftJoin('type','need_list.hangye','=','type.id')->leftJoin('cost','need_list.type','=','cost.id')->orderBy('created_at','desc')->select('need_list.*','type.type_name','cost.diaoyan_type')->get();

        return view('Admin.Administrator.n_list',['data'=>$data]);
    }
    //管理员管理-需求评估-操作状态
    public function n_status(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('need_list')->where('id','=',$id)->update(['status'=>1]);
        return $data;
    }
    //管理员管理-需求评估-查看描述
    public function n_xiang(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('need_list')->where('id','=',$id)->select('miaoshu')->first();
        $data = json_decode(json_encode($data),true);
        return $data;
    }
}