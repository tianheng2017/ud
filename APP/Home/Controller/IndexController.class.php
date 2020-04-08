<?php

namespace Home\Controller;

use http\Url;
use Think\Controller;

class IndexController extends CommonController
{

    public function running(){
        $lists = M('running')->where(['uid'=>session('userid')])->order('time asc')->select();
        $this->assign('lists', $lists);
        $this->display();
    }

    private function getMoney($xmoney, $all){
        $smoney = mt_rand(1, $xmoney - $all);
        if ($smoney > $xmoney*0.06){
            $smoney = $this->getMoney($xmoney, $all);
        }
        return $smoney;
    }

    //每小时定时执行该函数, 每天随机生成总和为5倍的虚假流水,单次不低于10快,不高于5倍金额的6%
    public function auto(){
        $today_start = strtotime(date('Y-m-d 00:00:00', time()));
        $today_end =  strtotime(date('Y-m-d 23:59:59', time()));
        $moneys = M('user')->where(['real'=>1])->getField('userid,money');
        $diff = time() - $today_start;
        if ($diff < 2000){
            $time = rand(1, $diff-1);
        }else{
            $time = time() - mt_rand(10,2000);
        }
        foreach ($moneys as $k => $money){
            $xmoney = $money*5;
            $map['time'] = array(array('gt', $today_start), array('lt', $today_end));
            $map['uid'] = $k;
            $all = M('running')->where($map)->sum('money');
            if ($all < $xmoney){
                $smoney = $this->getMoney($xmoney, $all);
                if ($smoney > 10){
                    $data['time'] = $time;
                    $data['money'] = $smoney;
                    $data['uid'] = $k;
                    M('running')->data($data)->add();
                }
            }
        }
    }

    public function index(){
//
//		$ulist = M('user')->order('zsy desc')->limit(10)->select();
//
//		foreach($ulist as $k=>&$v){
//			$v['username'] = $this->substr_cut($v['username']);
//		}
//
//
//
//		$num = count($ulist);
//
//		$this->assign('num',$num);
//		$this->assign('ulist',$ulist);
//        $this->display();
        $this->redirect('User/index');
    }
	
	public function substr_cut($user_name){
		$strlen     = mb_strlen($user_name, 'utf-8');
		$firstStr     = mb_substr($user_name, 0, 2, 'utf-8');
		$lastStr     = mb_substr($user_name, -2, 2, 'utf-8');
		return $strlen == 2 ? mb_substr($user_name, 0, 1, 'utf-8') . str_repeat('*', mb_strlen($user_name, 'utf-8') - 1) : $firstStr . "**" . $lastStr;
	}
	
	public function qdgame(){
		$userid = session('userid');
		$ulist = M('user')->where(array('userid'=>$userid))->find();
		$clist = M('system')->where(array('id'=>1))->find();
		if($ulist['money'] > 0){
			$max_pipeinone = $ulist['money'] * ($clist['qd_cf']  / 100);
		}else{
			$max_pipeinone = 0;
		}
		

		
		$tarr = explode(',',$clist['qd_ndtime']);
		/*******刷新一次更改一次，不行*******/
		/* $st = in_array($h,$tarr);
		
		$nd = explode(',',$clist['qd_nd']);
		
		$num = count($nd);
		$key = rand(0,$num-1);	

		if($st){

			$key = rand(0,$num-1);

			if($key=='' || $key == 0){
				$key = '0';
			}
			if($m > 0 && $m <= 59){
				$tkey = $key;
			}
			$qd_yjjc = $nd[$tkey];
		}else{
			$qd_yjjc = '0';
		}  */
		
		/******只能手动后台更改了*****/
		
		/*
		$cpriceproportionc = $this->getucpriceproportion($userid);
		if($ulist['cpriceproportion']!=$cpriceproportionc){
			$ulist['cpriceproportion'] = $cpriceproportionc;
			M('user')->where(array('userid'=>$userid))->save(array("cpriceproportion" => $cpriceproportionc));
		}
		*/
		$cpriceproportionc = $ulist['cpriceproportion'];
		
		$coinprice = M('coinprice')->where(array('id'=>1))->find();
		
		$this->assign('coinprice',$coinprice);
		
		$this->assign('ulist',$ulist);
		
		$this->assign('tarr',$tarr);
		$this->assign('qd_nd',$clist['qd_nd']);
		$this->assign('qd_yjjc',$clist['qd_yjjc']);
		$this->assign('max_pipeinone',$max_pipeinone);
		
		
		$selcity = M('selcity')->where(array('uid'=>$userid))->find();
		if($selcity && !empty($selcity['cityv'])){
			$this->assign('selcityv',$selcity['cityv']);
		}else{
			$this->assign('selcityv',"默认");
		}
		
		$this->display();		
	}
	
	
	
	
	

