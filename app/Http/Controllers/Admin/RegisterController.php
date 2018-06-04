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
    public function excel_go()
    {
        $cellData = [
            ['学号','姓名','成绩'],
            ['10001','AAAAA','99'],
            ['10002','BBBBB','92'],
            ['10003','CCCCC','95'],
            ['10004','DDDDD','89'],
            ['10005','EEEEE','96'],
        ];
        Excel::create('学生成绩',function($excel) use ($cellData){
            $excel->sheet('score', function($sheet) use ($cellData){
                $sheet->rows($cellData);
            });
        })->export('xls');
    }
}