<?php

namespace app\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OnlineController extends Controller
{
    public function __construct()
    {
        $this->menu = new menu;
    }
    //首页顶部-费用计算器
    public function counter()
    {
        $type = $this->menu->first('type');
        return view('Home.online.counter',['type'=>$type]);
    }
    //计算器二级联动
    public function counter_type(Request $request)
    {
        $id = $request->input('id');
        $type = DB::table('cost')->where('pid','=',$id)->get();
        return view('Home.online.counter_ti',['type'=>$type]);
    }
    //计算器结果
    public function jieguo(Request $request)
    {
        $data = $request->input();
        if(empty($data))
        {
            return '';
        }
        $data['created_at'] = time();
        $id = DB::table('jisuan_login')->insertGetId($data);
        if(empty($id))
        {
            return '';
        }
        $pid = $data['hangye'];
        $type = $data['type'];
        $ret = DB::table('cost')->leftJoin('type','cost.pid','=','type.id')->where([['cost.pid','=',$pid],['cost.id','=',$data['type']]])->first();
        // var_dump($ret);die;
        return view('Home.online.jieguo',['ret'=>$ret]);
    }
    //费用计算-需求评估
    public function need()
    {
        $type = $this->menu->first('type');
        return view('Home.online.need',['type'=>$type]);
    }
    //在线留言页面展示
    public function message()
    {
        return view('Home.online.message');
    }
    //注册页-页面展示
    public function login()
    {
        return view('Home.online.login');
    }
}