<?php

namespace app\Http\Controllers\Admin;

use Config;
use App\Http\Controllers\Admin\CommonController;
use Illuminate\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Models\Admin\Cms;
use App\Http\Models\Admin\menu;
use Illuminate\Support\Facades\Storage;

class EmailController extends CommonController
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }
    /**
     * 发送邮件
     */
    public function mail(){
        $data = DB::table('jisuan_login')->where('status','=',1)->limit(5)->select('username','phone')->get();
        $data = json_decode(json_encode($data),true);
        // var_dump($data);die;
        //测试数据
        $viewData = ['title' => '中研世纪A类数据注册','author' => '市场运营部'];

        // var_dump($emailData);die;
        $emailData = [
            'content' => '你若盛开，清风自来',
            'subject' => '点击返回东京',//邮件主题
            'addr' => '459901037@qq.com',//邮件接收地址
        ];
        // var_dump($emailData);die;
        $this->email_go($emailData);
        // $this->sendHtml('mail',$viewData,$emailData);
        // TODO  $tag 判断发送是否成功，进行后续代码开发
        // return view('Admin.email.email',['title' => '你若盛开，清风自来','author' => '木心']);
    }

    /**
     * 发送纯文本 邮件
     * @param $emailData 邮件数据
     */
    public function email_go($emailData){
        //此处为文本内容
        $tag = $this->mailer
            ->raw($emailData['content'],
                function ($message)use ($emailData){
                    $message->subject($emailData['subject']);
                    $message->to($emailData['addr']);
                });
        return $tag;
    }
    /**
     * 发送自定义网页
     * @param $emailData 邮件数据
     * @param $viewPage html视图
     * @param $viewData html传输数据
     */
    public function sendHtml($viewPage,$viewData,$emailData){
        $tag = $this->mailer
            ->send($viewPage,$viewData,
                function ($message) use ($emailData){
                    $message->subject($emailData['subject']);
                    $message->to($emailData['addr']);
                });
        return $tag;
    }
}