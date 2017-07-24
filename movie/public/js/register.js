function doSubmit(){
    return checkPhone() &&  checkPassword() && checkPassword2();
}
//判断用户名是否合法
function checkPhone(){
    //获取用户输入的信息
    var phone = document.myform.phone.value;
    $("input[name='phone']").nextAll("span").remove();
    //判断用户是否合法
    if(phone.match(/^1[34578]\d{9}$/)==null){
        $("<span style='color:red;'>用户名不合法请重新输入</span>").insertAfter("input[name='phone']");
        return false;
    }
    //执行ajax判断
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url:"/reg/doLogin",
        type:"post",
        data:"phone="+phone,
        datatype:"text",
        success:function(data){
            if(data==1){
                $("<span style='color:red;'>您输入的用户名"+phone+"已存在</span>").insertAfter("input[name='phone']");
                document.myform.phone.value = "";
                return false;
            }
            if(data==2){
                $("<span style='color:red;'>用户名不可用</span>").insertAfter("input[name='phone']");
                return false;
            }else{
                $("<span style='color:green;'>用户名可用</span>").insertAfter("input[name='phone']");
            }
        }
    });
    return true;
}
//密码验证
function checkPassword(){
    //获取用户的输入密码
    var password = document.myform.password.value;
    $("input[name='password']").nextAll('span').remove();
    if(password==""){
        $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='password']");
        return false
    }
    if(password.match(/^[A-Za-z0-9_]{6,20}$/)==null){
        $("<span style='color:red'>密码不合法请重新输入</span>").insertAfter("input[name='password']");
        return false;
    }else{
        $("<span style='color:green'>可用</span>").insertAfter("input[name='password']");
    }

    return true;
}
//确认密码验证
function checkPassword2()
{
    //获取确认密码
    var password2 = document.myform.password2.value;
    var password = document.myform.password.value;
    $("input[name='password2']").nextAll("span").remove();
    if(password2 != password){
        $("<span style='color:red'>两次密码不一致请重新输入</span>").insertAfter("input[name='password2']");
        document.myform.password2.value ="";
        return false;
    }else{
        $("<span style='color:green'>密码一致</span>").insertAfter("input[name='password2']");
        return true;
    }
    if(password2==""){
        $("<span style='color:red'>密码不能为空</span>").insertAfter("input[name='password2']");
        return false
    }
    return true;
}