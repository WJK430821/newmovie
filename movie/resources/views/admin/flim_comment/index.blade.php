
@extends('admin.base')
    @section('content')
<div class="row-content am-cf">
    <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">当前位置：浏览影片</div>
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body  widget-body-lg am-fr">

                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <thead>
                                        <tr>
                                            <th width="70">ID</th>
                                            <th width="200">影片</th>
                                            <th width="170">会员账号</th>
                                            <th width="230">评论时间</th>
                                            <th width="90">评论内容</th>
                                        </tr>
                                    </thead>
                                    @foreach($data as $k=>$v)
                                        <tr class="gradeX" style="max-height:50px;">
                                            <td>{{$v->id}}</td>
                                            <td>{{$title[$k]}}</td>
                                            <td>{{$phone[$k]}}</td>
                                            <td heigth="20" style="display:none;">{{$v->comment}} 
                                                
                                            </td>
                                            <td><?php 
                                                 echo date('Y-m-d H:i:s',$v->created_at);
                                                 ?>
                                            </td>
                                            <td>
                                               <button class="comment" style="background-color:#888;">查看</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
        </div>
    </div>
</div>
<script>
    $(".comment").click(function(){
        layer.open({
            type: 1,
            skin: 'layui-layer-rim', //加上边框
            area: ['420px', '240px'], //宽高
            content: $(this).parent().siblings().eq('3').html(),
        });
    })
</script>

    @endsection

 