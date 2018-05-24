<?php

namespace app\Http\Models\Admin;

use Config;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class administrator extends Model
{

    /**
     * 管理员数据添加
     * $database    数据表
     * $data        添加得数据
     * 2018/05/23   mzl
     */
    public function admin_add($database,$data)
    {   
        if(empty($database) || empty($data))
        {
            return '';
        }
        $id = DB::table("$database")->insertGetId($data);
        return $id;
    }
}