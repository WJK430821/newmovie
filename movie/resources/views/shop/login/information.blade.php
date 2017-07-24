<!DOCTYPE html>
<html lang="zh">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

    
    <meta name="language" content="zh">
    
    
    
        <title>企业经营信息</title>
<script src="{{asset('public/js/jquery.min.js')}}"></script>


<link media="all" href="{{asset('myadmin/css/index.css')}}" type="text/css" rel="stylesheet">
</head>
<body>
<!--头部-->
<div class="bus-head">
    
    <h1 class="name yahei bus_icobg " >商家入驻</h1>
</div>

<div class="bus-box clearfix">
<!--协议-->
    <div class="clearfix">
       
        <div id="content">
	<div class="manage clearfix">
<div class="box">
<form id="company-form" action="/shop/information/upload" method="post" name="myform" enctype="multipart/form-data">        
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <dl class="clearfix">
        <dt>企业名称<font>*</font></dt>
        <dd><input class="txt" name="shopname" id="Company_name" maxlength="111" value="" type="text"></dd>
        <dd class="error"></dd>
    </dl>
    <dl class="clearfix">
        <dt>影院图片<font> </font></dt>
        <dd><input class="txt" name="picname" id="Company_license_valid" value="" type="file"></dd>
        <dd class="error"></dd>
    </dl>


    <dl class="clearfix">
        <dt>所在地 <font>*</font></dt>
        <dd>
        <select name="city" id="pro" onchange="change();">
            <option value="">请选择省份</option>
            <option value="1">北京市</option>
            <option value="2">河北省</option>   
            <option value="3">天津市</option>
            
</select>
<select name="region" id="city"></select><script>
function change() {
    var map = ['', ['朝阳区', '海淀区', '通州区', '房山区', '丰台区', '昌平区', '大兴区', '顺义区', '西城区', '石景山区'],

         ['石家庄市', '唐山市', '保定市', '邯郸市', '邢台市', '河北区', '沧州市', '秦皇岛市', '张家口市', '衡水市', '廊坊市', '承德市'],


        ['和平区', '北辰区', '河北区', '河西区', '西青区', '津南区', '东丽区', '武清区', '宝坻区', '红桥区', '大港区', '汉沽区', '静海县', '塘沽区']
        ];
    var pro = document.getElementById('pro');
    var city = document.getElementById('city');
    var citys = map[pro.value];
    for (var i = 0, len = citys.length, str = ''; i < len; i++) {
        str = str + '<option>' + citys[i] + '</option>';
    }
    city.innerHTML = str;
    }</script>
    </dd>
        <dd class="error"></dd>
    </dl>
    <dl class="clearfix">
        <dt>地址<font>*</font></dt>
        <dd><input class="txt" name="address" id="Company_office_address" maxlength="111" value="" type="text"></dd>
        <dd class="error"></dd>
    </dl>

    <dl class="clearfix">
        <dt>电话<font>*</font></dt>
        <dd><input class="txt" name="phone" id="Company_telephone" maxlength="111" value="" type="text"></dd>
        <dd class="error"></dd>
    </dl>

    <dl class="clearfix">
        <dt>法人姓名<font>*</font></dt>
        <dd><input class="txt" name="legal" id="Company_legal_person_name" maxlength="111" value="" type="text"></dd>
        <dd class="error"></dd>
    </dl>

    <dl class="clearfix">
        <dt>身份证号码<font>*</font></dt>
        <dd><input class="txt" name="id_card" id="Company_legal_person_papers_code" maxlength="111" value="" type="text"></dd>
        <dd class="error"></dd>
    </dl>

    <dl class="clearfix">
        <dt>营业执照<font> </font></dt>
        <dd><input class="txt" name="licence" id="Company_license_valid" value="" type="file"></dd>
        <dd class="error"></dd>
    </dl>


    <div class="btm"><button type="submit" class="bus_btnbg" id="companysubmit">保存并下一步</button></div>
</form></div>
</div>
</div><!-- content -->
    </div>
</div>
<!--网站底部-->
<!--运营商-->
<div class="btm_foot">猫眼电影商家入驻</div>
<!--底部连接-->

</body>
</html>
