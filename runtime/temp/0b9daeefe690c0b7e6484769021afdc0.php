<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/admin\view\login\login.html";i:1555657653;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>总后台管理系统</title>

    <link href="__ADMIN__/gaiban/css/style.css" rel="stylesheet">
    <link href="__ADMIN__/gaiban/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
  	<script src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/jquery-1.8.3.min.js"></script>
<script src="/static/layer/layer.js"></script>
  
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" action="" method="post" id="formid">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">管理员登录</h1>
        </div>
        <div class="login-wrap">
            <input type="text" class="form-control" name="username" placeholder="账号" autofocus>
            <input type="password" class="form-control" name="password" placeholder="密码">

            <button class="btn btn-lg btn-login btn-block" type="submit" onclick="return check_admin_login(this.form)">
                <i class="fa fa-check"></i>
            </button>

           

        </div>

   
    </form>

</div>



<!-- Placed js at the end of the document so the pages load faster -->

<!-- Placed js at the end of the document so the pages load faster -->
<script src="__ADMIN__/gaiban/js/jquery-1.10.2.min.js"></script>
<script src="__ADMIN__/gaiban/js/bootstrap.min.js"></script>
<script src="__ADMIN__/gaiban/js/modernizr.min.js"></script>

  	

	<script>
		
      function check_admin_login (form)
   {
      $username = form.username.value;
      $password = form.password.value;
      if (!$username) {
        layer.msg('请输入用户名'); 
        return false;
      }

      if(!$password){
        layer.msg('请输入密码'); 
        return false;
      }

      var formurl = "<?php echo Url('admin/login/login'); ?>"
      var data = $('#formid').serialize();
      $.post(formurl,data,function(data){
        if (data.type == 1) {

          layer.msg(data.data, {icon: 1,time: 1000},function(){
            window.location.href="<?php echo Url('admin/index/index'); ?>";
          }); 

        }else if(data.type == -1){
          layer.msg(data.data, {icon: 2}); 
                      window.location.href="<?php echo Url('admin/index/index'); ?>";

        }

      });

      return false;
   }
	</script>
</body>
</html>
