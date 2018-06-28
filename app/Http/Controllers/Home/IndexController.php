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

        return view('Home.index.index',['course'=>$course,'message'=>$message]);
    }
}