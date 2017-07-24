@extends('admin.base')

    @section('content')
    <div class="row-content am-cf">
         <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">当前位置：影片管理>>修改影片</div>
                        <div class="widget-function am-fr">
                            
                        </div>
                    </div>
                    <div class="widget-body am-fr">

                            <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{url('admin/film/update')}}/{{$str->id}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">影片类型</label>
                                <div class="am-u-sm-9">
                                    <input type="text" name="fid" class="tpl-form-input" value="{{$str->fid}}">
                                </div>
                            </div>

                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">影片名</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="title" class="tpl-form-input"  value="{{$str->title}}">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">影片英文名</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="engname" class="tpl-form-input"  value="{{$str->engname}}">
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
                                            <input type="text" name="firsttime" value="{{$str->firsttime}}">
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">影片时长</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="duration" value="{{$str->duration}}">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label">导演</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="director" value="{{$str->director}}">
                                    </div>
                                    </div>
                                    <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label">主演</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" name="actor" value="{{$str->actor}}">
                                    </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">区域</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="region" value="{{$str->region}}">
                                        </div>
                                    </div>
                            
                                    <div class="am-form-group">
                                        <label for="user-intro" class="am-u-sm-3 am-form-label">影片简介</label>
                                        <div class="am-u-sm-9">
                                            <textarea class="" rows="10" name="introduction">{{$str->introduction}}</textarea>
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">语言</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="language" value="{{$str->language}}">
                                        </div>
                                    </div>
                                     <div class="am-form-group">
                                        <label class="am-u-sm-3 am-form-label">评分</label>
                                        <div class="am-u-sm-9">
                                            <input type="text" name="score" value="{{$str->score}}">
                                        </div>
                                    </div>
                                    <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">状态</label>
                                <div class="am-u-sm-9">
                                    <input type="radio" name="status" value="1" @if($str->status==1) checked @endif > 即将上映
                                </div>
                                <div class="am-u-sm-9">
                                    <input type="radio" name="status" value="2" @if($str->status==2) checked @endif>
                                    正在热映
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

