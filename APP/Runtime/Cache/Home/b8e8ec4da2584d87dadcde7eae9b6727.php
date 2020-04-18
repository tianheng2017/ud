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
	</style>
</head>
<body style="background:#f8f8f8;">
	<header class="mui-bar mui-bar-nav header">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="javascript:history.go(-1)"></a>
			<h1 class="mui-title h1">资产明细</h1>
	</header>	
		<ul class="mui-table-view ul">
			<?php if(is_array($list)): foreach($list as $key=>$info): ?><li class="mui-table-view-cell mui-collapse-content">
					<p class="p" style="font-size: 13px;"><?php echo ($info["info"]); ?> <?php echo ($info["num"]); ?> <span style="float: right;margin-right: 25px;font-size: 11px;color: #bababa;"><?php echo date('Y-m-d H:i',$info['addtime']);?></span></p>
				</li><?php endforeach; endif; ?>
		</ul>
			
</body>

</html>