<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="{{asset('seller/plugins/colorpicker/colorpicker.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{asset('seller/custom-plugins/wizard/wizard.css')}}" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="{{asset('seller/bootstrap/css/bootstrap.min.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{asset('seller/css/fonts/ptsans/stylesheet.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{asset('seller/css/fonts/icomoon/style.css')}}" media="screen">

<link rel="stylesheet" type="text/css" href="{{asset('seller/css/mws-style.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{asset('seller/css/icons/icol16.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{asset('seller/css/table.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{asset('seller/css/panels.css')}}" media="screen">

<link rel="stylesheet" type="text/css" href="{{asset('seller/css/icons/icol32.css')}}" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="{{asset('seller/css/demo.css')}}" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="{{asset('seller/jui/css/jquery.ui.all.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{asset('seller/jui/jquery-ui.custom.css')}}" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="{{asset('seller/css/mws-theme.css')}}" media="screen">
<link rel="stylesheet" type="text/css" href="{{asset('seller/css/themer.css')}}" media="screen">

<title>熊猫电影--商户管理中心</title>

</head>

<body>


	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<img src="{{asset('seller/images/mws-logo.png')}}" alt="mws admin')}}">
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
                
            <!-- Messages -->
            <div id="mws-user-message" class="mws-dropdown-menu">
            	<a href="#" data-toggle="dropdown" class="mws-dropdown-trigger"><i class="icon-envelope"></i></a>
                
                <!-- Unred messages count -->
                <span class="mws-dropdown-notif">35</span>
                
                <!-- Messages dropdown -->
                <div class="mws-dropdown-box">
                	<div class="mws-dropdown-content">
                        <ul class="mws-messages">
                        	<li class="read">
                            	<a href="#">
                                    <span class="sender">John Doe</span>
                                    <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                    <span class="time">
                                        January 21, 2012
                                    </span>
                                </a>
                            </li>
         
                        </ul>
                        <div class="mws-dropdown-viewall">
	                        <a href="#">站内信</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset">
            
            	<!-- User Photo -->
            	<div id="mws-user-photo">
                	<img src="{{asset('seller/example/profile.jpg')}}" alt="User Photo">
                </div>
                
                <!-- Username and Functions -->
                <div id="mws-user-functions">
                    <!-- <div id="mws-username">
                        Hello, 
                    </div> -->
                    <ul>
                        <li><a href="{{url('business/change')}}">修改密码</a></li>
                        <li><a href="{{url('business/logout')}}">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    <li class="active"><a href="/business"><i class="icon-home"></i>商家主页</a></li>
    
                    <li>
                        <a><i class="icon-movie"></i>放映厅管理</a>
                        <ul>
                            <li><a href="{{url('business/hall')}}">浏览放映厅</a></li>
                            <li><a href="{{url('business/hall/create')}}">添加放映厅</a></li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="icon-film"></i>放映信息管理</a>
                        <ul>
                            <li><a href="{{url('business/pro')}}">浏览放映信息</a></li>
                            <li><a href="{{url('business/pro/create')}}">添加放映信息</a></li>
                        </ul>
                    </li>
                    <li><a href="{{url('business/order')}}"><i class="icon-user"></i>商家信息管理</a></li>
                    <li><a href="{{url('business/order')}}"><i class="icon-table"></i> 订单管理</a></li>
                    
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            	 @section('content')
                    这是页面主内容区。
                @show
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
            <div id="mws-footer">
            	Copyright 熊猫电影 2017. All Rights Reserved.
            </div>
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="{{asset('seller/js/libs/jquery-1.8.3.min.js')}}"></script>
    <script src="{{asset('seller/js/libs/jquery.mousewheel.min.js')}}"></script>
    <script src="{{asset('seller/js/libs/jquery.placeholder.min.js')}}"></script>
    <script src="{{asset('seller/custom-plugins/fileinput.js')}}"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="{{asset('seller/jui/js/jquery-ui-1.9.2.min.js')}}"></script>
    <script src="{{asset('seller/jui/jquery-ui.custom.min.js')}}"></script>
    <script src="{{asset('seller/jui/js/jquery.ui.touch-punch.js')}}"></script>

    <!-- Plugin Scripts -->
    <script src="{{asset('seller/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <!--[if lt IE 9]>
    <script src="js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="{{asset('seller/plugins/flot/jquery.flot.min.js')}}"></script>
    <script src="{{asset('seller/plugins/flot/plugins/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('seller/plugins/flot/plugins/jquery.flot.pie.min.js')}}"></script>
    <script src="{{asset('seller/plugins/flot/plugins/jquery.flot.stack.min.js')}}"></script>
    <script src="{{asset('seller/plugins/flot/plugins/jquery.flot.resize.min.js')}}"></script>
    <script src="{{asset('seller/plugins/colorpicker/colorpicker-min.js')}}"></script>
    <script src="{{asset('seller/plugins/validate/jquery.validate-min.js')}}"></script>
    <script src="{{asset('seller/custom-plugins/wizard/wizard.min.js')}}"></script>

    <!-- Core Script -->
    <script src="{{asset('seller/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('seller/js/core/mws.js')}}"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="{{asset('seller/js/core/themer.js')}}"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="{{asset('seller/js/demo/demo.dashboard.js')}}"></script>
    <script src="{{asset('seller/js/demo/demo.table.js')}}"></script>
</body>
</html>