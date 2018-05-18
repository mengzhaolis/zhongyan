<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Validator;

class CommonController extends Controller
{
    //未登陆用户不能访问
//    public function __construct(){
//         $this->middleware('auth');
//     }

}