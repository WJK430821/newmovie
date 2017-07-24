@extends('shop.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			商家信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">商家信息管理</a></li>
            <li class="active">商家编辑信息</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
               
                <!-- form start -->
                <form class="form-horizontal" action="{{URL('shop')}}/{{ $vo->id }}/edit" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">商家名称</label>
                      <div class="col-sm-4">
                        <input type="text" name="shopname" class="form-control" value="{{ $vo->shopname }}">
                      </div>
                    </div>
                  </div>
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">手机</label>
                      <div class="col-sm-4">
                        <input type="text" name="phone" class="form-control" value="{{ $vo->phone }}">
                      </div>
                    </div>
                  </div>
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">法人代表</label>
                      <div class="col-sm-4">
                        <input type="text" name="legal" class="form-control" value="{{ $vo->legal }}">
                      </div>
                    </div>
                  </div><
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">身份证号</label>
                      <div class="col-sm-4">
                        <input type="text" name="id_card" class="form-control" value="{{ $vo->id_card }}">
                      </div>
                    </div>
                  </div><
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">营业执照</label>
                      <div class="col-sm-4">

                        <input type="file" name="licence" class="form-control" value="{{ $vo->licence }}">
                      </div>
                    </div>
                  </div><<!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">保存</button>
                    </div>
					<div class="col-sm-1">
						<button type="submit" class="btn btn-primary">重置</button>
					</div>
                  </div><!-- /.box-footer -->
                </form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
				
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
  