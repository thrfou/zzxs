<?php
set_time_limit(0);
include_once('./inc_func.php');
require_once("./inc_configure.php");
require_once("./inc_database.php");
$db = Database::Connect();

$sql = "select this_id,img from so where img is not null and source_num=5";
$rs = $db->GetResultSet($sql);
while($row=mysql_fetch_array($rs)){
	$img_url = $row['img'];
	$img_url = str_replace("////", "//", $img_url);
	$img_url = str_replace("''", "'", $img_url);
	$url = time().rand(1,100).".jpg";

	if(copy($img_url,'../images/association/0/'.$url)){
		$sql = "update so set img = '".$db->Encode("http://www.mzmovie.cn/images/association/".$url)."' where this_id = ".$row['this_id'];
		$db->Execute($sql);
	}else{
		$sql = "update so set img = '0' where this_id = ".$row['this_id'];
		$db->Execute($sql);
	}
	echo $row['this_id'].'<br/>';
}
?>
</body>