<?php
namespace Admin\Controller;

use Think\Page;


class RoborderController extends AdminController{

/**
 *  全部订单列表
 */
 
   public function index(){
	   
	   
		$account = trim(I('get.keyword'));
		if($account!=''){
			if($account==-1){
				$map['class'] = 1;
			}elseif($account==-2){
				$map['class'] = 2;	
			}elseif($account==-3) {
                $map['class'] = 3;
            }elseif($account==-6){
                $map['class'] = 6;
            }else{
				$map['price'] = $account;
			}
			
		}else{
			 $map = '';
		}
		
		$userobj = M('roborder');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,10);
		
		/*
		 if($account<=3){
			$list = $userobj->where ( $map )->order ( 'price desc' )->limit ( $p->firstRow, $p->listRows )->select ();

		 }elseif($account>3){
			$list = $userobj->where ( $map )->order ( 'class desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }elseif($account==''){
			$list = $userobj->where ( $map )->order ( 'status desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	*/
		
		$list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		
		$this->assign('count',$count);
    	$this->assign ( 'info', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
    }
 
 
 //抢单分配列表
public function userrob(){
	
	 exit("禁用");
	 
		
		
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['ordernum'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uaccount'] = $account;
			 }
			  $map['status'] =1;
		 }else{
			 $map['status'] =1;
		 }
		
		$userobj =M('userrob');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,10);
		
		 if($coinpx == 1){
			$list = $userobj->where ( $map )->order ( 'umoney desc' )->limit ( $p->firstRow, $p->listRows )->select ();

		 }else{
			 
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();

}

//匹配成功支付中
public function robsucc(){
			
		
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['ordernum'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uaccount'] = $account;
			 }
			  $map['status'] =2;
		 }else{
			 $map['status'] =2;
		 }
		
		$userobj =M('userrob');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,10);
		
		 if($coinpx == 1){
			$list = $userobj->where ( $map )->order ( 'umoney desc' )->limit ( $p->firstRow, $p->listRows )->select ();

		 }else{
			 
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();

}


//支付成功订单
public function ordersucc(){
	
	
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['ordernum'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uaccount'] = $account;
			 }
			  $map['status'] =3;
		 }else{
			 $map['status'] =3;
		 }
		
		$userobj =M('userrob');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,10);
		
		 if($coinpx == 1){
			$list = $userobj->where ( $map )->order ( 'umoney desc' )->limit ( $p->firstRow, $p->listRows )->select ();

		 }else{
			 
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
	
}






public function orderhasfali(){
	
	
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['ordernum'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uaccount'] = $account;
			 }
			  $map['status'] =4;
		 }else{
			 $map['status'] =4;
		 }
		
		$map['hasfalistate'] =-1;
		
		$userobj =M('userrob');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,10);
		
		 if($coinpx == 1){
			$list = $userobj->where ( $map )->order ( 'umoney desc' )->limit ( $p->firstRow, $p->listRows )->select ();

		 }else{
			 
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
	
}





public function nofhmed(){
	 
	 if($_GET){
		 $id = trim(I('get.id'));
		 $olist = M('userrob')->where(array('id'=>$id))->find();
		 if(empty($olist)){
			 $this->error('该订单不存在');
		 }

		 $re = M('userrob')->where(array('id'=>$id,'status'=>4,'hasfalistate'=>-1))->save(array('hasfalistate'=>1,'hasfailres'=>-1));
		 if($re){
			 $this->success('操作成功'); 
		 }else{
			 $this->error('操作失败'); 
		 }

	 }else{
		$this->error('未知错误'); 
	 }
 }



public function fhmed(){
	 if($_GET){
		 $id = trim(I('get.id'));
		 $olist = M('userrob')->where(array('id'=>$id))->find();
		 if(empty($olist)){
			 $this->error('该订单不存在');
		 }

		 $re = M('userrob')->where(array('id'=>$id,'status'=>4,'hasfalistate'=>-1))->save(array('hasfalistate'=>1,'hasfailres'=>1));
		 if($re){
			 
			 $udec_re = M('user')->where(array('userid'=>$olist['uid']))->setInc('money',$olist['price']);
			 
			 $this->success('操作成功'); 
		 }else{
			 $this->error('操作失败'); 
		 }

	 }else{
		$this->error('未知错误'); 
	 }
 }














