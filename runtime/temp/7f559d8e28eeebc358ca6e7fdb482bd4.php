<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/qq456dlht\view\login\login.html";i:1536835814;}*/ ?>
<!DOCTYPE html>


<html>
<!-- Head -->
<head>
<title>后台管理系统</title>
<!-- Meta-Tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="keywords" content="">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link href="/static/admin/login/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="/static/admin/login/css/style.css" type="text/css" media="all">
  
  
<script src="/static/admin/js/jquery.js"></script>
<script src="/static/admin/js/jquery-1.8.3.min.js"></script>
<script src="/static/layer/layer.js"></script>
  
</head>
<body>

	<h1>代理商后台管理系统</h1>
	<div class="w3layoutscontaineragileits">
	<h2>管理员登录</h2>
		<form action="" method="post" id="formid">
			<input type="text" name="username" placeholder="用户名" required>
			<input type="password" name="password" placeholder="密码" required>
			<ul class="agileinfotickwthree">
				<li>
					<input type="checkbox" id="brand1" value="1" name="rememberme">
					<label for="brand1"><span></span>记住我</label>
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input type="submit" onclick="return check_admin_login(this.form)" value="提交">
				<div class="clear"></div>
			</div>
		</form>
	</div>

	<script type="text/javascript" src="/static/admin/login/js/jquery-2.1.4.min.js"></script>
	<script src="/static/admin/login/js/jquery.magnific-popup.js" type="text/javascript"></script>
  	

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

      var formurl = "<?php echo Url('qq456dlht/login/login'); ?>"
      var data = $('#formid').serialize();
      $.post(formurl,data,function(data){
        if (data.type == 1) {

          layer.msg(data.data, {icon: 1,time: 1000},function(){
            window.location.href="<?php echo Url('qq456dlht/index/index'); ?>";
          }); 

        }else if(data.type == -1){
          layer.msg(data.data, {icon: 2}); 
                      window.location.href="<?php echo Url('qq456dlht/index/index'); ?>";

        }

      });

      return false;
   }
	</script>
</body>
</html>