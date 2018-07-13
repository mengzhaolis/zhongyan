<?php

namespace app\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //公共频道页
    public function channel(Request $request)
    {
        //中研栏目
        $type = $request->input('type');
        $data = DB::table('type')->where([['pid','=',$type],['status','=',1]])->orWhere('id','=',$type)->get();
        // var_dump($data);die;
        //行业动态，针对本页面不同的分类
        $message = DB::table('channel_table')->where('message_type','=',$type)->select('id','title')->limit(3)->get();
        //城市二级联动
        $province = DB::table('province')->get();
        //案例展示专项
        $case = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('case_type','=',$type)->select('case_name','case_miaoshu','case.id','img_path')->orderBy('created_at','desc')->get();

        return view('Home.public.channel',['type'=>$data,'message'=>$message,'province'=>$province,'case'=>$case]);
    }
}
