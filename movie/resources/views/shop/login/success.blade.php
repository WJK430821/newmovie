<script>
    var cnt = 10;
    function lod(){
        if(cnt < 0){
            window.location.href = "/shop/login";
        }else{
            document.getElementById("showTime").innerHTML = "注册成功待审核请注意短息查收关注审核结果" + cnt + "</font>秒后跳转到登录页面";
            cnt--;
        }
        setTimeout("lod()",1000);
    }
</script>
<body onload="lod()">
<div id="showTime"></div>
</body>