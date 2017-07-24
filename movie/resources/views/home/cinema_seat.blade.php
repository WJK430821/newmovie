@extends('home.base')
  @section('content')

<link rel="stylesheet" href="{{asset('home/css/cinemashow.css')}}">
<link rel="stylesheet" href="{{asset('home/css/filmseat.css')}}">
<div style="height:20px;"></div>
<div class="detail-wrap J_detailWrap" data-spm="w1">
	<div class="detail-cont">
		<div class="center-wrap">
			<h3 class="cont-title">{{$flists->title}}<i></i>  <em class="score">{{$flists->score}}</em></h3>
			<div class="cont-pic">
				<img with="232" heigh="322" src="/uploads/{{$flists->picname}}" alt="">
			</div>
			<ul class="cont-info">				
				<li>导演：{{$flists->director}}</li>				
				<li>主演：{{$flists->actor}}</li>	
				<li>类型：动作 冒险 喜剧</li>				
				<li>制片国家/地区：{{$flists->region}}</li>				
				<li>语言：{{$flists->language}}</li>				
				<li>片长：{{$flists->duration}}</li>				
				<li class="J_shrink shrink">剧情介绍：{{$flists->introduction}}</li>			
			</ul>
			<div class="cont-time">上映时间：{{$flists->firsttime}}</div>
			
		</div>			
	</div>
</div>

<div class="title-wrap">
	<div class="center-wrap">
		<h3>选座购票</h3>
	</div>
</div>

<div class="schedule-wrap J_scheduleWrap schedule-loaded" data-spm="w2" data-ajax="/showDetailSchedule.htm" data-param="showId=161044&amp;ts=1495634510375&amp;n_s=new" data-spm-max-idx="273">
<!-- Filter -->
	<div class="filter-wrap">
		<div class="center-wrap">
			<ul class="filter-select">
				<li>
					<label>选择区域</label>
					<div class="select-tags">
						<a href="javascript:;" data-param="showId=161044&amp;n_s=new">全部区域</a>
						<a class="current" href="javascript:;" data-param="showId=161044&amp;regionName=昌平区&amp;ts=1495634526740&amp;n_s=new">昌平区</a>
						
	
					</div>
				</li>
				<li>
					<label>选择影城</label>
					<div class="select-tags">
					
						<a href="javascript:;" data-param="showId=161044&amp;cinemaId=15516&amp;date=2017-05-26&amp;regionName=昌平区&amp;ts=1495634526740&amp;n_s=new">首都电影院（昌平店）</a>
						<a href="javascript:;" data-param="showId=161044&amp;cinemaId=4284&amp;date=2017-05-26&amp;regionName=昌平区&amp;ts=1495634526740&amp;n_s=new">中影国际影城北京昌平永旺店</a>
						<a class="current" href="javascript:;" data-param="showId=161044&amp;cinemaId=19905&amp;date=2017-05-26&amp;regionName=昌平区&amp;ts=1495634526740&amp;n_s=new">北京沃美影城回龙观店</a>
	    			</div>
				</li>
				<li>
					<label>选择时间</label>
					<div class="select-tags">
						
						<a href="javascript:;" data-param="showId=161044&amp;date=2017-05-24&amp;n_s=new&amp;regionName=昌平区&amp;cinemaId=19905&amp;ts=1495634526740&amp;n_s=new">5月24日（今天）</a>
						
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- Cinema bar -->
	<div class="center-wrap cinemabar-wrap">
		<h4>北京沃美影城回龙观店</h4>
		地址：昌平区回龙观同成街华联购物中心4楼(城铁回龙观站出口对面) <a href="https://dianying.taobao.com/cinemaDetail.htm?cinemaId=19905&amp;n_s=new#detail">[地图]</a>  电话：400-6819819
				<a class="more" href="https://dianying.taobao.com/cinemaDetail.htm?cinemaId=19905&amp;n_s=new">查看影院详情&nbsp;&gt;</a>
			</div>

	<!-- Hall Tabel -->
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
				@foreach ($prolist as $key=>$pro)					
				<tr>
					<td class="hall-time">
						<em class="bold"><?php echo substr(($pro->starttime),10,9);?></em>
						 预计<?php echo substr(($pro->endtime),10,9);?>散场 					
					</td>
					<td class="hall-type">
						{{$pro->language}}
					</td>
					<td class="hall-name">
						<?php echo $ho[$key];?>
					</td>
										
					<td class="hall-flow">
						<div class="flowing-wrap flowing-loose">
							<label> 宽松  </label>
							<span class="flowing-vol"><i style="width: 0%;"></i></span>
							<span class="flowing-view J_flowingView" data-scheduleid="402465169"><i class="icon-zoom"></i>
							<div class="view-wrap" style="display: none;">
								<div class="view-box">加载中...</div>
							</div>
							</span>
						</div>
					</td>
					<td class="hall-price" data-partcode="vista">
						<em class="now">{{ $pro->price }}.00</em>
						<!-- <del class="old">39.00</del> -->
					</td>
					<td class="hall-seat">
						<a class="seat-btn" href="/order/layout/{{$flists->id}}/seat/{{$haid[$key]}}/{{$pro->id}}">选座购票</a>
						
					</td>
				</tr>
				@endforeach
			</tbody>	
		</table>
	</div>
    {{session()->put('url',$_SERVER['REQUEST_URI'])}}
</div>
@endsection
