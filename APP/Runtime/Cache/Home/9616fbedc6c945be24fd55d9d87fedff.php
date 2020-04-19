<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="/Public/home/wap/js/mui.min.js"></script>
    <link href="/Public/home/wap/css/mui.min.css" rel="stylesheet">
    <script type="text/javascript" charset="utf-8">
        mui.init();
    </script>
    <style>
        .body{
            line-height: px;
        }
        .mui-table-view-cell:after{
            left: 0px;
            background-color: #c8c7cc;
            margin: 0 40px;
        }
        .mui-table-view:before{
            background-color:unset;
        }
        .mui-table-view:after{
            background-color:unset;
        }
        .mui-input-group:before{
            height:0px
        }
        .mui-input-group:after{
            height:0px;
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
            margin-top: 55px;
            background:#fff;
            line-height:2em;
        }
        .p{
            margin-left:10%;
            font-family:'微软雅黑';
            color:#000;
        }
        .p1{
            position:absolute;
            left:35%;
            bottom:12px;
            font-family:'微软雅黑';
            font-size:1em;
            color:#000;
        }
        .form{
            top:10px;
            height:0px;
            width:80%;
            left:0px;
            right:0px;
            margin:auto;
        }
        .divc{
            border-radius:30px;
            background-color:#fff;
            margin-bottom:30px;
            border:1px solid #ccc;
        }
        .mui-input-group .mui-input-row:after{
            background-color: unset;
        }
        .img{
            position:absolute;
            width:35px;
            margin-left:15px;
            margin-top:4px;
        }
        .int{
            color:#0062CC;
            margin-left:50px;
            font-size:0.9em;
            font-family:'微软雅黑';
        }
        .button{
            line-height:2em;
            font-size:0.9em;
            width:80%;
            font-family:'微软雅黑';
            border-radius:30px;
            border:0px solid;
            background:#26C4FD;
        }
        a{
            color:#000;
        }
    </style>
</head>
<body style="background:#f8f8f8;">
<header class="mui-bar mui-bar-nav header">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left" href="/User/zichan"></a>
    <h1 class="mui-title h1">扫码加客服微信</h1>
</header>
<div style="background: #fff;height: 270px;margin-top: 10px;">
    <div style="background: #fff;height: 270px;margin-top: 10px;">
        <img id="erc20_img" src="<?php echo ($erc20_img); ?>" alt="" width="215" height="215" style="display: block;margin: 0 auto;">
        <button id="save_qrcode" type="button" class="mui-btn mui-btn-outlined" style="display: block;margin: 8px auto 0;">保存二维码</button>
    </div>
</div>

</body>
<script type="text/javascript" src="/Public/home/common/js/jquery-1.9.1.min.js" ></script>
<script type="text/javascript" src="/Public/home/common/layer/layer.js" ></script>
</html>