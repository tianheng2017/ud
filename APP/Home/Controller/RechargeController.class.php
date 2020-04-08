<?php
namespace Home\ Controller;
use Think\Controller;
class RechargeController extends CommonController {

	//充值记录管理
    public function chongzhijilu(){
		$uid = session('userid');
		$relist = M('recharge')->where(array('uid'=>$uid))->order('id desc')->select();
	    $this->assign('relist',$relist);
        $this->display();
    }
	
	//充值方式
	public function chongzhi(){
		$this->display();
	}
	
	//充值方式
	public function yhkcz(){
		
		$conf = M('system')->where(array('id'=>1))->find();
		$this->assign('conf',$conf);
		$this->display();
	}
	
	//支付宝充值页面
	public function zfbcz(){
		$this->display();
	}

	private function getqrcode($filename, $text){
        $qrcode = file_get_contents('http://qr.topscan.com/api.php?text='.$text);
        file_put_contents('qrcode/'.$filename, $qrcode);
        return true;
    }

    public function erc20cz(){
        if($_POST) {
            $type = intval(I('post.type'));
            $this->cz1($type);
        }else{
            $setting = M('system')->where(array('id'=>1))->find();
            $erc20_filename = 'erc20.png';
            $this->getqrcode($erc20_filename, $setting['erc20_address']);
            $this->assign('erc20_img', '/qrcode/'.$erc20_filename);
            $this->assign('erc20_address', $setting['erc20_address']);
            $this->display();
        }
    }

    public function ominicz(){
        if($_POST) {
            $type = intval(I('post.type'));
            $this->cz1($type);
        }else {
            $setting = M('system')->where(array('id'=>1))->find();
            $omini_filename = 'omini.png';
            $this->getqrcode($omini_filename, $setting['omini_address']);
            $this->assign('omini_img', '/qrcode/' . $omini_filename);
            $this->assign('omini_address', $setting['omini_address']);
            $this->display();
        }
    }

    private function cz1($type){
        $userid = session('userid');
        $rlist = M('user')->where(array('userid'=>$userid))->find();
        if(empty($rlist)){
            $data['code'] = 0;
            $data['msg'] = '该会员不存在';
            $this->ajaxReturn($data);exit;
        }
        $st = $this->rc_up($type,$userid,['account'=>$rlist['account'],'name'=>$rlist['truename']]);
        if($st){
            $data['code'] = 1;
            $data['id'] = $st;
            $this->ajaxReturn($data);exit;
        }else{
            $data['code'] = 0;
            $data['msg'] = '充值提交失败';
            $this->ajaxReturn($data);exit;
        }
    }

    public function addusdtpz(){
        if($_POST) {
            $id = intval(I('post.rid'));
            $data['img'] = I('post.icon');
            $data['price'] = floatval(I('post.price'));
            $res = M('recharge')->where(array('id'=>$id))->find();
            if ($res['status'] <> 4){
                $data['code'] = 0;
                $data['msg'] = '对不起,当前订单状态：'.getst($res['status']);
                $this->ajaxReturn($data);exit;
            }
            if (!$data['img']){
                $data['code'] = 0;
                $data['msg'] = '请上传充值凭证';
                $this->ajaxReturn($data);exit;
            }
            if (!$data['price']){
                $data['code'] = 0;
                $data['msg'] = '请填写充币数量';
                $this->ajaxReturn($data);exit;
            }
            $data['status'] = 1;
            $result = M('recharge')->where(array('id'=>$id))->save($data);
            if ($result === false){
                $data['code'] = 0;
                $data['msg'] = '数据出错';
                $this->ajaxReturn($data);exit;
            }else{
                $data['code'] = 1;
                $data['msg'] = '提交成功,等待审核';
                $this->ajaxReturn($data);exit;
            }
        }else{
            $id = intval(I('get.id'));
            $data = M('recharge')->where(array('id' => $id))->find();
            if (!$data){
                $data['code'] = 0;
                $data['msg'] = '充币记录不存在';
                $this->ajaxReturn($data);exit;
            }
            $this->assign('id',$id);
            $this->display();
        }
    }
	
	//从支付宝充值提交
	public function alipay_rc(){
		if($_POST){
			$uid = session('userid');
			$account = trim(I('post.account'));
			$rlist = M('user')->where(array('account'=>$account))->find();
			if(empty($rlist)){
				$data['status'] = 0;
				$data['msg'] = '该会员不存在';
				$this->ajaxReturn($data);exit;
			}
			$type = 1;
			$arr = I('post.');
			$st = $this->rc_up($type,$uid,$arr);
			if($st ==1){
				$data['status'] = 1;
				$data['msg'] = '充值提交成功';
				$this->ajaxReturn($data);exit;
			}else{
				$data['status'] = 0;
				$data['msg'] = '充值提交失败';
				$this->ajaxReturn($data);exit;
			}
		}else{
			$data['status'] = 0;
			$data['msg'] = '非法操作';
			$this->ajaxReturn($data);exit;
		}
	}

	//充值处理私有方法
	private function rc_up($type,$uid,$arr=''){
			$sava['account'] = trim($arr['account']);
			$sava['name'] = trim($arr['name']);
			if($type ==4){
				$sava['way'] = 4;
			}elseif($type ==5){
				$sava['way'] = 5;
			}
			$sava['addtime'] = time();
			$sava['status'] = 4;
			$sava['uid'] = $uid;
			$re = M('recharge')->add($sava);
			if($re){
				return $re;
			}else{
				return 0;
			}
	}
	
	//微信充值页面
	public function recharge_wx(){
		
		$this->display();
	}
	
	
	//从微信充值提交
	public function wx_rc(){
		if($_POST){
			$uid = session('userid');
			$account = trim(I('post.account'));
			$rlist = M('user')->where(array('account'=>$account))->find();
			if(empty($rlist)){
				$data['status'] = 0;
				$data['msg'] = '该会员不存在';
				$this->ajaxReturn($data);exit;
			}
			$type = 2;
			$arr = I('post.');
			$st = $this->rc_up($type,$uid,$arr);
			if($st ==1){
				$data['status'] = 1;
				$data['msg'] = '充值提交成功';
				$this->ajaxReturn($data);exit;
			}else{
				$data['status'] = 0;
				$data['msg'] = '充值提交失败';
				$this->ajaxReturn($data);exit;
			}
			
			
		}else{
			$data['status'] = 0;
			$data['msg'] = '非法操作';
			$this->ajaxReturn($data);exit;
		}
	}
	
	
	
	
	//银行卡充值页面
	public function recharge_bank(){
		
		$this->display();
	}
	
	//从银行卡充值提交
	public function bank_rc(){
		if($_POST){
			$uid = session('userid');
			$account = trim(I('post.account'));
			$rlist = M('user')->where(array('account'=>$account))->find();
			if(empty($rlist)){
				$data['status'] = 0;
				$data['msg'] = '该会员不存在';
				$this->ajaxReturn($data);exit;
			}
			$type = 3;
			$arr = I('post.');
			$st = $this->rc_up($type,$uid,$arr);
			if($st ==1){
				$data['status'] = 1;
				$data['msg'] = '充值提交成功';
				$this->ajaxReturn($data);exit;
			}else{
				$data['status'] = 0;
				$data['msg'] = '充值提交失败';
				$this->ajaxReturn($data);exit;
			}
			
			
		}else{
			$data['status'] = 0;
			$data['msg'] = '非法操作';
			$this->ajaxReturn($data);exit;
		}
	}
	

}