<?php
namespace app\index\controller;
use think\Db;

$bpid = (int)$_REQUEST['bpid'];
$money = (int)$_REQUEST['money'];//人民币
$balance = Db::name('balance')->field('bpprice,bpbalance,bpbalancedollor')->where('bpid',$bpid)->find();
$bpprice = $balance['bpprice'];
$balanceData = array(
	'bptype'=>1,
	'isverified'=>1,
	'bpbalance'=>($balance['bpbalance']+$money),
	'bpbalancedollor'=>($balance['bpbalancedollor']+$bpprice),
	'remarks'=>'充值成功！');
//修改balance
$bpid = Db::name('balance')->where('bpid',$bpid)->update($balanceData);
if($bpid){
	$uid = $_REQUEST['uid'];
    $user = Db::name('userinfo')->field('usermoney,userdollor')->where('uid',$uid)->find();
    $balanceData = array(
	'usermoney'=>($user['usermoney']+$money),
	'userdollor'=>($user['userdollor']+$bpprice));
	//修改user
	Db::name('userinfo')->where('uid',$uid)->update($balanceData);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <meta http-equiv="Content-Type" content="application/xhtml+xml;charset=utf8"/>
    <meta http-equiv="Cache-Control" content="max-age=0"/>
   <title>支付成功</title>
</head>
<body>
<script>
alert("支付成功");

self.location ='/index/user/index/token/1'; 

</script>
</body>
</html>