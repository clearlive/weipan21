<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:91:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\user\chongzhi.html";i:1529895948;s:82:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\head.html";i:1529895946;s:82:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\menu.html";i:1555567196;s:82:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\foot.html";i:1529895946;}*/ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/favicon.ico">

    <title>总后台管理系统</title>


 
    <link href="__ADMIN__/css/bootstrap-reset.css" rel="stylesheet">
   
    <link href="__ADMIN__/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="__ADMIN__/css/owl.carousel.css" type="text/css">

    <link href="__ADMIN__/gaiban/js/iCheck/skins/minimal/minimal.css" rel="stylesheet">
    <link href="__ADMIN__/gaiban/js/iCheck/skins/square/square.css" rel="stylesheet">
    <link href="__ADMIN__/gaiban/js/iCheck/skins/square/red.css" rel="stylesheet">
    <link href="__ADMIN__/gaiban/js/iCheck/skins/square/blue.css" rel="stylesheet">
	
    <!--不能删除-->
    <script src="__ADMIN__/js/jquery.js"></script>
    <script src="/static/layer/layer.js"></script>
    <!--不能删除-->
    

    <link href="__ADMIN__/gaiban/css/clndr.css" rel="stylesheet">

  
    <link rel="stylesheet" href="__ADMIN__/gaiban/js/morris-chart/morris.css">

  	<link href="__ADMIN__/gaiban/css/style.css" rel="stylesheet">
    <link href="__ADMIN__/gaiban/css/style-responsive.css" rel="stylesheet">
  

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="__ADMIN__/js/html5shiv.js"></script>
      <script src="__ADMIN__/js/respond.min.js"></script>
    <![endif]-->
   
    	
  </head>

  <body>

  <section>
     


