<!DOCTYPE html>
<html>
<!--<![endif]--><head>
  <title>熊猫电影 - 一网打尽好电影</title>
  <meta charset="UTF-8">
  <meta name="keywords" content="电影,电视剧,票房,美剧,猫眼电影,电影排行榜,电影票,经典电影,在线观看">
  <meta name="description" content="猫眼电影致力于打造中国最大最全的电影信息资讯平台,在这里,海量影视资料应有尽有,热点影视讯息一网打尽,更有秒级实时票房,热门榜单,极致地满足您独特的观影口味">
  <meta http-equiv="cleartype" content="yes">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="{{asset('home/images/favicon.ico')}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('home/css/common.dce64fb8.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/personal.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/common.css')}}">

    <link rel="stylesheet" href="{{asset('home/css/personal_001.css')}}">
    <script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
    <script type="text/javascript">
        var w,h,className;
        function getSrceenWH(){
            w = $(window).width();
            h = $(window).height();
            $('#dialogBg').width(w).height(h);
        }

        window.onresize = function(){  
            getSrceenWH();
        }  
        $(window).resize();  

        $(function(){
            getSrceenWH();
            
            //显示弹框
            $('.mainbox a').click(function(){
                className = $(this).attr('class');
                $('#dialogBg').fadeIn(300);
                $('#dialog').removeAttr('class').addClass('animated '+className+'').fadeIn();
            });
            
            //关闭弹窗
            $('.claseDialogBtn').click(function(){
                $('#dialogBg').fadeOut(300,function(){
                    $('#dialog').addClass('bounceOutUp').fadeOut();
                });
            });
        });
    </script>
    
  <style type="text/css">
    .login{width:300px;height:80px;line-height:81px;float: right;}
    .login li{float:left;margin-left:15px;}
    .form {margin: 0 0 10px;position: relative;}
    .form-field--text {padding: 0 0 4px 110px;}
    .form-field {position: relative;padding: 8px 0 8px 110px;zoom: 1;}
    .form-field label {position: absolute;left: 0;width: 100px;padding-top: 0px;font-size: 14px;text-align: right;
        color: #333;
    }#settings-info-container .form-field--text .text {
        width: 150px;
        font-family: initial;
    }
  </style>
</head>
<body class="pg-xuanzuo has-order-nav">
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

<div id="bdw" class="bdw">
    <div id="bd" class="cf">
        <div data-component="order-nav" class="component-order-nav mt-component--booted" id="yui_3_16_0_1_1498375845651_23">
            <div class="side-nav J-order-nav" id="yui_3_16_0_1_1498375845651_603">
                <dl class="side-nav__list" id="yui_3_16_0_1_1498375845651_607">
                    <dd class="header-item" id="yui_3_16_0_1_1498375845651_618">
                        <ul id="yui_3_16_0_1_1498375845651_621">
                            <li id="yui_3_16_0_1_1498375845651_620"><a href="/personal" id="yui_3_16_0_1_1498375845651_619"><strong>我的主页</strong></a></li>
                        </ul>
                    </dd>
                    <dt class="first-item" id="yui_3_16_0_1_1498375845651_616"><strong id="yui_3_16_0_1_1498375845651_617">我的订单</strong></dt>
                    <dd id="yui_3_16_0_1_1498375845651_606">
                        <ul class="item-list" id="yui_3_16_0_1_1498375845651_605">
                            <li id="yui_3_16_0_1_1498375845651_613"><a href="/personal/orders" id="yui_3_16_0_1_1498375845651_612">我的订单</a></li>
            		    </ul>
                    </dd>

                    <dt><strong>我的账户</strong></dt>
                    <dd class="last">
                        <ul class="item-list">
                            <li><a href="/account">我的余额</a></li>
                            <li class="current"><a href="/account/settings">账户设置</a></li>
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
        <div id="content" class="pg-xorders coupons-box">
            <div class="mainbox mine">
                <div data-component="settings-filter" class="component-settings-filter mt-component--booted" mt-scope="[]" data-component-config="{&quot;lazyRender&quot;:false,&quot;afterLoad&quot;:false}" id="yui_3_16_0_1_1499911653852_31">
                    <ul class="filter cf" id="yui_3_16_0_1_1499911653852_858" style="margin-bottom: 10px;padding: 5px 0 10px;border-bottom: 1px solid #ddd;z-index: 5;">
                        <li class="current">
                            <a>基本信息</a>
                        </li>
                    </ul>
                </div>
                <form id="settings-info-container" method="get" action="/account/settings" class="form" data-needsmsup="false">
                    <div class="form-field form-field--text">
                        <label>手机号：</label>
                            <span class="text">{{$phone}}</span>
                            
                    </div>

                    <div class="form-field form-field--text">
                        <label>地　址：</label>
                            <span class="text">{{$ufirst->address}}</span>
                            <span class="inline-link"><a id="email-bind" href="javascript:;" class="bounceIn">修改</a></span>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>
<!-- 修改地址 -->
<div id="dialogBg"></div>
<div id="dialog" class="animated">
    <img class="dialogIco" width="50" height="50" src="{{asset('home/images/ico.png')}}" alt="" />
    <div class="dialogTop">
        <a href="javascript:;" class="claseDialogBtn">关闭</a>
    </div>
    <form action="{{url('account/settings')}}/{{$ufirst->id}}" method="post" id="editForm">
    {{ csrf_field() }}
        <ul class="editInfos">
            <li><label><font color="#ff0000">* </font>地址：<input  required value="{{$ufirst->address}}" class="ipt" name="address" /></label></li>
              <li><input type="submit" value="确认修改" class="submitBtn" /></li>
        </ul>
    </form>
</div>
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