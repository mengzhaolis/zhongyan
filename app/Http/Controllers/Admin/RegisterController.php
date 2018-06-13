<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;
use Excel;

class RegisterController extends CommonController
{
    public $database='register';
    public function __construct()
    {
        $this->model=new Cms;
    }
    //注册用户数据列表
    public function register_list()
    {
        $data = DB::table('register')->leftJoin('users','register.user_id','=','users.id')->select('register.*','users.name','users.id as u_id')->orderBy('created_at','desc')->get();
        $people = DB::table('users')->where([['status','=',1],['role','=',4]])->get();
        // var_dump($people);die;
        return view('Admin.Register.register_list',['data'=>$data,'people'=>$people]);
    }
    //数据导出
    public function excel_go(Request $request)
    {
        $data = $request->except('_token');
        $data = explode(',',$data['id']);
        // var_dump($data);die;
        $array = DB::table('register')->whereIn('id',$data)->get();
        $array = json_decode(json_encode($array),true);
        //  $cellData = [
        //         ['学号','姓名','成绩'],
        //         ['10001','AAAAA','99'],
        //         ['10002','BBBBB','92'],
        //         ['10003','CCCCC','95'],
        //         ['10004','DDDDD','89'],
        //         ['10005','EEEEE','96'],
        //     ];
       
        $cellData=[['序列号','姓名','手机号','地域','注册来源','注册时间','调研类型','调研需求']];
        foreach ($array as $key => $value) {

           $cellData[$key+1][] = $value['id'];
           $cellData[$key+1][] = $value['user_name'];
           $cellData[$key+1][] = $value['user_phone'];
           $cellData[$key+1][] = $value['user_address'];
           $cellData[$key+1][] = $value['reg_url'];
           $cellData[$key+1][] = date("Y-m-d H:i:s",$value['created_at']);
           $cellData[$key+1][] = $value['crcm_type'];
           $cellData[$key+1][] = $value['crcm_need'];

        }
        // var_dump($cellData);die;
        Excel::create('资源管理',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
        
    }

    //注册数据分发-数据入库
    public function share(Request $request)
    {
        $data = $request->except('_token');
        $this->database = 'news';
        //向news记录表中添加添加时间字段的值
        $data['created_at'] = time();
        //将要分配的数据id作为数组
        $array_id = explode(',',$data['data_id']);
        //读取以被分配人id为条件的消息记录
        $double = DB::table('news')->pluck('data_id');
        
         $double = json_decode(json_encode($double),true);
        // var_dump($double);die;
        //  var_dump(array_intersect($array_id,$double));die;
        if(!empty(array_intersect($array_id,$double)))
        {
            return 3;
        }
        return;
        //更改注册表中该数据对应的负责人
        $ret_id = DB::table('register')->whereIn('id',$array_id)->update(['user_id'=>$data['user_id'],'updated_at'=>time()]);
        if(empty($ret_id))
        {
            return '';
        }
        // var_dump($data);die;
        // $id = DB::table('register')->
        for($i=0;$i<count($array_id);$i++)
        {
            $id = DB::table('news')->insertGetId(['user_id'=>$data['user_id'],'data_id'=>$array_id[$i],'created_at'=>time(),'nums'=>1]);

        }
        // $id = $this->model->new_add($this->database,$data);

        return  $id;
    }
    /**
     * 注册管理-资源分配
     * 查看不同的销售人员对应的由管理员分发的注册数据
     */
    public function resource_list(Request $request)
    {
        $id = $request->except('_tolen');
        if(empty($id))
        {
            $data = DB::table('users')->where('role','=',4)->select('name','id')->get();
            // var_dump($data);die;
            return view('Admin.Register.resource_list',['data'=>$data]);
        }
        $data = DB::table('news')->where('user_id','=',$id['id'])->pluck('data_id');
        // $data_id = explode(',',$data->data_id);
        $data_id=json_decode(json_encode($data),true);
        $array = DB::table('register')->whereIn('id',$data_id)->get();
        // var_dump($array);die;
        $user_name = DB::table('users')->where('id','=',$id['id'])->select('name')->first();
        // $data = json_decode(json_encode($data),true);
        return view('Admin.Register.resource_list_ti',['array'=>$array,'user_name'=>$user_name->name]);
        // var_dump($array);die;
        
        
    }
    /**
     * 注册管理-资源整合-分发资源
     * 资源整合下的资源分发，分发的数据为销售人员标识的一次无效数据
     */
    public function double_fen(Request $request)
    {
        if(empty($request->except('_token')))
        {
            return '';
        }
        $data = $request->except('_token');
        $data_id = explode(",",$data['data_id']);
        // var_dump($data_id);die;
        $user_id = DB::table('news')->whereIn('data_id',$data_id)->pluck('user_id');
        $id=json_decode(json_encode($user_id),true);
        // var_dump($id);die;
        $people = DB::table('users')->where('role','=',4)->whereNotIn('id',$id)->select('id','name')->get();
        // $people=json_decode(json_encode($people),true);
        // var_dump($people);die;
        return view('Admin.Register.zi_zheng_ti',['people'=>$people]);
        // return $people;
    }
    /**
     * 注册管理-资源整合
     * 查看不同状态下的注册数据
     */
    public function register_zheng(Request $request)
    {
        $id = $request->except('_token');
        if(empty($id))
        {
            return view('Admin.register.ziyuan_zheng');
        }
        if($id['status']==0)
        {
            $data = DB::table('register')->leftJoin('users','register.user_id','=','users.id')->select('register.*','users.name')->where('register.status','=',0)->get();
            // var_dump($data);die;
        }else if($id['status']==1)
        {
            $data = DB::table('register')->leftJoin('users','register.user_id','=','users.id')->select('register.*','users.name')->where('register.status','=',1)->get();
        }
        if($id['status']==2)
        {
            $data = DB::table('register')->leftJoin('users','register.user_id','=','users.id')->select('register.*','users.name')->where('register.status','=',2)->get();
        }else if($id['status']==3)
        {
            $data = DB::table('register')->leftJoin('users','register.user_id','=','users.id')->select('register.*','users.name')->where('register.status','=',3)->get();
        }
        return view("Admin.register.register_zheng_ti",['data'=>$data]);
    }
    //注册管理-资源整合-再次分发
    public function double_two_fen(Request $request)
    {
        $data = $request->except('_token');
        $this->database = 'news';
        //向news记录表中添加添加时间字段的值
        $data['created_at'] = time();
        //将要分配的数据id作为数组
        $array_id = explode(',',$data['data_id']);
        //更改注册表中该数据对应的负责人
        $ret_id = DB::table('register')->whereIn('id',$array_id)->update(['user_id'=>$data['user_id'],'updated_at'=>time(),'nums'=>2]);
        if(empty($ret_id))
        {
            return '';
        }
        // var_dump($data);die;
        // $id = DB::table('register')->
        for($i=0;$i<count($array_id);$i++)
        {
            $id = DB::table('news')->insertGetId(['user_id'=>$data['user_id'],'data_id'=>$array_id[$i],'created_at'=>time(),'nums'=>2]);

        }
        // $id = $this->model->new_add($this->database,$data);

        return  $id;
    }
    
}