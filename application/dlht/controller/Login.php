<?php
namespace app\qq456dlht\controller;
use think\Controller;
use think\Request;
use think\Cookie;
use think\Db;

class Login extends Controller
{

	/**
	 * 后台登录
	 * @author lukui  2017-02-13
	 * @return [type] [description]
	 */
	public function login()
	{	
		if(isset($_SESSION['qfmddl'])){
			$this->error('您已登录！','index/index',1,1);
		}
		if(input('post.')){
			$data = input('post.');
              
    	foreach ($data as $k => $v) {

    		if(preg_match("/[\'.,:;*?~`!@#$%^&+=)(<>{}]|\]|\[|\/|\\\|\"|\|/",$v)){
    			return WPreturn('请正确填写信息！',-1);
    		}

    	}
			
			//记住我一天
			if(isset($data['rememberme'])){
				Cookie::set('rememberme',$data['username'],60*60*24);
			}

			$result = Db::name('userinfo')->where(array('username'=>$data['username']))->whereOr('utel',$data['username'])->field("uid,upwd,username,utel,utime,otype,ustatus,dankong")->find();
			
			//验证用户
			if(empty($result)){
				return WPreturn('登录失败,账号密码信息不正确!',-1);
			}else{

				if($result['otype'] != 101){
					
					return WPreturn('您无权登录!',-1);
				}			
				
				if($result['upwd'] == md5($data['password'].$result['utime'])){
					
					if ( $result['otype']!=0 && $result['ustatus']==0)
					{
						$_SESSION['otype'] = $result['otype'];
						$_SESSION['dankong'] = $result['dankong'];
						$_SESSION['userid'] = $result['uid'];
						$_SESSION['username'] = $result['username'];
						$_SESSION['token'] = md5('nimashabi');
						$_SESSION['qfmddl'] = md5(time());

						return WPreturn('登录成功!',1);

					}elseif($result['ustatus']==1){
						return WPreturn('登录失败,您的账户暂时被冻结!',-1);
					}else{
						return WPreturn('登录失败,账号密码信息不正确!',-1);
					}
				
				}
				else{
					return WPreturn('登录失败,账号密码信息不正确!',-1);
				}
			
			}
			
		}else{
			$rememberme = isset($_COOKIE['rememberme'])?$_COOKIE['rememberme']:'';
			$this->assign('rememberme',$rememberme);
			return $this->fetch('login');
		}
			
	}

	/**
	 * 退出
	 * @author lukui  2017-02-13
	 * @return [type] [description]
	 */
	public function logout()
	{
		cookie('denglu',null);
		session_unset();
		$this->redirect('login');
		return $this->fetch('logout');
	}

	protected function fetch($template = '', $vars = [], $replace = [], $config = [])
    {
    	$replace['__ADMIN__'] = str_replace('/index.php','',\think\Request::instance()->root()).'/static/admin';
    	
        return $this->view->fetch($template, $vars, $replace, $config);
    }

 
    
}
