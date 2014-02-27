<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="../Public/Css/admincp.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<table width="100%" border="0" cellpadding="2" cellspacing="6" style="_margin-left:-10px; ">
			<tr>
			  <td><table width="100%" border="0" cellpadding="2" cellspacing="6">
				<tr>
				  <td>
<script src="/Public/source/jquery.js"></script>
<script>
$(document).ready(function(){
	$('.tableborder').hide('fast');
	$('.pic').show('fast');
});
function show(i){
	$('.tableborder').hide('fast');
	$('.'+i).show('fast');
}
</script>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="<?php echo U('Index/stat');?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;其他设置</div>
</div>
<form action="__URL__/checkOther/" method="post">
	<table cellspacing="1" cellpadding="4" width="100%" align="center">
        <tr>
            <td width="15%"><a onclick="show('pic')" class="button">基本设置</a></td>
            <td width="15%"><a onclick="show('number')" class="button">水印设置</a></td>
            <td width="70%"><a onclick="show('config')" class="button">邮件设置</a></td>
        </tr>
	</table>
    <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder pic">
        <tr class="header">
            <td colspan="2">基本设置</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>是否开启邀请码注册:</td>
            <td class="altbg2">
				<input type="radio" value="1" name="getcode"
					<?php $getcode = C('getcode');if($getcode) echo 'checked'; ?>
				/>开启&nbsp;&nbsp;&nbsp;
				<input type="radio" value="0" name="getcode"
				<?php if(!$getcode) echo 'checked'; ?>
				/>不开启
			</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>每天可申请邀请码数量:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('codeNum');?>" name="codeNum" style="width:50px;"/>&nbsp;&nbsp;输入0即不允许申请邀请码!</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>内容列表显示数量:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('listnews');?>" name="listnews" style="width:50px;"/>&nbsp;&nbsp;条</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>内容图片最大宽度:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('newsmwidth');?>" name="newsmwidth" style="width:50px;"/>&nbsp;&nbsp;像素</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>内容图片最大高度:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('newsmheight');?>" name="newsmheight" style="width:50px;"/>&nbsp;&nbsp;像素</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>幻灯片图片宽度:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('flashwidth');?>" name="flashwidth" style="width:50px;"/>&nbsp;&nbsp;像素</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>幻灯片图片高度:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('flashheight');?>" name="flashheight" style="width:50px;"/>&nbsp;&nbsp;像素</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>网友审贴通过数量:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('netpass');?>" name="netpass" style="width:50px;"/>&nbsp;&nbsp;次</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>网友审贴不通过数量:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('netnopass');?>" name="netnopass" style="width:50px;"/>&nbsp;&nbsp;次</td>
        </tr>
	</table>
	<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder number">
		<tr class="header">
            <td colspan="2">水印设置</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>开启水印:</td>
            <td class="altbg2">
				<input type="radio" value="1" name="getwater"
					<?php $getwater = C('getwater');if($getwater) echo 'checked'; ?>
				/>图片水印&nbsp;&nbsp;&nbsp;
				<input type="radio" value="0" name="getwater"
				<?php if(!$getwater) echo 'checked'; ?>
				/>文字水印
			</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>水印文字内容:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('watertext');?>" name="watertext" style="width:150px;"/>文字为空则不采用水印!</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>文字大小:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('watersize');?>" name="watersize" style="width:150px;"/></td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>文字颜色:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('watercolor');?>" name="watercolor" style="width:150px;"/>#FFFFFF为白色 #000000为黑色</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>水印文字字体:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('waterfont');?>" name="waterfont" style="width:150px;"/>水印字体路径Public/source/</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>水印图片地址:</td>
            <td class="altbg2"><input type="text" value="<?php echo C('waterimg');?>" name="waterimg" style="width:150px;"/> 水印图片路路径/Public/source/</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>水印位置:</td>
            <td class="altbg2">
				<table cellspacing="1" cellpadding="4" width="500" align="left" class="tableborder pic">
				<tr>
					<td rowspan="3"><input type="radio" name="waterpos" value="10" <?php echo ($waterpos["10"]); ?>/>随机位置</td>
					<td><input type="radio" name="waterpos" value="1" <?php echo ($waterpos["1"]); ?>/>顶部居左</td>
					<td><input type="radio" name="waterpos" value="2" <?php echo ($waterpos["2"]); ?>/>顶部居中</td>
					<td><input type="radio" name="waterpos" value="3" <?php echo ($waterpos["3"]); ?>/>顶部居右</td>
				</tr>
				<tr>
					<td><input type="radio" name="waterpos" value="4" <?php echo ($waterpos["4"]); ?>/>左部居中</td>
					<td><input type="radio" name="waterpos" value="5" <?php echo ($waterpos["5"]); ?>/>左部居左</td>
					<td><input type="radio" name="waterpos" value="6" <?php echo ($waterpos["6"]); ?>/>左部居右</td>
				</tr>
				<tr>
					<td><input type="radio" name="waterpos" value="7" <?php echo ($waterpos["7"]); ?>/>底部居左</td>
					<td><input type="radio" name="waterpos" value="8" <?php echo ($waterpos["8"]); ?>/>底部居中</td>
					<td><input type="radio" name="waterpos" value="9" <?php echo ($waterpos["9"]); ?>/>底部居右</td>
				</tr>
				</table>
			</td>
        </tr>
	</table>
	<table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder config">
		<tr class="header">
            <td colspan="3">邮件设置</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>smtp服务器地址:</td>
            <td class="altbg2" width="50%"><input type="text" value="<?php echo C('smtpserver');?>" name="smtpserver" style="width:150px;"/></td>
			<td>例如:smtp.qq.com</td>
		</tr>
		<tr>
            <td class="altbg1" width="20%"><b>smtp服务器端口:</td>
            <td class="altbg2" width="50%"><input type="text" value="<?php echo C('smtpport');?>" name="smtpport" style="width:150px;"/></td>
			<td> 一般为 25</td>
		</tr>
		<tr>
            <td class="altbg1" width="20%"><b>smtp服务器用户名:</td>
        	<td class="altbg2" width="50%"><input type="text" value="<?php echo C('smtpuser');?>" name="smtpuser" style="width:150px;"/></td>
			<td> 例如 : 2454377250</td>
		</tr>
		<tr>
            <td class="altbg1" width="20%"><b>smtp服务器密码:</td>
            <td class="altbg2" width="50%"><input type="password" value="<?php echo C('smtppwd');?>" name="smtppwd" style="width:150px;"/></td>
			<td> 例如 : qiushi</td>
		</tr>
		<tr>
            <td class="altbg1" width="20%"><b>糗事审核通过发送邮件:</td>
             <td class="altbg2" colspan="2">
				<input type="radio" value="1" name="passemail"
					<?php $passemail = C('passemail');if($passemail) echo 'checked'; ?>
				/>发送&nbsp;&nbsp;&nbsp;
				<input type="radio" value="0" name="passemail"
				<?php if(!$passemail) echo 'checked'; ?>
				/>不发送
			</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>糗事审核通过邮件标题:</td>
            <td class="altbg2" colspan="2"><input type="text" value="<?php echo C('smtpsubject');?>" name="smtpsubject" style="width:350px;"/></td>
		</tr>
		<tr>
            <td class="altbg1" width="20%"><b>糗事审核通过邮件内容:</td>
            <td class="altbg2" width="50%"><textarea type="text" name="smtpbody" style="width:500px;height:100px;"><?php echo C('smtpbody');?></textarea></td>
			<td>
				 * {username} 代表用户名<br/>
				&nbsp;&nbsp;&nbsp;{time} 代表当前时间
			</td>
		</tr>
		<tr>
            <td class="altbg1" width="20%"><b>注册时发送邮件验证并验证后才能登录:</td>
             <td class="altbg2" colspan="2">
				<input type="radio" value="1" name="regemail"
					<?php $regemail = C('regemail');if($regemail) echo 'checked'; ?>
				/>是&nbsp;&nbsp;&nbsp;
				<input type="radio" value="0" name="regemail"
				<?php if(!$regemail) echo 'checked'; ?>
				/>否
			</td>
        </tr>
		<tr>
            <td class="altbg1" width="20%"><b>注册时邮件验证标题:</td>
            <td class="altbg2" colspan="2"><input type="text" value="<?php echo C('regtitle');?>" name="regtitle" style="width:350px;"/></td>
		</tr>
		<tr>
            <td class="altbg1" width="20%"><b>注册时邮件验证内容:</td>
            <td class="altbg2" width="50%"><textarea type="text" name="regcontent" style="width:500px;height:100px;"><?php echo C('regcontent');?></textarea></td>
			<td>
				 * {username} 代表用户名<br/>
				&nbsp;&nbsp;&nbsp;{time} 代表当前时间<br/>
				&nbsp;&nbsp;&nbsp;{code} 代表验证代码
			</td>
		</tr>
		<tr>
            <td class="altbg1" width="20%"><b>找回密码时邮件验证标题:</td>
            <td class="altbg2" colspan="2"><input type="text" value="<?php echo C('fetchtitle');?>" name="fetchtitle" style="width:350px;"/></td>
		</tr>
		<tr>
            <td class="altbg1" width="20%"><b>找回密码时邮件验证内容:</td>
            <td class="altbg2" width="50%"><textarea type="text" name="fetchcontent" style="width:500px;height:100px;"><?php echo C('fetchcontent');?></textarea></td>
			<td>
				 * {username} 代表用户名<br/>
				&nbsp;&nbsp;&nbsp;{time} 代表当前时间<br/>
				&nbsp;&nbsp;&nbsp;{code} 代表验证代码
			</td>
		</tr>
	</table>
    <br/>
    <center><input type="submit" class="button" value="提 交"></center><br>
</form>
<br>
					<div style="CLEAR: both; MARGIN: 5px auto; TEXT-ALIGN: center"><A href="http://shop106923367.taobao.com" target="_blank">@2012-2013 静静传媒</A></div>
				</tr>
			</tbody>
		</table>
	</body>
</html>