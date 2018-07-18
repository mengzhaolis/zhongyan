<?php

namespace app\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ParkController extends Controller
{
    //工业频道页
    public function park()
    {
        //工业行业动态
        $dongtai = DB::table('channel_table')->where([['status','=',1],['message_type','=',1]])->select('id','title')->get();
        $dong_first = DB::table('channel_table')->leftJoin('images','channel_table.face_img','=','images.id')->where([['channel_table.status','=',1],['message_type','=',1]])->orderBy('asc','desc')->orderBy('created_at','desc')->select('title','img_path','channel_table.id as z_id')->limit(1)->get();
        // foreach ($case as $key => $value) 
        // {
        //     if(strlen($value->title)>100)
        //     {
        //         $value->title = mb_substr($value->title,0,100,'utf-8').'...';
        //     }else
        //     {
        //         $value->title = $value->title;
        //     }
            
        // }
        //工业频道页-工业对应案例
        $case = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where([['case.status','=',1],['case_type','=',1]])->orderBy('asc','desc')->orderBy('created_at','desc')->select('case_name','img_path')->get();
        return view('Home.park.park',['case'=>$case,'dongtai'=>$dongtai,'first'=>$dong_first]);
    }
}