@extends('shop.base')
	@section('content')
	<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            放映信息输出表
            
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
               
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                 
                      <th>放映厅</th>
                      <th>影片</th>
                      <th>影片类型</th>
                      <th>语言版本</th>
                      <th>放映时间</th>
                      <th>结束时间</th>
                      <th>价格</th>
                      <th>座位信息</th>
                      <th style="width: 100px">操作</th>
                    </tr>
					     @foreach($list as $key=> $vo)
					           <tr>
                    
                     <td><?php echo $ho[$key]; ?></td>
                     <td><?php echo $fo[$key]; ?></td> 
                     <td><?php echo $fid[$key]; ?></td> 
                     <td><?php echo $language[$key]; ?></td> 
                     <td>{{ $vo->datetime }}</td>
                     <td>{{ $vo->endtime }}</td>
                     <td>{{ $vo->price }}</td>
                     <td>{{ $vo->seatinfo }}</td>
                      <td> 
                      <a class="btn btn-xs btn-primary" href="{{url('shop/projection')}}/{{$vo->id}}/edit">编辑</a> </td>
                    </tr>
					     @endforeach
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
	
	@endsection