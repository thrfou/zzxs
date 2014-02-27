<?php
	header("Content-type: text/html; charset=GB18030"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GB18030" />
<title></title>
<style>
em {
	font-style: normal;
	color: #C00;
}
</style>
</head>

<body>

<?php
set_time_limit(0);
include_once('./inc_func.php');
require_once("./inc_configure.php");
require_once("./inc_database.php");
$db = Database::Connect();

$sql = "select * from so where img is null and source_num=5 limit 1";
$db->setNamesGB2312();
$rs = $db->GetResultSet($sql);

while($row=mysql_fetch_array($rs)){
	echo $row['keyword'].'<br/>';
	gather("http://image.baidu.com/i?ct=201326592&cl=2&nc=1&lm=-1&st=-1&tn=baiduimage&istype=2&fm=index&pv=&z=0&word=".urlencode($row['keyword']));	
}

function gather($url_str_str){
	global $db,$row;
	//echo $row['keyword'].'<br/>';
	$getstr = openfile($url_str_str);
	//file_put_contents("test.txt",$getstr);
	
	$img_url=cut('objURL":"','"',$getstr);
	$img_url_len = strlen(trim($img_url));
	echo $img_url.'<br/>';
	if($img_url_len>0 && $img_url_len<255){
		$url = time().rand(1,100).".jpg";
		if(copy(trim($img_url),'../images/association/'.$url)){
			$sql = "update so set img = '".$db->Encode("http://www.mzmovie.cn/images/association/".$url)."' where this_id = ".$row['this_id'];
			$db->Execute($sql);
		}else{
			$sql = "update so set img = '0' where this_id = ".$row['this_id'];
			$db->Execute($sql);
		}
	}else{
		$sql = "update so set img = '0' where this_id = ".$row['this_id'];
		$db->Execute($sql);
	}
}

$db->Close();

?>
ok
</body>
</html>