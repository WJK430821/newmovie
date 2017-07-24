@extends('home.base')
@section('content')

    <link rel="stylesheet" href="{{asset('home/css/cinemashow.css')}}" clam-moveto="none">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/cinemashow_001.css')}}">
    <!-- header -->
@section("show")
    <div class="infomation-wrapper" data-spm="w1">
        <div class="center-wrap">
            <h4 class="title">{{$sname->shopname}}<!--small class='mark'>关注：22093</small--><small class="score">9.4 </small><small class="others"><!--a class="J_gocomment" href="#comment">[评价]</a--><!--a href="#">[纠错信息]</a--></small></h4>
            <div class="info">
                <div class="right-event">

                    <div id="J-sm-map" class="sm-map amap-container" style="background: rgb(252, 249, 242) none repeat scroll 0% 0%;">
                        <div class="sm-map-info"><a class="more pos-hook" data-href="#J-map">大图查看</a></div>
                        <object style="display: block; position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; overflow: hidden; pointer-events: none; z-index: -1;" type="text/html" data="about:blank"></object><div class="amap-maps"><div class="amap-drags" style=""><div class="amap-layers" style="transform: translateZ(0px);"><canvas class="amap-layer" width="240" height="160" style="position: absolute; z-index: 0; top: 0px; left: 0px; height: 160px; width: 240px;"></canvas><canvas class="amap-labels" draggable="false" style="position: absolute; z-index: 99; height: 160px; width: 240px; top: 0px; left: 0px;" width="240" height="160"></canvas><div class="amap-markers" style="position: absolute; z-index: 120; top: 80px; left: 120px;"><div class="amap-marker" style="top: -31px; left: -9px; z-index: 100; transform: rotate(0deg); transform-origin: 9px 31px 0px; display: block;"><div class="amap-icon" style="position: absolute; width: 28px; height: 37px; opacity: 1;"><img src="" style="top: 0px; left: -28px;"></div></div></div></div><div class="amap-overlays" style=""></div></div></div><div style="display: none;"></div><div class="amap-controls"></div><a class="amap-logo" href="http://gaode.com/" target="_blank"><img src="/upload/{{$sname->picname}}"></a><div class="amap-copyright" style="display: none;"></div></div>
                </div>
                <a data-type="image" class="float-layer-hook float-layer-wrapper">
                    <img data-src="" src="/upload/pic/{{$sname->cid}}/b_{{$sname->picname}}">
                </a>
                <ul class="info-list">
                    <li>详细地址：{{$sname->address}}<a class="pos-hook" data-href="#J-map"></a></li>					<li>联系电话：{{$sname->phone}}</li>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- tab -->
    <div class="center-wrap tab-wrapper">
        <ul class="tab-list M-tabs">
            <li id="seat" class="J_seat current">
                <a href="#seat" data-href="seat" data-spm-anchor-id="a1z21.6646389.0.0">选座购票</a>
            </li>
        </ul>
    </div>
    <!-- cinema-detail -->
    <div class="center-wrap cinema-detail-wrapper M-detail" data-spm="w4" style="display: none;">
        <div class="cinema-detail-item">
            <div class="title-wrap"> <h3 class="special-detail-hook">影院介绍</h3></div>
            <ul>
                <li><span>详细地址： </span>朝阳区东大桥路9号芳草地大厦LG2-26 [<a data-href="#J-map" class="pos-hook">地图</a>]</li>
                <li><span>联系电话： </span>010-56907679,0</li>
            </ul>

        </div>

    </div>


    <div class="center-wrap M-seat" style="" data-spm="w2">
        <div class="schedule-wrap J_scheduleWrap schedule-loaded" data-type="cinema_detail" data-ajax="/cinemaDetailSchedule.htm" data-param="showId=&amp;cinemaId=9462&amp;ts=1496139386907&amp;n_s=new">

            <div class="center-wrap w-seat-wrapper">
                <div class="filter-wrap">
                    <ul class="filter-select">
                        <li>
                            <label>选择影片</label>
                            <div class="select-tags">
                                @foreach($titles as $info)
                                    <a class="current" href="/cinemas/info/{{$info->id}}/{{$sname->cid}}" data-param="cinemaId=9462&amp;activityId=&amp;fCode=&amp;showId=161044&amp;showDate=2017-05-30&amp;ts=1496139392951&amp;n_s=new">{{$info->title}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li>
                            <label>选择时间</label>
                            <div class="select-tags">
                                <a href="#" class="current" data-param="cinemaId=9462&amp;activityId=&amp;fCode=&amp;showId=161044&amp;showDate=2017-05-30&amp;ts=1496139392951&amp;n_s=new" href="javascript:;">{{$date1}}（今天）</a>
                                <a href="/cinemas/date/{{$sname->cid}}/{{$filmtitle->id}}" class="current" data-param="cinemaId=9462&amp;activityId=&amp;fCode=&amp;showId=161044&amp;showDate=2017-05-31&amp;ts=1496139392951&amp;n_s=new" href="javascript:;">{{$date2}}（星期{{$date3}}）</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- movie bar -->
                <div class="movie-wrapper M-movie">
                    <img class="movie-post" src="/uploads/{{$filmtitle->picname}}" width="120" height="160">
                    <div class="movie-info-wrap">
                        <h4 class="info-title">
                            {{--<a href="http://dianying.taobao.com/showDetail.htm?showId=161044&amp;n_s=new" class="movie-name">{{$title2->title}}<small class="score">8.9</small></a><!--small class='mark'>关注度：40000000</small--></h4>--}}
                        <div class="right-info">
                            <a class="detail" href="http://dianying.taobao.com/showDetail.htm?showId=161044&amp;n_s=new">查看影片详情&nbsp;&gt;</a>
                        </div>
                        <div class="movie-info">
                            <ul>
                                <li>看点：{{str_limit($filmtitle->introduction,100)}}</li><li>导演：{{$filmtitle->director}}</li>	<li>主演：{{$filmtitle->actor}}</li>	<li>类型：{{$filmtitle->fid}}</li><li>制片国家/地区：{{$filmtitle->region}}</li>						<li>语言：{{$filmtitle->language}}</li>					</ul>
                        </div>
                        </h4>
                    </div>
                </div>
                <!-- Hall Tabel-->
                <div class="center-wrap">
                    <table class="hall-table">
                        <thead>
                        <tr>
                            <th class="hall-time">放映时间</th>
                            <th class="hall-type">语言版本</th>
                            <th class="hall-name">放映厅</th>
                            <th class="hall-flow">座位情况</th>
                            <th class="hall-price">现价/影院价（元）</th>
                            <th class="hall-buy">选座购票</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($date7 as $key=>$info)
                            <tr>
                                <td class="hall-time">
                                    <em class="bold">{{date("H:i",strtotime($info->datetime))}}</em>
                                    预计3小时后散场
                                </td>
                                <td class="hall-type">
                                    3D{{$language}}
                                </td>
                                <td class="hall-name">
                                    {{$halltitle[$key]}}
                                </td>

                                <td class="hall-flow">
                                    <div class="flowing-wrap flowing-loose">
                                        <label> {{$info->seatinfo}}  </label>
                                        <span class="flowing-vol"><i style="width: 0%;"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="403772016">
								<i class="icon-zoom"></i>
								<div class="view-wrap" style="display: none;">
                                    <div class="view-box">加载中...</div>
                                </div>
							</span>
                                    </div>
                                </td>
                                <td class="hall-price" data-partcode="lumiaivista">
                                     <em class="now">{{$info->price}}</em>
                                    <del class="old">89.00</del>
                                   
                                </td>
                                <td class="hall-seat">
                                    <a class="seat-btn" href="/order/choose/{{$sname->shopname}}/{{$halltitle[$key]}}/{{$filmtitle->title}}">选座购票</a>
                                </td>
                                
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{session()->put('url',$_SERVER['REQUEST_URI'])}}
@show
@endsection