	public function getucpriceproportion($uid){
		return 0;
		exit;
		
		$cpriceproportion = 0.8;
		
		$Model = new \Think\Model();
		$Model->query("select * from __PREFIX__userrob where status=1");
		
		
		
		$meallm = $Model->query("SELECT SUM(pricermb) allmoney FROM `__PREFIX__userrob` WHERE status=3 and uid='".$uid."' ");
		$meallm = $meallm[0]['allmoney']?: 0;
		
		$toallm = $Model->query("SELECT SUM(pricermb) allmoney FROM `__PREFIX__userrob` WHERE status=3 and uid in ( SELECT uidsubordinate FROM `__PREFIX__regpath` WHERE uid='".$uid."' ) ");
		$toallm = $toallm[0]['allmoney']?: 0;
		
		$tallm = $meallm + $toallm;
		
		/*
		$jtimev = strtotime(date("Y-m-d 00:00:00",time()));
		
		$meallmj = $Model->query("SELECT SUM(pricermb) allmoney FROM `__PREFIX__userrob` WHERE addtime>'".$jtimev."' and status=3 and uid='".$uid."' ");
		$meallmj = $meallmj[0]['allmoney']?: 0;
		
		$toallmj = $Model->query("SELECT SUM(pricermb) allmoney FROM `__PREFIX__userrob` WHERE addtime>'".$jtimev."' and status=3 and uid in ( SELECT uidsubordinate FROM `__PREFIX__regpath` WHERE uid='".$uid."' ) ");
		$toallmj = $toallmj[0]['allmoney']?: 0;
		
		$tallmj = $meallmj + $toallmj;
		*/
		if($tallm>=300000){ $cpriceproportion = 0.8; }
		if($tallm>=900000){ $cpriceproportion = 0.9; }
		if($tallm>=2700000){ $cpriceproportion = 1; }
		if($tallm>=8100000){ $cpriceproportion = 1.1; }
		if($tallm>=24000000){ $cpriceproportion = 1.2; }
		if($tallm>=36000000){ $cpriceproportion = 1.25; }
		if($tallm>=48000000){ $cpriceproportion = 1.3; }
		if($tallm>=60000000){ $cpriceproportion = 1.35; }
		if($tallm>=72000000){ $cpriceproportion = 1.4; }
		if($tallm>=90000000){ $cpriceproportion = 1.5; }
		return $cpriceproportion;
	}
	
	
	
	
	
