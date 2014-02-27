<?php if (!defined('THINK_PATH')) exit();?><HTML>
	<HEAD>
		<META http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<TITLE>页面提示</TITLE>
		<meta http-equiv='Refresh' content='<?php echo ($waitSecond); ?>;URL=<?php echo ($jumpUrl); ?>'/>
	</HEAD>
	<BODY bgcolor="#ECF3F9">
		<table border=0 cellpadding=0 cellspacing=0 >
			<tr><td height=134></td></tr>
		</table>
		<table width=544 height=157 border=0 cellpadding=0 cellspacing=0 align=center>
			<tr valign=middle align=middle>
				<td background="/Public/404/tz-002.gif">
					<table border=0 cellpadding=0 cellspacing=0 >
						<tr>
							<td ><img src="/Public/404/404.gif"/></td>
							<td style="padding-left:10px;padding-top:10px;font-family:微软雅黑,Verdana;">
								<?php if(isset($message)): ?><strong><?php echo ($message); echo ($waitSecond); ?>秒后将 <a href="<?php echo ($jumpUrl); ?>">跳转页面</a>！</strong>
								<?php else: ?>
									<strong><font style="color:red;"><?php echo ($error); ?></font><?php echo ($waitSecond); ?>秒后将<a href="<?php echo ($jumpUrl); ?>">跳转页面</a>！</strong><?php endif; ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</BODY>
</HTML>