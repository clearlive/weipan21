<?php
namespace app\dlht\controller;
use think\Controller;
use think\Db;

class Index extends Base
{
	

	/**
	 * 后台首页
	 * @author lukui  2017-02-13
	 * @return [type] [description]
	 */
    public function index()
    {
        $_map = $map = array();
        
        if($this->otype != 3){
            $uids = myuids($this->uid);
            
            if(!empty($uids)){
                $_map['o.uid'] = $map['uid'] = array('IN',$uids);
            }
        }
        //总用户数
        $map['otype'] = array('in',array(0,101));   
        //总用户数
        $data['all_user'] = Db::name('userinfo')->where($map)->count();

        //今日用户
        $data['tody_user'] = Db::name('userinfo')->where($map)->whereTime('utime', 'd')->count();
        //今日订单数
        unset($map['otype']);
        $data['tody_order'] = Db::name('order')->where($map)->whereTime('buytime', 'd')->count();
        //今日客户盈亏
        $tody_profit = Db::name('order')->where($map)->field('SUM(ploss) as ploss')->whereTime('buytime', 'd')->select();
        $data['tody_profit'] = $tody_profit[0]['ploss'] ? $tody_profit[0]['ploss'] : 0;
        //今日流水
        $tody_fee = Db::name('order')->where($map)->field('SUM(fee) as fee')->whereTime('buytime', 'd')->select();
        $data['tody_fee'] = $tody_fee[0]['fee'] ? $tody_fee[0]['fee'] : 0;
        //今日手续费
        $data['tody_shouxu'] = Db::name('order')->where($map)->whereTime('buytime', 'd')->sum('sx_fee');
        if(!$data['tody_shouxu']) $data['tody_shouxu']= 0;
        
        //今日充值
        $map['bptype'] = 1;
        $map['isverified'] = 1;
        
        $tody_recharge = Db::name('balance')->field('SUM(bpprice) as bpprice')->where($map)->whereTime('bptime', 'd')->select();
        $data['tody_recharge'] = $tody_recharge[0]['bpprice'] ? $tody_recharge[0]['bpprice'] : 0;
        //今日提现
        $map['bptype'] = 0;
        $tody_get = Db::name('balance')->field('SUM(bpprice) as bpprice')->where($map)->whereTime('bptime', 'd')->select();
        $data['tody_get'] = $tody_get[0]['bpprice'] ? $tody_get[0]['bpprice'] : 0;
        //今日入金
        $data['tody_income'] = $data['tody_recharge'] - $data['tody_get'];

        //总用户余额
        $am_map = array();
        if($this->otype != 3){
            //$uids = myuids($this->uid);
            $am_map['uid'] = array('IN',$uids);
        }

        $data['all_usermoney'] = db('userinfo')->where($am_map)->sum('usermoney');

        if(!$data['all_usermoney']) $data['all_usermoney']=0;
        //最近10笔交易记录
       

        $order = Db::name('order')->alias('o')->field('o.*,u.username as username,u.nickname as nickname,u.managername')
        		->join('__USERINFO__ u','o.uid = u.uid')
                ->where($_map)
        		->limit('0,10')->order('oid desc')->select();
        
        $this->assign('data',$data);
        $this->assign('order',$order);
        return $this->fetch('index');
    }

  
  /**
  +-----------------------------------------------------------------------------------------
 * 删除目录及目录下所有文件或删除指定文件
  +-----------------------------------------------------------------------------------------
 * @param str $path   待删除目录路径
 * @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
  +-----------------------------------------------------------------------------------------
 * @return bool 返回删除状态
  +-----------------------------------------------------------------------------------------
 */
 
  //删除目录下所有文件
function deldirall($file=null){
      if(!$file){
  $file = './runtime';
      }else{
      $file = $file; 
            	//file_put_contents( dirname(__FILE__).'/HB_btc.txt', var_export( $file, true ), FILE_APPEND );
}
$files= glob($file."/*");
foreach($files as $f){
if(is_file($f)){
//echo $f."\n";
unlink($f);
}else{
//遍历
self::deldirall($f);
}
}
//删除外目录；
rmdir($file);  
echo $file.'清除成功，可直接关闭';
}
    
  
  

}