	//2、点击切换 需要激活 激活要扣费 一个月 10USDT 三个月是 24  6个月是40USDT 。
	//3、选择一个省份之后 三天后才能继续切换
	public function selcitydo(){
		if($_POST){
			$cityv=trim(I('post.cityv'));
			
			$userid = session('userid');
			
			
			//cityv     starttime     endtime    seltime
			$selcity = M('selcity')->where(array('uid'=>$userid))->find();
			if($selcity){
				if($selcity['endtime'] > time()){
					
					if($selcity['seltime'] > time()-60*60*24*3){
						//三天内仅可切换一次
						$data['status'] = -1003;
						$data['msg'] = '三天内仅可切换一次！';
						$this->ajaxReturn($data);exit;
					}else{
						
						if($cityv!=$selcity['cityv']){
							$res = M('selcity')->where(array('uid'=>$userid))->save(array("cityv" => $cityv , "seltime" => time()));
							if($res){
								$data['status'] = 1;
								$data['msg'] = '切换成功！';
								$this->ajaxReturn($data);exit;
							}else{
								$data['status'] = -1001;
								$data['msg'] = '切换失败！';
								$this->ajaxReturn($data);exit;
							}
						}else{
							//相同，无需切换
							$data['status'] = -1005;
							$data['msg'] = '地区相同，无需切换！';
							$this->ajaxReturn($data);exit;
						}
					}
					
				}else{
					//该功能激活已到期
					$data['status'] = 0;
					$data['msg'] = '该功能激活已到期！';
					$this->ajaxReturn($data);exit;
				}
				
			}else{
				//未激活该功能
				$data['status'] = -1;
				$data['msg'] = '未激活该功能！';
				$this->ajaxReturn($data);exit;
			}
		}
	}
	
	
	
	public function selcityday(){
		if($_POST){
			$days=trim(I('post.days'));
			if($days!=30 && $days!=90 && $days!=180){
				$data['status'] = -1;
				$data['msg'] = 'Error-激活失败！';
				$this->ajaxReturn($data);exit;
			}
			
			$money = 10;
			if($days==30){
				$money = 10;
			}
			if($days==90){
				$money = 24;
			}
			if($days==180){
				$money = 40;
			}
			
			$time = time();
			
			$userid = session('userid');
			$uid = $userid;
			
			$ulist = M('user')->where(array('userid'=>$uid))->find();
			if($money > $ulist['money']){
				$data['status'] = -1001;
				$data['msg'] = '账户余额不足';
				$this->ajaxReturn($data);exit;
			}
			
			
			//cityv     starttime     endtime    seltime
			$selcity = M('selcity')->where(array('uid'=>$userid))->find();
			if($selcity){
				if($selcity['endtime'] > $time){
					
					$data['status'] = -1;
					$data['msg'] = 'Error-激活失败！';
					$this->ajaxReturn($data);exit;
					
				}else{
					//该功能激活已到期
					$udm =  M('user')->where(array('userid'=>$uid))->setDec('money',$money);
					if($udm){
						$mlog['uid'] = $uid;
						$mlog['jl_class'] = 151;
						$mlog['info'] = "切换地区激活 | ".$days."天"; 
						$mlog['addtime'] = $time; 
						$mlog['jc_class'] = '-'; 
						$mlog['num'] = $money;
						$mlogres = M('somebill')->add($mlog);
						
						$res = M('selcity')->where(array('uid'=>$userid))->save(array("starttime" => $time , "endtime" => $time + 60*60*24 * $days));
						if($res){
							$data['status'] = 1;
							$data['msg'] = '激活成功！';
							$this->ajaxReturn($data);exit;
						}else{
							$data['status'] = -1;
							$data['msg'] = '激活失败！';
							$this->ajaxReturn($data);exit;
						}
					}else{
						$data['status'] = -1;
						$data['msg'] = 'Error-激活失败！';
						$this->ajaxReturn($data);exit;
					}
				}
				
			}else{
				//未激活该功能
				$udm =  M('user')->where(array('userid'=>$uid))->setDec('money',$money);
				if($udm){
					$mlog['uid'] = $uid;
					$mlog['jl_class'] = 151;
					$mlog['info'] = "切换地区激活 | ".$days."天"; 
					$mlog['addtime'] = $time; 
					$mlog['jc_class'] = '-'; 
					$mlog['num'] = $money;
					$mlogres = M('somebill')->add($mlog);
					
					$insd['uid'] = $userid;
					$insd['starttime'] = $time;
					$insd['endtime'] =  $time + 60*60*24 * $days;
					$insd['seltime'] = 0;
					$insd['cityv'] = "";
					
					$res = M('selcity')->add($insd);
					if($res){
						$data['status'] = 1;
						$data['msg'] = '激活成功！';
						$this->ajaxReturn($data);exit;
					}else{
						$data['status'] = -1;
						$data['msg'] = '激活失败！';
						$this->ajaxReturn($data);exit;
					}
					
				}else{
					$data['status'] = -1;
					$data['msg'] = 'Error-激活失败！';
					$this->ajaxReturn($data);exit;
				}
				
			}
		}
	}
	
	
	
	
	
