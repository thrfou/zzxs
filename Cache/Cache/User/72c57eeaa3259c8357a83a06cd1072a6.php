<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>会员登陆</title>
<link href='/template/Tpl/User/qiubai/Public/ueser.css' media="screen, projection" rel="stylesheet" type="text/css" />
<script src="/Public/source/jquery.js" type="text/javascript"></script>
</head>
<body>
<div class="sign">
<div class="logo"><a href="/" title="返回首页"></a></div>
<a href="/"><h3>会员登陆</h3></a>
<form action="/index.php/User/Index/checklogin" method="post">
<li class="login_input">
<label class="txt_default">帐号/邮箱</label>
<input name="account" type="text" tabindex="1" class="input_txt" />
</li>
<li class="login_input">
<label class="txt_default">密码</label>
<input name="password" type="password" tabindex="2" class="input_txt" />
</li>
<li>
<input name="remember_me" type="hidden" id="remember_me" value="3" checked/>
<button type="submit" name="submit" class="loginbtn" tabindex="3">登录</button>
</li>
<input type="hidden" name="__hash__" value="0f626009336220c1405e5a0372594daa_8c1577009e23d5c470ec9be48874f8a3" /></form>
<div class="note">

<a href="/index.php/User/Index/reg">注册帐号，体验精彩！</a>
</div>
</div>
</div>
</body>
</html>