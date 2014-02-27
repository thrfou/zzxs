<div class="pr">
	<?php
	/*
	if(!$_GET['date']){
		$date_q = date("Y-m-d");
	}else{
		$date_q = $_GET['date'];
	}
	$sql = "select DISTINCT(DATE_FORMAT(keyword_add_date,'%Y-%m-%d')) as date_r from so where keyword_add_date<='$date_q' order by date_r desc LIMIT 8";
	$date_of_recodes = $db->GetResultSet($sql);
	while($row = mysql_fetch_array($date_of_recodes)){
		echo '<a href="archive.php?date='.$row['date_r'].'">'.$row['date_r'].'</a>';
	}*/
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-1 day")).'">'.date("Y-m-d",strtotime("-1 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-2 day")).'">'.date("Y-m-d",strtotime("-2 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-3 day")).'">'.date("Y-m-d",strtotime("-3 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-4 day")).'">'.date("Y-m-d",strtotime("-4 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-5 day")).'">'.date("Y-m-d",strtotime("-5 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-6 day")).'">'.date("Y-m-d",strtotime("-6 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-7 day")).'">'.date("Y-m-d",strtotime("-7 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-8 day")).'">'.date("Y-m-d",strtotime("-8 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-9 day")).'">'.date("Y-m-d",strtotime("-9 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-10 day")).'">'.date("Y-m-d",strtotime("-10 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-11 day")).'">'.date("Y-m-d",strtotime("-11 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-12 day")).'">'.date("Y-m-d",strtotime("-12 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-13 day")).'">'.date("Y-m-d",strtotime("-13 day")).'</a>';
	echo '<a href="archive.php?date='.date("Y-m-d",strtotime("-14 day")).'">'.date("Y-m-d",strtotime("-14 day")).'</a>';
	?>
</div>

<div id="footer">
	<p>&copy; 2011-<?php echo date("Y").' '.$site['title'];?> All Rights Reserved <?php echo $site['cnzz'];?></p> 
	<p>网站合作 QQ:1517749452</p>	
</div>
