@extends("admin.index")
@section("content")
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">当前位置：商家入驻</div>
                        <div class="widget-function am-fr">

                        </div>
                    </div>
                    <div class="widget-body am-fr">
                        {{--<div style="width:100px;float: right;" class="widget-title am-fl"><a href="/admin/root/create/">添加管理员</a></div>--}}
                        <form action="/admin/merchant/" method="get" class="form-inline">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleInputName2">关键字:</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName2" placeholder="商家名称">
                            </div>
                            <button type="submit" class="btn btn-default">搜索</button>
                        </form>

                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>商家id号</th>
                                    <th>商家名称</th>
                                    <th>手机号</th>
                                    <th>法人代表</th>
                                    <th>身份证号</th>
                                    <th>城市</th>
                                    <th>区域</th>
                                    <th>地址</th>
                                    <th>营业执照</th>
                                    <th>状态</th>
                                    <th>注册时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($list as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->shopname }}</td>
                                    <td>{{ $info->phone }}</td>
                                    <td>{{ $info->legal }}</td>
                                    <td>{{ $info->id_card }}</td>
                                    <td>{{ $info->city }}</td>
                                    <td>{{ $info->region }}</td>
                                    <td>{{ $info->address }}</td>
                                    <td><img src="../upload/{{$info->id}}/{{$info->licence}}" width="100" height="100"/></td>
                                    <td>
                                        @if($info->status == 1)
                                            待审核
                                        @elseif($info->status == 2)
                                            未通过
                                        @elseif($info->status == 3)
                                            已被禁用
                                        @else
                                            审核通过
                                        @endif
                                    </td>
                                    <td>{{ $info->addtime }}</td>
                                    <td>
                                        @if($info->status == 1)
                                            <a href="{{url('admin/merchant/success')}}/{{ $info->id }}" onclick = "return Success()"class="tpl-table-black-operation-del">
                                                <i class=""></i> 通过
                                            </a>|
                                            <a href="{{url('admin/merchant/lose')}}/{{ $info->id }}" onclick=" return Lose()" class="tpl-table-black-operation-del">
                                                <i class=""></i> 不通过
                                            </a>
                                        @elseif($info->status == 2)
                                            <a href="{{url('admin/merchant/success')}}/{{ $info->id }}" onclick="return lost()" class="tpl-table-black-operation-del">
                                                <i class=""></i> 未通过
                                            </a>
                                        @elseif($info->status == 3)
                                            <a href="{{url('admin/merchant/success')}}/{{ $info->id }}" onclick="return lost()" class="tpl-table-black-operation-del">
                                                <i class=""></i> 已禁用
                                            </a>
                                        @else
                                            <a href="{{url('admin/merchant/forbidden')}}/{{ $info->id }}" onclick=" return Forbidden()" class="tpl-table-black-operation-del">
                                                <i class=""></i> 以通过
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                {{$list->appends($where)->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
