<?php 

namespace app\index\controller;
use think\Controller;
use think\Db;
use alidayu\top\TopClient;
use alidayu\top\request\AlibabaAliqinFcSmsNumSendRequest;

require_once $_SERVER['DOCUMENT_ROOT'].'/extend/dayu2.0/vendor/autoload.php';

use Aliyun\Core\Config;
use Aliyun\Core\Profile\DefaultProfile;
use Aliyun\Core\DefaultAcsClient;
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest;
use Aliyun\Api\Sms\Request\V20170525\QuerySendDetailsRequest;


// 加载区域结点配置
Config::load();

class Msm extends Controller{

	public function testsend()
	{
		$code = 458645;
		$res = $this->sendsms(2175, $code ,15769272583);
		dump($res);
	}
	/*
	* wk  修改短信接口
	* 2017年9月1日19:07:16
	* 80342014@qq.com
	*/
	public function sendsms( $code,$phone,$act = "register"){

		$conf = getconf('');
		$postArr = array (
			'accesskey'  => $conf['msm_appkey'],
			'secret' => $conf['msm_secretkey'],
			'sign' => $conf['msm_SignName'],
			// 'templateId' => $act=='register'?'25950':'25962',
			'mobile' =>  $phone,
			'content' => $code
		);
		if($act == "register"){		// 注册
			$postArr['templateId'] = '25950';
		}else if($act == "forget"){		// 修改密码
			$postArr['templateId'] = '25962';
		}else if($act == "withdraw"){		// 提现
			$postArr['templateId'] = '25950';
		}else if($act == "manager"){		// 申请经纪人
			$postArr['templateId'] = '25950';
		}
		$result = $this->curlPost( 'http://api.1cloudsp.com/api/v2/single_send', $postArr);
		if(!is_null(json_decode($result))){	
			$output=json_decode($result,true);
			if(isset($output['code'])  && $output['code']=='0'){
				$sessKey = "{$phone}_{$act}";
				session($sessKey, $code);
				return array(true,$output['code']);
			}else{
				//echo $output['errorMsg'];
				return array(false,$output['errorMsg']);
			}
		}else{
				return array(false,$output['errorMsg']);
		}
		return $result;
	}
	
	public function curl_get($url)
	{
		if(function_exists('file_get_contents'))
		{
			$file_contents = file_get_contents($url);
		}
		else
		{
			$ch = curl_init();
			$timeout = 5;
			curl_setopt ($ch, CURLOPT_URL, $url);
			curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
			$file_contents = curl_exec($ch);
			curl_close($ch);
		}
		return $file_contents;
	}
	
/**
	 * 通过CURL发送HTTP请求
	 * @param string $url  //请求URL
	 * @param array $postFields //请求参数 
	 * @return mixed
	 *  
	 */
	private function curlPost($url,$postFields){
		$postFields = json_encode($postFields);
		
		$ch = curl_init ();
		curl_setopt( $ch, CURLOPT_URL, $url ); 
		curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json; charset=utf-8'   //json版本需要填写  Content-Type: application/json;
			)
		);
		curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4); 
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $postFields);
        curl_setopt( $ch, CURLOPT_TIMEOUT,60); 
        curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0);
		$ret = curl_exec ( $ch );
        if (false == $ret) {
            $result = curl_error(  $ch);
        } else {
            $rsp = curl_getinfo( $ch, CURLINFO_HTTP_CODE);
            if (200 != $rsp) {
                $result = "请求状态 ". $rsp . " " . curl_error($ch);
            } else {
                $result = $ret;
            }
        }
		curl_close ( $ch );
		return $result;
	}
	/*

	public function sendsms($uid = 0, $code ,$phone){
		$conf = getconf('');
		// 初始化SendSmsRequest实例用于设置发送短信的参数
        $request = new SendSmsRequest();

        // 必填，设置雉短信接收号码
        $request->setPhoneNumbers($phone);

        // 必填，设置签名名称
        $request->setSignName($conf['msm_SignName']);

        // 必填，设置模板CODE
        $request->setTemplateCode($conf['msm_TCode']);

        // 可选，设置模板参数
        $templateParam = Array( "code"=>$code);

        if($templateParam) {
            $request->setTemplateParam(json_encode($templateParam));
        }

        // 暂时不支持多Region
        $region = "cn-hangzhou";
        // 服务结点
        $endPointName = "cn-hangzhou";
        // 短信API产品名
        $product = "Dysmsapi";
        // 短信API产品域名
        $domain = "dysmsapi.aliyuncs.com";
        // 初始化用户Profile实例
        $profile = DefaultProfile::getProfile($region, $conf['msm_appkey'], $conf['msm_secretkey']);

        // 增加服务结点
        DefaultProfile::addEndpoint($endPointName, $region, $product, $domain);

        $this->acsClient = new DefaultAcsClient($profile);
        // 发起访问请求
        $acsResponse = $this->acsClient->getAcsResponse($request);

        // 打印请求结果
        // var_dump($acsResponse);
        $array = json_decode(json_encode($acsResponse),TRUE);
        
        if(isset($array['Code']) && $array['Code'] == "OK"){
			return true;
		}else{
			return false;
		}
	}

	
	public function sendsms($uid = 0, $code ,$phone)
	{
		$conf = getconf('');
		$c = new TopClient();
		$c ->appkey = trim($conf['msm_appkey']) ;
		$c ->secretKey = trim($conf['msm_secretkey']) ;
		$req = new AlibabaAliqinFcSmsNumSendRequest;
		$req ->setExtend( $uid );
		$req ->setSmsType( "normal" );
		$req ->setSmsFreeSignName( trim($conf['msm_SignName']) );
		$req ->setSmsParam("{\"code\":\"$code\"}");
		$req ->setRecNum( trim($phone) );
		$req ->setSmsTemplateCode( trim($conf['msm_TCode']) );
		
		

		$resp = $c ->execute( $req );
		$array = json_decode(json_encode($resp),TRUE);
		dump($array);
		if(isset($array['result']["success"]) && $array['result']["success"] == "true"){
			return true;
		}else{
			return false;
		}
		
	}

	*/




}

