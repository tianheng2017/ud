<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0026)http://103.200.29.54/login -->
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <title></title>
    <link href="/Public/home/wap/css/mui.min.css" rel="stylesheet">
    <link href="/Public/home/wap/css/login.css" rel="stylesheet">
    <script src="/Public/home/wap/js/mui.min.js"></script>
    <script type="text/javascript" charset="utf-8">
        mui.init();
    </script>
    <style>
        p, a {
            color: #fff;
        }

        a:active {
            color: #ccc;
        }

        .mui-input-group input:last-child {
            margin-left: 60px;
        }

        .login {
            background: #00CFD6;
        }
		.mui-btn-danger.mui-active:enabled,.mui-btn-danger:enabled:active,.mui-btn-negative.mui-active:enabled,.mui-btn-negative:enabled:active,.mui-btn-red.mui-active:enabled,.mui-btn-red:enabled:active{color:#fff;border:1px solid #00c3ca;background-color:#00c3ca}
    </style>
</head>
<!--
<body style="background: url('../Public/home/wap/images/bg1.jpg')/*#4B8FF9*/;background-size:100%;">
-->
<body style="background: #4B8FF9;background-size:100%;">
<img src="../Public/home/wap/images/logo.png" class="img">
<form name="formlogin" id="loginForm" class="formlogin mui-input-group form" method="post"
      action="<?php echo U('Login/checkLogin');?>">
    <div class="mui-input-row formdiv">
        <img src="../Public/home/wap/images/nubmer.png" class="formimg">
        <input type="number" name="account" style="margin-left:60px;position:absolute;top:-9px;" maxlength="11"
               autocomplete="off" id="number" value="<?php echo ($account); ?>" class="forminput" placeholder="请输入手机号">
    </div>
    <div class="mui-input-row formdiv2">
        <img src="../Public/home/wap/images/mima.png" class="formimg2">
        <input type="password" name="password" maxlength="32" class="forminput2" placeholder="请输入密码">
    </div>
    <div class="mui-card-content-inner formdiv3">
        <a href="<?php echo U('login/getpsw');?>">忘记密码？</a>
    </div>
    <br><br><br>
    <div class="mui-button-row">
        <button type="button" onclick="login()" class="mui-btn mui-btn-danger login" id="submit">登录</button>
    </div>
    <br>
    <div class="mui-card-content">

        <div class="mui-card-content-inner">
            <p class="reg">还没有账号？<a href="javascript:void(0);" onclick="register()"> 立即注册</a></p>
        </div>
    </div>
</form>

</body>
<script src="/Public/home/wap/js/jquery1.11.1.min.js"></script>


<!--表单验证-->
<script type="text/javascript" src="/Public/home/common/layer/layer.js"></script>

<script type="text/javascript" src="/Public/home/common/js/index.js"></script>

<script>
    function register() {
        window.location.href = "<?php echo U('Login/register');?>";
    }

</script>
</html>