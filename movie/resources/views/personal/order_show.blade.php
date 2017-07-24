@extends('home.base')
  @section('content')
      <link rel="stylesheet" href="{{asset('home/css/ordershow.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/ordershow_001.css')}}">
<div id="bdw" class="bdw">
    <div id="bd" class="cf">
        <div id="content" class="pg-xorder-info">
            <ul data-mtnode="Amymeituan" class="nav-tabs--small cf">
                <li><a class="color-text" gaevent="/my/navBar/orders" href="/personal/orders" data-mttcode="Borders">我的订单</a></li>
                <li><a class="color-text" gaevent="/my/navBar/credit" href="/account" data-mttcode="Bcredit">账户余额</a></li>
                <li><a class="color-text" gaevent="/my/navBar/settings" href="/account/settings" data-mttcode="Bsettings">账户设置</a></li>
            </ul>
            <div class="mainbox mine">       
                <h2>订单详情<span class="op-area"></span></h2>
                <dl class="info-section" id="primary-info">
                    <dt>当前订单状态：<em>{{$ordershow->ispay}}</em></dt>
                    <dd class="last"><p class="status-consumed">验证码：WHN5PTF　　　　已使用</p>
                    </dd>
                </dl>
                <dl class="bunch-section">
                    <dt class="bunch-section__label">选座票信息</dt>
                    <dd class="bunch-section__content">
                        <dl class="xorder-info">
                            <dt>电影：</dt>
                            <dd><a href="" target="_blank">{{$film->title}}</a></dd>
                            <dt>影院：</dt>
                            <dd><a>{{$shop->shopname}}</a>&nbsp;&nbsp;{{$halltit->title}}</dd>
                            <dt>影院地址：</dt>
                            <dd>{{$shop->city}}{{$shop->region}}{{$shop->address}}</dd>
                            <dt>版本：</dt>
                            <dd>{{$film->language}}</dd>
                            <dt>场次：</dt>
                            <dd>{{$ordershow->playtime}}</dd>
                            <dt>座位：</dt>
                            <dd>{{$ordershow->seat}}</dd>
                            <dt>票数：</dt>
                            <dd>1</dd>
                            <dt>总价：</dt>
                            <dd>{{$ordershow->totalprice}}</dd>
                        </dl>
                    </dd>
                </dl>
                <dl class="bunch-section">
                    <dt class="bunch-section__label">订单信息</dt>
                    <dd class="bunch-section__content">
                        <ul class="flow-list">
                            <li>订单编号：{{$ordershow->number}}</li>
                            <li>下单时间：{{$ordershow->addtime}}</li>
                        </ul>
                    </dd>
                </dl>
                <div class="maoyan-machine"></div>    
            </div>
        </div>
    </div>
</div>
@endsection