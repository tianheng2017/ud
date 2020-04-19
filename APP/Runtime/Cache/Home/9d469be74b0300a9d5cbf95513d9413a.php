<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title><?php echo ($title); ?></title>
<link href="/Public/home/wap/css/mui.min.css" rel="stylesheet">
<link rel="stylesheet" href="/Public/home/wap/css/style.css">
<link rel="stylesheet" href="/Public/home/wap/css/meCen.css">
<script src="/Public/home/wap/js/jquery1.11.1.min.js"></script>
<script type="text/javascript" src="/Public/home/common/layer/layer.js"></script>
<script type="text/javascript" src="/Public/home/common/js/index.js" ></script>
<style>
	.qrCodeGro{
		width:100%;
	}
	.header{
		background: #fff;
	}
	.h1{
		color: #000;
	}
	.mui-bar-nav{
		box-shadow: unset;
	}
	a{
		color:#000;
	}
	.pipei{
		background: #00CFD6;
	}
	.mui-btn-danger, .mui-btn-negative, .mui-btn-red{
		border: unset;
	}
	.mt40 {
		margin-top: 30px;
	}
</style>
<body class="bg96 bg_blue"  style="background:#f8f8f8;">
	<div class="header" style="background:#fff;">
		<header class="mui-bar mui-bar-nav header">
			<div style="width:10%;float:left;">
				<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="javascript:history.go(-1)"></a>
			</div>
			<h1 class="mui-title h1"><?php echo ($title); ?></h1>
		</header>
	    <div class="header_c" style="width:33.3%;"><h2  style="font-size:14px;color:#000;"><?php echo ($title); ?></h2></div>
	</div>
     <div class="big_width80">
	     <div class="qrCodeGro qrCodeGroa" style="margin-top: 60px;">
	     	<img src="<?php echo ($urel); ?>">
	     	<p class="mt40" style="font-size:16px;color:#000;">扫描二维码加微信客服</p>
	     </div>
	</div>
</body>
</html>