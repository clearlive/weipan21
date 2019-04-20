<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"C:\code\weipan21_2019-4-18\weipan21/application/index\view\order\hold.html";i:1555645292;s:75:"C:\code\weipan21_2019-4-18\weipan21/application/index\view\head-gaiban.html";i:1529895948;s:68:"C:\code\weipan21_2019-4-18\weipan21/application/index\view\foot.html";i:1555754923;}*/ ?>
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
	<link href="/static/gaiban/css/xz-hold.css" rel="stylesheet">
	<link href="/static/gaiban/css/xz-currency.css" rel="stylesheet">
<body class="sticky-header user-body-cz">
 <section>
  	<div class="main-content" style="margin-left:0px;" >
      	<!--头部开始-->
        <div class="header-section"   style="left: 0px;">
          	<div class="xg-left">
              	<a href="javascript:history.go(-1);" style="color:#333;" class="fa fa-angle-left"></a>
          	</div>
        <!--头部导航文字-->
        	<h3 style="text-align: center;height: 16px;line-height: 10px;font-size: 18px;font-weight: 500;color: #333;">交易记录</h3>
		<!--头部导航文字-->
        </div>		
		<div class="wrapper" style="margin-top: 45px;">		
			<div class="row">
                <div class="ico-bottom-center col-md-12">
                    <section class="panel">
                        <header class="panel-heading custom-tab ">
                            <ul class="nav nav-tabs">
                                <li class="xz-header active" onclick="change_category(0)" >
                                    <a href="#home" style="color:#333;" data-toggle="tab">持仓明细</a>
                                </li>
                                <li class="xz-header" onclick="change_category(1)">
                                    <a href="#about" style="color:#333;" data-toggle="tab">历史明细</a>
                                </li>
                            </ul>
                        </header>
                        <div class="panel-body ">
                            	<div class="tab-content trade_history_list ">
                              
                                      <div class="tab-pane active slider-left  " id="home"   data-index="0" >
                                              <ul class="activity-list">
                                                	
                                              </ul>
                                      </div>
                              	
                              	
                                      <div class="tab-pane slider-right" id="about"  data-index="1" >
                                              <ul class="activity-list uls">
                                              </ul>
                                      </div>
                                  
                            </div>
                        </div>
                    </section>
                </div>
             </div>	   
		</div>	
      	
			
      
      
      
      
    </div>
 </section>
 
<div style="width: 100%;height: 100px"></div>
<div class="foot-row row">
  <div class="col-sm-12" style="padding-left: 0px;padding-right: 0px;">
    <section class="panel" style="margin-bottom:0;">
      <div class="panel-body" style="padding: 0px;">
        <li class="col-md-12" style="margin-bottom: 0px;display: flex;justify-content: space-around;align-items: center;">
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
        <?php if($time_status==1):?>
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
         <?php endif;if($point_status==1):?>
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
 <?php endif;?>
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
  
 <script src="/static/index/js/lk/hold.js"></script>
<script type="text/javascript">
  change_category(0)
</script>


  
  
  
<script src="/static/gaiban/js/jquery-1.10.2.min.js"></script>
<script src="/static/gaiban/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/static/gaiban/js/bootstrap.min.js"></script>
<script src="/static/gaiban/js/modernizr.min.js"></script>
<script src="/static/gaiban/js/jquery.nicescroll.js"></script>

</body>
</html>