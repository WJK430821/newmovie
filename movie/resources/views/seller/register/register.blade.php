<!doctype html>
<html>
<head>
<title>商户注册</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- css files -->
<link href="{{asset('seller/register/css/style.css')}}" rel='stylesheet' type='text/css' media="all" />
<!-- /css files -->
</head>
<body>
<h1><img src="{{asset('seller/register/images/mws-logo.png')}}"></h1>
<div class="log">
	<div class="content2">
		<form action="{{url('business/register')}}">
			<input type="tel" name="phone" value="手机号" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '手机号';}">
			<input type="text" name="code" value="验证码" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '验证码';}">
			<input type="password" name="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'PASSWORD';}">
			<input type="submit" class="register" value="注册">
		</form>
	</div>
	<div class="clear"></div>
</div>

</body>
</html>