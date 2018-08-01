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
        $dongtai = DB::table('channel_table')->where([['status','=',1],['message_type','=',1]])->select('id','title')->limit(3)->get();
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
        $pid= DB::table('type')->where('pid','=',1)->select('id')->get();
        $pid = json_decode(json_encode($pid),true);
        $pids= DB::table('type')->whereIn('pid',$pid)->select('id')->get();
        $pids = json_decode(json_encode($pids),true);
        // var_dump($pid);die;
        $case = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->whereIn('case_type',$pids)->orderBy('asc','desc')->orderBy('created_at','desc')->select('case_name','img_path','case.id')->limit(12)->get();
        // var_dump($case);die;
        return view('Home.park.park',['case'=>$case,'dongtai'=>$dongtai,'first'=>$dong_first]);
    }
    //工业栏目页
    public function park_column(Request $request)
    {
        $pid = $request->input('pid');
        if(empty($pid))
        {
            return '参数错误无法读取数据';
        }
        $type_name = DB::table('type')->where('id','=',$pid)->first();
        $name = $type_name->type_name;
        $data = DB::table('type')->where('pid','=',$pid)->get();
        $data = json_decode(json_encode($data),true);
        foreach ($data as $key => $value) 
        {
           $data[$key]['name'] = $name;
        }
        // var_dump($data);die;
        $pid = DB::table('type')->where('pid','=',$pid)->select('id')->get();
        $pid = json_decode(json_encode($pid),true);
        $case = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->whereIn('case_type',$pid)->orderBy('asc','desc')->orderBy('created_at','desc')->select('case_name','case.id','img_path','case_miaoshu')->limit(15)->get();
        foreach ($case as $key => $value) 
        {
            if(strlen($value->case_miaoshu)>100)
            {
                $value->case_miaoshu = mb_substr($value->case_miaoshu,0,100,'utf-8').'...';
            }else
            {
                $value->case_miaoshu = $value->case_miaoshu;
            }
            
        }
        return view('Home.park.park_column',['data'=>$data,'case'=>$case]);
    }
}