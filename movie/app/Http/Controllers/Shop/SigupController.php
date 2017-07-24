<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Models\Shopdetail;
use Gregwar\Captcha\CaptchaBuilder;


class SigupController extends Controller
{
    //加载注册页面
	public function index()
	{
		return view("shop.login.sigup");
	}

	//执行注册判断
	public function registered(Request $request)
	{
		$myname=$request->input('myname');
		$name=\DB::table('shop_detail')->where('name',"=",$myname)->value('name');
		if(!empty($name)){
			//用户名已存在
			return back()->with("msg","账号已存在！");
		}
		//执行注册判断
		$name=preg_match("/^\w{5,20}$/",$myname);
		if(empty($name)){
			//用户名格式不正确
			return back()->with("msg","账号格式不正确！");
		}
    	//判断密码
        //获取用户输入密码
        $mypassword=$request->input('mypassword');
        $password=preg_match("/^\w{6,20}$/",$mypassword);
        if(empty($password)){
            //密码格式不合法
          return back()->with("msg","密码格式不正确");
        }

   
    //密码二次验证
        $twopassword = $request->input("twopassword");
        $password = $request->input("mypassword");
        if($password != $twopassword){
            //密码不一致
           return back()->with("msg","密码不一致");
         }
        

    //判断验证码
        $mycode = $request->input("mycode");
        $yanzhengma = $request->session()->get('mycode');
        if($mycode != $yanzhengma){
            return back()->with("msg","验证码错误");
        }
        //$password = md5($password);
         //执行添加
        $time=time();
        $date=date("Y.m.d H:i:s",$time);
        $id  = \DB::table('shop_detail')->insertGetId(
            ['name'=>$myname,'password'=>md5($mypassword),'addtime'=>$date]
            );
        if($id>0){
          $shopid=\DB::table('shop_detail')->where("id",$id)->value('id');
          //把相对应的id添加到详情表cid中
          $list=\DB::table("shop_detail_copy")->insertGetId(
            ["cid"=>$shopid]
            );
          $shop=\DB::table("shop_detail")->where("id",$id)->first();
          $shopsession=session()->put("sigup",$shop);
        }
        return view("shop.login.information");
    	
    }
	//加载验证码
	 public function getCode()
   {
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        session()->put('mycode', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();

   }
   
   public function region($upid=0)
   {
	   $list = \DB::table("shop_region")->where("upid",$upid)->get();
       return response()->json($list);
   }

}
