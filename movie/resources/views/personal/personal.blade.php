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
    <link rel="stylesheet" href="{{asset('home/css/personal_001.css')}}">
	

  <style type="text/css">
    .login{width:300px;height:80px;line-height:81px;float: right;}
    .login li{float:left;margin-left:15px; }
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

                            <li  class="current" id="yui_3_16_0_1_1498375845651_613"><a href="/personal/orders" id="yui_3_16_0_1_1498375845651_612">我的订单</a></li>
            		    </ul>
                    </dd>

                    <dt><strong>我的账户</strong></dt>
                    <dd class="last">
                        <ul class="item-list">

                            <li><a href="/account">我的余额</a></li>
                            <li><a href="/account/settings">账户设置</a></li>

                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
       <div id="content" class="pg-xorders coupons-box">
            <div class="mainbox mine">
                <div class="table-section">
                    <table id="order-list" cellspacing="0" cellpadding="0" border="0">
                        <tbody><tr>
                            <th class="item-info" width="auto">在线选座电影</th>
                            <th class="item-info" width="110">影院</th>
                            <th width="30">数量</th>
                            <th width="60">金额</th>
                            <th width="80">订单状态</th>
                            <th width="112">操作</th>
                        </tr>
                        <tr>
        	                <td>金刚：骷髅岛</td>
        	                <td>沃美影城(回龙观店)</td>
        	                <td>1</td>
        	                <td><span class="money">￥</span>49</td>
        	                <td>已完成</td>
        	                <td>
        	                <a class="inline-link" href="http://www.meituan.com/movie/orderinfo/1226826195">查看订单详情</a>
        		                <form action="" method="post" class="op">
        			                <span style="display: none;">
        			                <input name="csrf" value="3VmwEH_wJ8jkNEHS5DtEwkTsrwpvEusg0mDEfcFNuuIa601cl9ybRcV7pDIiOqSq" type="hidden">
        			                </span>
        		                	<input class="order-cancel" value="删除订单" type="submit">
        		                </form>
        	                </td>
                        </tr>

                     </tbody>
                </table>
                </div>
            </div>
        </div>
      
    </div>
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
   <script src="{{asset('home/css/common.78ef724e.js.下载')}}"></script>
<script src="{asset('home/css/profile-profile.9e78f285.js.下载')}}"></script>
</body>
</html>