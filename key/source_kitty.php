<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">
<head>
<title>weibo huati</title>
</head>

<body>

<?php

set_time_limit(0);
ignore_user_abort(1);
include_once('./inc_func.php');
require_once("./inc_configure.php");
require_once("./inc_database.php");
$db = Database::Connect();
//$db->setNamesGB2312();
$db->setNamesUTF8();

gather("http://www.torrentkitty.com/search/",1);

function gather($url_str_str,$level){
	global $db;
    if($level>2){return;}
    //$getstr = openfile($url_str_str);
	//print_r($getstr);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url_str_str);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0');
	curl_setopt($ch, CURLOPT_REFERER, "http://www.torrentkitty.com/");
	curl_setopt($ch, CURLOPT_HEADER, 0);
	$getstr = curl_exec($ch);
	curl_close($ch);
	//print_r($getstr);
	echo strlen($getstr);
    //$baidu_paten = "/(\/search\/(.*?)\/\")/ism";
	$baidu_paten = "/(a\shref=\"\/search\/(.*?)\/\")/is";
    preg_match_all($baidu_paten, $getstr, $bc);
	
	$ks = $bc[2];

	foreach($ks as $kk=>$k){
		$sql = "insert into so" .
				"(keyword,keyword_add_date,source_num,source_type)" .
				" values('".$db->Encode($k)."',now(),5,'GTS')";
		$db->ExecuteNoWarning($sql);
	}
}

?>
ok

</body>
</html>
