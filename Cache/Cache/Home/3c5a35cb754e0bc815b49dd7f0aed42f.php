<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><title><?php echo ($config["title"]); ?></title><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><meta name="keywords" content="<?php echo ($config["keywords"]); ?>"/><meta name="description" content="<?php echo ($config["description"]); ?>"/><meta name="copyright" content="<?php echo C('YiCMS_COPYRIGHT');?>" /><meta name="author" content="<?php echo C('YICMS_AUTHOR');?>" /><link href='<?php echo ($HOME_PUBLIC); ?>/static/css/style_web.css' media="screen, projection" rel="stylesheet" type="text/css" /><script src="<?php echo $YICMS_PUBLIC;?>/source/jquery.js"></script><!--[if IE 6]>	<script src="<?php echo $YICMS_PUBLIC;?>/source/DD_belatedPNG.js"></script>	<script>		DD_belatedPNG.fix('.png_bg');	</script><![endif]--><script>	$(function(){		$('.detail').mouseover(function(){			$(this).find('div').css('display','block');		}).mouseout(function(){$(this).find('div').css('display','none');});	});	function vote3(id,kind){		$.ajax({		   type: "POST",		   url: "<?php echo U('Index/checkVote2');?>",		   data: "id="+id+"&kind="+kind,		   success: function(msg){				if(msg=='+1+'){					showLoginForm();				}else if(msg=='-1-'){					if(kind>0){						$("#yes-"+id).removeAttr('href');						$("#no-"+id).removeAttr('href');						$("#yes-"+id).css("background","#F3EFE7 url(<?php echo ($HOME_PUBLIC); ?>/static/css/img/web15.png) -0px -60px no-repeat");						$("#yes-"+id).css("color","#BF4131");						$("#yes-"+id).css("border","1px solid #CABDB0");						$("#yes-"+id).css("box-shadow","0 1px 2px #D6C9BC inset;");					}else{						$("#yes-"+id).removeAttr('href');						$("#no-"+id).removeAttr('href');						$("#no-"+id).css("background","#F3EFE7 url(<?php echo ($HOME_PUBLIC); ?>/static/css/img/web15.png) -80px -60px no-repeat");						$("#no-"+id).css("color","#BF4131");						$("#no-"+id).css("border","1px solid #CABDB0");						$("#no-"+id).css("box-shadow","0 1px 2px #D6C9BC inset;");					}				}else if(msg=='+1'){					var yes = parseInt($("#yes-"+id).html());					$("#yes-"+id).html(yes+1);					$("#yes-"+id).removeAttr('href');					$("#no-"+id).removeAttr('href');					$("#yes-"+id).css("background","#F3EFE7 url(<?php echo ($HOME_PUBLIC); ?>/static/css/img/web15.png) -0px -60px no-repeat");					$("#yes-"+id).css("color","#BF4131");					$("#yes-"+id).css("border","1px solid #CABDB0");					$("#yes-"+id).css("box-shadow","0 1px 2px #D6C9BC inset;");				}else if(msg=='-1'){					var no = parseInt($("#no-"+id).html());					$("#no-"+id).html(no+1);					$("#yes-"+id).removeAttr('href');					$("#no-"+id).removeAttr('href');					$("#no-"+id).css("background","#F3EFE7 url(<?php echo ($HOME_PUBLIC); ?>/static/css/img/web15.png) -80px -60px no-repeat");					$("#no-"+id).css("color","#BF4131");					$("#no-"+id).css("border","1px solid #CABDB0");					$("#no-"+id).css("box-shadow","0 1px 2px #D6C9BC inset;");				}		   }		});	}	function showReply(id){		if($("#reply-"+id).html()== null){			var showReply = $("#showReply-"+id).html();			$("#showReply-"+id).html('...');			$.ajax({				type: "POST",				url: "<?php echo U('Index/showReply');?>",				data: "id="+id,				success: function(msg){					$("#qiushi-"+id).append(msg);					$("#showReply-"+id).html(showReply);				}			});		}else{			$("#reply-"+id).toggle('fast');		}	}	function checkReply2(id){		var arcontent = $('#arcontent-'+id).val();		var anoymous = 0 ;		if($('#anonymous-'+id+':checked').val()=='1')	anoymous = 1;		$.ajax({			type: "POST",			url: "<?php echo U('Index/checkReply2');?>",			data: "pid="+id+"&arcontent="+arcontent+"&anonymous="+anoymous,			success: function(msg){				if(msg=='0'){					alert('回复就得有内容嘛!');				}else if(msg=='-1'){					$('#arcontent-'+id).val('');				}else if(msg=='1'){					var reply = parseInt($("#showReply-"+id).html());					if(isNaN(reply)) reply = 0;					$("#showReply-"+id).html(reply+1);					$('#arcontent-'+id).val('');					$('#reply-'+id).remove();					$('#arcontent-'+id).focus();					showReply(id);				}			}		});	}	function replyBest(rid,id){		$.ajax({			type: "POST",			url: "<?php echo U('Index/checkBest');?>",			data: "rid="+rid+"&id="+id,			success: function(msg){				$('#arcontent-'+id).val('');				$('#reply-'+id).remove();				$('#arcontent-'+id).focus();				showReply(id);			}		});	}	function sharetoqzone(id){		var title = $('#title-'+id).html();		var url   = '<?php echo C('URL');?>'+$('#title-'+id).attr('href');		var summary = $('#content-'+id).html();		setShare(title,url,summary);		$('.jiathis_button_qzone').click();	}	function sharetosina(id){		var title = $('#title-'+id).html();		var url   = '<?php echo C('URL');?>'+$('#title-'+id).attr('href');		var summary = $('#content-'+id).html();		setShare(title,url,summary);		$('.jiathis_button_tsina').click();	}	function sharetotqq(id){		var title = $('#title-'+id).html();		var url   = '<?php echo C('URL');?>'+$('#title-'+id).attr('href');		var summary = $('#content-'+id).html();		setShare(title,url,summary);		$('.jiathis_button_tqq').click();	}</script></head><body><a name="top"></a><div class="head"><div class="content-block png_bg"><div class="logo"><a href="/"><?php echo ($config["title"]); ?></a></div><div class="userbar"><script language="javascript" type="text/javascript" src="/index.php/Index/log"></script></div></div></div>
<div class="menu-bar clearfix">
<div class="content-block">
<div class="menu">
	<ul>
		<li class="menuout"><a href="<?php echo U('Index/best');?>">热门</a></li>
		<li class="menuout" onMouseOver="this.className='menuover'" onMouseOut="this.className='menuout'">
			<a href="<?php echo U('Index/day');?>" class="submenutitle" id="highlight">精华</a>
			<a href="<?php echo U('Index/day');?>" class="submenu">24小时内</a>
			<a href="<?php echo U('Index/week');?>" class="submenu">7天内</a>
			<a href="<?php echo U('Index/month');?>" class="submenu">30天内</a>
			<a href="<?php echo U('Index/history');?>" class="submenu" style="font-size:16px;font-weight:bold;">穿 越</a>
		</li>
		<?php $_result=D('Nav')->nlist('2','2','-1','15','30','1','0'); if($_result): $i=0;foreach($_result as $key=>$nlist):++$i;?><li class="menuout"><a href="<?php echo ($nlist["url"]); ?>"><?php echo ($nlist["name"]); ?></a></li><?php endforeach; endif;?>
		<?php $_result=D('Nav')->nlist('2','3','-1','15','30','1','0'); if($_result): $i=0;foreach($_result as $key=>$nlist):++$i;?><li class="menuout"><a href="<?php echo ($nlist["url"]); ?>"><?php echo ($nlist["name"]); ?></a></li><?php endforeach; endif;?>	
		<?php $_result=D('Nav')->nlist('2','4','-1','15','30','1','0'); if($_result): $i=0;foreach($_result as $key=>$nlist):++$i;?><li class="menuout"><a href="<?php echo ($nlist["url"]); ?>"><?php echo ($nlist["name"]); ?></a></li><?php endforeach; endif;?>
		<li class="menuout"><a href="<?php echo U('Index/ticket');?>">审贴</a></li>
		<li class="menuout"><a href="<?php echo U('Index/add');?>">发表</a></li>
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
<div class="history-nv">
	<?php echo ($year); ?>年<?php echo ($month); ?>月<?php echo ($day); ?>日共有糗事
	<span class="post-number"><?php echo ($count); ?></span>篇
