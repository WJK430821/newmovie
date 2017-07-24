@extends('admin.base')

@section("content")
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">当前位置：权限控制</div>
                        <div class="widget-function am-fr">

                        </div>
                    </div>
                    <div class="widget-body am-fr">
                        <div style="width:100px;float: right;" class="widget-title am-fl"><a href="/admin/root/create/">添加管理员</a></div>
                        <form action="/admin/root/" method="get" class="form-inline">
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
                                        <th>账号</th>
                                        <th>真实姓名</th>
                                        <th>状态</th>
                                        <th>添加时间</th>
                                        <th>操作</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach( $list as $info)
                                    <tr class="gradeX">
                                        <td>{{ $info->id }}</td>
                                        <td>{{ $info->account}}</td>
                                        <td>{{ $info->name }}</td>
                                        <td> @if($info->status == 2 || $info->status == 3) 启用 @else 禁用 @endif</td>
                                        <td>{{ date("Y-m-d H:i:s",$info->addtime) }}</td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                @if($info->status == 2 || $info->status == 3)
                                                    <a href="javascript:doDel({{$info->id}})" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-trash"></i> 点击禁用
                                                    </a>
                                                @else
                                                    <a href="/admin/root/{{ $info->id }}/edit" onclick="return reset()" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-trash"></i> 点击启用
                                                    </a>
                                                @endif

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach
                                {{ $list->appends($where)->links() }}
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
{{--伪造表单--}}
<form action="" method="post" name="myform">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
</form>
<script>
        //启用
        function reset(){
            if(confirm('你确定要启用吗？？')){
                return true;
            }else{
                return false;
            }
        }
        //禁用
        function doDel(id){
            if(confirm('你确定要禁用吗？？')){
                window.myform.action = "/admin/root/"+id;
                window.myform.submit();
            }
        }
</script>