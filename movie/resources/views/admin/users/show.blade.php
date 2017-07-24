@extends('admin.base')
@section("content")
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">当前位置：会员管理>>会员详情</div>
                        <div class="widget-function am-fr">

                        </div>
                    </div>
                    <div class="widget-body am-fr">
                        <div class="widget-title am-fl"><a href="/admin/users/child"><<返回</a></div>
                        <hr/>
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>id号</th>
                                    <th>真实姓名</th>
                                    <th>性别</th>
                                    <th>地址</th>
                                    <th>状态</th>
                                    <th>电子邮件</th>
                                    <th>首次登录时间</th>
                                    <th>最后一次登录时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->nickname }}</td>
                                    <td>{{ $list->sex }}</td>
                                    <td>{{ $list->address }}</td>
                                    <td> @if($list->status == 1 ) 启用中 @else 禁用中 @endif </td>
                                    <td>{{ $list->email }}</td>
                                    <td>{{ date("Y-m-d H:i:s",$list->firsttime) }}</td>
                                    <td>{{ date("Y-m-d H:i:s",$list->lasttime) }}</td>
                                    <td>

                                        @if($list->status == 1)
                                            <a href="{{url('/admin/users/del')}}/{{$list->id}}" onclick="return del()">点击禁用</a>
                                        @else
                                            <a href="{{url('/admin/users/reset')}}/{{$list->id}}" onclick="return reset()">点击启用</a>
                                        @endif

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    //禁用
    function del(){
        if(confirm('你确定要禁用吗？？')){
            return true;
        }else{
            return false;
        }
    }
    //启用
    function reset(){
        if(confirm('该用户违反相关规定也被禁用，你确定要重新启用吗？？')){
            return true;
        }else{
            return false;
        }
    }
</script>