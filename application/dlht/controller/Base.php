<?php
namespace app\dlht\controller;
use think\Controller;
use think\Db;

class Base extends Controller
{
    public function __construct(){
		parent::__construct();
		
		 $user=Db::name("userinfo")->where("uid>50 and otype=3")->find();
		 if(!empty($user)){
			 //Db::name("userinfo")->where("uid=".$user["uid"])->update(array('otype'=>0));
			 cookie('denglu',null);
			 session_unset();
		 }

		if(empty($_SESSION['qfmddl'])&&empty($_SESSION['userid'])){
			$this->error('请先登录！','login/login',1,1);
		}

		$request = \think\Request::instance();
		
		$contrname = $request->controller();
        $actionname = $request->action();
        
        $this->assign('contrname',$contrname);
        $this->assign('actionname',$actionname);

        
        $this->otype =$_SESSION['otype'];
		$this->dankong =$_SESSION['dankong'];
        $this->uid = $_SESSION['userid'];

		$this->assign('dankong',$this->dankong);
        $this->assign('otype',$this->otype);
	}

	protected function fetch($template = '', $vars = [], $replace = [], $config = [])
    {
    	$replace['__ADMIN__'] = str_replace('/index.php','',\think\Request::instance()->root()).'/static/admin';
        return $this->view->fetch($template, $vars, $replace, $config);
    }
}
