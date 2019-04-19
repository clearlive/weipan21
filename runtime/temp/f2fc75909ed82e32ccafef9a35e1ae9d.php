<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\user\userlist.html";i:1553440084;s:73:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\head.html";i:1529895946;s:73:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\menu.html";i:1555657653;s:73:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\foot.html";i:1529895946;}*/ ?>
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
                        <form action="<?php echo url('user/userlist'); ?>" method="get">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <div class="row">
                                        	<div class="col-lg-3">
                                              <div class="input-group m-bot15">
                                              <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">订单编号</button>
                                              </span>
                                                <input type="text"  value="<?php echo !empty($getdata['username'])?$getdata['username']:''; ?>"  class="form-control" name="username" placeholder="昵称/姓名/手机号/编号"/>
                                            </div>
                                            </div>
                                      		<div class="col-lg-3">
                                                    	<div class="input-group m-bot15">
                                                          <span class="input-group-btn">
                                                            <button class="btn btn-default" type="button">盈亏</button>
                                                          </span>
                                                          		<select class="form-control m-bot15" name="otype">
                                                                      <option value="">默认不选</option>
                                                                       <option <?php if(isset($getdata['otype']) && $getdata['otype'] === 0): ?> selected="selected" <?php endif; ?> value="0">客户</option>
                                  										<option <?php if(isset($getdata['otype']) && $getdata['otype'] == 101): ?> selected="selected" <?php endif; ?> value="101">代理商</option>
                                                              </select>
                                                        </div>
                                                  </div>
                                      			<input class="btn btn-info"type="submit" value="搜 索">
                                            </div>
                                      </div>
                          		</div>
                        </form>
                    </div>	
                </section>
            </div>
        </div>
		 <!--state overview end-->
		<div style="margin-bottom: 20px;">
          <a href="<?php echo url('user/userlist'); ?>"><button class="btn btn-danger" type="submit">所有 用户</button></a>
          <a href="<?php echo url('user/userlist',array('otype'=>0)); ?>"><button class="btn btn-danger" type="submit">所有 客户</button></a>
          <a href="<?php echo url('user/userlist',array('otype'=>101)); ?>"><button class="btn btn-danger" type="submit">所有 代理商</button></a>
          <a href="<?php echo url('user/userlist',array('today'=>1,'otype'=>0)); ?>"><button class="btn btn-danger" type="submit">今日 客户</button></a>
          <a href="<?php echo url('user/userlist',array('today'=>1,'otype'=>101)); ?>"><button class="btn btn-danger" type="submit">今日 代理商</button></a>
          <a href="<?php echo url('user/useradd'); ?>"><button class="btn btn-danger" type="submit">添加 客户+</button></a>
          <a href="<?php echo url('user/vipuseradd'); ?>"><button class="btn btn-danger" type="submit">添加 代理+</button></a>
     	</div>
          
 <div class="row">
        <div class="col-sm-12">
		
		
        <section class="panel">
            <header class="panel-heading">
                     用户列表             
            </header>
            <div class="panel-body">
                <section id="unseen">
                    <table class="table table-bordered table-striped table-condensed">
                        <thead>       
                          	 <tr>   	
                                <th>用户ID</th>
                                <th>客户信息</th>
                                <th>客户名称</th>
                                <th>创建日期</th>
                                <th>最近登录</th>
                                <th>订单数</th>
                                <th>账户余额(￥)</th>
                                <th>账户余额($)</th>
                                <th>身份</th>
                                <th>红利</th>
                                <th>佣金</th>
                                <th>归属代理商</th>
                                <?php if($otype == 3): ?>
                                <th>操作</th>
                                <?php endif; ?>
                           
                               
                            </tr>
                        </thead>
                        <tbody>
                             <!-- <?php if(is_array($userinfo) || $userinfo instanceof \think\Collection || $userinfo instanceof \think\Paginator): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
                              <tr>
                                  <td><?php echo $vo['uid']; ?></td>
                                  <td><?php echo $vo['username']; ?>【<?php echo $vo['utel']; ?>】</td>
                                  <td><?php echo $vo['nickname']; ?></td>
                                  <td><?php echo date("Y-m-d H:i:s",$vo['utime']); ?></td>
                                  <td><?php echo date("Y-m-d H:i:s",$vo['logintime']); ?></td>
                                  <td><?php echo ordernum($vo['uid']); ?></td>
                                  <td class="color_red">¥<?php echo !empty($vo['usermoney'])?$vo['usermoney']:'0'; ?></td>
                                  <td class="color_red">¥<?php echo !empty($vo['userdollor'])?$vo['userdollor']:'0'; ?></td>
                                  <td><?php if($vo['otype'] == 0): ?>客户<?php elseif($vo['otype'] == 101): ?>代理商<?php endif; ?></td>
                                  <td><?php echo !empty($vo['rebate'])?$vo['rebate']:'0'; ?>%</td>
                                  <td><?php echo !empty($vo['feerebate'])?$vo['feerebate']:'0'; ?>%</td>
                                  <td><a href="<?php echo url('userlist',array('oid'=>$vo['oid'])); ?>"><?php echo getuser($vo['oid'],"username"); ?></a></td>
                                  
                                  <td>
                                      <?php if($vo['ustatus'] == 0): ?>
                                      <a href="javascript:;" onclick="doustatus(1,<?php echo $vo['uid']; ?>)"> <button class="btn btn-danger btn-xs"> 禁用 </button> </a>
                                      <?php else: ?>
                                      <a href="javascript:;" onclick="doustatus(0,<?php echo $vo['uid']; ?>)"> <button class="btn btn-primary btn-xs"> 启用 </button> </a>

                                      <?php endif; if($vo['otype'] == 101): ?>
                                      
                                      <a href="<?php echo url('userlist',array('oid'=>$vo['uid'])); ?>"> <button class="btn btn-primary btn-xs"> 下级客户 </button> </a>
                                      <a href="<?php echo url('vipuserlist',array('oid'=>$vo['uid'])); ?>"> <button class="btn btn-primary btn-xs"> 下级代理 </button> </a>
                                      <a href="<?php echo url('yeji',array('uid'=>$vo['uid'])); ?>"> <button class="btn btn-primary btn-xs"> 业绩 </button> </a>

                                      <?php if($_SESSION['otype'] == 3): if($vo['dankong'] == 0): ?>
                                      <a href="javascript:;" onclick="dodankong(1,<?php echo $vo['uid']; ?>)"> <button class="btn btn-danger btn-xs"> 允许单控 </button> </a>
                                      <?php else: ?>
                                      <a href="javascript:;" onclick="dodankong(0,<?php echo $vo['uid']; ?>)"> <button class="btn btn-primary btn-xs"> 禁止单控 </button> </a>
                                      <?php endif; ?>
                                      <a href="<?php echo url('user/vipuseredit',array('uid'=>$vo['uid'])); ?>"><button class="btn btn-danger btn-xs"><i class="icon-pencil"> 修改</i></button></a>
                                      <a href="javascript:;" onclick="deleteuser(<?php echo $vo['uid']; ?>)" ><button class="btn btn-danger btn-xs"><i class="icon-pencil"> 删除</i></button></a> 
                                      <?php endif; endif; if($vo['otype'] == 0): ?>

                                      <a href="javascript:;" onclick="dootype(101,<?php echo $vo['uid']; ?>)"><button class="btn btn-success btn-xs">成为代理商</button></a>

                                      <?php if($_SESSION['otype'] == 3): ?>
                                      <a href="<?php echo url('user/useredit',array('uid'=>$vo['uid'])); ?>"><button class="btn btn-danger btn-xs"><i class="icon-pencil"> 修改</i></button></a>
                                      <a href="javascript:;" onclick="deleteuser(<?php echo $vo['uid']; ?>)" ><button class="btn btn-danger btn-xs"><i class="icon-pencil"> 删除</i></button></a> 
                                      <?php endif; endif; ?>

                                      <a href="<?php echo url('user/userbank',array('uid'=>$vo['uid'])); ?>"><button class="btn btn-primary btn-xs">签约</button></a>

                                       <a href="<?php echo url('price/pricelist'); ?>?username=<?php echo $vo['username']; ?>"><button class="btn btn-primary btn-xs">资金报表</button></a>

                                  </td>  
                              </tr>
							<!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
                        </tbody>  
                  	</table>
                </section>
               <?php echo $userinfo->render(); ?>
             
            </div>
        </section>	
