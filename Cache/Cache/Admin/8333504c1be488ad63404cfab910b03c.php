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
	  <div style="float:left;"><a href="<?php echo U('Index/stat');?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;管理员列表&nbsp;&raquo;&nbsp;<a href="<?php echo U('Admin/add');?>" target="main"><font color="red">添加管理员</font></a></div>
	</div>
	<table cellspacing="1" cellpadding="4" width="100%" align="center" style="border: 0 none !important; border-collapse: separate !important;empty-cells: show;margin-bottom: 0px;">
		<tr class="header" align="center">
			<td  width="15%" class="center">管理员名称</td>
			<td  width="25%" class="center">管理员email</td>
			<td  width="15%" class="center">最后在线时间</td>
			<td  width="15%" class="center">最后在线IP地址</td>
			<td  width="15%" class="center">查看管理员权限</td>
			<td  width="10%" class="center">允许登录</td>
			<td  width="5%" class="center">删除</td>
		</tr>
	</table>
	<ul id="list">
		<?php if($list != NULL): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li style="list-style:none;">
					<table  id="table1" cellspacing="1" cellpadding="4" width="100%" align="center" style="border: 0 none !important; border-collapse: separate !important;empty-cells: show;margin-bottom: 0px;"> 
						<tr align="center" class="smalltxt">
							<td width="15%" class="altbg2 center"><?php echo ($vo["username"]); ?></td>
							<td width="25%" class="altbg2 center"><?php echo ($vo["email"]); ?></td>
							<td width="15%" class="altbg1 center"><?php echo (switchtime($vo["lasttime"])); ?></td>
							<td width="15%" class="altbg2 center"><a href="/index.php/Index/search/ip/<?php echo (long2ip($vo["lastip"])); ?>" target="_blank">点击查看IP所在地</a></td>
							<td width="15%" class="altbg1 center"><a href="<?php echo U('Admin/detail?id='.$vo['id']);?>">点击查看</a></td>
							<td width="10%" class="altbg2 center">
								<?php if($vo["state"] == 0): ?><a href="<?php echo U('Admin/state?id='.$vo['id'].'&state=1');?>" style="color:red;">点击允许登录</a>
								<?php else: ?>
									<a href="<?php echo U('Admin/state?id='.$vo['id'].'&state=0');?>" style="color:red;">点击禁止登录</a><?php endif; ?>
							</td>
							<td width="5%" class="altbg2 center"><a href="<?php echo U('Admin/del?id='.$vo['id']);?>" onclick="return confirm('提示：您确定要删除该管理员吗？不可恢复！建议禁止该会员登录而不删除!')" style="background:url(../Public/Images/admin/remove.png) no-repeat center center;padding:0px 20px;">&nbsp;</a></td>
						</tr>
					</table>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
			<li>
				<table  id="table1" cellspacing="1" cellpadding="4" width="100%" align="center" style="border: 0 none !important; border-collapse: separate !important;empty-cells: show;margin-bottom: 0px;"> 
					<tr align="center" class="smalltxt">
						<td class="altbg1" style="text-align:center;font-weight:bold;color:#E01558;padding:10px 0px;">暂时没有回复!^_^</td>
					</tr>
				</table>
			</li><?php endif; ?>	
	</ul>
	<div class="page"><?php echo ($page); ?></div>
<br/>
					<div style="CLEAR: both; MARGIN: 5px auto; TEXT-ALIGN: center"><A href="http://shop106923367.taobao.com" target="_blank">@2012-2013 静静传媒</A></div>
				</tr>
			</tbody>
		</table>
	</body>
</html>