<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0051)http://103.200.29.54/index.html#tabbar-with-contact -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
	<title></title>

	<link href="/Public/home/wap/css/mui.min.css" rel="stylesheet">
	<link href="/Public/home/wap/css/app.css" rel="stylesheet">
	<link href="/Public/home/wap/css/userindex.css" rel="stylesheet">
	<style>
		.header{
			background-color: #fff;
		}
		.h1{
			color: #000;
		}
		.acc{
			font-weight: bold;
			color: #fff;
			font-size: 16px;
			top:20px;
		}
		.my{
			width:100%;
			left: unset;
			border-radius: unset;
			background-color: #8665F4;
			height: 130px;
			box-shadow:2px 0px 0 0px #ccc;
			margin-top: 15px;
		}
		.jibie{
			background: #8665F4;
			margin-left: 70%;
			border: 1px solid #fff;
			padding: 10px 20px;
			border-radius: 30px;
			font-size: 16px;
			margin-top: 18px;
		}
		.ullist{
			background: #fff;
			color: #000;
			/*border-radius:10px;*/
			box-shadow:2px 0px 0 0px #ccc;
			/*margin: 10px 33px;*/
			top:10px;
		}
		.mui-table-view-cell:after{
			left: 0px;
			background-color: #c8c7cc;
			margin: 0 15px;
		}
		.mui-table-view:before{
			background-color:unset;
		}
		.mui-table-view:after{
			background-color:unset;
		}
		.mui-bar-tab .mui-tab-item{
			color: #444;
		}
		.mui-bar-tab .mui-tab-item .mui-icon{
			top:1px;
		}
		.mui-bar-tab .mui-tab-item .mui-icon~.mui-tab-label{
			font-size: 0.9rem;
		}
		.zhye{
			color: #000;
			font-weight: bold;
			font-size: 18px;
			width: 120px;
			text-align: center;
			margin-top: 35px;
			display: inline-block;
		}
		.txcz{
			display: inline-block;
			position: absolute;
			top: 27px;
			right: 30px;
		}
		.my-btn{
			border-radius: 15px;
			width: 70px;
		}
		.mui-card-my{
			height: 90px;
			border-radius: 15px;
			margin: -30px 18px 18px;
			box-shadow: unset;
		}
		.mui-card-my2{
			height: 130px;
			border-radius: 15px;
			box-shadow: unset;
			margin: 40px 18px 18px!important;
		}
		.img-my{
			width: 50px;
			height: 50px;
		}
		.mui-card-my2 a{
			width: 32%;
			display: inline-block;
			text-align: center;
			margin-top: 20px;
			color: #000;
		}
		.mui-card-my2 a span{
			font-size: 18px;
			display: block;
			text-align: center;
			margin-top: 5px;
		}
		.mui-card-my3{
			height: 280px;
			border-radius: 15px;
			box-shadow: unset;
			margin: 20px 18px 18px!important;
		}
		.mui-card-my3 a{
			width: 24%;
			display: inline-block;
			text-align: center;
			margin-top: 25px;
			color: #000;
		}
		.mui-card-my3 a span{
			font-size: 18px;
			display: block;
			text-align: center;
			margin-top: 5px;
		}
	</style>
</head>
<body style="background:#F8F8F8;" class="mui-ios mui-ios-11 mui-ios-11-0">

<!--我的-->
<div id="tabbar-with-contact" class="mui-control-content mui-active">
<!--	<header class="mui-bar mui-bar-nav header">-->
<!--		<h1 class="mui-title h1"></h1>-->
<!--	</header>-->
	<div class="mui-card-content my">
<!--		<img src="../Public/home/wap/images/logoer.png" class="myimg">-->
		<span class="acc" style="font-size: 20px;"><?php echo ($list["username"]); ?></span>
		<span class="acc" style="top: 60px; margin-left: 5%;">邀请码</span>
		<span class="acc" style="top: 60px; margin-left: 20%;"><?php echo ($list["u_yqm"]); ?></span>
		<div type="button" class="jibie">金沙会员</div>
	</div>
	<div class="mui-card mui-card-my">
		<div class="zhye">资产余额</div>
		<div class="txcz">
			<a href="<?php echo U('Recharge/erc20cz');?>" style="margin-right: 5px;">
				<button type="button" class="mui-btn mui-btn-royal my-btn">提币</button>
			</a>
			<a href="<?php echo U('Withdraw/tixian');?>">
				<button type="button" class="mui-btn mui-btn-royal my-btn">充币</button>
			</a>
		</div>
	</div>
	<div class="mui-card mui-card-my2">
		<a href="<?php echo U('User/zichan');?>">
			<img src="../Public/home/wap/img/1.png" class="img-my">
			<span>我的钱包</span>
		</a>
		<a href="<?php echo U('User/bill');?>">
			<img src="../Public/home/wap/img/2.png" class="img-my">
			<span>资产明细</span>
		</a>
		<a href="<?php echo U('User/myteam');?>">
			<img src="../Public/home/wap/img/3.png" class="img-my">
			<span>我的团队</span>
		</a>
	</div>
	<div class="mui-card mui-card-my3">
		<div class="mui-card-header" style="font-weight: bold;font-size: 19px;">服务中心</div>
		<a href="<?php echo U('User/ziliao');?>">
			<img src="../Public/home/wap/img/5.png" class="img-my">
			<span>个人资料</span>
		</a>
		<a href="<?php echo U('User/Sharecode');?>">
			<img src="../Public/home/wap/img/4.png" class="img-my">
			<span>邀请好友</span>
		</a>
		<a href="<?php echo U('User/erweima');?>">
			<img src="../Public/home/wap/img/10.png" class="img-my">
			<span>收款码</span>
		</a>
		<a href="<?php echo U('Recharge/chongzhijilu');?>">
			<img src="../Public/home/wap/img/7.png" class="img-my">
			<span>充币记录</span>
		</a>
		<a href="<?php echo U('Withdraw/index');?>">
			<img src="../Public/home/wap/img/7.png" class="img-my">
			<span>提币记录</span>
		</a>
		<a href="javascript:;">
			<img src="../Public/home/wap/img/8.png" class="img-my">
			<span>在线客服</span>
		</a>
		<a href="<?php echo U('User/shezhi');?>">
			<img src="../Public/home/wap/img/9.png" class="img-my">
			<span>设置</span>
		</a>
	</div>
	<!-- <ul class="mui-table-view ullist"> -->
