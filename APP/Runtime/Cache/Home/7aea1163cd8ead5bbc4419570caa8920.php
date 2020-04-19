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
			left:0;
			background-color: #c8c7cc;
			margin: 0 10px;
		}
		.mui-table-view:before{
			background-color: unset;
		}
		.mui-table-view:after{
			background-color: unset;
		}
		.mui-input-group:before{
			height:0px
		}
		.mui-input-group:after{
			height: 0px;
		}
		.header{
			background:#fff;
			top:0;
			box-shadow:0 0px 0px #ccc;
			-webkit-box-shadow:0 0px 0px #ccc;
		}
		.czjilu{
			font-family:'微软雅黑';
			color: #000;
		}
		.ul{
			background:#fff;
			/*border-radius:10px;*/
			box-shadow:2px 0 0 0 #ccc;
			margin: 50px 0 0 0;
		}
		.zfbcz{
			color:#000;
			font-family:'微软雅黑';
		}
		.money{
			margin-left:5px;
			font-size:1em;
			color:#2AC845;
		}
		.time{
			color:#000;
			padding:0 6px 6px 6px;
			position: absolute;
			right: 10px;
		}
		.state{
			color:#000;
			padding:2px 0 0 0;
			position: absolute;
			left: 45%;
		}
		a{
			color: #000;
		}
		.mui-table-view-cell{
			padding: 11px 10px;
			font-size: 14px;
		}
		.mui-bar-tab .mui-tab-item .mui-icon~.mui-tab-label {
		    font-size: 0.9rem;
		}
	</style>
</head>
<body style="background:#f8f8f8;">
	<a href="<?php echo U('Index/myshop');?>">
		<header class="mui-bar mui-bar-nav header">
			<div style="width:80%;float:left;"><h1 class="mui-title czjilu"><?php echo ($user["shop_name"]); echo ($user["shop_mobile"]); ?>营收统计</h1></div>
		</header>
	</a>
	<ul class="mui-table-view ul">
		<?php if(empty($lists)): ?><li class="mui-table-view-cell" style="text-align: center;"><span style="color:#000;font-size:14px;">您暂时没有收单记录</span></li>
		<?php else: ?>
		<?php if(is_array($lists)): foreach($lists as $key=>$info): ?><li class="mui-table-view-cell">
				<span class="zfbcz">收入</span>
				<span class="state" style="color: #00b431;font-size: 15px;">+<?=$info['money']?></span>
				<span class="time"><?=date("Y-m-d H:i",$info['time'])?></span>
			 </li><?php endforeach; endif; endif; ?>
	</ul>
		<nav class="mui-bar mui-bar-tab" style="background:#fff;">
			<a class="mui-tab-item" href="<?php echo U('Index/index');?>">
				<span class="mui-icon mui-icon-email"></span>
				<span class="mui-tab-label">首页</span>
			</a>
			<a class="mui-tab-item mui-active" href="<?php echo U('Index/running');?>">
				<span class="mui-icon mui-icon-email"></span>
				<span class="mui-tab-label">收单</span>
			</a>
			<a class="mui-tab-item" href="<?php echo U('User/index');?>">
				<span class="mui-icon mui-icon-contact"></span>
				<span class="mui-tab-label">我的</span>
			</a>
		</nav>
</body>
<script type="text/javascript" src="/Public/home/common/js/jquery-1.9.1.min.js" ></script>
<script type="text/javascript" src="/Public/home/common/layer/layer.js" ></script>
</html>