<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\point\point.html";i:1553274614;s:80:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\head-gaiban.html";i:1529895948;s:73:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\foot.html";i:1555586984;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="/favicon.ico" type="image/png">
	<!--title>奇帆科技演示</title-->
  	<title><?php echo !empty($conf['web_name'])?$conf['web_name']:'微交易'; ?></title>
    <link href="/static/gaiban/css/style.css" rel="stylesheet">
    <link href="/static/gaiban/css/style-responsive.css" rel="stylesheet">
	
  	<!--不可删除-->
    <script src="__HOME__/js/jquery-1.9.1.min.js"></script>
 	<script src="__HOME__/js/lk/order.js"></script>
    <script src="/static/layer/layer.js"></script>
    <script src="/static/public/js/function.js?v=<?php echo time();?>"></script>
    <script src="/static/public/js/base64.js"></script>
    <script type="text/javascript">
      	var Base64 = new Base64();
    </script>
    <!--不可删除-->  
  
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>
	<link href="/static/gaiban/css/xz-goods.css" rel="stylesheet">
	<link href="/static/gaiban/css/xz-currency.css" rel="stylesheet">

<style>
  /* .intro{
      background: #fe0000;
      color: #fff;
   	  border-right-color: #65CEA7;
      border: 1px solid rgba(255, 255, 255, 0.25);
  } */
  /* .intros{
  	 background: #00bd00;
      color: #fff;
   	  border-right-color: #65CEA7;
      border: 1px solid rgba(255, 255, 255, 0.25);
  } */
  .active{
    background-color: red;
  }
  .xz-li-span a.active{
    background-color: red;
    color:#0072ff;
    background:#fff;
    border:1px solid #0072ff;
  }
  .xz-li-span .bth-color{
      background:linear-gradient(#00c6ff,#0072ff 100%);
      color:#fff;
      border:1px solid transparent;
  }
</style>	




<script type="text/javascript">
window.onload=function(){
//设置适配rem
var change_rem = ((window.screen.width > 450) ? 450 : window.screen.width)/375*100;
document.getElementsByTagName("html")[0].style.fontSize=change_rem+"px";
window.onresize = function(){
change_rem = ((window.screen.width > 450) ? 450 : window.screen.width)/375*100;
document.getElementsByTagName("html")[0].style.fontSize=change_rem+"px";
}
}
</script>
<script type="text/javascript" src="__HOME__/js/lodash.min.js"></script>

<script>

var order_type = 0;
var order_pid = <?php echo $pro['pid']; ?>;
var order_price = <?php echo $pay_choose_arr[0]; ?>;
var order_sen = <?php echo $protime[0]; ?>;
var order_shouyi = <?php echo $proscale[0]; ?>;
var newprice = <?php echo $pro['Price']; ?>;  //实时价格
var rawData_data = [];
/*var my_money = <?php echo !empty($userinfo['usermoney'])?$userinfo['usermoney']:'0'; ?>;*/
var my_money = <?php echo !empty($userinfo['userdollor'])?$userinfo['userdollor']:'0'; ?>;
var order_min_price = <?php echo getconf('order_min_price'); ?>;
var order_max_price = <?php echo getconf('order_max_price'); ?>;


</script>



<body ng-app="starter" ng-controller="AppCtrl" class="good-body grade-a platform-browser platform-ios platform-ios9 platform-ios9_1 platform-ready sticky-header">

  
<ion-nav-bar class="bar-stable headerbar nav-bar-container" nav-bar-transition="ios" nav-bar-direction="exit" nav-swipe="">
	
  	    <!-- left side start-->
    <div class="left-side sticky-left-side">
			 <!--logo and iconic logo start-->
            <div class="logo" style="line-height: 50px;margin-left: 35px;">
                <a style="font-size: 23px;color: #65CEA7;">请选择品种</a>
            </div>

    </div>       
            <!--logo and iconic logo end-->
    

        <div class="left-side-inner">
                <div class="dd-index-top clearfix">
                        <div class="index-top-left col-lg-6 col-xs-6 col-md-6 clearfix" >
                            <img src="__HOME__/img/logot.png" alt="" class="dd-index-img">
                            <div class="dd-index-ye">
                                余额：
                                <span>≈</span>
                            </div>
                            <div class="index-top-left-right">
                                <p><img src="__HOME__/img/dd-ye.png" alt=""><span><?php echo $userinfo['userdollor']; ?></span> </p>
                                <p><img src="__HOME__/img/dd-ye1.png" alt=""><span><?php echo $userinfo['usermoney']; ?></span></p>
                            </div>
                        </div> 
                       
                        <div class="index-top-right clearfix">
                                <div class="ico-bottom-right dd-index-cc ">
                                        <section   >
                                             <div class="">
                                                   <a href="/index/user/?id=tixian" >
                                                       
                                                        <div class="ico-title" style="color: #fff;">
                                                              <span>持仓</span>
                                                       </div>
                                                  </a>
                                                </div>
                                             </section>
                                         </div>
                                <div class="ico-bottom-right dd-index-cz ">
                                        <section   >
                                             <div class="">
                                                   <a href="/index/user/?id=tixian" >
                                                       
                                                        <div class="ico-title" style="color: #fff;">
                                                              <span>提币</span>
                                                       </div>
                                                  </a>
                                                </div>
                                             </section>
                                         </div>
                                <div class="ico-bottom-left dd-index-tx">
                                    <section >
                                         <div class="">
                                               <!-- <a href="/index/user/?id=chongzhi" > -->
                                                  <a href="/index/user/?id=chongzhi" >
                                                    <div class="ico-title" style="color: #fff;">
                                                          <span>充值</span>
                                                   </div>
                                              </a>
                                            </div>
                                         </section>
                                     </div>
                               
                               
                        </div>
                     </div> 
            <!--sidebar nav start-->
            <ul class="nav nav-pills nav-stacked custom-nav xz-ul">
                    <!-- <?php if(is_array($proname1) || $proname1 instanceof \think\Collection || $proname1 instanceof \think\Paginator): $i = 0; $__LIST__ = $proname1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
                    
                      <li class="xz-dw look" onclick="parent.location='<?php echo url('point/point',array('pid'=>$vo['pid'],'token'=>$token)); ?>';"  id="pid<?php echo $vo['pid']; ?>" style="padding:10px 0;"><a ><span><?php echo $vo['ptitle']; ?></span></a>
                              
                       <span><i class="ng-binding  data-price<?php echo $vo['pid']; ?>"><?php echo $vo['Price']; ?></i> </span>
                        
                      </li>
                    <!-- <?php endforeach; endif; else: echo "" ;endif; ?> --> 
                  </ul>
            <!--sidebar nav end-->

        </div>
    
    <!-- left side end-->
    
    <!-- main content start-->
    <div class="main-content" style="background:#fff;" >

        <!-- header section start-->
        <!-- <div class="xz-header header-section"> -->

            <!--toggle button start-->
            <!-- <a class="xz-header-btn toggle-btn"><?php echo $pro['ptitle']; ?> <i class="fa fa-angle-double-down"></i></a> -->
            <!--toggle button end-->
       <!-- </div> -->
        <!-- header section end-->

	
    
 </ion-nav-bar>
<ion-nav-view class="view-container"  nav-view-transition="ios" nav-view-direction="exit" nav-swipe="">
<ion-view   class="trade-view pane"  hide-nav-bar="false" state="trade" nav-view="active" style="opacity: 1; transform: translate3d(0%, 0px, 0px);">
    
    <ion-content  class="trade-content content-background scroll-content ionic-scroll  has-header" scroll="true" style="top: 0px;"><div class="scroll" style="transform: translate3d(0px, 0px, 0px) scale(1);">
    	
 	<div >
      <!-- <div class="wrapper" style="padding-top: 0px;padding-bottom: 0px;"> 	 -->
          <!-- <header>
            	   <div class="panel-body" style="padding-top: 0px;padding-bottom: 0px;">
                            <div class="alert alert-info fade in" style="margin-bottom: 10px;">
                                <button type="button" class="close close-sm"  style="opacity: 10;">
                                    <i class="ng-binding rise data-price"><?php echo $pro['Price']; ?></i>
                                </button>
                                <strong class="goodstitle"><?php echo $pro['ptitle']; ?></strong> 
                            </div>
                    </div>
            </header> -->
    	
        
          
          	<!-- <div class="row">
                        <div class="col-md-12">
                            <section class="panel" style="margin-bottom:0px;">
                                <div class="panel-body">
                                    <div class="btn-group btn-group-justified">
                                        <a href="#" class="btn bth-color  Kxian"  onclick="change_chart_type('stock')"></a>
                                        <a href="#" class="btn bth-color  zoushi" onclick="change_chart_type('line')"></a>
                                      	 <div class="btn-group">
                                                <button data-toggle="dropdown" type="button" class="btn bth-color dropdown-toggle">时间  <span class="caret"></span>
                                                </button>
                                                <ul role="menu" class="dropdown-menu" style="background-color: #65CEA7;">
                                                    <li class="trade-chart-period 1M active" onclick="change_chart_period('1M')"><a href="#">1M</a></li> <li class="divider"></li>
                                                    <li class="trade-chart-period 5M" onclick="change_chart_period('5M')"><a href="#">5M</a></li> <li class="divider"></li>
                                                    <li   class="trade-chart-period 15M" onclick="change_chart_period('15M')"><a href="#">15M</a></li> <li class="divider"></li>
                                                    <li class="trade-chart-period 30M" onclick="change_chart_period('30M')"><a href="#">30M</a></li> <li class="divider"></li>
                                                    <li class="trade-chart-period 1H" onclick="change_chart_period('1H')"><a href="#">1H</a></li> <li class="divider"></li>
                                                    <li class="trade-chart-period 1D" onclick="change_chart_period('1D')"><a href="#">1D</a></li> 
                                                 	
                                                    
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>	 -->
        	<!-- </div> -->
      		
	
      
		<footer style="padding:0;overflow: hidden;margin-top: 20px;">
           <section  class="scroll clearfix">
                                <span class="text-muted xz-text-muted">
                                   开盘 <i class="ng-binding rise data-open" style=""><?php echo $pro['Open']; ?></i>
                                </span>
                                <span class="text-primary xz-text-muted">
                                    昨收 <i class="ng-binding rise data-high" style=""><?php echo $pro['Close']; ?></i>
                                </span>
                                <span class="text-success xz-text-muted">
                                    最低 <i class="ng-binding rise data-low" style=""><?php echo $pro['Low']; ?></i>
                                </span>
                                <span class="text-info xz-text-muted">
                                    最高 <i class=" ng-binding rise data-high" style=""><?php echo $pro['High']; ?></i>
                                </span>
              </section>
             <div id="container" >
               <div id="ecKx"></div>
              <!-- <div class="txt1"><span class="a"></span><span class="b"></span><span class="c"></span><span class="d"></span><span class="e"></span></div>
               
               <div class="txt2"><span class="a DIFF"><i></i></span><span class="b DEA"><i></i></span><span class="c MACD"><i></i></span></div>
				-->
             </div>
          	
      </footer>
        
	  </div>	
      
    </div><div class="scroll-bar scroll-bar-v"><div class="scroll-bar-indicator scroll-bar-fade-out" style="transform: translate3d(0px, 0px, 0px) scaleY(1); height: 0px;"></div></div></ion-content>
	<!-- 底部菜单-->
  
  <div class="foot-xiadan">
        <ul class="goods-bottom-ul clearfix" >
            
                <li class="trade-chart-period line " ><a href="#" onclick="change_chart_type('line')">走势</a></li>
                <li class="trade-chart-period 1M active" onclick="change_chart_period('1M','stock')"><a href="#">1M</a></li>
                <li class="trade-chart-period 5M" onclick="change_chart_period('5M','stock')"><a href="#">5M</a></li> 
                <li   class="trade-chart-period 15M" onclick="change_chart_period('15M','stock')"><a href="#">15M</a></li> 
                <li class="trade-chart-period 30M" onclick="change_chart_period('30M','stock')"><a href="#">30M</a></li> 
                <li class="trade-chart-period 1D" onclick="change_chart_period('1D','stock')"><a href="#">1D</a></li>
        </ul>
     <?php if($isopen == 1): ?>
                  <div class="col-md-12" style="padding-left: 0px;padding-right: 0px; ">
                       <section class="panel" style="margin-bottom: 40px;">
                                <div class="panel-body">
                                  	<!-- <div class="zx-zhxl"> 
                                        <span>账户余额:<code><?php echo $userinfo['usermoney']; ?></code></span>
                                      <span class="xz-right"><button class="btn btn-danger btn-sm" style="margin-top: -5px;"><a href="/index/user/?id=chongzhi" style="color: #fff;">立即充值</a></button></span>
                                    </div> -->
                                    <div class="btn-group btn-group-justified" style="margin-top:20px;">
                                        <a  style="color: #fff;" href="#myModal" data-toggle="modal" onclick="toggle_order_confirm_panel('lookup',2)"   class="btn bth-colorz " id ="btnyu">预购</a>
                                        <a  style="color: #fff;"  href="#myModal" data-toggle="modal" onclick="toggle_order_confirm_panel('lookdown',2)"  class="btn bth-colord " id="btnmd">预售 </a>
                                    </div>
                                  <div class="xz-foot-sj"> 
                                  	<span><?php echo $proclaima; ?></span>
                                  </div>
                               </div>
                        </section>
                   </div>
    <?php else: ?>
   					 <div class="col-md-12" style="padding-left: 0px;padding-right: 0px; ">
                       <section class="panel">
                                <div class="panel-body">
                                  	<!-- <div class="zx-zhxl"> 
                                        <span>账户余额:<code><?php echo $userinfo['usermoney']; ?></code></span>
                                      <span class="xz-right"><button class="btn btn-danger btn-sm" style="margin-top: -5px;"><a href="/index/user/?id=chongzhi" style="color: #fff;">立即充值</a></button></span>
                                    </div> -->
                                    <div class="btn-group btn-group-justified"  style="text-align: center;color: #65CEA7;background-color: #353539;border-radius: 5px;height: 34px;line-height: 34px;">
                                     
                                        <span >本时段已<span  ng-show="order_list" class="xiushi"></span></span>
                                    </div>
                                  <div class="xz-foot-sj"> 
                                  	<p style="margin: 0 0 20px;"><?php echo $proclaima; ?></p>
                                  </div>
                               </div>
                        </section>
                  </div>
    
   				
	<?php endif; ?>
  
  	
    </div>     
  
  
	<div class="row">
              <div class="col-lg-12">
                  <section class="panel">
                          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header" style="background:linear-gradient(#00c6ff,#0072ff 100%);">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                          <h4 class="modal-title goodstitle">买跌</h4>
                                      </div>
                                      <div class="modal-body">

                                          <form role="form">
                                              		
								
								
                                                <div class="panel-body">
                                                    <ul class="activity-list">
                                                        
                                                        <li> 
                                                            <div class="activity-desk">
                                                               
                                                                <span class="text-muted" style="color:#999;">交易产品</span>
                                                                <span class="text-muted-right goodstitle" style="color:#0072ff;"></span>
                                                            </div>
                                                        </li>
                                                      
                                                      
                                                      	<li> 
                                                            <div class="activity-desk">
                                                               
                                                                <span class="text-muted" style="color:#999;">实时报价</span>
                                                                <span class="text-muted-right col-nowprice "><?php echo $pro['Price']; ?></span>
                                                            </div>
                                                        </li>
                                                      		<li> 
                                                            <div class="activity-desk">
                                                                <span class="text-muted"  style="color:#999;">交易类型</span>
                                                                <span class="text-muted-right order_type ">预购</span>
                                                            </div>
                                                        </li>
                                                      
                                                      	<li> 
                                                            <div class="activity-desk">
                                                               
                                                                <span class="text-muted" style="color:#999;">账户余额</span>
                                                                <!--<span class="text-muted-right " style="color:#a94442;font-weight: bold;">  &yen;<?php echo $userinfo['usermoney']; ?></span>-->
                                                                <span class="text-muted-right " style="color:#a94442;font-weight: bold;">  $<?php echo $userinfo['userdollor']; ?></span>
                                                            </div>
                                                        </li>
                                                      
                                                      	<li class="xz-li"> 
                                                            <div class="activity-desk">
                                                               
                                                                <span class="text-muted" style="color:#999;">结算时间</span>
                                                              
                                                                <span class="xz-li-span"> 
                                                                  
                                                                 <div class="row state-overview">
                                                                   
                                                                  <?php if(is_array($protime) || $protime instanceof \think\Collection || $protime instanceof \think\Paginator): $k = 0; $__LIST__ = $protime;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                                                   <div class="progress progress-striped progress-xs" style="height: 60px;width: 46%; position: relative;margin: 5px;float: left; cursor:pointer;">
                                                                        <div style="width: 100%"  class="progress-bar progress-bar-danger">
                                                                            <div class=" xz-progress  progress-bar progress-bar-danger  period-widget <?php if($k==1): ?> active <?php endif; ?> "data-sen="<?php echo $vo; ?>" data-shouyi="<?php echo $proscale[$k-1]; ?>"  style="height: 60px;" >
                                                                                  <div class="title" style="font-size: 29px;margin-top: 14px;"><?php echo $vo; ?>点</div>
                                                                                  <div class="title" style="margin-top: 9px;"><?php echo $proscale[$k-1]; ?>%</div>
                                                                              </div>
                                                                        </div>
                                                                    </div>
                                                                  <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                </div> 
                                                              </span>
                                                             
                                                            </div>
                                                        </li>
                                                      	<li class=""> 
                                                            <div class="activity-desk"  style="text-align: center;">
                                                               
                                                                <span class="text-muted" style="color:#999;">交易金额</span>
                                                               <p class="invest_account ">
                                                              	<span class="text-muted <?php if($userinfo['usermoney'] > $pay_choose_arr[0]): ?> ng-hide <?php endif; ?> no-money">投资金额余额不足，请充值！</span>
                                                            	 <span class="text-muted ng-hide no-max">单笔投资金额不超过<?php echo getconf('order_max_price'); ?></span>
                                                              	<span class="text-muted ng-hide no-min">单笔投资金额不少于<?php echo getconf('order_min_price'); ?></span>
                                                                  </p>
                                                                <span class="xz-li-span"> 
                                                                  
                                                                  <div style="width: 100%;">
                                                                   	<?php if(is_array($pay_choose_arr) || $pay_choose_arr instanceof \think\Collection || $pay_choose_arr instanceof \think\Paginator): $k = 0; $__LIST__ = $pay_choose_arr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                                                        <a class="<?php if($k==1): ?> active <?php endif; ?> btn bth-color amount-box ng-binding" href="javascript:checkPrice(<?php echo $vo; ?>);" data-price="<?php echo $vo; ?>" style="width: 31%;    margin-top: 3px;">$<?php echo $vo; ?></a>
                                                                     <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                    
                                                                     
                                                                    </div>
                                                                
                                                                   <!--输入框 -->
                                                                  <div class="form-group row other-amount"style="padding-left: 15px;padding-right: 15px;margin-top: 15px;background-color: #fff;">
                                                                        <label class="col-md-5 col-xs-5 el-col-sm-5 control-label xg-je-title"  style="padding-right: 0px;margin-bottom: 0px;line-height: 30px;color: #7a7676;">输入金额:</label>
                                                                        <div class="col-md-7 col-xs-7 col-sm-7"   style="  padding-left: 0px;">
                                                                        <input type="number" id="order_price" class="form-control ng-pristine ng-untouched ng-valid ng-empty " data-trigger="hover" data-toggle="tooltip" title="" placeholder="请输入金额" data-original-title="请输入金额"  ng-init="onfocus=false" ng-focus="onfocus==true" ng-model="order_params.other_amount" ng-keydown="min_money()" >
                                                                        </div>
                                                                   </div>
                                                                  <!--输入框-->
                                                                  
                                                              </span>
                                                            </div>
                                                        </li>                          
                                                      
                                                    </ul>
                                                </div>
   			
                                              <button type="submit" class="xz-button btn an bth-colora  " onclick="addorder(2)"  ><a href="#myModal-1" data-toggle="modal"  aria-hidden="true" data-dismiss="modal" style="color: #fff;padding: 6px 12px;width: 100%;display: block;" class="order_type rise" >预购</a></button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
                         	
                    		<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal-1" class="modal fade">
                              
                                    <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                          <h4 class="modal-title goodstitle"></h4>
                                      </div>
                                      <div class="modal-body">
											 <div class="order_mengban" id="div2" style="width:100%;height:100%;"><div>
                                          <div >
                                              <div class="order-state-panel"  >

                                                  <div class="panel-body">
                                                      <div class="paysuccess  ng-hide" ng-show="order_result.status == 'SUCCESS'">
                                                          <div class="circle_wrapper" ng-show="order_params.cycle.time.indexOf('-') == -1">
                                                              <div class="right_circle">
                                                                  <img class="img_circle_right" style="-webkit-animation:linear;" src="__HOME__/img/right_circle1.png">
                                                              </div>
                                                              <div class="left_circle">
                                                                  <img class="img_circle_lift" style="-webkit-animation:linear;" src="__HOME__/img/left_circle1.png">
                                                              </div>
                                                          </div>
                                                          <div class="row remaining count_remaining xz-remaining" ng-show="order_params.cycle.time.indexOf('-') == -1" >
                                                              <div class="col">
                                                                  <div class="ng-binding pay_order_sen xz-title-col"></div>
                                                                  <div class="xz-xianjia">现价</div>
                                                                  <div class="ng-binding newprice"></div>
                                                              </div>
                                                          </div>
                                                          <div class="pupil_success ng-hide" ng-show="order_params.cycle.time.indexOf('-') >= 0">
                                                              <p>交易成功，等待结算</p>
                                                              <p class="ng-binding">
                                                                  <span>剩余时间：</span>
                                                                  天Invalid Date
                                                              </p>
                                                          </div>
                                                        
                                                       
                                                        <div class="panel-body info_list">
                                                            <ul class="activity-list">
                                                                <li> 
                                                                    <div class="activity-desk">
                                                                        <span class="text-muted">方向</span>
                                                                        <span class="text-muted-right pay_order_type"></span>
                                                                    </div>
                                                                </li>
                                                              	<li> 
                                                                    <div class="activity-desk">
                                                                        <span class="text-muted">金额</span>
                                                                        <span class="text-muted-right ng-binding">$<i class="pay_order_price"></i></span>
                                                                    </div>
                                                                </li>
                                                              		<li> 
                                                                    <div class="activity-desk">
                                                                        <span class="text-muted">执行价</span>
                                                                        <span class="text-muted-right pay_order_buypricee"></span>
                                                                    </div>
                                                                </li>
                                                              		<li> 
                                                                    <div class="activity-desk">
                                                                        <span class="text-muted">预测结果</span>
                                                                        <span class="text-muted-right yuce">$</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                             			  </div>                                                                                                         
                                                      </div> 
                                                        

                                                      <div class="wait" ng-show="order_result.status == 'POST'">
                                                          <div class="row">
                                                              <div class="col ng-binding">
                                                                  <i class="ion-paper-airplane"></i>
                                                                  请稍后……
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="fail ng-hide" ng-show="order_result.status == 'FAIL'">
                                                          <div class="row">
                                                              <div class="col ng-binding">
                                                                  <i class="ion-close-circled"></i>
                                                                  正在提交订单
                                                              </div>
                                                          </div>
                                                      </div>

                                                      <div class="fail ng-hide order_fail" ng-show="order_result.status == 'FAIL'" style="">
                                                          <div class="row">
                                                              <div class="col ng-binding">
                                                                  <i class="ion-close-circled"></i>
                                                                  <span class="fail-info" style="    font-size: 18px;color: #fff;"></span>
                                                              </div>
                                                          </div>
                                                      </div>


                                              
                                                        	
                                                        
                                                         <div class="panel-body ordersuccess ng-hide">
                                                              
                                                               
                                                                       
                                                                            <div class="panel-body p-states remaining finish_remaining" >
                                                                                <div class="summary pull-left" style="margin-left: 37%;">
                                                                                    <h4 style="text-align: center;">到期结算完成</h4>
                                                                                   
                                                                                    <h3 class="result_profit ng-binding " >$ 5,600</h3>
                                                                                </div>
                                                                               
                                                                            </div>
                                                                       
                                                               
                                                            <ul class="activity-list info_list">
                                                                <li> 
                                                                    <div class="activity-desk">
                                                                        <span class="text-muted">方向</span>
                                                                        <span class="text-muted-right pay_order_type"></span>
                                                                    </div>
                                                                </li>
                                                              	<li> 
                                                                    <div class="activity-desk">
                                                                        <span class="text-muted">金额</span>
                                                                        <span class="text-muted-right ng-binding">$<i class="pay_order_price"></i></span>
                                                                    </div>
                                                                </li>
                                                              		<li> 
                                                                    <div class="activity-desk">
                                                                        <span class="text-muted">执行价</span>
                                                                        <span class="text-muted-right pay_order_buypricee"></span>
                                                                    </div>
                                                                </li>
                                                              		<li> 
                                                                    <div class="activity-desk">
                                                                        <span class="text-muted">成交价</span>
                                                                        <span class="text-muted-right endprice">$</span>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                             			  </div>                      
									                     <button type="submit" class="xz-button btn bth-color "aria-hidden="true" data-dismiss="modal" onclick="continue_order(2)"   >继续下单</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            </div>
                                          
                                      </div>
                                  </div>
                              </div>
                              
                              
							</div> 
                  </section>
              </div>
          </div>


<div style="width: 100%;height: 100px"></div>
<div class="foot-row row">
  <div class="col-sm-12" style="padding-left: 0px;padding-right: 0px;">
    <section class="panel" style="margin-bottom:0;">
      <div class="panel-body" style="padding: 0px;">
        <li class="col-md-12" style="margin-bottom: 0px;">
          <div class="xiugai-left">
            <div class="avatar ">
              <a href="<?php echo url('news/index'); ?>">

                <?php if($actionname == 'news'): ?>
                <img src="__HOME__/img/foot-sy.png" alt="" width="60px">


                <?php else: ?>
                <img src="__HOME__/img/foot-sywx.png" alt="" width="60px">
                <?php endif; ?>

              </a>
            </div>
          </div>
          <div class="xiugai-left">
            <div class="avatar">
              <a href="<?php echo url('/index/goods/goods/token/'.$token); ?>">

                <?php if($actionname == 'goods'): ?>
                <img src="__HOME__/img/foot-zq.png" alt="" width="60px">


                <?php else: ?>
                <img src="__HOME__/img/foot-zqwx.png" alt="" width="60px">
                <?php endif; ?>

              </a>
            </div>
          </div>
          <div class="xiugai-left">
            <div class="avatar">
              <a href="<?php echo url('/index/point/point/token/'.$token); ?>" class=" ">
                <?php if($actionname == 'point'): ?>
                <img src="__HOME__/img/foot-dd.png" alt="" width="60px">


                <?php else: ?>
                <img src="__HOME__/img/foot-ddwx.png" alt="" width="60px">
                <?php endif; ?>
              </a>
            </div>
          </div>

          <div class="xiugai-left">
              <div class="avatar">
                <a href="<?php echo url('/index/user/index/token/'.$token); ?>" class="">
  
                  <?php if($actionname == 'user'): ?>
                  <img src="__HOME__/img/foot-user.png" alt="" width="60px">
  
  
                  <?php else: ?>
                  <img src="__HOME__/img/foot-userwx.png" alt="" width="60px">
                  <?php endif; ?>
  
                </a>
              </div>
            </div>

        </li>
      </div>
    </section>
  </div>
  <style>
    .tab-item-active {
      color: rgb(236, 181, 64) !important;
    }
  </style> 
  <!-- 底部菜单结束-->
 </div> 
 <script> 
  
 $(".bth-colorz").bind("click",function(){
        // del(this);
   	$(".bth-colora").removeClass("intros");
   	$(".bth-colora").addClass("intro");
   //	alert("niho");
    });
   
  $(".bth-colord").bind("click",function(){
        // del(this);
   	$(".bth-colora").removeClass("intro");
   	$(".bth-colora").addClass("intros");
   //	alert("niho");
    })
</script>
  
  <SCRIPT LANGUAGE=javascript>
String.prototype.getQueryString = function(name)
{
  var reg = new RegExp("(^|&|\\?)"+ name +"=([^&]*)(&|$)"), r;
  if (r=this.match(reg)) return unescape(r[2]); return null;
};
var sId = location.search.getQueryString("id");
  if(sId){
    if(document.all) {
		document.getElementById(sId).click();
	}
	// 其它浏览器
	else {
		var e = document.createEvent("MouseEvents");
		e.initEvent("click", true, true);
		document.getElementById(sId).dispatchEvent(e);
	}
  }    
   // document.getElementById("chongzhi").click();
   // alert(sId);

</SCRIPT>
  
    <script src="__HOME__/js/lk/chardata.js"></script>
    <script src="__HOME__/js/echarts.js"></script>
    <script src="__HOME__/js/m.js"></script>
    <script>
  
    
    //setInterval('getdata(<?php echo $pro['pid']; ?>)', 1000);
    //window.setInterval('getMaindata()',5000);
    //setInterval("window.location.reload();",1000*60*5);
    var productArr = eval('<?php echo json_encode($proname1);?>');
	setInterval('flashPrice(productArr)', 1000);
    var titurl = '<?php echo url("goodsinfo"); ?>'
    $.post(titurl, 'pid=<?php echo $pro['pid']; ?>', function(_res){
          
        var res = jQuery.parseJSON(Base64.decode(_res)); 

        if(res.ptitle){
            $('.goodstitle').html(res.ptitle);
        }else{
           // history.go(-1);
        }
    })

    var charturl = '<?php echo url("getchart"); ?>';
    $.get(charturl,function(_res){
        
          
        var res = jQuery.parseJSON(Base64.decode(_res)); 
        

        $.each(res,function(k,v){
            $('.'+k).html(v);
        })
    })
    
    </script>

    <script>
    var flag = false;
    var cur = {
        x:0,
        y:0
    }
    var nx,ny,dx,dy,x,y ;
    function down(){
        flag = true;
        var touch ;
        if(event.touches){
            touch = event.touches[0];
        }else {
            touch = event;
        }
        cur.x = touch.clientX;
        cur.y = touch.clientY;
        dx = div2.offsetLeft;
        dy = div2.offsetTop;
    }
    function move(){

        if(flag){
            var touch ;
            if(event.touches){
                touch = event.touches[0];
            }else {
                touch = event;
            }
            nx = touch.clientX - cur.x;
            ny = touch.clientY - cur.y;
            x = dx+nx;
            y = dy+ny;
            div2.style.left = x+"px";
            div2.style.top = y +"px";
            //阻止页面的滑动默认事件
            document.addEventListener("touchmove",function(){
                event.preventDefault();
            },false);
        }
    }
    //鼠标释放时候的函数
    function end(){
        flag = false;
    }
    var div2 = document.getElementById("div2");
    div2.addEventListener("mousedown",function(){
        down();
    },false);
    div2.addEventListener("touchstart",function(){
        down();
    },false)
    div2.addEventListener("mousemove",function(){
        move();
    },false);
    div2.addEventListener("touchmove",function(){
        move();
    },false)
    document.body.addEventListener("mouseup",function(){
        end();
    },false);
    div2.addEventListener("touchend",function(){
        end();
    },false);
    //设置一个默认价格
    $("#order_price").val(100);
    function checkPrice(price){
    	$("#order_price").val(price);
    } 
    $(document).on('click','.goods-bottom-ul li',function(){
        $(this).addClass('active').siblings('.trade-chart-period').removeClass('active')
    })
</script>

        
                <!-- Placed js at the end of the document so the pages load faster -->

<script src="/static/gaiban/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/static/gaiban/js/bootstrap.min.js"></script>
<script src="/static/gaiban/js/jquery.nicescroll.js"></script>
  
   
<!--gritter script-->
<script type="text/javascript" src="/static/gaiban/js/gritter/js/jquery.gritter.js"></script>
<script src="/static/gaiban/js/gritter/js/gritter-init.js" type="text/javascript"></script>

<!--common scripts for all pages-->
<script src="/static/gaiban/js/scripts.js"></script>
        
</ion-modal-view></div></div></body></html>