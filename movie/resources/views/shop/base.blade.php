<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>后台模板AdminLTE 2|Dashboard</title>
    <!-- 告诉浏览器响应屏幕宽度 -->

    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="{{asset('myadmin/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />    
    <!-- FontAwesome 4.3.0 -->
    <!--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />-->
    <link href="{{asset('myadmin/bootstrap/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <!--<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />-->   
    <link href="{{asset('myadmin/bootstrap/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />    
    <!-- Theme style -->
    <link href="{{asset('myadmin/dist/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="{{asset('myadmin/dist/css/skins/_all-skins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('myadmin/plugins/iCheck/flat/blue.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{asset('myadmin/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{asset('myadmin/plugins/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="{{asset('myadmin/plugins/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="{{asset('myadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}" rel="stylesheet" type="text/css" />
	<script src="{{asset('myadmin/assets/js/amazeui.min.js')}}"></script>
    <script src="{{asset('myadmin/assets/js/amazeui.datatables.min.js')}}"></script>
    <script src="{{asset('myadmin/layer-v3.0.3/layer/layer.js')}}"></script>
    <script src="{{asset('myadmin/assets/js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{asset('myadmin/assets/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('myadmin/assets/js/app.js')}}"></script>
	 <link rel="icon" type="image/png" href="{{asset('myadmin/assets/i/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('myadmin/assets/i/app-icon72x72@2x.png')}}">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <script src="{{asset('myadmin/assets/js/echarts.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('myadmin/assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('myadmin/assets/css/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('myadmin/assets/css/app.css')}}">
    <script src="{{asset('myadmin/assets/js/jquery.min.js')}}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="{{asset('myadmin/bootstrap/js/html5shiv.min.js')}}"></script>
        <script src="{{asset('myadmin/bootstrap/js/respond.min.js')}}"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- 对于侧边栏迷你50x50像素迷你标志 -->
          <span class="logo-mini"><b>A</b>LT</span>
          <!-- 正常状态和移动设备标识 -->
          <span class="logo-lg">网站后台管理</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">切换导航</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              <li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有4条短信</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('myadmin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"/>
                          </div>
                          <h4>
                            支持团队
                            <small><i class="fa fa-clock-o"></i> 5分钟</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li><!-- end message -->
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('myadmin/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            AdminLTE 设计团队
                            <small><i class="fa fa-clock-o"></i> 2小时</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('myadmin/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            开发商
                            <small><i class="fa fa-clock-o"></i> 今天</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('myadmin/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            卖场部
                            <small><i class="fa fa-clock-o"></i> 昨天</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="pull-left">
                            <img src="{{asset('myadmin/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="user image"/>
                          </div>
                          <h4>
                            审稿人
                            <small><i class="fa fa-clock-o"></i>2天</small>
                          </h4>
                          <p>为什么不买一个新的令人敬畏的主题？</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">看到所有的消息</a></li>
                </ul>
              </li>
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有10的通知</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-aqua"></i> 5名新成员加入了今天
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-warning text-yellow"></i> 很长的描述，可能不适合页面，可能导致设计问题
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-users text-red"></i> 5名新成员加入
                        </a>
                      </li>

                      <li>
                        <a href="#">
                          <i class="fa fa-shopping-cart text-green"></i> 25的盐。
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <i class="fa fa-user text-red"></i> 你改变你的用户名
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="#">查看所有</a></li>
                </ul>
              </li>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <span class="label label-danger">9</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">你有9个任务</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            设计一些按钮
                            <small class="pull-right">20%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">20% 完成</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            创造一个好的主题
                            <small class="pull-right">40%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% 完成</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            有些任务需要我去做
                            <small class="pull-right">60%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">60% 完成</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                           让美丽的转变
                            <small class="pull-right">80%</small>
                          </h3>
                          <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">80% 完成</span>
                            </div>
                          </div>
                        </a>
                      </li><!-- end task item -->
                    </ul>
                  </li>
                  <li class="footer">
                    <a href="#">查看所有任务</a>
                  </li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="{{asset('myadmin/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"/>
                  <span class="hidden-xs">{{session('adminuser')->name}}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="{{asset('myadmin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                    <p>
                     {{session('adminuser')->name}}-网站后台
            
                    </p>
                  </li>
                  <!-- Menu Body -->
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="/shop/information/{{session('adminuser')->id}}" class="btn btn-default btn-flat">完善信息</a>
                    </div>
                    <div class="pull-right">
                      <a href="{{url('shop/Logout')}}" class="btn btn-default btn-flat">签出</a>
                    </div>
                  </li>
                </ul>
              </li>
             
            </ul>
          </div>
        </nav>
      </header>
      
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('myadmin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>{{session('adminuser')->name}}</p>

              <a href="{{url('shop/Logout')}}"><i class="fa fa-circle text-success"></i>退出</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">主导航</li>
            <li class="active treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i> <span>商户信息</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                
                <li><a href="{{url('shop/hall')}}"><i class="fa fa-circle-o"></i>影厅信息</a></li>
				
                <li><a href="{{url('shop/projection')}}"><i class="fa fa-circle-o"></i>放映信息</a></li>
                <li><a href="{{url('shop/projection/create')}}"><i class="fa fa-circle-o"></i>添加放映信息</a></li>
                <li><a href="{{url('shop/layout')}}"><i class="fa fa-circle-o"></i>添加影厅</a></li>
                <li><a href="{{url('shop/orders')}}"><i class="fa fa-circle-o"></i>订单中心</a></li>
              </ul>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
         @section('content')
            这是页面主内容区。
          @show
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>版本</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed 工作室</a>.</strong> 保留所有权利.
      </footer>
      
      
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class='control-sidebar-bg'></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('myadmin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('myadmin/bootstrap/js/jquery-ui.min.js')}}" type="text/javascript"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      //$.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('myadmin/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>    
    <!-- Morris.js charts -->
    <script src="{{asset('myadmin/bootstrap/js/raphael-min.js')}}"></script>
    <script src="{{asset('myadmin/plugins/morris/morris.min.js')}}" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="{{asset('myadmin/plugins/sparkline/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('myadmin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}" type="text/javascript"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('myadmin/plugins/knob/jquery.knob.js')}}" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="{{asset('myadmin/bootstrap/js/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('myadmin/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="{{asset('myadmin/plugins/datepicker/bootstrap-datepicker.js')}}" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="{{asset('myadmin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="{{asset('myadmin/plugins/slimScroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
    <!-- FastClick -->
    <script src="{{asset('myadmin/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('myadmin/dist/js/app.min.js')}}" type="text/javascript"></script>    
    <!-- XDL-model-提示框 -->
    <script src="{{asset('myadmin/bootstrap/js/xdl-modal-alert-confirm.js')}}" type="text/javascript"></script> 
    
    <!-- AdminLTE 仪表板演示（这只是用于演示目的） -->
    <script src="{{asset('myadmin/dist/js/pages/dashboard.js')}}" type="text/javascript"></script>    
    
    <!-- AdminLTE 用于演示目的 -->
    <script src="{{asset('myadmin/ist/js/demo.js')}}" type="text/javascript"></script>
  </body>
</html>
