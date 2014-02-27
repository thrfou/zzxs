<br/>
<?php
	for($p_i = 1;$p_i <=$max_page;$p_i++){
		if($p_i==1){
			echo '<a href="archive.php?date='.$date_q.'">第1页</a>';
		}else{
			echo '<a href="archive.php?date='.$date_q.'-'.$p_i.'">第'.$p_i.'页</a>';
		}
	}
?>