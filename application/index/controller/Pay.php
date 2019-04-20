<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Cookie;

use wxpay\database\WxPayUnifiedOrder;
use wxpay\JsApiPay;
use wxpay\NativePay;
use wxpay\PayNotifyCallBack;
use think\Log;
use wxpay\WxPayApi;
use wxpay\WxPayConfig;

use alipay\wappay\buildermodel\AlipayTradeWapPayContentBuilder;
use alipay\wappay\service\AlipayTradeService;
use pinganpay\Webapp;
use pufapay\ConfigUtil;
use pufapay\HttpUtils;
use pufapay\SignUtil;
use pufapay\TDESUtil;
use app\index\controller\Common;


class Pay extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->parter1 = 1729;
        $this->key1 = '3177204082c74e4db0f24ae2d5290617';
        $this->parter2 = 2865;
        $this->key2 = '57a599aafd1342f8be3b31417883186f';
    }

    public function checkstatus()
	{ 
  		$order_no = $_GET['sn'];
  
        $balance = db('balance')->where('balance_sn',$order_no)->find();
    	if($balance['isverified']==1){
            return 1;
        }else{
            return false;
        }
  	}
	
    public function nuoweip_notify()
	{ 
      	//file_put_contents( dirname(__FILE__).'/HB__userChargeGETbtc.txt', var_export( $_POST, true ), FILE_APPEND );  
        
    if($_POST){
        $post=$_POST;
        $data["textcont"]=json_encode($post);
        $sign=md5($_POST["order_id"].$_POST["orderNo"].$_POST["money"].$_POST["mch"].$_POST["pay_type"].$_POST["time"].md5("07a409738d459972d5c9a64fa7e95f06"));
        if($sign==$_POST['sign']){
         	
         		$this->qfgbnotifyokdopay($_POST["order_id"],$_POST["money"]/100);
  
                exit('SUCCESS');
                
				
        }else{
            echo '签名失败！';
            die;
        }
    }     
        exit('fail');      

 	}
 
  
   
	
    public function qujuh_notify()
	{ 

		file_put_contents( dirname(__FILE__).'/qyf_get.txt', var_export( $_GET, true  ), FILE_APPEND  );
		file_put_contents( dirname(__FILE__).'/qyf_post.txt', var_export( $_POST, true  ), FILE_APPEND  );
		 
      
      // 1.接收返回字段
      	$Md5key = 'djvtmo2x0a8gziofa08pr3lwyja9wfze';
        $returnArray = array(
            "memberid" => $_POST['memberid'], // 商户ID
            "orderid" => $_POST['orderid'], // 商户订单号
            "amount" => $_POST['amount'], // 交易金额，默认使用字符串形式,0.10 转float的时候变成0.1,会影响签名
            "datetime" => $_POST['datetime'], // 交易时间
            "transaction_id" => $_POST['transaction_id'], // 平台支付流水号
            "returncode" => $_POST['returncode'], //返回的状态码
        );
        ksort($returnArray);
        $md5str = "";
        foreach ($returnArray as $key => $val) {
            $md5str = $md5str . $key . "=" . $val . "&";
        }
        //生成签名
        $sign_md5 = strtoupper(md5($md5str . "key=" . $Md5key));
        $sign = $_POST['sign'];     
		if( $sign_md5 == $sign ) 
		{
			 $this->qfgbnotifyokdopay($_POST['orderid'], $_POST['amount']);
          		exit('OK');

		} else {
        echo 'signerr';
    	}

 	}
 
  
   
	
    public function edf_notify()
	{ 
header('Content-Type:text/html;charset=utf8');
date_default_timezone_set('Asia/Shanghai');
$userkey='e41b858fa06617ecd67a2be994e31c604b68b3a2';
		//file_put_contents( dirname(__FILE__).'/mobaonew_________log_GET.txt', var_export( $_GET, true ), FILE_APPEND );
		//file_put_contents( dirname(__FILE__).'/mobaonew_________log_POST.txt', var_export( $_POST, true ), FILE_APPEND );
		//file_put_contents( dirname(__FILE__).'/mobaonew_________log_input.txt', file_get_contents("php://input"), FILE_APPEND );
//require_once 'inc.php';
$status=$_POST['status'];
$customerid=$_POST['customerid'];
$sdorderno=$_POST['sdorderno'];
$total_fee=$_POST['total_fee'];
$paytype=$_POST['paytype'];
$sdpayno=$_POST['sdpayno'];
$remark=$_POST['remark'];
$sign=$_POST['sign'];

$mysign=md5('customerid='.$customerid.'&status='.$status.'&sdpayno='.$sdpayno.'&sdorderno='.$sdorderno.'&total_fee='.$total_fee.'&paytype='.$paytype.'&'.$userkey);

if($sign==$mysign){
    if($status=='1'){
      
      			$this->qfgbnotifyokdopay($sdorderno,$total_fee );

        echo 'success';
    } else {
        echo 'fail';
    }
} else {
    echo 'signerr';
}
 	}
 

    /**
     * 秒冲宝
     * @author lukui  2017-09-18
     * @return [type] [description]
     */
    public function mcpay($data)
    {
        return $data;

    }

    public function qianxing_notify(){
        include "common.php";
        $data = array();
        $data['version']=$_REQUEST['version'];
        $data['merchantId']=$_REQUEST['merchantId'];
        $data['orderId']=$_REQUEST['orderId'];
        $data['orderTime']=$_REQUEST['orderTime'];
        $data['amount']=$_REQUEST['amount'];
        $data['platformId']=$_REQUEST['platformId'];
        $data['status']=$_REQUEST['status'];
        $data['signType']=$_REQUEST['signType'];
        $mer_key = 'c4a9bbcde8f740a58cd4c9fe22ad15c4';

        // 初始化
        $common = new Common($mer_key);
        // 准备待签名数据
        $str_to_sign = $common->prepareSign($data);
        // 验证签名
        $resultVerify = $common->verify($str_to_sign, $_REQUEST['sign']);

        if ($resultVerify)
        {
            $this->qfgbnotifyokdopay($data['orderId'],$data['amount']);
            echo "SUCCESS";
            // 签名验证通过

            /*商户需要在此处判定通知中的订单状态做后续处理*/
            /*由于页面跳转同步通知和异步通知均发到当前页面，所以此处还需要判定商户自己系统中的订单状态，避免重复处理。*/

            // 根据$data['orderId']商户订单号，判定商户自己系统中的订单是否存在且未支付
            /*
            if(订单存在且未支付)
            {
                更新商户自己系统中的订单为支付成功，并完成其它业务处理
                //回写SUCCESS，确认回调成功
                echo "SUCCESS";
            }
            */
        }else{
            echo "验证签名失败";
        }
    }

    public function pays(){
<<<<<<< HEAD
        if ($_REQUEST['pay_type'] == 1){    //支付宝1
            include ('sign.php');
            $price = sprintf("%.2f",$_POST['pay_money']);
            //请求获取的网页类型，json 返回json数据，text直接跳转html界面支付，如没有特殊需要，建议默认text即可
            $content_type = 'text';
            //商户ID->到平台首页自行复制粘贴
            $account_id = '10522';
            //S_KEY->商户KEY，到平台首页自行复制粘贴，该参数无需上传，用来做签名验证和回调验证，请勿泄露
            $s_key = '4BDA4B88355765';
            //订单号码->这个是四方网站发起订单时带的订单信息，一般为商户名，交易号，等字段信息
            $out_trade_no = date("YmdHis") . mt_rand(10000,99999);
            //支付通道：支付宝：alipay_auto、微信：wechat_auto、支付宝转卡：alipay_bank   支付宝红包收款 ：alipay_bonus
            $thoroughfare = 'wechat_auto';
            //支付金额
            $amount = $price;
            // $amount = 1.23;
            //生成签名
            $sign = sign($s_key, ['amount'=>$amount,'out_trade_no'=>$out_trade_no]);
            //轮训状态，是否开启轮训，状态 1 为关闭   2为开启
            $robin = 2;
            //微信设备KEY，新增加一条支付通道，会自动生成一个device Key，可在平台的公开版下看见，如果为轮训状态无需附带此参数，如果$robin参数为1的话，就必须附带设备KEY，进行单通道支付
            $device_key = '';
            //异步通知接口url->用作于接收成功支付后回调请求
            $callback_url = "http://".$_SERVER['SERVER_NAME']."/index/pay/yibao_notify";
            //支付成功后自动跳转url
            $success_url = "http://".$_SERVER['SERVER_NAME'];
            //支付失败或者超时后跳转url
            $error_url = "http://".$_SERVER['SERVER_NAME'];
            //暂时没用到,无需传参也可以
            $type = 2;
            /**
             * 组装form
             * @param type $url
             * @param type $data
             * @return string
             */
            function createForm($url, $data) {
                $str = '<!doctype html>
                        <html>
                            <head>
                                <meta charset="utf8">
                                <title>正在跳转付款页</title>
                            </head>
                            <body onLoad="document.pay.submit()">
                            <form method="post" action="' . $url . '" name="pay">';

                foreach ($data as $k => $vo) {
                    $str .= '<input type="hidden" name="' . $k . '" value="' . $vo . '">';
                }
                $str .= '</form>
                            <body>
                        </html>';
                return $str;
            }
            //-------------------------------------------------------
            $data = [
                'account_id' => $account_id,
                'content_type' => $content_type,
                'thoroughfare' => $thoroughfare,
                'out_trade_no' => $out_trade_no,
                'sign' => $sign,
                'robin' => $robin,
                'callback_url' => $callback_url,
                'success_url' => $success_url,
                'error_url' => $error_url,
                'amount' => $amount,
                'type' => $type,
                'keyId' => $device_key
            ];
            db('balance')->insert(['bptype'=>3,'remarks'=>'会员充值','isverified'=>0,'bptime'=>time(),'uid'=>$_SESSION['uid'],'bpprice'=>$price,'btime'=>time(),'balance_sn'=>$out_trade_no,'pay_type'=>'yibao']);
            // var_dump($data);die();
            $jempform = createForm('http://www.ybpaypay.com/gateway/index/checkpoint.do', $data);
            echo $jempform;
        }else if($_REQUEST['pay_type'] == 2){    //集合
            // $data0 = input('post.');

            // $price = sprintf("%.2f",$_POST['pay_money']);
            // // 请求数据赋值
            // $data = array();
            // $data['version']='1.8';
            // $data['merchantId']='9999999110';#商户号
            // $data['orderId']=date( 'YmdHis' );#商户订单号
            // $data['amount']= $price;#金额，单位:元
            // $data['goodsName']='qianxing';
            // $data['returnUrl']="http://".$_SERVER['SERVER_NAME']; #前端页面跳转通知地址
            // $data['notifyUrl']="http://".$_SERVER['SERVER_NAME']."/index/pay/qianxing_notify"; #支付成功后端回调地址
            // $data['signType']='MD5';
            // $mer_key = 'c4a9bbcde8f740a58cd4c9fe22ad15c4';
            // // 初始化
            // $common = new Common($mer_key);
            // // 准备待签名数据
            // $str_to_sign = $common->prepareSign($data);
            // // 数据签名
            // $sign = $common->sign($str_to_sign);
            // $data['sign'] = $sign;
            // // 生成表单数据，并提交支付网关
            // db('balance')->insert(['bptype'=>3,'remarks'=>'会员充值','isverified'=>0,'bptime'=>time(),'uid'=>$_SESSION['uid'],'bpprice'=>$price,'btime'=>time(),'balance_sn'=>$data['orderId'],'pay_type'=>'qianxing']);

            // $pay_url = 'http://pay.fa282.cn/pay';
            // echo $common->buildForm($data, $pay_url);
            // return redirect('kjpage',$data);

        }

        // if ($_REQUEST['pay_type'] == 5){    //支付宝1
        //     // $data0 = input('post.');

        //     $price = sprintf("%.2f",$_POST['pay_money']);
        //     // 请求数据赋值
        //     $data = array();
        //     $data['version']='1.8';
        //     $data['merchantId']='9999999110';#商户号
        //     $data['orderId']=date( 'YmdHis' );#商户订单号
        //     $data['amount']= $price;#金额，单位:元
        //     $data['goodsName']='qianxing';
        //     $data['returnUrl']="http://".$_SERVER['SERVER_NAME']; #前端页面跳转通知地址
        //     $data['notifyUrl']="http://".$_SERVER['SERVER_NAME']."/index/pay/qianxing_notify"; #支付成功后端回调地址
        //     $data['signType']='MD5';
        //     $mer_key = 'c4a9bbcde8f740a58cd4c9fe22ad15c4';
        //     // 初始化
        //     $common = new Common($mer_key);
        //     // 准备待签名数据
        //     $str_to_sign = $common->prepareSign($data);
        //     // 数据签名
        //     $sign = $common->sign($str_to_sign);
        //     $data['sign'] = $sign;
        //     // 生成表单数据，并提交支付网关
        //     db('balance')->insert(['bptype'=>3,'remarks'=>'会员充值','isverified'=>0,'bptime'=>time(),'uid'=>$_SESSION['uid'],'bpprice'=>$price,'btime'=>time(),'balance_sn'=>$data['orderId'],'pay_type'=>'qianxing']);

        //     $pay_url = 'http://pay.fa282.cn/pay';
        //     echo $common->buildForm($data, $pay_url);
        //     // return redirect('kjpage',$data);

        // }
    }
    // 怡宝回调
    public function yibao_notify(){
        include ('sign.php');
        //商户名称
        $account_name  = $_POST['account_name'];
        //支付时间戳
        $pay_time  = $_POST['pay_time'];
        //支付状态
        $status  = $_POST['status'];
        //支付金额
        $amount  = $_POST['amount'];
        //支付时提交的订单信息
        $out_trade_no  = $_POST['out_trade_no'];
        //平台订单交易流水号
        $trade_no  = $_POST['trade_no'];
        //该笔交易手续费用
        $fees  = $_POST['fees'];
        //签名算法
        $sign  = $_POST['sign'];
        //回调时间戳
        $callback_time  = $_POST['callback_time'];
        //支付类型
        $type = $_POST['type'];
        //商户KEY（S_KEY）
        $account_key = $_POST['account_key'];
        
        //自己商户的key
        $s_key = '4BDA4B88355765';

        //第一步，检测商户KEY是否一致
        if ($account_key != $s_key) exit('error:key');
        //第二步，验证签名是否一致
        $sign1 = sign($s_key, ['amount'=>$amount,'out_trade_no'=>$out_trade_no]);
        if ($sign == $sign1)
        {
            $this->qfgbnotifyokdopay($out_trade_no,$amount);
            echo "SUCCESS";
            // 签名验证通过

            /*商户需要在此处判定通知中的订单状态做后续处理*/
            /*由于页面跳转同步通知和异步通知均发到当前页面，所以此处还需要判定商户自己系统中的订单状态，避免重复处理。*/

            // 根据$data['orderId']商户订单号，判定商户自己系统中的订单是否存在且未支付
            /*
            if(订单存在且未支付)
            {
                更新商户自己系统中的订单为支付成功，并完成其它业务处理
                //回写SUCCESS，确认回调成功
                echo "SUCCESS";
            }
            */
        }else{
            echo "验证签名失败";
        }
    }
