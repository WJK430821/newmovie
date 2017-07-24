@extends('shop.base')
@section('content')
     {{--加载选坐插件的样式--}}
<script src="{{asset('myadmin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        <i class="fa fa-calendar"></i>
        添加布局信息
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('shop')}}"><i class="fa fa-dashboard"></i> 首页</a></li>
        <li class="active">添加布局信息</li>
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
                    <h3 class="box-title"><i class="fa fa-plus"></i> 添加布局信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('shop/store')}}" method="post" class="form-horizontal">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" id="layoutid" name="layout" >
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">影厅名称：</label>
                            <div class="col-sm-4">
                                <input type="text" required name="title" class="form-control"  placeholder="布局名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">座位排数：</label>
                            <div class="col-sm-4">
                                <input type="number" required min="1" value="" name="cowsnumber" class="form-control"  placeholder="座位排数">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">座位数量：</label>
                            <div class="col-sm-4">
                                <input type="number" min="1" required max="18" name="seatnumber" value="" class="form-control" placeholder="每排座位数量">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">座位布局：</label>
                            <div class="col-sm-4">
                                <button name="editLayoutButton"  type="button" onclick="editlayout()" class="btn btn-primary"  data-toggle="modal" data-target="#myModal">编辑布局</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">座位数量：</label>
                            <div class="col-sm-4">
                                <input type="text"  readonly name="allnumber"  class="form-control" id="sumseat" placeholder="座位数量">
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="col-sm-offset-2 col-sm-1">
                            <button onclick="sendAjax()" class="btn btn-primary">添加</button>
                        </div>
                        <div class="col-sm-1">
                            <button type="reset" class="btn btn-primary">重置</button>
                        </div>
                    </div><!-- /.box-footer -->
                </form>
                <div class="row"><div class="col-sm-12">&nbsp;</div></div>
            </div><!-- /.box -->

            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" data-toggle='popover' role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">编辑走廊</h4>
                        </div>
                        <center>
                        <div class="modal-body" >

                        </div>
                        </center>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
    <button class="aaaa" style="display: none"></button>
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
     <script>
         //座位列数
         var cowsnumber  = $('input[name=cowsnumber]').val();
         //座位数量
         var seatnumber  = $('input[name=seatnumber]').val();
         //console.log(cowsnumber,seatnumber);
         //当点击时获取座位数量和行数进行遍历
         sumnumber = null
         var reapt = false
         var seatarr = {};//new Array(cowsnumber);

         function  editlayout( ) {
             var cowsnumber = parseInt($('input[name=cowsnumber]').val());
             //座位数量
             var seatnumber = parseInt($('input[name=seatnumber]').val());
             //循环列数进行添加
             sumnumber = parseInt(cowsnumber*seatnumber);

//             console.log('--length----', seatarr);

             for (var i = 0; i < cowsnumber; i++) {
                 if (!reapt) {
                 seatarr[i] = [];
                     var aa = $('.modal-body').eq(0).append('<ol value='+(i+1)+' class="bb"></ol>');
                 for (let j = 0; j < seatnumber; j++) {
                     seatarr[i].push('a');
                 }
                 }
         }
             if(!reapt){
                 for(let g=0;g<seatnumber;g++){
                     $('.bb').append('<button class="seatbutton">'+(g+1)+'</button>');
                 }
             }
                 reapt = true
         }
         $('.modal-body').on('click','.seatbutton', function() {

             $(this).css('visibility','hidden');//('display','null');
             _this = $(this);
             // console.log($(this).html());

             $.each(seatarr, function(index, value) {

                 var number =  _this.parent('ol').attr('value')
                 console.log(' $(this).parent().val()', _this.parent('ol').attr('value'))
                 if((number-1)==index){
                     value[(_this.html()-1)] = '_';
                     sumnumber --;
                     //console.log('aaaaa',sumnumber);
                     //console.log('-----',seatarr);
                     $('#sumseat').val(sumnumber);
                     $('#layoutid').val(JSON.stringify(seatarr));// = seatarr;
                     return seatarr;

                 }
             });
         });


         //console.log('seatarr',seatarr);
     </script>

@endsection