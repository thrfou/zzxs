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
	$(function(){
		$("#quanxuan").click(function(){
			$("[type='checkbox']").attr("checked",'true');
			$(".quxiao").removeAttr("checked");
		});
		$("#quxiao").click(function(){
			$("[type='checkbox']").removeAttr("checked");
			$(".quxiao").attr("checked",'true');
		});
	});
</script>
	<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
	  <div style="float:left;"><a href="<?php echo U('Index/stat');?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;数据库管理</div>
	</div>
	<table cellspacing="1" cellpadding="4" width="100%" align="center" style="border: 0 none !important; border-collapse: separate !important;empty-cells: show;margin-bottom: 0px;">
		<tr class="header" align="center">
			<td width="10%" class="center">选择</td>
			<td width="20%" class="center">数据表名称</td>
			<td  width="15%" class="center">数据表类型</td>
			<td  width="15%" class="center">数据表字符集</td>
			<td  width="15%" class="center">数据表记录数</td>
			<td  width="15%" class="center">数据表碎片</td>
			<td  width="10%" class="center">大小</td>
		</tr>
	</table>
<form action="" method="post" id="myform" name="myform">
	<ul id="list">
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="list-style:none;">
				<table  id="table1" cellspacing="1" cellpadding="4" width="100%" align="center" style="border: 0 none !important; border-collapse: separate !important;empty-cells: show;margin-bottom: 0px;"> 
					<tr align="center" class="smalltxt">
						<td width="10%" class="altbg1 center"><input type="checkbox" name="tables[]" value="<?php echo ($vo["Name"]); ?>"/></td>
						<td width="20%" class="altbg2 center"><?php echo ($vo["Name"]); ?></td>
						<td width="15%" class="altbg1 center"><?php echo ($vo["Engine"]); ?></td>
						<td width="15%" class="altbg2 center"><?php echo ($vo["Collation"]); ?></td>
						<td width="15%" class="altbg1 center"><?php echo ($vo["Rows"]); ?></td>
						<td width="15%" class="altbg2 center"><?php echo (getfilesize($vo["Data_free"])); ?></td>
						<td width="10%" class="altbg1 center"><?php echo (getfilesize($vo["Data_length"])); ?></td>
					</tr>
				</table>
			</li><?php endforeach; endif; else: echo "" ;endif; ?>	
	</ul>
	<table cellspacing="1" cellpadding="4" width="100%" align="center" style="border: 0 none !important; border-collapse: separate !important;empty-cells: show;margin-bottom: 0px;">
		<tr class="header" align="center">
			<td width="15%" class="center">
				<input type="checkbox" id="quanxuan" />全选&nbsp;/&nbsp;
				<input type="checkbox" id="quxiao" class="quxiao"/>全不选
			</td>
			<input type="hidden" name="option" value="" id="option"/>
			<td width="10%" class="center">
				<input type="button" class="button" value="修 复" onclick="myform.action='<?php echo U('Data/option');?>';$('#option').val('repair');$('#myform').submit();">
			</td>
			<td width="10%" class="center">
				<input type="button" class="button" value="优 化" onclick="myform.action='<?php echo U('Data/option');?>';$('#option').val('optimize');$('#myform').submit();">
			</td>
			<td width="10%" class="center">
				<input type="button" class="button" value="检 查" onclick="myform.action='<?php echo U('Data/option');?>';$('#option').val('check');$('#myform').submit();">
			</td>
			<td width="10%" class="center">
				<input type="button" class="button" value="分 析" onclick="myform.action='<?php echo U('Data/option');?>';$('#option').val('analyze');$('#myform').submit();">
			</td>
			<td width="45%" style="text-align:right">数据库大小：<font color="red"><?php echo (getfilesize($total)); ?></font></td>
		</tr>
	</table>
</form>	
<br/>
					<div style="CLEAR: both; MARGIN: 5px auto; TEXT-ALIGN: center"><A href="http://shop106923367.taobao.com" target="_blank">@2012-2013 静静传媒</A></div>
				</tr>
			</tbody>
		</table>
	</body>
</html>