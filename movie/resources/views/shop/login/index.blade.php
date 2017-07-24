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
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="{{asset('myadmin/assets/i/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('myadmin/assets/i/app-icon72x72@2x.png')}}">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="{{asset('myadmin/assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('myadmin/assets/css/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('myadmin/assets/css/app.css')}}">
    <script src="{{asset('myadmin/assets/js/jquery.min.js')}}"></script>

</head>

<body data-type="login">
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
                <div class="tpl-login-logo">

                </div>

					@if(session("msg"))
                        <p class="login-box-msg" style="color:red;">{{session("msg")}}</p>
					@else	
                        <p class="login-box-msg" style="color:red;">{{session("msg")}}</p>
					@endif


                <form class="am-form tpl-form-line-form" action="{{url('shop/doLogin')}}" method="post">
					<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <div class="am-form-group">
                        <input type="text" class="tpl-form-input" name="name" id="user-name" placeholder="请输入账号">

                    </div>

                    <div class="am-form-group">
                        <input type="password" name="password" class="tpl-form-input" id="user-name" placeholder="请输入密码">

                    </div>
					<!--加载验证码-->
					 <div class="am-form-group">
					 
						<div class="col-xs-6"> 
							  <div class="form-group has-feedback" style="width:140px;">
								<input type="text" name="mycode" class="form-control" placeholder="验证码"/>
							  </div>

						  </div>
						  <div style="float:right" class="col-xs-6">
							  <img src="{{url('shop/getcode')}}" onclick="this.src='{{url('shop/getcode')}}?id='+Math.random(); " width="100" height="34"/>
						  </div>
					  </div>
                  

					<div class="am-form-group">

                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">登录</button>

					
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('myadmin/assets/js/amazeui.min.js')}}"></script>
    <script src="{{asset('myadmin/assets/js/app.js')}}"></script>

</body>

</html>