	public function shoudan(){
		$userid = session('userid');
		$where['pipeitime'] = array('gt',strtotime(date("Y-m-d 00:00:00",time())));
		$slist = M('userrob')->where(array('uid'=>$userid,'status'=>2))->where($where)->order('id desc')->select();
		$flist = M('userrob')->where(array('uid'=>$userid,'status'=>3))->where($where)->order('id desc')->select();
		$dlist = M('userrob')->where(array('uid'=>$userid,'status'=>4))->where($where)->order('id desc')->select();
		$this->assign('slist',$slist);
		$this->assign('flist',$flist);
		$this->assign('dlist',$dlist);
		$this->display();	
	}
	
	//会员抢单详请
	public function qiangdanxq(){
		if($_GET){
			$userid = session('userid');
			$ulist = M('user')->where(array('userid'=>$userid))->find();
			$id = trim(I('get.id'));
			$olist = M('userrob')->where(array('id'=>$id,'uid'=>$userid))->find();
			$ewmlist = M('ewm')->where(array('uid'=>$userid,'state'=>1,'ewm_class'=>$olist['class']))->find();
			if(empty($ewmlist)){
				$this->error('您的码已关闭！');
			}
			$this->assign('olist',$olist);
			$this->assign('ewmlist',$ewmlist);
			
			
			
			if($olist['status']==2){
				
				
				$orderconfig = M('orderconfig')->where(array('id'=>1))->find();
				//paypipeiouttime 支付匹配超时时间/s		 payouttime 支付超时时间/s 

				$this->assign('orderconfig',$orderconfig);
				
				
				$ntime = time();
				$this->assign('ntime',$ntime);
				
				$timeed = $ntime-$olist['pipeitime'];
				
				if($timeed>=$orderconfig['payouttime']){
					
					$uuserrob = M('userrob')->where(array('id'=>$id,'status'=>2))->save(array('status'=>4,'finishtime'=>$ntime,'hasfalistate'=>-1)); //修改定单状态
					if($uuserrob){
						$uroborder = M('roborder')->where(array('id'=>$olist['ppid'],'status'=>2))->save(array('status'=>4,'finishtime'=>$ntime)); //修改后台发布的订单状态
					
						if($uroborder){
							header('Location: /Index/qdgame.html');exit;
						}else{
							$this->error('未知错误'); 
						}
						
					}else{
						$this->error('未知错误'); 
					}
					
				}
				
				$this->assign('stimev',$orderconfig['payouttime']-$timeed);
				
				
				
				$this->display('qiangdanxq2');
			}else{
				$this->display();
			}
			
		}else{
			$this->error('未知错误',U('Index/shoudan'));
		}
		
	}
	
	
	
	public function getqiangdanxqdata(){
		$data = array();
		$data['state'] = 0;
		if($_GET){
			
			
			$userid = session('userid');
			$id = trim(I('get.id'));
			$olist = M('userrob')->where(array('id'=>$id,'uid'=>$userid))->find();
			if($olist){
				$data['state'] = 1;
				$data['data']['status'] = $olist['status'];
			}
			
		}else{
			
		}
		
		print_r(json_encode($data,true));
	}
	
	
	public function shoudaning(){
		$userid = session('userid');
		$where['status'] = array('not in','3,4,5');
		$where['uid'] =$userid;
		$ond = M('userrob')->where($where)->find();
		
		if($ond){
			header('Location: /Index/qiangdanxq/id/'.$ond['id'].'.html');
		}else{
			header('Location: /Index/qdgame.html');exit;
		}
	}
	
	
	
	
	
	
	
