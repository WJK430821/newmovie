@extends('seller.base')
    @section('content')
<div class="grid_8">
    <div class="mws-panel">
        <div class="mws-panel-header">
            <span>编辑放映信息</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('/business/pro')}}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <div class="mws-form-inline">                                
                    <div class="mws-form-row">
                        <label class="mws-form-label">选择影片</label>
                        <div class="mws-form-item">
                            <select class="mws-select2 small" name="fid">
                                @foreach ($filmlist as $flist)
                                <option value="{{$flist->fid}}">{{$flist->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">选择放映厅</label>
                        <div class="mws-form-item">
                            <select class="mws-select2 small" style="width:30%;" name="hid">
                                @foreach ($halist as $ho)
                                <option value="{{$ho->id}}">{{$ho->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">价格</label>
                        <div class="mws-form-item">
                            ￥ <input type="text" class="large" style="width:15%;" name="price"> 元
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">放映时间</label>
                        <div class="mws-form-item">
                            <input type="datetime-local" class="large" style="width:20%;" name="starttime">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">结束时间</label>
                        <div class="mws-form-item">
                            <input type="datetime-local" class="large" style="width:20%;" name="endtime">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">座位信息</label>
                        <div class="mws-form-item">
                            <input type="text" class="large" style="width:50%;" name="seatinfo">
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="添加" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn ">
                </div>
            </form>
        </div>
    </div>
</div>
    @endsection