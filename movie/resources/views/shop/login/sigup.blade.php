<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Amaze UI Admin index Examples</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="{{asset('myadmin/assets/i/favicon.png')}}">
	 <link href="{{asset('myadmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
      <link href="{{asset('myadmin/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />  
       <link href="{{asset('myadmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />  
    <link rel="apple-touch-icon-precomposed" href="{{asset('myadmin/assets/i/app-icon72x72@2x.png')}}">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="{{asset('myadmin/assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('myadmin/assets/css/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('myadmin/assets/css/app.css')}}">
    <script src="{{asset('myadmin/assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('myadmin/js/jQuery-2.1.4.min.js')}}"></script>

<body >
    <script src="{{asset('myadmin/assets/js/theme.js')}}"></script>
    <div class="am-g tpl-g">
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>
        <div class="tpl-login">
            <div class="tpl-login-content">
                <div class="tpl-login-title">注册用户</div>
                <span class="tpl-login-content-info">
                  创建一个新的用户
              </span>

                @if(session("msg"))
                <p class="login-box-msg" style="color:red;">{{session("msg")}}</p>
                @endif
                <form action="{{url('shop/sigup/registered')}}" method="post" class="am-form tpl-form-line-form" name="myform" onsubmit="return doSubmit">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    

                    <div class="am-form-group">
                        <input type="text" class="tpl-form-input" name="myname" onblur="checkMyname()" id="user-name" placeholder="账号，5-20位数字、字母或下划线"/>

                    </div>

                    <div class="am-form-group">
                        <input type="password" name="mypassword" onblur="checkMypassword()" class="tpl-form-input" id="user-name" placeholder="密码，6-16位数字、字母或下划线"/>
                    </div>

                    <div class="am-form-group">
                        <input type="password" name="twopassword" onblur="checkTWopassword()" class="tpl-form-input" id="user-name" placeholder="再次填写上面的密码">
                    </div>					
					<!--加载验证码-->
					 <div class="am-form-group">
					 
						<div class="col-xs-6"> 
							  <div class="form-group has-feedback" style="width:160px;">
								<input type="text" name="mycode" class="form-control" placeholder="验证码"/>
							  </div>

						  </div>
						  <div style="float:right" class="col-xs-6">
							  <img src="{{url('shop/getcode')}}" onclick="this.src='{{url('shop/getcode')}}?id='+Math.random(); " width="100" height="34"/>
						  </div>
					  </div>
					
                    <div class="am-form-group">

                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('myadmin/assets/js/amazeui.min.js')}}"></script>
    <script src="{{asset('myadmin/assets/js/app.js')}}"></script>
    <!--执行注册验证-->
    <script type="text/javascript">
    function doSubmit(){
        return checkMyname() &&  checkMypassword() && checkTWopassword();
    }
    //判断用户名是否合法
    function checkMyname(){
        //获取用户输入的信息
        var uname = $("input[name='myname']").val();
        //删除信息
        $("input[name='myname']").nextAll("span").remove();
        //判断用户是否合法
        if(uname.match(/^\w{5,20}$/)==null){
            $("<span style='color:#ff0033;'>用户名不合法请重新输入</span>").insertAfter("input[name='myname']");
            //alert("adssad");
            return false;
        }

    }
    //密码验证
    function checkMypassword()
    {
        //获取输入的密码
        var upassword=$("input[name='mypassword']").val();
        //删除获取的密码信息
        $("input[name='mypassword']").nextAll("span").remove();
        //alert("ad");
        //验证密码
        if(upassword==""){
            $("<span style='color:#ff0033;'>密码不能为空!</span>").insertAfter("input[name='mypassword']");
            return false;
        }
        $("input[name='mypassword']").nextAll("sapn").remove();
        if(upassword.match(/^\w{6,16}$/)==null){
            $("<span style='color:#ff0033;'>密码格式错误!</span>").insertAfter("input[name='mypassword']");
            return false;
        }

    }

    //第二次验证密码
    function checkTWopassword(){
        //获取第2输入的密码
        var twopassword=$("input[name='twopassword']").val();
        var upassword=$("input[name='mypassword']").val();
        //alert("ada");
        $("input[name='twopassword']").nextAll("span").remove();
        if(twopassword!=upassword){
            $("<span style='color:#ff0033;'>两次密码不一样!<span>").insertAfter("input[name='twopassword']");
            return false;
        }
    }
</script> 
</body>

</html>