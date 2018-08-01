<?php

namespace app\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CasemoreController extends Controller
{ 
 
 
 //首页-成功案例-案例列表页
    public function casemore()
    {
        // //取出二级id
        $id = DB::table('type')->where('pid','=',1)->select('id')->get();
        $id = json_decode(json_encode($id),true);
        //  var_dump($id);die;
        //取出三级id
        $pid = DB::table('type')->whereIn('pid',$id)->select('id')->get();
        $pid = json_decode(json_encode($pid),true);
        $gong = DB::table('type')->whereIn('id',$pid)->select('id','type_name')->get();
        //商业地产
        $id = DB::table('type')->where('pid','=',3)->select('id')->get();
        $id = json_decode(json_encode($id),true);
        $shang = DB::table('type')->whereIn('id',$id)->select('id','type_name')->get();
        //医药医疗案例
        $id = DB::table('type')->where('pid','=',4)->select('id')->get();
        $id = json_decode(json_encode($id),true);
        $yi = DB::table('type')->whereIn('id',$id)->select('id','type_name')->get();
        //营销咨询
        $id = DB::table('type')->where('pid','=',5)->select('id')->get();
        $id = json_decode(json_encode($id),true);
        $ying = DB::table('type')->whereIn('id',$id)->select('id','type_name')->get();
        //满意度
        $id = DB::table('type')->where('pid','=',47)->select('id')->get();
        $id = json_decode(json_encode($id),true);
        $man = DB::table('type')->whereIn('id',$id)->select('id','type_name')->get();
        //竞争企业调研
        $jing = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('direction_name','=',1)->orderBy('asc','desc')->orderBy('created_at','desc')->limit(3)->select('case.id','case_name','case_miaoshu','img_path')->get();
        //行业调研
        $hang = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('direction_name','=',2)->orderBy('asc','desc')->orderBy('created_at','desc')->limit(3)->select('case.id','case_name','case_miaoshu','img_path')->get();
        //渠道调研
        $qu = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('direction_name','=',3)->orderBy('asc','desc')->orderBy('created_at','desc')->limit(3)->select('case.id','case_name','case_miaoshu','img_path')->get();
        //满意度调研
        $manyidu = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('direction_name','=',4)->orderBy('asc','desc')->orderBy('created_at','desc')->limit(3)->select('case.id','case_name','case_miaoshu','img_path')->get();
        //营销咨询
        $yingxiao = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('direction_name','=',5)->orderBy('asc','desc')->orderBy('created_at','desc')->limit(3)->select('case.id','case_name','case_miaoshu','img_path')->get();
        //市场战略规划
        $shichang = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('direction_name','=',6)->orderBy('asc','desc')->orderBy('created_at','desc')->limit(3)->select('case.id','case_name','case_miaoshu','img_path')->get();
        //业务咨询
        $yewu = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('direction_name','=',7)->orderBy('asc','desc')->orderBy('created_at','desc')->limit(3)->select('case.id','case_name','case_miaoshu','img_path')->get();
        //商业模式设计
        $shangye = DB::table('case')->leftJoin('images','case.face_img','=','images.id')->where('direction_name','=',8)->orderBy('asc','desc')->orderBy('created_at','desc')->limit(3)->select('case.id','case_name','case_miaoshu','img_path')->get();
        // var_dump($jing);die;
        return view('Home.index.casemore',['gong'=>$gong,'shang'=>$shang,'yi'=>$yi,'ying'=>$ying,'man'=>$man,'jing'=>$jing,'hang'=>$hang,'qu'=>$qu,'manyidu'=>$manyidu,'yingxiao'=>$yingxiao,'shichang'=>$shichang,'yewu'=>$yewu,'shangye'=>$shangye]);
    }
}