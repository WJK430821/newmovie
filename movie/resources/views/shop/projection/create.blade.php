@extends('shop.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			添加放映信息信息
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('shop')}}"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li class="active">添加放映信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('shop/projection/store')}}" method="post" class="form-horizontal">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">影厅名称：</label>
                      <div class="col-sm-4">
                      <select name="hall" class="form-control" id="inputEmail3">
                         @foreach($hall as $ho)
                          <option>{{$ho->title}}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>
				      	<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">影片信息</label>
                      <div class="col-sm-4">
                       <select name="film" class="form-control" id="inputEmail3">
                         @foreach($film as $fo)
                          <option>{{$fo->title}}</option>
                          @endforeach
                      </select>
                      </div>
                    </div>
					     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">座位信息：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="座位数量" name="seatinfo">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">价格：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="票价" name="price">
                      </div>
                    </div>
                     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">放映时间：</label>
                      <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" id="inputPassword3"  name="datetime">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">结束时间：</label>
                      <div class="col-sm-4">
                        <input type="datetime-local" class="form-control" id="inputPassword3"  name="endtime">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">添加</button>
                    </div>
					<div class="col-sm-1">
						<button type="submit" class="btn btn-primary">重置</button>
					</div>
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
              </div><!-- /.box -->
       
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
    @endsection