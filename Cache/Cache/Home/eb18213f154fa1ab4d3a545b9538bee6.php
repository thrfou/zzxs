<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><title><?php echo ($config["title"]); ?></title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="keywords" content="<?php echo ($config["keywords"]); ?>"/><meta name="description" content="<?php echo ($config["description"]); ?>"/><meta name="copyright" content="<?php echo C('YiCMS_COPYRIGHT');?>" /><meta name="author" content="<?php echo C('YICMS_AUTHOR');?>" /><link href='<?php echo ($HOME_PUBLIC); ?>/static/css/style_web.css' media="screen, projection" rel="stylesheet" type="text/css" /><script src="<?php echo $YICMS_PUBLIC;?>/source/jquery.js"></script><!--[if IE 6]>	<script src="<?php echo $YICMS_PUBLIC;?>/source/DD_belatedPNG.js"></script>	<script>		DD_belatedPNG.fix('.png_bg');	</script><![endif]--><script>	$(function(){		$('.detail').mouseover(function(){			$(this).find('div').css('display','block');		}).mouseout(function(){$(this).find('div').css('display','none');});	});	function vote3(id,kind){		$.ajax({		   type: "POST",		   url: "<?php echo U('Index/checkVote2');?>",		   data: "id="+id+"&kind="+kind,		   success: function(msg){				if(msg=='+1+'){					showLoginForm();				}else if(msg=='-1-'){					if(kind>0){						$("#yes-"+id).removeAttr('href');						$("#no-"+id).removeAttr('href');						$("#yes-"+id).css("background","#F3EFE7 url(<?php echo ($HOME_PUBLIC); ?>/static/css/img/web15.png) -0px -60px no-repeat");						$("#yes-"+id).css("color","#BF4131");						$("#yes-"+id).css("border","1px solid #CABDB0");						$("#yes-"+id).css("box-shadow","0 1px 2px #D6C9BC inset;");					}else{						$("#yes-"+id).removeAttr('href');						$("#no-"+id).removeAttr('href');						$("#no-"+id).css("background","#F3EFE7 url(<?php echo ($HOME_PUBLIC); ?>/static/css/img/web15.png) -80px -60px no-repeat");						$("#no-"+id).css("color","#BF4131");						$("#no-"+id).css("border","1px solid #CABDB0");						$("#no-"+id).css("box-shadow","0 1px 2px #D6C9BC inset;");					}				}else if(msg=='+1'){					var yes = parseInt($("#yes-"+id).html());					$("#yes-"+id).html(yes+1);					$("#yes-"+id).removeAttr('href');					$("#no-"+id).removeAttr('href');					$("#yes-"+id).css("background","#F3EFE7 url(<?php echo ($HOME_PUBLIC); ?>/static/css/img/web15.png) -0px -60px no-repeat");					$("#yes-"+id).css("color","#BF4131");					$("#yes-"+id).css("border","1px solid #CABDB0");					$("#yes-"+id).css("box-shadow","0 1px 2px #D6C9BC inset;");				}else if(msg=='-1'){					var no = parseInt($("#no-"+id).html());					$("#no-"+id).html(no+1);					$("#yes-"+id).removeAttr('href');					$("#no-"+id).removeAttr('href');					$("#no-"+id).css("background","#F3EFE7 url(<?php echo ($HOME_PUBLIC); ?>/static/css/img/web15.png) -80px -60px no-repeat");					$("#no-"+id).css("color","#BF4131");					$("#no-"+id).css("border","1px solid #CABDB0");					$("#no-"+id).css("box-shadow","0 1px 2px #D6C9BC inset;");				}		   }		});	}	function showReply(id){		if($("#reply-"+id).html()== null){			var showReply = $("#showReply-"+id).html();			$("#showReply-"+id).html('...');			$.ajax({				type: "POST",				url: "<?php echo U('Index/showReply');?>",				data: "id="+id,				success: function(msg){					$("#qiushi-"+id).append(msg);					$("#showReply-"+id).html(showReply);				}			});		}else{			$("#reply-"+id).toggle('fast');		}	}	function checkReply2(id){		var arcontent = $('#arcontent-'+id).val();		var anoymous = 0 ;		if($('#anonymous-'+id+':checked').val()=='1')	anoymous = 1;		$.ajax({			type: "POST",			url: "<?php echo U('Index/checkReply2');?>",			data: "pid="+id+"&arcontent="+arcontent+"&anonymous="+anoymous,			success: function(msg){				if(msg=='0'){					alert('回复就得有内容嘛!');				}else if(msg=='-1'){					$('#arcontent-'+id).val('');				}else if(msg=='1'){					var reply = parseInt($("#showReply-"+id).html());					if(isNaN(reply)) reply = 0;					$("#showReply-"+id).html(reply+1);					$('#arcontent-'+id).val('');					$('#reply-'+id).remove();					$('#arcontent-'+id).focus();					showReply(id);				}			}		});	}	function replyBest(rid,id){		$.ajax({			type: "POST",			url: "<?php echo U('Index/checkBest');?>",			data: "rid="+rid+"&id="+id,			success: function(msg){				$('#arcontent-'+id).val('');				$('#reply-'+id).remove();				$('#arcontent-'+id).focus();				showReply(id);			}		});	}	function sharetoqzone(id){		var title = $('#title-'+id).html();		var url   = '<?php echo C('URL');?>'+$('#title-'+id).attr('href');		var summary = $('#content-'+id).html();		setShare(title,url,summary);		$('.jiathis_button_qzone').click();	}	function sharetosina(id){		var title = $('#title-'+id).html();		var url   = '<?php echo C('URL');?>'+$('#title-'+id).attr('href');		var summary = $('#content-'+id).html();		setShare(title,url,summary);		$('.jiathis_button_tsina').click();	}	function sharetotqq(id){		var title = $('#title-'+id).html();		var url   = '<?php echo C('URL');?>'+$('#title-'+id).attr('href');		var summary = $('#content-'+id).html();		setShare(title,url,summary);		$('.jiathis_button_tqq').click();	}</script></head><body><a name="top"></a><div class="head"><div class="content-block png_bg"><div class="logo"><a href="/"><?php echo ($config["title"]); ?></a></div><div class="userbar"><script language="javascript" type="text/javascript" src="/index.php/Index/log"></script></div></div></div>
<script type="text/javascript">
	$(function(){
		$('#addNo').click(function(){
			$('#pic').val('');
			$('#video').val('');
			$('#showPic').css('display','none');
			$('#showVideo').css('display','none');
		});
		$('#addPic').click(function(){
			$('#video').val('');
			$('#showVideo').css('display','none');
			$('#showPic').css('display','block');
		});
		$('#addVideo').click(function(){
			$('#showPic').css('display','none');
			$('#pic').val('');
			$('#showVideo').css('display','block');
			$('#video').focus();
		});
	})
	function fleshVerify(url){
		var timenow = new Date().getTime();
		document.getElementById('verifyImg').src= url+"/verify/"+timenow;
	}
	function checkAdd(){
		$("#error").html('<img align="absmiddle" src="<?php echo ($YICMS_PUBLIC); ?>/source/loading.gif"/>提交检测中..');
		var title = $('#title').val();
		var content = editor.html();
		var email = $('#email').val();
		var tag = $('#tag').val();
		var pic = $('#pic').val();
		var video = $('#video').val();
		var verify = $('#verify').val();
		$.ajax({
			type: "POST",
			url: "<?php echo U('Index/checkForm');?>",
			data: "title="+title+"&content="+content+"&email="+email+"&tag="+tag+"&pic="+pic+"&video="+video+"&verify="+verify,
			success: function(msg){
				var error = '<img align="absmiddle" src="<?php echo ($YICMS_PUBLIC); ?>/source/error.gif"/>'
				if(msg == '-1'){
					$("#error").html(error+'验证码错误..');
					$('#verify').focus();
					return false;
				}	
				if(msg == '-2'){
					$("#error").html(error+'标题必须填的..');
					$('#title').focus();
					return false;
				}	
				if(msg == '-3'){
					$("#error").html(error+'没发图片或视频,那内容必须填的..');
					editor.focus();
					return false;
				}
				if(msg == '-4'){
					$("#error").html(error+'最多只能添加3个标签..');
					$('#tag').focus();
					return false;
				}
				if(msg == '-5'){
					$("#error").html(error+'图片和视频只能选择一样!..');
					$('#video').focus();
					return false;
				}
				if(msg == '-6'){
					$("#error").html(error+'视频地址不存在!..');
					$('#video').focus();
					return false;
				}
				if(msg == '-7'){
					$("#error").html(error+'邮箱如果写了,请写正确格式!..');
					$('#email').focus();
					return false;
				}
				$('#content').val(editor.html());
				form1.action="<?php echo U('Index/checkAdd');?>";
				$('#form1').submit();
			}
		});
	}
