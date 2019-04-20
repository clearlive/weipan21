<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:115:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\goods\proadd.html";i:1555657653;s:107:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\head.html";i:1529895946;s:107:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\menu.html";i:1555657653;s:107:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\foot.html";i:1529895946;}*/ ?>
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
    


		
		
        <!--body wrapper start-->
        <div class="wrapper">	
        <div class="row">
        <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <?php echo !empty($pid)?'编辑产品':'添加产品'; ?>
            </header>
            <div class="panel-body">
                <form class="form-horizontal adminex-form" role="form" id="formid" method="post" >
                	<div class="form-group">
                          <label class="col-sm-2 control-label col-lg-2" for="inputSuccess"><strong style="color: #a94442;">交易类型</strong></label>
                          <div class="col-lg-10">
                          	<div style="margin-top: 5px;">
                          		<label>
	                              <input name="trade_type" id="trade_type1" value="1" type="checkbox" onclick="selectTradeType(1)">
	                              	<span>&nbsp;时间盘</span>
	                              </input>
	                            </label>
	                              &nbsp;&nbsp;&nbsp;&nbsp;
	                            <label>
	                              <input name="trade_type" id="trade_type2" value="2" type="checkbox" onclick="selectTradeType(2)">
	                              	<span>&nbsp;点位盘</span>
	                              </input>
	                            </label>
                              <!--<select class="form-control m-bot15" id="trade_type" name="trade_type" onchange="selectTradeType()">
                              	<option value="0">请选择类型</option>
                                <option value="1" <?php if(isset($trade_type) && $trade_type == 1): ?> selected <?php endif; ?>>时间盘</option>
                                <option value="2" <?php if(isset($trade_type) && $trade_type == 2): ?> selected <?php endif; ?>>点位盘</option>
                              </select>-->
                            </div>
                          </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">产品名称</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="请填写产品名称" name="ptitle" value="<?php echo !empty($ptitle)?$ptitle:''; ?>">
                        </div>
                    </div>
                  	<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">产品简介</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="请填写简介(控制在10字左右)"name="jianjie" value="<?php echo !empty($jianjie)?$jianjie:''; ?>">
                            
                        </div>
                    </div>
                  <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">产品代码</label>
                        <div class="col-sm-10">
                             
                            	<div class="row">
                                  <div class="col-lg-12">
                                      <input type="text" class="form-control" value="<?php echo !empty($procode)?$procode:''; ?>"  placeholder="请填写产品代码" name="procode">
                                  </div>
                            	</div>	
                        </div>
                    </div> 
                    <div class="form-group">
                          <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">产品分类</label>
                          <div class="col-lg-10">
                              <select class="form-control m-bot15" name="cid">
                                  <option value="0">请选择分类</option>
                                   <!-- <?php if(is_array($proclass) || $proclass instanceof \think\Collection || $proclass instanceof \think\Paginator): $i = 0; $__LIST__ = $proclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
                                            	<option <?php if(isset($cid) && $cid == $vo['pcid']): ?> selected="selected" <?php endif; ?> value="<?php echo $vo['pcid']; ?>"><?php echo $vo['pcname']; ?></option>
                                   <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
                              </select>
                          </div>
                     </div>
					
                  
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">风控波动范围</label>
                        <div class="col-sm-10">
                             
                            	<div class="row">
                                  <div class="col-lg-6">
                                      <input type="text" value="<?php echo !empty($point_low)?$point_low:''; ?>" class="form-control" placeholder="风控波动最小值" name="point_low">
                                  </div>
                                  <div class="col-lg-6">
                                      <input type="text" value="<?php echo !empty($point_top)?$point_top:''; ?>" class="form-control" placeholder="风控波动最大值" name="point_top">
                                  </div>
                                 
                            	</div>
                          <span class="help-block" style="color: #a94442;"><strong>注意：</strong> 客户订单在条件范围内时，会根据订单的涨或跌，自动减或加最小值与最大值之间的随机数，留空或者0则为不开启</span>
                        	
                        </div>
                    </div>
                  
                  	 <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" id="rands_lable">时间盘波动范围</label>
                        <div class="col-sm-10">
                            	<div class="row">
                                  <div class="col-lg-12">
                                      <input type="text" class="form-control" placeholder="请填写随机波动范围"  name="rands" value="<?php echo !empty($rands)?$rands:''; ?>">
                                  </div>
                            	</div>
							<span class="help-block" style="color: #a94442;"><strong>注意：</strong> 产品获取接口值后，会加上+-此处的值。如5，则在接口获取的数据中加上-5~5之间的随机数。</span>
                        	
                        </div>
                    </div>
                    <!--<div class="form-group" id="insurance_value_div" <?php if(!(isset($trade_type) && $trade_type == 2)): ?> style="display: none;" <?php endif; ?>>
                        <label class="col-sm-2 col-sm-2 control-label" style="color: #a94442;">附加保险值</label>
                        <div class="col-sm-10">
                            	<div class="row">
                                  <div class="col-lg-12">
                                      <input type="text" class="form-control" placeholder="请填写附加保险值"  name="insurance_value" value="<?php echo !empty($insurance_value)?$insurance_value:'0'; ?>">
                                  </div>
                            	</div>
							<span class="help-block" style="color: #a94442;"><strong>注意：</strong> 产品获取接口值后，会加上+-此处的值。如5，则在接口获取的数据中加上-5~5之间的随机数。</span>
                        </div>
                    </div>-->
                  
                   <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" id="protime_lable">时间玩法间隔</label>
                        <div class="col-sm-10">
                             
                            	<div class="row">
                                  <div class="col-lg-12">
                                      <input type="text" class="form-control" value="<?php echo !empty($protime)?$protime:''; ?>"  placeholder="请填写玩法间隔" name="protime">
                                  </div>
                            	</div>
							<span class="help-block" style="color: #a94442;" id="protime_span"><strong>注意：</strong> 如时间为：1分、3分、5分、8分，则请用字母逗号将时间分开，如输入：1,3,5,8。必须为四个。</span>
                        	
                        </div>
                    </div>
                  <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">盈亏比例</label>
                        <div class="col-sm-10">
                             
                            	<div class="row">
                                  <div class="col-lg-12">
                                      <input type="text" class="form-control"  value="<?php echo !empty($proscale)?$proscale:''; ?>"  placeholder="请填写盈亏比例" name="proscale">
                                  </div>
                            	</div>
							<span class="help-block" style="color: #a94442;"><strong>注意：</strong> 如比例为：75%、77%，80%、85%，则请用字母逗号将比例分开，如输入：75,77,80,85。必须为四个，且不得为空。</span>
                        	
                        </div>
                    </div>
                   <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">开市时间</label>
                        <div class="col-sm-10">
                             
                            	<div class="row">
                                  <div class="col-lg-3" style="margin-top: 5px;">
                                      <input type="text" class="form-control" placeholder="周一" value="<?php echo !empty($opentime[0])?$opentime[0]:''; ?>" name="opentime[1]">
                                  </div>
                                  <div class="col-lg-3" style="margin-top: 5px;">
                                      <input type="text" class="form-control" placeholder="周二" value="<?php echo !empty($opentime[1])?$opentime[1]:''; ?>"  name="opentime[2]">
                                  </div>
                                  <div class="col-lg-3" style="margin-top: 5px;">
                                      <input type="text" class="form-control" placeholder="周三" value="<?php echo !empty($opentime[2])?$opentime[2]:''; ?>"  name="opentime[3]">
                                  </div>
                                  <div class="col-lg-3" style="margin-top: 5px;">
                                      <input type="text" class="form-control" placeholder="周四" value="<?php echo !empty($opentime[3])?$opentime[3]:''; ?>" name="opentime[4]">
                                  </div>
                                  <div class="col-lg-3" style="margin-top: 5px;">
                                      <input type="text" class="form-control" placeholder="周五" value="<?php echo !empty($opentime[4])?$opentime[4]:''; ?>" name="opentime[5]">
                                  </div>
                                  <div class="col-lg-3" style="margin-top: 5px;">
                                      <input type="text" class="form-control" placeholder="周六" value="<?php echo !empty($opentime[5])?$opentime[5]:''; ?>" name="opentime[6]">
                                  </div>
                                  <div class="col-lg-3" style="margin-top: 5px;">
                                      <input type="text" class="form-control" placeholder="周日" value="<?php echo !empty($opentime[6])?$opentime[6]:''; ?>" name="opentime[7]" >
                                  </div>
                            	</div>
                       			
							<span class="help-block" style="color: #a94442;"><strong>注意：</strong>  开市时间为00:00~18:00则输入 00:00~18:00 开市时间为00:00~03:00 和 08:00~24:00;则输入 如：00:00~03:00|08:00~24:00 不得出现中文符号，全天不开市请留空,时间一定要填写准确。</span>	
                        </div>
                     	
                    </div>
				
                          <div class="form-group">
                              <label class="col-sm-2 control-label">备注</label>
                              <div class="col-sm-10">
                                  <textarea rows="6" class="form-control"><?php echo !empty($content)?$content:''; ?></textarea>
                              </div>
                     
         			</div>
                  								<input type="hidden" name="pid" value="<?php echo !empty($pid)?$pid:''; ?>">
       					<div class="panel-body">
                         

                          <input type="submit" class="btn btn-primary" onclick="return editpro(this.form)" value="提交">
                           <input type="button" class="btn btn-warning" onclick="returnBack();" value="返回">
                        </div>
      
                </form>
            </div>
        </section>

          
        </div>
        </div>
	   
	   </div>
        <!--body wrapper end-->

		



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
var trade_type = '<?php if(isset($trade_type)): ?> <?php echo $trade_type; else: ?> 0 <?php endif; ?>';
if(trade_type != 0){
	selectTradeType(trade_type);
}

