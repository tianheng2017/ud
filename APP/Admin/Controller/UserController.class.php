<?php
namespace Admin\Controller;
use Think\Page;
/**
 * 用户控制器
 * 
 */
class UserController extends AdminController
{
	
	public function ewm_upload()
	{
	    if (IS_AJAX) {
	        $img = trim(I('img'));
			$img2 = trim(I('img2'));
	        $base64 = str_replace('data:image/jpeg;base64,', '', $img);
			$base64_2 = str_replace('data:image/jpeg;base64,', '', $img2);
	        $img = base64_decode($base64);
			$img2 = base64_decode($base64_2);
	        $imgDir = '/Public/home/wap/kfewm/';
	        $filename = md5(time() . mt_rand(10, 99)) . ".png";
			$filename2 = md5(time() . mt_rand(10, 99)) . ".png";
	        $newFilePath = $imgDir . $filename;
			$newFilePath2 = $imgDir . $filename2;
	        $res = file_put_contents($newFilePath, $img);
			$res2 = file_put_contents($newFilePath2, $img2);
			var_dump($newFilePath);exit;
	        if ($res > 1000 || $res2 > 1000) {
	            $res_change = M('system')->where(array('id' => 1))->setField(['czewm' => $newFilePath, 'txewm' => $newFilePath2]);
	            if ($res_change) {
	                ajaxReturn('更新成功', 1);
	            } else {
	                ajaxReturn('更新失败', 0);
	            }
	        } else {
	            ajaxReturn('更新失败', 0);
	        }
	    }
	}
	
