<script src="{{asset('/js/jQuery-1.8.3.min.js')}}" type="text/javascript"></script>
@extends('admin.base')
@section("content")

    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">当前位置：修改管理员密码</div>
                        <div class="widget-function am-fr">

                        </div>
                    </div>
                    <div class="widget-body am-fr">
                        <form action="/admin/pass/update" method="post" onsubmit=" return doSubmit()" name="myform">
                            {{ csrf_field() }}
                            <center>
                            @if(session('msg'))
                                <div style="color:red">{{ session('msg') }}</div>
                            @endif
                            </center>
                            <table style="width:600px;margin: 0px auto;" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                    <tr>
                                        <td>账号：</td>
                                        <td><input size= "30" value="{{ session("admin")->account }}" style="border:0px" type="text" name="account" readonly/></td>
                                    </tr>
                                    <tr>
                                        <td>原密码：</td>
                                        <td><input size= "30" type="password" name="rpass"  ></td>
                                    </tr>
                                    <tr>
                                        <td>新密码：</td>
                                        <td><input size= "30" type="password" name="pass" placeholder="由6到16位的数字，字母，下划线组成" onblur="checkPass()"></td>
                                    </tr>
                                    <tr>
                                        <td>确认密码：</td>
                                        <td><input size= "30" type="password" name="pass2" placeholder="" onblur="checkPass2()"></td>
                                    </tr>
                                    <tr >
                                        <td colspan="2" align="center">
                                            <input type="submit" value="修改"/>
                                            <input type="reset"/>
                                        </td>
                                    </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    function doSubmit(){
        return  checkPass() && checkPass2() ;
    }
    //密码验证
    function checkPass(){
        var pass = window.myform.pass.value;
        $("input[name='pass']").nextAll("span").remove();
        if(pass == ""){
            $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='pass']");
            return false;
        }
        if(pass.match(/^[a-zA-Z0-9_]{6,15}$/)==null){
            $("<span style='color:red'>密码不符合规定</span>").insertAfter("input[name='pass']");
            return false;
        }
    }
    //二次密码验证
    function checkPass2(){
        var pass = window.myform.pass.value;
        var pass2 = window.myform.pass2.value;
        $("input[name='pass2']").nextAll("span").remove();
        if(pass2 == ""){
            $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='pass2']");
            return false;
        }
        if(pass2 != pass){
            $("<span style='color:red'>密码不一致</span>").insertAfter("input[name='pass2']");
            return false;
        }
    }
</script>