public function orderfali(){
	
	
		 $querytype = trim(I('get.querytype'));
		 $account = trim(I('get.keyword'));
		 $coinpx = trim(I('get.coinpx'));
		 if($querytype != ''){
			 if($querytype=='mobile'){
				 $map['ordernum'] = $account;
			 }elseif($querytype=='userid'){
				  $map['uaccount'] = $account;
			 }
			  $map['status'] =4;
		 }else{
			 $map['status'] =4;
		 }
		
		$userobj =M('userrob');
		$count =$userobj->where($map)->count();
		$p = getpagee($count,10);
		
		 if($coinpx == 1){
			$list = $userobj->where ( $map )->order ( 'umoney desc' )->limit ( $p->firstRow, $p->listRows )->select ();

		 }else{
			 
			 $list = $userobj->where ( $map )->order ( 'id desc' )->limit ( $p->firstRow, $p->listRows )->select ();
		 }
    	
		
		$this->assign('count',$count);
    	$this->assign ( 'list', $list ); // 賦值數據集
		$this->assign('count',$count);
    	$this->assign ( 'page', $p->show() ); // 賦值分頁輸出
        $this->display();
	
}
































//取消匹配
public function delnullorder(){
	 exit("禁用");
	 
	$id = trim(I('get.id'));
	$re = M('userrob')->where(array('id'=>$id))->delete();
	if($re){
		$this->success('操作成功');exit;
	}else{
		$this->success('操作失败');exit;
	}
}
 
 
 

 
 
 
 
 
 
 //添加订单
 public function add(){
	 exit("禁用");
	 
	 if($_POST){
		 
		 $date['class'] = trim(I('post.class'));
		 $date['price'] = trim(I('post.price'));
		 $num = trim(I('post.num'));
		 $date['addtime'] = time();
		 $date['status'] = 1;
		 $date['ordernum'] = getordernum();
		 if($num == ''){
			 $num = 1;
		 }
		 
		 if($date['price'] == ''){
			 
			  $this->error('金额不能为空');
		 }

		 
		 for($i = 1; $i <= $num; $i++){
			 $re = M('roborder')->add($date);
		 }
		 
		 if($re){
			 $this->success('添加成功', U('index')); 
		 }else{
			 $this->error('添加失败');
		 }
		 
		 
	 }else{
		 
		 
		 
		 
		 $this->display(); 
	 }
	
 }
 
 //编辑待匹配订单
 public function edit(){
	 exit("禁用");
	 
	 if($_GET){
		 $id = trim(I('get.id'));
		 $olist = M('roborder')->where(array('id'=>$id))->find();
		 if(empty($olist)){
			 $this->error('该订单不存在');
		 }
		 if($olist['status'] != 1){
			 $this->error('该订单已被匹配');
		 }
		 $this->assign('olist',$olist);
		 $this->display();
		 
	 }else{
		$this->error('未知错误'); 
	 }
 }
 
 
 
 
 
 
 
 
 
 
 
 
  //删除订单
 public function delorder(){
	 exit("禁用");
	 
	 if($_GET){
		 $id = trim(I('get.id'));
		 $olist = M('roborder')->where(array('id'=>$id))->find();
		 if(empty($olist)){
			 $this->error('该订单不存在');
		 }
		 if($olist['status'] != 1){
			 //$this->error('该订单已被匹配');
		 }
		 $re = M('roborder')->where(array('id'=>$id))->delete();
		 if($re){
			 $this->success('删除成功'); 
		 }else{
			 $this->error('删除失败'); 
		 }

	 }else{
		$this->error('未知错误'); 
	 }
 }
  //取消订单
 public function cancel(){
	 exit("禁用");
	 
	 if($_GET){
		 $id = trim(I('get.id'));
		 $olist = M('userrob')->where(array('id'=>$id))->find();
		 if(empty($olist)){
			 $this->error('该订单不存在');
		 }

		 $re = M('userrob')->where(array('id'=>$id))->save(array('status'=>4));
		 if($re){
			 $this->success('取消成功'); 
		 }else{
			 $this->error('取消失败'); 
		 }

	 }else{
		$this->error('未知错误'); 
	 }
 }
  //删除订单
 public function delsuccess(){
	 exit("禁用");
	 
	 if($_GET){
		 $id = trim(I('get.id'));
		 $olist = M('userrob')->where(array('id'=>$id))->find();
		 if(empty($olist)){
			 $this->error('该订单不存在');
		 }
		 if($olist['status'] != 1){
			 //$this->error('该订单已被匹配');
		 }
		 $re = M('userrob')->where(array('id'=>$id))->delete();
		 if($re){
			 $this->success('删除成功'); 
		 }else{
			 $this->error('删除失败'); 
		 }

	 }else{
		$this->error('未知错误'); 
	 }
 }
 
 public function editup(){
	 exit("禁用");
	 
	 
	 if($_POST){
		 
		 $id = trim(I('post.id'));
		 $date['class'] = trim(I('post.class'));
		 $date['price'] = trim(I('post.price'));

		
		 
		 if($date['price'] == ''){
			 
			  $this->error('金额不能为空');
		 }


			 $re = M('roborder')->where(array('id'=>$id))->save($date);

		 if($re){
			 $this->success('修改成功', U('index')); 
		 }else{
			 $this->error('修改失败');
		 }
		 
		 
	 }else{
		 
		 
		$this->error('未知错误'); 
	 }
 }
 
 