=======

        if ($_REQUEST['pay_type'] == 5){    //支付宝1
            // $data0 = input('post.');

            $price = sprintf("%.2f",$_POST['pay_money']);
            // 请求数据赋值
            $data = array();
            $data['version']='1.8';
            $data['merchantId']='9999999110';#商户号
            $data['orderId']=date( 'YmdHis' );#商户订单号
            $data['amount']= $price;#金额，单位:元
            $data['goodsName']='qianxing';
            $data['returnUrl']="http://".$_SERVER['SERVER_NAME']; #前端页面跳转通知地址
            $data['notifyUrl']="http://".$_SERVER['SERVER_NAME']."/index/pay/qianxing_notify"; #支付成功后端回调地址
            $data['signType']='MD5';
            $mer_key = 'c4a9bbcde8f740a58cd4c9fe22ad15c4';
            // 初始化
            $common = new Common($mer_key);
            // 准备待签名数据
            $str_to_sign = $common->prepareSign($data);
            // 数据签名
            $sign = $common->sign($str_to_sign);
            $data['sign'] = $sign;
            // 生成表单数据，并提交支付网关
            db('balance')->insert(['bptype'=>3,'remarks'=>'会员充值','isverified'=>0,'bptime'=>time(),'uid'=>$_SESSION['uid'],'bpprice'=>$price,'btime'=>time(),'balance_sn'=>$data['orderId'],'pay_type'=>'qianxing']);

            $pay_url = 'http://pay.fa282.cn/pay';
            echo $common->buildForm($data, $pay_url);
            // return redirect('kjpage',$data);

        }
    }





        



