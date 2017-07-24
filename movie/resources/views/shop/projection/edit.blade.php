@extends('shop.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">信息管理</a></li>
            <li class="active">编辑信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i> 编辑学员信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{url('shop/projection')}}/{{$prolist->id}}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3"  class="col-sm-2 control-label">放映厅</label>
                     <div class="col-sm-4">
                      <select name="title" class="form-control"  id="inputEmail3">
                         @foreach ($halist as $ho)
                          <option @if ($prolist->hid == $ho->id) selected @endif>{{$ho->title}}</option>
                         @endforeach
                      </select>
                    </div>
                    </div>
					           <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">影片</label>
                      <div class="col-sm-4">
                        <select name="film" class="form-control"  id="inputEmail3">
                         @foreach ($film as $fo)
                          <option  @if ($prolist->fid == $fo->id) selected @endif>{{$fo->title}}</option>
                         @endforeach
                      </select>
                      </div>
                    </div>
					         <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">放映时间</label>
                      <div class="col-sm-4">
                        <input type="datetime-local" name="datetime" class="form-control" value="{{$prolist->datetime}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">结束时间</label>
                      <div class="col-sm-4">
                        <input type="datetime-local" name="datetime" class="form-control" value="{{$prolist->datetime}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">价格</label>
                      <div class="col-sm-4">
                        <input type="text" name="price" class="form-control" value="{{$prolist->price}}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">座位信息</label>
                      <div class="col-sm-4">
                        <input type="text" name="seatinfo" class="form-control" value="{{$prolist->seatinfo}}">
                      </div>
                    </div>
					
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">保存</button>
                    </div>
					
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
				<div class="row"><div class="col-sm-12">
                <br/>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                </div></div>
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
  