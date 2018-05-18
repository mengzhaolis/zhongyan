<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;
/**
 *网站分类控制
 *将网站中的分类进行后台统一管理
 * 2018-04-26   mzl
 */
class TypeController extends CommonController
{

    private $model = '';
    private $menu = '';
    public $database = '' ;
    
    public function __construct()
    {
        $this->model = new Cms;
        $this->menu = new menu;
    }
    //分类添加-显示模板 mzl 18/04/26
    public function type_add()
    {
        $this->database = 'type';
        $tree = $this->menu->first($this->database);
        
        return view('Admin.Type.Type_add',['tree'=>$tree]);
    }
    //分类数据入库  mzl 18/04/27
    public function type_insert(Request $request)
    {
        $data = $request->except('_token');
        if(empty($data['type_name']))
        {
            return 1;
        }
        $this->database = 'type';
        $id = $this->model->new_add($this->database,$data);       
        // $id = DB::table('type')->insertGetId($data);
        if(empty($id))
        {
            return \App\Tools\ajax_error();
        }else
        {
             return \App\Tools\ajax_success();
        }
    }
    
    //分类列表视图展示 2018/04/28 mzl
    public function type_list()
    {
        //定义操作的数据库表
        $this->database = 'type';
        $tree = $this->menu->first($this->database);
        if($tree==3)
        {
            return view('Admin.Type.system-category',['data'=>'暂无数据']);
        }
        return view('Admin.Type.system-category',['data'=>$tree]);
       
    }
    //分类列表执行添加-展示弹窗 2018/04/28 mzl
    public function type_list_add()
    {
        $this->database = 'type';
        $tree = $this->menu->first($this->database);
        return view('Admin.Type.alert_add',['tree'=>$tree]);
    }
    //分类列表数据伪删除    mzl   18/05/02
    public function type_list_del(Request $request)
    {
        $id = $request->input('id');
        $this->database = 'type';
        $type = 1;
        $sql = $this->model->del($this->database,$id,$type);
        // var_dump($sql);die;
        if($sql ==3)
        {
            return \App\Tools\ajax_news();
        }
        return $sql;
    }
    //分类中数据编辑 mzl   18/05/02
    public function type_list_update(Request $request)
    {
        if(empty($request->input()))
        {
            return view('Admin.Type.type_update');
        }
        $id = DB::table('type')->where('id','=',$request->input('id'))->update([
            'type_name'=>$request->input('type_name')
        ]);
        if($id)
        {
            return \App\Tools\ajax_success();
        }
    }
    //数据回收站 mzl 18/05/02
    public function type_list_recycle(Request $request)
    {
        if(empty($request->except('_token')))
        {
            $this->database = 'type';
            $data = $this->menu->recycle($this->database);
            // var_dump($data);die;
            if($data==3)
            {
                return "<script>alert('暂时没有数据');window.location.href='/type/type_list';</script>";
            }
            // var_dump($data);die;
            return view('Admin.Type.recycle_list',['data'=>$data]);
        }
        // print_r($request->input());
        $this->database = 'type';
        $huan = $this->model->recycle($this->database,$request->input('id'),1);
        print_r($huan);
        
    }
    //回收站数据硬删除
    public function y_del(Request $request)
    {
        $id = $request->input('id');
        $this->database = 'type';
        $type = 2;
        $sql = $this->model->del($this->database,$id,$type);
        // var_dump($sql);die;
        if($sql ==3)
        {
            return \App\Tools\ajax_news();
        }
        return $sql; 
    }
}


?>