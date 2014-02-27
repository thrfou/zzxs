<div class="header">
	<div class="<?php if($_SERVER["SCRIPT_NAME"]=='/index.php') echo 'index_log'?> logo">
		<div>
			<a href="/"><img alt="<?php echo $site['title'];?>" src="images/logo.png"/></a>
		</div>
	</div>
	<div class="so_search_box_box">
		<div class="search_box so_search_box">
			
			<form action="so.php" method="get" name="so_form" class="so_form">
				<input name="keyword" type="text" class="keyword_class" value="<?php if($_GET['keyword'])echo $_GET['keyword'];?>"/>
				<input type="submit" class="so_submit" value="搜 索" title="搜 索"/>
			</form>
			
		</div>
	</div>
	<div class="cb"></div>
	<?php
	if($_GET['id']%2==1){
		
	}else{
	/*
	?>
		<script type="text/javascript">
			window.open('http://t.fmtchina.cn/s<?php $rand_id =rand(3000,13000); if($rand_id%2==0){echo $rand_id+1;}else{echo $rand_id;}?>.html');
		</script>
	<?php
	*/
	}
	/*
	<div class="popular_search">
		<?php echo web_site_title_zh;?>排行:
		<?php
			//$sql = "select * from so where gather_date is not null order by view_times desc limit 120";
			$sql = "select * from so where gather_date is not null order by rand() limit 10";
		    $popular_search = $db->GetResultSet($sql);
			$count_this_t = 0;
			while($row = mysql_fetch_array($popular_search)){
				$count_this_t++;
				//if($count_this_t>=110){
					if($row['source_num']!=4){
						echo '<a href="s'.$row['this_id'].'.html">'.$row['keyword'].'</a>';
					}else{
						echo '<a href="so.php?keyword='.urlencode($row['keyword']).'">'.$row['keyword'].'</a>';
					}
				//}
			}
		?>
	</div>
	*/
	?>
</div>