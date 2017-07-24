@extends('seller.base')
    @section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
        <span><i class="icon-table"></i>放映厅</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-datatable-fn mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>放映厅名称</th>
                    <th>座位布局</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($halist as $hlist)
                <tr>
                    <td>{{$hlist->id}}</td>
                    <td>{{$hlist->title}}</td>
                    <td>{{$hlist->layout}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
    @endsection