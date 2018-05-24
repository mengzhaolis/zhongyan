<?php

namespace app\Http\Models\Admin;

use Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Cms extends Model
{
    //数据入库
    public function new_add($database='',$value=array())
    {
        if(!empty($database))
        {
            if(is_array($value))
            {
                if(!empty($value))
                {
                    $id = DB::table("$database")->insertGetId($value);
                    if(empty($id))
                    {
                        return 2;
                    }
                    return $id;
                }
                return 3;
            }
            return 3;
        }else
        {
            return 3;
        }
        
    }
    //数据伪删除
    public function del($database,$id,$type='')
    {
        if(!empty($database) && !empty($id))
        {
            if($type == 1)
            {
                //取出相关的所有数据
                $pid = DB::table("$database")->where('pid','=',"$id")->pluck('id');
                $pid = json_decode(json_encode($pid),true);
                // return $pid;
                // var_dump(count($pids));die;
                if(count($pid)==0)
                {
                    $data = DB::table("$database")->where([
                        ['status','=',1],                   
                        ['pid','=',"$id"]
                    ])->orwhere('id','=',"$id")->update(['status'=>0]);
                    return $data;       
                }
                $data = DB::table("$database")->where([
                    ['status','=',1],                   
                    ['pid','=',"$id"]
                ])->orwhere('id','=',"$id")->update(['status'=>0]);
                // return $data;
                if(!empty($data))
                {
                    $data = DB::table("$database")->wherein('pid',$pid)->update(['status' =>0]);
                }
                return $data;
                
            }else if($type=='')
            {
                $data = DB::table("$database")->where('id','=',"$id")->update(['status'=>0]);
                return $data;
            }else
            {
                if($type == 2)
                {
                    //取出相关的所有数据
                    $pid = DB::table("$database")->where('pid','=',"$id")->pluck('id');
                    $pid = json_decode(json_encode($pid),true);
                    // return $pid;
                    // var_dump(count($pids));die;
                    if(count($pid)==0)
                    {
                        $data = DB::table("$database")->where([
                            ['status','=',0],                   
                            ['pid','=',"$id"]
                        ])->orwhere('id','=',"$id")->delete();
                        return $data;       
                    }
                }
            }
        }
        return 3;
    }
    /**
     * 数据回收站还原   18/05/10    mzl
     * $database    数据库表名
     * $id          操作数据的id
     * $type        本次操作的类型
     */
    public function recycle($database,$id='',$type='')
    {
        if(!empty($database) && empty($id) && empty($type))
        {
            $data = DB::table("$database")->where('status','=',0)->get();
            return $data;
        }
        // return $type;
        if(!empty($database) && $type==1 && !empty($id))
        {
            //取出相关的所有数据
            $pid = DB::table("$database")->where('pid','=',"$id")->pluck('id');
            $pid = json_decode(json_encode($pid),true);
            if(count($pid)==0)
            {
                $data = DB::table("$database")->where([
                        ['pid','=',"$id"]
                    ])->orwhere('id','=',"$id")->update(['status'=>1]);
                    return $data;
            }
            $data = DB::table("$database")->where([
                                          
                        ['pid','=',"$id"]
                    ])->orwhere('id','=',"$id")->update(['status'=>1]);
            if(!empty($data))
            {
                $data = DB::table("$database")->wherein('pid',$pid)->update(['status' =>1]);
                return $data;
            }
            return '';
        }
        if(!empty($id))
        {
            $data = DB::table("$database")->wherein('id',$id)->update(['status' =>1]);
            return $data;
        }
    }
    /**
     * 图片上传 18/05/09 mzl
     * $database    操作数据表
     * $file_name   上传文件的重命名
     * $file        上传的文件
    */
    public function img_add($database='',$file_name,$file)
    {
        if($database=='' && $file_name=='')
        {
            return 3;
        }
        if($file_name=='' && $database!='')
        {
            $file_name = 'aaaaa.jpg';
        }
        $img_path = Storage::putFileAs('public', $file, $file_name);
        
        if(empty($img_path))
        {
            return 3;
        }
        $img_path = Storage::url($img_path);
        $id = DB::table('images')->insertGetId(['img_path' =>$img_path]);
        return $id;
    }
    /**
     * 普通数据列表查询 2018/05/11 mzl
     * $database    数据表名称
     * $where       where条件当$where=0时则只查询数据状态(status值为1的数据)当$where存在不同的条件是则进行对应条件的查询
     * $status      查询的数据状态
     */
 
    public function new_list($database='',$where=0,$status)
    {
        // return $database;
        if(empty($database))
        {
            return '';
        }
        
        if($where==0 and !empty($database))
        {

            $data = DB::table("$database")->where('status','=',$status)->orderBy('asc','desc')->orderBy('created_at','desc')->orderBy('id','asc')->get();
            return $data;
        }

        $data = DB::table("$database")->where("$where")->get();
        return $data;
    }
    /**
     * 普通数据伪删除，下架   18/05/11    mzl
     * $database    数据表名称
     * $id          要操作的数据id
     * 当$id为空的时候该方法直接返回空
     */
    public function new_del($database,$id)
    {
        // return $id;
        if(!empty($database) && !empty($id))
        {
            $id = DB::table("$database")->where('id','=',"$id")->update(['status'=>0]);
            return $id;
        }
        return '';
    }
    /**
     * 普通数据列表修改
     * $database    数据表名称
     * $id          操作数据id
     * $type        操作类型    数据为1 执行数据查询    数据为2执行数据修改
     * $data        需要更改的数据
     */
    public function list_update($database,$id,$type,$data)
    {
        if(empty($database) && empty($id) && empty($type))
        {
            return '';
        }
        if($type ==1)
        {
            $data = DB::table($database)->where('id','=',$id)->first();
            return $data;
        }else if($type ==2)
        {
            $id = DB::table($database)->where('id','=',$id)->update($data);
            return $id;
        }
    }
    /**
     * 普通数据列表回收站还原
     * $database    数据库表名
     * $id          需要操作的数据id
     * $type        操作状态    1还原   2删除
     * $data        操作数据组
     */
    public function list_hd($database,$id,$type,$data)
    {
        if(empty($database) || empty($id) || empty($type))
        {
            return '';
        }
        if($type==1)
        {
            unset($data['type']);
            $data = DB::table("$database")->where('id','=',$id)->update($data);
            return $data;
        }
        if($type==2)
        {
            $data = DB::table("$database")->where('id','=',$id)->delete();
            return $data;
        }
    }
    /**
     *普通数据列表数据置顶  18/05/15    mzl
     *$database     操作的数据表
     * $id          数据id
     */
    public function list_top($database,$id,$asc)
    {
        if(empty($database) || empty($id))
        {
            return '';
        }
        $top = DB::table("$database")->where('id','=',$id)->update(['asc'=>$asc,'created_at'=>time()]);
        return $top;
    }
}