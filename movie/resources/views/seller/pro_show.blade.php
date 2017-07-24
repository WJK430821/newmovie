@extends('seller.base')
    @section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>放映信息列表</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>影片名称</th>
                    <th>放映厅</th>
                    <th>放映时间</th>
                    <th>结束时间</th>
                    <th>价格</th>
                    <th>座位信息</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prolist as $key=>$plist)
                <tr>
                    <td>{{$plist->id}}</td>
                    <td><?php echo $vo[$key];?></td>
                    <td><?php echo $ho[$key];?></td>
                    <td>{{$plist->starttime}}</td>
                    <td>{{$plist->endtime}}</td>
                    <td>{{$plist->price}}元</td>
                    <td>{{$plist->seatinfo}}</td>
                    <td><a href="{{url('business/pro/del')}}/{{$plist->id}}" class="btn btn-danger">删除</a>&nbsp;&nbsp;&nbsp;<a href="{{url('business/pro/edit')}}/{{$plist->id}}" class="btn btn-primary">修改</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>

<div class="pages">
    <ul id="pagination-digg">
        {!! $prolist->render() !!}
    </ul>
</div>
@endsection