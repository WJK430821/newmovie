@extends('seller.base')
    @section('content')
<div class="mws-panel grid_5">
    <div class="mws-panel-header">
        <span><i class="icon-graph"></i>放映统计</span>
    </div>
    <div class="mws-panel-body">
        <div id="mws-dashboard-chart" style="height: 222px;"></div>
    </div>
</div>
                
<div class="mws-panel grid_3">
    <div class="mws-panel-header">
        <span><i class="icon-book"></i>商户信息</span>
    </div>
    <div class="mws-panel-body no-padding">
        <ul class="mws-summary clearfix">
            <li>
                <span class="key"><i class="icon-comment"></i>商户名称</span>
                <span class="val">
                    <span class="text-nowrap">{{$seller->shopname}}</span>
                </span>
            </li>
            <li>
                <span class="key"><i class="icon-phone"></i>商户电话</span>
                <span class="val">
                    <span class="text-nowrap">{{$seller->phone}}</span>
                </span>
            </li>
            <li>
                <span class="key"><i class="icon-user"></i>法人代表</span>
                <span class="val">
                    <span class="text-nowrap">{{$seller->legal}}</span>
                </span>
            </li>
            <li>
                <span class="key"><i class="icon-business-card"></i>身份证号</span>
                <span class="val">
                    <span class="text-nowrap">{{$seller->id_card}}</span>
                </span>
            </li>
            <li>
                <span class="key"><i class="icon-bus"></i>所在地区</span>
                <span class="val">
                    <span class="text-nowrap">{{$seller->address}}</span>
                </span>
            </li>
        
        </ul>
    </div>
</div>
@endsection