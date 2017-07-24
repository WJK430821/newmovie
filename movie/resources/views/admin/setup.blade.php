@extends('admin.base')
    @section('content')
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">站点设置</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">
                    <form class="am-form tpl-form-line-form" action="{{URL('admin/setup')}}" method="get">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="id" value="{{$webs->id}}">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">站点标题 <span class="tpl-form-line-small-title">Title</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" class="tpl-form-input" id="user-name" value="{{$webs->title}}" name="title">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">站点关键词<span class="tpl-form-line-small-title">Keywords</span></label>
                            <div class="am-u-sm-9">
                                <input type="text"  value="{{$webs->keywords}}" name="keywords">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">站点描述<span class="tpl-form-line-small-title">Description</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" value="{{$webs->description}}" name="description">
                            </div>
                        </div>
                        
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">备案号<span class="tpl-form-line-small-title">ICP</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" value="{{$webs->icp}}" name="icp">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">公安备案号<span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" value="{{$webs->anbei}}" name="anbei">
                            </div>
                        </div>
                         <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">公司名称<span class="tpl-form-line-small-title">Company</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" value="{{$webs->company}}" name="company">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">公司Email<span class="tpl-form-line-small-title">Email</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" value="{{$webs->email}}" name="email">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">修改</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
