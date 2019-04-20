<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:111:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/dlht\view\user\cash.html";i:1529895948;s:106:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/dlht\view\head.html";i:1529895948;s:106:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/dlht\view\menu.html";i:1555742638;s:106:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/dlht\view\foot.html";i:1529895948;}*/ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="/favicon.ico">

    <title>代理商后台管理系统</title>

    <!-- Bootstrap core CSS -->
    <link href="__ADMIN__/css/bootstrap.min.css" rel="stylesheet">
    <link href="__ADMIN__/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="__ADMIN__/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="__ADMIN__/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="__ADMIN__/css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="__ADMIN__/css/style.css" rel="stylesheet">
    <link href="__ADMIN__/css/style-responsive.css" rel="stylesheet" />
    <link href="__ADMIN__/css/addstyle.css" rel="stylesheet">
    
    <script src="__ADMIN__/js/jquery.js"></script>
    <script src="__ADMIN__/js/jquery-1.8.3.min.js"></script>
    <script src="/static/layer/layer.js"></script>

    <!-- 时间选择器 -->
    <link rel="stylesheet" type="text/css" href="__ADMIN__/css/jquery.datetimepicker.css"/>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="__ADMIN__/js/html5shiv.js"></script>
      <script src="__ADMIN__/js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
            <div class="sidebar-toggle-box">
                <div data-original-title="显示/隐藏" data-placement="right" class="icon-reorder tooltips"></div>
            </div>
            <!--logo start-->
            <a href="#" class="logo">代理商<span>系统</span></a>
            <!--logo end-->
            
            <div class="top-nav ">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <?php if(isset($_SESSION['username'])): ?>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            
                            <span class="username"><?php echo !empty($_SESSION['username'])?$_SESSION['username']:''; ?></span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="<?php echo Url('login/logout'); ?>"><i class="icon-signout"></i> 退出</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!-- user login dropdown end -->
                </ul>
                <!--search & user info end-->
            </div>
        </header>
<!--header end-->


<!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">
                  <li <?php if($actionname == 'index' && $contrname == 'Index'): ?> class="active" <?php endif; ?> >
                      <a class="" href="<?php echo Url('dlht/index/index'); ?>">
                          <i class="icon-dashboard"></i>
                          <span>后台首页</span>
                      </a>
                  </li>
                  <li <?php if($contrname == 'Order'): ?> class="active" <?php else: ?> class="sub-menu " <?php endif; ?>>
                      <a href="javascript:;" class="">
                          <i class="icon-paste"></i>
                          <span>订单管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li <?php if($actionname == 'holdlist'): ?> class="active" <?php endif; ?>><a class="" href="<?php echo Url('dlht/order/holdlist'); ?>">持仓订单</a></li>
                          <li <?php if($actionname == 'orderlist'): ?> class="active" <?php endif; ?>><a class="" href="<?php echo Url('dlht/order/orderlist'); ?>">交易流水</a></li>
                          <li <?php if($actionname == 'orderlog'): ?> class="active" <?php endif; ?>><a class="" href="<?php echo Url('dlht/order/orderlog'); ?>">平仓日志</a></li>
                      </ul>
                  </li>

                  <li <?php if($contrname == 'User' && ( in_array($actionname,array('userlist','useradd','userprice','userinfo','cash','myteam','chongzhi')) )): ?> class="active" <?php else: ?> class="sub-menu " <?php endif; ?>>
                      <a href="javascript:;" class="">
                          <i class="icon-user"></i>
                          <span>用户管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          <li <?php if(in_array($actionname,array('userlist','useradd'))): ?> class="active" <?php endif; ?>>
                          <a class="" href="<?php echo Url('dlht/user/userlist'); ?>">客户列表</a></li>
                          
                          <!--li <?php if(in_array($actionname,array('myteam'))): ?> class="active" <?php endif; ?>>
                          <a class="" href="<?php echo Url('dlht/user/myteam'); ?>">我的团队</a></li-->

                          <li <?php if($actionname == 'userprice'): ?> class="active" <?php endif; ?>>
                          <a class="" href="<?php echo Url('dlht/user/userprice'); ?>">充值列表</a></li>

                          <li <?php if($actionname == 'cash'): ?> class="active" <?php endif; ?>>
                          <a class="" href="<?php echo Url('dlht/user/cash'); ?>">提现列表</a></li>
                      </ul>
                  </li>
                  
                  <li <?php if($contrname == 'Price'): ?> class="active" <?php else: ?> class="sub-menu " <?php endif; ?>>
                      <a href="javascript:;" class="">
                          <i class="icon-yen"></i>
                          <span>报表管理</span>
                          <span class="arrow"></span>
                      </a>
                      <ul class="sub">
                          
                          
                          <li <?php if($actionname == 'allot'): ?> class="active" <?php endif; ?>>
                          <a class="" href="<?php echo Url('dlht/price/allot'); ?>">红利报表</a></li>

                          <li <?php if($actionname == 'yongjin'): ?> class="active" <?php endif; ?>>
                          <a class="" href="<?php echo Url('dlht/price/yongjin'); ?>">佣金报表</a></li>

                          <li <?php if($actionname == 'pricelist'): ?> class="active" <?php endif; ?>>
                          <a class="" href="<?php echo Url('dlht/price/pricelist'); ?>">资金报表</a></li>

                          <li <?php if($actionname == 'myprice'): ?> class="active" <?php endif; ?>>
                          <a class="" href="<?php echo Url('dlht/price/myprice'); ?>">个人报表</a></li>
                          
                      </ul>
                  </li>
                  <li>
                      <a class="" href="<?php echo Url('dlht/login/logout'); ?>">
                          <i class="icon-signout"></i>
                          <span>退出</span>
                      </a>
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->