<!-- 		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/zichan.png" class="imglist">
			<a href="<?php echo U('User/zichan');?>" class="mui-navigate-right" style=" margin-left: 10%;font-size: 0.9em; bottom: 4px; ">
				我的钱包
			</a>
		</li> -->
<!-- 		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/ziliao.png" class="imglist">
			<a href="<?php echo U('User/ziliao');?>" class="mui-navigate-right" style=" margin-left: 10%;font-size: 0.9em; bottom: 4px; ">
				个人资料
			</a>
		</li> -->
<!-- 		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/chongzhi.png" class="imglist">
			<a href="<?php echo U('Recharge/chongzhijilu');?>" class="mui-navigate-right" style=" margin-left: 10%;font-size: 0.9em; bottom: 4px; ">
				充币记录
			</a>
		</li>
		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/tixian.png" class="imglist">
			<a href="<?php echo U('Withdraw/index');?>" class="mui-navigate-right" style=" margin-left: 10%; font-size: 0.9em;bottom: 4px; ">
				提币记录
			</a>
		</li> -->
<!-- 		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/tixian.png" class="imglist">
			<a href="<?php echo U('User/bill');?>" class="mui-navigate-right" style=" margin-left: 10%; font-size: 0.9em;bottom: 4px; ">
				资产明细
			</a>
		</li> -->
<!-- 		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/erweima.png" class="imglist">
			<a href="<?php echo U('User/erweima');?>" class="mui-navigate-right" style=" margin-left: 10%; font-size: 0.9em;bottom: 4px; ">
				收款码管理
			</a>
		</li> -->

<!-- 		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/fenxiang.png" class="imglist">
			<a href="<?php echo U('User/Sharecode');?>" class="mui-navigate-right" style=" margin-left: 10%; font-size: 0.9em;bottom: 4px; ">
				邀请好友
			</a>
		</li> -->
		
<!-- 		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/tixian.png" class="imglist">
			<a href="<?php echo U('User/myteam');?>" class="mui-navigate-right" style=" margin-left: 10%; font-size: 0.9em;bottom: 4px; ">
				我的团队
			</a>
		</li> -->
		
<!-- 		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/guanyu.png" class="imglist">
			<style>
				#ib_iconDiv{display:none}
			</style>
			<div style="display:none">
				<script type="text/javascript" src="http://c.ibangkf.com/i/c-kakapaofen.js"></script>
			</div>
			<a href="javascript:;" class="mui-navigate-right" style=" margin-left: 10%;font-size: 0.9em; bottom: 4px; " onClick="ib_wopen();">
				在线客服
			</a>
		</li> -->
<!-- 		<li class="mui-table-view-cell mui-collapse-content">
			<img src="../Public/home/wap/images/shezhi.png" class="imglist">
			<a href="<?php echo U('User/shezhi');?>" class="mui-navigate-right" style=" margin-left: 10%;font-size: 0.9em; bottom: 4px; ">
				设置
			</a>
		</li> -->

	<!-- </ul> -->

</div>


<nav class="mui-bar mui-bar-tab" style="background:#fff;">
<!--	<a class="mui-tab-item" href="<?php echo U('Index/qdgame');?>">-->
<!--		<span class="mui-icon mui-icon-email"></span>-->
<!--		<span class="mui-tab-label">抢单</span>-->
<!--	</a>-->
	<a class="mui-tab-item" href="<?php echo U('Index/running');?>">
		<span class="mui-icon mui-icon-email"></span>
		<span class="mui-tab-label">收单</span>
	</a>
<!--	<a class="mui-tab-item" href="<?php echo U('Index/shoudan');?>">-->
<!--		<span class="mui-icon mui-icon-gear"></span>-->
<!--		<span class="mui-tab-label">收单</span>-->
<!--	</a>-->
	<a class="mui-tab-item mui-active" href="<?php echo U('User/index');?>">
		<span class="mui-icon mui-icon-contact"></span>
		<span class="mui-tab-label">我的</span>
	</a>
</nav>
</body>
<script type="text/javascript" src="/Public/home/common/js/jquery-1.9.1.min.js" ></script>
<script type="text/javascript" src="/Public/home/common/layer/layer.js" ></script>
<script type="text/javascript">
	function loginout(){
		window.location.href="<?php echo U('User/Loginout');?>";
	}
</script>
</html>