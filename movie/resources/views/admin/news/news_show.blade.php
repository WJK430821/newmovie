@extends('admin.base')
    @section('content')
        <!-- 内容区域 -->
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title  am-cf">文章列表</div>
                </div>
                <div class="widget-body  am-fr">
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span><a href="{{url('/admin/news/create')}}" style="color:#fff;">新增</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                        <div class="am-form-group tpl-table-list-select">
                            
                        </div>
                    </div>
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                        <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                            <input type="text" class="am-form-field ">
                            <span class="am-input-group-btn">
                                <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button"></button>
                            </span>
                        </div>
                    </div>

                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>文章标题</th>
                                    <th>作者</th>
                                    <th>时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($news as $nlist)
                                <tr class="gradeX">
                                    <td>{{$nlist->id}}</td>
                                    <td>{{$nlist->title}}</td>
                                    <td>小熊猫</td>
                                    <td>2016-09-26</td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            <a href="{{url('admin/news/edit')}}/{{$nlist->id}}">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="{{url('admin/news/del')}}/{{$nlist->id}}" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="am-u-lg-12 am-cf">

                        <div class="am-fr">
                            <ul class="am-pagination tpl-pagination">
                                {!! $news->render() !!}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @endsection
