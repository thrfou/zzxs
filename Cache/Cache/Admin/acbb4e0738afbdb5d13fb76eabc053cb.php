<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head runat="server">
		<title>后台登录-<?php echo ($title); ?></title>
		<link href="../Public/Css/alogin.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="../Public/Js/Base.js"></script>
		<script type="text/javascript" src="../Public/Js/prototype.js"></script>
		<script type="text/javascript" src="../Public/Js/mootools.js"></script>
		<script type="text/javascript" src="../Public/Js/Ajax/ThinkAjax.js"></script>
		<script type="text/javascript" src="../Public/Js/Form/CheckForm.js"></script>
		<script type="text/javascript" src="../Public/Js/common.js"></script>
		<script language="JavaScript">
			var PUBLIC	 =	 '../Public';
			ThinkAjax.image = ['../Public/Images/ajax/loading2.gif','../Public/Images/ok.gif','../Public/Images/ajax/update.gif' ]
			ThinkAjax.updateTip	=	'登录中～';
			function loginHandle(data,status){
				if (status==1){
					$('result').innerHTML = '<span style="color:blue"><img SRC="../Public/Images/ajax/ok.gif" align="absmiddle" > 登录成功！3 秒后跳转～</span>';
					$('form1').reset();
					window.location = '__URL__/index/';
				}
			}
			function keydown(e){
				var e = e || event;
				if (e.keyCode==13)
				{
					ThinkAjax.sendForm('form1','__URL__/checkLogin/',loginHandle,'result');
				}
			}
			function fleshVerify(url){
				//重载验证码
				var timenow = new Date().getTime();
				document.getElementById('verifyImg').src= url+"/verify/"+timenow;
			}
		</script>
	</head>
	<body onload="document.login.account.focus()">
		<form action="__URL__/checklogin" method="post" name="login" id="form1">
			<div class="Main">
				<ul>
					<li class="top"></li>
					<li class="top2"></li>
					<li class="topA"></li>
					<li class="topB">
						<span>
							<img src="../Public/Images/login/logo.png" />
						</span>
					</li>
					<li class="topC"></li>
					<li class="topD">
						<ul class="login">
							<li>
								<span class="left">用户名：</span>
								<span style="left">
									<input type="text" class="txt" check="Require" warning="请输入帐号" name="account"/>
								</span>
							</li>
							<li>
								<span class="left">密 码：</span> 
								<span style="left">
									<input type="password" class="txt" check="Require" warning="请输入密码" name="password"/>  
								</span>
							</li>
							 <li>
								<span class="left">验证码：</span>
								<span style="left">
									<input type="text" onkeydown="keydown(event)" class="txtCode" check="Require" warning="请输入验证码" name="verify">
								</span>
								<img id="verifyImg" onclick="fleshVerify('__URL__')" src="__URL__/verify/" title="刷新验证码" style="cursor:pointer;margin-left:5px;" align="absmiddle"/>&nbsp;
								<a href="javascript:fleshVerify('__URL__')" style="border-bottom:1px dashed gray;padding-bottom:1px;color:#174B73;text-decoration:none;">刷新验证码</a>
							</li>
						</ul>
					</li>
					<li class="topE"></li>
					<li class="middle_A"></li>
					<li class="middle_B"></li>
					<li class="middle_C">
						<input type="hidden" name="ajax" value="1"/>
						<span id="ThinkAjaxResult" class="ThinkAjax"></span>
						<span id="result" class="result"></span>
						<input type="button" onclick="ThinkAjax.sendForm('form1','__URL__/checkLogin/',loginHandle,'result')" style="margin-left:60px;background:url(../Public/Images/login/btnlogin.gif);height:34px;width:103px;cursor:pointer;" value="" />
						
					</li>
					<li class="middle_D"></li>
					<li class="bottom_A" style="text-align:right;"><span style="margin-right:250px;line-height:50px;font-weight:bold;"><?php echo ($list["copy"]); ?></span></li>
					<li class="bottom_B">
						<a href="/" style="font-size:14px;color:black;border-bottom:1px dashed gray;padding-bottom:1px;text-decoration:none;">返回网站主页</a>
					</li>
				</ul>
			</div>
		</form>
	</body>
</html>