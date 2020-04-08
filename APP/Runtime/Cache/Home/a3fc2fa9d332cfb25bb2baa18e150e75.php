<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
  
      <link href="/Public/home/wap/css/mui.min.css" rel="stylesheet"/>

	<style>
		.body{
			line-height: px;
		}
		.mui-table-view-cell:after{
			left: 0px;
			background-color:#292828;
		}
		.mui-table-view:before{
			background-color:#292828;
		}
		.mui-table-view:after{
			background-color:#292828;
		}
		.header{
			background:#1f253d;
			top:0;
			box-shadow:0 0px 0px #ccc;
			-webkit-box-shadow:0 0px 0px #ccc;
		}
		.h1{
			font-family:'微软雅黑';
			color:#000;
		}
		.img{
			position:absolute;
			width:90%;
			margin-top:8%;
			left:5%;
			border-radius:15px;
			top:3%;
			font-weight: bold;
		}
		.span{
			position:absolute;
			z-index:999;
			color:#000;
			font-family:'微软雅黑';
			font-size:0.9em;
			top:80px;
			left:10%;
			font-weight: bold;
		}
		.span1{
			position:absolute;
			z-index:999;
			color:#000;
			font-family:'微软雅黑';
			font-size:1.5em;
			top:120px;
			left:10%;
		}
		.button{
			line-height:1.5em;
			left:30px;
			font-size:0.9em;
			width:35%;
			font-family:'微软雅黑';
			border-radius:30px;
			border:0px solid;
			background: #26C4FD;
			top:15px;
			position:absolute;
			padding: 10px 0;
		}
		.button1{
			line-height:1.5em;
			right:30px;
			font-size:0.9em; 
			width:35%;
			font-family:'微软雅黑';
			border-radius:30px;
			border:0px solid;
			background: #26C4FD;
			top:9px;
			position:absolute;
			padding: 10px 0;
		}
		.ul1{
			background:#fff;
			line-height:3.5em;
			/*border-radius:10px;*/
			box-shadow:2px 0px 0 0px #ccc;
			margin: 10px 0;
		}
		.imgg{
			position:absolute;
			width:40px;
			margin-left:10px;
			margin-top:10px;
		}
		.p3{
			margin-left:18%;
			font-family:'微软雅黑';
			color:#000;
		}
		.p4{
			position:absolute;
			margin-left:50%;
			top: 11px;
			font-family:'微软雅黑';
			font-size:1em;
			color:#000;
		}
		.header{
			background: #fff;
		}
		a{
			color: #000;
		}
		.divc {
			background: #fff;
			height: 60px;
			width: 100%;
			margin-top: 10px;
			left: 0;
			border-radius: 0;
			box-shadow: 1px 0px 0 0px #ccc;
		}
		.mui-table-view-cell:after{
			background-color: #c8c7cc;
			margin: 0 40px;
		}
		.mui-table-view:before{
			background-color: unset;
		}
		.mui-table-view:after{
			background-color: unset;
		}
	</style>
</head>
<body style="background:#f8f8f8;">
	<header class="mui-bar mui-bar-nav header">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="/User/index"></a>
			<h1 class="mui-title h1">我的钱包</h1>
	</header>
			<div style="background: #fff;height: 110px;margin-top: 55px;">
				<span class="span">资产余额</span>
				<span class="span1"><?php echo ($info["money"]); ?> USDT</span>
			</div>
			<div class="mui-card-content divc">
			<a href="<?php echo U('Recharge/erc20cz');?>">
			<div class="mui-button-row">
				<button type="button" class="mui-btn mui-btn-danger button">充币</button>
			</div>
			</a>
			<a href="<?php echo U('Withdraw/tixian');?>">
			<div class="mui-button-row">
				<button type="button" class="mui-btn mui-btn-danger button1">提币</button>
			</div>
			</a>
			</div>
		<ul class="mui-table-view ul1">
				<!--
				<li class="mui-table-view-cell mui-media  mui-collapse mui-collapse-content">
					<img src="../Public/home/wap/images/jiangli.png" class="imgg" />
					<p class="p3">团队收益</p>
					<p class="p4"><?php if($sum_jj>0){echo $sum_jj;}else{echo '0.00';}?></p>
				</li>
				-->
				<!--
				<li class="mui-table-view-cell mui-media  mui-collapse mui-collapse-content">
					<img src="../Public/home/wap/images/yongjin.png" class="imgg" />
					<p class="p3">佣金费率</p>
					<p class="p4">
						<?php echo ($clist['qd_wxyj']+1) .','.($clist['qd_zfbyj']+1).','.($clist['qd_bkyj']+1);?>
					</p>
				</li>
				-->
				<li class="mui-table-view-cell mui-collapse-content">
					<img src="../Public/home/wap/images/shou.png" class="imgg" style="width: 45px; margin-left: 7px; bottom: 20px;"/>
					<p class="p3">已卖出资产</p>
					<p class="p4"><?php if($sum_ysk>0){echo $sum_ysk;}else{echo '0.00';}?></p>
				</li>
				<!--
				<li class="mui-table-view-cell mui-collapse-content">
					<img src="../Public/home/wap/images/dai.png" class="imgg"/>
					<p class="p3">待收款金额</p>
					<p class="p4"><?php if($sum_dsk>0){echo $sum_dsk;}else{echo '0.00';}?></p>
				</li>
				-->
			</ul>
</body>
</html>