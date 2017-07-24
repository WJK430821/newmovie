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

                    <form class="am-form tpl-form-line-form" action="" method="post">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">站点标题 <span class="tpl-form-line-small-title">Title</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入标题文字">
                                <small>请填写标题文字10-20字左右。</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">站点关键词<span class="tpl-form-line-small-title">Keywords</span></label>
                            <div class="am-u-sm-9">
                                <input type="text"  placeholder="关键词">
                                <small>多个关键词用逗号(,)隔开</small>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">站点描述<span class="tpl-form-line-small-title">Description</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" placeholder="输入站点描述">
                            </div>
                        </div>
                        
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">备案号<span class="tpl-form-line-small-title">ICP</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" placeholder="icp备案号">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">公安备案号<span class="tpl-form-line-small-title"></span></label>
                            <div class="am-u-sm-9">
                                <input type="text" placeholder="公安备案号">
                            </div>
                        </div>
                         <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">公司名称<span class="tpl-form-line-small-title">Company</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" placeholder="公司名称">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">公司Email<span class="tpl-form-line-small-title">Email</span></label>
                            <div class="am-u-sm-9">
                                <input type="text" placeholder="公司Email">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
