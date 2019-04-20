<?php
namespace app\index\controller;
use think\Db;
use think\Cookie;



class Index extends Base
{

	/**
	 * 首页 行情列表
	 * @author lukui  2017-02-18
	 * @return [type] [description]
	 */ 
    public function index()
    {
        if(!input('token')){
            $this->redirect('index/index?token='.$this->token);
        }
      
        //获取产品信息
        $pro = Db::name('productinfo')->alias('pi')->field('pi.pid,pi.procode,pi.ptitle,pi.jianjie,pd.Price,pd.UpdateTime,pd.Low,pd.High')
        		->join('__PRODUCTDATA__ pd','pd.pid=pi.pid')
        		->where('pi.isdelete',0)->order('pi.proorder asc')->select();
        //dump(cookie('pid7'));
        foreach ($pro as $k => $v) {
         if(!@$this->conf[$v['procode']]){   
           $img = $this->conf['morenico'];   
         }else{
           $img = $this->conf[$v['procode']];
              }
          
           $pro[$k]['icoimg']=  $img;          
        }
      
      
        $bannerimg1 = $this->conf['bannera'];
      	$bannerimg2 = $this->conf['bannerb'];
      	$bannerimg3 = $this->conf['bannerc'];
      	$this->assign('bannerimg1',$bannerimg1);
      	$this->assign('bannerimg2',$bannerimg2);
      	$this->assign('bannerimg3',$bannerimg3);
        $this->assign('pro',$pro);
     // file_put_contents( dirname(__FILE__).'/QTB__$pro_______URL.txt', var_export( $img, true ), FILE_APPEND );


        return $this->fetch();
    }

    public function ajaxindexpro()
    {
    	
    	//获取产品信息
        $pro = Db::name('productinfo')->alias('pi')->field('pi.pid,pi.ptitle,pd.Price,pd.UpdateTime,pd.Low,pd.High')
        		->join('__PRODUCTDATA__ pd','pd.pid=pi.pid')
        		->where('pi.isdelete',0)->order('pi.pid desc')->select();
        $newpro = array();
        foreach ($pro as $k => $v) {
        	$newpro[$v['pid']] = $pro[$k];
        	$newpro[$v['pid']]['UpdateTime'] = date('H:i:s',$v['UpdateTime']);
        	
        	
            // if(!isset($_COOKIE['pid'.$v['pid']])){
            //     cookie('pid'.$v['pid'],$v['Price']);
            //     continue;
            // }
        	if($v['Price'] < cookie('pid'.$v['pid']) ){  //跌了
        		$newpro[$v['pid']]['isup'] = 0;
        	}elseif($v['Price'] > cookie('pid'.$v['pid']) ){  //涨了
        		$newpro[$v['pid']]['isup'] = 1;
        	}else{  //没跌没涨
        		$newpro[$v['pid']]['isup'] = 2;
        	}
            
        	cookie('pid'.$v['pid'],$v['Price']);

        }

        return base64_encode(json_encode($newpro));
    }

    public function getchart()
    {
        
        $data['hangqing'] = '商品行情';
        $data['jiaoyijilu'] = '交易记录';
        $data['shangpinmingcheng'] = '商品名称';
        $data['xianjia'] = '现价';
        $data['zuidi'] = '最低';
        $data['zuigao'] = '最高';
        $data['xianjia'] = '现价';
        $data['xianjia'] = '现价';

        
        $res = base64_encode(json_encode($data));
        return $res;
    }



}