    /**
     * 注册列表
     */
    public function regmanage(){
        $querytype = trim(I('get.querytype'));
        $account = trim(I('get.keyword'));
        $map = [];
        if($querytype != ''){
            if($querytype=='mobile'){
                $map['account'] = $account;
            }elseif($querytype=='userid'){
                $map['userid'] = $account;
            }
        }
        $map['real']  = array('in','-1,0');
        $userobj = M('user');
        $count =$userobj->where($map)->count();
        $p = getpagee($count,50);
        $list = $userobj->where ( $map )->order( 'userid desc' )->limit ( $p->firstRow, $p->listRows )->select ();
        $this->assign('count',$count);
        $this->assign ( 'list', $list);
        $this->assign('count',$count);
        $this->assign ( 'page', $p->show());
        $this->display();
    }
    public function regmanagedo(){
        $userid = trim(I('get.userid'));
        $type = trim(I('get.type'));
        $user = M('user');
        $res = 0;
        if ($type == 1){
            $user->real = 1;
            $user->where('userid='.$userid)->save();
            $res +=1;
        }else if($type == 2){
            $user->real = -1;
            $user->where('userid='.$userid)->save();
            $res +=2;
        }else if ($type ==3 ){
            $user->where('userid='.$userid)->delete();
            $res +=3;
        }
        if($res == 1 || $res == 2) {
            $this->success('操作成功');
        }else if ($res == 3){
            $this->success('账号删除成功');
        }else{
            $this->error('操作失败');
        }
    }
    /**
     * 用户列表
     * 
     */
     public function index(){
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['account'] = $account;
			 }elseif($querytype=='userid'){
				  $map['userid'] = $account;
			 }
		 }else{
			 $map = '';
		 }
		
		
		
		$userobj = M('user');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,50);
		
		 if($coinpx){
			 if($coinpx == 1){
				  $list = $userobj->where ( $map )->order ( 'money desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }
		 }else{
			 $list = $userobj->where ( $map )->order ( 'userid desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		foreach($list as $k=>$v){
			$zcount =M('regpath')->where(array('uid'=>$v['userid'],'lown'=>1))->count();
			$list[$k]['zcount'] = $zcount;
			
			
			$tcount =M('regpath')->where(array('uid'=>$v['userid']))->count();
			$list[$k]['tcount'] = $tcount;
		}
		
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
    }
	
	//流水
	public function bill(){
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['account'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uid'] = $account;
			 }
		 }else{
			 $map = '';
		 }
		
		
		
		$userobj = M('somebill');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,15);
		
		 if($coinpx){
			 if($coinpx == 1){
				  $list = $userobj->where ( $map )->order ( 'money desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }
		 }else{
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
    }
	
	
	
	public function delbill(){
		$id=trim(I('get.id'));
		$re = M('somebill')->where(array('id'=>$id))->delete();
		if($re){
			$this->success('删除成功');exit;
		}else{
			$this->error('删除失败');exit;
		}
	}
	
	//提现列表
	public function recharge(){
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['account'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uid'] = $account;
			 }
		 }else{
			 $map = '';
		 }
		
		
		
		$userobj = M('recharge');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,50);
		
		 if($coinpx){
			 if($coinpx == 1){
				  $list = $userobj->where ( $map )->order ( 'price desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }else{
				 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }
		 }else{
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		$conf = M('system')->where(array('id'=>1))->find();
		$this->assign('conf',$conf);
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
	}
	
	//充值处理
	public function reedit(){
		$id = trim(I('get.id'));
		$st = trim(I('get.st'));
		$relist  = M('recharge')->where(array('id'=>$id))->find();
		$ulist = M('user')->where(array('userid'=>$relist['uid']))->find();
		
		if($st ==1){
			if($relist['status'] == 1){
				$re = M('recharge')->where(array('id'=>$id))->save(array('status'=>3));
				$ure = M('user')->where(array('userid'=>$relist['uid']))->setInc('money',$relist['price']);
			}else{
				$re = 0;
				$ure =0;
			}
		}elseif($st ==2){
			if($relist['status'] == 1){
				$re = M('recharge')->where(array('id'=>$id))->save(array('status'=>2));
				$ure = 1;
			}else{
				$re = 0;
				$ure =0;
			}
			
			
		}elseif($st ==3){
			if($relist['status'] == 3){
				$re = M('recharge')->where(array('id'=>$id))->delete();
				$ure = 1;
			}else{
				$re = 0;
				$ure =0;
			}
		}
		
		if($re && $ure){
			$this->success('操作成功');
		}else{
			$this->error('操作失败');
		}
		
		
	}
	
	//充值处理
	public function save_czset(){
		if($_GET){
			$data['cz_yh'] = trim(I('get.cz_yh'));
			$data['cz_xm'] = trim(I('get.cz_xm'));
			$data['cz_kh'] = trim(I('get.cz_kh'));
			$re = M('system')->where(array('id'=>1))->save($data);
			
			if($re){
				$this->success('修改成功');exit;
			}else{
				
				$this->error('修改失败');exit;
			}
		}
		
	}
	
	
	//提现列表
	public function withdraw(){
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['account'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uid'] = $account;
			 }
		 }else{
			 $map = '';
		 }
		
		
		
		$userobj = M('withdraw');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,50);
		
		 if($coinpx){
			 if($coinpx == 1){
				  $list = $userobj->where ( $map )->order ( 'price desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }else{
				 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }
		 }else{
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
	}
	
	
	//提现处理
	public function wiedit(){
		$id = trim(I('get.id'));
		$st = trim(I('get.st'));
		$relist  = M('withdraw')->where(array('id'=>$id))->find();
	
		if($st ==1){
			$re = M('withdraw')->where(array('id'=>$id))->save(array('status'=>3));
			
			
		}elseif($st ==2){
			$re = M('withdraw')->where(array('id'=>$id))->save(array('status'=>2));
			
		}elseif($st ==3){
			$re = M('withdraw')->where(array('id'=>$id))->save(array('status'=>3));
	
		}
		
		if($re){
			$this->success('操作成功');
		}else{
			$this->error('操作失败');
		}
		
		
	}
	
	
	//提现列表
	public function ewm(){
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['uaccount'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uid'] = $account;
			 }
		 }else{
			 $map = '';
		 }
		
		
		
		$userobj = M('ewm');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,50);
		
		 if($coinpx){
			 if($coinpx == 1){
				  $list = $userobj->where ( $map )->order ( 'ewm_price desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }else{
				 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }
		 }else{
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
	}
	
	
	
	//二维码详情
	public function ewminfo(){		
		$id= trim(I('get.id'));
		$ewminfo = M('ewm')->where(array('id'=>$id))->find();
		$this->assign('info',$ewminfo);
		$this->display();
	}
	
	//删除二维码
	public function delewm(){
		$id= trim(I('get.id'));
		$re = M('ewm')->where(array('id'=>$id))->delete();
		if($re){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
		
	}
	
	
	//银行卡列表
	public function bankcard(){
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['name'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uid'] = $account;
			 }
		 }else{
			 $map = '';
		 }
		
		
		
		$userobj = M('bankcard');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,50);
		
		 if($coinpx){
			 if($coinpx == 1){
				  $list = $userobj->where ( $map )->order ( 'addtime desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }else{
				 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
			 }
		 }else{
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
	}
	
	
	
	
	
	
	//冻结会员
	public function set_status(){
		if($_GET){
			$userid = trim(I('get.userid'));
			$st = trim(I('get.st'));
			$list = M('user')->where(array('userid'=>$userid))->find();
			if(empty($list)){
				$this->error('该会员不存在');
			}
			if($st == 1){
				$re = M('user')->where(array('userid'=>$userid))->save(array('status'=>0));
				if($re){
					$this->error('该会员已被冻结');
				}else{
					$this->error('网络错误！');
				}
				
			}elseif($st == 2){
				$re = M('user')->where(array('userid'=>$userid))->save(array('status'=>1));
				if($re){
					$this->error('该会员已被解冻');
				}else{
					$this->error('网络错误！');
				}
				
			}else{
				$this->error('网络错误！');
			}
			
			
			
			
		}else{
			$this->error('网络错误！');
		}
		
		
	}
    /**
     * 编辑用户
     * 
     */
    public function edit(){
		$userid = trim(I('get.userid'));
		$ulist = M('user')->where(array('userid'=>$userid))->find();
	
		if($_POST){
			
			$data['username'] = trim(I('post.username'));
			$data['mobile'] = trim(I('post.mobile'));
			$data['truename'] = trim(I('post.truename'));
			$data['wx_no'] = trim(I('post.wx_no'));
			$data['alipay'] = trim(I('post.alipay'));
			$data['nsc_money'] = trim(I('post.nsc_money'));
			$data['eth_money'] = trim(I('post.eth_money'));
			$data['eos_money'] = trim(I('post.eos_money'));
			$data['btc_money'] = trim(I('post.btc_money'));
			$data['money'] = trim(I('post.money'));
			$data['smoney'] = trim(I('post.smoney'));
			$data['qd_status'] = trim(I('post.qd_status'));
			//$data['cpriceproportion'] = trim(I('post.cpriceproportion'));
			$login_pwd = trim(I('post.login_pwd'));
            $data['truename'] = trim(I('post.truename'));
            $data['real'] = trim(I('post.real'));
			
			if($login_pwd != ''){
				$data['login_pwd'] = pwd_md5($login_pwd,$ulist['login_salt']);
			}
			
			$safety_pwd = trim(I('post.safety_pwd'));
			
			if($safety_pwd != ''){
				//$data['safety_pwd'] = pwd_md5($safety_pwd,$ulist['safety_salt']);
			}
			
			$re = M('user')->where(array('userid'=>$userid))->save($data);
			if($re){
				
				$this->success('资料修改成功');
			}else{
				$this->error('资料修改失败');
				
			}
			
			
			
		}else{
			
			$this->assign('info',$ulist);
			$this->display();
		}
		
    }
	
	
	public function uteam(){
		$uid = trim(I('get.userid'));
		$userobj = M('user');
		
		$count =$userobj->where(array('superioruid'=>$uid))->count();
		$p = $this->getpage($count,15);
		
		$list = $userobj->where (array('superioruid'=>$uid))->order( 'userid desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		
		
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	//$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
		
		$zcount =M('regpath')->where(array('uid'=>$uid,'lown'=>1))->count();
		$this->assign ( 'zcount', $zcount ); 
		
		
		$tcount =M('regpath')->where(array('uid'=>$uid))->count();
		$this->assign ( 'tcount', $tcount+1 ); 
		
		
		
		
		
		
		
		$Model = new \Think\Model();
		
		
		
		$meallm = $Model->query("SELECT SUM(pricermb) allmoney FROM `__PREFIX__userrob` WHERE status=3 and uid='".$uid."' ");
		$meallm = $meallm[0]['allmoney']?: 0;
		
		$toallm = $Model->query("SELECT SUM(pricermb) allmoney FROM `__PREFIX__userrob` WHERE status=3 and uid in ( SELECT uidsubordinate FROM `__PREFIX__regpath` WHERE uid='".$uid."' ) ");
		$toallm = $toallm[0]['allmoney']?: 0;
		
		$tallm = $meallm + $toallm;
		
		
		$jtimev = strtotime(date("Y-m-d 00:00:00",time()));
		
		$meallmj = $Model->query("SELECT SUM(pricermb) allmoney FROM `__PREFIX__userrob` WHERE addtime>'".$jtimev."' and status=3 and uid='".$uid."' ");
		$meallmj = $meallmj[0]['allmoney']?: 0;
		
		$toallmj = $Model->query("SELECT SUM(pricermb) allmoney FROM `__PREFIX__userrob` WHERE addtime>'".$jtimev."' and status=3 and uid in ( SELECT uidsubordinate FROM `__PREFIX__regpath` WHERE uid='".$uid."' ) ");
		$toallmj = $toallmj[0]['allmoney']?: 0;
		
		$tallmj = $meallmj + $toallmj;
		
		
		$this->assign ( 'meallm', $meallm ); 
		$this->assign ( 'meallmj', $meallmj ); 
		$this->assign ( 'tallm', $tallm ); 
		$this->assign ( 'tallmj', $tallmj ); 
		
		
		
		
		$this->display();
	}
	
	
	
	
	public function moneyts(){
		$userid = trim(I('get.userid'));
		$ulist = M('user')->where(array('userid'=>$userid))->find();
	
		if($_POST){
			
			$type = trim(I('post.typev'));
			$moneyt = trim(I('post.moneyt'));
			
			if($type!=1 && $type!=2){
				$this->error('参数有误');
			}
			
			
			if(!is_numeric($moneyt) || $moneyt<=0){
				$this->error('金额有误');
			}
			
			
			if($type==1){
				if($moneyt<=$ulist['money']){
					$data = array();
					$data['money'] = $ulist['money']-$moneyt;
					$data['smoney'] = $ulist['smoney']+$moneyt;
					$re = M('user')->where(array('userid'=>$userid))->save($data);
					if($re){
						
						$this->success('锁定金额成功');
					}else{
						$this->error('锁定金额失败');
					}
				}else{
					$this->error('金额不足');
				}
			}
			
			if($type==2){
				if($moneyt<=$ulist['smoney']){
					$data = array();
					$data['smoney'] = $ulist['smoney']-$moneyt;
					$data['money'] = $ulist['money']+$moneyt;
					$re = M('user')->where(array('userid'=>$userid))->save($data);
					if($re){
						$this->success('解锁金额成功');
					}else{
						$this->error('解锁金额失败');
					}
				}else{
					$this->error('锁定金额不足');
				}
			}
			$this->error('参数有误');
		}else{
			
			$this->assign('info',$ulist);
			$this->display();
		}
		
    }
    public function adminrecharge(){
        $userid = trim(I('get.userid'));
        $ulist = M('user')->where(array('userid'=>$userid))->find();
        if($_POST){
            $type = trim(I('post.typev'));
            $moneyt = trim(I('post.moneyt'));
            if($type!=1 && $type!=2){
                $this->error('参数有误');
            }
            if(!is_numeric($moneyt) || $moneyt<=0){
                $this->error('充币数量有误');
            }
            $map = [
                'uid'       =>  $ulist['userid'],
                'account'   =>  $ulist['account'],
                'name'      =>  $ulist['username'],
                'price'     =>  $moneyt,
                'addtime'   =>  time(),
                'status'    =>  3,
                'marker'    =>  '',
            ];
            if($type == 1){
                $map['way'] = 4;
            }else if($type == 2){
                $map['way'] = 5;
            }
            $res = M('recharge')->data($map)->add();
            $ure = M('user')->where(array('userid'=>$ulist['userid']))->setInc('money', $moneyt);
            if ($res && $ure){
                $this->success('充值成功');
            }else{
                $this->error('充值失败');
            }
        }else{
            $this->assign('info',$ulist);
            $this->display();
        }
    }
	
	
	
	
	
	
	
	
	
	
    /**
     * 编辑用户
     * 
     */
    public function del(){
		exit;
		$userid = trim(I('get.userid'));
		M('user')->where(array('userid'=>$userid))->delete();
		$this->success('会员删除成功');
    }
	
	
	//限制出售币和提币
	public function restrict(){
		$userid = trim(I('get.userid'));
		$ulist = M('user')->where(array('userid'=>$userid))->find();
		if($_POST){
			
			$sell_status = trim(I('post.sell_status'));
			
			$tx_status = trim(I('post.tx_status'));
			
			$zz_status = trim(I('post.zz_status'));
			
			if($ulist['sell_status'] == 1){
				
				if($sell_status != ''){
					$data['sell_status'] = 0;
				}
				
			}else{
				
				if($sell_status != ''){
					
					$data['sell_status'] = 1;
					
				}
				
			}
			
			if($ulist['tx_status'] == 1){
				
				if($tx_status != ''){
					$data['tx_status'] = 0;
				}
			}else{
				
				if($tx_status != ''){
					$data['tx_status'] = 1;
				}
			}
			
			if($ulist['zz_status'] == 1){
				
				if($zz_status != ''){
					$data['zz_status'] = 0;
				}
			}else{
				
				if($zz_status != ''){
					$data['zz_status'] = 1;
				}
			}
			
			$re = M('user')->where(array('userid'=>$userid))->save($data);
			
			if($re){
				
				$this->success('修改成功');
				
			}else{
				$this->error('修改失败');
			}
			
			
		}else{
			
			$this->assign('info',$ulist);
			$this->display();
		}
	}
	
	
    /**
     * 设置一条或者多条数据的状态
     * 
     */
    public function setStatus($model = CONTROLLER_NAME){
  
    }
 /**
     * 设置会员隐蔽的状态
     * 
     */
    public function setStatus1($model = CONTROLLER_NAME)
    {
        $id =(int)I('request.id');    
        $userid =(int)I('request.userid');    
        
         $user_object = D('User');    
        $result=D('User')->where(array('userid'=>$userid))->setField('yinbi',$id);
        if ($result) {
                    $this->success('更新成功', U('index'));
         }else {
                    $this->error('更新失败', $user_object->getError());
                }
    }
	
	
	
    //用户登录
    public function userlogin(){
        $userid=I('userid',0,'intval');
        $user=D('Home/User');
        $info=$user->find($userid);
        if(empty($info)){
            return false;
        }
        $login_id=$user->auto_login($info);
        if($login_id){
            session('in_time',time());
            session('login_from_admin','admin',10800);
            $this->redirect('Home/Index/index');
        }
    }
}
