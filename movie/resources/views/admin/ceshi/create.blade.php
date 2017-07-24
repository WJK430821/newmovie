@extends('admin.base')

    @section('content')
    <div class="row-content am-cf">
         <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    
                    <div class="widget-body am-fr">

                        <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{url('admin/ceshi/doUpload')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         
                                  
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">上传图片 </label>
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">
                                                <button type="button" class="am-btn am-btn-danger am-btn-sm"">
                                                <i class="am-icon-cloud-upload"></i>
                                                 选择图片</button>
                                                <input name="picname" type="file">
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