</div>
</div>




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

function doustatus(type,uid) {
  
  if(type == 1){
    var con = '确定禁用吗？';
  }else if(type == 0){
    var con = '确定启用吗？';
  }else{
    layer.msg('参数错误！');
    return false;
  }

  if(!uid){
    layer.msg('参数错误！');
    return false;
  }

  layer.open({
    content: con,
    yes: function(index){
      //do something
      var formurl = "<?php echo Url('user/doustatus'); ?>";
      var data = 'uid='+uid+'&ustatus='+type;

      $.post(formurl,data,function(resdata){
        layer.msg(resdata.data);
        if(resdata.type == 1){
          history.go(0);
        }
      })

      
    }
  });
}

function dootype(type,uid) {
  
  if(type == 101){
    var con = '确定要成为代理商吗？';
  }else{
    layer.msg('参数错误！');
    return false;
  }

  if(!uid){
    layer.msg('参数错误！');
    return false;
  }

  layer.open({
    content: con,
    yes: function(index){
      //do something
      var formurl = "<?php echo Url('user/dootype'); ?>";
      var data = 'uid='+uid+'&otype='+type;

      $.post(formurl,data,function(resdata){
        layer.msg(resdata.data);
        if(resdata.type == 1){
          history.go(0);
        }
      })

      
    }
  });
}


function dodankong(type,uid) {
  
  if(type == 1){
    var con = '确定启用单控吗？';
  }else if(type == 0){
    var con = '确定禁用单控吗？';
  }else{
    layer.msg('参数错误！');
    return false;
  }

  if(!uid){
    layer.msg('参数错误！');
    return false;
  }

  layer.open({
    content: con,
    yes: function(index){
      //do something
      var formurl = "<?php echo Url('user/dodankong'); ?>";
      var data = 'uid='+uid+'&dankong='+type;

      $.post(formurl,data,function(resdata){
        layer.msg(resdata.data);
        if(resdata.type == 1){
          history.go(0);
        }
      })

      
    }
  });
}


function deleteuser (uid) {
  
  layer.open({
    content: '你确定删除吗？不可恢复哦，请慎重操作！',
    yes: function(index){
      //do something
      var formurl = "<?php echo Url('user/deleteuser'); ?>";
      var data = 'uid='+uid;

      $.post(formurl,data,function(resdata){
        layer.msg(resdata.data);
        if(resdata.type == 1){
          history.go(0);
        }
      })

      
    }
  });


}


</script>