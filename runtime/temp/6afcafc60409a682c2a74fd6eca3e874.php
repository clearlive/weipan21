<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"C:\code\weipan21_2019-4-18\weipan21/application/index\view\user\cash.html";i:1555747885;s:75:"C:\code\weipan21_2019-4-18\weipan21/application/index\view\head-gaiban.html";i:1529895948;}*/ ?>
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
<link href="/static/index/css/style.css" rel="stylesheet">
<link href="/static/index/css/cash.css" rel="stylesheet">
<body class="login-body respass-body">
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
 .container{
   padding:0;
 }
 body{
   background: #f5f5f5;
 }
 a{
    text-decoration:none; 
 }
 
 </style>
<div class="container">
    <div class="login-top">
      <a href="javascript:history.go(-1);" class="login-top-img"><img src="__HOME__/img/ic_back.png" alt=""></a> <h1 class="sign-title">提现</h1>
     </div>
   <form class="form-signin" method="post" id="formid" >
         
        <div class="login-wrap">
            
            <?php if(!isset($mybank)): ?>
            <header class="ifnone_add_bank">
                <a href="<?php echo Url('index/user/dobanks'); ?>">
                    <p>+</p>
                    <p>添加银行卡</p>
                </a>
            </header>
            <?php else: ?>
	        <header class="coldbg hotbg"  style="">
	        	<p class="ng-binding"><?php echo $mybank['bank_nm']; ?> </p><span class="editc">可提现：<?php echo $userinfo['usermoney']; ?> 元</span><p class="ng-binding">帐号：<?php echo isset($mybank)?$mybank['accntno']:''; ?></p>
	        	<i class="iconfont red"><?php echo substr($mybank['bank_nm'],0,3); ?></i>
            </header>
           

            <div class="respass-cz">
                <div class="respass-title clearfix"><div class="fk"></div>提现金额</div>
                <div class="login-item">
                    <div class="phone-img"><img src="__HOME__/img/dd-ye1.png" alt=""></div>
                    <div class="phone"> <input type="number" autofocus="" placeholder="最少提现￥<?php echo $conf['cash_min']; ?>" class="form-control cash-price" name="price" >
                    </div>
                </div>
            </div>
            
            <div class="respass-cz" style="margin-top:30px;">
                <div class="respass-title"><div class="fk"></div>银行卡信息</div>
                <div class="login-item">
                    <div class="phone-img"><img src="__HOME__/img/user.png" alt=""></div>
                    <div class="phone">  <input type="text" autofocus="" placeholder="真实姓名" class="form-control" name="name" value="<?php echo isset($mybank)?$mybank['accntnm']:''; ?>"> 
                    </div>
                </div>
                <div class="login-item">
                    <div class="phone-img"><img src="__HOME__/img/login-nickname.png" alt=""></div>
                    <div class="phone">  <input type="text" autofocus="" placeholder="开户地址" class="form-control" name="address"  value="<?php echo isset($mybank)?$mybank['address']:''; ?>"> 
                   
                    </div>
                </div>
                <div class="login-item">
                    <div class="phone-img"><img src="__HOME__/img/login-tj.png" alt=""></div>
                    <div class="phone"> <input type="text" autofocus="" placeholder="联系方式" class="form-control"  name="phone" value="<?php echo isset($mybank)?$mybank['phone']:''; ?>">
                    </div>
                </div>
            </div>
           
            <?php endif; ?>
            <!-- <footer>
                    余额：<span class="ng-binding"><?php echo $userinfo['usermoney']; ?></span>
                    手续费：<span  class="ng-binding reg_par" attrdata="<?php echo $conf['reg_par']; ?>"><?php echo $conf['reg_par']; ?>%</span>
                    实际到账：<span  class="ng-binding true_price" style="display:none"></span>
             </footer> -->
            <div class="registration">
                <a href="<?php echo Url('index/user/dobanks'); ?>" class="">
                  ——&nbsp;&nbsp;修改银行卡&nbsp;&nbsp;——
                </a>
            </div>
        </div>
        <button  class="btn btn-lg btn-login btn-block respass-qr" onclick="return checkform(this.form)">
            确定
        </button>
    </form>

</div>
<script type="text/javascript">
  
</script> 
<script>
function checkform(form){
	var price = form.price.value;
	var name = form.name.value;
	var address = form.address.value;
    var phone = form.phone.value;
	if(!price){
		layer.msg('请输入提现金额');
		return false; 
	}

	if (!name) {
		layer.msg('请输入姓名'); 
		return false;
	}

	if (!address) {
		layer.msg('请输入开户行地址'); 
		return false;
	}

	if (!phone) {
		layer.msg('请输入联系方式'); 
		return false;
	}

	var data = $('#formid').serialize();
    var formurl = "<?php echo Url('index/user/cash'); ?>";
    var locurl = "<?php echo Url('index/user/index'); ?>";

    WPpost(formurl,data,locurl);
    return false;
}
</script>


<script src="/static/gaiban/js/jquery-1.10.2.min.js"></script>
<script src="/static/gaiban/js/bootstrap.min.js"></script>
<script src="/static/gaiban/js/modernizr.min.js"></script>

</body>
</html>
