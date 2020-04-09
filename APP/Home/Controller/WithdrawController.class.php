<?php
namespace Home\ Controller;
use Think\Controller;
class WithdrawController extends CommonController {

	//提现记录管理
    public function index(){
		$uid = session('userid');
		$welist = M('withdraw')->where(array('uid'=>$uid))->order('id desc')->select();
		$this->assign('welist',$welist);
        $this->display();
    }
	
	//提现页面
	public function tixian(){
        $uid = session('userid');
        $user = M('user')->where(array('userid'=>$uid))->find();
        $this->assign('user', $user);
		$this->display();
	}

    public function tixian2(){
        $uid = session('userid');
        $user = M('user')->where(array('userid'=>$uid))->find();
        $this->assign('user', $user);
        $this->display();
    }
	
	//提现处理
	public function drawup(){
		if($_POST){
			$uid = session('userid');
			$arr = [
			    1 => 'ERC20',
                2 => 'OMINI'
            ];
			$ulist = M('user')->where(array('userid'=>$uid))->find();
			$save['uid'] = $uid;
			$save['name'] = $ulist['truename'];
			$save['way'] = intval(trim(I('post.way')));
			$save['price'] = floatval(trim(I('post.price')));
			$save['addtime'] = time();
			$save['status'] = 1;
            if (!in_array($save['way'], [1,2])){
				$data['code'] = 0;
				$data['msg'] = '没有此提币类型';
				$this->ajaxReturn($data);exit;
			}
            if (($save['way'] == 1 && empty($ulist['usdt_erc20'])) || ($save['way'] == 2 && empty($ulist['usdt_omini']))){
                $data['code'] = 0;
                $data['msg'] = '尚未设置'.$arr[$save['way']].'地址, 请前往"个人信息"设置';
                $this->ajaxReturn($data);exit;
            }
            $save['account'] = ($save['way'] == 1) ? $ulist['usdt_erc20'] : $ulist['usdt_omini'];
            $save['way'] = $arr[$save['way']];
            $last = M('userrob')->where(array('uid'=>$uid))->order('id desc')->find();
			if (time()-$last['finishtime'] < 60*60*4){
                $data['code'] = 0;
                $data['msg'] = '需要抢单完成4小时后才能提币!';
                $this->ajaxReturn($data);exit;
            }
			$clist = M('system')->where(array('id'=>1))->find();
			if($save['price'] < $clist['mix_withdraw']){
				$data['code'] = 0;
				$data['msg'] = '最小提币额度 '.$clist['mix_withdraw'].' USDT';
				$this->ajaxReturn($data);exit;
			}
			
			if($save['price'] > $clist['max_withdraw']){
				$data['code'] = 0;
				$data['msg'] = '最大提币额度 '.$clist['max_withdraw'].' USDT';
				$this->ajaxReturn($data);exit;
			}
			$pipei_sum_price = M('userrob')->where(array('uid'=>$uid,'status'=>3))->sum('price');
			$rech_sum_price = M('recharge')->where(array('uid'=>$uid,'status'=>3))->sum('price');
			$blz = $pipei_sum_price / $rech_sum_price;
			$cblz = $clist['tx_yeb'] / 100;
			if($blz < $cblz){
				$data['code'] = 0;
				$data['msg'] = '您的匹配收款额度不足';
				$this->ajaxReturn($data);exit;
			}
			if($save['price'] > $ulist['money']){
				$data['code'] = 0;
				$data['msg'] = '账户余额不足';
				$this->ajaxReturn($data);exit;
			}
			$re = M('withdraw')->add($save);
			$ure =  M('user')->where(array('userid'=>$uid))->setDec('money',$save['price']);
			if($re && $ure){
				$data['code'] = 1;
				$data['msg'] = '提币申请已提交';
				$this->ajaxReturn($data);exit;
			}else{
				$data['code'] = 0;
				$data['msg'] = '非法操作';
				$this->ajaxReturn($data);exit;
			}
		}else{
			$data['code'] = 0;
			$data['msg'] = '非法操作';
			ajaxReturn($data);exit;
		}
	}
}