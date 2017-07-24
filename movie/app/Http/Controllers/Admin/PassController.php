<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;

class PassController extends Controller
{
    public function index()
    {
        return view("admin.pass.index");
    }
    public function update(Request $request)
    {
        //获取原密码
        $rpass = md5(md5($request->input('rpass')."lixuwen"));;
        //判断原密码是否正确
        if(session("admin")->pass !== $rpass){
            return back()->with("msg","原密码不正确");
        }
        //获取新密码
        $pass = md5(md5($request->input('pass')."lixuwen"));
        $pass2 = md5(md5($request->input('pass2')."lixuwen"));
        //判断两次密码是否相等
        if($pass !== $pass2){
            return back()->with("msg","两次密码不一致");
        }else{
            
            //执行修改密码
           Admin::where("id",session("admin")->id)->update(["pass"=>$pass]);
            //如果修改成功跳转到登录界面

                $request->session()->forget("admin");
                echo "<script>alert('修改成功，请重新登录')</script>";
                echo "<script>window.location.href='/admin/login'</script>";
        }
    }
}
