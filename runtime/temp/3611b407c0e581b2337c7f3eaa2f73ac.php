<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:93:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\order\orderlist.html";i:1555503037;s:82:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\head.html";i:1529895946;s:82:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\menu.html";i:1555567196;s:82:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\foot.html";i:1529895946;}*/ ?>
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
    
<!--pickers css-->




  <link rel="stylesheet" type="text/css" href="__ADMIN__/gaiban/js/bootstrap-datetimepicker/css/datetimepicker-custom.css" />





<section class="wrapper">
        <!-- page start-->
   <!--body wrapper start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        订单管理
                    </header>
                    <div class="panel-body">
                        <form role="form" action="" method="get">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="row">
                                        	<div class="col-lg-3">
                                              <div class="input-group m-bot15">
                                              <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">代理名称</button>
                                              </span>
                                                <input type="text" class="form-control"   name="orderid"  value="<?php echo !empty($getdata['oid'])?$getdata['oid']:''; ?>" placeholder="输入订单编号/订单id"/>
                                            </div>
                                            </div>
                                            <div class="col-lg-3 container-fluid">
                                               
                                              
                                              	<div class="input-group m-bot15 ">
                                              <span class="input-group-btn "     style="width: 26%;">
                                                	
                                                <select class="form-control m-bot15"  >
                                                         <option <?php if(isset($getdata['stype']) && $getdata['stype'] == 1): ?> selected="selected" <?php endif; ?> value="1">客户</option>
                                                          <option <?php if(isset($getdata['stype']) && $getdata['stype'] == 2): ?> selected="selected" <?php endif; ?>  value="2" >代理商</option>
                                                 </select>
                                              </span>
                                                <input type="text" class="form-control" value="<?php echo !empty($getdata['username'])?$getdata['username']:''; ?>" name="username" placeholder="昵称/姓名/手机号/编号"  >
                                            </div>
                                              
                                            </div>
                                      
                                      		
                                      
                                            <div class="col-lg-6">
                                              <div class="input-group m-bot15">
                                              <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">订单时间</button>
                                              </span>
                                                    <input size="16" type="text"  readonly class="form_datetime form-control"  placeholder="点击选择时间" name="starttime" value="<?php echo !empty($getdata['starttime'])?$getdata['starttime']:''; ?>">
                                                     <span class="input-group-addon">To</span>
                                                     <input size="16" type="text" readonly class="form_datetime form-control" placeholder="点击选择时间" name="endtime" value="<?php echo !empty($getdata['endtime'])?$getdata['endtime']:''; ?>" >        
                                            </div>
                                          

                                                             
                                            </div>
                                            </div>

                                      </div>
									<div class="col-lg-12">
                                          <div class="row">
                                                  <div class="col-lg-3">
                                                    	<div class="input-group m-bot15">
                                                          <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button">涨跌</button>
                                                          </span>
                                                          		<select class="form-control m-bot15" name="ostyle" >
                                                                    <option value="">默认不选</option>
																	<option <?php if(isset($getdata['ostyle']) && $getdata['ostyle'] == 1): ?> selected="selected" <?php endif; ?> value="1">买涨</option>
                              										<option <?php if(isset($getdata['ostyle']) && $getdata['ostyle'] == 2): ?> selected="selected" <?php endif; ?> value="2">买跌</option>
                                                             </select>
                                                        </div>
                                                  </div>
                                           		  <div class="col-lg-3">
                                                    	<div class="input-group m-bot15">
                                                          <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button">盈亏</button>
                                                          </span>
                                                          		<select class="form-control m-bot15" name="ploss">
                                                                      <option value="">默认不选</option>
                                                                      <option <?php if(isset($getdata['ploss']) && $getdata['ploss'] == 1): ?> selected="selected" <?php endif; ?> value="1">赢利</option>
                                                                      <option <?php if(isset($getdata['ploss']) && $getdata['ploss'] == 2): ?> selected="selected" <?php endif; ?> value="2">亏损</option>
                                                                      <option <?php if(isset($getdata['ploss']) && $getdata['ploss'] == 3): ?> selected="selected" <?php endif; ?> value="3">无效</option>
                                                              </select>
                                                        </div>
                                                  </div>
                                            	  <div class="col-lg-3">
                                                    	
                                                    	<div class="input-group m-bot15">
                                                          <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button">产品</button>
                                                          </span>
                                                          		<select class="form-control m-bot15"  name="pid" >
                                                                      <option value="">默认不选</option>
                                                                         <!-- <?php if(is_array($pro) || $pro instanceof \think\Collection || $pro instanceof \think\Paginator): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
                                                                            <option <?php if(isset($getdata['pid']) && $getdata['pid'] == $vo['pid']): ?> selected="selected" <?php endif; ?> value="<?php echo $vo['pid']; ?>"><?php echo $vo['ptitle']; ?></option>
                                                                         <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
                                                                </select>
                                                        </div>
                                                  </div>
                                            
                                            		<div class="col-lg-3">
                                                    	
                                                    	<div class="input-group m-bot15">
                                                          <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button">状态</button>
                                                          </span>
                                                          <select class="form-control m-bot15" name="ostaus">
                                                                <option value="">默认不选</option>
                                                                <option <?php if(isset($getdata['ostaus']) && $getdata['ostaus'] == 1): ?> selected="selected" <?php endif; ?>  value="1">建仓</option>
                                                                <option <?php if(isset($getdata['ostaus']) && $getdata['ostaus'] == 2): ?> selected="selected" <?php endif; ?>  value="2">平仓</option>
                                                           </select>
                                                        </div>
                                                  </div>
                                             </div>
                                      <input class="btn btn-info"type="submit" value="搜 索">
                              </div>
                          		</div>
                        </form>
                    </div>	
                </section>
            </div>
        </div>
		 <!--state overview end-->
		<div style="margin-bottom: 20px;">
          <a href="<?php echo url('order/orderlist'); ?>"><button class="btn btn-danger" type="submit">搜索 全部</button></a>
          <code> <strong>默认为当天订单 </strong></code>
          <a href="<?php echo url('order/orderlist',array('trade_type'=>1)); ?>"><button class="btn btn-danger" type="submit">时间盘</button></a>
          <a href="<?php echo url('order/orderlist',array('trade_type'=>2)); ?>"><button class="btn btn-danger" type="submit">点位盘</button></a>
     	</div>	
          
 <div class="row">
        <div class="col-sm-12">
		
		
        <section class="panel">
            <header class="panel-heading">
               交易记录             
            </header>
            <div class="panel-body">
                <section id="unseen">
                  <form action="proorder" method="post">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>
                       
                          	 <tr>
                                <th class="numeric">订单编号</th>
                                <th class="numeric">交易账号</th>
                                <th class="numeric">用户姓名</th>
                                <th class="numeric">订单时间</th>
                                <th class="numeric">产品信息</th>
                                <th class="numeric">状态</th>
                                <th class="numeric">方向</th>
                                <th class="numeric">时间/点数</th>
                                <th class="numeric">交易类型</th>
                                <th class="numeric">建仓点位</th>
                                <th class="numeric">平仓点位</th>
                                <th class="numeric">委托余额</th>
                                <th class="numeric">无效委托余额</th>
                                <th class="numeric">有效委托余额</th>             
                                <th class="numeric">实际盈亏</th>
                                <th class="numeric">买后余额</th>
                                <th class="numeric">归属代理商</th>
                                <?php if($otype == 3): ?>
                                <th class="numeric">单控操作</th>
                                <?php endif; ?>
                               <!-- <th class="numeric">详情</th>-->
                            </tr>
                        </thead>
                      
                       
                        <tbody>
                      <!-- <?php if(is_array($order) || $order instanceof \think\Collection || $order instanceof \think\Paginator): $i = 0; $__LIST__ = $order;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
                              <tr>
                                  <td><?php echo $vo['oid']; ?></td>
                                  <td><?php echo $vo['username']; ?></td>
                                  <td><?php echo $vo['nickname']; ?></td>
                                  <td><?php echo date("Y-m-d H:i:s",$vo['buytime']); ?></td>
                                  <td><?php echo $vo['ptitle']; ?></td>
                                  <td><?php if($vo['ostaus']==1): ?>平仓<?php else: ?>建仓<?php endif; ?></td>
                                  <td><?php if($vo['trade_type']==1): ?>时间盘<?php else: ?>点位盘<?php endif; ?>
                                  </td>
                                  <?php if($vo['ostyle'] == 0): ?>
                                  <td class="color_red">买涨</td>
                                  <?php elseif($vo['ostyle'] == 1): ?>
                                  <td class="color_green">买跌</td>
                                  <?php endif; ?>
                                  <td><?php echo $vo['endprofit']; if($vo['trade_type']==1): ?>秒<?php else: ?>点<?php endif; ?></td>
                                  <td><?php echo $vo['buyprice']; ?></td>
                                  <td>
                                    <?php if($vo['ostaus'] == 1): if($vo["buyprice"] > $vo["sellprice"]): ?>
                                        <font color="#2fb44e" size="3"><?php echo $vo['sellprice']; ?></font>
                                      <?php else: ?>
                                        <font color="#ed0000" size="3"><?php echo $vo['sellprice']; ?></font>
                                      <?php endif; else: ?>
                                        <span <?php if($vo['pid'] == 1): ?> class="jks drop" <?php elseif($vo['pid'] == 2): ?> class="yks drop" <?php elseif($vo['pid'] == 3): ?> class="tks drop" <?php elseif($vo['pid'] == 4): ?> class="zsy drop" <?php endif; ?>></span>
                                    <?php endif; ?>
                                  </td>

                                  <td class="color_red">¥<?php echo $vo['fee']; ?></td>
                                  
                                  <?php if($vo['ploss'] == 0): ?>
                                  <td class="color_red">¥<?php echo $vo['fee']; ?></td>
                                  <?php else: ?>
                                  <td class="color_red">¥0</td>
                                  <?php endif; if($vo['ploss'] != 0): ?>
                                  <td class="color_red">¥<?php echo $vo['fee']; ?></td>
                                  <?php else: ?>
                                  <td class="color_red">¥0</td>
                                  <?php endif; ?>
                                  

                                  <td <?php if($vo['ploss'] > 0): ?> class="color_red" <?php else: ?> class="color_green" <?php endif; ?>>¥<?php echo $vo['ploss']; ?></td>
                                  <td class="color_red">¥<?php echo $vo['commission']; ?></td>

                                  <td><?php echo $vo['managername']; ?></td>
                                  
                                  <?php if($otype == 3): ?>
                                  <td>
                                  <?php if($vo['ostaus']!=1): ?>
                                    <select name="ostyle" id="" class="selectpicker select_change show-tick form-control">
                                        <option <?php if($vo['kong_type'] == 0): ?> selected="selected" <?php endif; ?> value="<?php echo $vo['oid']; ?>_0">默认</option>
                                        <option <?php if($vo['kong_type'] == 1): ?> selected="selected" <?php endif; ?>  value="<?php echo $vo['oid']; ?>_1">盈</option>
                                        <option <?php if($vo['kong_type'] == 2): ?> selected="selected" <?php endif; ?>  value="<?php echo $vo['oid']; ?>_2">亏</option>
                                    </select>
                                  <?php else: ?>已平仓<?php endif; ?>
                                    </td>
                                    <?php endif; ?>
                                  <!--  <td>
                                      <a href="<?php echo url('order/orderinfo',array('oid'=>$vo['oid'])); ?>"><button class="btn btn-primary btn-xs" title="点击查看"><i class="icon-list-alt"></i></button></a>
                                      
                                  </td>-->
                              </tr>
					<!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
                          
                          
                        </tbody>  
                  	</table>
                   </form>
                </section>
            </div>
        </section>	
