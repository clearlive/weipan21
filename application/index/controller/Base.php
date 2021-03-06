<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Loader;

class Base extends Controller
{
    public function __construct(){
		parent::__construct();
		cookie(['prefix' => '', 'expire' => 60*60*24]);
		$this->token = md5(time());
		$this->assign('token',$this->token);
      
      
      
		$request = $_SERVER["REQUEST_URI"];
      	$request =  explode('/',$request);
    	$actionname='index';
		if(count($request) > 2){
		$actionname=$request['2'];
        }		
        //file_put_contents( dirname(__FILE__).'/QTB___$actionname______URL.txt', var_export( $request, true ), FILE_APPEND );

        $time_status = db('config')->where(['name'=>'time_status'])->value('value');
        $point_status = db('config')->where(['name'=>'point_status'])->value('value');
        $this->assign('time_status',$time_status);
        $this->assign('point_status',$point_status);
        $this->assign('actionname',$actionname);
      
      

		//推荐
		$fid = input('get.fid');
		if($fid){
			$_SESSION['fid'] = $fid;
			if(!isset($_SESSION['uid'])){
				$this->redirect('login/register?token='.$this->token);
			}
		}

		

		//session_unset();
		//验证登录
		// if(!iswechat()){
		// 	$_SESSION['uid'] = 991;
		// }
		if(!isset($_SESSION['uid'])){
			
			//$this->error('请先登录！','index.php/index/user/login',1,1);
			$this->redirect('login/login?token='.$this->token);
		}

		$this->uid = $_SESSION['uid'];
		$this->user = db('userinfo')->where('uid',$this->uid)->find();
		if(!$this->user){
			unset($_SESSION['uid']);
			$this->redirect('login/login?token='.$this->token);
		}
		

		$this->assign('userinfo',$this->user);
		//网站配置信息
		$this->conf = getconf('');
		if($this->conf['is_close'] != 1){
            header('Location:/error.html');
            exit;
        }
		$this->assign('conf',$this->conf);

		if(empty($this->user['oid']) || empty($this->user['utel']) || empty($this->user['upwd'])){
			$this->redirect('login/addpwd?token='.$this->token);
		}


		//test
		//dump($_SESSION);exit;

	}

	protected function fetch($template = '', $vars = [], $replace = [], $config = [])
    {
    	$replace['__HOME__'] = str_replace('/index.php','',\think\Request::instance()->root()).'/static/index';
        return $this->view->fetch($template, $vars, $replace, $config);
    }
}
