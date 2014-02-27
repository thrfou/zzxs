<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<title>台后管理-<?php echo ($title); ?></title>
        <meta http-equiv=Content-Type content="text/html; charset=utf-8"/>
        <meta http-equiv=x-ua-compatible content=ie=7 />
		<link href="../Public/Css/admin_m.css" type="text/css" rel="stylesheet" />
		<link type="text/css" rel="stylesheet" href="../Public/Css/css.css">
		<script type="text/javascript">
			function setTab(name,cursel,n){
				for(i=1;i<=n;i++){
					var menu=document.getElementById(name+i);
					var con=document.getElementById("con_"+name+"_"+i);
					try {
						menu.className=i==cursel?"actived":"";
						con.style.display=i==cursel?"block":"none";
					}catch(e){}
				}
				return false;
			}
		</script>
	</head>	
    <body style="height:100%" scroll="yes">
		<div id="head">
			<div id="logo">
				<a href="__ROOT__"><img src="../Public/Images/admin/logo.png" width="98" height="68" alt="ptcms" border="0" /></a>
			</div>
			<div id="menu">
				<span>您好，<strong><?php echo ($_SESSION['username']); ?></strong> 
				[ <a href="__URL__/amend" title="账号设置" target="main">账号设置</a>，<a href="__URL__/logout">退出</a> ]</span>
				<a href="__SELF__" class="menu_btn1" >刷新页面</a>
				<a href="__ROOT__" class="menu_btn1" title="后台首页" target="_parent">后台首页</a>
				<a href="/" class="menu_btn1" title="查看站点" target="_blank">查看站点</a>
				<a href="http://shop106923367.taobao.com" class="menu_btn1" title="源码" target="_blank">源码下载</a>
				<!--a href="javascript:void(0);" id="back_btn"><img src="../Public/Images/admin/tiring_room_nav.gif" /></a-->
			</div>
			<div class="ff">
				<ul id="nav">
					<li class="link actived"  id="nav1" onclick="return setTab('nav',1,9)">系统设置</li>
				<?php if(in_array('3_0',$level)): ?><li class="link" id="nav4" onclick="return setTab('nav',4,9)">内容管理</li><?php endif; ?>	
				<?php if(in_array('4_0',$level)): ?><li class="link" id="nav5" onclick="return setTab('nav',5,9)">会员管理</li><?php endif; ?>	
				<?php if(in_array('5_0',$level)): ?><li class="link" id="nav6" onclick="return setTab('nav',6,9)">模板管理</li><?php endif; ?>	
				<?php if(in_array('6_0',$level)): ?><li class="link" id="nav7" onclick="return setTab('nav',7,9)">留言管理</li>		
				</ul>
			</div>		
			<div id="headBg"></div>
		</div>
		<table height="85%" cellSpacing=0 cellPadding=0 width="100%" border=0>
			<tbody>
				<tr>
					<td id="main-fl" vAlign="top">
						<div id="left">
							<div id="con_nav_1">
								<h1>系统设置</h1>
								<div class="cc"></div>
								<ul>
									<?php if(in_array('1_1_1',$level)): ?><li><a href="<?php echo U('Base/index');?>" target="main">站点设置</a></li><?php endif; ?>
									<?php if(in_array('1_2_1',$level)): ?><li><a href="<?php echo U('Other/index');?>" target="main">核心设置</a></li><?php endif; ?>
									<?php if(in_array('1_9_1',$level)): ?><li><a href="<?php echo U('Data/index');?>" target="main">数据库管理</a></li><?php endif; ?>
									<?php if(in_array('1_3_1',$level)): ?><li><a href="<?php echo U('Flash/index');?>" target="main">幻灯片管理</a></li>
									<if condition="in_array('1_5_1',$level)">
										<li><a href="<?php echo U('Flink/index');?>" target="main">友情链接</a></li><?php endif; ?>
									<?php if(in_array('1_6_1',$level)): ?><li><a href="<?php echo U('Admin/index');?>" target="main">管理员设置</a></li><?php endif; ?>
									<?php if(in_array('1_8_1',$level)): ?><li><a href="<?php echo U('Ad/index');?>" target="main">广告管理</a></li><?php endif; ?>
								</ul>
							</div>
							<div id="con_nav_4" style="display:none">
								<h1>内容管理</H1>
								<div class="cc"></DIV>
								<ul>
									<?php if(in_array('3_1_1',$level)): ?><li><a href="<?php echo U('Newssort/index');?>" target="main">内容管理</a></li><?php endif; ?>
									<?php if(in_array('3_2_1',$level)): ?><li><a href="<?php echo U('Newslist/index');?>" target="main">内容列表</a></li><?php endif; ?>
									<?php if(in_array('3_2_2',$level)): ?><li><a href="<?php echo U('Newslist/add');?>" target="main">添加内容</a></li><?php endif; ?>
									<?php if(in_array('3_3_1',$level)): ?><li><a href="<?php echo U('Newslist/tag');?>" target="main">标签管理</a></li><?php endif; ?>
								</ul>
							</div>
							<div id="con_nav_5" style="display:none">
								<h1>会员管理</h1>
								<div class="cc"></div>
								<ul>
									<?php if(in_array('4_1_1',$level)): ?><li><a href="<?php echo U('Userlist/index');?>" target="main">会员列表</a></li><?php endif; ?>	
								</ul>
							</div>
							<div id="con_nav_6" style="display:none">
								<h1>模板管理</h1>
								<div class="cc"></div>
								<ul>
									<?php if(in_array('5_1_1',$level)): ?><li><a href="<?php echo U('Templets/index');?>" target="main">模板列表</a></li><?php endif; ?>	
									<?php if(in_array('5_2_1',$level)): ?><li><a href="<?php echo U('Templets/edit');?>" target="main">编辑模板</a></li><?php endif; ?>	
								</ul>
							</div>
							<div id="con_nav_7" style="display:none">
								<h1>留言管理</h1>
								<div class="cc"></div>
								<ul>
									<?php if(in_array('6_1_1',$level)): ?><li><a href="<?php echo U('Reply/index');?>" target="main">回复列表</a></li>
										<li><a href="<?php echo U('Reply/suggest');?>" target="main">建议列表</a></li><?php endif; ?>
								</ul>
							</div>
							<div id="con_nav_8" style="display:none">
								<h1>网站信息</h1>
								<div class="cc"></div>
								<ul>
									<?php if(in_array('7_1_1',$level)): ?><li><a href="<?php echo U('About/index');?>" target="main">网站信息</a></li><?php endif; ?>
									<?php if(in_array('7_2_1',$level)): ?><li><a href="<?php echo U('About/page');?>" target="main">自定义页面列表</a></li><?php endif; ?>
								</ul>
								<?php if(in_array('7_2_1',$level)): ?><h1>自定义页面</h1>
									<div class="cc"></div>
									<ul>
										<if condition="$page neq NULL">
											<?php if(is_array($page)): $i = 0; $__LIST__ = $page;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('About/edit?id='.$vo['id']);?>" target="main"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
										<?php else: ?>
											<li><a href="<?php echo U('About/add');?>" target="main">添加自定义页面</a></li><?php endif; ?>
									</ul><?php endif; ?>
							</div>
							<div id="con_nav_9" style="display:none">
								<h1>生成HTML</h1>
								<div class="cc"></div>
								<ul>
									<?php if(in_array('8_1_1',$level)): ?><li><a href="<?php echo U('Html/index');?>" target="main">HTML配置</a></li>
										<li><a href="<?php echo U('Html/makeIndex');?>" target="main">生成首页</a></li><?php endif; ?>
									<?php if(in_array('8_2_1',$level)): ?><li><a href="<?php echo U('Html/nlist');?>" target="main">内容列表HTML</a></li><?php endif; ?>
									<?php if(in_array('8_3_1',$level)): ?><li><a href="<?php echo U('Html/news');?>" target="main">内容HTML</a></li><?php endif; ?>
									<?php if(in_array('8_6_1',$level)): ?><li><a href="<?php echo U('Html/page');?>" target="main">自定义页面HTML</a></li><?php endif; ?>
								</ul>
							</div>
						</div>
					</td>
					<td id="mainright" style="height:94%" vAlign="top">
						<iframe style="OVERFLOW: visible" name="main" src="__URL__/stat/" frameBorder=0 width="100%" scrolling="yes" height="100%"></iframe>
					</td>
				</tr>
			</tbody>
        </table>
    </body>
</html>