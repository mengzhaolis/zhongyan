<?php

namespace app\Http\Controllers\Admin;

use App\Http\Controllers\Admin\CommonController;
use Illuminate\Support\Facades\Redis;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends CommonController
{
    //首页
    public function index(Request $request)
    {   
        // var_dump($request->session()->get('email'));die;
        $data = $this->left();
        return view('Admin.Index_User.index',['data'=>$data]);
        return view('Admin.Index_User.index');
    }
    //首页中对应的欢迎页
    public function welcome()
    {
        return view('Admin.Index_User.welcome');
    }
    //数据不存在展示页
    public function news_list()
    {
        return view('Admin.List_error.404');
    }
     //左侧菜单栏
    public function left()
    {
        //调用递归
        $this->model = new menu;
        $email =session('email');
        //用户表关联角色表取出改用户对应的权限id
        $data = DB::table('users')->leftJoin('role','users.role','=','role.id')->where('email','=',"$email")->first();
        //将用户在角色表中存储的权限做成数组
        $role_id=explode(',',$data->role_juris);
        // var_dump($role_id);die;
        //查询权限表将数据调用递归
        $quanxian = DB::table('juris')->whereIn('id',$role_id)->get();
        $data = json_decode(json_encode($quanxian),true);
        $datas = $this->model->digui($data,0,0);
        return $datas;
    }
    //页面顶部信息数量
    public function nums(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data['email']))
        {
            return 0;
        }
        $users = DB::table('users')->where('email','=',$data['email'])->first();
        if($users->role!=4)
        {
            $data['name'] =$users->name; 
            $data['nums'] =0;
            return $data;
        }
        $num = DB::table('news')->where([['user_id','=',$users->id],['status','=',0]])->pluck('data_id');
        $nums = count($num);
        $name = $users->name;
        $data['name'] =$name; 
        $data['nums'] =$nums; 
        return $data;
    }
}