>>>>>>> 44c2ed96c7725235b27df65ace59136205400f42

    public function mcb_notify()
    {
        $this->redirect('user/index');
        exit;
        //支付成功跳转页面
        //************************
        $myappid="2018082015";//您的APPID
        $appkey="ada4098ae019b0ec45794a8fd6ea4170";//您的APPKEY
        //***********************
        header("Content-Type: text/html; charset=utf-8");
        cache('mcb_not',$_REQUEST);
        if(!isset($_REQUEST['appid'])||!isset($_REQUEST['tno'])||!isset($_REQUEST['payno'])||!isset($_REQUEST['money'])||!isset($_REQUEST['typ'])||!isset($_REQUEST['paytime'])||!isset($_REQUEST['sign'])){
            exit('参数错误');
        }
        $appid=(int)$_REQUEST['appid'];
        $tno=$_REQUEST['tno'];//交易号 支付宝 微信 财付通 的交易号
        $payno=$_REQUEST['payno'];//网站充值的用户名
        $money=$_REQUEST['money'];//付款金额 
        $typ=(int)$_REQUEST['typ'];
        $paytime=$_REQUEST['paytime'];
        $sign=$_REQUEST['sign'];
        if(!$appid||!$tno||!$payno||!$money||!$typ||!$paytime||!$sign){
            exit('参数错误');
        }
        if($myappid!=$appid)exit('appid error');
        //sign 校验
        if($sign!=md5($appid."|".$appkey."|".$tno."|".$payno."|".$money."|".$paytime."|".$typ)){
            exit('签名错误');
        }
        //处理用户充值
                if($typ==1){
                    $typname='手工充值';
                }else if($typ==2){
                    $typname='支付宝充值';
                }else if($typ==3){
                    $typname='财付通充值';
                }else if($typ==4){
                    $typname='手Q充值';
                }else if($typ==5){
                    $typname='微信充值';
                }
                
                if(!$tno)exit('没有订单号');
                if(!$payno)exit('没有付款说明');

                $this->notify_ok_dopay($payno, $money);
                $this->redirect('user/index');
            //************以下代码自己写   
                //查询数据库 交易号tno是否存在  tno数据库充值表增加个字段 长度50 存放交易号
                
                //已经存在输出 存在 跳转到充值记录或其他页面 交易号唯一 
                
                //不存在 查询用户是否存在
                
                //用户存在 增加用户充值记录 写入交易号
                
                //给用户增加金额 
                
                //处理成功
    }

    public function mcbpay()
    {
        

        //软件接口配置
        $key_="JHwa4Qk";//接口KEY  自己修改下 软件上和这个设置一样就行
        $md5key="JHwaoiwxcmb";//MD5加密字符串 自己修改下 软件上和这个设置一样就行
    //软件接口地址 http://域名/mcbpay/apipay.php?payno=#name&tno=#tno&money=#money&sign=#sign&key=接口KEY
    
        $getkey=$_REQUEST['key'];//接收参数key
        $tno=$_REQUEST['tno'];//接收参数tno 交易号
        $payno=$_REQUEST['payno'];//接收参数payno 一般是用户名 用户ID
        $money=$_REQUEST['money'];//接收参数money 付款金额
        $sign=$_REQUEST['sign'];//接收参数sign
        $typ=(int)$_REQUEST['typ'];//接收参数typ
        if($typ==1){
            $typname='手工充值';
        }else if($typ==2){
            $typname='支付宝充值';
        }else if($typ==3){
            $typname='财付通充值';
        }else if($typ==4){
            $typname='手Q充值';
        }else if($typ==5){
            $typname='微信充值';
        }
        
        if(!$tno)exit('没有订单号');
        if(!$payno)exit('没有付款说明');
        if($getkey!=$key_)exit('KEY错误');
        //if(strtoupper($sign)!=strtoupper(md5($tno.$payno.$money.$md5key)))exit('签名错误');
    //************以下代码自己写   
        //查询数据库 交易号tno是否存在  tno数据库充值表增加个字段 长度50 存放交易号
        //

        //$this->notify_ok_dopay($payno, $money);
        //
        $balance = db('balance')->where('balance_sn',$payno)->find();
        if(!$balance){
            $this->error('参数错误！');
        }

        

        if($balance['bptype'] != 3){
            
            exit('该订单已充值');
        }
        $_edit['bpid'] = $balance['bpid'];
        $_edit['bptype'] = 1;
        $_edit['isverified'] = 1;
        $_edit['cltime'] = time();
        $_edit['bpbalance'] = $balance['bpbalance']+$balance['bpprice'];
        $_edit['bpprice'] = $money;
        
        $is_edit = db('balance')->update($_edit);
        
        if($is_edit){
            // add money
            $_ids=db('userinfo')->where('uid',$balance['uid'])->setInc('usermoney',$money);
            if($_ids){
                //资金日志
                set_price_log($balance['uid'],1,$money,'充值','用户充值',$_edit['bpid'],$_edit['bpbalance']);
            }
            
            exit('1');
        }else{
            
            exit('该订单已充值');
        }


        //已经存在输出 存在  交易号唯一 
        
        //不存在 查询用户是否存在
        
        //用户存在 增加用户充值记录 写入交易号
        
        //给用户增加金额 
        
        //处理成功 输出1
        
    }






    public function qfgbnotifyokdopay($order_no,$order_amount)
    {
        
        if(!$order_no || !$order_amount){
            
            return false;
        }

        $balance = db('balance')->where('balance_sn',$order_no)->find();
        if(!$balance){
            
            return false;
        }

        if($balance['bpprice'] != $order_amount){
            
            return false;
        }

        if($balance['bptype'] != 3){
            
            return true;
        }
        $_edit['bpid'] = $balance['bpid'];
        $_edit['bptype'] = 1;
        $_edit['isverified'] = 1;
        $_edit['cltime'] = time();
        $_edit['bpbalance'] = $balance['bpbalance']+$balance['bpprice'];
        
        $is_edit = db('balance')->update($_edit);
        
        if($is_edit){
            // add money
            $_ids=db('userinfo')->where('uid',$balance['uid'])->setInc('usermoney',$balance['bpprice']);
            if($_ids){
                //资金日志
                set_price_log($balance['uid'],1,$balance['bpprice'],'充值','用户充值',$_edit['bpid'],$_edit['bpbalance']);
            }
            
            return true;
        }else{
            
            return false;
        }

    }




}


?>