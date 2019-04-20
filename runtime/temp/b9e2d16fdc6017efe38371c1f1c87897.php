<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:114:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\login\login.html";i:1553062923;s:114:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\head-gaiban.html";i:1529895948;}*/ ?>
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

<body class="login-body">
    <div class="login-bg">
        <div class="container">
            <div class="container-title">
                <p> 您好，请登录</p>
                <img src="__HOME__/img/logot.png" alt="">
            </div>
            <form class="form-signin" method="post" id="formid">
                <!-- <div class="form-signin-heading text-center"> -->
                <!-- <h1 class="sign-title"><?php echo !empty($conf['web_name'])?$conf['web_name']:'登入'; ?></h1> -->
                <!-- </div> -->
                <div class="login-wrap">
                    <div class="login-item">
                        <div class="phone-img"><img src="__HOME__/img/user.png" alt=""></div>
                        <div class="phone"><input type="text" placeholder="请输入手机号" name="username" required=""
                                class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required">
                        </div>
                    </div>
                    <div class="login-item">
                        <div class="phone-img"><img src="__HOME__/img/paw.png" alt=""></div>
                        <div class="phone"><input type="password" placeholder="请输入密码" name="upwd" required=""
                                ng-keydown="go_signin()"
                                class="form-control ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required">
                        </div>
                    </div>

                   
                    <label class="checkbox">
                        <span class="pull-left">
                            <a href="<?php echo url('login/register'); ?>"> 没有账号？马上注册</a>
                        </span>
                        <span class="pull-right">
                            <a href="<?php echo url('login/respass'); ?>">忘记密码</a>
                        </span>
                    </label>
                    <button class="btn btn-lg btn-login btn-block" onclick="return checkform(this.form);">
                            登录
                        </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function checkform(form) {
            var username = form.username.value;
            var upwd = form.upwd.value;
            if (!username) {
                layer.msg('请输入用户名');
                return false;
            }

            if (!upwd) {
                layer.msg('请输入密码');
                return false;
            }

            var data = $('#formid').serialize();
            var formurl = "<?php echo Url('login/login'); ?>";
            var locurl = "<?php echo Url('/index/news/index/token/'.$token); ?>";

            WPloginpost(formurl, data, locurl);
            return false;
        }
    </script>
    <script src="/static/gaiban/js/jquery-1.10.2.min.js"></script>
    <script src="/static/gaiban/js/bootstrap.min.js"></script>
    <script src="/static/gaiban/js/modernizr.min.js"></script>
</body>

</html>