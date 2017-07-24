<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Merchant;
//引入阿里大鱼命名空间
use iscms\Alisms\SendsmsPusher as Sms;

class MerchantController extends Controller
{
    public $sms;
    //构造方法
    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }
    //商家列表
    public function index(Request $request)
    {
        $db = \DB::table("shop_detail_copy");

        $where = [];
        //封装搜索条件
        if($request->has('name')){
            $name = $request->input("name");
            $db->where("shopname","like","%{$name}%");
            $where["name"] = $name;
        }
        //每页6条数据
        $list = $db->paginate(6);
        //赋值模板变量
        return view("admin.merchant.child",["list"=>$list,"where"=>$where]);
    }
    //商家审核通过
    public function success($id=0)
    {
        $phone = Merchant::where("id",$id)->value("phone");
        // 组装参数
        $smsParams = [
            'name' => $phone
        ];
        // 需要参数
        $name = '熊猫电影';
        $content = json_encode($smsParams);
        $code = 'SMS_76320015';
        //  发送短信方法
        $data = $this->sms->send($phone, $name, $content, $code);
        Merchant::where("id",$id)->update(["status"=>4]);
        return redirect("/admin/merchant/");
    }
    //商家审核未通过
    public function lose($id=0)
    {
        $phone = Merchant::where("id",$id)->value("phone");
        // 组装参数
        $smsParams = [
            'name' => $phone
        ];
        // 需要参数
        $name = '熊猫电影';
        $content = json_encode($smsParams);
        $code = 'SMS_76150012';
        //  发送验证码方法
        $this->sms->send($phone, $name, $content, $code);
        Merchant::where("id",$id)->update(["status"=>2]);
        return redirect("/admin/merchant/");
    }
    //商家禁用操作
    public function forbidden($id=0)
    {
        Merchant::where("id",$id)->update(["status"=>3]);
        return redirect("/admin/merchant");
    }
}
