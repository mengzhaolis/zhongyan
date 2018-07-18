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
        $case = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('case.status','=',1)->select('case_name','case_miaoshu','img_path','case.id')->orderBy('asc','desc')->orderBy('case.created_at','desc')->get();


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
    //首页-课程管理-课程详情
    public function course(Request $request)
    {
        $id = $request->input('id');
        if(empty($id))
        {
            return '数据参数错误！！！';
        }
        $data = DB::table('course')->where('id','=',$id)->first();
        return view('Home.course_xiang.course_xiang',['course'=>$data]);
    }
    //首页-课程-课程列表页
    public function course_list()
    {
        $data = DB::table('course')->where('status','=',1)->orderBy('asc','desc')->orderBy('created_at','desc')->select('id','course_title','created_at','updated_at','course_jian')->limit(8)->get();
        $data = json_decode(json_encode($data),true);
        foreach ($data as $key => $value) {
            if(strlen($value['course_jian'])>100)
            {
                $data[$key]['course_jian'] = mb_substr($value['course_jian'],0,100,'utf-8').'...';
            }
            $data[$key]['updated_at'] =strtotime($value['updated_at']);
        }
        // var_dump($data);die;
        return view('Home.index.course_list',['course_list'=>$data]);
    }
    //首页-最新资讯-资讯列表
    public function message_list()
    {
        $message = DB::table('channel_table')->leftJoin('images','channel_table.face_img','=','images.id')->where('channel_table.status','=',1)->orderBy('asc','desc')->orderBy('created_at','desc')->select('title','img_path','channel_table.id','describe','created_at')->limit(8)->get();
        $data = json_decode(json_encode($message),true);
        foreach ($data as $key => $value) {
            if(strlen($value['title'])>22)
            {
                $data[$key]['title'] = mb_substr($value['title'],0,22,'utf-8').'...';
            }

        }
        return view('Home.index.message_list',['message'=>$data]);
    }
    //首页-最新资讯-资讯详情
    public function zx_details(Request $request)
    {
         $id = $request->input('id');
         if(empty($id))
         {
            return '数据参数错误！！！';
         }
         $data = DB::table('channel_table')->leftJoin('type','channel_table.message_type','=','type.id')->where('channel_table.id','=',$id)->first();
         $data_id = DB::table('channel_table')->where('id','=',$id)->first();
         $tuijian = DB::table('channel_table')->where('message_type','=',$data_id->message_type)->limit(10)->select('title','id')->get();
         return view('Home.zx_details.zx_details',['zixun'=>$data,'tuijian'=>$tuijian]);
    }
    //首页-中研行业-换一批
    public function change_one(Request $request)
    {
        $id = $request->input('id');
        if(empty($id))
        {
            return '';
        }
        $data = DB::table('guild')->leftJoin('images','guild.guild_img','=','images.id')->where('guild.status','=',1)->select('guild.guild_title','img_path','guild_miao','guild_url')->inRandomOrder()->take(4)->get();
        // return $data;
        return view('Home.index.guild_ti',['guild'=>$data]);
    }
    //案例详情
    public function case_xiang(Request $request)
    {
        $id = $request->input('id');
        $data = DB::table('case')->where('id','=',$id)->first();
        $tuijian = DB::table('case')->where('case_type','=',$data->case_type)->limit(10)->select('case_name','id')->get();
        return view('Home.case.case_xiang',['data'=>$data,'tuijian'=>$tuijian]);
    }
}