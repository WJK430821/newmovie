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
                                            <th>下单时间</th>
                                            <th>详情信息</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                         @foreach($orders as $key=>$vo)

                                        <tr class="gradeX">
                                            <td><?php echo $user[$key]; ?></td>
                                            <td><?php echo $film[$key]; ?></td>
                                            <td>{{$vo->playtime}}</td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="{{url('/shop/orders/store')}}/{{$vo->id}}">
                                                        <i class="am-icon-pencil"></i> 查看
                                                    </a>
                                                   
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        <!-- more data -->
                                    </tbody>
                                </table>
                               
                            </div>
                        </div>
                    </div>
				</div>
	@endsection		
	