<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:117:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\login\register.html";i:1553065427;s:114:"C:\Users\Administrator\Desktop\youpi\UPUPW_ANK_W64\WebRoot\Vhosts\weipan21/application/index\view\head-gaiban.html";i:1529895948;}*/ ?>
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
<script src="__HOME__/js/lk/user.js"></script>
<body class="login-body register-body">
 <style type="text/css">
 #code{

 font-size:20px;
 font-family:Arial; 
 font-style:italic; 
 font-weight:bold; 
 border:0; 
 letter-spacing:2px; 
 color:blue; 
 }
 </style>
 <div class="login-bg">
      <div class="register-top">
            <a href="<?php echo url('login/login'); ?>" class="login-top-img"><img src="__HOME__/img/back.png" alt=""></a> <h1 class="sign-title">返回登录页</h1>
           </div>
<div class="container">
      <div class="container-title" style="margin-top:15px;">
            <p> 注册账号</p>
            <img src="__HOME__/img/logot.png" alt="">
        </div>
   <form class="form-signin" method="post" id="formid" style="margin-bottom: 0 !important;" >
        


        <div class="login-wrap">
            <div class="login-item">
                  <div class="phone-img"><img src="__HOME__/img/login-nickname.png" alt=""></div>
                  <div class="phone"><input type="text" autofocus="" placeholder="请输入您的昵称" class="form-control nickname" name="nickname" >
                  </div>
              </div>
              <div class="login-item">
                  <div class="phone-img"><img src="__HOME__/img/user.png" alt=""></div>
                  <div class="phone"><input type="text" autofocus="" placeholder="请输入您的手机号码" class="form-control username" name="username" >
                  </div>
              </div>
              <div class="login-item" style="width:65%;display: inline-block;">
                  <div class="phone-img"><img src="__HOME__/img/paw.png" alt=""></div>
                  <div class="phone" > <input type="text" autofocus="" placeholder="请输入验证码" class="form-control" id = "input" />
                  </div>
                 
              </div>
              <div class="login-item" style="display: inline-block;background:none;">
                  <div style="position: relative;" id = "inputshow"> 
                        <span class="code_btn ng-binding"  onclick ="return get_svg();" id="check" style="background:#fff;padding:10px; border-radius:5px;color:#045ef8;margin-left:5px;position: relative;top:2px;">
                              获取验证码
                    </span> 
                       
                      </div>
              </div>
              <div class="login-item">
                  <div class="phone-img"><img src="__HOME__/img/paw.png" alt=""></div>
                  <div class="phone"> <input type="password" autofocus="" placeholder="请输入密码" class="form-control" name="upwd"> 
                  </div>
              </div>
              <div class="login-item">
                  <div class="phone-img"><img src="__HOME__/img/paw.png" alt=""></div>
                  <div class="phone"> <input type="password" autofocus="" placeholder="请输入密码" class="form-control" name="upwd2"> 
                  </div>
              </div>
              <div class="login-item">
                  <div class="phone-img"><img src="__HOME__/img/login-tj.png" alt=""></div>
                  <div class="phone">  <input type="text" autofocus="" placeholder="请输入邀请码" class="form-control" <?php if($oid): ?> value="<?php echo $oid; ?>" readonly="readonly" <?php endif; ?> placeholder="请输入邀请码" name="oid" >
                  </div>
              </div>
                <button  class="btn btn-lg btn-login btn-block" onclick="return checkform(this.form);">
                     立即注册
                  </button>
                  <a class="registration btn btn-lg btn-login btn-block" href="<?php echo url('login/login'); ?>" >
                     返回登陆页
                  </a>
          	</div>
        </div>

    </form>
   </div>
</div>
  <script type="text/javascript">
  function change(){
    code=$("#code");
  // 验证码组成库
   var arrays=new Array( 
       '1','2','3','4','5','6','7','8','9','0',
       'a','b','c','d','e','f','g','h','i','j', 
       'k','l','m','n','o','p','q','r','s','t', 
       'u','v','w','x','y','z', 
       'A','B','C','D','E','F','G','H','I','J', 
       'K','L','M','N','O','P','Q','R','S','T', 
       'U','V','W','X','Y','Z'        
       ); 
    codes='';// 重新初始化验证码
   for(var i = 0; i<4; i++){
   // 随机获取一个数组的下标
   var r = parseInt(Math.random()*arrays.length);
   codes += arrays[r];
  }
  // 验证码添加到input里
     code.val(codes);
  }
  change();
 code.click(change);
 //单击验证
  $("#check").click(function(){
   var inputCode = $("#input").val().toUpperCase(); //取得输入的验证码并转化为大写 
   console.log(inputCode);
  if(inputCode.length == 0) { //若输入的验证码长度为0
   //alert("请输入验证码！"); //则弹出请输入验证码
   	layer.msg('请输入验证码');
		return false; 
  }    
  else if(inputCode!=codes.toUpperCase()) { //若输入的验证码与产生的验证码不一致时
   //alert("验证码输入错误!请重新输入"); //则弹出验证码输入错误
   layer.msg('验证码输入错误!请重新输入');
   change();//刷新验证码
   $("#input").val("");//清空文本框
  }else { //输入正确时
   //alert("正确"); //弹出^-^
    
    var inputnone =document.getElementById("inputshow");
    inputnone.style.display="none";
    var  inputblock=document.getElementById("inputhide");
    inputblock.style.display="block";
    
  } 
  });
</script> 
<script>
function checkform(form){
	var nickname = form.nickname.value;
	var username = form.username.value;
	var upwd = form.upwd.value;
	var upwd2 = form.upwd2.value;
	var oid = form.oid.value;
	if(!nickname){
		layer.msg('请输入姓名');
		return false; 
	}

	if(!username){
		layer.msg('请输入手机号');
		return false; 
	}

	if (!upwd) {
		layer.msg('请输入登录密码'); 
		return false;
	}

	if (!upwd2) {
		layer.msg('请再次输入登录密码'); 
		return false;
	}

	if(upwd.length < 6 || upwd2.length < 6){
		layer.msg('密码长度大于6位'); 
		return false;
	}

	if(upwd != upwd2){
		layer.msg('两次输入密码不同'); 
		return false;
	}

	if(!oid){
		layer.msg('请输入邀请码');
		return false; 
	}


	var data = $('#formid').serialize();
    var formurl = "<?php echo Url('login/register'); ?>";
    var locurl = "<?php echo Url('/index/news/index/token/'.$token); ?>";

    WPpost(formurl,data,locurl);
    return false;
}
</script>


<script src="/static/gaiban/js/jquery-1.10.2.min.js"></script>
<script src="/static/gaiban/js/bootstrap.min.js"></script>
<script src="/static/gaiban/js/modernizr.min.js"></script>

</body>
</html>
