<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;

class LoginController extends Controller
{
    //加载后台页面
	public function index()
	{
		return view("shop.login.index");
	}

	//执行登录
	public function doLogin(Request $request)
	{
		//判断验证码
        $mycode = $request->input("mycode");
        $yanzhengma = $request->session()->get('mycode');
        if($mycode != $yanzhengma){
            return back()->with("msg","验证码错误");
        }
		//执行登陆判断
		$name = $request->input("name");
		$password = md5($request->input("password"));
		//判断登录账号的状态
		$shop = \DB::table("shop_detail")->where("name",$name)->first();
		if(empty($shop)){
			return back()->with("msg","账号错误！");
		}
		$shop_detail=$shop->id;
		$shop_detail_copy= \DB::table("shop_detail_copy")->where("cid",$shop_detail)->first()->status;
		if($shop_detail_copy==3){
			return back()->with("msg","账号已被禁用");
		}
		if($shop_detail_copy==2){
			return back()->with("msg","账号审核未通过");
		}
		if($shop_detail_copy==1){
			return back()->with("msg","账号审核中");
		}

		if(!empty($shop) && $shop_detail_copy==4){
			//判断密码
			if($password==$shop->password){
				//存储session跳转页面
				$list=session()->put("adminuser",$shop);
				
				return redirect("shop");
				//echo "测试成功!";
			}
			return back()->with("msg","密码错误！");
		}
		
		
	}

	public function Logout(Request $request)
	{
		$request->session()->pull('adminuser');
		//$request->session()->forget('adminuser');
		return redirect("/shop");
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
}
