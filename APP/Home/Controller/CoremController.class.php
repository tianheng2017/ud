<?php
namespace Home\Controller;
use Think\Controller;
class CoremController extends Controller
{
   
    public function hintervalupdata()
    {
        //exit;
		
		$ntime = time();
		$orderconfig = M('orderconfig')->where(array('id'=>1))->find();
		//paypipeiouttime 支付匹配超时时间/s		 payouttime 支付超时时间/s 
		
		
		
		
		
		//匹配失败处理---------------------------------------
		
		
		$orderlist = M('roborder')->where(array('status'=>1))->order('id asc')->select();
		if(!empty($orderlist)){
			
			foreach($orderlist as $k=>$v){
				
				
				if($v['addtime']<=$ntime-$orderconfig['paypipeiouttime'] || $v['uponlinetime']<=$ntime-$orderconfig['payonlineouttime']){
				
					$uroborder = M('roborder')->where(array('id'=>$v['id'],'status'=>1))->save(array('status'=>5,'finishtime'=>$ntime)); //修改订单状态
				
				}
				
			}
		
		}
		
		
		
		//匹配后支付超时处理---------------------------------------
		
		$userroblist = M('userrob')->where(array('status'=>2))->order('id asc')->select();
		if(!empty($userroblist)){
			
			foreach($userroblist as $k2=>$v2){
				
				
				
				$timeed = $ntime-$v2['pipeitime'];
				
				if($timeed>=$orderconfig['payouttime']){
					
					$uuserrob = M('userrob')->where(array('id'=>$v2['id'],'status'=>2))->save(array('status'=>4,'finishtime'=>$ntime,'hasfalistate'=>-1)); //修改定单状态
					if($uuserrob){
						$uroborder = M('roborder')->where(array('id'=>$v2['ppid'],'status'=>2))->save(array('status'=>4,'finishtime'=>$ntime)); //修改后台发布的订单状态
					}
					
				}
				
			}
		
		}
		
		
		
		
		
		print_r(time());
		exit;
    }




    public function setintervalupdata(){
        
        $this->display();
    }


	
	
	
	
	
	
	
	
	
	
	public function hcoinpricedo()
	{
		$system = M('system')->where(array('id'=>1))->find();
		if(is_numeric($system['handcoinprice']) && $system['handcoinprice']>0){
			$data2 = array();
			$data2['price'] = $system['handcoinprice'];
			M('coinprice')->where(array('id'=>1))->save($data2);
			print_r($data2);exit;
		}
		
		$purl = 'https://fxhapi.feixiaohao.com/public/v1/ticker?convert=CNY';
		
		$result = file_get_contents($purl);
		
		$result = json_decode($result,true);
		
		$found_key = array_search('tether', array_column($result, 'id'));
		if(!empty($found_key)&&!empty($result[$found_key])&&$result[$found_key]['id']=="tether"){
			
			$price_cny = $result[$found_key]['price_cny'];
			
			if(is_numeric($price_cny)&&$price_cny>0){
				
				$data = array();
				$data['price'] = $price_cny;
				M('coinprice')->where(array('id'=>1))->save($data);
				
				print_r($price_cny);exit;
			}
		}
		
		echo "error";
	}
	
	
	
	
	
	
	
	
	
	
	
	
    public function PaySubmitDo(){
        if($_POST){
			$type=trim(I('post.type'));
			$token=trim(I('post.token'));
			$out_trade_no=trim(I('post.out_trade_no'));
			$total_fee=trim(I('post.total_fee'));
			$time=trim(I('post.time'));
			
			$app_id = "44fik8kw9s58";
			$app_secret = "csd8g1rh1t661sdsdew1sdf5af6511111554sd4f4sdfhjmg";
			$tokenv = md5($app_id.$time.$app_secret);
			
			
			if(($type!=1 && $type!=2 && $type!=3 && $type!=6) || !is_numeric($total_fee) || $total_fee<=0 || $token!=$tokenv || $time<1 || empty($out_trade_no)){
				$rdata = array();
				$rdata['code'] = -1;
				$rdata['id'] = -1;
				$rdata = json_encode($rdata,true);
				print_r($rdata);exit;
			}
			
			$coinprice = M('coinprice')->where(array('id'=>1))->find();
			$coinpricev = $coinprice['price'];
			
			$pricec = $total_fee/$coinpricev;
			
			$date['class'] = $type;
			$date['pricermb'] = $total_fee;
			$date['price'] = $pricec;
			$date['pricec'] = $pricec;
			$date['addtime'] = $time;
			$date['uponlinetime'] = $time;
			$date['status'] = 1;
			$date['ordernum'] = $out_trade_no;
			
			$re = M('roborder')->add($date);

			if($re){
				$rdata = array();
				$rdata['code'] = 1;
				$rdata['id'] = $re;
				$rdata = json_encode($rdata,true);
				print_r($rdata);exit;
			}else{
				$rdata = array();
				$rdata['code'] = -1;
				$rdata['id'] = -1;
				$rdata = json_encode($rdata,true);
				print_r($rdata);exit;
			}
		}
    }

	
	
	
	
	
	public function Pay(){
        
        if($_GET){
			
			$id = trim(I('get.id'));
			
			$roborder = M('roborder')->where(array('id'=>$id))->find();
			
			
			if($roborder){
				$this->assign('roborder',$roborder);
				
				
				
				if($roborder['status']==1){
					$this->display('pay1');exit;
				}
				if($roborder['status']==2){
					
					$olist = M('userrob')->where(array('ppid'=>$roborder['id']))->find();
					//print_r($olist);exit;
					$ewmlist = M('ewm')->where(array('uid'=>$olist['uid'],'state'=>1,'ewm_class'=>$olist['class']))->find();
					//print_r($ewmlist);exit;
					if(empty($ewmlist)){
						$this->error('并发过高，请重新支付！');
					}
					$this->assign('olist',$olist);
					$this->assign('ewmlist',$ewmlist);
					
					
					
					
					$orderconfig = M('orderconfig')->where(array('id'=>1))->find();
					//paypipeiouttime 支付匹配超时时间/s		 payouttime 支付超时时间/s 

					$this->assign('orderconfig',$orderconfig);
					
					
					$ntime = time();
					$this->assign('ntime',$ntime);
					
					$timeed = $ntime-$olist['pipeitime'];
					
					$this->assign('stimev',$orderconfig['payouttime']-$timeed);
					
					$this->display('pay2');exit;
				}
				
				if($roborder['status']==3){
					$this->display('pay3');exit;
				}
				if($roborder['status']==4){
					$this->display('pay4');exit;
				}
				if($roborder['status']==5){
					$this->display('pay5');exit;
				}
				
				$this->error('并发过高，请重新支付！');
			}else{
				$this->error('并发过高，请重新支付！');
			}
			
			
			
			
			
			
		}else{
			$this->error('并发过高，请重新支付！');
		}
    }
	