function selectTradeType(value){
	
	var rands_lable_html = "波动范围";
	var protime_lable_html = "玩法间隔";
	var protime_span_html = "<strong>注意事项</strong>";
	var display = "none";
	if(value == 1){
		rands_lable_html = "时间盘波动范围";
		protime_lable_html = "时间玩法间隔";
		protime_span_html = "<strong>注意：</strong> 如时间为：1分、3分、5分，则请用字母逗号将时间分开，如输入：1,3,5。必须为三个。";
		$("#trade_type2").removeAttr("checked");
		$("#trade_type1").attr("checked",'true');//全选
		
	}else if(value == 2){
		display = "block";
		rands_lable_html = "点位盘波动范围";
		protime_lable_html = "点位玩法间隔";
		protime_span_html = "<strong>注意：</strong> 如点数为：0.1点、0.2点、0.3点、0.4点，则请用字母逗号将时间分开，如输入：0.1,0.2,0.3,0.4。必须为四个。";
		$("#trade_type1").removeAttr("checked");
		$("#trade_type2").attr("checked",'true');
	}
	$("#rands_lable").html(rands_lable_html);
	$("#protime_lable").html(protime_lable_html);
	$("#protime_span").html(protime_span_html);
}
function editpro(form){

	var ptitle = form.ptitle.value;
	var cid = form.cid.value;
	var point_low = form.point_low.value;
	var point_top = form.point_top.value;
	var rands = form.rands.value;
    var procode = form.procode.value;
    var proscale = form.proscale.value;
    var trade_type = "";
    $.each($('input[name="trade_type"]:checked'),function(){
	    if(this.checked){
	        trade_type = $(this).val();
	    }
	});
    
	if(!ptitle){
		layer.msg('请输入产品名称！'); 
	    return false;
	}
	  if(!procode ){
	    layer.msg('请输入产品代码！'); 
	      return false;
	  }
	if(!cid || cid == 0){
		layer.msg('请选择分类！'); 
	    return false;
	}

	if(!trade_type || trade_type == ""){
		layer.msg('请选择交易类型！'); 
	    return false;
	}

	if(point_low < 0 || isNaN(point_low) || point_top < 0 || isNaN(point_top) || rands < 0 || isNaN(rands)){
		layer.msg('风控值应为大于0的数字！'); 
	    return false;
	}

	if(point_low > point_top ){
		layer.msg('风控最小值应该小于最大值！'); 
	    return false;
	}



  if(!proscale ){
    layer.msg('请输入盈亏比例！'); 
      return false;
  }

	var formurl = "<?php echo Url('goods/proadd'); ?>"
    var data = $('#formid').serialize();
    var locurl = "<?php echo Url('admin/goods/prolist'); ?>";

    WPpost(formurl,data,locurl);
	return false;

}
function returnBack(){

	self.location.href="<?php echo Url('admin/goods/prolist'); ?>";
}
</script>
