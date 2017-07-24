<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
class LoginController extends Controller
{
    //加载登录页面
    public function login()
    {
   		return view("seller.login");
   	}

   	//执行用户登录
   	public function doLogin(Request $request )
   	{
   		
   		//执行登陆判断
        $tel = $request->input("phone");
        $password = $request->input("password");
        //获取对应用户信息
        $user = \DB::table("rel_shop")->where("phone",$tel)->first();
        if(!empty($user)){
            //判断密码
            if(md5($password)==$user->password){
                //存储session跳转页面
                session()->put("businessuser",$user);
                return redirect("/business");
                }
            }
        return back()->with("msg","账号或密码错误！");
   	}

   
	   
   //执行退出
   public function logout(Request $request)
   {
       $request->session()->forget('businessuser');
       return redirect("business/login");
   }
}
