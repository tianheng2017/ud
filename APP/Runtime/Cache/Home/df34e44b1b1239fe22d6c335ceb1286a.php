<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0038)http://103.200.29.54/index.html#tabbar -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title></title>
    <link href="/Public/home/wap/css/mui.min.css" rel="stylesheet">
	<link href="/Public/home/wap/css/app.css" rel="stylesheet">
	<link href="/Public/home/wap/css/indexindex.css" rel="stylesheet">
	<style>
		.bgcolor10{background: #8A6DE9;}
		.bgcolor9{background:grey;}
		.bgcolor8{background: darkslateblue;}
		.bgcolor7{background: darkgray;}
		.bgcolor6{background: #EC971F;}
		.bgcolor5{background: #007aff;}
		.bgcolor4{background: orange;}
		.bgcolor3{background: burlywood;}
		.bgcolor2{background:  blue;}
		.bgcolor1{background: red;}
		.mui-bar-tab .mui-tab-item{
			color: #444;
		}
		.ul{
			background: #fff;
			color: #000;
		}
		.phbaac{
			color: #000;
		}
		.header{
			background: #fff;
		}
		.h1{
			color: #000;
		}
		.mui-bar-tab .mui-tab-item .mui-icon{
			top:1px;
		}
		.mui-bar-tab .mui-tab-item .mui-icon~.mui-tab-label{
			font-size: 0.9rem;
		}
		.img-my{
			width: 50px;
			height: 50px;
		}
		.mui-card-my2{
			height: 130px;
			border-radius: 15px;
			box-shadow: unset;
			margin: 0 18px 0!important;
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
			margin: 0 18px 18px!important;
			text-align: center;
		}
		.mui-table-view-cell:after{
			background-color: unset;
		}
	</style>
</head>
<body style="background:#fff;" class="mui-ios mui-ios-11 mui-ios-11-0">
	<div id="tabbar" class="mui-control-content mui-active">
		<header class="mui-bar mui-bar-nav header">
			<h1 class="mui-title h1">首页</h1>
		</header>
		<img src="../Public/home/wap/images/phbbg.png" class="img">
		<div class="mui-card mui-card-my2">
			<a href="<?php echo U('Index/ewm');?>/type/1">
				<img src="../Public/home/wap/img/11.png" class="img-my">
				<span>充值管理</span>
			</a>
			<a href="<?php echo U('Index/ewm');?>/type/2">
				<img src="../Public/home/wap/img/12.png" class="img-my">
				<span>提现管理</span>
			</a>
			<a href="<?php echo U('User/Sharecode');?>">
				<img src="../Public/home/wap/img/13.png" class="img-my">
				<span>邀请好友</span>
			</a>
		</div>
		<div class="mui-card mui-card-my3">
			<div class="mui-card-header" style="font-weight: bold;font-size: 19px;">会员动态</div>
			<div class="mui-scroll-wrapper">
				<div class="mui-scroll">
					<marquee style="margin-left: 30px;" behavior="scroll" direction="up" height="190px" width="100%" hspace="100" vspace="45" loop="-1" scrollamount="5" scrolldelay="0" onMouseOut="this.start()" onMouseOver="this.stop()">
						<ul class="mui-table-view">
							<?php if(is_array($running)): foreach($running as $key=>$v): ?><li class="mui-table-view-cell mui-collapse-content">
							    	<div style="width: 32%;display: inline-block;"><?php echo ($v['mobile']); ?></div>
							    	<div style="width: 32%;display: inline-block;color: #8069F7;">获得返佣<?php echo ($v['money']); ?>元</div>
							    	<div style="width: 32%;display: inline-block;"><?php echo ($v['time']); ?></div>
							    </li><?php endforeach; endif; ?>
						</ul>
					</marquee>
				</div>
			</div>
		</div>
	</div>
	<nav class="mui-bar mui-bar-tab" style="background:#fff;">
		<a class="mui-tab-item mui-active" href="<?php echo U('Index/index');?>">
			<span class="mui-icon mui-icon-email"></span>
			<span class="mui-tab-label">首页</span>
		</a>
		<a class="mui-tab-item" href="<?php echo U('Index/running');?>">
			<span class="mui-icon mui-icon-email"></span>
			<span class="mui-tab-label">收单</span>
		</a>
		<a class="mui-tab-item" href="<?php echo U('User/index');?>">
			<span class="mui-icon mui-icon-contact"></span>
			<span class="mui-tab-label">我的</span>
		</a>
	</nav>
	<script type="text/javascript" src="/Public/home/common/js/jquery-1.9.1.min.js" ></script>
	<script type="text/javascript" src="/Public/home/common/layer/layer.js" ></script>
</body>
</html>