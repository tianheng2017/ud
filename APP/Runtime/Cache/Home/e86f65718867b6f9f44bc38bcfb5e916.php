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
			background:#fff;
			top:0;
			box-shadow:0 0px 0px #ccc;
			-webkit-box-shadow:0 0px 0px #ccc;
		}
		.h1{
			font-family:'微软雅黑';
			color:#000;
		}
		.ul{
			background:#fff;
			line-height:2em;
			/*border-radius:10px;*/
			box-shadow:2px 0 0 0 #ccc;
			margin: 50px 0 0 0;
		}
		a{
			color: #000;
		}
		.p{
			margin-left:5%;
			font-family:'微软雅黑';
			color:#000;
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
			height: 50px;
			line-height: 50px;
			width: 100%;
			margin-top: 10px;
			left: 0;
			padding-left:15px;
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
		.p {
			margin-left: 0;
		}
	</style>
</head>
<body style="background:#f8f8f8;">
	<header class="mui-bar mui-bar-nav header">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="javascript:history.go(-1)"></a>
			<h1 class="mui-title h1">我的团队</h1>
	</header>
		
		<div style="background: #fff;height: 110px;margin-top: 55px;">
			<span class="span">直推 / 人</span>
			<span class="span1"><?php echo ($zcount); ?></span>
			<span class="span" style="right: 10%;left: auto;">团队 / 人</span>
			<span class="span1" style="right: 10%;left: auto;"><?php echo ($tcount); ?></span>
		</div>
		
		
		
		
		<ul class="mui-table-view ul1">
			<li class="mui-table-view-cell mui-media  mui-collapse mui-collapse-content">
				<img src="../Public/home/wap/images/dai.png" class="imgg" />
				<p class="p3">今日我的业绩</p>
				<p class="p4"><?php echo ($meallmj); ?> RMB</p>
			</li>
			
			<li class="mui-table-view-cell mui-media  mui-collapse mui-collapse-content">
				<img src="../Public/home/wap/images/shou.png" class="imgg" />
				<p class="p3">今日团队业绩</p>
				<p class="p4"><?php echo ($tallmj); ?> RMB</p>

			</li>
			
			<li class="mui-table-view-cell mui-collapse-content">
				<img src="../Public/home/wap/images/yongjin.png" class="imgg" style="width: 45px; margin-left: 7px; bottom: 20px;"/>
				<p class="p3">我的业绩</p>
				<p class="p4"><?php echo ($meallm); ?> RMB</p>
			</li>
			
			<li class="mui-table-view-cell mui-collapse-content">
				<img src="../Public/home/wap/images/jiangli.png" class="imgg"/>
				<p class="p3">团队业绩</p>
				<p class="p4"><?php echo ($tallm); ?> RMB</p>
			</li>
			
		</ul>
		
		
		
		
		
		<div class="mui-card-content divc">
			会员信息(三代)
		</div>
		<ul class="mui-table-view ul" style="margin:0;">
			<?php if(is_array($list)): foreach($list as $key=>$info): ?><li class="mui-table-view-cell mui-collapse-content">
					<p class="p">
						<?php echo ($info["mobile"]); ?>
						<span style="float: right;margin-right: 25px;"><?php echo date('Y-m-d H:i',$info['reg_date']);?></span>
						<span style="float: right;margin-right: 25px;"><?php echo ($info["cpriceproportion"]); ?></span>
					</p>
				</li><?php endforeach; endif; ?>
		</ul>
			
</body>

</html>