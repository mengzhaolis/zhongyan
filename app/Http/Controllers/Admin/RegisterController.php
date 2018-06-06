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
        $data = DB::table('register')->get();
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
        $data['created_at'] = time();
        $id = $this->model->new_add($this->database,$data);
        return  $id;
    }
    //注册数据分发-查看分发的数据
    public function resource_list(Request $request)
    {
        $id = $request->except('_tolen');
        if(empty($id))
        {
            $data = DB::table('users')->where('role','=',4)->select('name','id')->get();
            // var_dump($data);die;
            return view('Admin.Register.resource_list',['data'=>$data]);
        }
        $data = DB::table('news')->where('user_id','=',$id['id'])->first();
        $data_id = explode(',',$data->data_id);
        $array = DB::table('register')->whereIn('id',$data_id)->get();
        $user_name = DB::table('users')->where('id','=',$id['id'])->select('name')->first();
        // $data = json_decode(json_encode($data),true);
        return view('Admin.Register.resource_list_ti',['array'=>$array,'time'=>$data->created_at,'user_name'=>$user_name->name]);
        // var_dump($array);die;
        
        
    }
    
}