@extends('shop.base')
	@section('content')	
		<div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                           
                            <div class="widget-body  widget-body-lg am-fr">

                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                        <tr>
                                            <th>用户</th>
                                            <th>影片名</th>
                                            <th>放映厅</th>
                                            <th>座位信息</th>
                                            <th>放映时间</th>
                                            <th>下单时间</th>
                                            <th>价钱</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        

                                        <tr class="gradeX">
                                            <td>{{$user}}</td>
                                            <td>{{$film}}</td>
                                            <td>{{$hall}}</td>
                                            <td>{{$orders->seat}}</td>
                                            <td>{{$orders->playtime}}</td>
                                            <td>{{$orders->addtime}}</td>
                                            <td>{{$orders->totalprice}}</td>
                                            
                                        </tr>
                                       
                                        <!-- more data -->
                                    </tbody>
                                </table>
                                
                            </div>
                        </div>
                    </div>
				</div>
	@endsection		
	