<!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->

              <div class="row state-overview">
                <div class="container">
                <div class="row">
                      <form action="<?php echo url('cash'); ?>" method="get">
                      <div class="col-lg-3 mar-10">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">
                            <select name="stype" id="">
                                <option <?php if(isset($getdata['stype']) && $getdata['stype'] == 1): ?> selected="selected" <?php endif; ?> value="1">客户</option>
                                <option <?php if(isset($getdata['stype']) && $getdata['stype'] == 2): ?> selected="selected" <?php endif; ?>  value="2">代理商</option>
                              </select>
                            </span>
                            <input type="text" value="<?php echo !empty($getdata['username'])?$getdata['username']:''; ?>"  class="form-control" name="username" />
                        </div>
                      </div>

                      <div class="col-lg-6 mar-10">
                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon1">订单时间</span>
                            <input type="text"  id="datetimepicker" class="form-control" placeholder="点击选择时间" name="starttime" value="<?php echo !empty($getdata['starttime'])?$getdata['starttime']:''; ?>"/>
                            <span class="input-group-addon" id="basic-addon1">至</span>
                            <input type="text"  id="datetimepicker_end" class="form-control" placeholder="点击选择时间" name="endtime" value="<?php echo !empty($getdata['endtime'])?$getdata['endtime']:''; ?>" />
                        </div>
                      </div>



                      <div class="col-lg-3 mar-10">
                        <div class="input-group">
                            <span class="input-group-addon">类型</span>
                            <select name="isverified"  class="selectpicker show-tick form-control">
                                <option value="">默认不选</option>
                                <option <?php if(isset($getdata['isverified']) && $getdata['isverified'] == 0): ?> selected="selected" <?php endif; ?> value="0">未处理</option>
                                <option <?php if(isset($getdata['isverified']) && $getdata['isverified'] == 1): ?> selected="selected" <?php endif; ?> value="1">已通过</option>
                                <option <?php if(isset($getdata['isverified']) && $getdata['isverified'] == 2): ?> selected="selected" <?php endif; ?> value="2">已拒绝</option>
                            </select>
                        </div>
                      </div>


                  </div>
                  <div class="mar-10">
                   <input type="submit" class="btn btn-success" value="搜索">
                  </div>

                  </form>
                </div>

              </div>

              <!--state overview end-->
            <!-- <a href="<?php echo url('user/userprice',array('bptype'=>1)); ?>"><button type="submit" class="btn btn-success">充值记录</button></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo url('user/userprice',array('bptype'=>0)); ?>"><button type="submit" class="btn btn-success">提现记录</button></a>&nbsp;&nbsp;&nbsp;&nbsp; -->
            <a href="<?php echo url('user/cash'); ?>"><button type="submit" class="btn btn-danger">搜索全部</button></a>&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-danger">提现总金额：<?php echo $all_cash; ?></button></a>&nbsp;&nbsp;&nbsp;&nbsp;

            <br><br>
             <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              充值与提现
                          </header>
                          <table class="table table-striped table-advance table-hover">
                            <thead class="ordertable">
                              <tr>
                                <th>编号</th>
                                <th>交易账号</th>
                                <th>交易姓名</th>
                                <th>操作时间</th>
                                <th>申请金额</th>
                                <th>手续费</th>
                                <th>到账金额</th>
                                <th>会员账户余额</th>
                                <th>备注</th>
                                <th>审核时间</td>
                                <th>所属代理商</td>
                                <th>审核/状态</td>
                            </tr>
                          </thead>
                          <tbody>
                          <!-- <?php if(is_array($balance) || $balance instanceof \think\Collection || $balance instanceof \think\Paginator): $i = 0; $__LIST__ = $balance;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
                              <tr>
                                  <td><?php echo $vo['bpid']; ?></td>
                                  <td><?php echo $vo['username']; ?></td>
                                  <td><?php echo $vo['nickname']; ?> </td>
                                  <td><?php echo date("Y-m-d H:i:s",$vo['bptime']); ?> </td>
                                  <td class="color_red">¥<?php echo $vo['bpprice']; ?></td>
                                  <td class="color_red"><?php echo $vo['reg_par']; ?></td>
                                  <td class="color_red">¥<?php echo round($vo['bpprice']-$vo['reg_par'],2); ?></td>
                                  <td class="color_red"><?php echo $vo['bpbalance']; ?></td>
                                  <td><?php echo $vo['remarks']; ?></td>
                                  <td><?php echo date("Y-m-d H:i:s",$vo['cltime']); ?> </td>
                                  <td><?php echo $vo['managername']; ?></td>

                                  <td><?php if($vo['bptype'] == 1): ?>
                                      <?php echo $vo['remarks']; elseif($vo['bptype'] == 0 && $vo['isverified'] == 0 && $otype == 3): ?>
                                      <button class="btn btn-primary btn-xs price" data-toggle="modal" data-bpid="<?php echo $vo['bpid']; ?>" data-userid="<?php echo $vo['uid']; ?>" data-target="#myModal">处理/拒绝</button>
                                      <?php elseif($vo['bptype'] == 0 && $vo['isverified'] == 0): ?>
                                          <span class="color_red">审核中</span>
                                      <?php elseif($vo['bptype'] == 0 && $vo['isverified'] == 2): ?>
                                      	<span class="color_red">已拒绝</span>
                                      <?php elseif($vo['bptype'] == 0 && $vo['isverified'] == 3): ?>
                                      	<span class="color_green">代付已打款</span>
                                      <?php elseif($vo['bptype'] == 0 && $vo['isverified'] == 4): ?>
                                      	<span class="color_red">代付失败</span>
                                    <button class="btn btn-primary btn-xs price" data-toggle="modal" data-bpid="<?php echo $vo['bpid']; ?>" data-userid="<?php echo $vo['uid']; ?>" data-target="#myModal">处理/拒绝</button>

                                      <?php else: ?>
										                    <span class="color_green">已通过 </span>
                                        <button class="btn btn-primary btn-xs price" data-toggle="modal" data-bpid="<?php echo $vo['bpid']; ?>" data-userid="<?php echo $vo['uid']; ?>" data-target="#myModal">处理/拒绝</button>
                                      <?php endif; ?>

                                      

                                      <a href="<?php echo url('user/userbank',array('uid'=>$vo['uid'])); ?>"><button class="btn btn-primary btn-xs">签约</button></a>
                                      <a href="<?php echo url('order/orderlist'); ?>?username=<?php echo $vo['username']; ?>"><button class="btn btn-primary btn-xs">交易流水</button></a>

                                  </td>
                              </tr>
							<!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->

                              </tbody>
                          </table>
                      </section>


                      <?php echo $balance->render(); ?>
                </div>
              </div>
          </section>
      </section>
      <!--main content end-->
  </section>


  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="padding-top:200px">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background: #B50000;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">用户提现</h4>
      </div>
      <div class="modal-body">
        <div class="priceinfo color_red"></div><br>
        <div class="input-group">
           拒绝时备注：<textarea name="content" class="form-control cash_content" cols="60" rows="5"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
        <button type="button" class="btn btn-danger " onclick="dopay(3)">代付打款</button>
        <button type="button" class="btn btn-primary " onclick="dopay(1)">手动打款</button>
        <button type="button" class="btn btn-danger " onclick="dopay(2)">拒绝</button>
      </div>
    </div>
  </div>