<!-- left side start-->
    <div class="left-side sticky-left-side">

        <!--logo and iconic logo start-->
        <div class="logo" style="text-align: center;line-height: 50px;font-size: 2rem;color: #fff;">
            后台管理系统
        </div>

        <div class="logo-icon text-center">
            <a href="<?php echo Url('index/index'); ?>"><img src="/static/admin/gaiban/images/logo_icon.png" alt=""></a>
        </div>
        <!--logo and iconic logo end-->

        <div  id="sidebar"  class="left-side-inner">

            <!-- visible to small devices only -->
          

            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav">
              
                <li <?php if($actionname == 'index' && $contrname == 'Index'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/index/index'); ?>"><i class="fa fa-home"></i> <span>后台首页</span></a></li>
              	 <?php if($otype == 3): ?>
                <li class="menu-list <?php if($contrname == 'Goods'): ?>nav-active  <?php endif; ?>"  ><a href=""><i class="fa fa-laptop"></i> <span>产品管理</span></a>
                    <ul class="sub-menu-list">
                      
                        <li <?php if($actionname == 'prolist' || $actionname == 'proadd'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/goods/prolist'); ?>" >产品列表</a></li>
                        <li <?php if($actionname == 'risk'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/goods/risk'); ?>"> 风控管理</a></li>
                        <li <?php if($actionname == 'huishou'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/goods/huishou'); ?>"> 产品回收站</a></li>
                        <li <?php if($actionname == 'proclass'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/goods/proclass'); ?>"> 产品分类</a></li>

                    </ul>
                </li>
               <?php endif; ?>
              
                <li class="menu-list  <?php if($contrname == 'Order'): ?> nav-active<?php endif; ?> "><a href=""><i class="fa fa-book"></i> <span>订单管理</span></a>
                    <ul class="sub-menu-list">
                        <li <?php if($actionname == 'holdlist'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/order/holdlist'); ?>" > 持仓单控</a></li>
                        <li <?php if($actionname == 'orderlist'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/order/orderlist'); ?>" > 交易流水</a></li>
                        <li <?php if($actionname == 'orderlog'): ?> class="active" <?php endif; ?> ><a href="<?php echo Url('admin/order/orderlog'); ?>" > 平仓日志</a></li>
                    </ul>
                </li>
              
                <li class="menu-list <?php if($contrname == 'User' && ( in_array($actionname,array('userlist','useradd','userprice','userinfo','cash','myteam','chongzhi')) )): ?>nav-active  <?php endif; ?> "><a href=""><i class="fa fa-cogs"></i> <span>用户管理</span></a>
                    <ul class="sub-menu-list">
                        <li <?php if(in_array($actionname,array('userlist','useradd'))): ?>class="active" <?php endif; ?>><a href="<?php echo Url('admin/user/userlist'); ?>"> 客户列表</a></li>
                        <li <?php if(in_array($actionname,array('myteam'))): ?>class="active" <?php endif; ?>><a href="<?php echo Url('admin/user/myteam'); ?>" >我的团队</a></li>
                        <li <?php if($actionname == 'userprice'): ?> class="active"<?php endif; ?>><a href="<?php echo Url('admin/user/userprice'); ?>" > 充值列表</a></li>
                        <li <?php if($actionname == 'cash'): ?> class="active"<?php endif; ?>><a href="<?php echo Url('admin/user/cash'); ?>" > 提现列表</a></li>
                    <?php if($otype == 3): ?>
                        <li <?php if($actionname == 'chongzhi'): ?>class="active" <?php endif; ?>><a href="<?php echo Url('admin/user/chongzhi'); ?>"> 手动充值</a></li>
					 <?php endif; ?>
                    </ul>
                </li>


                <li class="menu-list <?php if($contrname == 'Price'): ?> nav-active <?php endif; ?>"><a href=""><i class="fa fa-envelope"></i> <span>报表管理</span></a>
                    <ul class="sub-menu-list">
                        <li <?php if($actionname == 'allot'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/price/allot'); ?>"  > 红利报表</a></li>
                        <li <?php if($actionname == 'yongjin'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/price/yongjin'); ?>"> 佣金报表</a></li>
                        <li <?php if($actionname == 'pricelist'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/price/pricelist'); ?>"> 资金报表</a></li>
                     	<li <?php if($actionname == 'myprice'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/price/myprice'); ?>"> 个人报表</a></li>
                    </ul>
                </li>
              
				<?php if($otype == 3): ?>
                <li class="menu-list  <?php if($contrname == 'Setup'): ?>nav-active <?php endif; ?>"><a href=""><i class="fa fa-tasks"></i> <span>系统设置</span></a>
                    <ul class="sub-menu-list">
                        <li <?php if($contrname == 'Setup' && $actionname == 'index'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/Setup/index'); ?>"> 基本设置</a></li>
                        <li <?php if($contrname == 'Setup' && $actionname == 'proportion'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/Setup/proportion'); ?>"> 参数设置</a></li>
                    </ul>
                </li>
              
                <li class="menu-list <?php if($contrname == 'System'): ?>nav-active <?php endif; ?>"><a href=""><i class="fa fa-bar-chart-o"></i> <span>配置设置</span></a>
                    <ul class="sub-menu-list">
                        <!--li <?php if($actionname == 'adminadd'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/system/adminadd'); ?>"> 添加管理员</a></li-->
                        <li <?php if($actionname == 'adminlist'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/system/adminlist'); ?>"> 管理员列表</a></li>
                        <li <?php if($actionname == 'banks'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/system/banks'); ?>"> 提现银行卡</a></li>
                        <li <?php if($actionname == 'recharge' || $actionname ==  'addrech'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/system/recharge'); ?>">充值通道</a></li>
                        <li <?php if($actionname == 'rechargeRate'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/system/rechargeRate'); ?>">充值转换比率</a></li>
                        <li <?php if($contrname == 'Setup' && $actionname == 'addsetup'): ?> class="active" <?php endif; ?>><a  href="<?php echo Url('admin/Setup/addsetup'); ?>">添加配置</a></li>
                        <li <?php if($contrname == 'Setup' && $actionname == 'deploy'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/Setup/deploy'); ?>">配置列表</a></li>
                      	<!--li <?php if($actionname == 'setwx'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/system/setwx'); ?>"> 微信设置</a></li-->
                        <li <?php if($actionname == 'dbbase'): ?> class="active" <?php endif; ?>><a href="<?php echo Url('admin/system/dbbase'); ?>"> 数据备份</a></li>
                    </ul>
                </li>
               <?php endif; ?>
              
             
                <li><a href="<?php echo Url('admin/login/logout'); ?>"><i class="fa fa-sign-in"></i> <span>退出</span></a></li>

            </ul>
            <!--sidebar nav end-->

        </div>
    </div>
    <!-- left side end-->
   

 <!-- Modal -->
                                    

   
    <!-- 左侧头部开始-->
    <div class="main-content" >

        <!-- header section start-->
        <div class="header-section">

            <!--收起左侧导航开始-->
            <a class="toggle-btn"><i class="fa fa-bars"></i></a>
            <!--收起左侧导航结束-->
            <!--右侧开始 -->
            <div class="menu-right">
                <ul class="notification-menu">
                    <li>
                       <div class="text-center " style="margin-top: 0.7rem;margin-right: 1rem;">
							<a  href="<?php echo url('index/deldirall'); ?>" data-toggle="modal" class="btn btn-success">    清除缓存</a>
                      </div>
                       
                    </li>          			
                  <?php if(isset($_SESSION['username'])): ?>
                    <li>
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            <img src="/static/admin/gaiban/images/photos/user-avatar.png" alt="" />
                            <?php echo !empty($_SESSION['username'])?$_SESSION['username']:''; ?>
                            <span class="caret"></span>
                        </a>
                      
                        <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                            <li><a href="<?php echo Url('system/adminlist'); ?>"><i class="fa fa-user"></i>  管理员列表</a></li>
                            <li><a href="<?php echo Url('setup/index'); ?>"><i class="fa fa-cog"></i>  基本设置</a></li>
                            <li><a href="<?php echo Url('login/logout'); ?>"><i class="fa fa-sign-out"></i> 退出</a></li>
                        
                        </ul>
                      
                    </li>
				<?php endif; ?>
                </ul>
            </div>
            <!--右侧开结束 -->

        </div>
        <!-- 左侧头部结束-->
    



   <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row state-overview">
                <div class="container">
                <form id="formid" action="<?php echo url('user/userlist'); ?>" method="post">
                <div class="row">
                     <div class="col-lg-3 mar-10">
                      <div class="input-group">
                              <span class="input-group-addon">手机号</span>
                              <input type="text" value="" placeholder="请输入用户手机号" name="utel" class="form-control">
                          </div>
                      </div>
                      <div class="col-lg-5 mar-10">

                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">充值金额</span>
                            <input type="text"  value=""  class="form-control" name="bpprice" placeholder="请输入充值金额"/>
                        </div>
                      </div>

                      
                  <div class="mar-10">
                   <input type="submit" onclick="return editcon(this.form)" class="btn btn-success" value="提交">
                  </div>
                </div>
                </form>
              </div>
              
                 
              
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>



</section>
<!-- Placed js at the end of the document so the pages load faster -->
<script src="__ADMIN__/gaiban/js/jquery-1.10.2.min.js"></script>
<script src="__ADMIN__/gaiban/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="__ADMIN__/gaiban/js/bootstrap.min.js"></script>
<script src="__ADMIN__/gaiban/js/modernizr.min.js"></script>
<script src="__ADMIN__/gaiban/js/jquery.nicescroll.js"></script>
<!--easy pie chart-->
<script src="__ADMIN__/gaiban/js/easypiechart/jquery.easypiechart.js"></script>
<script src="__ADMIN__/gaiban/js/easypiechart/easypiechart-init.js"></script>
<!--1111-->
<script src="__ADMIN__/gaiban/js/function.js"></script>
<!--1111-->

<!--common scripts for all pages-->
<script src="__ADMIN__/gaiban/js/scripts.js"></script>


  </body>
</html>
<script>
  function editcon(form){
    
    var utel = form.utel.value;
    var bpprice = form.bpprice.value;

 
    if(!utel){layer.msg('请输入用户手机号'); return false;}
    if(!bpprice){layer.msg('请输入充值金额'); return false;}
    
    var formurl = "<?php echo Url('user/addprice'); ?>";
      var data = $('#formid').serialize();
      var locurl = "<?php echo Url('user/userprice'); ?>";

      WPpost(formurl,data,locurl);

      return false;
  }
</script>

