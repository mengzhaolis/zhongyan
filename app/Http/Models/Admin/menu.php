<?php

namespace app\Http\Models\Admin;

use Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class menu extends Model
{
    //无限极递归
    public function first($database='')
    {
        //判断数据库字段是否有值
        if(empty($database))
        {
            return 3;
        }
        $data = DB::table("$database")->where('status','=',1)->get();
        
        $data = json_decode(json_encode($data),true);
        if(!empty($data) && is_array($data))
        {
            return $this->digui($data,0,0);
        }
        return 3;
    }
    //读取回收站中的数据
    public function recycle($database='')
    {
        //判断数据库字段是否有值
        if(empty($database))
        {
            return 3;
        }
        $data = DB::table("$database")->where('status','=',0)->get();
       
        $data = json_decode(json_encode($data),true);
        // return $data;
        if(!empty($data) && is_array($data))
        {
            return $this->digui($data,0,0);
        }
        return 3;
    }
            /**
     * 无限极递归执行
     * $data 需要递归的数组
     * $pid  
     * $aid  递归的等级
     * 
     */
    public function digui($data,$pid,$rank)
    {
        // var_dump($data);die;
        $tree = Array();
        foreach($data as $key=>$value)
        {
            if($value['pid']==$pid)
            {
                $value['rank']=$rank;
                // $flg = str_repeat('|__',$value['rank']);
                $value['type_name']=$value['type_name'];
                $tree[$key]=$value;
                $tree[$key]['son'] = $this->digui($data,$value['id'],$rank+1);
            }
            // else
            // {
            //     return $data;
            // }
        }
        return $tree;
    }
}