</div>


    <!-- js placed at the end of the document so the pages load faster -->
    
    <script src="__ADMIN__/js/bootstrap.min.js"></script>
    <script src="__ADMIN__/js/jquery.scrollTo.min.js"></script>
    <script src="__ADMIN__/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="__ADMIN__/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="__ADMIN__/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="__ADMIN__/js/owl.carousel.js" ></script>
    <script src="__ADMIN__/js/jquery.customSelect.min.js" ></script>

    <!--common script for all pages-->
    <script src="__ADMIN__/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="__ADMIN__/js/sparkline-chart.js"></script>
    <script src="__ADMIN__/js/easy-pie-chart.js"></script>

    <!-- active -->
    <script src="/static/public/js/function.js"></script>
    
    <!-- date -->
    <script type="text/javascript" src="__ADMIN__/js/date/jquery.datetimepicker.js" charset="UTF-8"></script>

  </body>
</html>
<script>
var userid = '';
var bpid = '';
var content = '';
	$(".price").click(function(){
      userid = $(this).attr('data-userid');
      bpid = $(this).attr('data-bpid');
      $('.priceinfo').html('提现金额以实际“到账金额”为准，若同意提现，点击“同意”，若不同意提现点击“拒绝”');
      $('.cash_content').val('');
    });

    function dopay(type){
    	content = $('.cash_content').val();
      console.log(content);
    	var formurl = "<?php echo Url('user/dorecharge'); ?>";
    	var data = 'uid='+userid+'&bpid='+bpid+"&cash_content="+content+'&type='+type;
	    var locurl = "<?php echo Url('user/cash'); ?>";

	    WPpost(formurl,data,locurl);
    };


//时间选择器
$('#datetimepicker').datetimepicker();
$('#datetimepicker_end').datetimepicker();
</script>
