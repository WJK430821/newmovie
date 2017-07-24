@extends('admin.base')

    @section('content')
    <div class="row-content am-cf">
         <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">当前位置：影片管理>>添加影片</div>
                        <div class="widget-function am-fr">
                            
                        </div>
                    </div>
                    <div class="widget-body am-fr">

                        <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{url('admin/film/create')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">影片类型</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="fid" class="tpl-form-input"  placeholder="请填写影片类型">
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">影片名</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="title" class="tpl-form-input"  placeholder="请填写影片名">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">影片英文名</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="engname" class="tpl-form-input"  placeholder="请填写影片英文名">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">影片海报 </label>
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <button type="button" class="am-btn am-btn-danger am-btn-sm"">
                                                <i class="am-icon-cloud-upload"></i>
                                                 点击上传</button>
                                                <input name="picname" type="file">
                                            </div>
                                    </div>
                                    </div>
  
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">首映时间</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="firsttime" placeholder="请填写首映时间">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">影片时长</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="duration" placeholder="请填写影片时长">
                                </div>
                            </div>
                             <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">导演</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="director" placeholder="请填写导演">
                                </div>
                            </div>
                             <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">主演</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="actor" placeholder="请填写主演">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">区域</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="region" placeholder="请填写影片区域">
                                </div>
                            </div>
                            
                            <div class="am-form-group">
                                <label for="user-intro" class="am-u-sm-3 am-form-label">影片简介</label>
                                <div class="am-u-sm-9">
                                    <textarea class="" rows="10" name="introduction"  placeholder="请输入影片简介"></textarea>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">语言</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="language" placeholder="请填写影片语言">
                                </div>
                            </div>
                             <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">评分</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="score" placeholder="请填写影片评分">
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">状态</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="status" placeholder="请填写影片状态">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

