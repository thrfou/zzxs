<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册会员</title>
<link href='/template/Tpl/User/qiubai/Public/reg.css' media="screen, projection" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="sign">
<div class="logo"><a href="/" title="返回首页"></a></div>
<a href="/"><h3>会员注册</h3></a>
<form action="/index.php/User/Index/checkreg" method="post">
<li class="login_input">
<label class="txt_default">用户名</label>
<input name="uname" type="text" tabindex="1" class="input_txt" />
</li>
<li class="login_input">
<label class="txt_default">邮箱</label>
<input name="email" type="text" tabindex="2" class="input_txt" />
</li>
<li class="login_input">
<label class="txt_default">密码</label>
<input name="password" type="password" tabindex="3" class="input_txt" />
</li>
<li class="login_input">
<label class="txt_default">重复密码</label>
<input name="repassword" type="password" tabindex="4" class="input_txt" />
</li>
<li>
<input name="remember_me" type="hidden" id="remember_me" value="3" checked/>
<button type="submit" name="submit" class="loginbtn" tabindex="5">注册</button>
</li>
<input type="hidden" name="__hash__" value="4a87e1bc6e06f2b82dba45668d5c4de4_c25f7929cdc6c17e76c2a209c8bfa34b" /><input type="hidden" name="__hash__" value="4a87e1bc6e06f2b82dba45668d5c4de4_02fa38a0b2ccdcf1957f10a22a7b23bb" /></form>
<div class="note">
<a href="/index.php/User/Index/login">登录帐号，体验精彩！</a>
</div>
</div>
</div>
</body>
</html>