	public function getqiangdanxqdata(){
		$data = array();
		$data['state'] = 0;
		if($_GET){
			
			
			$id = trim(I('get.id'));
			$olist = M('roborder')->where(array('id'=>$id))->find();
			if($olist){
				$data['state'] = 1;
				$data['data']['status'] = $olist['status'];
			}
			
		}else{
			
		}
		
		print_r(json_encode($data,true));
	}
	
	
	public function uporderonlinedo(){
		if($_GET){
			
			$id = trim(I('get.id'));
			
			$roborder = M('roborder')->where(array('id'=>$id))->find();
			
			
			if($roborder){
				$uroborder = M('roborder')->where(array('id'=>$id,'status'=>1))->save(array('uponlinetime'=>time()));
			}
		}
		echo time();
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function Uinmoneydo(){
		exit;
        if($_POST){
			$utoken=trim(I('post.utoken'));
			$money=trim(I('post.money'));
			$type=trim(I('post.type'));
			$time=trim(I('post.time'));
			$key=trim(I('post.key'));
			
			
			$app_id = "c20190001555151986";
			$app_secret = "wffg1rgfdajmde2fds5sdadasd6cak8k";
			$keyv = md5($app_id.$utoken.$money.$type.$time.$app_secret);
			
			
			if(($type!=1 && $type!=3) || !is_numeric($money) || $money<=0 || $key!=$keyv || $time<1 || empty($utoken)){
				$rdata = array();
				$rdata['code'] = -1;
				$rdata['info'] = "-1";
				$rdata = json_encode($rdata,true);
				print_r($rdata);exit;
			}
			
			$username = $utoken;
			
			$user= M('user')->where(array('account'=>$username))->find();
			if(!empty($user)){
				
				$res = M('user')->where(array('userid'=>$user['userid']))->setInc('money',$money);
				
				if($res){
					$coin = "USDT";
					if($type == 3){
						$coin = "佣金";
					}
					
					$mlog['uid'] = $user['userid'];
					$mlog['jl_class'] = 130 + $type;
					$mlog['info'] = "金沙转入 | ".$coin; 
					$mlog['addtime'] = $time; 
					$mlog['jc_class'] = '+'; 
					$mlog['num'] = $money;
					
					$mlogres = M('somebill')->add($mlog);
					
					
					if($mlogres){
				
						$rdata = array();
						$rdata['code'] = 1;
						$rdata['info'] = "1";
						$rdata = json_encode($rdata,true);
						print_r($rdata);exit;
						
					}else{
						$rdata = array();
						$rdata['code'] = -1005;
						$rdata['info'] = "-1005";
						$rdata = json_encode($rdata,true);
						print_r($rdata);exit;
					}
					
				}else{
					$rdata = array();
					$rdata['code'] = -1003;
					$rdata['info'] = "-1003";
					$rdata = json_encode($rdata,true);
					print_r($rdata);exit;
				}
				
			}else{
				$rdata = array();
				$rdata['code'] = -1001;
				$rdata['info'] = "-1001";
				$rdata = json_encode($rdata,true);
				print_r($rdata);exit;
			}
		}
    }
	
}
