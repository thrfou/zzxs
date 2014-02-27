<div class="header">
	<div class="<?php 
					if($_SERVER["SCRIPT_NAME"]=='/index.php'||$_SERVER["SCRIPT_NAME"]=='/archive.php') {
						echo 'index_log';
					}
				?> logo">
		<a href="/" class="fl">
			<img alt="<?php echo $site['title'];?>" src="images/logo.png"/>
		</a>
		<div class="fl site_i">
			<h1><?php echo $site['title'];?></h1>
			<h3><?php echo $site['domain'];?></h3>
		</div>
		<div class="cb"></div>
	</div>
    <div class="slogan">
    	<span>网页</span>
    </div>
	<div class="search_box">
		<form action="so.php" method="get" name="so_form" class="so_form">
        	<input name="keyword" type="text" class="keyword_class" value="<?php if($_GET['keyword'])echo $_GET['keyword'];?>"/>
			<input type="submit" class="so_submit" value="搜 索" title="搜 索"/>
        </form>
		
	</div>
	
	<div class="latest_search">
		<h3>最新搜索</h3>
		<?php
			$date_head = date("Y-m-d");
			$sql ="select * from so where primary=1  and site_id = ".$site['id']." and gather_content is not null";
		    $popular_search = $db->GetResultSet($sql);
			$index_temp = 0;
			echo '<ul>';
			while($row = mysql_fetch_array($popular_search)){
				$index_temp++;
				echo '<li>'.$index_temp.'.<a href="s'.$row['this_id'].'.html">'.$row['keyword'].'</a></li>';
				if($index_temp%6==0){
					echo '</ul><ul>';
				}
			}
			
			$sql ="select * from so as A
					join (select ROUND(rand()*(select max(this_id) from so )) as id) as B
					where A.this_id>= B.id 
						and A.site_id = ".$site['id']." 
						and A.gather_content is not null
					ORDER BY A.this_id ASC limit ".(18-$index_temp);
		    $popular_search = $db->GetResultSet($sql);
			while($row = mysql_fetch_array($popular_search)){
				$index_temp++;
				echo '<li>'.$index_temp.'.<a href="s'.$row['this_id'].'.html">'.$row['keyword'].'</a></li>';
				if($index_temp%6==0){
					echo '</ul><ul>';
				}
				if($index_temp%12==0){
					echo '</ul><ul>';
				}
			}
			echo '</ul>';			
		?>
		<div class="cb"></div>
	</div>
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