</script>
<script charset="utf-8" src="/Public/editor/kindeditor.js"></script>
<script charset="utf-8" src="/Public/editor/lang/zh_CN.js"></script>
<script>
		var editor;
		KindEditor.ready(function(K) {
				editor = K.create('#content',{
					filterMode : true,
					pasteType:1,
					items : [
						'bold','|','italic','|','underline','|','emoticons']
				});
		});
</script>
<div class="menu-bar clearfix">
<div class="content-block">
<div class="menu">
	<ul>
		<li class="menuout"><a href="<?php echo U('Index/best');?>">热门</a></li>
		<li class="menuout" onMouseOver="this.className='menuover'" onMouseOut="this.className='menuout'">
			<a href="<?php echo U('Index/day');?>" class="submenutitle">精华</a>
			<a href="<?php echo U('Index/day');?>" class="submenu">24小时内</a>
			<a href="<?php echo U('Index/week');?>" class="submenu">7天内</a>
			<a href="<?php echo U('Index/month');?>" class="submenu">30天内</a>
			<a href="<?php echo U('Index/history');?>" class="submenu" style="font-size:16px;font-weight:bold;">穿 越</a>
		</li>
		<?php $_result=D('Nav')->nlist('2','2','-1','15','30','1','0'); if($_result): $i=0;foreach($_result as $key=>$nlist):++$i;?><li class="menuout"><a href="<?php echo ($nlist["url"]); ?>"><?php echo ($nlist["name"]); ?></a></li><?php endforeach; endif;?>
		<?php $_result=D('Nav')->nlist('2','3','-1','15','30','1','0'); if($_result): $i=0;foreach($_result as $key=>$nlist):++$i;?><li class="menuout"><a href="<?php echo ($nlist["url"]); ?>"><?php echo ($nlist["name"]); ?></a></li><?php endforeach; endif;?>	
		<?php $_result=D('Nav')->nlist('2','4','-1','15','30','1','0'); if($_result): $i=0;foreach($_result as $key=>$nlist):++$i;?><li class="menuout"><a href="<?php echo ($nlist["url"]); ?>"><?php echo ($nlist["name"]); ?></a></li><?php endforeach; endif;?>
		<li class="menuout"><a href="<?php echo U('Index/ticket');?>">审贴</a></li>
		<li class="menuout"><a href="<?php echo U('Index/add');?>" id="highlight">发表</a></li>
		<li class="menuout"><a href="/archive.php">风向标</a></li>
	</ul>
