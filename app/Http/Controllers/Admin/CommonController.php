<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\menu;

class CommonController extends Controller
{
    //未登陆用户不能访问
   public function __construct()
   { 
        $this->middleware('auth');
        // $this->left();
        
   

    }
    //左侧菜单栏
    // public function left()
    // {
    //     //调用递归
    //     $this->model = new menu;
    //     $email =Redis::get('email');
    //     //用户表关联角色表取出改用户对应的权限id
    //     $data = DB::table('users')->leftJoin('role','users.role','=','role.id')->where('email','=',"$email")->first();
    //     //将用户在角色表中存储的权限做成数组
    //     $role_id=explode(',',$data->role_juris);
    //     // var_dump($role_id);die;
    //     //查询权限表将数据调用递归
    //     $quanxian = DB::table('juris')->whereIn('id',$role_id)->get();
    //     $data = json_decode(json_encode($quanxian),true);
    //     $datas = $this->model->digui($data,0,0);
    //     // $request->session()->put('left',$datas);
    //     // var_dump($request->session()->get('left'));die;
    //     return view('Admin.common._menu',['data'=>$datas]);
    // }

}