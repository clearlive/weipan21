<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
error_reporting(0);
class Api extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->nowtime = time();
		$cfdf9nj = date('Y-m-d H:i', $this->nowtime) . ':00';
		$this->minute = strtotime($cfdf9nj);
		$this->user_win = array();
		$this->user_loss = array();
		$this->klinedata = db('klinedata');
	}
	public function getdate()
	{
		$gz43uwd7e = db('productinfo')->where('isdelete', 0)->select();
		if (!isset($gz43uwd7e)) {
			return false;
		}
		$d3nhxgyc = time();
		$eejc0 = rand(1, 900) / 100000;
		$fjeyyfsp = array();
		foreach ($gz43uwd7e as $cnol => $ecdryg8ro) {
			$ejdcwhpp = ChickIsOpen($ecdryg8ro['pid']);
			if (!$ejdcwhpp) {
			}
			if (in_array($ecdryg8ro['procode'], array('sz399300'))) {
				$xeuo1dzxq = 'http://web.sqt.gtimg.cn/q=' . $ecdryg8ro['procode'] . '?r=0.' . $this->nowtime * 88;
				$ydc0fhnn = $this->curlfun($xeuo1dzxq);
				$jqhv5dvzdw = explode('~', $ydc0fhnn);
				$thisdata['Price'] = $jqhv5dvzdw[3];
				$thisdata['Open'] = $jqhv5dvzdw[4];
				$thisdata['Close'] = $jqhv5dvzdw[5];
				$thisdata['High'] = $jqhv5dvzdw[41];
				$thisdata['Low'] = $jqhv5dvzdw[42];
				$thisdata['Diff'] = 0;
				$thisdata['DiffRate'] = 0;
			} else {
				if ($ecdryg8ro['procode'] == 'btc' || $ecdryg8ro['procode'] == 'ltc') {
					$cfdf9nj = date('i', $d3nhxgyc);
					if ($cfdf9nj >= 0 && $cfdf9nj < 15) {
						$cfdf9nj = 0;
					} else {
						if ($cfdf9nj >= 15 && $cfdf9nj < 30) {
							$cfdf9nj = 15;
						} else {
							if ($cfdf9nj >= 30 && $cfdf9nj < 45) {
								$cfdf9nj = 30;
							} else {
								if ($cfdf9nj >= 45 && $cfdf9nj < 60) {
									$cfdf9nj = 45;
								}
							}
						}
					}
					$sopyui26bc = strtotime(date('Y-m-d H', $d3nhxgyc) . ':' . $cfdf9nj . ':00');
					if ($ecdryg8ro['procode'] == 'btc') {
						$xeuo1dzxq = 'http://api.bitkk.com/data/v1/ticker?market=btc_usdt';
					} else {
						if ($ecdryg8ro['procode'] == 'ltc') {
							$xeuo1dzxq = 'http://api.bitkk.com/data/v1/ticker?market=ltc_usdt';
						}
					}
					$ydc0fhnn = $this->curlfun($xeuo1dzxq);
					$qw0s = json_decode($ydc0fhnn, 1);
					$jqhv5dvzdw = $qw0s['ticker'];
					if (is_array($jqhv5dvzdw)) {
						$thisdata['Price'] = $this->fengkong($jqhv5dvzdw['sell'], $ecdryg8ro);
						$thisdata['Open'] = $jqhv5dvzdw['buy'];
						$thisdata['Close'] = $jqhv5dvzdw['last'];
						$thisdata['High'] = $jqhv5dvzdw['high'];
						$thisdata['Low'] = $jqhv5dvzdw['low'];
						$thisdata['Diff'] = 0;
						$thisdata['DiffRate'] = 0;
						$thisdata['Name'] = $ecdryg8ro['ptitle'];
						goto lqnX9mU;
					}
				} else {
					if (in_array($ecdryg8ro['procode'], array('USDJPY', 'GBPJPY', 'EURUSD', 'GBPUSD'))) {
						$xeuo1dzxq = 'http://forex.cnfol.com/fol_inc/v6.0/Gold/goldhq/json_table/' . $ecdryg8ro['procode'] . '_forexdata.json';
						$ydc0fhnn = $this->curlfun($xeuo1dzxq, array(), 'POST');
						$srcfgpzad3 = json_decode($ydc0fhnn, 1);
						$srcfgpzad3 = $srcfgpzad3['data'];
						$irm = array();
						foreach ($srcfgpzad3 as $hp8gcc4 => $cyhbwsxn) {
							if ($ecdryg8ro['procode'] == $cyhbwsxn['Code']) {
								$irm = $cyhbwsxn;
							}
						}
						$thisdata['Price'] = $irm['Last'];
						$thisdata['Open'] = $irm['Open'];
						$thisdata['Close'] = $irm['LastClose'];
						$thisdata['High'] = $irm['High'];
						$thisdata['Low'] = $irm['Low'];
						$thisdata['Diff'] = 0;
						$thisdata['DiffRate'] = 0;
						goto lqnX9mU;
					}
					if (in_array($ecdryg8ro['procode'], array(12, 13, 116))) {
						$xeuo1dzxq = 'https://m.sojex.net/api.do?rtp=GetQuotesDetail&id=' . $ecdryg8ro['procode'];
						$wwc = $this->curlfun($xeuo1dzxq);
						$qw0s = json_decode($wwc, 1);
						$qw0s = $qw0s['data']['quotes'];
						$thisdata['Price'] = $this->fengkong($qw0s['buy'], $ecdryg8ro);
						$thisdata['Price'] = $qw0s['buy'];
						$thisdata['Open'] = $qw0s['open'];
						$thisdata['Close'] = $qw0s['last_close'];
						$thisdata['High'] = $qw0s['top'];
						$thisdata['Low'] = $qw0s['low'];
						$thisdata['Diff'] = 0;
						$thisdata['DiffRate'] = 0;
						goto lqnX9mU;
					}
					if (in_array($ecdryg8ro['procode'], array('llg', 'lls'))) {
						$xeuo1dzxq = 'https://www.91pme.com/marketdata/gethq?code=' . $ecdryg8ro['procode'];
						$wwc = $this->curlfun($xeuo1dzxq);
						$cstk9cmr0 = json_decode($wwc, 1);
						if (isset($cstk9cmr0[0])) {
							$jqhv5dvzdw = $cstk9cmr0[0];
							$thisdata['Price'] = $this->fengkong($jqhv5dvzdw['buy'], $ecdryg8ro);
							$thisdata['Open'] = $jqhv5dvzdw['open'];
							$thisdata['Close'] = $jqhv5dvzdw['lastclose'];
							$thisdata['High'] = $jqhv5dvzdw['high'];
							$thisdata['Low'] = $jqhv5dvzdw['low'];
							$thisdata['Diff'] = 0;
							$thisdata['DiffRate'] = 0;
							goto lqnX9mU;
						}
					} else {
						$xeuo1dzxq = 'http://hq.sinajs.cn/rn=' . $d3nhxgyc . 'list=' . $ecdryg8ro['procode'];
						$ydc0fhnn = $this->curlfun($xeuo1dzxq);
						$jqhv5dvzdw = explode(',', $ydc0fhnn);
						if (is_array($jqhv5dvzdw) && count($jqhv5dvzdw) == 18) {
							$thisdata['Price'] = $this->fengkong($jqhv5dvzdw[1], $ecdryg8ro);
							$thisdata['Open'] = $jqhv5dvzdw[5];
							$thisdata['Close'] = $jqhv5dvzdw[3];
							$thisdata['High'] = $jqhv5dvzdw[6];
							$thisdata['Low'] = $jqhv5dvzdw[7];
							$thisdata['Diff'] = $jqhv5dvzdw[12];
							$thisdata['DiffRate'] = $jqhv5dvzdw[4] / 10000;
							goto lqnX9mU;
						}
					}
				}
			}
			$thisdata['Name'] = $ecdryg8ro['ptitle'];
			$thisdata['UpdateTime'] = $d3nhxgyc;
			$thisdata['pid'] = $ecdryg8ro['pid'];
			$fjeyyfsp[$ecdryg8ro['pid']] = $thisdata;
		}
		cache('nowdata', $fjeyyfsp);
		$gz43uwd7e = cache('nowdata');
	}
	public function fengkong($prcxw, $gz43uwd7e)
	{
		$d0ukyctt = $gz43uwd7e['point_low'];
		$ut83e = $gz43uwd7e['point_top'];
		$vsmmakxrro = getFloatLength($ut83e);
		$dmndpxzlif = pow(10, $vsmmakxrro);
		$d0ukyctt = $d0ukyctt * $dmndpxzlif;
		$ut83e = $ut83e * $dmndpxzlif;
		$pj1ewdkz3 = rand($d0ukyctt, $ut83e) / $dmndpxzlif;
		$ktpgq0u = rand(0, 10);
		if ($ktpgq0u % 2 == 0) {
			$prcxw = $prcxw + $pj1ewdkz3;
		} else {
			$prcxw = $prcxw - $pj1ewdkz3;
		}
		return $prcxw;
	}
	public function curlfun($xeuo1dzxq, $jijchn97m = array(), $d0fmopqfy2 = 'GET')
	{
		$qtkr2f8kc = array();
		$nw349 = array(CURLOPT_TIMEOUT => 10, CURLOPT_RETURNTRANSFER => 1, CURLOPT_SSL_VERIFYPEER => false, CURLOPT_SSL_VERIFYHOST => false, CURLOPT_HTTPHEADER => $qtkr2f8kc);
		switch (strtoupper($d0fmopqfy2)) {
			case 'GET':
				$nw349[CURLOPT_URL] = $xeuo1dzxq . '?' . http_build_query($jijchn97m);
				$nw349[CURLOPT_URL] = substr($nw349[CURLOPT_URL], 0, -1);
				break;
			case 'POST':
				$jijchn97m = http_build_query($jijchn97m);
				$nw349[CURLOPT_URL] = $xeuo1dzxq;
				$nw349[CURLOPT_POST] = 1;
				$nw349[CURLOPT_POSTFIELDS] = $jijchn97m;
				break;
			default:
		}
		$e4qm5qa = curl_init();
		curl_setopt_array($e4qm5qa, $nw349);
		$fi1 = curl_exec($e4qm5qa);
		$ci0ic1i = curl_error($e4qm5qa);
		curl_close($e4qm5qa);
		if ($ci0ic1i) {
			$fi1 = null;
		}
		return $fi1;
	}
	public function order()
	{
		$u3t['ostaus'] = 0;
		$u3t['selltime'] = array('elt', time());
		$mobik = db('order')->where($u3t)->limit(0, 50)->select();
		$o98a = db('productinfo');
		$rdmn9o4pmf = db('risk')->find();
		$opzi['isdelete'] = 0;
		$gz43uwd7e = db('productdata')->field('pid,Price')->where($opzi)->select();
		$bb9pi = array();
		foreach ($gz43uwd7e as $cnol => $ecdryg8ro) {
			$c8kirdqgv = cache('nowdata');
			if (!isset($c8kirdqgv[$ecdryg8ro['pid']])) {
				return false;
			}
			$bb9pi[$ecdryg8ro['pid']] = $this->order_type($mobik, $c8kirdqgv[$ecdryg8ro['pid']], $rdmn9o4pmf, $o98a);
		}
		if (!$mobik) {
			return false;
		}
		$d3nhxgyc = time();
		foreach ($mobik as $cnol => $ecdryg8ro) {
			$cza = isset($bb9pi[$ecdryg8ro['pid']]) ? $bb9pi[$ecdryg8ro['pid']] : 0;
			$gugxtixtxb = $ecdryg8ro['buyprice'];
			$fupyz1gum = $ecdryg8ro['fee'];
			$cnsb6up = round(floatval($cza) - floatval($gugxtixtxb), 6);
			$u3t['oid'] = $ecdryg8ro['oid'];
			$ha4o = db('order')->where($u3t)->find();
			if ($ha4o && $ha4o['ostaus'] == 0) {
				if ($ecdryg8ro['ostyle'] == 0 && $d3nhxgyc >= $ecdryg8ro['selltime']) {
					if ($cnsb6up > 0) {
						$d6zuqjblxd = $ecdryg8ro['fee'] * ($ecdryg8ro['endloss'] / 100);
						$ip8ije['is_win'] = 1;
						$iov = $d6zuqjblxd + $fupyz1gum;
						$aiw3s4lwb = array('uid' => $ecdryg8ro['uid'], 'oid' => $ecdryg8ro['oid']);
						$j3yhmuz3mw = db('order_log')->where($aiw3s4lwb)->find();
						if (!$j3yhmuz3mw) {
							db('userinfo')->where('uid', $ecdryg8ro['uid'])->setInc('usermoney', $iov);
							$this->set_order_log($ecdryg8ro, $iov);
						}
					} else {
						if ($cnsb6up < 0) {
							$d6zuqjblxd = -1 * $ecdryg8ro['fee'];
							$ip8ije['is_win'] = 2;
						} else {
							$d6zuqjblxd = 0;
							$ip8ije['is_win'] = 3;
							$iov = $fupyz1gum;
							$aiw3s4lwb = array('uid' => $ecdryg8ro['uid'], 'oid' => $ecdryg8ro['oid']);
							$j3yhmuz3mw = db('order_log')->where($aiw3s4lwb)->find();
							if (!$j3yhmuz3mw) {
								db('userinfo')->where('uid', $ecdryg8ro['uid'])->setInc('usermoney', $iov);
								$this->set_order_log($ecdryg8ro, $iov);
							}
						}
					}
					$ip8ije['ostaus'] = 1;
					$ip8ije['sellprice'] = $cza;
					$ip8ije['ploss'] = $d6zuqjblxd;
					$ip8ije['oid'] = $ecdryg8ro['oid'];
					db('order')->update($ip8ije);
				} else {
					if ($ecdryg8ro['ostyle'] == 1 && $d3nhxgyc >= $ecdryg8ro['selltime']) {
						if ($cnsb6up < 0) {
							$d6zuqjblxd = $ecdryg8ro['fee'] * ($ecdryg8ro['endloss'] / 100);
							$ip8ije['is_win'] = 1;
							$iov = $d6zuqjblxd + $fupyz1gum;
							$aiw3s4lwb = array('uid' => $ecdryg8ro['uid'], 'oid' => $ecdryg8ro['oid']);
							$j3yhmuz3mw = db('order_log')->where($aiw3s4lwb)->find();
							if (!$j3yhmuz3mw) {
								db('userinfo')->where('uid', $ecdryg8ro['uid'])->setInc('usermoney', $iov);
								$this->set_order_log($ecdryg8ro, $iov);
							}
						} else {
							if ($cnsb6up > 0) {
								$d6zuqjblxd = -1 * $ecdryg8ro['fee'];
								$ip8ije['is_win'] = 2;
							} else {
								$d6zuqjblxd = 0;
								$ip8ije['is_win'] = 3;
								$iov = $fupyz1gum;
								$aiw3s4lwb = array('uid' => $ecdryg8ro['uid'], 'oid' => $ecdryg8ro['oid']);
								$j3yhmuz3mw = db('order_log')->where($aiw3s4lwb)->find();
								if (!$j3yhmuz3mw) {
									db('userinfo')->where('uid', $ecdryg8ro['uid'])->setInc('usermoney', $iov);
									$this->set_order_log($ecdryg8ro, $iov);
								}
							}
						}
						$ip8ije['ostaus'] = 1;
						$ip8ije['sellprice'] = $cza;
						$ip8ije['ploss'] = $d6zuqjblxd;
						$ip8ije['oid'] = $ecdryg8ro['oid'];
						db('order')->update($ip8ije);
					}
				}
			}
		}
	}
	public function set_order_log($ecdryg8ro, $wthu5fxkcr)
	{
		$jts_c0h['uid'] = $ecdryg8ro['uid'];
		$jts_c0h['oid'] = $ecdryg8ro['oid'];
		$jts_c0h['addprice'] = $wthu5fxkcr;
		$jts_c0h['addpoint'] = 0;
		$jts_c0h['time'] = time();
		$jts_c0h['user_money'] = db('userinfo')->where('uid', $ecdryg8ro['uid'])->value('usermoney');
		db('order_log')->insert($jts_c0h);
		set_price_log($ecdryg8ro['uid'], 1, $wthu5fxkcr, '结单', '订单到期获利结算', $ecdryg8ro['oid'], $jts_c0h['user_money']);
	}
	public function order_type($zfrop63z, $gz43uwd7e, $rdmn9o4pmf, $o98a)
	{
		$flw = $gz43uwd7e['pid'];
		$a87obp = array();
		$gybrcw_ = 0;
		$qjpwt = 0;
		$ziwm = 0;
		$sv8zmcemrh = 0;
		$jsn0ivfu0 = 0;
		$plmk5 = 0;
		$p9bnqd6ch = explode('|', $rdmn9o4pmf['to_win']);
		$z4hfk = array();
		$cxn = explode('|', $rdmn9o4pmf['to_loss']);
		$zmcreny2jx = array();
		$lratrz136v = 0;
		foreach ($zfrop63z as $cnol => $ecdryg8ro) {
			if ($ecdryg8ro['pid'] == $flw) {
				if ($ecdryg8ro['fee'] < $rdmn9o4pmf['min_price']) {
				}
				$lratrz136v++;
				if ($ecdryg8ro['kong_type'] == 1) {
					$dr5xwp = $ecdryg8ro;
				}
				if ($ecdryg8ro['kong_type'] == 2) {
					$szroj2 = $ecdryg8ro;
				}
				if (in_array($ecdryg8ro['uid'], $p9bnqd6ch)) {
					$z4hfk = $ecdryg8ro;
				}
				if (in_array($ecdryg8ro['uid'], $cxn)) {
					$zmcreny2jx = $ecdryg8ro;
				}
				$gybrcw_++;
				if ($ecdryg8ro['ostyle'] == 0) {
					$qjpwt += $ecdryg8ro['fee'] * $ecdryg8ro['endloss'] / 100;
				} else {
					$ziwm += $ecdryg8ro['fee'] * $ecdryg8ro['endloss'] / 100;
				}
				if ($lratrz136v == 1) {
					$sv8zmcemrh = $ecdryg8ro['buyprice'];
					$jsn0ivfu0 = $ecdryg8ro['buyprice'];
					$plmk5 = $ecdryg8ro['fee'];
				} else {
					if ($sv8zmcemrh > $ecdryg8ro['buyprice']) {
						$sv8zmcemrh = $ecdryg8ro['buyprice'];
					}
					if ($jsn0ivfu0 < $ecdryg8ro['buyprice']) {
						$jsn0ivfu0 = $ecdryg8ro['buyprice'];
					}
					if ($plmk5 < $ecdryg8ro['fee']) {
						$plmk5 = $ecdryg8ro['fee'];
					}
				}
			}
		}
		$vsmmakxrro = getFloatLength((double) $gz43uwd7e['Price']);
		$dmndpxzlif = pow(10, $vsmmakxrro);
		$xto = rand(1, 10);
		$io3czty = $o98a->where('pid', $gz43uwd7e['pid'])->value('rands');
		$qwu1h = getFloatLength($io3czty);
		if ($qwu1h > 0) {
			$lfgokdrq = pow(10, $qwu1h) * $io3czty;
			$hux5 = rand(1, $lfgokdrq) / pow(10, $qwu1h);
		} else {
			$hux5 = 0;
		}
		$maxkqizj = $hux5;
		$hl73wgtu = 0;
		if (!empty($dr5xwp) && $hl73wgtu == 0) {
			if ($dr5xwp['ostyle'] == 0 && $gz43uwd7e['Price'] < $dr5xwp['buyprice']) {
				$gz43uwd7e['Price'] = $ecdryg8ro['buyprice'] + $maxkqizj;
			} else {
				if ($dr5xwp['ostyle'] == 1 && $gz43uwd7e['Price'] > $dr5xwp['buyprice']) {
					$gz43uwd7e['Price'] = $ecdryg8ro['buyprice'] - $maxkqizj;
				}
			}
			$hl73wgtu = 1;
		}
		if (!empty($szroj2) && $hl73wgtu == 0) {
			if ($szroj2['ostyle'] == 0 && $gz43uwd7e['Price'] > $szroj2['buyprice']) {
				$gz43uwd7e['Price'] = $ecdryg8ro['buyprice'] - $maxkqizj;
			} else {
				if ($szroj2['ostyle'] == 1 && $gz43uwd7e['Price'] < $szroj2['buyprice']) {
					$gz43uwd7e['Price'] = $ecdryg8ro['buyprice'] + $maxkqizj;
				}
			}
			$hl73wgtu = 1;
			$hl73wgtu = 1;
		}
		if (!empty($z4hfk) && $hl73wgtu == 0) {
			if ($z4hfk['ostyle'] == 0 && $gz43uwd7e['Price'] < $z4hfk['buyprice']) {
				$gz43uwd7e['Price'] = $ecdryg8ro['buyprice'] + $maxkqizj;
			} else {
				if ($z4hfk['ostyle'] == 1 && $gz43uwd7e['Price'] > $z4hfk['buyprice']) {
					$gz43uwd7e['Price'] = $ecdryg8ro['buyprice'] - $maxkqizj;
				}
			}
			$hl73wgtu = 1;
		}
		if (!empty($zmcreny2jx) && $hl73wgtu == 0) {
			if ($zmcreny2jx['ostyle'] == 0 && $gz43uwd7e['Price'] > $zmcreny2jx['buyprice']) {
				$gz43uwd7e['Price'] = $ecdryg8ro['buyprice'] - $maxkqizj;
			} else {
				if ($zmcreny2jx['ostyle'] == 1 && $gz43uwd7e['Price'] < $zmcreny2jx['buyprice']) {
					$gz43uwd7e['Price'] = $ecdryg8ro['buyprice'] + $maxkqizj;
				}
			}
			$hl73wgtu = 1;
		}
		if ($qjpwt == 0 && $ziwm == 0 && $hl73wgtu == 0) {
			$hl73wgtu = 1;
		}
		if (($qjpwt == 0 && $ziwm != 0 || $qjpwt != 0 && $ziwm == 0) && $hl73wgtu == 0) {
			$zhdwvgfz = $rdmn9o4pmf['chance'];
			$nro34co = explode('|', $zhdwvgfz);
			$nro34co = array_filter($nro34co);
			if (count($nro34co) >= 1) {
				foreach ($nro34co as $hp8gcc4 => $cyhbwsxn) {
					$s3bu_dg = explode(':', $cyhbwsxn);
					$wfhp4mke0o = explode('-', $s3bu_dg[0]);
					if ($plmk5 >= $wfhp4mke0o[0] && $plmk5 < $wfhp4mke0o[1]) {
						$q_63os3v21 = $s3bu_dg[1];
						$eejc0 = rand(1, 100);
					}
				}
			}
			if (isset($eejc0) && $qjpwt != 0) {
				if ($eejc0 > $q_63os3v21) {
					$gz43uwd7e['Price'] = $jsn0ivfu0 - $maxkqizj;
					$hl73wgtu = 1;
				} else {
					$gz43uwd7e['Price'] = $sv8zmcemrh + $maxkqizj;
					$hl73wgtu = 1;
				}
			}
			if (isset($eejc0) && $ziwm != 0) {
				if ($eejc0 > $q_63os3v21) {
					$gz43uwd7e['Price'] = $sv8zmcemrh + $maxkqizj;
					$hl73wgtu = 1;
				} else {
					$gz43uwd7e['Price'] = $jsn0ivfu0 - $maxkqizj;
					$hl73wgtu = 1;
				}
			}
		}
		if ($qjpwt != 0 && $ziwm != 0 && $hl73wgtu == 0) {
			if ($qjpwt > $ziwm) {
				$gz43uwd7e['Price'] = $sv8zmcemrh - $maxkqizj;
				$hl73wgtu = 1;
			}
			if ($qjpwt < $ziwm) {
				$gz43uwd7e['Price'] = $jsn0ivfu0 + $maxkqizj;
				$hl73wgtu = 1;
			}
		}
		if ($gz43uwd7e['Price'] < $gz43uwd7e['Low']) {
			$gz43uwd7e['Price'] = $gz43uwd7e['Low'];
		}
		if ($gz43uwd7e['Price'] > $gz43uwd7e['High']) {
			$gz43uwd7e['Price'] = $gz43uwd7e['High'];
		}
		db('productdata')->where('pid', $gz43uwd7e['pid'])->update($gz43uwd7e);
		return $gz43uwd7e['Price'];
	}
	public function getkdata($flw = null, $erxv = null, $k8db = null, $pgi8td = null)
	{
		$flw = empty($flw) ? input('param.pid') : $flw;
		$erxv = empty($erxv) ? input('param.num') : $erxv;
		$erxv = empty($erxv) ? 30 : $erxv;
		$gz43uwd7e = GetProData($flw);
		$aqfai = array();
		if (!$gz43uwd7e) {
			exit;
		}
		$k8db = empty($k8db) ? input('param.interval') : $k8db;
		$k8db = input('param.interval') ? input('param.interval') : 1;
		$d3nhxgyc = time() . rand(100, 999);
		$z4j = $k8db * 60 * $erxv;
		if ($z4j == 'd') {
			$z4j = 1 * 60 * 24 * $erxv;
		}
		$vts25z['pid'] = $flw;
		$vts25z['ktime'] = array('between', array($this->nowtime - $z4j, $this->nowtime));
		if (in_array($gz43uwd7e['procode'], array('sz399300'))) {
			if ($k8db == 'd') {
				$xeuo1dzxq = 'http://web.ifzq.gtimg.cn/appstock/app/fqkline/get?_var=kline_dayqfq&param=' . $gz43uwd7e['procode'] . ",day,,,{$erxv},qfq&r=0." . $this->nowtime;
			} else {
				$xeuo1dzxq = 'http://ifzq.gtimg.cn/appstock/app/kline/mkline?param=' . $gz43uwd7e['procode'] . ",m{$k8db},,{$erxv}&_var=m" . $k8db . '_today&r=0.' . $this->nowtime;
			}
			$qw0s = $this->curlfun($xeuo1dzxq);
			$ocjp8b = explode('=', $qw0s);
			$fsdwu = json_decode($ocjp8b[1], 1);
			if ($k8db == 'd') {
				$m_i = $fsdwu['data'][$gz43uwd7e['procode']]['day'];
			} else {
				$m_i = $fsdwu['data'][$gz43uwd7e['procode']]['m' . $k8db];
			}
			foreach ($m_i as $cnol => $ecdryg8ro) {
				$vcjjtjtf = strtotime($ecdryg8ro[0]);
				$slomuy[] = array($vcjjtjtf, $ecdryg8ro[1], $ecdryg8ro[2], $ecdryg8ro[3], $ecdryg8ro[4]);
			}
		} else {
			if ($gz43uwd7e['procode'] == 'btc' || $gz43uwd7e['procode'] == 'ltc') {
				switch ($k8db) {
					case '1':
						$cr3sbpfe = '1min';
						break;
					case '5':
						$cr3sbpfe = '5min';
						break;
					case '15':
						$cr3sbpfe = '15min';
						break;
					case '30':
						$cr3sbpfe = '30min';
						break;
					case '60':
						$cr3sbpfe = '1hour';
						break;
					case 'd':
						$cr3sbpfe = '1day';
						break;
					default:
						exit;
						break;
				}
				if ($gz43uwd7e['procode'] == 'btc') {
					$ole = 'http://api.bitkk.com/data/v1/kline?market=btc_usdt&type=' . $cr3sbpfe . '&size=' . $erxv;
				} else {
					if ($gz43uwd7e['procode'] == 'ltc') {
						$ole = 'http://api.bitkk.com/data/v1/kline?market=ltc_usdt&type=' . $cr3sbpfe . '&size=' . $erxv . '&contract_type=this_week';
					}
				}
				$wwc = file_get_contents($ole);
				$wwc = substr($wwc, 25, -22);
				$mmqabfhdg = explode('],[', $wwc);
				foreach ($mmqabfhdg as $cnol => $ecdryg8ro) {
					$o0la = explode(',', $ecdryg8ro);
					$slomuy[] = array($o0la[0] / 1000, $o0la[1], $o0la[4], $o0la[3], $o0la[2]);
				}
			} else {
				if (in_array($gz43uwd7e['procode'], array('USDJPY', 'GBPJPY', 'EURUSD', 'GBPUSD'))) {
					$ole = 'http://forex.cnfol.com/fol_inc/v6.0/Gold/goldhq/json/w/' . strtolower($gz43uwd7e['procode']) . '/Kl5Min.json?t=0.' . $d3nhxgyc;
					$wwc = $this->curlfun($ole);
					$ocjp8b = json_decode($wwc, 1);
					$iuexrme = count($ocjp8b);
					$ocjp8b = array_slice($ocjp8b, $iuexrme - $erxv, $iuexrme);
					foreach ($ocjp8b as $cnol => $ecdryg8ro) {
						$vcjjtjtf = $ecdryg8ro[0] / 1000;
						$qtb = $ecdryg8ro[2];
						$i4gd8vt = $ecdryg8ro[3];
						$mmhumuy2 = $ecdryg8ro[4];
						$pho_c9n4w3 = $ecdryg8ro[1];
						$slomuy[] = array($vcjjtjtf, $mmhumuy2, $pho_c9n4w3, $qtb, $i4gd8vt);
					}
				} else {
					if (in_array($gz43uwd7e['procode'], array('llg', 'lls'))) {
						if ($k8db == 'd') {
							$k8db = 1440;
						}
						$ole = 'https://hq.91pme.com/query/kline?callback=jQuery183014447531082730047_' . $d3nhxgyc . '&code=' . $gz43uwd7e['procode'] . '&level=' . $k8db . '&maxrecords=' . $erxv . '&_=' . $d3nhxgyc;
						$wwc = $this->curlfun($ole);
						$cia = explode('[{', $wwc);
						if (!isset($cia[1])) {
							return;
						}
						$lkmd = substr($cia[1], 0, -4);
						$bas3y_7kc = explode('},{', $lkmd);
						krsort($bas3y_7kc);
						foreach ($bas3y_7kc as $cnol => $ecdryg8ro) {
							$o0la = explode(',', $ecdryg8ro);
							$vcjjtjtf = substr($o0la[11], 7, -3);
							if (in_array($k8db, array(1, 5)) && isset($lnn6[$vcjjtjtf])) {
								$qtb = $lnn6[$vcjjtjtf]['updata'];
								$i4gd8vt = $lnn6[$vcjjtjtf]['downdata'];
								$mmhumuy2 = $lnn6[$vcjjtjtf]['opendata'];
								$pho_c9n4w3 = $lnn6[$vcjjtjtf]['closdata'];
							} else {
								$qtb = substr($o0la[4], 6, -1);
								$i4gd8vt = substr($o0la[3], 7, -1);
								$mmhumuy2 = substr($o0la[10], 7, -1);
								$pho_c9n4w3 = substr($o0la[0], 8, -1);
							}
							$slomuy[] = array($vcjjtjtf, $mmhumuy2, $pho_c9n4w3, $qtb, $i4gd8vt);
						}
					} else {
						switch ($k8db) {
							case '1':
								$cr3sbpfe = 1440;
								break;
							case '5':
								$cr3sbpfe = 1440;
								break;
							case '15':
								$cr3sbpfe = 480;
								break;
							case '30':
								$cr3sbpfe = 240;
								break;
							case '60':
								$cr3sbpfe = 120;
								break;
							case 'd':
								break;
							default:
								exit;
								break;
						}
						$ylmy = date('Y_n_j', time());
						if (in_array($gz43uwd7e['procode'], array(13, 12, 116))) {
							if ($k8db == 1) {
								$k8db = 1;
							}
							if ($k8db == 5) {
								$k8db = 2;
							}
							if ($k8db == 15) {
								$k8db = 3;
							}
							if ($k8db == 30) {
								$k8db = 4;
							}
							if ($k8db == 60) {
								$k8db = 5;
							}
							if ($k8db == 'd') {
								$k8db = 6;
							}
							$ole = 'https://m.sojex.net/api.do?rtp=CandleStick&type=' . $k8db . '&qid=' . $gz43uwd7e['procode'];
						} else {
							if ($k8db == 'd') {
								$ole = 'http://vip.stock.finance.sina.com.cn/forex/api/jsonp.php/var%20_' . $gz43uwd7e['procode'] . "{$ylmy}=/NewForexService.getDayKLine?symbol=" . $gz43uwd7e['procode'] . "&_={$ylmy}";
							} else {
								$ole = 'http://vip.stock.finance.sina.com.cn/forex/api/jsonp.php/var%20_' . $gz43uwd7e['procode'] . '_' . $k8db . "_{$d3nhxgyc}=/NewForexService.getMinKline?symbol=" . $gz43uwd7e['procode'] . '&scale=' . $k8db . '&datalen=' . $cr3sbpfe;
							}
						}
						$wwc = $this->curlfun($ole);
						if ($k8db == 'd') {
							$klr = explode('("', $wwc);
							if (!isset($klr[1])) {
								return;
							}
							$pkshr2ui = substr($klr[1], 1, -4);
							$mmqabfhdg = explode(',|', $pkshr2ui);
						} else {
							$klr = explode('[', $wwc);
							if (!isset($klr[1])) {
								return;
							}
							$pkshr2ui = substr($klr[1], 1, -3);
							$mmqabfhdg = explode('},{', $pkshr2ui);
						}
						$iuexrme = count($mmqabfhdg);
						$mmqabfhdg = array_slice($mmqabfhdg, $iuexrme - $erxv, $iuexrme);
						foreach ($mmqabfhdg as $cnol => $ecdryg8ro) {
							$o0la = explode(',', $ecdryg8ro);
							if ($k8db == 'd') {
								$slomuy[] = array(substr($o0la[0], 5), $o0la[1], $o0la[4], $o0la[2], $o0la[3]);
							} else {
								if (in_array($gz43uwd7e['procode'], array(13, 12, 116))) {
									if ($k8db == 6) {
										$g22pnojgd = substr($o0la[1], 5, -1) . ' 00:00:00';
									} else {
										$g22pnojgd = '2017-' . substr($o0la[1], 5, -1);
									}
									$vcjjtjtf = $g22pnojgd;
									if (in_array($k8db, array(1, 5)) && isset($lnn6[$vcjjtjtf])) {
										$qtb = $lnn6[$vcjjtjtf]['updata'];
										$i4gd8vt = $lnn6[$vcjjtjtf]['downdata'];
										$mmhumuy2 = $lnn6[$vcjjtjtf]['opendata'];
										$pho_c9n4w3 = $lnn6[$vcjjtjtf]['closdata'];
									} else {
										$qtb = substr($o0la[4], 5, -1);
										$i4gd8vt = substr($o0la[2], 5, -1);
										$mmhumuy2 = substr($o0la[3], 5, -1);
										$pho_c9n4w3 = substr($o0la[3], 5, -1);
									}
									$slomuy[] = array(strtotime($g22pnojgd), $mmhumuy2, $pho_c9n4w3, $i4gd8vt, $qtb);
								} else {
									$xvqmhbsbh = (substr($o0la[4], 3, -1) - substr($o0la[2], 3, -1)) / 8;
									$nd8 = substr($o0la[4], 3, -1) - $xvqmhbsbh;
									if ($nd8 * 100000 > substr($o0la[4], 3, -1) * 100000) {
										$nd8 = substr($o0la[4], 3, -1);
									}
									if ($nd8 * 100000 > substr($o0la[1], 3, -1) * 100000) {
										$nd8 = substr($o0la[1], 3, -1);
									}
									$slomuy[] = array(strtotime(substr($o0la[0], 3, -1)), substr($o0la[1], 3, -1), substr($o0la[4], 3, -1), strval($nd8), substr($o0la[3], 3, -1));
								}
							}
						}
					}
				}
			}
		}
		if ($gz43uwd7e['Price'] < $slomuy[$erxv - 1][1]) {
			$t4qtb = 'down';
		} else {
			$t4qtb = 'up';
		}
		$aqfai['topdata'] = array('topdata' => $gz43uwd7e['UpdateTime'], 'now' => $gz43uwd7e['Price'], 'open' => $gz43uwd7e['Open'], 'lowest' => $gz43uwd7e['Low'], 'highest' => $gz43uwd7e['High'], 'close' => $gz43uwd7e['Close'], 'state' => $t4qtb);
		$aqfai['items'] = $slomuy;
		if ($pgi8td) {
			return json_encode($aqfai);
		} else {
			exit(json_encode(base64_encode(json_encode($aqfai))));
		}
	}
	public function setusers()
	{
		test_web();
	}
	public function getprodata()
	{
		$flw = input('param.pid');
		$gz43uwd7e = GetProData($flw);
		if (!$gz43uwd7e) {
			exit;
		}
		$fezx7fg4s = array('topdata' => $gz43uwd7e['UpdateTime'], 'now' => $gz43uwd7e['Price'], 'open' => $gz43uwd7e['Open'], 'lowest' => $gz43uwd7e['Low'], 'highest' => $gz43uwd7e['High'], 'close' => $gz43uwd7e['Close']);
		exit(json_encode(base64_encode(json_encode($fezx7fg4s))));
	}
	public function allotorder()
	{
		$u3t['isshow'] = 0;
		$u3t['ostaus'] = 1;
		$u3t['selltime'] = array('<', time() - 300);
		$gwopdhf = db('order')->where($u3t)->limit(0, 10)->select();
		if (!$gwopdhf) {
			return false;
		}
		foreach ($gwopdhf as $cnol => $ecdryg8ro) {
			$this->allotfee($ecdryg8ro['uid'], $ecdryg8ro['fee'], $ecdryg8ro['is_win'], $ecdryg8ro['oid'], $ecdryg8ro['ploss']);
			db('order')->where('oid', $ecdryg8ro['oid'])->update(array('isshow' => 1));
		}
	}
	public function allotfee($b7phgyj5y, $fupyz1gum, $afugulx2, $dvbjif7w, $dtq)
	{
		$lqq = db('userinfo');
		$w4szh = db('allot');
		$d3nhxgyc = time();
		$k82q1kvt = $lqq->field('uid,oid')->where('uid', $b7phgyj5y)->find();
		$mzisec = myupoid($k82q1kvt['oid']);
		if (!$mzisec) {
			return;
		}
		$hoxl5g1gn3 = 0;
		$lgkllc = 0;
		$izdutazgn = getconf('web_poundage');
		if ($afugulx2 == 1) {
			$igjwsr = $dtq;
		} else {
			if ($afugulx2 == 2) {
				$igjwsr = $fupyz1gum;
			} else {
				return;
			}
		}
		foreach ($mzisec as $cnol => $ecdryg8ro) {
			if ($k82q1kvt['oid'] == $ecdryg8ro['uid']) {
				$hoxl5g1gn3 = round($igjwsr * ($ecdryg8ro['rebate'] / 100), 2);
				$lgkllc = round($fupyz1gum * $izdutazgn / 100 * ($ecdryg8ro['feerebate'] / 100), 2);
				echo $lgkllc;
			} else {
				$o8qi2v = $ecdryg8ro['rebate'] - $mzisec[$cnol - 1]['rebate'];
				if ($o8qi2v < 0) {
					$o8qi2v = 0;
				}
				$hoxl5g1gn3 = round($igjwsr * ($o8qi2v / 100), 2);
				$vvxwuhpp = $ecdryg8ro['feerebate'] - $mzisec[$cnol - 1]['feerebate'];
				if ($vvxwuhpp < 0) {
					$vvxwuhpp = 0;
				}
				$lgkllc = round($fupyz1gum * $izdutazgn / 100 * ($vvxwuhpp / 100), 2);
			}
			if ($afugulx2 == 1) {
				if ($hoxl5g1gn3 != 0) {
					$otub3j6r = $lqq->where('uid', $ecdryg8ro['uid'])->setDec('usermoney', $hoxl5g1gn3);
				} else {
					$otub3j6r = null;
				}
				$bladxxn = 2;
				$hoxl5g1gn3 = $hoxl5g1gn3 * -1;
			} else {
				if ($afugulx2 == 2) {
					if ($hoxl5g1gn3 != 0) {
						$otub3j6r = $lqq->where('uid', $ecdryg8ro['uid'])->setInc('usermoney', $hoxl5g1gn3);
					} else {
						$otub3j6r = null;
					}
					$bladxxn = 1;
				} else {
					if ($afugulx2 == 3) {
						$otub3j6r = null;
					}
				}
			}
			if ($otub3j6r) {
				$ixqpb = $lqq->where('uid', $ecdryg8ro['uid'])->value('usermoney');
				set_price_log($ecdryg8ro['uid'], $bladxxn, $hoxl5g1gn3, '对冲', '下线客户平仓对冲', $dvbjif7w, $ixqpb);
			}
			if ($lgkllc != 0) {
				$xv3xrvzwrk = $lqq->where('uid', $ecdryg8ro['uid'])->setInc('usermoney', $lgkllc);
			} else {
				$xv3xrvzwrk = null;
			}
			if ($xv3xrvzwrk) {
				$ixqpb = $lqq->where('uid', $ecdryg8ro['uid'])->value('usermoney');
				set_price_log($ecdryg8ro['uid'], 1, $lgkllc, '客户手续费', '下线客户下单手续费', $dvbjif7w, $ixqpb);
			}
		}
	}
	public function cachekline()
	{
		$gz43uwd7e = db('productinfo')->field('pid')->where('isdelete', 0)->select();
		$mqq8mr5ob = cache('cache_kline');
		foreach ($gz43uwd7e as $cnol => $ecdryg8ro) {
			$qw0s[$ecdryg8ro['pid']][1] = $this->getkdata($ecdryg8ro['pid'], 60, 1, 1);
			if (!$qw0s[$ecdryg8ro['pid']][1]) {
				$qw0s[$ecdryg8ro['pid']][1] = $mqq8mr5ob[$ecdryg8ro['pid']][1];
			}
			$qw0s[$ecdryg8ro['pid']][5] = $this->getkdata($ecdryg8ro['pid'], 60, 5, 1);
			if (!$qw0s[$ecdryg8ro['pid']][5]) {
				$qw0s[$ecdryg8ro['pid']][5] = $mqq8mr5ob[$ecdryg8ro['pid']][5];
			}
			$qw0s[$ecdryg8ro['pid']][15] = $this->getkdata($ecdryg8ro['pid'], 60, 15, 1);
			if (!$qw0s[$ecdryg8ro['pid']][15]) {
				$qw0s[$ecdryg8ro['pid']][15] = $mqq8mr5ob[$ecdryg8ro['pid']][15];
			}
			$qw0s[$ecdryg8ro['pid']][30] = $this->getkdata($ecdryg8ro['pid'], 60, 30, 1);
			if (!$qw0s[$ecdryg8ro['pid']][30]) {
				$qw0s[$ecdryg8ro['pid']][30] = $mqq8mr5ob[$ecdryg8ro['pid']][30];
			}
			$qw0s[$ecdryg8ro['pid']][60] = $this->getkdata($ecdryg8ro['pid'], 60, 60, 1);
			if (!$qw0s[$ecdryg8ro['pid']][60]) {
				$qw0s[$ecdryg8ro['pid']][60] = $mqq8mr5ob[$ecdryg8ro['pid']][60];
			}
			$qw0s[$ecdryg8ro['pid']]['d'] = $this->getkdata($ecdryg8ro['pid'], 60, 'd', 1);
			if (!$qw0s[$ecdryg8ro['pid']]['d']) {
				$qw0s[$ecdryg8ro['pid']]['d'] = $mqq8mr5ob[$ecdryg8ro['pid']]['d'];
			}
		}
		cache('cache_kline', $qw0s);
	}
	function getkline()
	{
		$mqq8mr5ob = cache('cache_kline');
		$flw = input('pid');
		$k8db = input('interval');
		if (!$k8db || !$flw) {
			return false;
		}
		$zqstfudym = json_decode($mqq8mr5ob[$flw][$k8db], 1);
		return exit(json_encode($zqstfudym));
	}
	public function checkbal()
	{
		$qr0zqr = $this->nowtime - 10 * 60;
		$u3t['bptime'] = array('lt', $qr0zqr);
		$u3t['pay_type'] = array('in', array('ysy_alwap', 'ysy_wxwap'));
		$u3t['bptype'] = 3;
		$ml1bjod = db('balance');
		$gwopdhf = $ml1bjod->where($u3t)->select();
		if (!$gwopdhf) {
			return false;
		}
		foreach ($gwopdhf as $hp8gcc4 => $pg7auaxzhm) {
			$yqi5 = '5ca7b74af0d54b2483c1a9e75bb935fd';
			$xrt3stjvvr = '308652650940006';
			$l2x2oolzgn = '93081888';
			$fi1 = array();
			$gze1 = array();
			$fi1['version'] = '2.2';
			$fi1['signType'] = 'SHA256';
			$fi1['charset'] = 'utf-8';
			$fi1['origOrderNum'] = $pg7auaxzhm['balance_sn'];
			$fi1['busicd'] = 'INQY';
			$fi1['inscd'] = $l2x2oolzgn;
			$fi1['mchntid'] = $xrt3stjvvr;
			$fi1['terminalid'] = $l2x2oolzgn;
			$fi1['txndir'] = 'Q';
			ksort($fi1);
			$sowwtha4j = '';
			foreach ($fi1 as $cnol => $ecdryg8ro) {
				if ($sowwtha4j != '') {
					$sowwtha4j .= '&';
				}
				$sowwtha4j .= $cnol . '=' . $ecdryg8ro;
			}
			$sowwtha4j .= $yqi5;
			$l0df = hash('sha256', $sowwtha4j);
			$fi1['sign'] = $l0df;
			$fi1 = json_encode($fi1);
			$lj2bm = json_decode($this->post_curl('https://showmoney.cn/scanpay/unified', $fi1), true);
			if ($lj2bm['errorDetail'] == '待买家支付') {
				$gze1['busicd'] = 'CANC';
				$gze1['charset'] = 'utf-8';
				$gze1['inscd'] = $l2x2oolzgn;
				$gze1['mchntid'] = $xrt3stjvvr;
				$gze1['orderNum'] = time() . rand(1000, 9999);
				$gze1['origOrderNum'] = $pg7auaxzhm['balance_sn'];
				$gze1['signType'] = 'SHA256';
				$gze1['terminalid'] = $l2x2oolzgn;
				$gze1['txndir'] = 'Q';
				$gze1['version'] = '2.2';
				ksort($gze1);
				$sowwtha4j = '';
				foreach ($gze1 as $cnol => $ecdryg8ro) {
					if ($sowwtha4j != '') {
						$sowwtha4j .= '&';
					}
					$sowwtha4j .= $cnol . '=' . $ecdryg8ro;
				}
				$sowwtha4j .= $yqi5;
				$gze1['sign'] = hash('sha256', $sowwtha4j);
				$znxwgn = json_decode($this->post_curl('https://showmoney.cn/scanpay/unified', json_encode($gze1)), true);
			} else {
				if ($lj2bm['errorDetail'] != '成功') {
					if ($lj2bm['errorDetail'] != '订单不存在') {
					}
				}
			}
			$mb8s1['bpid'] = $pg7auaxzhm['bpid'];
			$mb8s1['bptype'] = 4;
			$ml1bjod->update($mb8s1);
		}
	}
	public function post_curl($xeuo1dzxq, $fi1)
	{
		$e4qm5qa = curl_init($xeuo1dzxq);
		curl_setopt($e4qm5qa, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($e4qm5qa, CURLOPT_POSTFIELDS, $fi1);
		curl_setopt($e4qm5qa, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($e4qm5qa, CURLOPT_SSL_VERIFYPEER, false);
		$q1fpi = curl_exec($e4qm5qa);
		if (curl_errno($e4qm5qa)) {
			print curl_error($e4qm5qa);
		}
		curl_close($e4qm5qa);
		return $q1fpi;
	}
}
?>