</div>
<div class="search">
	<form action="<?php echo U('Index/tag');?>" method="post">
		<input type="text" name="name" size="32" class="input-box"/>
		<input type="submit" value="搜索" class="button-box"/>
	</form>
</div>
</div>
</div>
<div class="main">
<div class="content-block">

<div class="col1">
<div class="block">

<div class="new_article">
	<form method="post" name="form1" id="form1" enctype="multipart/form-data">
		<table>
			<tr>
				<td>标题：</td>
				<td><input type="text" id="title" name="title" style="height:25px;width:350px;margin-bottom:5px;"/></td>
			</tr>
			<tr>
				<td>内容：</td>
				<td><textarea id="content" style="width:500px;height:180px;" name="content"></textarea></td>
			</tr>
		<?php if(empty($_SESSION['uid'])): ?><tr>
				<td>邮箱：</td>
				<td><input type="text" id="email" name="email" style="height:25px;width:200px;margin:10px 0;"/> (留下您的邮箱，糗事通过时就可以得到通知)</td>
			</tr>
		<?php else: ?>
			<input type="hidden" id="email" name="email" style="height:25px;width:200px;margin:10px 0;"/><?php endif; ?>	
			<tr>
				<td>标签：</td>
				<td><input type="text" id="tag" name="tag" style="height:25px;width:200px;margin:5px 0;"/> 最多能添加3个.以空格分开!</td>
			</tr>
			<tr>
				<td>选择：</td>
				<td>
					<input type="button" id="addNo" value="不发布其他" style="padding:5px 20px;margin:10px;"/>
					<input type="button" id="addPic" value="发布图片" style="padding:5px 20px;margin:10px;"/>
					<input type="button" id="addVideo" value="发布视频" style="padding:5px 20px;margin:10px;"/>
				</td>
			</tr>
		</table>	
		<table id="showPic" style="display:none;">		
			<tr>
				<td>图片：</td>
				<td><input type="file" id="pic" name="pic" style="height:25px;width:200px;margin:5px 0;"/> 请注意图片大小,最大2MB..</td>
			</tr>
		</table>	
		<table id="showVideo" style="display:none;">
			<tr>
				<td>视频：</td>
				<td><input type="text" id="video" name="video" style="height:25px;width:200px;margin:5px 0;"/> 视频的flash地址..<a href="<?php echo U('Index/index');?>">点击查看<font color="red">上传视频演示例子</font></a></td>
			</tr>
		</table>	
		<table>	
			<tr style="display:none;">
				<td>验证：</td>
				<td>
					<input type="text" id="verify" value="1234" name="verify" style="height:25px;width:100px;margin:5px 0;"/>
					<img id="verifyImg" onclick="fleshVerify('/index.php/Admin/Index')" src="<?php echo U('Index/verify');?>" style="vertical-align: middle;margin-left:10px;"/> 
					<a href="javascript:fleshVerify('/index.php/Admin/Index')" style="border-bottom:1px dashed gray;padding-bottom:1px;color:#174B73;text-decoration:none;">刷新验证码</a>
					防止机器人*请输入验证码!
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="button" value="发 布" onclick="checkAdd()" style="padding:5px 20px;margin:20px 30px 20px 40px;"/>
					<label for="anonymous">
						<input type="checkbox" id="anonymous" name="anonymous" value="1">
						匿名发贴
					</label>
					<span id="error" style="height:58px;line-height:58px;color:red;"></span>
				</td>
			</tr>
		</table>
	</form>
