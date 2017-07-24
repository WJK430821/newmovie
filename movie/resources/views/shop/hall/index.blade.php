@extends('shop.base')
	@section('content')
	<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            影厅信息输出表
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{url('shop')}}"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">影厅信息</a></li>
            <li class="active">影厅列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 商户影厅管理</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                     
                      <th>影厅名称</th>
                      <th>座位数</th>
                      <th>座位布局</th>
                      
                    </tr>
					@foreach ($hall as $vo)
					 <tr>
					
                      <td>{{ $vo->title }}</td>
                      <td>{{ $vo->sumnumber }}</td>
                      <td>{{ $vo->cowsnumber }}排{{ $vo->seatnumber }}列</td>
                      <td>
                     
                    </tr>

					@endforeach

                  </table>
                </div><!-- /.box-body -->
                {{ $hall->links() }}

              </div><!-- /.box -->
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
	
	@endsection