	//确认订单接口
	public function setsuccessorderdo(){
		if($_POST){
			$id=trim(I('post.id'));
			
			
			$userid = session('userid');
			$list = M('userrob')->where(array('id'=>$id,'uid'=>$userid))->find();
			if($list){
				
				if($list['status']==2){
					
					$ntime = time();
					
					$pipeilist = M('roborder')->where(array('id'=>$list['ppid']))->find();//被 匹配的订单
					$ulist =  M('user')->where(array('userid'=>$list['uid']))->find();
					
					if($list['class'] ==1){
						$str = '微信抢单';
					}elseif($list['class'] ==2){
						$str = '支付宝抢单';
					}elseif($list['class'] ==3){
						$str = '银行卡抢单';
					}elseif($list['class'] ==6){
                        $str = 'USDT抢单';
                    }
				
					
					
					
					
					$mdst_re = M('userrob')->where(array('id'=>$id,'status'=>2))->save(array('status'=>3,'finishtime'=>$ntime)); //修改定单状态
					
					$rob_mdst = M('roborder')->where(array('id'=>$list['ppid'],'status'=>2))->save(array('status'=>3,'finishtime'=>$ntime)); //修改后台发布的订单状态
					
					if($mdst_re && $rob_mdst){
						
					
						$zsy_re = M('user')->where(array('userid'=>$list['uid']))->setInc('zsy',($list['price'])); //记录匹配收款和佣金
						
						if($zsy_re){
							
								$billdec['uid'] = $ulist['userid'];
								$billdec['jl_class'] = 5; //抢单
								$billdec['info'] = $str.'本金'; 
								$billdec['addtime'] = $ntime; 
								$billdec['jc_class'] = '-'; 
								$billdec['num'] = $list['price'];
								
								$billdec_re = M('somebill')->add($billdec);
								
								
								
								if($billdec_re){
									
									/*
									if(!empty($ulist['superioruid'])){
										$superioru1 = M('user')->where(array('userid'=>$ulist['superioruid']))->find();//上一代
										
										//一代佣金奖励
										if(!empty($superioru1)){
											
											//$Index = new IndexController;
											//$superioru1['cpriceproportion'] = $Index->getucpriceproportion($superioru1['userid']);
											//$ucpriceproportionc =  $Index->getucpriceproportion($ulist['userid']);
											
											$ucpriceproportionc =  $ulist['cpriceproportion'];
											
											if($superioru1['cpriceproportion']>$ucpriceproportionc){
												
												$ccpriceproportionc = $superioru1['cpriceproportion']-$ucpriceproportionc;
												
												$oneyj_money = $list['price'] * $ccpriceproportionc /100; //上一代佣金
												
												$puser_inc_re = M('user')->where(array('userid'=>$superioru1['userid']))->setInc('money',$oneyj_money);
												
												if($puser_inc_re){							
													$puser_bill['uid'] = $superioru1['userid'];
													$puser_bill['jl_class'] = 1; //佣金类型
													$puser_bill['info'] = '下级点位差收益'; 
													$puser_bill['addtime'] = $ntime; 
													$puser_bill['jc_class'] = '+'; 
													$puser_bill['num'] = $oneyj_money;
													M('somebill')->add($puser_bill);
												}
											
											}
										}
									}
									*/
									
									
									/****************团队返利处理*****************************************/

									
									$this -> teamgivemoneym($ulist['superioruid'],$ulist['cpriceproportion'],$list['price'],$ntime,$ulist['userid']);
									
									
									/*********************这里添加打款成功短信提示***********************/
									
									
									
									/*********************回调通知***********************/
									
									
									
									
									$orderidpw = $list['ordernum'];
									
									
									$app_id = "44fik8kw9s58";
									$app_secret = "csd8g1rh1t661sdsdew1sdf5af6511111554sd4f4sdfhjmg";
									$token = md5($app_id.$orderidpw.$app_secret);
									
									$dataarr = array(
										"orderidpw" => $orderidpw,
										"token" => $token
									);
									
									$purl = 'http://pay2.xigaodi.top/pay/index.php/spay/notify';
									
									
									function sendHttpPostCurl($url, $data = null, $header = null, $referer = null)
									{
										$ch = curl_init();
										curl_setopt($ch, CURLOPT_TIMEOUT, 30);
										curl_setopt($ch, CURLOPT_URL, $url);

										if ($header) {
											curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
										}
										if ($referer) {
											curl_setopt($ch, CURLOPT_REFERER, $referer);
										}
										if ($data) {
											curl_setopt($ch, CURLOPT_POST, 1);
											curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
										} else {
											curl_setopt($ch, CURLOPT_POST, false);
										}
										if (stripos($url, 'https://') !== false) {
											curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   // 跳过证书检查
											curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);   // 从证书中检查SSL加密算法是否存在
										}

										//  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));   //避免data数据过长问题
										curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

										$res = curl_exec($ch);

										if ($error = curl_error($ch)) {
											return "Error:404";
											/*
											echo '=====info=====' . "\r\n";
											print_r(curl_getinfo($ch));
											echo '=====error=====' . "\r\n";
											print_r(curl_error($ch));
											echo '=====$response=====' . "\r\n";
											print_r($res);
											die($error);
											*/
										}
										curl_close($ch);
										return $res;
									}
									
									$result = sendHttpPostCurl($purl,$dataarr);
									
									
									
									
									
									
									
									
									
									
									$data['status'] = 1;
									$data['msg'] = '确认成功';
									$this->ajaxReturn($data);exit;
									
								}else{
									$data['status'] = 0;
									$data['msg'] = '未知错误';
									$this->ajaxReturn($data);exit;
								}
								

							
						}else{
							$data['status'] = 0;
							$data['msg'] = '未知错误';
							$this->ajaxReturn($data);exit;
						}
					
					
					
					}else{
						
						$data['status'] = 0;
						$data['msg'] = '未知错误';
						$this->ajaxReturn($data);exit;
						
					}
					
					
					
					
				}else{
					$data['status'] = -2;
					$data['msg'] = '该订单已结束';
					$this->ajaxReturn($data);exit;
				}
				
			}else{
				$data['status'] = 0;
				$data['msg'] = '订单不存在';
				$this->ajaxReturn($data);exit;
			}
		}
	}
	
	
	
	
	
	
	

	
	
	
	public function teamgivemoneym($ulistsuperioruid,$ulistcpriceproportion,$listprice,$ntime,$uidy){
		
		//$this -> teamgivemoneym($ulist['superioruid'],$ulist['cpriceproportion'],$list['price'],$ntime);
		
		if(!empty($ulistsuperioruid)){
			$superioru1 = M('user')->where(array('userid'=>$ulistsuperioruid))->find();//上一代
			
			//一代佣金奖励
			if(!empty($superioru1)){
				
				$ucpriceproportionc = $ulistcpriceproportion;
				
				if($superioru1['cpriceproportion']>$ucpriceproportionc){
					
					$ccpriceproportionc = $superioru1['cpriceproportion']-$ucpriceproportionc;
					
					$oneyj_money = $listprice * $ccpriceproportionc /100; //上一代佣金
					
					if($oneyj_money>0){
						
						$puser_inc_re = M('user')->where(array('userid'=>$superioru1['userid']))->setInc('money',$oneyj_money);
						
						if($puser_inc_re){							
							$puser_bill['uid'] = $superioru1['userid'];
							$puser_bill['jl_class'] = 1; //佣金类型
							$puser_bill['info'] = '团队点位差收益|'.$uidy; 
							$puser_bill['addtime'] = $ntime; 
							$puser_bill['jc_class'] = '+'; 
							$puser_bill['num'] = $oneyj_money;
							M('somebill')->add($puser_bill);
						}
						
					}
				}
				
				
				$this -> teamgivemoneym($superioru1['superioruid'],$superioru1['cpriceproportion'],$listprice,$ntime,$uidy);
				
			}
		}
		
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//生成抢单订单
	public function pipeiorder(){
		if($_POST){
			$qdclass=trim(I('post.qdclass'));
			$userid = session('userid');
			$ulist = M('user')->where(array('userid'=>$userid))->find();
			$clist = M('system')->where(array('id'=>1))->find();
			/*
			if($ulist['rz_st'] != 1){
				$data['status'] = 0;
				$data['msg'] = '请先完善资料';
				$this->ajaxReturn($data);exit;
			}
			*/
			if($ulist['tx_status'] != 1){
				$data['status'] = 0;
				$data['msg'] = '您的账号被管理员禁止抢单';
				$this->ajaxReturn($data);exit;
			}
			if($ulist['money'] > 0){
				$max_pipeinone = $ulist['money'] * ($clist['qd_cf']  / 100);
			}else{
				$max_pipeinone = 0;
			}
			
			if($max_pipeinone < $clist['qd_minmoney']){
				$data['status'] = 0;
				$data['msg'] = '最低抢单额度为'.$clist['qd_minmoney'];
				$this->ajaxReturn($data);exit;
			}

			/****需要添加一个未完成订单限制*******/
			$where['status'] = array('not in','3,4,5');
			$where['uid'] =$userid;
			$no_count = M('userrob')->where($where)->count();
			if($no_count ){
				$data['status'] = 11;
				$data['msg'] = '您当前有一条匹配订单正在进行中';
				$this->ajaxReturn($data);exit;
			}
			/********************/
			
			$count_qrnum = M('ewm')->where(array('uid'=>$userid,'ewm_class'=>$qdclass,'state'=>1))->count();
			
			if($qdclass == 1){
				$str = '微信收款二维码';
			}elseif($qdclass== 2){
				$str = '支付宝收款二维码';
			}elseif($qdclass==3){
				$str = '银行收款二维码';
			}elseif($qdclass==6){
				$str = 'USDT收款二维码';
			}
			
			if($count_qrnum < 1){
				$data['status'] = 0;
				$data['msg'] = '您没有上传'.$str;
				$this->ajaxReturn($data);exit;
			}
			
			if($ulist['qd_status'] != 1){
				$data['status'] = 5;
				$data['msg'] = '空';
				$this->ajaxReturn($data);exit;
			}
			
			$orderconfig = M('orderconfig')->where(array('id'=>1))->find();
			//paypipeiouttime 支付匹配超时时间/s		 payouttime 支付超时时间/s 
			
			$ntime = time();
			
			
			
			/*********这里需要区分直接匹配成功，和后台没有发布订单时的排队匹配两种情况********/
			$orderlist = M('roborder')->where(array('class'=>$qdclass,'status'=>1))->order('pricec asc')->select();
			
			if(!empty($orderlist)){
				
				$ewmlist = M('ewm')->where(array('uid'=>$userid,'ewm_class'=>$qdclass,'state'=>1))->find();
				if($ewmlist){
					foreach($orderlist as $k=>$v){
						
						
						if($v['addtime']>$ntime-$orderconfig['paypipeiouttime'] && $v['uponlinetime']>$ntime-$orderconfig['payonlineouttime']){
						
							$st = 1;
							$pid = $v['id'];
							break;
						
						}
						
					}
				}
				if($st == '' || $st ==0){
					$pipeist = 0;
				}elseif($st == 1){
					$pipeist = 1;
				}
				
				if($pipeist == 1){
					//匹配成功更新后台发布的订单/生成一条匹配成功的会员匹配记录  同时减去会员账号余额，且加上佣金'qd_yjjc' 生成日录(确认后做这些操作)
					
					$tolist = M('roborder')->where(array('id'=>$pid))->find();//被匹配的这一条记录
					
					$psave = array();
					
					//$ulist['cpriceproportion'] = $this->getucpriceproportion($userid);
					
					$psave['price'] = $tolist['price']*100/(100+$ulist['cpriceproportion']);
					
					if($ulist['money'] < $psave['price']){
						$data['status'] = 5;
						$data['msg'] = '空';
						$this->ajaxReturn($data);exit;
					}
					
					
					
					$uproborders2 = M('roborder')->where(array('id'=>$pid,'status'=>1))->save(array('status'=>2)); //修改定单状态
					
					if($tolist['status'] == 1 && $uproborders2){
						
						//判断是否额度够
						if($ulist['money'] >= $psave['price'] && $psave['price']>0){
							
							$udec_re = M('user')->where(array('userid'=>$userid))->setDec('money',$psave['price']); //减去金额
							
							if($udec_re){
								
								$psave['uid'] = $userid;
								$psave['uname'] = "";
								$psave['umoney'] = $ulist['money'];
								$psave['pipeitime'] = $ntime;
								//$psave['status'] = 2;
								
								
								
								$pipei_re = M('roborder')->where(array('id'=>$pid,'status'=>2))->save($psave);
								
								if($pipei_re){
									
									$updata['uid'] = $userid;
									$updata['class'] = $qdclass;
									$updata['price'] = $psave['price'];
									$updata['pricermb'] = $tolist['pricermb'];
									$updata['pricec'] = $tolist['pricec'];
									$updata['yjjc'] = $clist['qd_yjjc'];
									$updata['umoney'] = $ulist['money'];
									$updata['uaccount'] = $ulist['account'];
									$updata['uname'] = "";
									$updata['ppid'] = $pid;
									$updata['status'] = 2;
									$updata['addtime'] = $ntime;
									$updata['pipeitime'] = $ntime;
									$updata['ordernum'] = $tolist['ordernum'];
									
									$updata['hasfalistate'] = -1;
									
									
									$up_re = M('userrob')->add($updata);
									if($up_re){
										$data['status'] = 1;
										$data['msg'] = '匹配成功';
										$this->ajaxReturn($data);exit;
									}else{
										$data['status'] = 0;
										$data['msg'] = '未知错误';
										$this->ajaxReturn($data);exit;
									}
								}else{
									$data['status'] = 0;
									$data['msg'] = '未知错误';
									$this->ajaxReturn($data);exit;
								}
								
							}else{
								$data['status'] = 0;
								$data['msg'] = '未知错误';
								$this->ajaxReturn($data);exit;
							}
						}else{
							
							$data['status'] = 5;
							$data['msg'] = '空';
							$this->ajaxReturn($data);exit;

						}
						
						
					}else{
						
						$data['status'] = 5;
						$data['msg'] = '空';
						$this->ajaxReturn($data);exit;

					}

					
				}else{
					
					$data['status'] = 5;
					$data['msg'] = '空';
					$this->ajaxReturn($data);exit;
					
				}
				
				
			}else{//后台没有符合条件的单则生成一条记录，提示等待
			
				$data['status'] = 5;
				$data['msg'] = '空';
				$this->ajaxReturn($data);exit;
				
			}

		}else{
			$data['status'] = 0;
			$data['msg'] = '非法操作';
			$this->ajaxReturn($data);exit;
			
		}
		
		
	}
	
	
	public function pipeiauto(){
		if($_POST){
			$data['status'] = 0;
			$data['msg'] = '抢单业务繁忙！';
			$this->ajaxReturn($data);exit;
		}else{
			$data['status'] = 0;
			$data['msg'] = '非法操作';
			$this->ajaxReturn($data);exit;
		}
	}




}