//匹配会员发布的空匹配订单
public function putorder(){
	 exit("禁用");
	 
	if($_GET){
		$id = trim(I('get.id'));
		$olist = M('userrob')->where(array('id'=>$id))->find();
		$ulist = M('user')->where(array('userid'=>$olist['uid']))->find();
		$clist = M('system')->where(array('id'=>1))->find();
		/********匹配的金额是该会员上传的对应的最小收款金额***********/
		if($ulist['money'] > 0){
			$max_pipeinone = $ulist['money'] * ($clist['qd_cf']  / 100);
		}else{
			$max_pipeinone = 0;
		}
			
		
		$uewm = M('ewm')->where(array('uid'=>$olist['uid'],'ewm_class'=>$olist['class'],'ewm_price'=>array('elt',$max_pipeinone)))->order('ewm_price asc')->select();		
		if(!$uewm){
			$this->error('匹配订单生成成功');exit;
		}
		
		
		$price = $uewm[array_rand($uewm)]['ewm_price'];

		
		$data['class'] = $olist['class'];
		$data['price'] = $price;
		$data['addtime'] = time();
		$data['status'] = 2;
		$data['uid'] = $olist['uid'];
		$data['uname'] = $olist['uname'];
		$data['umoney'] = $olist['umoney'];
		$data['pipeitime'] = time();
		$data['ordernum'] = $olist['ordernum'];
		
		$reid = M('roborder')->add($data);
		if($reid){
			
			$save['price'] = $price;
			$save['ppid'] = $reid;
			$save['status'] = 2;
			$save['price'] = $price;
			$save['pipeitime'] = time();
			$save['yjjc'] = $clist['yjjc'];
			$re = M('userrob')->where(array('id'=>$id))->save($save);
			
			if($re){
				
				$this->success('匹配订单生成成功');exit;
				
			}else{
				$this->error('匹配订单生成失败');exit;
			}
		}else{
			$this->error('匹配订单生成失败');exit;
		}

	}else{
		$this->error('非法操作');exit;
	}
}


