<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //获取登录者信息
        $user = session('email');
        $user_id = DB::table('users')->where('email','=',$user)->select('id')->first();
        $day_ling = strtotime(date("Y-m-d"),time());
        $day_twofour = $day_ling+60*60*24;
        $this->app->singleton(News_Nums::class, function ($app) {
            $nums = DB::table('news')->where([['created_at','>',$day_ling],['created_at','<',$day_twofour],['user_id','=',$user_id]])->pluck('data_id');
            $nums = json_decode(json_encode($nums),true);
            
        });
        // var_dump(session('email'));die;
    }
}
