<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0048)http://103.200.29.54/index.html#tabbar-with-chat -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title></title>

    <link href="/Public/home/wap/css/mui.min.css" rel="stylesheet">
	<link href="/Public/home/wap/css/app.css" rel="stylesheet">
	<link href="/Public/home/wap/css/qdgame.css" rel="stylesheet">
	<script type="text/javascript" src="/Public/home/common/js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="/Public/home/common/layer/layer.js"></script>
	<script type="text/javascript" src="/Public/home/common/js/index.js" ></script>
	
	<link rel="stylesheet" href="/Public/home/common/alert/css/alert.css">
	
	<script src='/Public/home/common/alert/js/alert.js'></script>

	<style>
	.alert-actionsheet .alert-btn-box {
		max-height: 200px;
		overflow: scroll;
	}
	
	
		.qd{
			background: #fff;
			box-shadow: 2px 0px 0 0px #ccc;
			width: 100%;
			left:0;
			top:0;
			border-radius: unset;
			height: 120px;
			margin-top: 55px;
		}
		.a,.b,.c,.d,.e,.f{
			color:#000;
		}
		.f{
			font-size: 1.2rem;
		}
		.but{
			background: #FF5F74;
			margin-left: 70%;
			padding: 10px;
			font-size: 0.85em;
		}
		.span{
			margin-top: 3%;
			color: #000;
		}
		.ullei{
			box-shadow: 2px 0 0 0px #ccc;
			background: #fff;
			color: #000;
			margin-top:10px;
			border-radius: unset;
			width: 100%;
			padding: 0 6px;
			left: 0;
		}
		.header{
			background: #fff;
		}
		.h1{
			color:#000;
		}
		.mui-table-view-cell:after{
			background-color: #c8c7cc;
			margin:0 10px;
		}
		.mui-table-view:before{
			background-color: unset;
		}
		.mui-table-view:after{
			background-color: unset;
		}
		.pipei{
			background: #00CFD6;
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
	</style>
</head>
<body style="background:#F8F8F8;" class="mui-ios mui-ios-11 mui-ios-11-0">

	<div id="tabbar-with-chat" class="mui-control-content mui-active">
		<header class="mui-bar mui-bar-nav header">
				<h1 class="mui-title h1">抢单</h1>
		</header>
		<div class="mui-card-content qd" style="display:none;">
			<span class="a">最大抢单金额 : </span>
			<span class="b"><?php echo ($max_pipeinone); ?></span>
			<span class="c">当前抢单难数 : </span>
			<span class="d"><?php echo ($qd_nd); ?></span>
			<span class="e">开启时段整差 : </span>
			<span class="f"><?php foreach($tarr as $v){echo $v;}?>时 </span>
			<button type="button" class="but">佣金加成<?php echo $qd_yjjc*10;?>%</button>
		</div>
		
		<div class="mui-card-content qd" style="font-size: 16px;">
			<span class="a">实时行情 : </span>
			<span class="b"><?php echo ($coinprice["price"]); ?></span>
			<span class="c">卖出价格 : </span>
			<span class="d"><?php echo $coinprice['price']*(1+$ulist['cpriceproportion']/100);?></span>
			
			<span class="e">可卖资产 : </span>
			<span class="f"><?php echo ($ulist["money"]); ?> USDT</span>
			
			<button type="button" class="but" style="right: 6px;position: absolute;">价格加成:<?php echo ($ulist["cpriceproportion"]); ?>%</button>
			
		</div>
		
		
		<!--<span class="span">【请选择收款类型】</span>-->
		<ul class="mui-table-view mui-table-view-radio ullei" style="margin-top: 50px;">
			<li class="mui-table-view-cell mui-selected "  id="checkedclass_wx">
				<a class="mui-navigate-right">
					微信
				</a>
			</li>
			<li class="mui-table-view-cell"  id="checkedclass_zfb">
				<a class="mui-navigate-right">
					支付宝
				</a>
			</li>
			<li class="mui-table-view-cell"  id="checkedclass_bank">
				<a class="mui-navigate-right">
					银行卡
				</a>
			</li>
			<li class="mui-table-view-cell"  id="checkedclass_usdt" style="display:none;">
				<a class="mui-navigate-right">
					USDT
				</a>
			</li>
		</ul>
		
		
		<ul class="mui-table-view" style="line-height:1.7em;">
			<li class="mui-table-view-cell mui-collapse-content selcitycbtn" id="selcitycbtn">
				<img src="../Public/home/wap/images/shezhi.png" class="imglist">
				<span class="mui-navigate-right" style=" margin-left: 10%;font-size: 0.9em; bottom: 4px; ">
					切换地区
				</span>
				<span class="selcityv" style="float:right;font-size: 0.9em;margin-right: 1.1em;">
					<?php echo ($selcityv); ?>
				</span>
			</li>

		</ul>
		
		
		
		
		<input type="hidden" name="qdclass" id="qdclass" value="1">
		<div class="mui-button-row">
			<button type="button" class="mui-btn mui-btn-danger pipei" id="pipeinnow" onclick="start_qd()">开始自动抢单</button>
		</div>
		<!--<div class="mui-button-row">
			<button type="button" class="mui-btn mui-btn-danger zidong" id="autopipei" onclick="start_auto()">开始自动抢单</button>
		</div>   -->
<!--		<div class="mui-button-row">-->
<!--		<marquee direction=up scrollamount="2" Behaviour="Scroll" style="height:150px; font-size:0.8em; margin-top:10px; margin-left:25%;color:#444">-->
<!--		当前可抢订单微信金额1000元<br><br>-->
<!--		当前可抢订单微信金额200元<br><br>-->
<!--		当前可抢订单支付宝金额500元<br><br>-->
<!--		当前可抢订单微信金额100元<br><br>-->
<!--		当前可抢订单支付宝金额1200元<br><br>-->
<!--		当前可抢订单微信金额800元<br><br>-->
<!--		当前可抢订单微信金额300元<br><br>-->
<!--		当前可抢订单支付宝金额1100元<br><br>-->
<!--		当前可抢订单微信金额1300元<br><br>-->
<!--		当前可抢订单支付宝金额400元<br><br>-->
<!--		当前可抢订单支付宝金额100元<br><br>-->
<!--		当前可抢订单微信金额100元<br><br>-->
<!--		当前可抢订单微信金额500元<br><br>-->
<!--		当前可抢订单支付宝金额300元<br><br>-->
<!--		当前可抢订单微信金额1500元<br><br>-->
<!--		当前可抢订单微信金额1800元<br><br>-->
<!--		当前可抢订单支付宝金额700元<br><br>-->
<!--		当前可抢订单微信金额3000元<br><br>-->
<!--		当前可抢订单支付宝金额5000元<br><br>-->
<!--		当前可抢订单微信金额200元<br><br>-->
<!--		当前可抢订单微信金额100元<br><br>-->
<!--		当前可抢订单支付宝金额900元<br><br>-->
<!--		当前可抢订单微信金额500元<br><br>-->
<!--		当前可抢订单微信金额200元<br><br>-->
<!--		</marquee>-->
<!--	</div>-->
	<!--收单列表-->
	<div id="tabbar-with-map" class="mui-control-content">
	</div>
			

<nav class="mui-bar mui-bar-tab" style="background:#fff;">
	<a class="mui-tab-item mui-active"  href="<?php echo U('Index/qdgame');?>">
		<span class="mui-icon mui-icon-email"></span>
		<span class="mui-tab-label">抢单</span>
	</a>
	
	<a class="mui-tab-item "  href="<?php echo U('Index/shoudan');?>">
		<span class="mui-icon mui-icon-gear"></span>
		<span class="mui-tab-label">收单</span>
	</a>
	<a class="mui-tab-item" href="<?php echo U('User/index');?>">
		<span class="mui-icon mui-icon-contact"></span>
		<span class="mui-tab-label">我的</span>
	</a>
</nav>


<style>


.loadingdivs{
	width: 70%;
    height: auto;
    margin-left: 15%;
	margin-top: 200px;
    border-radius: 10px;
    position: fixed;
    z-index: 9;
    background: rgb(255, 255, 255);
    top: 0;
	border: 1px solid #ccc;
	/*box-shadow: 2px 0 2px 0 #ccc;*/
	display:none;
}

.clobtn{
	width: 76%;
    color: #fff;
    border: 1px solid rgba(207, 207, 207, 0.3);
    background-color: rgba(164, 164, 164, 0.35);
    border-radius: 100px;
}
</style>



<div class="loadingdivs loadingdiv">
	
	<div style="width:100%;text-align:center;margin-top: 20px;">
		<img class="loagingimg" src="../Public/home/wap/images/loadingimg/loading<?php echo mt_rand(1,15); ?>.gif" style="width:50%;border-radius: 1000px;" />
	</div>
	<div style="width:100%;text-align:center;margin-top: 20px;font-size: 12px;">
		正在匹配交易，请耐心等待···
	</div>
	<div style="width:100%;text-align:center;margin: 30px 0 20px 0;">
		<button type="button" class="mui-btn mui-btn-danger clobtn" onclick="clo_qd()">取消抢单</button>
	</div>
</div>

<audio id="audio" preload="auto" hidden>
	<source src="http://oss.xmlianke.top/yes.mp3" type="audio/mpeg">
	<source src="http://oss.xmlianke.top/yes.ogg" type="audio/ogg">
</audio>

<script type="text/javascript">
    $('#checkedclass_wx').click(function(){
			$('#checkedclass_wx').addClass("mui-selected");
			$('#checkedclass_zfb').removeClass("mui-selected");
			$('#checkedclass_bank').removeClass("mui-selected");
			$('#checkedclass_usdt').removeClass("mui-selected");
			$('#qdclass').val(1);
		});
		$('#checkedclass_zfb').click(function(){
			$('#checkedclass_zfb').addClass("mui-selected");
			$('#checkedclass_wx').removeClass("mui-selected");
			$('#checkedclass_bank').removeClass("mui-selected");
			$('#checkedclass_usdt').removeClass("mui-selected");
			$('#qdclass').val(2);
		});
		$('#checkedclass_bank').click(function(){
			$('#checkedclass_bank').addClass("mui-selected");
			$('#checkedclass_zfb').removeClass("mui-selected");
			$('#checkedclass_wx').removeClass("mui-selected");
			$('#checkedclass_usdt').removeClass("mui-selected");
			$('#qdclass').val(3);
		});
	$('#checkedclass_usdt').click(function(){
		$('#checkedclass_usdt').addClass("mui-selected");
		$('#checkedclass_bank').removeClass("mui-selected");
		$('#checkedclass_zfb').removeClass("mui-selected");
		$('#checkedclass_wx').removeClass("mui-selected");
		$('#qdclass').val(6);
	});
	
</script>
<script type="text/javascript">
	
	//北京市，天津市，上海市，重庆市，河北省，山西省，辽宁省，吉林省，黑龙江省，江苏省，浙江省，安徽省，福建省，
	//江西省，山东省，河南省，湖北省，湖南省，广东省，海南省，四川省，贵州省，云南省，陕西省，甘肃省，青海省，台湾省，内蒙古自治区，广西壮族自治区，西藏自治区，宁夏回族自治区，新疆维吾尔自治区，香港特别行政区，澳门特别行政区
	
	$('.selcitycbtn').click(function () {
		var M = {};
		M.actionsheet = jqueryAlert({
			'style' : 'actionsheet',
			'title'   : '切换地区',
			"className"    : '', //添加类名
			'modal'   : true,
			'actionsheetCloseText' : '取消',
			'buttons' :{
				'北京市' : function(){ selcitycm('北京市');M.actionsheet.close(); },'天津市' : function(){ selcitycm('天津市');M.actionsheet.close(); },
				'上海市' : function(){ selcitycm('上海市');M.actionsheet.close(); },'重庆市' : function(){ selcitycm('重庆市');M.actionsheet.close(); },
				'河北省' : function(){ selcitycm('河北省');M.actionsheet.close(); },'山西省' : function(){ selcitycm('山西省');M.actionsheet.close(); },
				'辽宁省' : function(){ selcitycm('辽宁省');M.actionsheet.close(); },'吉林省' : function(){ selcitycm('吉林省');M.actionsheet.close(); },
				'黑龙江省' : function(){ selcitycm('黑龙江省');M.actionsheet.close(); },'江苏省' : function(){ selcitycm('江苏省');M.actionsheet.close(); },
				'浙江省' : function(){ selcitycm('浙江省');M.actionsheet.close(); },'安徽省' : function(){ selcitycm('安徽省');M.actionsheet.close(); },
				'福建省' : function(){ selcitycm('福建省');M.actionsheet.close(); },'江西省' : function(){ selcitycm('江西省');M.actionsheet.close(); },
				'山东省' : function(){ selcitycm('山东省');M.actionsheet.close(); },'河南省' : function(){ selcitycm('河南省');M.actionsheet.close(); },
				'湖北省' : function(){ selcitycm('湖北省');M.actionsheet.close(); },'湖南省' : function(){ selcitycm('湖南省');M.actionsheet.close(); },
				'广东省' : function(){ selcitycm('广东省');M.actionsheet.close(); },'海南省' : function(){ selcitycm('海南省');M.actionsheet.close(); },
				'四川省' : function(){ selcitycm('四川省');M.actionsheet.close(); },'贵州省' : function(){ selcitycm('贵州省');M.actionsheet.close(); },
				'云南省' : function(){ selcitycm('云南省');M.actionsheet.close(); },'陕西省' : function(){ selcitycm('陕西省');M.actionsheet.close(); },
				'甘肃省' : function(){ selcitycm('甘肃省');M.actionsheet.close(); },'青海省' : function(){ selcitycm('青海省');M.actionsheet.close(); },
				'台湾省' : function(){ selcitycm('台湾省');M.actionsheet.close(); },'内蒙古自治区' : function(){ selcitycm('内蒙古自治区');M.actionsheet.close(); },
				'广西壮族自治区' : function(){ selcitycm('广西壮族自治区');M.actionsheet.close(); },'西藏自治区' : function(){ selcitycm('西藏自治区');M.actionsheet.close(); },
				'宁夏回族自治区' : function(){ selcitycm('宁夏回族自治区');M.actionsheet.close(); },'新疆维吾尔自治区' : function(){ selcitycm('新疆维吾尔自治区');M.actionsheet.close(); },
				'香港特别行政区' : function(){ selcitycm('香港特别行政区');M.actionsheet.close(); },'澳门特别行政区' : function(){ selcitycm('澳门特别行政区');M.actionsheet.close(); },
			},
		})
	});
	
	
	function selcitycm(city){
		var M = {};
		M.dialog4 = jqueryAlert({
			'title'   : '提示',
			'content' : '确定切换到'+city+'吗？',
			'modal'   : true,
			'animateType' : '',
			'buttons' :{
				'确定' : function(){
					yesselcitycm(city);
					M.dialog4.close();
				},
				'取消' : function(){
					M.dialog4.close();
				}
			}
		});
	}
	
	

	
	
	function yesselcitycm(city){
		$.post("<?php echo U('Index/selcitydo');?>",
			{'cityv' : city},
			function(data){
				
				if(data.status==1){
					$('.selcityv').html(city);
					layer.msg(data.msg);
				}
				
				
				if(data.status==-1){
					layer.msg(data.msg);
					var M = {};
					M.dialog4 = jqueryAlert({
						'title'   : '提示',
						'content' : '开始激活该功能？',
						'modal'   : true,
						'animateType' : '',
						'buttons' :{
							'激活' : function(){
								M.dialog4.close();
								
								M.actionsheet = jqueryAlert({
									'style' : 'actionsheet',
									'title'   : '激活有效期',
									"className"    : '', //添加类名
									'modal'   : true,
									'actionsheetCloseText' : '取消',
									'buttons' :{
										'一个月（10USDT）' : function(){ selcityday(30);M.actionsheet.close(); },
										'三个月（24USDT）' : function(){ selcityday(90);M.actionsheet.close(); },
										'六个月（40USDT）' : function(){ selcityday(180);M.actionsheet.close(); },
									},
								})
								
							},
							'取消' : function(){
								M.dialog4.close();
							}
						}
					});
				}
				
				if(data.status==0){
					layer.msg(data.msg);
					var M = {};
					M.dialog4 = jqueryAlert({
						'title'   : '提示',
						'content' : '重新激活该功能？',
						'modal'   : true,
						'animateType' : '',
						'buttons' :{
							'激活' : function(){
								M.dialog4.close();
								
								M.actionsheet = jqueryAlert({
									'style' : 'actionsheet',
									'title'   : '激活有效期',
									"className"    : '', //添加类名
									'modal'   : true,
									'actionsheetCloseText' : '取消',
									'buttons' :{
										'一个月（10USDT）' : function(){ selcityday(30);M.actionsheet.close(); },
										'三个月（24USDT）' : function(){ selcityday(90);M.actionsheet.close(); },
										'六个月（40USDT）' : function(){ selcityday(180);M.actionsheet.close(); },
									},
								})
								
							},
							'取消' : function(){
								M.dialog4.close();
							}
						}
					});
				}
				
				if(data.status==-1001){
					layer.msg(data.msg);
				}
				
				
				if(data.status==-1003){
					layer.msg(data.msg);
				}
				
				if(data.status==-1005){
					layer.msg(data.msg);
				}
				
				
			}
		);
	
	
	}
	
	
	
	function selcityday(days){
		var M = {};
		M.dialog4 = jqueryAlert({
			'title'   : '提示',
			'content' : '确定激活'+days+'天吗？',
			'modal'   : true,
			'animateType' : '',
			'buttons' :{
				'确定' : function(){
					yesselcityday(days);
					M.dialog4.close();
				},
				'取消' : function(){
					M.dialog4.close();
				}
			}
		});
	}
	function yesselcityday(days){
		$.post("<?php echo U('Index/selcityday');?>",
			{'days' : days},
			function(data){
				
				if(data.status==1){
					layer.msg(data.msg);
				}
				if(data.status==-1){
					layer.msg(data.msg);
				}
				
				if(data.status==-1001){
					layer.msg(data.msg);
				}
			}
		);
	
	
	}
	
	
	
	
	
	
	function playMusic() {
		var audioEle = document.getElementById("audio");
        audioEle.play();
	}
	var start_qdiflag = false;
	function start_qdm(){
		var qdclass = $('#qdclass').val();
		//$("#pipeinnow").attr('disabled',true);
		$.post("<?php echo U('Index/pipeiorder');?>",
			{'qdclass' : qdclass},
			function(data){
				//console.log(data);
				start_qdiflag = false;
				
				if(data.status==0){
					layer.msg(data.msg);  //,data.url);
				}
				
				if(data.status==5){
					start_qdiflag = true;
				}
				
				if(data.status==1){
					playMusic();
					layer.msg(data.msg);
					setTimeout(function (args) {
						window.location.href = "<?php echo U('Index/shoudaning');?>";
					}, 3500);
				}
				
				if(data.status==11){
                    playMusic();
					layer.msg(data.msg);
					setTimeout(function (args) {
						window.location.href = "<?php echo U('Index/shoudaning');?>";
					}, 3500);
				}
				
			}
		);
	}
	function start_qd(){
		start_qdm();
	}
	var interval = setInterval(function(){
		if(start_qdiflag){
			$(".loadingdiv").fadeIn(120);
			start_qdm();
		}else{
			$(".loadingdiv").fadeOut(120);
		}
		
	}, 1200);

	function clo_qd(){
		start_qdiflag = false;
	}
	
	setInterval(function(){
		$(".loagingimg").attr("src", "../Public/home/wap/images/loadingimg/loading"+randomNum(1,15)+".gif");
		
	}, 15000);
	
	function start_auto(){
		var qdclass = $('#qdclass').val();
		$("#autopipei").attr('disabled',true);
		$.post("<?php echo U('Index/pipeiauto');?>",
			{'qdclass' : qdclass},
			function(data){
				if(data.status==1){
					layer.msg(data.msg);  //,data.url);
					setTimeout(function (args) {
						window.location.href = "<?php echo U('Index/index');?>";
					}, 3000); 
				}else{
					layer.msg(data.msg);
				}
			});
	}
	
	function randomNum(minNum,maxNum){ 
		switch(arguments.length){ 
			case 1: 
				return parseInt(Math.random()*minNum+1,10); 
			break; 
			case 2: 
				return parseInt(Math.random()*(maxNum-minNum+1)+minNum,10); 
			break; 
				default: 
					return 0; 
				break; 
		} 
	}
</script>
</body>
</html>