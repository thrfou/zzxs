<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>审核新帖 :: <?php echo ($config["title"]); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="HandheldFriendly" content="True" />
<script src="<?php echo ($YICMS_PUBLIC); ?>/source/jquery.js" type="text/javascript"></script>
<script>
	$(function(){
		$.ajax({
		   type: "POST",
		   url: "<?php echo U('Index/ticketAjax');?>",
		   success: function(msg){
				$('.qiushi_body2').html(msg);
		   }
		});
	});
	function vote(i){
		if($('.qiushi_body2').html() != '---暂时没有新的糗事!---'){
			$.ajax({
			   type: "POST",
			   url: "<?php echo U('Index/checkTicket');?>",
			   data: "vote="+i,
			   success: function(msg){
					$('.qiushi_body2').html(msg);
			   }
			});
		}else{
			alert('---暂时没有新的糗事!---');
		}
	}
</script>
<script type="text/javascript">
$(document).ready(function() {
$('a#enlarge').colorbox({href:function(){ return $(this).find('img').attr('src') } });
$('a.voteme').click(function(e){
if($(this).hasClass('disable'))
return false;
});
});
function activeVoteLink(){
$('a.voteme').removeClass('disable');
}
function disableVoteLink(){
$('a.voteme').addClass('disable');
setTimeout('activeVoteLink()',2000);
}
</script>
<style type="text/css">
* {
margin: 0;
padding: 0;
word-wrap: break-word;
}
html {
height: 100%;
}
body {
height: 100%; font: 12px verdana; line-height:190%; color: #000; text-align: left; margin: 0; padding: 0;
}
body {background:url("<?php echo ($HOME_PUBLIC); ?>/images/background.jpg") no-repeat scroll center top #252525; color:#BDE3EC}
div {word-break: break-all;}
a {
color: #595959;
text-decoration: none;
}
a:hover {
background: #D7D7D7; color: #000
}
img {
border: none;
}
#topbar{height: 26px;color:#666666; background-color:#EDEDED;position: relative;padding-top:4px;border-bottom:1px solid #CCCCCC;}
#toplogo {
float: left; padding-left: 6px;
}
#toplogo a {
text-decoration:none; color:#666666;
}
#toplogo a:hover {
background: none;text-decoration:none
}
#topmessage {
float: right;padding-right: 6px
}
#container {
min-height: 100%; position: relative; text-align: left;
}
#center-container {
min-height: 100%; width:974px;position: relative; text-align: left; margin: 0 auto;font: 14px; padding: 20px 0 60px 0;clear:both;
}
* html #container
{
height: 100%;
}
#footerline {
padding-right: 4px; padding-left: 4px; background: #ccc; padding-bottom: 0px; padding-top: 1px; text-align: left; margin-bottom: 8px;
}
#container-foot { position: relative; margin: -4em auto 0 auto; width: 600px; clear:both;}
.login{display:none}
#floorcontent{background:#fff;border:1px solid #000;}
.qiushi_body, .qiushi_counts,.qiushi_counts_afterclick, .qiushi_comments {font-size:14px;}
.login-form{width:250px; margin-left:380px}
#center-container {width:auto;padding-left:25px}
#topbar {background-color:#000;color:#ccc;border-bottom:1px solid #000}
a {
color: #ccc; text-decoration: underline;
}
a:hover {
background: #D7D7D7; color: #000
}
#toplogo a {
text-decoration:none; color:#ccc;
}
.qiushi_body2 {
width: 300px;background:#E8E7E3;border-color:#393636;min-height:400px; height:auto !important;
height:400px;
overflow:visible;
border-style:solid;
border-width:0 5px 5px 0;color:#000;padding:25px;font-size:14px; margin:0 0 30px 0;float:left
}
.qiushi_body3 {
width: 300px;background:#ddd;border-color:#393636;min-height:400px; height:auto !important;
height:400px;
overflow:visible;
border-style:solid;
border-width:0 5px 5px 0;color:#000;padding:25px;font-size:14px; margin:0 0 30px 0;float:left
}
.qiushi_body3 h2{color:red;}
.qiushi_body3 a{color:blue;}
.tags a {text-decoration:none; color:#009900;font-weight:bold}
h4 {color:#fff;padding-top:40px;padding-bottom:40px;font-size:14px;line-height:120%;text-align:left;padding-left:8px;}
#container-foot {width: 100%;}
#footerline {
padding-right: 0; padding-left: 0; background: #000; padding-bottom: 0px; padding-top: 1px; text-align: left; margin-bottom: 8px;
}
#tickets.fen {
font-size:14px;
height:auto;
line-height:100%;
padding:12px;
position:fixed!important;
position:absolute;
left:710px;
top:40px;
width:auto;
z-index:8765;}
#tickets {
font-size:14px;
height:auto;
line-height:100%;
padding:12px;
position:fixed!important;
position:absolute;
left:358px;
top:40px;
width:auto;
z-index:8765;}
#tickets a {color:white}
#tickets a:hover {color:black}
.approve {background:none repeat scroll 0 0 #00CC00;text-align:left;
border:medium none;
color:#FFFFFF;
font:bold 14px verdana;
width:200px;
height:28px;
padding:0 8px;}
.kill {background:none repeat scroll 0 0 #663366;text-align:left;
border:medium none;
color:#FFFFFF;
font:bold 14px verdana;
width:200px;
height:28px;
padding:0 8px;}
.skip {background:none repeat scroll 0 0 #585858;text-align:left;
border:medium none;
color:#FFFFFF;
font:bold 14px verdana;
width:200px;
height:28px;
padding:0 8px;
}
.newsticker {
list-style-type: none;
padding: 3px;
margin: 0;
width: 550px;
}
.newsticker li{display:none}
#picfen { margin:0 auto; width:100%; padding:0 }
#picfen img{ max-width:90%; width:expression(document.body.clientWidth>document.getElementById("picfen").scrollWidth*9/10? "90%": "auto" ) }
#pic{ margin:0 auto; width:100%; padding:0 }
#pic img{ max-width:90%; width:expression(document.body.clientWidth>document.getElementById("pic").scrollWidth*9/10? "90%": "auto" ) }
#tickets a.disable {
text-decoration: none;
color: #767676;
cursor: default;
}
#tickets a.disable:hover{
cursor: default;
background: none;
background-image: none;
text-decoration: none;
}
</style>
</head>
<body>
<div id="divFlashNumber" class="ad"></div>
<div id="container">
<div id="topbar">
<div id="toplogo"><a href="/">返回 &nbsp;&nbsp; <?php echo ($about["name"]); ?></a></div>
<div id="topmessage">
<?php if(!empty($_SESSION['uid'])): ?><span>
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
<p></p>
	<div class="qiushi_body2">
		
	</div>
