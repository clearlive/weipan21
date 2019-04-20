<?php

//decode by http://www.yunlu99.com/
namespace app\index\controller;

use think\Controller;
use think\Db;
class Api extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->nowtime = time();
		$cfdf9nJ = date('Y-m-d H:i', $this->nowtime) . ':00';
		$this->minute = strtotime($cfdf9nJ);
		$this->user_win = array();
		$this->user_loss = array();
		$this->klinedata = db('klinedata');
	}
	public function getdate()
	{
		$gZ43uwD7e = db('productinfo')->where('isdelete', 0)->select();
		if (!isset($gZ43uwD7e)) {
			return false;
		}
		$d3nhXgYc = time();
		$EeJc0 = rand(1, 900) / 100000;
		$FJeYYfSP = array();
		foreach ($gZ43uwD7e as $CNOl => $ECdRYG8ro) {
			$ejDcWHpP = ChickIsOpen($ECdRYG8ro['pid']);
			if (!$ejDcWHpP) {
			}
			if (in_array($ECdRYG8ro['procode'], array('sz399300'))) {
				$XEuo1dzXQ = 'http://web.sqt.gtimg.cn/q=' . $ECdRYG8ro['procode'] . '?r=0.' . $this->nowtime * 88;
				$YdC0fHNn = $this->curlfun($XEuo1dzXQ);
				$jqhV5dvZdw = explode('~', $YdC0fHNn);
				$sRj7aiV['Price'] = $jqhV5dvZdw[3];
				$sRj7aiV['Open'] = $jqhV5dvZdw[4];
				$sRj7aiV['Close'] = $jqhV5dvZdw[5];
				$sRj7aiV['High'] = $jqhV5dvZdw[41];
				$sRj7aiV['Low'] = $jqhV5dvZdw[42];
				$sRj7aiV['Diff'] = 0;
				$sRj7aiV['DiffRate'] = 0;
			} else {
				if ($ECdRYG8ro['procode'] == 'btc' || $ECdRYG8ro['procode'] == 'ltc') {
					$cfdf9nJ = date('i', $d3nhXgYc);
					if ($cfdf9nJ >= 0 && $cfdf9nJ < 15) {
						$cfdf9nJ = 0;
					} else {
						if ($cfdf9nJ >= 15 && $cfdf9nJ < 30) {
							$cfdf9nJ = 15;
						} else {
							if ($cfdf9nJ >= 30 && $cfdf9nJ < 45) {
								$cfdf9nJ = 30;
							} else {
								if ($cfdf9nJ >= 45 && $cfdf9nJ < 60) {
									$cfdf9nJ = 45;
								}
							}
						}
					}
					$SoPyUi26bC = strtotime(date('Y-m-d H', $d3nhXgYc) . ':' . $cfdf9nJ . ':00');
					if ($ECdRYG8ro['procode'] == 'btc') {
						$XEuo1dzXQ = 'http://api.bitkk.com/data/v1/ticker?market=btc_usdt';
					} else {
						if ($ECdRYG8ro['procode'] == 'ltc') {
							$XEuo1dzXQ = 'http://api.bitkk.com/data/v1/ticker?market=ltc_usdt';
						}
					}
					$YdC0fHNn = $this->curlfun($XEuo1dzXQ);
					$qW0S = json_decode($YdC0fHNn, 1);
					$jqhV5dvZdw = $qW0S['ticker'];
					if (!is_array($jqhV5dvZdw)) {
						continue;
					}
					$sRj7aiV['Price'] = $this->fengkong($jqhV5dvZdw['sell'], $ECdRYG8ro);
					$sRj7aiV['Open'] = $jqhV5dvZdw['buy'];
					$sRj7aiV['Close'] = $jqhV5dvZdw['last'];
					$sRj7aiV['High'] = $jqhV5dvZdw['high'];
					$sRj7aiV['Low'] = $jqhV5dvZdw['low'];
					$sRj7aiV['Diff'] = 0;
					$sRj7aiV['DiffRate'] = 0;
					$sRj7aiV['Name'] = $ECdRYG8ro['ptitle'];
				} else {
					if (in_array($ECdRYG8ro['procode'], array('USDJPY', 'GBPJPY', 'EURUSD', 'GBPUSD'))) {
						$XEuo1dzXQ = 'http://forex.cnfol.com/fol_inc/v6.0/Gold/goldhq/json_table/' . $ECdRYG8ro['procode'] . '_forexdata.json';
						$YdC0fHNn = $this->curlfun($XEuo1dzXQ, array(), 'POST');
						$SrCFgpZad3 = json_decode($YdC0fHNn, 1);
						$SrCFgpZad3 = $SrCFgpZad3['data'];
						$Irm = array();
						foreach ($SrCFgpZad3 as $Hp8gcC4 => $cYHbWsXN) {
							if ($ECdRYG8ro['procode'] == $cYHbWsXN['Code']) {
								$Irm = $cYHbWsXN;
							}
						}
						$sRj7aiV['Price'] = $Irm['Last'];
						$sRj7aiV['Open'] = $Irm['Open'];
						$sRj7aiV['Close'] = $Irm['LastClose'];
						$sRj7aiV['High'] = $Irm['High'];
						$sRj7aiV['Low'] = $Irm['Low'];
						$sRj7aiV['Diff'] = 0;
						$sRj7aiV['DiffRate'] = 0;
					} else {
						if (in_array($ECdRYG8ro['procode'], array(12, 13, 116))) {
							$XEuo1dzXQ = 'https://m.sojex.net/api.do?rtp=GetQuotesDetail&id=' . $ECdRYG8ro['procode'];
							$WWC = $this->curlfun($XEuo1dzXQ);
							$qW0S = json_decode($WWC, 1);
							$qW0S = $qW0S['data']['quotes'];
							$sRj7aiV['Price'] = $this->fengkong($qW0S['buy'], $ECdRYG8ro);
							$sRj7aiV['Price'] = $qW0S['buy'];
							$sRj7aiV['Open'] = $qW0S['open'];
							$sRj7aiV['Close'] = $qW0S['last_close'];
							$sRj7aiV['High'] = $qW0S['top'];
							$sRj7aiV['Low'] = $qW0S['low'];
							$sRj7aiV['Diff'] = 0;
							$sRj7aiV['DiffRate'] = 0;
						} else {
							if (in_array($ECdRYG8ro['procode'], array('llg', 'lls'))) {
								$XEuo1dzXQ = 'https://www.91pme.com/marketdata/gethq?code=' . $ECdRYG8ro['procode'];
								$WWC = $this->curlfun($XEuo1dzXQ);
								$CStk9CmR0 = json_decode($WWC, 1);
								if (!isset($CStk9CmR0[0])) {
									continue;
								}
								$jqhV5dvZdw = $CStk9CmR0[0];
								$sRj7aiV['Price'] = $this->fengkong($jqhV5dvZdw['buy'], $ECdRYG8ro);
								$sRj7aiV['Open'] = $jqhV5dvZdw['open'];
								$sRj7aiV['Close'] = $jqhV5dvZdw['lastclose'];
								$sRj7aiV['High'] = $jqhV5dvZdw['high'];
								$sRj7aiV['Low'] = $jqhV5dvZdw['low'];
								$sRj7aiV['Diff'] = 0;
								$sRj7aiV['DiffRate'] = 0;
							} else {
								$XEuo1dzXQ = 'http://hq.sinajs.cn/rn=' . $d3nhXgYc . 'list=' . $ECdRYG8ro['procode'];
								$YdC0fHNn = $this->curlfun($XEuo1dzXQ);
								$jqhV5dvZdw = explode(',', $YdC0fHNn);
								if (!is_array($jqhV5dvZdw) || count($jqhV5dvZdw) != 18) {
									continue;
								}
								$sRj7aiV['Price'] = $this->fengkong($jqhV5dvZdw[1], $ECdRYG8ro);
								$sRj7aiV['Open'] = $jqhV5dvZdw[5];
								$sRj7aiV['Close'] = $jqhV5dvZdw[3];
								$sRj7aiV['High'] = $jqhV5dvZdw[6];
								$sRj7aiV['Low'] = $jqhV5dvZdw[7];
								$sRj7aiV['Diff'] = $jqhV5dvZdw[12];
								$sRj7aiV['DiffRate'] = $jqhV5dvZdw[4] / 10000;
							}
						}
					}
				}
			}
			$sRj7aiV['Name'] = $ECdRYG8ro['ptitle'];
			$sRj7aiV['UpdateTime'] = $d3nhXgYc;
			$sRj7aiV['pid'] = $ECdRYG8ro['pid'];
			$FJeYYfSP[$ECdRYG8ro['pid']] = $sRj7aiV;
		}
		cache('nowdata', $FJeYYfSP);
		$gZ43uwD7e = cache('nowdata');
	}
	public function fengkong($pRCxw, $gZ43uwD7e)
	{
		$d0UkyctT = $gZ43uwD7e['point_low'];
		$ut83E = $gZ43uwD7e['point_top'];
		$VsmmakXrro = getFloatLength($ut83E);
		$DmNDPxzlif = pow(10, $VsmmakXrro);
		$d0UkyctT = $d0UkyctT * $DmNDPxzlif;
		$ut83E = $ut83E * $DmNDPxzlif;
		$PJ1EwDkZ3 = rand($d0UkyctT, $ut83E) / $DmNDPxzlif;
		$ktPgq0U = rand(0, 10);
		if ($ktPgq0U % 2 == 0) {
			$pRCxw = $pRCxw + $PJ1EwDkZ3;
		} else {
			$pRCxw = $pRCxw - $PJ1EwDkZ3;
		}
		return $pRCxw;
	}
	public function curlfun($XEuo1dzXQ, $JiJchn97m = array(), $D0FmoPqFy2 = 'GET')
	{
		$qTkr2F8kc = array();
		$Nw349 = array(CURLOPT_TIMEOUT => 10, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false, CURLOPT_HTTPHEADER => $qTkr2F8kc);
		switch (strtoupper($D0FmoPqFy2)) {
			case 'GET':
				$Nw349[CURLOPT_URL] = $XEuo1dzXQ . '?' . http_build_query($JiJchn97m);
				$Nw349[CURLOPT_URL] = substr($Nw349[CURLOPT_URL], 0, -1);
				break;
			case 'POST':
				$JiJchn97m = http_build_query($JiJchn97m);
				$Nw349[CURLOPT_URL] = $XEuo1dzXQ;
				$Nw349[CURLOPT_POST] = 1;
				$Nw349[CURLOPT_POSTFIELDS] = $JiJchn97m;
				break;
			default:
		}
		$E4QM5Qa = curl_init();
		curl_setopt_array($E4QM5Qa, $Nw349);
		$Fi1 = curl_exec($E4QM5Qa);
		$Ci0iC1i = curl_error($E4QM5Qa);
		curl_close($E4QM5Qa);
		if ($Ci0iC1i) {
			$Fi1 = null;
		}
		return $Fi1;
	}
	public function order()
	{
		$map['ostaus'] = 0;
		//$map['selltime'] = array('elt', time());
		$orderlist = db('order')->where($map)->limit(0, 50)->select();
		$data_info = db('productinfo');
		$risk = db('risk')->find();
		$p_map['isdelete'] = 0;
		$pro = db('productdata')->field('pid,Price')->where($p_map)->select();
		$prodata = array();
		foreach ($pro as $k => $v) {
			$nowdata = cache('nowdata');
			if (!isset($nowdata[$v['pid']])) {
				return false;
			}
			$prodata[$v['pid']] = $this->order_type($orderlist, $nowdata[$v['pid']], $risk, $data_info);
		}
		if (!$orderlist) {
			return false;
		}
		$nowtime = time();
		//比率
		$bl = Db::name('rate')->where('rid=1')->select();
		foreach ($orderlist as $k => $v) {
			$sellprice = isset($prodata[$v['pid']]) ? $prodata[$v['pid']] : 0;
			if($sellprice == 0){
				continue;
			}
			$buyprice = $v['buyprice'];
			$fee = $v['fee'];
			$order_cha = round(floatval($sellprice) - floatval($buyprice), 6);
			$map['oid'] = $v['oid'];
			$order = db('order')->where($map)->find();
			$flag = false;
			$endprofit = $v['endprofit'];
			
			if ($order && $order['ostaus'] == 0) {
				//时间盘玩法
				if($v['trade_type'] == 1){
					//买涨
					if ($v['ostyle'] == 0 && $nowtime >= $v['selltime']) {
						if ($order_cha > 0) {//盈利
							$yingli = $v['fee'] * ($v['endloss'] / 100);
							$d_map['is_win'] = 1;
							$u_add = $yingli + $fee;
							$order_log_map = array('uid' => $v['uid'], 'oid' => $v['oid']);
							$order_log = db('order_log')->where($order_log_map)->find();
							if (!$order_log) {
								db('userinfo')->where('uid', $v['uid'])->setInc('userdollor', $u_add);
								//修改人民币
								db('userinfo')->where('uid', $v['uid'])->setInc('usermoney', round($u_add * $bl[0]['rmbcoin']/$bl[0]['gamecoin'],2));
								$this->set_order_log($v, $u_add);
							}
						} else {
							if ($order_cha < 0) {
								$yingli = -1 * $v['fee'];
								$d_map['is_win'] = 2;
							} else {
								$yingli = 0;
								$d_map['is_win'] = 3;
								$u_add = $fee;
								$order_log_map = array('uid' => $v['uid'], 'oid' => $v['oid']);
								$order_log = db('order_log')->where($order_log_map)->find();
								if (!$order_log) {
									db('userinfo')->where('uid', $v['uid'])->setInc('userdollor', $u_add);
									//修改人民币
									db('userinfo')->where('uid', $v['uid'])->setInc('usermoney', round($u_add * $bl[0]['rmbcoin']/$bl[0]['gamecoin'],2));
									$this->set_order_log($v, $u_add);
								}
							}
						}
					} elseif ($v['ostyle'] == 1 && $nowtime >= $v['selltime']) {
						//买跌
						if ($order_cha < 0) {
							$yingli = $v['fee'] * ($v['endloss'] / 100);
							$d_map['is_win'] = 1;
							$u_add = $yingli + $fee;
							$order_log_map = array('uid' => $v['uid'], 'oid' => $v['oid']);
							$order_log = db('order_log')->where($order_log_map)->find();
							if (!$order_log) {
								db('userinfo')->where('uid', $v['uid'])->setInc('userdollor', $u_add);
								//修改人民币
								db('userinfo')->where('uid', $v['uid'])->setInc('usermoney', round($u_add * $bl[0]['rmbcoin']/$bl[0]['gamecoin'],2));
								$this->set_order_log($v, $u_add);
							}
						} else {
							if ($order_cha > 0) {
								$yingli = -1 * $v['fee'];
								$d_map['is_win'] = 2;
							} else {
								$yingli = 0;
								$d_map['is_win'] = 3;
								$u_add = $fee;
								$order_log_map = array('uid' => $v['uid'], 'oid' => $v['oid']);
								$order_log = db('order_log')->where($order_log_map)->find();
								if (!$order_log) {
									db('userinfo')->where('uid', $v['uid'])->setInc('userdollor', $u_add);
									//修改人民币
									db('userinfo')->where('uid', $v['uid'])->setInc('usermoney', round(u_add * $bl[0]['rmbcoin']/$bl[0]['gamecoin'],2));
									$this->set_order_log($v, $u_add);
								}
							}
						}
					}
					if($nowtime >= $v['selltime']){
						$d_map['ostaus'] = 1;
						$d_map['sellprice'] = $sellprice;
						$d_map['ploss'] = $yingli;
						$d_map['oid'] = $v['oid'];
						db('order')->update($d_map);
					}
				}else if($v['trade_type'] == 2){//点位盘玩法
					//买涨
					if($v['ostyle'] == 0){
						if($order_cha > 0 && $order_cha >= $endprofit){
							//盈利 买入价位与实际价位的点差大于0，同时大于买入的点位，那么意味着盈利。
							$yingli = $v['fee'] * ($v['endloss'] / 100);
							$d_map['is_win'] = 1;
							$u_add = $yingli + $fee;
							$order_log_map = array('uid' => $v['uid'], 'oid' => $v['oid']);
							$order_log = db('order_log')->where($order_log_map)->find();
							if (!$order_log) {
								db('userinfo')->where('uid', $v['uid'])->setInc('userdollor', $u_add);
								//修改人民币
								db('userinfo')->where('uid', $v['uid'])->setInc('usermoney', round($u_add * $bl[0]['rmbcoin']/$bl[0]['gamecoin'],2));
								$this->set_order_log($v, $u_add);
							}
						}else if($order_cha < 0 && abs($order_cha) >= $endprofit){
							//亏损 买入价位与实际价位的点差小于0，同时绝对值大于买入的点位，那么意味着亏损。
							$yingli = -1 * $v['fee'];
							$d_map['is_win'] = 2;
						}
					}else{//买跌
						if($order_cha < 0 && abs($order_cha) >= $endprofit){
							//盈利 买入价位与实际价位的点差小于0，同时绝对值大于买入的点位，那么意味着盈利。
							$yingli = $v['fee'] * ($v['endloss'] / 100);
							$d_map['is_win'] = 1;
							$u_add = $yingli + $fee;
							$order_log_map = array('uid' => $v['uid'], 'oid' => $v['oid']);
							$order_log = db('order_log')->where($order_log_map)->find();
							if (!$order_log) {
								db('userinfo')->where('uid', $v['uid'])->setInc('userdollor', $u_add);
								//修改人民币
								db('userinfo')->where('uid', $v['uid'])->setInc('usermoney',round($u_add * $bl[0]['rmbcoin']/$bl[0]['gamecoin'],0));
								$this->set_order_log($v, $u_add);
							}
						}else if($order_cha > 0 && $order_cha >= $endprofit){
							//亏损 买入价位与实际价位的点差大于0，同时大于买入的点位，那么意味着亏损。
							$yingli = -1 * $v['fee'];
							$d_map['is_win'] = 2;
						}
					}
					if(abs($order_cha) >= $endprofit){
						$d_map['ostaus'] = 1;
						$d_map['sellprice'] = $sellprice;
						$d_map['selltime'] = $nowtime;
						$d_map['ploss'] = $yingli;
						$d_map['oid'] = $v['oid'];
						db('order')->update($d_map);
					}
				}
			}
		}
	}
	public function set_order_log($ECdRYG8ro, $wTHU5fxKcR)
	{
		$jts_C0H['uid'] = $ECdRYG8ro['uid'];
		$jts_C0H['oid'] = $ECdRYG8ro['oid'];
		$jts_C0H['addprice'] = $wTHU5fxKcR;
		$jts_C0H['addpoint'] = 0;
		$jts_C0H['time'] = time();
		//$jts_C0H['user_money'] = db('userinfo')->where('uid', $ECdRYG8ro['uid'])->value('usermoney');
		$jts_C0H['user_money'] = db('userinfo')->where('uid', $ECdRYG8ro['uid'])->value('userdollor');
		db('order_log')->insert($jts_C0H);
		set_price_log($ECdRYG8ro['uid'], 1, $wTHU5fxKcR, '结单', '订单到期获利结算', $ECdRYG8ro['oid'], $jts_C0H['user_money']);
	}
	public function order_type($zfRoP63Z, $gZ43uwD7e, $rdmN9O4PmF, $o98a)
	{
		$Flw = $gZ43uwD7e['pid'];
		$A87OBp = array();
		$GybrCw_ = 0;
		$qjPWt = 0;
		$ZIWm = 0;
		$SV8zMCeMRh = 0;
		$jsn0iVfU0 = 0;
		$PLmK5 = 0;
		$p9bnqD6cH = explode('|', $rdmN9O4PmF['to_win']);
		$Z4hFK = array();
		$CxN = explode('|', $rdmN9O4PmF['to_loss']);
		$zMCReNy2jX = array();
		$lratrZ136V = 0;
		foreach ($zfRoP63Z as $CNOl => $ECdRYG8ro) {
			if ($ECdRYG8ro['pid'] == $Flw) {
				if ($ECdRYG8ro['fee'] < $rdmN9O4PmF['min_price']) {
				}
				$lratrZ136V++;
				if ($ECdRYG8ro['kong_type'] == 1) {
					$dr5xWp = $ECdRYG8ro;
				}
				if ($ECdRYG8ro['kong_type'] == 2) {
					$SZrOJ2 = $ECdRYG8ro;
				}
				if (in_array($ECdRYG8ro['uid'], $p9bnqD6cH)) {
					$Z4hFK = $ECdRYG8ro;
				}
				if (in_array($ECdRYG8ro['uid'], $CxN)) {
					$zMCReNy2jX = $ECdRYG8ro;
				}
				$GybrCw_++;
				if ($ECdRYG8ro['ostyle'] == 0) {
					$qjPWt += $ECdRYG8ro['fee'] * $ECdRYG8ro['endloss'] / 100;
				} else {
					$ZIWm += $ECdRYG8ro['fee'] * $ECdRYG8ro['endloss'] / 100;
				}
				if ($lratrZ136V == 1) {
					$SV8zMCeMRh = $ECdRYG8ro['buyprice'];
					$jsn0iVfU0 = $ECdRYG8ro['buyprice'];
					$PLmK5 = $ECdRYG8ro['fee'];
				} else {
					if ($SV8zMCeMRh > $ECdRYG8ro['buyprice']) {
						$SV8zMCeMRh = $ECdRYG8ro['buyprice'];
					}
					if ($jsn0iVfU0 < $ECdRYG8ro['buyprice']) {
						$jsn0iVfU0 = $ECdRYG8ro['buyprice'];
					}
					if ($PLmK5 < $ECdRYG8ro['fee']) {
						$PLmK5 = $ECdRYG8ro['fee'];
					}
				}
			}
		}
		$VsmmakXrro = getFloatLength((double) $gZ43uwD7e['Price']);
		$DmNDPxzlif = pow(10, $VsmmakXrro);
		$xTo = rand(1, 10);
		$Io3cZty = $o98a->where('pid', $gZ43uwD7e['pid'])->value('rands');
		$qWU1H = getFloatLength($Io3cZty);
		if ($qWU1H > 0) {
			$LFgOkdRq = pow(10, $qWU1H) * $Io3cZty;
			$HUX5 = rand(1, $LFgOkdRq) / pow(10, $qWU1H);
		} else {
			$HUX5 = 0;
		}
		$MAXkQIZj = $HUX5;
		$hL73WGTu = 0;
		if (!empty($dr5xWp) && $hL73WGTu == 0) {
			if ($dr5xWp['ostyle'] == 0 && $gZ43uwD7e['Price'] < $dr5xWp['buyprice']) {
				$gZ43uwD7e['Price'] = $ECdRYG8ro['buyprice'] + $MAXkQIZj;
			} else {
				if ($dr5xWp['ostyle'] == 1 && $gZ43uwD7e['Price'] > $dr5xWp['buyprice']) {
					$gZ43uwD7e['Price'] = $ECdRYG8ro['buyprice'] - $MAXkQIZj;
				}
			}
			$hL73WGTu = 1;
		}
		if (!empty($SZrOJ2) && $hL73WGTu == 0) {
			if ($SZrOJ2['ostyle'] == 0 && $gZ43uwD7e['Price'] > $SZrOJ2['buyprice']) {
				$gZ43uwD7e['Price'] = $ECdRYG8ro['buyprice'] - $MAXkQIZj;
			} else {
				if ($SZrOJ2['ostyle'] == 1 && $gZ43uwD7e['Price'] < $SZrOJ2['buyprice']) {
					$gZ43uwD7e['Price'] = $ECdRYG8ro['buyprice'] + $MAXkQIZj;
				}
			}
			$hL73WGTu = 1;
			$hL73WGTu = 1;
		}
		if (!empty($Z4hFK) && $hL73WGTu == 0) {
			if ($Z4hFK['ostyle'] == 0 && $gZ43uwD7e['Price'] < $Z4hFK['buyprice']) {
				$gZ43uwD7e['Price'] = $ECdRYG8ro['buyprice'] + $MAXkQIZj;
			} else {
				if ($Z4hFK['ostyle'] == 1 && $gZ43uwD7e['Price'] > $Z4hFK['buyprice']) {
					$gZ43uwD7e['Price'] = $ECdRYG8ro['buyprice'] - $MAXkQIZj;
				}
			}
			$hL73WGTu = 1;
		}
		if (!empty($zMCReNy2jX) && $hL73WGTu == 0) {
			if ($zMCReNy2jX['ostyle'] == 0 && $gZ43uwD7e['Price'] > $zMCReNy2jX['buyprice']) {
				$gZ43uwD7e['Price'] = $ECdRYG8ro['buyprice'] - $MAXkQIZj;
			} else {
				if ($zMCReNy2jX['ostyle'] == 1 && $gZ43uwD7e['Price'] < $zMCReNy2jX['buyprice']) {
					$gZ43uwD7e['Price'] = $ECdRYG8ro['buyprice'] + $MAXkQIZj;
				}
			}
			$hL73WGTu = 1;
		}
		if ($qjPWt == 0 && $ZIWm == 0 && $hL73WGTu == 0) {
			$hL73WGTu = 1;
		}
		if (($qjPWt == 0 && $ZIWm != 0 || $qjPWt != 0 && $ZIWm == 0) && $hL73WGTu == 0) {
			$zhDwVGFz = $rdmN9O4PmF['chance'];
			$NRo34cO = explode('|', $zhDwVGFz);
			$NRo34cO = array_filter($NRo34cO);
			if (count($NRo34cO) >= 1) {
				foreach ($NRo34cO as $Hp8gcC4 => $cYHbWsXN) {
					$S3Bu_Dg = explode(':', $cYHbWsXN);
					$WFhp4mKE0o = explode('-', $S3Bu_Dg[0]);
					if ($PLmK5 >= $WFhp4mKE0o[0] && $PLmK5 < $WFhp4mKE0o[1]) {
						$q_63OS3V21 = $S3Bu_Dg[1];
						$EeJc0 = rand(1, 100);
					}
				}
			}
			if (isset($EeJc0) && $qjPWt != 0) {
				if ($EeJc0 > $q_63OS3V21) {
					$gZ43uwD7e['Price'] = $jsn0iVfU0 - $MAXkQIZj;
					$hL73WGTu = 1;
				} else {
					$gZ43uwD7e['Price'] = $SV8zMCeMRh + $MAXkQIZj;
					$hL73WGTu = 1;
				}
			}
			if (isset($EeJc0) && $ZIWm != 0) {
				if ($EeJc0 > $q_63OS3V21) {
					$gZ43uwD7e['Price'] = $SV8zMCeMRh + $MAXkQIZj;
					$hL73WGTu = 1;
				} else {
					$gZ43uwD7e['Price'] = $jsn0iVfU0 - $MAXkQIZj;
					$hL73WGTu = 1;
				}
			}
		}
		if ($qjPWt != 0 && $ZIWm != 0 && $hL73WGTu == 0) {
			if ($qjPWt > $ZIWm) {
				$gZ43uwD7e['Price'] = $SV8zMCeMRh - $MAXkQIZj;
				$hL73WGTu = 1;
			}
			if ($qjPWt < $ZIWm) {
				$gZ43uwD7e['Price'] = $jsn0iVfU0 + $MAXkQIZj;
				$hL73WGTu = 1;
			}
		}
		if ($gZ43uwD7e['Price'] < $gZ43uwD7e['Low']) {
			$gZ43uwD7e['Price'] = $gZ43uwD7e['Low'];
		}
		if ($gZ43uwD7e['Price'] > $gZ43uwD7e['High']) {
			$gZ43uwD7e['Price'] = $gZ43uwD7e['High'];
		}
		db('productdata')->where('pid', $gZ43uwD7e['pid'])->update($gZ43uwD7e);
		return $gZ43uwD7e['Price'];
	}
	public function getkdata($Flw = null, $ERXv = null, $K8db = null, $PGI8TD = null)
	{
		$Flw = empty($Flw) ? input('param.pid') : $Flw;
		$ERXv = empty($ERXv) ? input('param.num') : $ERXv;
		$ERXv = empty($ERXv) ? 30 : $ERXv;
		$gZ43uwD7e = GetProData($Flw);
		$AQfai = array();
		if (!$gZ43uwD7e) {
			exit;
		}
		$K8db = empty($K8db) ? input('param.interval') : $K8db;
		$K8db = input('param.interval') ? input('param.interval') : 1;
		$d3nhXgYc = time() . rand(100, 999);
		$z4j = $K8db * 60 * $ERXv;
		if ($z4j == 'd') {
			$z4j = 1 * 60 * 24 * $ERXv;
		}
		$vtS25z['pid'] = $Flw;
		$vtS25z['ktime'] = array('between', array($this->nowtime - $z4j, $this->nowtime));
		if (in_array($gZ43uwD7e['procode'], array('sz399300'))) {
			if ($K8db == 'd') {
				$XEuo1dzXQ = 'http://web.ifzq.gtimg.cn/appstock/app/fqkline/get?_var=kline_dayqfq&param=' . $gZ43uwD7e['procode'] . ",day,,,{$ERXv},qfq&r=0." . $this->nowtime;
			} else {
				$XEuo1dzXQ = 'http://ifzq.gtimg.cn/appstock/app/kline/mkline?param=' . $gZ43uwD7e['procode'] . ",m{$K8db},,{$ERXv}&_var=m" . $K8db . '_today&r=0.' . $this->nowtime;
			}
			$qW0S = $this->curlfun($XEuo1dzXQ);
			$OCJP8B = explode('=', $qW0S);
			$fsDWU = json_decode($OCJP8B[1], 1);
			if ($K8db == 'd') {
				$m_i = $fsDWU['data'][$gZ43uwD7e['procode']]['day'];
			} else {
				$m_i = $fsDWU['data'][$gZ43uwD7e['procode']]['m' . $K8db];
			}
			foreach ($m_i as $CNOl => $ECdRYG8ro) {
				$VcJjTjtf = strtotime($ECdRYG8ro[0]);
				$SlomUy[] = array($VcJjTjtf, $ECdRYG8ro[1], $ECdRYG8ro[2], $ECdRYG8ro[3], $ECdRYG8ro[4]);
			}
		} else {
			if ($gZ43uwD7e['procode'] == 'btc' || $gZ43uwD7e['procode'] == 'ltc') {
				switch ($K8db) {
					case '1':
						$cR3SBPFe = '1min';
						break;
					case '5':
						$cR3SBPFe = '5min';
						break;
					case '15':
						$cR3SBPFe = '15min';
						break;
					case '30':
						$cR3SBPFe = '30min';
						break;
					case '60':
						$cR3SBPFe = '1hour';
						break;
					case 'd':
						$cR3SBPFe = '1day';
						break;
					default:
						exit;
						break;
				}
				if ($gZ43uwD7e['procode'] == 'btc') {
					$ole = 'http://api.bitkk.com/data/v1/kline?market=btc_usdt&type=' . $cR3SBPFe . '&size=' . $ERXv;
				} else {
					if ($gZ43uwD7e['procode'] == 'ltc') {
						$ole = 'http://api.bitkk.com/data/v1/kline?market=ltc_usdt&type=' . $cR3SBPFe . '&size=' . $ERXv . '&contract_type=this_week';
					}
				}
				$WWC = file_get_contents($ole);
				$WWC = substr($WWC, 25, -22);
				$mmQabFhdG = explode('],[', $WWC);
				foreach ($mmQabFhdG as $CNOl => $ECdRYG8ro) {
					$o0la = explode(',', $ECdRYG8ro);
					$SlomUy[] = array($o0la[0] / 1000, $o0la[1], $o0la[4], $o0la[3], $o0la[2]);
				}
			} else {
				if (in_array($gZ43uwD7e['procode'], array('USDJPY', 'GBPJPY', 'EURUSD', 'GBPUSD'))) {
					$ole = 'http://forex.cnfol.com/fol_inc/v6.0/Gold/goldhq/json/w/' . strtolower($gZ43uwD7e['procode']) . '/Kl5Min.json?t=0.' . $d3nhXgYc;
					$WWC = $this->curlfun($ole);
					$OCJP8B = json_decode($WWC, 1);
					$IUEXrme = count($OCJP8B);
					$OCJP8B = array_slice($OCJP8B, $IUEXrme - $ERXv, $IUEXrme);
					foreach ($OCJP8B as $CNOl => $ECdRYG8ro) {
						$VcJjTjtf = $ECdRYG8ro[0] / 1000;
						$qtb = $ECdRYG8ro[2];
						$I4GD8vT = $ECdRYG8ro[3];
						$mmhuMuY2 = $ECdRYG8ro[4];
						$PHo_C9N4W3 = $ECdRYG8ro[1];
						$SlomUy[] = array($VcJjTjtf, $mmhuMuY2, $PHo_C9N4W3, $qtb, $I4GD8vT);
					}
				} else {
					if (in_array($gZ43uwD7e['procode'], array('llg', 'lls'))) {
						if ($K8db == 'd') {
							$K8db = 1440;
						}
						$ole = 'https://hq.91pme.com/query/kline?callback=jQuery183014447531082730047_' . $d3nhXgYc . '&code=' . $gZ43uwD7e['procode'] . '&level=' . $K8db . '&maxrecords=' . $ERXv . '&_=' . $d3nhXgYc;
						$WWC = $this->curlfun($ole);
						$cia = explode('[{', $WWC);
						if (!isset($cia[1])) {
							return;
						}
						$LKmD = substr($cia[1], 0, -4);
						$BaS3Y_7kC = explode('},{', $LKmD);
						krsort($BaS3Y_7kC);
						foreach ($BaS3Y_7kC as $CNOl => $ECdRYG8ro) {
							$o0la = explode(',', $ECdRYG8ro);
							$VcJjTjtf = substr($o0la[11], 7, -3);
							if (in_array($K8db, array(1, 5)) && isset($lnN6[$VcJjTjtf])) {
								$qtb = $lnN6[$VcJjTjtf]['updata'];
								$I4GD8vT = $lnN6[$VcJjTjtf]['downdata'];
								$mmhuMuY2 = $lnN6[$VcJjTjtf]['opendata'];
								$PHo_C9N4W3 = $lnN6[$VcJjTjtf]['closdata'];
							} else {
								$qtb = substr($o0la[4], 6, -1);
								$I4GD8vT = substr($o0la[3], 7, -1);
								$mmhuMuY2 = substr($o0la[10], 7, -1);
								$PHo_C9N4W3 = substr($o0la[0], 8, -1);
							}
							$SlomUy[] = array($VcJjTjtf, $mmhuMuY2, $PHo_C9N4W3, $qtb, $I4GD8vT);
						}
					} else {
						switch ($K8db) {
							case '1':
								$cR3SBPFe = 1440;
								break;
							case '5':
								$cR3SBPFe = 1440;
								break;
							case '15':
								$cR3SBPFe = 480;
								break;
							case '30':
								$cR3SBPFe = 240;
								break;
							case '60':
								$cR3SBPFe = 120;
								break;
							case 'd':
								break;
							default:
								exit;
								break;
						}
						$yLMY = date('Y_n_j', time());
						if (in_array($gZ43uwD7e['procode'], array(13, 12, 116))) {
							if ($K8db == 1) {
								$K8db = 1;
							}
							if ($K8db == 5) {
								$K8db = 2;
							}
							if ($K8db == 15) {
								$K8db = 3;
							}
							if ($K8db == 30) {
								$K8db = 4;
							}
							if ($K8db == 60) {
								$K8db = 5;
							}
							if ($K8db == 'd') {
								$K8db = 6;
							}
							$ole = 'https://m.sojex.net/api.do?rtp=CandleStick&type=' . $K8db . '&qid=' . $gZ43uwD7e['procode'];
						} else {
							if ($K8db == 'd') {
								$ole = 'http://vip.stock.finance.sina.com.cn/forex/api/jsonp.php/var%20_' . $gZ43uwD7e['procode'] . "{$yLMY}=/NewForexService.getDayKLine?symbol=" . $gZ43uwD7e['procode'] . "&_={$yLMY}";
							} else {
								$ole = 'http://vip.stock.finance.sina.com.cn/forex/api/jsonp.php/var%20_' . $gZ43uwD7e['procode'] . '_' . $K8db . "_{$d3nhXgYc}=/NewForexService.getMinKline?symbol=" . $gZ43uwD7e['procode'] . '&scale=' . $K8db . '&datalen=' . $cR3SBPFe;
							}
						}
						$WWC = $this->curlfun($ole);
						if ($K8db == 'd') {
							$kLR = explode('("', $WWC);
							if (!isset($kLR[1])) {
								return;
							}
							$PkshR2ui = substr($kLR[1], 1, -4);
							$mmQabFhdG = explode(',|', $PkshR2ui);
						} else {
							$kLR = explode('[', $WWC);
							if (!isset($kLR[1])) {
								return;
							}
							$PkshR2ui = substr($kLR[1], 1, -3);
							$mmQabFhdG = explode('},{', $PkshR2ui);
						}
						$IUEXrme = count($mmQabFhdG);
						$mmQabFhdG = array_slice($mmQabFhdG, $IUEXrme - $ERXv, $IUEXrme);
						foreach ($mmQabFhdG as $CNOl => $ECdRYG8ro) {
							$o0la = explode(',', $ECdRYG8ro);
							if ($K8db == 'd') {
								$SlomUy[] = array(substr($o0la[0], 5), $o0la[1], $o0la[4], $o0la[2], $o0la[3]);
							} else {
								if (in_array($gZ43uwD7e['procode'], array(13, 12, 116))) {
									if ($K8db == 6) {
										$G22pnOJGD = substr($o0la[1], 5, -1) . ' 00:00:00';
									} else {
										$G22pnOJGD = '2017-' . substr($o0la[1], 5, -1);
									}
									$VcJjTjtf = $G22pnOJGD;
									if (in_array($K8db, array(1, 5)) && isset($lnN6[$VcJjTjtf])) {
										$qtb = $lnN6[$VcJjTjtf]['updata'];
										$I4GD8vT = $lnN6[$VcJjTjtf]['downdata'];
										$mmhuMuY2 = $lnN6[$VcJjTjtf]['opendata'];
										$PHo_C9N4W3 = $lnN6[$VcJjTjtf]['closdata'];
									} else {
										$qtb = substr($o0la[4], 5, -1);
										$I4GD8vT = substr($o0la[2], 5, -1);
										$mmhuMuY2 = substr($o0la[3], 5, -1);
										$PHo_C9N4W3 = substr($o0la[3], 5, -1);
									}
									$SlomUy[] = array(strtotime($G22pnOJGD), $mmhuMuY2, $PHo_C9N4W3, $I4GD8vT, $qtb);
								} else {
									$XvQmHbSbH = (substr($o0la[4], 3, -1) - substr($o0la[2], 3, -1)) / 8;
									$Nd8 = substr($o0la[4], 3, -1) - $XvQmHbSbH;
									if ($Nd8 * 100000 > substr($o0la[4], 3, -1) * 100000) {
										$Nd8 = substr($o0la[4], 3, -1);
									}
									if ($Nd8 * 100000 > substr($o0la[1], 3, -1) * 100000) {
										$Nd8 = substr($o0la[1], 3, -1);
									}
									$SlomUy[] = array(strtotime(substr($o0la[0], 3, -1)), substr($o0la[1], 3, -1), substr($o0la[4], 3, -1), strval($Nd8), substr($o0la[3], 3, -1));
								}
							}
						}
					}
				}
			}
		}
		if ($gZ43uwD7e['Price'] < $SlomUy[$ERXv - 1][1]) {
			$t4QtB = 'down';
		} else {
			$t4QtB = 'up';
		}
		$AQfai['topdata'] = array('topdata' => $gZ43uwD7e['UpdateTime'], 'now' => $gZ43uwD7e['Price'], 'open' => $gZ43uwD7e['Open'], 'lowest' => $gZ43uwD7e['Low'], 'highest' => $gZ43uwD7e['High'], 'close' => $gZ43uwD7e['Close'], 'state' => $t4QtB);
		$AQfai['items'] = $SlomUy;
		if ($PGI8TD) {
			return json_encode($AQfai);
		} else {
			exit(json_encode(base64_encode(json_encode($AQfai))));
		}
	}
	public function setusers()
	{
		test_web();
	}
	public function getprodata()
	{
		$Flw = input('param.pid');
		$gZ43uwD7e = GetProData($Flw);
		if (!$gZ43uwD7e) {
			exit;
		}
		$fEZX7fg4s = array('topdata' => $gZ43uwD7e['UpdateTime'], 'now' => $gZ43uwD7e['Price'], 'open' => $gZ43uwD7e['Open'], 'lowest' => $gZ43uwD7e['Low'], 'highest' => $gZ43uwD7e['High'], 'close' => $gZ43uwD7e['Close']);
		exit(json_encode(base64_encode(json_encode($fEZX7fg4s))));
	}
	public function allotorder()
	{
		$u3t['isshow'] = 0;
		$u3t['ostaus'] = 1;
		$u3t['selltime'] = array('<', time() - 300);
		$gWoPDHf = db('order')->where($u3t)->limit(0, 10)->select();
		if (!$gWoPDHf) {
			return false;
		}
		foreach ($gWoPDHf as $CNOl => $ECdRYG8ro) {
			$this->allotfee($ECdRYG8ro['uid'], $ECdRYG8ro['fee'], $ECdRYG8ro['is_win'], $ECdRYG8ro['oid'], $ECdRYG8ro['ploss']);
			db('order')->where('oid', $ECdRYG8ro['oid'])->update(array('isshow' => 1));
		}
	}
	public function allotfee($b7PHgyJ5Y, $fuPYz1GuM, $aFUGulX2, $DvbJiF7W, $dTQ)
	{
		$LqQ = db('userinfo');
		$w4SZH = db('allot');
		$d3nhXgYc = time();
		$k82Q1kvT = $LqQ->field('uid,oid')->where('uid', $b7PHgyJ5Y)->find();
		$MZiSec = myupoid($k82Q1kvT['oid']);
		if (!$MZiSec) {
			return;
		}
		$hOxL5G1GN3 = 0;
		$Lgkllc = 0;
		$IzdUtazGN = getconf('web_poundage');
		if ($aFUGulX2 == 1) {
			$IGjwsR = $dTQ;
		} else {
			if ($aFUGulX2 == 2) {
				$IGjwsR = $fuPYz1GuM;
			} else {
				return;
			}
		}
		foreach ($MZiSec as $CNOl => $ECdRYG8ro) {
			if ($k82Q1kvT['oid'] == $ECdRYG8ro['uid']) {
				$hOxL5G1GN3 = round($IGjwsR * ($ECdRYG8ro['rebate'] / 100), 2);
				$Lgkllc = round($fuPYz1GuM * $IzdUtazGN / 100 * ($ECdRYG8ro['feerebate'] / 100), 2);
				echo $Lgkllc;
			} else {
				$O8qI2V = $ECdRYG8ro['rebate'] - $MZiSec[$CNOl - 1]['rebate'];
				if ($O8qI2V < 0) {
					$O8qI2V = 0;
				}
				$hOxL5G1GN3 = round($IGjwsR * ($O8qI2V / 100), 2);
				$vVXwuHPP = $ECdRYG8ro['feerebate'] - $MZiSec[$CNOl - 1]['feerebate'];
				if ($vVXwuHPP < 0) {
					$vVXwuHPP = 0;
				}
				$Lgkllc = round($fuPYz1GuM * $IzdUtazGN / 100 * ($vVXwuHPP / 100), 2);
			}
			if ($aFUGulX2 == 1) {
				if ($hOxL5G1GN3 != 0) {
					$Otub3J6R = $LqQ->where('uid', $ECdRYG8ro['uid'])->setDec('usermoney', $hOxL5G1GN3);
				} else {
					$Otub3J6R = null;
				}
				$BLaDxXN = 2;
				$hOxL5G1GN3 = $hOxL5G1GN3 * -1;
			} else {
				if ($aFUGulX2 == 2) {
					if ($hOxL5G1GN3 != 0) {
						$Otub3J6R = $LqQ->where('uid', $ECdRYG8ro['uid'])->setInc('usermoney', $hOxL5G1GN3);
					} else {
						$Otub3J6R = null;
					}
					$BLaDxXN = 1;
				} else {
					if ($aFUGulX2 == 3) {
						$Otub3J6R = null;
					}
				}
			}
			if ($Otub3J6R) {
				$IxqPB = $LqQ->where('uid', $ECdRYG8ro['uid'])->value('usermoney');
				set_price_log($ECdRYG8ro['uid'], $BLaDxXN, $hOxL5G1GN3, '对冲', '下线客户平仓对冲', $DvbJiF7W, $IxqPB);
			}
			if ($Lgkllc != 0) {
				$xv3xrVZwrk = $LqQ->where('uid', $ECdRYG8ro['uid'])->setInc('usermoney', $Lgkllc);
			} else {
				$xv3xrVZwrk = null;
			}
			if ($xv3xrVZwrk) {
				$IxqPB = $LqQ->where('uid', $ECdRYG8ro['uid'])->value('usermoney');
				set_price_log($ECdRYG8ro['uid'], 1, $Lgkllc, '客户手续费', '下线客户下单手续费', $DvbJiF7W, $IxqPB);
			}
		}
	}
	public function cachekline()
	{
		$gZ43uwD7e = db('productinfo')->field('pid')->where('isdelete', 0)->select();
		$MQq8mR5Ob = cache('cache_kline');
		foreach ($gZ43uwD7e as $CNOl => $ECdRYG8ro) {
			$qW0S[$ECdRYG8ro['pid']][1] = $this->getkdata($ECdRYG8ro['pid'], 60, 1, 1);
			if (!$qW0S[$ECdRYG8ro['pid']][1]) {
				$qW0S[$ECdRYG8ro['pid']][1] = $MQq8mR5Ob[$ECdRYG8ro['pid']][1];
			}
			$qW0S[$ECdRYG8ro['pid']][5] = $this->getkdata($ECdRYG8ro['pid'], 60, 5, 1);
			if (!$qW0S[$ECdRYG8ro['pid']][5]) {
				$qW0S[$ECdRYG8ro['pid']][5] = $MQq8mR5Ob[$ECdRYG8ro['pid']][5];
			}
			$qW0S[$ECdRYG8ro['pid']][15] = $this->getkdata($ECdRYG8ro['pid'], 60, 15, 1);
			if (!$qW0S[$ECdRYG8ro['pid']][15]) {
				$qW0S[$ECdRYG8ro['pid']][15] = $MQq8mR5Ob[$ECdRYG8ro['pid']][15];
			}
			$qW0S[$ECdRYG8ro['pid']][30] = $this->getkdata($ECdRYG8ro['pid'], 60, 30, 1);
			if (!$qW0S[$ECdRYG8ro['pid']][30]) {
				$qW0S[$ECdRYG8ro['pid']][30] = $MQq8mR5Ob[$ECdRYG8ro['pid']][30];
			}
			$qW0S[$ECdRYG8ro['pid']][60] = $this->getkdata($ECdRYG8ro['pid'], 60, 60, 1);
			if (!$qW0S[$ECdRYG8ro['pid']][60]) {
				$qW0S[$ECdRYG8ro['pid']][60] = $MQq8mR5Ob[$ECdRYG8ro['pid']][60];
			}
			$qW0S[$ECdRYG8ro['pid']]['d'] = $this->getkdata($ECdRYG8ro['pid'], 60, 'd', 1);
			if (!$qW0S[$ECdRYG8ro['pid']]['d']) {
				$qW0S[$ECdRYG8ro['pid']]['d'] = $MQq8mR5Ob[$ECdRYG8ro['pid']]['d'];
			}
		}
		cache('cache_kline', $qW0S);
	}
	function getkline()
	{
		$MQq8mR5Ob = cache('cache_kline');
		$Flw = input('pid');
		$K8db = input('interval');
		if (!$K8db || !$Flw) {
			return false;
		}
		$ZQsTfUDym = json_decode($MQq8mR5Ob[$Flw][$K8db], 1);
		return exit(json_encode($ZQsTfUDym));
	}
	public function checkbal()
	{
		$qR0ZQR = $this->nowtime - 10 * 60;
		$u3t['bptime'] = array('lt', $qR0ZQR);
		$u3t['pay_type'] = array('in', array('ysy_alwap', 'ysy_wxwap'));
		$u3t['bptype'] = 3;
		$ML1BJOd = db('balance');
		$gWoPDHf = $ML1BJOd->where($u3t)->select();
		if (!$gWoPDHf) {
			return false;
		}
		foreach ($gWoPDHf as $Hp8gcC4 => $pg7auAXzHm) {
			$yQI5 = '5ca7b74af0d54b2483c1a9e75bb935fd';
			$xRt3stjvvR = '308652650940006';
			$L2X2OoLZGn = '93081888';
			$Fi1 = array();
			$GzE1 = array();
			$Fi1['version'] = '2.2';
			$Fi1['signType'] = 'SHA256';
			$Fi1['charset'] = 'utf-8';
			$Fi1['origOrderNum'] = $pg7auAXzHm['balance_sn'];
			$Fi1['busicd'] = 'INQY';
			$Fi1['inscd'] = $L2X2OoLZGn;
			$Fi1['mchntid'] = $xRt3stjvvR;
			$Fi1['terminalid'] = $L2X2OoLZGn;
			$Fi1['txndir'] = 'Q';
			ksort($Fi1);
			$SOwwTha4J = '';
			foreach ($Fi1 as $CNOl => $ECdRYG8ro) {
				if ($SOwwTha4J != '') {
					$SOwwTha4J .= '&';
				}
				$SOwwTha4J .= $CNOl . '=' . $ECdRYG8ro;
			}
			$SOwwTha4J .= $yQI5;
			$L0DF = hash('sha256', $SOwwTha4J);
			$Fi1['sign'] = $L0DF;
			$Fi1 = json_encode($Fi1);
			$Lj2BM = json_decode($this->post_curl('https://showmoney.cn/scanpay/unified', $Fi1), true);
			if ($Lj2BM['errorDetail'] == '待买家支付') {
				$GzE1['busicd'] = 'CANC';
				$GzE1['charset'] = 'utf-8';
				$GzE1['inscd'] = $L2X2OoLZGn;
				$GzE1['mchntid'] = $xRt3stjvvR;
				$GzE1['orderNum'] = time() . rand(1000, 9999);
				$GzE1['origOrderNum'] = $pg7auAXzHm['balance_sn'];
				$GzE1['signType'] = 'SHA256';
				$GzE1['terminalid'] = $L2X2OoLZGn;
				$GzE1['txndir'] = 'Q';
				$GzE1['version'] = '2.2';
				ksort($GzE1);
				$SOwwTha4J = '';
				foreach ($GzE1 as $CNOl => $ECdRYG8ro) {
					if ($SOwwTha4J != '') {
						$SOwwTha4J .= '&';
					}
					$SOwwTha4J .= $CNOl . '=' . $ECdRYG8ro;
				}
				$SOwwTha4J .= $yQI5;
				$GzE1['sign'] = hash('sha256', $SOwwTha4J);
				$znxwgn = json_decode($this->post_curl('https://showmoney.cn/scanpay/unified', json_encode($GzE1)), true);
			} else {
				if ($Lj2BM['errorDetail'] != '成功') {
					if ($Lj2BM['errorDetail'] != '订单不存在') {
					}
				}
			}
			$MB8S1['bpid'] = $pg7auAXzHm['bpid'];
			$MB8S1['bptype'] = 4;
			$ML1BJOd->update($MB8S1);
		}
	}
	public function post_curl($XEuo1dzXQ, $Fi1)
	{
		$E4QM5Qa = curl_init($XEuo1dzXQ);
		curl_setopt($E4QM5Qa, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($E4QM5Qa, CURLOPT_POSTFIELDS, $Fi1);
		curl_setopt($E4QM5Qa, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($E4QM5Qa, CURLOPT_SSL_VERIFYPEER, false);
		$Q1fPi = curl_exec($E4QM5Qa);
		if (curl_errno($E4QM5Qa)) {
			print curl_error($E4QM5Qa);
		}
		curl_close($E4QM5Qa);
		return $Q1fPi;
	}
}