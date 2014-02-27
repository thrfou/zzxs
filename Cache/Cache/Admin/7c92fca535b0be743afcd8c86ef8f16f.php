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
<script charset="utf-8" src="/Public/editor/kindeditor.js"></script>
<script charset="utf-8" src="/Public/editor/lang/zh_CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
			var options = {
				filterMode:false
			};
            editor = K.create('#editor_id',options);
        });
</script>
<div style="width:100%; height:15px;color:#000;margin:0px 0px 10px;">
    <div style="float:left;"><a href="<?php echo U('Index/stat');?>" target="main"><b>控制面板首页</b></a>&nbsp;&raquo;&nbsp;站点设置</div>
</div>
<form action="__URL__/checkBase/" method="post" enctype="multipart/form-data">
    <table cellspacing="1" cellpadding="4" width="100%" align="center" class="tableborder">
        <tr class="header">
            <td colspan="2">站点设置</td>
        </tr>
        <tr>
            <td class="altbg1" width="40%"><b>网站名称:</b><br>
                <span class="smalltxt">网站名称，将显示在页面Title处</span></td>
            <td class="altbg2"><input type="text" value="<?php echo ($list["title"]); ?>" name="title" style="width:400px;"></td>
        </tr>
		<tr>
            <td class="altbg1" width="40%"><b>网站 logo:</b><br>
                <span class="smalltxt">LOGO在网站根目录的PUBLIC目录.<br/>LOGO高度和宽度在"系统设置->其他设置"里设置<br/><font color="red">*可不修改!</font></span>
			</td>
            <td class="altbg2">
				<img src="<?php echo ($list["logo"]); ?>" width="200" /><br/>
				<input type="file" name="logo"/>
			</td>
        </tr>
		<tr>
            <td class="altbg1" width="40%"><b>网站地址:</b><br>
                <span class="smalltxt">网站地址，即网站域名！切记加上"http://"</span></td>
            <td class="altbg2"><input type="text" value="<?php echo ($list["url"]); ?>" name="url" style="width:200px;"></td>
        </tr>
		<tr>
            <td class="altbg1" width="40%"><b>网站关键词:</b><br>
                <span class="smalltxt">	用数词来描述您的网站，用于给搜索引擎查看</span></td>
            <td class="altbg2"><textarea class="area" name="keywords" cols="48" rows="4" style="width:400px;"><?php echo ($list["keywords"]); ?></textarea></td>
        </tr>
		<tr>
            <td class="altbg1" width="40%"><b>网站描述:</b><br><span class="smalltxt">用一段话来描述您的网站，用于给搜索引擎查看</span></td>
            <td class="altbg2"><textarea class="area" name="description" cols="48" rows="4" style="width:400px;"><?php echo ($list["description"]); ?></textarea></td>
        </tr>
        <tr>
            <td class="altbg1" width="40%"><b>网站备案号:</b><br>
                <span class="smalltxt">	格式类似“京ICP证030173号”，它将显示在页面底部，没有请留空</span></td>
            <td class="altbg2"><input type="text" value="<?php echo ($list["icp"]); ?>" name="icp" style="width:400px;"></td>
        </tr>
        <tr>
            <td class="altbg1" width="40%"><b>网站统计代码:</b><br><span class="smalltxt">页面底部可以显示第三方统计，如google统计代码或者51la统计等</span></td>
            <td class="altbg2"><textarea class="area" name="statcode" cols="48" rows="4" style="width:400px;"><?php echo ($list["statcode"]); ?></textarea></td>
        </tr>
		<tr>
            <td class="altbg2" colspan="2"><b>自定义底部信息:</b>用于网站底部.<textarea id="editor_id" name="copy" style="width:85%;height:300px;"><?php echo ($list["copy"]); ?></textarea></td>
        </tr>
    </table>
    <br>
    <center><input type="submit" class="button" value="提 交"></center><br>
</form>
<br>
					<div style="CLEAR: both; MARGIN: 5px auto; TEXT-ALIGN: center"><A href="http://shop106923367.taobao.com" target="_blank">@2012-2013 静静传媒</A></div>
				</tr>
			</tbody>
		</table>
	</body>
</html>