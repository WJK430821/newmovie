<?php

namespace App\Http\Controllers;
//导入验证码命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Http\Request;
use App\Models\Reg;
use Illuminate\Support\Facades\Hash;
//导入session
use Session;
//导入redis
use Illuminate\Support\Facades\Redis as Redis;
//引入阿里大鱼命名空间
use iscms\Alisms\SendsmsPusher as Sms;
class RegController extends Controller
{
    public $sms;
    //构造方法
    public function __construct(Sms $sms)
    {
        $this->sms = $sms;
    }
    public function index()
    {
        return view("reg.index");
    }
    //验证码
    public function code()
    {
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        session()->put('code', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }
    //执行ajax验证
    public function doLogin(Request $request)
    {
        //判断用户名开始
        //获取用户名
        $phone = $request->input("phone");
        $info = \DB::table('users')->where("phone","=",$phone)->first();
        if($info){
            //用户名存在
            return 1;
        }
    }
    //执行注册
    public function regLogin(Request $request)
    {
        //短信验证待优化
        if($request->has('num')){
            $input = $request->input("phone");
            if(!empty(Redis::get($input))){
                return back()->with("msg","300秒内不允许重复发送");
            }else{
                $num = rand(100000,999999);
                // 组装参数
                $smsParams = [
                    'code'    => "{$num}",
                    'product' => $input
                ];
                // 需要参数
                $phone = $input;
                $name = '熊猫电影';
                $content = json_encode($smsParams);
                $code = 'SMS_10405984';
                //  发送验证码方法
                $data = $this->sms->send($phone, $name, $content, $code);
                //判断是否有result属性
                if(property_exists($data, 'result')){
                    //存入redis
                    Redis::set($phone,$num);
                    //设置生存360秒时间
                    Redis::expireAt($phone,time()+60*5);
                }else{
                    return back()->with("msg","验证码发送失败");
                }
            }
        }else{
            //获取用户名
            $phone = $request->input("phone");
            //获取验证码
            $mycode = $request->input("code");
            $code = Redis::get($phone);
            //判断验证码是否合法
            if($mycode != $code){
                return back()->with("msg","验证码错误");
            }
            //判断用户名是否合法
            $info = preg_match("/^1[34578]\d{9}&/",$phone);
            if(!empty($info)){
                return back()->with("msg","用户名不合法");
            }
            //判断密码是否合法
            $password = $request->input('password');
            $pass = preg_match("/^\w_{6,20}$/",$password);
            if(!empty($pass)){
                return back()->with("msg","密码不合法");
            }
            //密码加密
            $password = md5(md5($password."lixuwen"));
            $id  = \DB::table('users')->insertGetId(['phone'=>$phone,'password'=>$password]);
            if($id>0){
                $reg = new Reg();
                //更新关联id
                $reg->where("id",$id)->update(['uid'=>$id]);
                //插入关联id
                \DB::table('users_detail')->insert(['id'=>$id]);
                return redirect("reg/success");
            }else{
                return redirect("reg/lose");
            }
        }

    }
    //注册成功
    public function success()
    {
        return view("reg.success");
    }

    //注册失败
    public function lose(){
        return view("/reg/lose");
    }
}
