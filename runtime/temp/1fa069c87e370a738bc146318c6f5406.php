<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"C:\code\weipan21_2019-4-18\weipan21/application/index\view\user\recharge.html";i:1555668003;s:75:"C:\code\weipan21_2019-4-18\weipan21/application/index\view\head-gaiban.html";i:1529895948;s:68:"C:\code\weipan21_2019-4-18\weipan21/application/index\view\foot.html";i:1555586984;}*/ ?>
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
              	<a style="color:#333;" href="javascript:history.go(-1);" class="fa fa-angle-left"></a>
          	</div>
        <!--头部导航文字-->
        	<h3 style="text-align: center;height: 16px;line-height: 10px;font-size: 18px;font-weight: 500;color: #333;">充值</h3>
		<!--头部导航文字-->
        </div>
        <style>
            .asd{
                width: 100%;
                background: white;
                margin-top: 60px;
            }
            .payimg{
                display: flex;
                width: 100%;
				height: 80px;
                justify-content: center;
                align-items: center;
				position: relative;
            }
			.backgr{
				background: #EEEFF3;
				width: 100%;
				height: 15px;
			}
			.biankuang{
				border: 1px red solid;
				position: relative;
			}
			.xzjb{
				position: absolute;
				right: -23px;
				bottom: -12px;
			}

        </style>
		<form action="/index/pay/pays" method="post">
		<div class="asd">
			<div pay_type="1" class="payimg biankuang"><img src="/codeimg/alipay.jpg" alt=""><img class="xzjb" src="/codeimg/xzjb.png" alt=""></div>
			<div class="backgr"></div>
            <div pay_type="2" class="payimg"><img src="/codeimg/KJ.png" alt=""></div>
			<div class="backgr"></div>
			<div pay_type="5" class="payimg"><img src="/codeimg/weixin.jpg" alt=""></div>
		</div>
		<input name="pay_type" type="hidden" value="1">     <!--默认支付类型-->
		<input name="pay_money" type="hidden" value="200">  <!--默认支付金额-->

		<div class="money" style="width: 100%;height: 100px">

			<?php if(is_array($reg_push) || $reg_push instanceof \think\Collection || $reg_push instanceof \think\Paginator): $i = 0; $__LIST__ = $reg_push;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<p pay_money="<?php echo $vo; ?>" class="cash "><?php echo $vo; ?>元</p>
			<?php endforeach; endif; else: echo "" ;endif; ?>

			<style>
				.money{
            margin-top: 30px;
			margin-left: 1%;
				}
				.cash{
					display: inline-block;
					background: white;
				    width: 30%;
					height: 30px;
					line-height: 30px;
					margin: 5px 5px;
					text-align: center;
					box-shadow: 1px 1px 2px #333;
				}

				.checks{
					background: #0e90d2;
				}
			</style>
		</div>


		<div class="topay" >
			<button class="but">确认支付</button>
			<style>
				.topay{
					width: 100%;
					display: flex;
					justify-content: center;
					margin-top:100px;
				}
				.but{
					width: 70%;
					background: #ef6000;
					color: white;
					height: 50px;
					border-radius: 5px;
					border: none;
				}
			</style>
		</div>
		</form>
		<script>
			$('.payimg').click(function () {
				var _this = $(this)
				var pay_type = _this.attr('pay_type')
				$('input[name=pay_type]').val(pay_type)
				_this.addClass('biankuang')
				_this.siblings().removeClass('biankuang')
				_this.siblings().find('.xzjb').remove()
				_this.append('<img class="xzjb" src="/codeimg/xzjb.png" alt="">')
			})
			$('.cash').click(function () {
				var _this = $(this)
				var pay_money = _this.attr('pay_money')
				$('input[name=pay_money]').val(pay_money)
				_this.addClass('checks')
				_this.siblings().removeClass('checks')

			})
		</script>
      
      
      
      
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
  
 <script src="/static/index/js/lk/hold.js"></script>
<script type="text/javascript">
  change_category(0)
</script>




</body>
</html>