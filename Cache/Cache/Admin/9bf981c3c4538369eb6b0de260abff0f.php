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
	  <div style="float:left;"><a href="<?php echo U('Index/stat');?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;友情链接列表&nbsp;&raquo;&nbsp;<a href="<?php echo U('Flink/add');?>" style="color:red;font-weight:bold;">添加友情链接</a></div>
	</div>
	<table cellspacing="1" cellpadding="4" width="100%" align="center" style="border: 0 none !important; border-collapse: separate !important;empty-cells: show;margin-bottom: 0px;">
		<tr class="header" align="center">
			<td width="5%" class="center">排序</td>
			<td width="10%" class="center">是否已添加</td>
			<td  width="10%" class="center">网站名称</td>
			<td  width="20%" class="center">网站地址</td>
			<td  width="15%" class="center">网站标题</td>
			<td  width="10%" class="center">站长邮箱</td>
			<td  width="10%" class="center">站长Q Q</td>
			<td  width="5%" class="center">编辑</td>
			<td  width="5%" class="center">删除</td>
			<td  width="10%" class="center">禁止</td>
		</tr>
	</table>
    <input type="hidden" name="hiddencid" value="{$pid}"/>
	<ul id="list">
		<?php if($list != NULL): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="list-style:none;">
					<table  id="table1" cellspacing="1" cellpadding="4" width="100%" align="center" style="border: 0 none !important; border-collapse: separate !important;empty-cells: show;margin-bottom: 0px;"> 
						<tr align="center" class="smalltxt">
							<td width="5%" class="altbg1 center"><?php echo ($vo["taxis"]); ?></td>
							<td width="10%" class="altbg2 center">
								<?php if($vo["state"] == 1): ?>已添加
								<?php else: ?>
									<font color="red">等待添加</font><?php endif; ?>
							</td>
							<td width="10%" class="altbg1 center"><?php echo ($vo["name"]); ?></td>
							<td width="20%" class="altbg2 center">
								<a href="<?php echo ($vo["url"]); ?>" target="_blank"><?php echo ($vo["url"]); ?></a>
							</td>
							<td width="15%" class="altbg1 center"><?php echo ($vo["title"]); ?></td>
							<td width="10%" class="altbg1 center"><?php echo ($vo["email"]); ?></td>
							<td width="10%" class="altbg1 center"><?php echo ($vo["qq"]); ?></td>
							<td width="5%" class="altbg2 center"><a href="<?php echo U('Flink/edit?id='.$vo['id']);?>" style="background:url(../Public/Images/admin/edit.png) no-repeat center center;padding:0px 20px;">&nbsp;</a></td>
							<td width="5%" class="altbg1 center"><a href="<?php echo U('Flink/del?id='.$vo['id']);?>" onclick="return confirm('提示：您确定要删除该友情链接吗？不可恢复！')" style="background:url(../Public/Images/admin/remove.png) no-repeat center center;padding:0px 20px;">&nbsp;</a></td>
							<td width="10%" class="altbg2 center">
								<?php if($vo["state"] == 0): ?><a href="<?php echo U('Flink/stop?id='.$vo['id'].'&state=1');?>" onclick="return confirm('提示：您确定要网站前台显示吗?')" style="color:red">点击显示</a>
								<?php else: ?>
									<a href="<?php echo U('Flink/stop?id='.$vo['id'].'&state=0');?>" onclick="return confirm('提示：您确定要网站前台不显示吗?')" style="color:red">点击不显示</a><?php endif; ?>
							</td>
						</tr>
					</table>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
			<li>
				<table  id="table1" cellspacing="1" cellpadding="4" width="100%" align="center" style="border: 0 none !important; border-collapse: separate !important;empty-cells: show;margin-bottom: 0px;"> 
					<tr align="center" class="smalltxt">
						<td class="altbg1" style="text-align:center;font-weight:bold;color:#E01558;padding:10px 0px;">暂时没有友情链接!请点击上面的添加按钮添加!^_^</td>
					</tr>
				</table>
			</li><?php endif; ?>	
	</ul>
<br/>
					<div style="CLEAR: both; MARGIN: 5px auto; TEXT-ALIGN: center"><A href="http://shop106923367.taobao.com" target="_blank">@2012-2013 静静传媒</A></div>
				</tr>
			</tbody>
		</table>
	</body>
</html>