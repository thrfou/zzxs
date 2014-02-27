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
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="<?php echo U('Index/stat');?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;修改广告内容</div>
</div>
<form action="<?php echo U('Ad/amend');?>" method="post">
	<input type="hidden" name="id" value="<?php echo ($list["id"]); ?>"/>
    <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
        <tr class="header">
            <td colspan="2">修改广告内容</td>
        </tr>
        <tr>
            <td class="altbg1" width="20%"><b>广告名字:</b><br><span class="smalltxt">广告的名字，广告列表的标识</span></td>
            <td class="altbg2"><input type="text" name="name" value="<?php echo ($list["name"]); ?>"/></td>
        </tr>
        <tr>
            <td class="altbg1" width="20%"><b>广告代码:</b><br><span class="smalltxt">广告的代码，可用A标签链接到本地图片，<br/>或添加远程的JS代码广告，例如百度联盟</span></td>
            <td class="altbg2">
				<textarea name="code" cols="50" rows="6"><?php echo ($list["code"]); ?></textarea>
			</td>
        </tr>  
    </table>
    <br>
    <center><input type="submit" class="button" value="修 改"></center><br>
</form>
<br>
					<div style="CLEAR: both; MARGIN: 5px auto; TEXT-ALIGN: center"><A href="http://shop106923367.taobao.com" target="_blank">@2012-2013 静静传媒</A></div>
				</tr>
			</tbody>
		</table>
	</body>
</html>