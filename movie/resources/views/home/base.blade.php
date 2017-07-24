<!DOCTYPE html>
<html>
<!--<![endif]--><head>
  <title>猫眼电影 - 一网打尽好电影</title>
  <meta charset="UTF-8">
  <meta name="keywords" content="电影,电视剧,票房,美剧,猫眼电影,电影排行榜,电影票,经典电影,在线观看">
  <meta name="description" content="猫眼电影致力于打造中国最大最全的电影信息资讯平台,在这里,海量影视资料应有尽有,热点影视讯息一网打尽,更有秒级实时票房,热门榜单,极致地满足您独特的观影口味">
  <meta http-equiv="cleartype" content="yes">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{asset('home/images/favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('home/css/common.dce64fb8.css')}}">
  <link rel="stylesheet" href="{{asset('home/css/home-index.ff98348e.css')}}">
  <link rel="stylesheet" href="{{asset('home/css/movie-list.ffb4de4a.css')}}">
    <link href="{{asset('myadmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <style type="text/css">
    .login{width:300px;height:80px;line-height:81px;float: right;}
    .login li{float:left;margin-left:15px;}
    .login li a{color: rgb(43, 184, 170);}
  </style>
</head>
<body>
<div class="header">
  <div class="header-inner">
        <a href="/" class="logo" data-act="icon-click"></a>
        <div class="nav">
            <ul class="navbar">
                <li><a href="/" data-act="home-click" class="active">首页</a></li>

                <li><a href="/films" data-act="movies-click">电影</a></li>

                <li><a href="/cinemas" data-act="board-click">影院</a></li>
                <li><a href="/news" data-act="hotNews-click">热点</a></li>
            </ul>
        </div>

        <div class="user-info">
            <div class="login">
              <ul>
                @if (session("users"))
                <li>会员:{{session("users")->phone}}</li>
                <li><a href="/personal">个人中心</a></li>
                <li><a href="/login/loginout">退出</a></li>
                @else
                <li><a href="/login/">登录</a></li>
                <li><a href="/reg/">注册</a></li>
                @endif
              </ul>
            </div>
        </div>
        
  </div>
</div>
<div class="header-placeholder"></div>
@section('content')
  
@show
<div class="footer" style="visibility: visible;">
    <p>
        ©2016 熊猫电影
        <a href="" target="_blank">京ICP证160733号</a>
        <a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备16022489号-1</a>
        京公网安备 11010502030881号
        <a href="" target="_blank">网络文化经营许可证</a>
    </p>
    <p>北京熊猫文化传媒有限公司</p>
</div>
</body>
</html>
