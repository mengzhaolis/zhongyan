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
        $data = DB::table('type')->where([['pid','=',$type],['status','=',1]])->get();
        // var_dump($data);die;
        //行业动态，针对本页面不同的分类
        $dong_first = DB::table('channel_table')->leftJoin('images','channel_table.face_img','=','images.id')->where([['channel_table.status','=',1],['message_type','=',$type]])->orderBy('asc','desc')->orderBy('created_at','desc')->select('title','img_path','channel_table.id as z_id')->limit(1)->get();
        $message = DB::table('channel_table')->where('message_type','=',$type)->select('id','title')->limit(3)->get();
        //城市二级联动
        $province = DB::table('province')->get();
        //案例展示专项
        $array = DB::table('type')->where('pid','=',$type)->pluck('id');

        $case = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->whereIn('case_type',$array)->select('case_name','case_miaoshu','case.id','img_path')->orderBy('created_at','desc')->limit(15)->get();

        return view('Home.public.channel',['type'=>$data,'message'=>$message,'province'=>$province,'case'=>$case,'dong_first'=>$dong_first]);
    }
}
