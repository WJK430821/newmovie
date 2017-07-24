@extends('shop.base')

@section('content')

<div class="row am-cf">
                    <div class="am-u-sm-12 am-u-md-8">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">商户图片</div>
                               
                            </div>
                            <div class="widget-body-md widget-body tpl-amendment-echarts am-fr" id="tpl-echarts">
								 <p class="text-center list-group-item"><img width="500" height="200" src="/upload/pic/{{$shopdetail->cid}}/{{$shopdetail->picname}}"/></p>
                            </div>
                        </div>
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">营业执照</div>
                                
                            </div>
                            <div class="widget-body-md widget-body tpl-amendment-echarts am-fr" id="tpl-echarts">
								  <p class="text-center list-group-item"><img width="500" height="200" src="/upload/{{$shopdetail->cid}}/{{$shopdetail->licence}}"/></p>
		 
                            </div>
                        </div>
                    </div>

                    <div class="am-u-sm-12 am-u-md-4">

                        <div class="widget am-cf">
                        <div class="widget-head am-cf"></div>
                                
                            </div>
                            
                            <div class="widget-body widget-body-md am-fr">
                            	 <div class="am-progress-title">商家名称：{{$shopdetail->shopname}}</div><br/>

                                <div class="am-progress-title">商家电话：{{$shopdetail->phone}}</div><br/>
                                
                                <div class="am-progress-title">法人代表：{{$shopdetail->legal}}</div><br/>
                                <div class="am-progress-title">身份证号：{{$shopdetail->id_card}}</div><br/>
                                <div class="am-progress-title">所在城市：{{$shopdetail->city}}</div><br/>
                                <div class="am-progress-title">所在区域：{{$shopdetail->region}}</div><br/>
                                <div class="am-progress-title">详细地址：{{$shopdetail->address}}</div><br/>
                              
                                
                               
                            </div>
                        </div>
                    </div>
                </div>

		 
@endsection