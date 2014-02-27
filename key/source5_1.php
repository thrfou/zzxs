<?php
		
		include_once('./inc_func.php');
		
		require_once("./inc_configure.php");
		require_once("./inc_database.php");
		$db = Database::Connect();
		
		
		$sql = "select slogan from site";
		$rs = $db->GetResultSet($sql);
		$ss = array();
		while($row=mysql_fetch_array($rs)){
			$ss[] = $row['slogan'];
		}

		$sql = "select keyword,this_id from so";
		$rs = $db->GetResultSet($sql);

		while($row=mysql_fetch_array($rs)){
			foreach($ss as $s){
				if(strpos($s,$row['keyword'])===false){
					//echo $row['this_id'];
					
				}else{
					$sql = "update so set `primary` = 1 where this_id = ".$row['this_id'];
					$db->Execute($sql);
					//echo $sql;exit;
					break;
				}
			}
		}
		
		$db->Close();
		echo 'ok';
	
?>
