<?php
	//set_time_limit(0);
	//ignore_user_abort(1);
	include_once('./inc_func.php');
	require_once("./inc_configure.php");
	require_once("./inc_database.php");
	$db = Database::Connect();
	$sql = "delete from so where source_type = 'HTTP_REFERER' and result_count >0";
	$db->Execute($sql);
	$sql = "select this_id from so where gather_date is not NULL and gather_content is null order by this_id desc";
	//$db->setNamesGB2312();
	 
	$rs = $db->GetResultSet($sql);
	$has = false;
	while($row=mysql_fetch_array($rs)){
		$has = true;
		process($row['this_id']);
	}
	if(!$has){
		$sql = "delete from so_detail";
		$db->Execute($sql);
	}
	
	function process($this_id){
		global $db;
		$sql = "select * from so_detail where so_id=$this_id order by content_count desc limit 12";

		$main_c_c = @$db->GetResultSet($sql);
		$main_content_str = '';
		$main_content_str .= '<div class="auto_echo">';
		
		while($row_cc= mysql_fetch_array($main_c_c)){
			$main_content_str .= '<div class="so_item">'.'
			<h4>
				<a href="redirect.php?jumpto='.urlencode($row_cc['link']).'" target="_blank" rel="nofollow">'.$row_cc['title'].'</a>
			</h4>
			'.strip_tags($row_cc['content']).'</div>';
		}
		
		$main_content_str .= '</div>';
		$sql = "UPDATE so set gather_content = '$main_content_str',post=1 where this_id = ".$this_id;
		$db->Execute($sql);
		
		$sql = "delete from so_detail where so_id = ".$this_id;
		$db->Execute($sql);
	
	}
	
	$db->Close();
?>
ok