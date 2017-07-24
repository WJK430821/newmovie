@extends('admin.base')

@section("content")
<div class="row-content am-cf">
         <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">当前位置：会员管理</div>
                        <div class="widget-function am-fr">
                            
                        </div>
                    </div>
                    <div class="widget-body am-fr">
                        <form action="/admin/users/child" method="get" class="form-inline">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputName2">关键字:</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName2" placeholder="账号">
                            </div>
                            <button type="submit" class="btn btn-default">搜索</button>
                        </form>
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                            <tr>
                                <th>id号</th>
                                <th>会员详情id</th>
                                <th>账号</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $list as $info)
                                <tr class="gradeX">
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->uid}}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="{{ url('/admin/users/show') }}/{{ $info->uid }}">
                                                <i class="am-icon-pencil"></i> 查看会员详情
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
</div>

    {{ $list->appends($where)->links() }}
@endsection