//游戏参数设置页面
public function asystem(){
	if($_POST){
		
		
		$data['qd_cf'] = trim(I('post.qd_cf'));
		$data['qd_nd'] = trim(I('post.qd_nd'));
		$data['qd_wxyj'] = trim(I('post.qd_wxyj'));
		$data['qd_zfbyj'] = trim(I('post.qd_zfbyj'));
		$data['qd_bkyj'] = trim(I('post.qd_bkyj'));
		$data['qd_ndtime'] = trim(I('post.qd_ndtime'));
		$data['qd_yjjc'] = trim(I('post.qd_yjjc'));
		$data['qd_minmoney'] = trim(I('post.qd_minmoney'));
		$data['min_recharge'] = trim(I('post.min_recharge'));
		$data['mix_withdraw'] = trim(I('post.mix_withdraw'));
		$data['max_withdraw'] = trim(I('post.max_withdraw'));
		$data['tx_yeb'] = trim(I('post.tx_yeb'));
		$data['team_oneyj'] = trim(I('post.team_oneyj'));
		$data['team_twoyj'] = trim(I('post.team_twoyj'));
		$data['team_threeyj'] = trim(I('post.team_threeyj'));
		$data['erc20_address'] = trim(I('post.erc20_address'));
		$data['omini_address'] = trim(I('post.omini_address'));
		$data['handcoinprice'] = trim(I('post.handcoinprice'));
		
		if(is_numeric($data['handcoinprice']) && $data['handcoinprice']>0){
			$data2 = array();
			$data2['price'] = $data['handcoinprice'];
			M('coinprice')->where(array('id'=>1))->save($data2);
		}
		
		
		$re = M('system')->where(array('id'=>1))->save($data);
		
		if($re){
			$this->success('修改成功');exit;
		}else{
			
			$this->error('修改失败');exit;
		}
		
		
	}else{
		$list = M('system')->where(array('id'=>1))->find();
		$this->assign('info',$list);
		$this->display();
	}
	
}



//支付金额页面
public function paypage(){
	 exit("禁用");
	 
	$id = trim(I('get.id'));
	$list = M('userrob')->where(array('id'=>$id))->find();
	$this->assign('info',$list);
	$this->display();
}

