<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo ($config["title"]); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="description" content="<?php echo ($config["description"]); ?>" />
<link href="<?php echo ($USER_PUBLIC); ?>/qiushi_1118.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo ($USER_PUBLIC); ?>/moumentei_style.css" media="screen" rel="stylesheet" type="text/css" />
<link href="<?php echo ($USER_PUBLIC); ?>/tip-yellowsimple.css" media="screen, projection" rel="stylesheet" type="text/css" />
<script src="<?php echo ($YICMS_PUBLIC); ?>/source/jquery.js" type="text/javascript"></script>
<script src="<?php echo ($USER_PUBLIC); ?>/lib.js" type="text/javascript"></script>
<script src="<?php echo ($USER_PUBLIC); ?>/lib2nd.js" type="text/javascript"></script>
</head>
<body>
<div id="divFlashNumber" class="ad"></div>
<div id="container">
<div id="topbar">
<div id="toplogo"><a href="/">返回首页</a></div>
<div id="topmessage">
<?php if(!empty($_SESSION['uid'])): ?><span class="login" style="display:block">
	您好， <a href="<?php echo U('User/Index/index');?>" class="username"><?php echo ($_SESSION["uname"]); ?></a> |
	<a href="<?php echo U('User/Index/msg');?>">小纸条</a><span style="color:#009900;font-size:9px;font-weight:bold;font-family:tahoma" id="unread_messages_count"></span>
	|
	<a href="<?php echo U('User/Index/code');?>">邀请码</a>
	|
	<a href="<?php echo U('User/Index/logout');?>" title="Log out">退出</a>
	</span>
<?php else: ?>
	<span class="logout">
	您好，您可以 <a href="<?php echo U('User/Index/login');?>" class="need-login" style="border: none;">登录</a>
	或 <a href="<?php echo U('User/Index/reg');?>">注册</a>
	</span><?php endif; ?>	
</div>
</div>
<div id="center-container">
<div id="left">
<div class="userinfo clearfix">
<a href="<?php echo U('User/Index/index?uid='.$profile['uid']);?>"><img alt="<?php echo ($profile["uname"]); ?>" class="userphoto photo_m" src="<?php echo ($profile["face"]); ?>" /></a>
<p class="userxxx"><?php echo ($profile["uname"]); ?></p>
<ul class="stats">
	<li id="updates">
		<div class="list">
			<a href="<?php echo U('User/Index/articles?uid='.$profile['uid']);?>">
				<span class="function">文章</span>
				<span class="stats_count numeric"><?php echo ($profile["articles"]); ?></span>
			</a>
		</div>
	</li>
	<li id="user-comments">
		<div class="list">
			<a href="<?php echo U('User/Index/comments?uid='.$profile['uid']);?>">
				<span class="function">评论</span>
				<span class="stats_count numeric"><?php echo ($profile["comments"]); ?></span>
			</a>
		</div>
	</li>
</ul>
</div>
<?php if($profile['uid'] == $_SESSION['uid']): ?>&nbsp;
<br/>
<a href="<?php echo U('User/Index/edit');?>">修改头像/邮箱</a>
<br/>
<br/>
<a href="<?php echo U('User/Index/editpass');?>">修改密码</a>
<br/><?php endif; ?>
</div>

<div id="right" style="mar">
	<?php if(empty($news)): ?><div><h2>无动态</h2></div>
	<?php else: ?>
		<div><h2>最新动态</h2></div>
		<ul>
			<?php if(is_array($news)): $i = 0; $__LIST__ = $news;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<span class="user"><?php echo ($vo["author"]); ?></span> 于 
					<span class="time"><?php echo (switchtime($vo["time"])); ?></span><br>
					@<a href="<?php echo U('Home/Index/news?id='.$vo['id']);?>" target="_blank"><?php echo ($vo["title"]); ?></a><br/>
					<?php echo (msubstr($vo["content"],0,80,'utf-8',false)); ?><br/><br/>
					<?php if(!empty($vo['pic'])): ?><img src="<?php echo ($YICMS_PUBLIC); ?>/news/m_<?php echo ($vo["pic"]); ?>"/><?php endif; ?>
					<?php if(!empty($vo['video'])): ?><embed src="<?php echo ($vo["video"]); ?>" type="application/x-shockwave-flash" width="550" height="400" quality="high" allowfullscreen="true"/><?php endif; ?>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>	
		</ul><?php endif; ?>	
</div>
<div style="float:left;">
	<form action="<?php echo U('User/Index/search');?>" method="POST">
		<input size="18" name="account" />
		<input type="submit" value="查找用户" style="width:80px;"/>
	</form>
</div>
<div style="float:left;">
	<h2>广告</h2>
	
</div>
<div style="clear:both;"></div>
</div>
</div>
<div id='container-foot'>
<div id='footerline'></div>
<div id='copyright'><?php echo ($config["copy"]); ?>
</div>
</div>
</body>
</html>