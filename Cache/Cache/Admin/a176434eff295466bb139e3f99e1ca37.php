<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
	<TABLE class="tableborder" cellSpacing="1" cellPadding="4" width="100%" align="center">
		<TR class="header"><TD colSpan="12"><DIV class="NavaL ndt"><a href="<?php echo U('Html/clearCache');?>" target="main" style="color:red;padding:1px 15px;border:1px solid blue">清空缓存</a></DIV></TD></TR>
	</TABLE>
	<TABLE class="tableborder" cellSpacing="1" cellPadding="4" width="100%" align="center">
	  <TBODY>
			<TR>
				<TD style="PADDING-LEFT:10px">使用此版本请&nbsp;&nbsp;[&nbsp;<A style="color:red" href="/index.php/Admin/Flink/index" target="_blank"><u>添加友情链接</u></A>&nbsp;]</TD>
				<TD>网站根目录：<?php echo ($info["root"]); ?></TD>
			</TR>
			<TR>
				<TD style="PADDING-LEFT:10px">MySQL版本：<?php echo (substr($info["mysql"],0,14)); ?></TD>
				<TD>数据库已使用：<?php echo (getfilesize($info["dataSize"])); ?></TD>
			</TR>
			<TR>
				<TD style="PADDING-LEFT:10px">服务器类型：<?php echo ($info["soft"]); ?></TD>
				<TD>主机名：<?php echo ($info["name"]); ?> (<?php echo ($info["addr"]); ?>:<?php echo ($info["port"]); ?>) </TD>
			</TR>
			<TR>
			</TR>
		</TBODY>
	</TABLE>
	<DIV class="c"></DIV>
	<TABLE class="tableborder" cellSpacing=1 cellPadding=4 width="100%" align="center">
	  <TBODY>
	  <TR class="header">
		<TD colSpan="4"><A href="http://shop106923367.taobao.com" target="_blank">鑫尚科技</A></TD></TR>
	  <TR class="altbg2">
		<TD><A href="http://shop106923367.taobao.com" target="_blank">源码下载</A></TD>
		<TD><A href="http://shop106923367.taobao.com" target="_blank">源码资源</A></TD>
		<TD><A href="http://shop106923367.taobao.com" target="_blank">精品源码</A></TD>
		<TD><A href="http://shop106923367.taobao.com" target="_blank">营销软件</A></TD>
	  </TR>
	  </TBODY>
	</TABLE>
					<div style="CLEAR: both; MARGIN: 5px auto; TEXT-ALIGN: center"><A href="http://shop106923367.taobao.com" target="_blank">@2012-2013 静静传媒</A></div>
				</tr>
			</tbody>
		</table>
	</body>
</html>