</div>
<div class="shadow"></div>
<?php if(!empty($list)): if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="block untagged" id="qiushi-<?php echo ($vo["id"]); ?>">
<div class="author" style="height:30px;line-height:30px;margin:0;">
	<div style="float:left;line-height:30px;">
		<a href="<?php echo U('Home/Index/news?id='.$vo['id']);?>" id="title-<?php echo ($vo["id"]); ?>" target="_blank"><?php echo (msubstr($vo["title"],0,25,'utf-8',false)); ?></a>
	</div>
	<div style="float:right;">
		<a href="<?php echo U('User/Index/index?uid='.$vo['uid']);?>" target="_blank"><?php echo ($vo["uname"]); ?></a>&nbsp;&nbsp;
		<img src="<?php echo ($YICMS_PUBLIC); ?>/face/f_<?php echo ($vo["face"]); ?>" alt="<?php echo ($vo["uname"]); ?>">
	</div>
	<div style="float:right;line-height:30px;"><?php echo (switchtime($vo["time"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
<div style="clear:both;"></div>
<div style="height:10px;line-height:10px;background:url('<?php echo ($HOME_PUBLIC); ?>/images/line.gif') repeat-x"></div>
<div class="content" title="<?php echo (switchtime($vo["time"])); ?>" id="content-<?php echo ($vo["id"]); ?>">
	<?php echo ($vo["content"]); ?>	
</div>
<?php if(!empty($vo['pic'])): ?><div class="thumb">
		<img src="<?php echo ($YICMS_PUBLIC); ?>/news/m_<?php echo ($vo["pic"]); ?>"/>
	</div><?php endif; ?>
<?php if(!empty($vo['video'])): ?><embed src="<?php echo ($vo["video"]); ?>" type="application/x-shockwave-flash" width="550" height="400" quality="high" allowfullscreen="true"/><?php endif; ?>
<?php if(!empty($vo['tag'])): ?><div class="tags">
	<span class="bti"></span>
	<?php $tag = explode(' ',$vo['tag']); $max = count($tag); for($i=0;$i<$max;$i++){ echo '<a href="'.U('Index/tag?name='.$tag[$i]).'" target="_blank">'.$tag[$i].'</a>&nbsp;'; } ?>
</div><?php endif; ?>

<div class="bar clearfix">
	<div class="up">
		<a href="javascript:vote3(<?php echo ($vo["id"]); ?>,1)" id="yes-<?php echo ($vo["id"]); ?>"><?php echo ($vo["yes"]); ?></a>
	</div>
	<div class="down" style="margin:0 232px 0 10px;">
		<a href="javascript:vote3(<?php echo ($vo["id"]); ?>,-1)" id="no-<?php echo ($vo["id"]); ?>"><?php echo ($vo["no"]); ?></a>
	</div>
	<div class="comment">
		<a href="javascript:showReply(<?php echo ($vo["id"]); ?>)" id="showReply-<?php echo ($vo["id"]); ?>">
			<?php if(empty($vo['reply'])): ?>评论
			<?php else: ?>
				<?php echo ($vo["reply"]); endif; ?>
		</a>
	</div>
	<div class="detail" style="width:80px;position: relative;">
		<a style="width:50px;padding-left:30px;zoom:1">分享</a>
		<div style="position:absolute;left:0px;border:1px solid #DFD5CB;display:none;width:80px;margin:29px 0 0;background: white;text-indent: 0;z-index:999;" >
			<ul>
				<li style="height:30px;"><a href="javascript:sharetosina(<?php echo ($vo["id"]); ?>)" style="padding: 8px 12px;background: none;border-radius: 0;float: none;height: auto;line-height: 100%;text-indent: 0;width: auto;border: 0 none;z-index:999;border-bottom: 1px solid #ECE5D8;box-shadow: 0 0 0;cursor: pointer;">新浪微博</a></li>
				<li style="height:30px;"><a href="javascript:sharetoqzone(<?php echo ($vo["id"]); ?>)" style="padding: 8px 12px;background: none;border-radius: 0;float: none;height: auto;line-height: 100%;text-indent: 0;width: auto;border: 0 none;z-index:999;border-bottom: 1px solid #ECE5D8;box-shadow: 0 0 0;cursor: pointer;">&nbsp;QQ空间</a></li>
				<li style="height:30px;"><a href="javascript:sharetotqq(<?php echo ($vo["id"]); ?>)" style="padding: 8px 12px;background: none;border-radius: 0;float: none;height: auto;line-height: 100%;text-indent: 0;width: auto;border: 0 none;z-index:999;border-bottom: 1px solid #ECE5D8;box-shadow: 0 0 0;cursor: pointer;">腾讯微博</a></li>
			</ul>
		</div>
	</div>
</div>
</div>
<div class="shadow"></div><?php endforeach; endif; else: echo "" ;endif; ?>
<?php else: ?>
	<div class="block">哎呀，这一天居然没有糗事，试试别的日子吧o(∩_∩)o...</div>
	<div class="shadow"></div><?php endif; ?>

<div class="pagebar">
<?php echo ($page); ?>
</div>
</div>
<div id="ckepop" style="display:none;">
	<a class="jiathis_button_tqq"></a>
	<a class="jiathis_button_tsina"></a>
	<a class="jiathis_button_qzone"></a>
</div>
<script type="text/javascript">
	function setShare(title, url,summary) {
		jiathis_config.title = title;
		jiathis_config.url = url;
		jiathis_config.summary = summary;
	}
	var jiathis_config = {}
</script>   
<script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
<div class="col2">
<div id="box">
	<div id="float" class="div1">
		<div class="history-block">
				<div class="month">
					<select name="" id="history-calendar">
						<?php echo ($getMonth); ?>
					</select>
				</div>
				<div class="week">
					<span class="sun">周日</span><span class="mon">周一</span><span class="tue">周二</span><span class="wed">周三</span><span class="thu">周四</span><span class="fri">周五</span><span class="sat">周六</span>
				</div>
				<div class="day clearfix">
					<div class="on">
						<?php echo ($getDay); ?>
					</div>	
				</div>
				<div class="off">
				</div>
		</div>
		<div class="shadow"></div>
		<div id="float-ad" class="sponsor">
			
		</div>
		<div class="shadow"></div>
		<div class="smartphone">
			<ul id="banner_img">
			<li><a href="http://itunes.apple.com/cn/app/id422853458?ls=1&amp;mt=8" target="_blank"><img src="<?php echo ($HOME_PUBLIC); ?>/static/css/img/web21.png?v=a7b73"/></a></li>
			<li><a href="http://www.wandoujia.com/apps/qsbk.app" target="_blank"><img src="<?php echo ($HOME_PUBLIC); ?>/static/css/img/web22.png?v=a440f"/></a></li>
			<li><a href="http://m.qiushibaike.com" target="_blank"><img src="<?php echo ($HOME_PUBLIC); ?>/static/css/img/web23.png?v=4f30b"/></a></li>
			<li><a href="http://product.dangdang.com/product.aspx?product_id=22635844" target="_blank"><img src="<?php echo ($HOME_PUBLIC); ?>/static/css/img/web24.png?v=61504"/></a></li>
			</ul>
			<div class="imgnum"><span class="onselect">1</span><span>2</span><span>3</span><span>4</span></div>
		</div>
		<div class="toolbar">
			<a href="#top" class="back">回到顶部</a><a href="javascript:showSuggestForm()" class="feedback">意见建议</a>
		</div>
	</div>
</div>
</div>
<div class="baidu-sponsor">
</div>
</div>
</div>
</div>
	<div class="foot">
		<div class="copyright">
			<?php echo ($config["copy"]); ?>&nbsp;&nbsp;<?php echo ($config["statcode"]); ?>
		</div>
	</div>
	<div id="login-form">
		<a href="#" class="close"><div class="bti"></div></a>
		<div class="ie6-fix"></div>
		<div class="col1">
			<h1>欢迎回来</h1>
			<form method="post" action="<?php echo U('User/Index/checkLogin');?>">
				<div class="inputbox">
					<label for="login">用户名或邮箱：</label>
					<input type="text" tabindex="1" name="account" id="login"/>
					<label for="password">密码：(<a href="<?php echo U('User/Index/fetchpass');?>">忘记密码？</a>)</label>
					<input type="password" tabindex="2" name="password" id="password"/>
				</div>
				<button type="submit" name="submit">登录</button>
			</form>
		</div>
		<div class="col2">
			<h1>创建账号</h1>
			<div class="intro">
				请珍惜自己的账号，一旦作恶，账号将被永久删除。<br/><br/>
			</div>
			<a href="<?php echo U('User/Index/login');?>" class="button" target="_blank">注册</a>
		</div>
	</div>
	<div id="suggest-form">
		<a href="#" class="close"><div class="bti"></div></a>
		<div class="ie6-fix"></div>
		<div class="form-block">
		<h1>请帮助我们进步</h1>
		<form action="<?php echo U('Index/suggest');?>" method="post">
		<textarea type="text" name="content" tabindex="1"></textarea>
		<button type="submit">提交</button>
		</form>
		</div>
	</div>
	<div id="report-form">
		<a href="#" class="close" id="close-form"><div class="bti"></div></a>
		<div class="ie6-fix"></div>
		<div class="form-block">
		<form action="/comments/report" method="post">
		<strong>请选择理由</strong>
		<input type="hidden" name="comment_id" value="" />
		<label for='abusive'><input id='abusive' type="radio" name="reason" value="abusive"/> 辱骂</label>
		<label for='porn'><input id='porn' type="radio" name="reason" value="porn"/> 色情</label>
		<label for='spam'><input id='spam' type="radio" name="reason" value="spam"/> 广告</label>
		<label for='waste'><input id='waste' type="radio" name="reason" value="waste"/> 浪费楼层</label>
		<button type="submit">提交</button>
		</form>
		</div>
	</div>
	<script src="<?php echo ($HOME_PUBLIC); ?>/static/js/application.js" type="text/javascript"></script>
	<script src="<?php echo ($HOME_PUBLIC); ?>/static/js/history.js" type="text/javascript"></script>
</body>
</html>