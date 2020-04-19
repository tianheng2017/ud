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
			color: #000;
		}
		.button{
			position:absolute;
			color:aquamarine;
			font-family:'微软雅黑';
			width:80%;
			line-height:2em;
			border-radius:20px;
			background:linear-gradient(45deg,BLUE,purple);
			border:0px solid;
			top:25%;
			left: 10%;
		}
		.ul{
			background:#fff;
			line-height:2em;
			margin: 55px 0 0 0;
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
		.li{
			margin-left:10%;
			font-family:'微软雅黑';
			color:#000;
		}
		.right{
			position:absolute;
			right:35px;
			bottom:12px;
			font-family:'微软雅黑';
			color:#000;
		}
		a,a:active{
			color:#000;
		}
	</style>
</head>
<body style="background:#f8f8f8;">
	<header class="mui-bar mui-bar-nav header">
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="javascript:history.go(-1)"></a>
			<h1 class="mui-title h1">店铺信息</h1>
	</header>
	<div style="margin-top:44px;">
		<form class="mui-input-group" id="form">
		    <div class="mui-input-row">
		        <label>店铺名称</label>
				<input type="text" id="shop_name" name="shop_name" autocomplete="off" value="<?php echo ($user['shop_name']); ?>" readonly="">
		    </div>
		    <div class="mui-input-row">
		        <label>店铺地址</label>
		        <input type="text" id="shop_address" name="shop_address" autocomplete="off" value="<?php echo ($user['shop_address']); ?>" readonly="">
		    </div>
			<div class="mui-input-row">
			    <label>店铺手机号</label>
			    <input type="text" id="shop_mobile" name="shop_mobile" autocomplete="off" value="<?php echo ($user['shop_mobile']); ?>" readonly="">
			</div>
			<div class="mui-input-row">
			    <label>支付宝支付</label>
			    <input type="text" id="shop_mobile" name="shop_mobile" autocomplete="off" value="<?php echo ($zfb); ?>单(占比<?php echo round($zfb/$all,2)*100;?>%)" readonly="">
			</div>
			<div class="mui-input-row">
			    <label>微信支付</label>
			    <input type="text" id="shop_mobile" name="shop_mobile" autocomplete="off" value="<?php echo ($wx); ?>单(占比<?php echo round($wx/$all,2)*100;?>%)" readonly="">
			</div>
			<div class="mui-input-row">
			    <label>云闪付</label>
			    <input type="text" id="shop_mobile" name="shop_mobile" autocomplete="off" value="<?php echo ($ysf); ?>单(占比<?php echo round($ysf/$all,2)*100;?>%)" readonly="">
			</div>
		</form>
	</div>
</body>
 <script type="text/javascript" src="/Public/home/common/js/jquery-1.9.1.min.js" ></script>
 <script type="text/javascript" src="/Public/home/common/layer/layer.js" ></script>
 <script type="text/javascript" src="/Public/home/common/js/mui.min.js" ></script>
 <script type="text/javascript">
	$('#submit').on('click',function(){
		var check = true;
		mui("#form input").each(function() {
			if(!this.value || this.value.trim() == "") {
				var label = this.previousElementSibling;
				mui.alert(label.innerText + "不允许为空");
				check = false;
				return false;
			}
		});
		if(check){
			mui.post("<?php echo U('User/shezhi');?>", {
				shop_name: $('#shop_name').val(),
				shop_address: $('#shop_address').val(),
				shop_mobile: $('#shop_mobile').val(),
			},function(res){
				mui.alert(res.message);
			},'json');
		}
	});
 </script>
</html>