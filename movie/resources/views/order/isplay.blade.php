@extends('home.base')
@section('content')

    <center>
       <div style="margin-top: 200px;height: 205px;">
           <form action="" method="post" name="myform">
               {{csrf_field()}}
                尊敬的：<input style="border:0px" size=10 type="text" name="name" readonly value="{{session("users")->phone}}"/>用户，
               您当前的余额为：<input style="border:0px" size=3 type="text" name="money"  readonly value="{{$money}}"/>元，
               需支付：<input style="border:0px" size=2 type="text" name="totalprice" readonly value="{{session("totalprice")}}"/>元<br/>
               <button type="button" class="btn btn-success" onclick="doSubmit()">确认并支付</button>
               <button type="button" class="btn btn-info" onclick="javascript:window.history.back()">返回</button>
           </form>
        </div>
    </center>

@endsection
<script>
    function doSubmit(){
        document.myform.action="/order/pay";
        document.myform.submit();
    }
</script>