</div>
</div>
		
    <?php if(isset($noorder) && $noorder == 1): ?> 
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="noorder">
                                暂无数据
                              </div>
                            </div>
                          </div>
               <?php endif; ?>     
	
			
					
					
					
					

                            </section>
                            <!--modal end-->
                        </div>
                    </div>
                    
		<?php echo $order->render(); ?>			
					
					
					
					
	
	
	




	   <!-- page end-->
        </section>

<script type="text/javascript" src="__ADMIN__/gaiban/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>

<script src="__ADMIN__/gaiban/js/pickers-init.js"></script>
<!--pickers plugins-->







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
ordersta();
//底部统计
function ordersta(){
  var formurl = "<?php echo url('/admin/order/ordersta'); ?>";
  var data  = '<?php echo $jsongetdata; ?>';
  
console.log(data);
  
  $.post(formurl,data,function(data){
      if (data) {
        $('#profit').html('¥'+data.profit);
        $('#count').html(data.count+'笔');
        $('#fee').html('¥'+data.fee);
        $('#invalid_fee').html('¥'+data.invalid_fee);
        $('#valid_fee').html('¥'+data.valid_fee);
        $('#now_fee').html('¥'+data.now_fee);
        $('#valid_shouxu').html('¥'+data.valid_shouxu);
      }


    });
    
}
$(".select_change").change(function(){
  var kong_id = $(this).val();
  if(kong_id){
    var kong_arr = kong_id.split('_');
  }
  var oid = kong_arr[0];
  var kong_type = kong_arr[1];
  var postdata = 'oid='+oid+"&kong_type="+kong_type;
  var posturl = "<?php echo url('dankong'); ?>";
  $.post(posturl,postdata,function(res){
    layer.msg(res.data);
  })
  
})


</script>