<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\user\index.html";i:1555739702;s:80:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\head-gaiban.html";i:1529895948;s:73:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\foot.html";i:1555586984;}*/ ?>
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
<link href="/static/admin/gaiban/css/xz-currency.css" rel="stylesheet">
<link href="/static/admin/gaiban/css/xz-user.css" rel="stylesheet">
<script>

</script>
<style>

</style>
<body class="sticky-header user-body" style="position: relative;z-index: 1"   >

    <section>
        <div class="main-content" style="margin-left:0px;">

            <!--头部结束-->
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="user-body-top">
                                    <div class="user-top-img">
                                        <img src="__HOME__/img/logot.png" alt="">
                                    </div>
                                    <div class="user-top-name">
                                        <?php echo !empty($userinfo['nickname'])?$userinfo['nickname']:$userinfo['username']; ?>
                                    </div>
                                    <div class="user-top-grzc">
                                        <span>个人资产：</span>
                                        <img src="__HOME__/img/dd-ye1.png"
                                             alt=""><b><?php echo $userinfo['usermoney']; ?></b><span>CNY</span>

                                            <!--<?php if(is_array($bl) || $bl instanceof \think\Collection || $bl instanceof \think\Paginator): $i = 0; $__LIST__ = $bl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                                <p><?php echo $userinfo['usermoney']*($vo2['gamecoin']/$vo2['rmbcoin']); ?></p>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>-->
                                    </div>
                                    <div class="user-top-grzc1" style="margin-top:5px;margin-bottom:5px;">

                                    </div>
                                    <div class="user-top-cy">
                                        
                                        <ul class="clearfix">

                                            <li>
                                                <p>持仓手数</p>
                                                <p>持仓手数</p>
                                                <?php if(is_array($orders) || $orders instanceof \think\Collection || $orders instanceof \think\Paginator): $i = 0; $__LIST__ = $orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                	<p><?php echo $vo['orderCount']; ?></p>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                                
                                            </li>
                                            <li>
                                                <p>持有数量(USDT)</p>
                                                <p><?php echo $userinfo['userdollor']; ?></p>
                                                <!--<?php if(is_array($bl) || $bl instanceof \think\Collection || $bl instanceof \think\Paginator): $i = 0; $__LIST__ = $bl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                                <p><?php echo $userinfo['usermoney']*($vo2['gamecoin']/$vo2['rmbcoin']); ?></p>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>-->
                                            </li>

                                        </ul>
                                        
                                    </div>
                                    <div class="user-body-middle">
                                        <ul class="clearfix">
                                            <li>

                                                <a href="<?php echo url('cash'); ?>"  data-toggle="modal" id="tixian">
                                                    <div class="tb">提币</div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo url('recharge'); ?>" data-toggle="modal" id="chongzhi">
                                                    <div class="cz">充值</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- <div class="panel">
                                    <div class="panel-body p-states">
                                        <div class="summary pull-left">
                                            <h4><?php echo !empty($userinfo['nickname'])?$userinfo['nickname']:$userinfo['username']; ?><span></span>
                                            </h4>
                                            <p style="margin: 2px 0 0 0;"><?php if($userinfo['otype'] == 101): ?> (代理商
                                                邀请码：<?php echo $userinfo['uid']; ?>) <?php endif; ?></p>
                                            <p style="margin: 2px 0 0 0;"><?php if($userinfo['otype'] == 101): ?>
                                                (保证金：<?php echo !empty($userinfo['minprice'])?$userinfo['minprice']:'0'; ?>) <?php endif; ?></p>
                                            <h3>￥<?php echo $userinfo['usermoney']; ?></h3>
                                        </div>
                                        <div class="profile-pic-xg profile-pic"><img
                                                src="<?php echo !empty($userinfo['portrait'])?$userinfo['portrait']:'__HOME__/img/logobg.jpg'; ?>">
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>





                <div class="row">
                    <div class="col-md-12">
                        <!--弹出-->
                      
                         

                            <!--银行资料-->
                            <!-- 资金流水 -->
                            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1"
                                id="myModal3" class="modal fade">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header"
                                            style="background:linear-gradient(#00c6ff,#0072ff 100%)">
                                            <button aria-hidden="true" data-dismiss="modal" class="close"
                                                type="button">×</button>
                                            <h4 class="modal-title">资金流水</h4>
                                        </div>
                                        <div class="modal-body">
                                            <!--body wrapper start-->
                                            <div class="wrapper">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <ul class="activity-list">
                                                            <?php if(is_array($order_list) || $order_list instanceof \think\Collection || $order_list instanceof \think\Paginator): $i = 0; $__LIST__ = $order_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                            <li style="margin-bottom: 5px;padding-bottom: 5px;">
                                                                <div class="activity-desk"
                                                                    style="margin-left: 0px;width: 50%;float: left;">
                                                                    <h5 style="color:#333">状态：<?php echo $vo['title']; ?></h5>
                                                                    <p class="text-muted" style="color:#caaf4e;">
                                                                        余额： $<?php echo $vo['nowmoney']; ?></p>
                                                                    <p class="text-muted" style="    width: 180px;"><i
                                                                            class="fa fa-calendar"></i> <?php echo date('Y-m-d
                                                                        H:i:s',$vo['time']); ?></p>
                                                                </div>
                                                                <div class="xz-activity-desk">
                                                                    <h4>资金变动:<?php echo $vo['account']; ?></h4>
                                                                    <p style="text-align:right;">详情：<?php echo $vo['content']; ?></p>
                                                                </div>
                                                                <div class="xz-title-clear">

                                                                </div>
                                                            </li>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--body wrapper end-->
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <!-- 资金流水 -->


                        </section>
                        <!--弹出-->
                    </div>
                </div>


                <div class="row user-body-list">
                    <!-- <div class="ico-bottom-left col-lg-12 col-xs-12 col-md-12">
                        <section class="ico-bottom panel">
                            <div class="panel-body">
                                <a href="#myModal" data-toggle="modal"  id="chongzhi">
                                <a href="http://www.y7by.cn/codepay/" data-toggle="modal" id="chongzhi">
                                    <div class="avatar ">
                                        <div class="ioc-fa ioc-fa-coc"><i class="fa  fa-money ico-fa"></i></div>
                                    </div>
                                    <div class="ico-title">
                                        <h5>充值</h5>
                                    </div>
                                </a>
                            </div>
                        </section>
                    </div> -->
                    <!-- <div class="ico-bottom-center col-lg-12 col-xs-12 col-md-12">
                        <section class="ico-bottom panel">
                            <div class="panel-body">
                                <a href="#myModal2" data-toggle="modal" id="tixian">
                                    <div class="avatar ">
                                        <div class="ioc-fa ioc-fa-coc"><i class="fa  fa-rub ico-fa"></i></div>
                                    </div>
                                    <div class="ico-title">
                                        <h5>提现</h5>
                                    </div>
                                </a>
                            </div>
                        </section>
                    </div> -->
                    <div class="ico-bottom-right col-lg-12 col-xs-12 col-md-12">
                        <a href="#myModal3" data-toggle="modal">
                            <section class="ico-bottom panel">
                                <div class="panel-body">

                                    <div>
                                        <div class="ioc-fa ioc-fa-coc"></i></div>
                                    </div>
                                    <div class="ico-title">
                                        <h5><img src="__HOME__/img/user-zj.png" alt="">我的交易轨迹<img
                                                src="__HOME__/img/user-yjt.png" alt="" class="yjt"></h5>
                                    </div>

                                </div>
                            </section>
                        </a>
                    </div>
                    <div class="ico-bottom-left col-lg-12 col-xs-12 col-md-12">
                        <a href="<?php echo url('cashlist'); ?>">
                            <section class="ico-bottom panel">
                                <div class="panel-body" style="padding-left:5px;">

                                    <div>
                                        <div class="ioc-fa ioc-fa-coc"></div>
                                    </div>
                                    <div class="ico-title">
                                        <h5><img src="__HOME__/img/user-tx.png" alt="">提现记录<img
                                                src="__HOME__/img/user-yjt.png" alt="" style="right:15px;" class="yjt">
                                        </h5>
                                    </div>

                                </div>
                            </section>
                        </a>
                    </div>
                    <div class="ico-bottom-center col-lg-12 col-xs-12 col-md-12">
                        <a href="<?php echo url('reglist'); ?>">
                            <section class="ico-bottom panel">
                                <div class="panel-body">

                                    <div>
                                        <div class="ioc-fa ioc-fa-coc"></i></div>
                                    </div>
                                    <div class="ico-title">
                                        <h5><img src="__HOME__/img/user-cz.png" alt="">充值记录<img
                                                src="__HOME__/img/user-yjt.png" alt="" style="right:15px;" class="yjt">
                                        </h5>
                                    </div>

                                </div>
                            </section>
                        </a>
                    </div>
                    <div class="ico-bottom-right col-lg-12 col-xs-12 col-md-12">
                        <a href="<?php echo url('order/hold'); ?>">
                            <section class="ico-bottom panel">
                                <div class="panel-body">

                                    <div>
                                        <div class="ioc-fa ioc-fa-coc"></div>
                                    </div>
                                    <div class="ico-title">
                                        <h5><img src="__HOME__/img/user-dd.png" alt="">历史订单<img
                                                src="__HOME__/img/user-yjt.png" alt="" class="yjt"></h5>
                                    </div>

                                </div>
                            </section>
                        </a>
                    </div>
                    <!-- <div class="ico-bottom-left col-lg-12 col-xs-12 col-md-12">
                        <section class="ico-bottom panel">
                            <div class=" panel-body">
                                <a href="<?php echo url('ercode'); ?>">
                                    <div class="avatar ">
                                        <div class="ioc-fa ioc-fa-coc"><i class="fa fa-external-link-square ico-fa"></i>
                                        </div>
                                    </div>
                                    <div class="ico-title">
                                        <h5>分享二维码</h5>
                                    </div>
                                </a>
                            </div>
                        </section>
                    </div> -->
                    <div class="ico-bottom-center col-lg-12 col-xs-12 col-md-12">
                        <a href="<?php echo url('/index/login/respass'); ?>">
                            <section class="ico-bottom panel">
                                <div class="panel-body">

                                    <div>
                                        <div class="ioc-fa ioc-fa-coc"></div>
                                    </div>
                                    <div class="ico-title">
                                        <h5><img src="__HOME__/img/user-sz.png" alt="">个人设置<img
                                                src="__HOME__/img/user-yjt.png" alt="" class="yjt" style="right:15px;">
                                        </h5>
                                    </div>

                                </div>
                            </section>
                        </a>
                    </div>
                    <div class="ico-bottom-center col-lg-12 col-xs-12 col-md-12">
                        <a class="connect" href="javascript:void(0);">
                            <section class="ico-bottom panel">
                                <div class="panel-body">

                                    <div>
                                        <div class="ioc-fa ioc-fa-coc"></div>
                                    </div>
                                    <div class="ico-title">
                                        <h5><img src="__HOME__/img/user-sz.png" alt="">联系客服<img
                                                src="__HOME__/img/user-yjt.png" alt="" class="yjt" style="right:15px;">
                                        </h5>
                                    </div>

                                </div>
                            </section>
                        </a>
                    </div>

                    <div class="ico-bottom-right col-lg-12 col-xs-12 col-md-12">
                        <a href="javascript:;" onclick="app_exit()">
                            <section class="ico-bottom panel">
                                <div class="panel-body">

                                    <div>
                                        <div class="ioc-fa ioc-fa-coc"></div>
                                    </div>
                                    <div class="ico-title">
                                        <h5><img src="__HOME__/img/user-tc.png" alt="">退出<img
                                                src="__HOME__/img/user-yjt.png" alt="" class="yjt"></h5>
                                    </div>

                                </div>
                            </section>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

<div class="kefu hides" >
    <img style="width: 80%;height: 400px;" src="/codeimg/kefu.jpg" alt="">
</div>
    <div class="masks">

    </div>
    <style>
        .hides{
            display: none;
        }
        .isshow{
            width: 90%;position: absolute;display: flex;top:120px;left:5%;justify-content: center;align-items: center;z-index: 9999;
        }
        .mask{
            position: fixed;
            left: 0;
            top: 0;
            opacity: 0.2;
            background: #8cccec;
            z-index: 1000;
            width: 100000px;
            height: 100000px;
            overflow: hidden;
        }
    </style>
    <script>
        $(function () {
            $('.connect').click(function () {
                $('.kefu').addClass('isshow')
                $('.kefu').removeClass('hides')
                $('.masks').addClass('mask')
            })

            $('.masks').click(function () {
                $('.kefu').addClass('hides')
                $('.kefu').removeClass('isshow')
                $('.masks').removeClass('mask')
            })
            $('.kefu').click(function () {
                $('.kefu').addClass('hides')
                $('.kefu').removeClass('isshow')
                $('.masks').removeClass('mask')
            })
        })

    </script>

    
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

    <script src="__HOME__/js/lk/user.js"></script>
    <script src="__HOME__/js/lk/jquery.qrcode.js"></script>
    <script src="__HOME__/js/lk/utf.js"></script>
    <!--


  
<!-- Placed js at the end of the document so the pages load faster -->
    <script src="/static/admin/gaiban/js/jquery-1.10.2.min.js"></script>
    <script src="/static/admin/gaiban/js/jquery-ui-1.9.2.custom.min.js"></script>

    <script src="/static/admin/gaiban/js/bootstrap.min.js"></script>
    <script src="/static/admin/gaiban/js/modernizr.min.js"></script>
    <script src="/static/admin/gaiban/js/jquery.nicescroll.js"></script>

    <!--gritter script-->
    <script type="text/javascript" src="/static/admin/gaiban/js/gritter/js/jquery.gritter.js"></script>
    <script src="/static/admin/gaiban/js/gritter/js/gritter-init.js" type="text/javascript"></script>

    <!--common scripts for all pages-->
    <script src="/static/admin/gaiban/js/scripts.js"></script>

    <script type="text/javascript">
        function UrlSearch() {
            var name, value;
            var str = location.href; //取得整个地址栏
            var num = str.indexOf("?")
            str = str.substr(num + 1); //取得所有参数   stringvar.substr(start [, length ]

            var arr = str.split("&"); //各个参数放到数组里
            for (var i = 0; i < arr.length; i++) {
                num = arr[i].indexOf("=");
                if (num > 0) {
                    name = arr[i].substring(0, num);
                    value = arr[i].substr(num + 1);
                    this[name] = value;
                }
            }

        }
        var Request = new UrlSearch();
        var idnema = Request.id;
        //document.getElementById(idnema).click();
        if (idnema) {
            document.getElementById(idnema).click();
        };

//alert(Request.id);
// alert(Request.id);
//Request.id.click();
//$(Request.id).modal(options);


    </script>
    <script>
        $('#province').change(function () {
            var pid = $(this).val();
            if (pid != '') {
                var url = "/index/user/getarea.html" + "?id=" + pid;
                $.get(url, function (data) {
                    $("#city").html(data);
                });
            } else {
                $("#city").html('<option value="">请选择城市</option>');
            }


        });
        function respass() {
            location.href = "/index/login/respass.html"
        }
    </script>

</body>

</html>