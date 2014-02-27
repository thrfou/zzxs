<?php

include_once('./inc_func.php');
require_once("./inc_configure.php");
require_once("./inc_database.php");
$db = Database::Connect();


$sql = "SELECT this_id FROM `so` WHERE ks IS NULL";
$rs = $db->GetResultSet($sql);

while($row=mysql_fetch_array($rs)){
	$sql_temp = "SELECT ks FROM `ks` ORDER BY RAND() LIMIT 15";
	$rs2 = $db->GetResultSet($sql_temp);
	$ks_s = array();
	while($row2=mysql_fetch_array($rs2)){
		$ks_s[] = str_replace("'","",$row2['ks']);
	}
	$string = implode(",",$ks_s);
	$sql_temp2 = "update so set ks='$string' where this_id = ".$row['this_id'];
	$db->Execute($sql_temp2);
	echo '<br/>'.$row['this_id'];
}
echo '<br/>ok';
$db->Close();

?>