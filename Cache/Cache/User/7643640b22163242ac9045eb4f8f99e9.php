<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($config["title"]); ?></title>
<link href='<?php echo ($USER_PUBLIC); ?>/style_web.css' media="screen, projection" rel="stylesheet" type="text/css" />
<script src="<?php echo ($YICMS_PUBLIC); ?>/source/jquery.js" type="text/javascript"></script>
<script>
	$(function(){
		$('#uname').focus();
	});
	function checkFetch(formUrl,homeUrl){
		$("#error").css('display','block');
		$("#error").html('<img align="absmiddle" src="'+homeUrl+'/source/loading.gif"/> 提交检测中..');
		var error = '<img align="absmiddle" src="'+homeUrl+'/source/error.gif"/>';
		var uname  = $('#uname').val();
		var email  = $('#email').val();
		if(uname.length<2){
			$("#error").html(error+' 用户名必须2位以上!');
			$('#uname').focus();
			return false;
		}
		var re = /[\w-]+@([a-zA-Z0-9-]+\.){1,3}[a-zA-Z]+/;
		if(!re.test(email)){
			$("#error").html(error+' 邮箱格式不正确!');
			$('#email').focus();
			return false;
		}
		$.ajax({
			type: "POST",
			url: formUrl,
			data: "uname="+uname+"&email="+email,
			success: function(msg){
				if(msg == 1){
					$('#form').append('<input type="submit" id="submit" style="display:none;"/>');
					$('#submit').click();
				}
				if(msg == -1){
					$("#error").html(error+'用户不存在!');
					$('#uname').focus();
					return false;
				}
				if(msg == -2){
					$("#error").html(error+'用户和邮箱不匹配!');
					$('#email').focus();
					return false;
				}
			}
		});
	}
</script>
</head>
<body>
<div class="sign">
<div class="logo"><a href="/" title="返回首页" style="background:url(<?php echo ($USER_PUBLIC); ?>/userlogo.jpg);width:300px;"></a></div>
<div class="block" style="width:380px;">
<form action="<?php echo U('Index/checkFetch');?>" method="post" id="form">
<div style="line-height:45px;float:left;width:70px;"><label for="uname">用户名</label> </div><input id="uname" name="uname" type="text"/><br/>
<span style="line-height:45px;float:left;width:70px;"><label for="email">邮箱</label> </span><input id="email" name="email" type="text"/><br/>
<input name="remember_me" type="checkbox" id="remember_me" value="1" checked="checked" />
<span id="error" style="width:250px;margin-left:60px;line-height:45px;color:red;text-align:center;display:none;"></span>
<button type="button" onclick="checkFetch('<?php echo U('User/Index/checkFetchForm');?>','<?php echo ($YICMS_PUBLIC); ?>')" style="width:250px;margin-left:70px;">找回密码</button>
</form>
<div class="note">
<a href="/">返回首页</a> | 
<a href="<?php echo U('User/Index/fetchpass');?>">找回密码</a> | 
<a href="<?php echo U('User/Index/reg');?>">注册帐号，体验精彩！</a>
</div>
</div>
</div>
</body>
</html>