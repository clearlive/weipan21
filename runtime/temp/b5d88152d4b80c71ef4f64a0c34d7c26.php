<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\index\index.html";i:1552486320;s:80:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\head-gaiban.html";i:1529895948;s:73:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\foot.html";i:1555586984;}*/ ?>
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
    <link href="/static/gaiban/css/xz-index.css" rel="stylesheet">
	<link href="/static/gaiban/css/xz-currency.css" rel="stylesheet">
<body class="sticky-header">

<section>
    <div class="main-content" style="margin-left:0px;" >
      	<!--头部开始-->
        <div class="header-section"   style="left: 0px;">
          	<div class="xg-left">
              	<a href="javascript :history.back(-1)" class=""></a>
          	</div>
        <!--头部导航文字-->
        	<h3 style="text-align: center;height: 16px;line-height: 10px;font-size: 18px;font-weight: 500;color: #65CEA7;">商品行情</h3>
		<!--头部导航文字-->
        </div>
      <!---轮播图-->

		
        <div class="row blog">
          <div class="col-md-12">
              <div class="panel" style="margin-bottom: 15px;">
                  <div class="panel-body">
                      <div id="c-slide" class="carousel slide auto" data-ride="carousel" data-interval="2000">
                          <ol class="carousel-indicators out">
                              <li class="active" data-slide-to="0" data-target="#c-slide" ></li>
                              <li class="" data-slide-to="1" data-target="#c-slide"  ></li>
                              <li class="" data-slide-to="2" data-target="#c-slide" ></li>
                          </ol>
                          <div class="carousel-inner blog-img-wide">
                              <div class="item text-center active">
                                  <img src="<?php echo $bannerimg1; ?>" alt="">
                              </div>
                              <div class="item text-center">
                                  <img src="<?php echo $bannerimg2; ?>" alt="">
                              </div>
                              <div class="item text-center">
                                  <img src="<?php echo $bannerimg3; ?>" alt="">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
     </div>
        
		
		
		
		
      
      <!--轮播图-->
      
      
      
      <!--填出其他页面-->
			 <div class="row" style="margin-bottom: 15px;">
                <div class="ico-bottom-left col-lg-6 col-xs-6 col-md-6">
                    <section style="padding-left: 10px;padding-right: 10px;background: #eff0f4;border-radius: 0px;">
                         <div class="panel-body btn btn-warning btn-block">
                               <a    href="/index/user/?id=chongzhi" >
                                   
                                    <div class="ico-title" style="color: #fff;">
                                          <h5>充值</h5>
                                   </div>
                              </a>
                            </div>
                         </section>
                     </div>
               
                <div class="ico-bottom-right  col-lg-6 col-xs-6 col-md-6">
                    <section   style="padding-left: 10px;padding-right: 10px;background: #eff0f4;border-radius: 0px;">
                         <div class="panel-body btn btn-success btn-lg btn-block">
                               <a href="/index/user/?id=tixian" >
                                   
                                    <div class="ico-title" style="color: #fff;">
                                          <h5>提现</h5>
                                   </div>
                              </a>
                            </div>
                         </section>
                     </div>
                
            
            </div>
	<!--填出其他页面-->
   	<!--商品-->
	
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">
                                <header class="panel-heading">
                                    实盘交易 
                                </header>
                                <div class="panel-body">
                                    <ul class="xz-ul activity-list">
									<!-- <?php if(is_array($pro) || $pro instanceof \think\Collection || $pro instanceof \think\Paginator): $i = 0; $__LIST__ = $pro;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> -->
                                        <li class="xz-dw" onclick="parent.location='<?php echo url('goods/goods',array('pid'=>$vo['pid'],'token'=>$token)); ?>';"  id="pid<?php echo $vo['pid']; ?>" class="gb-ul">
                                            <div class="avatar">
                                                <img src="<?php echo $vo['icoimg']; ?>" alt=""/>
                                            </div>
                                            <div class="activity-desk">

                                                <h5><a href="javascript:;" class="ng-binding prtitle"></a></h5>
                                                <p class="text-muted"><?php echo $vo['jianjie']; ?></p>
                                                <p class="text-muted-flaot text-muted"><a  href="javascript:;" class="ng-binding rise-value now-value"></a></p>
                                              	<p class="xz-jd text-muted fa fa-angle-right"></p>
                                            </div>
                                        </li>
                                    <!-- <?php endforeach; endif; else: echo "" ;endif; ?> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

    <!--商品-->
			
     
      
      
      
      
    </div>
</section>
 
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
  
  
  
<script>

var charturl = '<?php echo url("getchart"); ?>';
$.get(charturl,function(_res){


    var res = jQuery.parseJSON(Base64.decode(_res)); 

    $.each(res,function(k,v){
        $('.'+k).html(v);
    })
})

function pay_code_area() {
    $('.pay_code_area').hide();
}
</script>
<script src="__HOME__/js/lk/index.js">ajaxpro()</script>
  
<!-- Placed js at the end of the document so the pages load faster -->
<script src="/static/gaiban/js/jquery-1.10.2.min.js"></script>
<script src="/static/gaiban/js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="/static/gaiban/js/bootstrap.min.js"></script>
<script src="/static/gaiban/js/modernizr.min.js"></script>
<script src="/static/gaiban/js/jquery.nicescroll.js"></script>
  
  
  
<!--gritter script-->
<script type="text/javascript" src="/static/gaiban/js/gritter/js/jquery.gritter.js"></script>
<script src="/static/gaiban/js/gritter/js/gritter-init.js" type="text/javascript"></script>

<!--common scripts for all pages-->
<script src="/static/gaiban/js/scripts.js"></script>

</body>
</html>

