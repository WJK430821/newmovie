@extends('shop.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			添加影厅信息
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('shop')}}"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li class="active">添加影厅信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加影厅信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('shop/store')}}" method="post" class="form-horizontal">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">影厅名称：</label>
                      <div class="col-sm-4">
                      <input type="text" class="form-control" id="inputPassword3" placeholder="影厅名称" name="title">
                      </div>
                    </div>
				      	<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">座位数量：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="座位数量" name="number">
                      </div>
                    </div>
					     <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">座位布局：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" placeholder="座位布局" name="layout">
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