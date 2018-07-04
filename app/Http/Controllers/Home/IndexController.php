<?php

namespace app\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //前端-首页
    public function index()
    {
        //首页开课时间
        $banner = DB::table('images_manage')->where([['pid','=',5],['status','=',1]])->orderBy('asc','desc')->select('img_path','img_url')->get();
        //首页-开课时间
        $course = DB::table('course')->where('status','=',1)->orderBy('asc','desc')->orderBy('created_at','asc')->limit(4)->get();
        foreach ($course as $key => $value) 
        {
            if(strlen($value->course_jian)>50)
            {
                $value->course_jian = mb_substr($value->course_jian,0,50,'utf-8').'...';
            }
            
        }
        //首页-最新资讯(动态)
        $message = DB::table('channel_table')->leftJoin('images','channel_table.face_img','=','images.id')->where('channel_table.status','=',1)->orderBy('channel_table.asc','desc')->orderBy('channel_table.created_at','desc')->select('channel_table.id','title','img_path')->limit(7)->get();
        //首页中研行业
        $guild = DB::table('guild')->leftJoin('images','guild.guild_img','=','images.id')->where('guild.status','=',1)->select('guild.guild_title','img_path','guild_miao','guild_url')->get();
        //首页-调研大讲堂
        
        //首页-成功案例
        $case = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('case.status','=',1)->select('case_name','case_miaoshu','img_path')->orderBy('asc','desc')->orderBy('case.created_at','desc')->get();


        //首页注册-二级联动城市选项
        $province = DB::table('province')->get();

        return view('Home.index.index',['course'=>$course,'message'=>$message,'guild'=>$guild,'case'=>$case,'banner'=>$banner,'province'=>$province]);
    }
    //首页底部注册-二级联动
    public function city(Request $request)
    {
        $pid = $request->except('_token');
        if(empty($pid))
        {
            return '';
        }
        $city = DB::table('city')->where('pid','=',$pid)->get();
        return view('Home.index.login_city',['city'=>$city]);
    }
}