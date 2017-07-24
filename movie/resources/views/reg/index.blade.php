<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="keywords" content="美团,登录,注册,美团登录,美团注册">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>注册 | 猫眼电影</title>
    <!--[if lt IE 9]>
        <script src="//s0.meituan.net/bs/jsm/?f&#x3D;fe-sso-fs:build/page/vendor/html5shiv.min.js"></script>
    <![endif]-->
    <script src="{{asset('/js/jQuery-1.8.3.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('register/reg.css')}}">
</head>
<body class="pg-unitive-signup theme--maoyan">
	<header class="header--mini">
    <div class="wrapper cf">
        <a class="site-logo" href="http://www.maoyan.com/">美团</a>
    </div>
</header>
    <div class="content">
        <div class="J-unitive-signup-form">
            <div class="sheet" style="display: block;">
                @if(session("msg"))
                    <p class="login-box-msg" style="color:red;">{{session("msg")}}</p>
                @endif
                <form action="/reg/regLogin" method="post" name="myform" onsubmit="return doSubmit();" >
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-field form-field--mobile">
                        <label>手机号</label>
                        <input name="phone" class="f-text J-mobile"  placeholder="11位数字组成" type="text" onblur="checkPhone()">
                    </div>
                    <div class="form-field form-field--pwd">

                        <label>创建密码</label>
                        <input name="password" class="f-text J-pwd"  placeholder="由6到20位的数字，字母，下划线组成" type="password" onblur="checkPassword()">
                    </div>
                    <div class="form-field form-field--pwd2">
                        <label>确认密码</label>
                        <input name="password2" class="f-text J-pwd2" type="password" onblur="checkPassword2()">
                    </div>
                    <div class="form-field form-field--pwd2">
                        <label>验证码</label>
                        <input type="text" name="code" style="width:80px;" class="f-text J-pwd2"/>
                        <a  href="javascript:void(0)"  id="sendMobileCode">
                            {{--<button type="button" name="sub" onclick="send2(this)" id="dyMobileButton" class="dyMobileButton" >获取验证码</button>--}}
                            <input type="button" style="width:100px;height:35px" id="dyMobileButton" value="获取验证码" onclick="settime(this)" />
                        </a>{{--<img src="{{ url('reg/code') }}" onclick="this.src='{{ url('reg/code') }}?id='+Math.random(); " width="100" height="34"/>--}}
                    </div>
                    <div class="form-field">
                        <input data-mtevent="signup.submit" name="commit" class="btn" value="注册" type="submit">
                    </div>
                    <input name="fingerprint" class="J-fingerprint" value="0-1-1-" type="hidden">
                </form>
            </div>
        </div>

    </div>

	<footer class="footer--mini">
    <p class="copyright">
        ©<a class="f1" href="http://www.meituan.com/">meituan.com</a>&nbsp;
        <a class="f1" target="_blank" href="http://www.miibeian.gov.cn/">京ICP证070791号</a>&nbsp;
        <span class="f1">京公网安备11010502025545号</span>
    </p>
</footer>
<script>
    function doSubmit(){
        return checkPhone() &&  checkPassword() && checkPassword2();
    }
    //判断用户名是否合法
    function checkPhone(){
        //获取用户输入的信息
        var phone = document.myform.phone.value;
        $("input[name='phone']").nextAll("span").remove();
        //判断用户是否合法
        if(phone.match(/^1[34578]\d{9}$/)==null){
            $("<span style='color:red;'>用户名不合法请重新输入</span>").insertAfter("input[name='phone']");
            return false;
        }
        //执行ajax判断
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/reg/doLogin",
            type:"post",
            data:"phone="+phone,
            datatype:"text",
            success:function(data){
                if(data==1){
                   $("<span style='color:red;'>您输入的用户名"+phone+"已存在</span>").insertAfter("input[name='phone']");
                    document.myform.phone.value = "";
                    return false;
                }
                if(data==2){
                    $("<span style='color:red;'>用户名不可用</span>").insertAfter("input[name='phone']");
                    return false;
                }else{
                    $("<span style='color:green;'>用户名可用</span>").insertAfter("input[name='phone']");
                }
            }
        });
        return true;
    }
    //密码验证
    function checkPassword(){
        //获取用户的输入密码
        var password = document.myform.password.value;
        $("input[name='password']").nextAll('span').remove();
        if(password==""){
            $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='password']");
            return false
        }
        if(password.match(/^[A-Za-z0-9_]{6,20}$/)==null){
            $("<span style='color:red'>密码不合法请重新输入</span>").insertAfter("input[name='password']");
            return false;
        }else{
            $("<span style='color:green'>可用</span>").insertAfter("input[name='password']");
        }

        return true;
    }
    //确认密码验证
    function checkPassword2()
    {
        //获取确认密码
        var password2 = document.myform.password2.value;
        var password = document.myform.password.value;
        $("input[name='password2']").nextAll("span").remove();
        if(password2.length == 0){
            $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='password2']");
            return false
        }
        if(password2 != password){
            $("<span style='color:red'>两次密码不一致请重新输入</span>").insertAfter("input[name='password2']");
            document.myform.password2.value ="";
            return false;
        }else{
            $("<span style='color:green'>密码一致</span>").insertAfter("input[name='password2']");
            return true;
        }

        return true;
    }
    //设置300秒有效时间
    var countdown=300;
    //定时器
    function settime(obj) {
        var phone = document.myform.phone.value;
        $("input[name='phone']").nextAll("span").remove();
        if(phone == ""){
            $("<span style='color:red;'>用户名不能为空</span>").insertAfter("input[name='phone']");
            return false;
        }
        if(phone.match(/^1[34578]\d{9}$/)==null){
            $("<span style='color:red;'>用户名不合法请重新输入</span>").insertAfter("input[name='phone']");
            return false;
        }

        if (countdown == 0) {
            obj.removeAttribute("disabled");
            obj.value="获取验证码";
            countdown = 300;
            return;
        } else {
            obj.setAttribute("disabled", true);
            obj.value="重新发送(" + countdown + ")";
            countdown--;
            if(countdown == 299){
                send2();
            }
        }
        setTimeout(function() {settime(obj) },1000)
    }
    //ajax发送手机验证码
    function send2(){
        //执行ajax判断
        var phone = document.myform.phone.value;
        //执行ajax发送
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url:"/reg/regLogin",
            type:"post",
            data:"phone="+phone+"&num="+1,
        });
        return true;
    }
</script>
</body>
</html>
