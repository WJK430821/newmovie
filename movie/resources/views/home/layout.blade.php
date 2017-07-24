@extends('home.base')
@section('content')
	<link rel="stylesheet" type="text/css" href="{{asset('home/css/main.css')}}" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<style type="text/css">
		.demo{width:700px; margin:40px auto 0 auto; min-height:450px;}
		@media screen and (max-width: 360px) {.demo {width:340px}}

		.front{width: 300px;margin: 5px 32px 45px 32px;background-color: #f0f0f0;	color: #666;text-align: center;padding: 3px;border-radius: 5px;}
		.booking-details {float: right;position: relative;width:220px;height: 450px; }
		.booking-details h3 {margin: 5px 5px 0 0;font-size: 16px;}
		.booking-details p{line-height:26px; font-size:16px; color:#999}
		.booking-details p span{color:#666}
		div.seatCharts-cell {color: #182C4E;height: 25px;width: 26px;line-height: 25px;margin: 3px;float: left;text-align: center;outline: none;font-size: 13px;}
		div.seatCharts-seat {cursor: pointer;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;}
		div.seatCharts-row {height: 35px;}

		div.seatCharts-seat.available {background:{{url(asset('home/images/26-25.png'))}};}
		div.seatCharts-seat.available1{background:{{url(asset('home/images/hong26-25.png'))}};}
		div.seatCharts-seat.focused {background-color: #76B474;border: none;}
		div.seatCharts-seat.selected {background:{{url(asset('home/images/hong26-25.png'))}};}
		div.seatCharts-seat.unavailable {background:{{url(asset('home/images/26-25hei.png'))}};cursor: not-allowed;}
		div.seatCharts-container {border-right: 1px dotted #adadad;width: 400px;padding: 20px;float: left;}
		div.seatCharts-legend {padding-left: 0px;position: absolute;bottom: 16px;}
		ul.seatCharts-legendList {padding-left: 0px;}
		.seatCharts-legendItem{float:left; width:90px;margin-top: 10px;line-height: 2;}
		span.seatCharts-legendDescription {margin-left: 5px;line-height: 30px;}
		.checkout-button {display: block;
			text-align: center;
			margin-top: 20px;
			cursor: pointer;
			background: rgb(235, 0, 42) none repeat scroll 0% 0%;
			border: 0px none;
			width: 155px;
			height: 42px;
			line-height: 42px;
			color: rgb(255, 255, 255);
			font-size: 14px; cursor:pointer}
		#selected-seats {max-height: 150px;overflow-y: auto;overflow-x: none;width: 200px;}
		#selected-seats li{float:left; width:72px; height:26px; line-height:26px; border:1px solid #d3d3d3; background:#f7f7f7; margin:6px; font-size:14px; font-weight:bold; text-align:center}
	</style>

	</head>

	<body>

	<div id="main">
		<h2 class="top_title">{{$ctit->shopname}}</h2>
		<div class="demo">

			<center>
				<div id="seat-map">
					<div class="front">屏幕中央</div>
					<div id="newseatmap">
						@foreach ($layout as $key=>$value)
						@endforeach
						@for ($i = 0; $i <=$key; $i++)
							<ul value="{{($i)}}">
								@php
								{{-- @todo 处理一个数组将座位信息删除  显示真实的座位信息 --}}
								@endphp
								@for($j=0;$j<count($value);$j++)
									@if($value[$j]=='a')
										<button class="seatbutton" style="background-color:#f0f0f0" issale = "{{$value[$j]}}" cowsnumber="{{$i+1}}" value="">{{$j+1}}</button>
									@elseif ($value[$j]=='_')
										<button style="visibility:hidden" value="{{$value[$j]}}">{{$j}}</button>

										{{-- @todo  $ptime  ['price'] 价格['seatinfo']  获取售卖出的 座位数组 遍历后输出 --}}
									@elseif ($value[$j]=='s')

										<button cowsnumber="{{$i+1}}"  issale = "{{$value[$j]}}" disabled style="color:orangered;" value="{{$value[$j]}}">{{$j}}</button>

									@endif
								@endfor

							</ul>
						@endfor


					</div>
				</div>
			</center>
			<div class="booking-details">
				<p>影片：<span>{{$fmfirst->title}}</span></p>
				<p>影厅：<span>{{$hfirst->title}}</span></p>
				<p>场次：<span>{{$ptime->datetime}}</span></p>

				<p>座位：</p>
				<ul id="selected-seats"></ul>
				<p>票数：<span id="counter">0</span></p>
				<p>总计：<b>￥<span id="total">0</span></b></p>

				<button class="checkout-button" onclick="sendtickets()">确认信息,下单</button>
				<div id="legend"></div>
			</div>
			<div style="clear:both"></div>
		</div>

		<br/>
	</div>
	<script src="{{asset('home/js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('home/js/jquery.seat-charts.min.js')}}"></script>
	<script type="text/javascript">

		var arr =[];
		$('.seatbutton').toggle(function(){
			if(arr.length<=3){
				var cowsnumber = parseInt(($(this).attr('cowsnumber')));
				var seat =  parseInt(($(this).html()));
				if(arr.length==0){
					arr.push([cowsnumber,seat]);
					console.log('aaa',arr);
				}else {
					if(!isInArray(arr,cowsnumber,seat)){
						arr.push([cowsnumber,seat]);
						console.log('后来的数组',arr);
					}

				}
				$('#counter').html(arr.length);
				$('#total').html(arr.length*{{intval($ptime['price'])}});
				$('#selected-seats').append("<span id="+cowsnumber+seat+">"+cowsnumber+"排"+seat+"座"+"</span>");
				$(this).css('background','green');//('display','null');
			}
			if(arr.length==4){
				alert('只允许选四张');	
			}
		}, function(){
			//元素隐藏 代码④
			var cowsnumber = ($(this).attr('cowsnumber'));
			var seat =  ($(this).html());
			var flag = isInArray(arr,cowsnumber,seat);
			if(flag || flag==0){
				arr.splice(flag,1);
				console.info('切换的数组',arr);
			}
			$('#'+cowsnumber+seat+'').empty();
			$(this).css('background','#f0f0f0');

			if(arr.length==0){
				$('#selected-seats').empty();
			}
			$('#counter').html(arr.length);
			$('#total').html(arr.length*{{intval($ptime['price'])}});

		})
		//判断是否在数组中
		function isInArray(arr,seatindex,seatvalue){
			for(var i=0; i<arr.length;i++){
				if(arr[i][0]==seatindex && arr[i][1]==seatvalue){
					return i;
					break;
				}
			}
			return false
		}

		//发送票务信息
		function sendtickets(){
			//alert('ddd');
			if(arr.length>0){
				var argm = {}
				argm.seatinfo = arr;
				argm.pid = {{$ptime['id']}};
				argm.totalprice = $('#total').html();

				$.ajax({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					url:"{{url("order/orderAdd")}}",
					type:'post',
					data:argm,
					datatype:'json',
					success:function(Responsedata){
                        if(Responsedata==1){
                            window.location.href="/order/ispay";
                        }

					}
				});
				$(this).disabled;
			}
		}
	</script>
@endsection