</div>
<div>
<div id="tickets" class="anofen">
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>我觉得吧，这个帖子??</b>
<div style="clear:both"></div>
<div style="background-color:#663366; margin: 30px 0 30px 0;color:white">
<b style="font-size:40px;background-color:#663366;">×</b><div style="padding:0 0 20px 50px; line-height:200%;"><b>不能发表，因为</b>
<br><a title="包含广告链接或暗示" href="javascript:vote(-1)" class="voteme">广告 或 无意义</a>
<br><a class="voteme" href="javascript:vote(-2)" title="破坏国家、党派、政府及领导人荣誉或形象，或违反国家法律法规的内容">有政治风险</a>
<br><a class="voteme" href="javascript:vote(-3)" title="涉及到生殖器官、性、伦理方面，或污秽不堪的粗口，或对于他人缺陷、隐私的嘲笑等">低俗 色情 恶心</a>
<br><a class="voteme" href="javascript:vote(-4)" title="不真实">虚构 或 PS</a>
<br><a class="voteme" href="javascript:vote(-5)" title="你懂的">? 坟 ?</a>
<br><a class="voteme" href="javascript:vote(-6)" title="事情看懂了，但嘴角就是没有一点点地上扬">找不到笑点</a></div>
</div>
<div style="background-color:#0bb60b; margin: 20px 0 20px 0;color:white">
<b style="font-size:40px;background-color:#0bb60b;">√</b><div style="padding:0 0 20px 50px; line-height:200%"><b>的确是糗事</b><br><a title="确认无上述问题" class="voteme" href="javascript:vote(1)">真心笑了，通过！</a></div>
</div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>说不清楚，<a class="voteme" href="javascript:vote(0)">先跳过</a></b>
</div>
</div><!-- container -->
<div style="clear:both;margin-top:50px;"></div>
<div id='container-foot'>
<div id='footerline'></div>
<center id="copyright">
<?php echo ($config["copy"]); ?>
</center>
</div>
</body>
</html>