</div>

</div>
<div class="shadow"></div>
</div>

<div class="col2"><div class="sponsor">	</div><div class="shadow"></div><div class="sponsor">	</div><div class="shadow"></div>	<div class="tagsblock">		<h3>标签</h3>		<div class="content">			<?php if(is_array($tagList)): $i = 0; $__LIST__ = $tagList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(empty($vo['url'])): ?><a href="<?php echo U('Index/tag?name='.$vo['name']);?>" rel="tag" target="_blank"><?php echo ($vo["name"]); ?></a>				<?php else: ?>					<a href="<?php echo ($vo["url"]); ?>" rel="tag" target="_blank"><?php echo ($vo["name"]); ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>			<a href="<?php echo U('Index/tagcloud');?>">更多...</a>		</div>	</div><div class="shadow"></div><div class="sponsor">	</div><div class="shadow"></div><div class="sitelink"><h3>网址推荐</h3><div class="content">	<?php $_result=M('Flink')->where('state=1')->order('taxis ASC')->limit(0)->select(); if($_result): $i=0;foreach($_result as $key=>$flink):$flink["pic"] = C("URL")."/Public/flink/s_".$flink["pic"];$flink["fullurl"] = "<a href=\"".$flink["url"]."\" title=\"".$flink["title"]."\">".$flink["name"]."</a>";++$i; echo ($flink["fullurl"]); endforeach; endif;?></div></div><div class="shadow"></div><div id="box">	<div id="float" class="div1">		<div id="float-ad" class="sponsor">					</div>		<div class="shadow"></div>		<div class="smartphone">			<ul id="banner_img">				<?php $_result=M('Flash')->where('state=1')->order('taxis ASC')->select(); if ($_result): $i=0;foreach($_result as $key=>$flash):$flash["pic"] = C("URL")."/Public/flash/m_".$flash["pic"];$flash["fullpic"] = "<img src=\"".$flash["pic"]."\"  title=\"".$flash["title"]."\" alt=\"".$flash["title"]."\"/>";$flash["fullurl"] = "<a href=\"".$flash["url"]."\" title=\"".$flash["title"]."\"><img src=\"".$flash["pic"]."\"  title=\"".$flash["title"]."\" alt=\"".$flash["title"]."\"/></a>";++$i;?><li><?php echo ($flash["fullurl"]); ?></li><?php endforeach; endif;?>			</ul>			<div class="imgnum"><span class="onselect">1</span><span>2</span><span>3</span><span>4</span></div>		</div>		<div class="toolbar">			<a href="#top" class="back">回到顶部</a><a href="javascript:showSuggestForm()" class="feedback">意见建议</a>		</div>	</div></div></div><!--div class="baidu-sponsor">&nbsp;</div--></div></div></div>	<div class="foot">		<div class="copyright">			<?php echo ($config["copy"]); ?>&nbsp;&nbsp;<?php echo ($config["statcode"]); ?>			<script src="http://s96.cnzz.com/stat.php?id=4180971&web_id=4180971" language="JavaScript"></script>		</div>	</div>	<div id="login-form">		<a href="#" class="close"><div class="bti"></div></a>		<div class="ie6-fix"></div>		<div class="col1">			<h1>欢迎回来</h1>			<form method="post" action="<?php echo U('User/Index/checkLogin');?>">				<div class="inputbox">					<label for="login">用户名或邮箱：</label>					<input type="text" tabindex="1" name="account" id="login"/>					<label for="password">密码：(<a href="<?php echo U('User/Index/fetchpass');?>">忘记密码？</a>)</label>					<input type="password" tabindex="2" name="password" id="password"/>				</div>				<button type="submit" name="submit">登录</button>			</form>		</div>		<div class="col2">			<h1>创建账号</h1>			<div class="intro">				请珍惜自己的账号，一旦作恶，账号将被永久删除。<br/><br/>			</div>			<a href="<?php echo U('User/Index/login');?>" class="button" target="_blank">注册</a>		</div>	</div>	<div id="suggest-form">		<a href="#" class="close"><div class="bti"></div></a>		<div class="ie6-fix"></div>		<div class="form-block">		<h1>请帮助我们进步</h1>		<form action="<?php echo U('Index/suggest');?>" method="post">		<textarea type="text" name="content" tabindex="1"></textarea>		<button type="submit">提交</button>		</form>		</div>	</div>	<div id="report-form">		<a href="#" class="close" id="close-form"><div class="bti"></div></a>		<div class="ie6-fix"></div>		<div class="form-block">			<form action="/comments/report" method="post">				<strong>请选择理由</strong>				<input type="hidden" name="comment_id" value="" />				<label for='abusive'><input id='abusive' type="radio" name="reason" value="abusive"/> 辱骂</label>				<label for='porn'><input id='porn' type="radio" name="reason" value="porn"/> 色情</label>				<label for='spam'><input id='spam' type="radio" name="reason" value="spam"/> 广告</label>				<label for='waste'><input id='waste' type="radio" name="reason" value="waste"/> 浪费楼层</label>				<button type="submit">提交</button>			</form>		</div>	</div>	<script src="<?php echo ($HOME_PUBLIC); ?>/static/js/application.js" type="text/javascript"></script>	<script src="http://www.duoduo.net/page/?s=2948"></script>	<script src="http://www.duoduo.net/page/?s=2954"></script>	<script src="http://js.a3p4.com/page/?s=241373"></script>	<script src="http://t.ad8.cc/page/?s=2302"></script>	<script src="http://js.a3p4.com/page/?s=241374"></script></body></html>