//支付成功处理
/********业务分析************/
/*
*产生佣金，上三代分享佣金
*扣除会员账户额度
*更改定单状态（两张表）
*生成资金日志
*/
public function payup(){
	 exit("禁用");
	 
	
	if($_POST){
		
		$id = trim(I('post.id'));
		$list = M('userrob')->where(array('id'=>$id))->find();//操作的订单
		$pipeilist = M('roborder')->where(array('id'=>$list['ppid']))->find();//被 匹配的订单
		$ulist =  M('user')->where(array('userid'=>$list['uid']))->find();
		$clist = M('system')->where(array('id'=>1))->find();

		$yjbl = 0; //支付类型佣金比例 
		$yjjc = $list['yjjc']; //当前佣金加成
		if($list['class'] ==1){
			$yjbl = $clist['qd_wxyj'];
			$str = '微信抢单';
		}elseif($list['class'] ==2){
			$yjbl = $clist['qd_zfbyj'];
			$str = '支付宝抢单';
		}elseif($list['class'] ==3){
			$yjbl = $clist['qd_bkyj'];
			$str = '银行卡抢单';
		}elseif($list['class'] ==6){
            $yjbl = $clist['qd_bkyj'];
            $str = 'USDT抢单';
        }
		$yjbl = $yjbl + $yjjc;//实际佣金比例
	
		$dec_price = $list['price'] - $list['price'] * $yjbl; //实际需扣除会员的金额。
		
		$yj_money = $list['price'] * $yjbl; //实际的佣金金额
		
		$udec_re = M('user')->where(array('userid'=>$list['uid']))->setDec('money',$dec_price); //减去金额
		$zsy_re = M('user')->where(array('userid'=>$list['uid']))->setInc('zsy',($list['price']+$yj_money)); //记录匹配收款和佣金
		
		if($udec_re && $zsy_re){
			
			$mdst_re = M('userrob')->where(array('id'=>$id))->save(array('status'=>3,'finishtime'=>time())); //修改定单状态
			
			$rob_mdst = M('roborder')->where(array('id'=>$list['ppid']))->save(array('status'=>3,'finishtime'=>time())); //修改后台发布的订单状态
			
			if($mdst_re && $rob_mdst){
				
				$billdec['uid'] = $ulist['userid'];
				$billdec['jl_class'] = 5; //抢单
				$billdec['info'] = $str.'本金'; 
				$billdec['addtime'] = time(); 
				$billdec['jc_class'] = '-'; 
				$billdec['num'] = $list['price'];
				
				$billdec_re = M('somebill')->add($billdec);
				
				$billinc['uid'] = $ulist['userid'];
				$billinc['jl_class'] = 1; //佣金类型
				$billinc['info'] = $str.'佣金'; 
				$billinc['addtime'] = time(); 
				$billinc['jc_class'] = '+'; 
				$billinc['num'] = $yj_money;
				
				$billinc_re = M('somebill')->add($billinc);
				
				if($billdec_re && $billinc_re){
					
					$oneuser = M('user')->where(array('userid'=>$ulist['pid']))->find();//上一代
					
					//一代佣金奖励
					if(!empty($oneuser)){
						
						$oneyj_money = $yj_money * $clist['team_oneyj']; //上一代佣金
						
						$puser_inc_re = M('user')->where(array('userid'=>$ulist['pid']))->setInc('money',$oneyj_money);
						
						if($puser_inc_re){							
							$puser_bill['uid'] = $oneuser['userid'];
							$puser_bill['jl_class'] = 1; //佣金类型
							$puser_bill['info'] = '直推抢单成功佣金'; 
							$puser_bill['addtime'] = time(); 
							$puser_bill['jc_class'] = '+'; 
							$puser_bill['num'] = $oneyj_money;
							M('somebill')->add($puser_bill);
						}
						
						$twouser = M('user')->where(array('userid'=>$oneuser['pid']))->find();//上二代
						
						if(!empty($twouser)){
							
							$twoyj_money = $yj_money * $clist['team_twoyj']; //二代佣金
							$twouser_inc_re = M('user')->where(array('userid'=>$oneuser['pid']))->setInc('money',$twoyj_money);
							if($twouser_inc_re){
								$twouser_bill['uid'] = $twouser['userid'];
								$twouser_bill['jl_class'] = 1; //佣金类型
								$twouser_bill['info'] = '二代抢单成功佣金'; 
								$twouser_bill['addtime'] = time(); 
								$twouser_bill['jc_class'] = '+'; 
								$twouser_bill['num'] = $twoyj_money;
								M('somebill')->add($twouser_bill);
							}
							
							$threeuser = M('user')->where(array('userid'=>$twouser['pid']))->find();//上三代
							if(!empty($threeuser)){
								$threeyj_money = $yj_money * $clist['team_threeyj']; //三代佣金
								$threeuser_inc_re =  M('user')->where(array('userid'=>$twouser['pid']))->setInc('money',$threeyj_money);
								
								if($threeuser_inc_re){
									$threeuser_bill['uid'] = $threeuser['userid'];
									$threeuser_bill['jl_class'] = 1; //佣金类型
									$threeuser_bill['info'] = '三代抢单成功佣金'; 
									$threeuser_bill['addtime'] = time(); 
									$threeuser_bill['jc_class'] = '+'; 
									$threeuser_bill['num'] = $threeyj_money;
									M('somebill')->add($threeuser_bill);
								}
								
							}
							
							
						}

						
					}

					
					/*********************这里添加打款成功短信提示***********************/
					
					$this->success('支付成功',U('Roborder/robsucc'));exit;
					
				}else{
					$this->error('支付失败',U('Roborder/robsucc'));exit;
				}
				
				
			}
			
		}else{
			$this->error('支付失败',U('Roborder/robsucc'));exit;
		}

		
	}else{
		$this->error('支付失败',U('Roborder/robsucc'));exit;
	}
	
	
	
}

//收款二给码管理
public function skewm(){
	
	if($_FILES && $_POST){

			if(!empty($_FILES['wxewm']['name'])){
				$file = setUpload($_FILES['wxewm']);
				$data['wxewm'] = $file['savepath'].$file['savename'];
			}
			
			if(!empty($_FILES['zfbewm']['name'])){
				$file = setUpload($_FILES['zfbewm']);
				$data['zfbewm'] = $file['savepath'].$file['savename'];
			}
			if(!empty($_FILES['bankewm']['name'])){
				$file = setUpload($_FILES['bankewm']);
				$data['bankewm'] = $file['savepath'].$file['savename'];
			}
            if(!empty($_FILES['usdtewm']['name'])){
                $file = setUpload($_FILES['usdtewm']);
                $data['usdtewm'] = $file['savepath'].$file['savename'];
            }
			
			$re = M('skm')->where(array('id'=>1))->save($data);
			
			if($re){
				$this->success('修改成功');exit;
			}else{
				$this->error('修改失败');exit;
			}
			

	}else{
		
		$skmlist = M('skm')->where(array('id'=>1))->find();
		$this->assign('skmlist',$skmlist);
		$this->display();
	}
	
}

 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 

}
