<?php
	function my_file_get_contents($url){
		$cu = curl_init();
		$url = "http://bughost.duapp.com/s.php?url=".urlencode($url);
		//echo $url;exit;
		curl_setopt($cu, CURLOPT_URL, $url);
		curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
		$ret = curl_exec($cu);
		//echo $ret;exit;
		curl_close($cu);
		return $ret;
	}
	header("Content-type: text/html; charset=utf-8"); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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

include_once('./inc_func.php');
require_once("./inc_configure.php");
require_once("./inc_database.php");
$db = Database::Connect();


$str_temp = '<div class="auto_echo"></div>';
$sql = "update so set gather_date=null,gather_content=null where gather_content = '$str_temp'";

$db->Execute($sql);

$sql = "select * from so where 
						gather_date is NULL 
						and result_count is null 
						order by rand() desc limit 1";
//$db->setNamesGB2312();

$rs = $db->GetResultSet($sql);


$result_count = -1;
$limit_r_count = 10000000;// on server 50
while($row=mysql_fetch_array($rs)){
	$result_count = -1;
	gather("http://www.baidu.com/s?wd=".urlencode($row['keyword']));
	if($result_count==0 || $result_count >$limit_r_count){
		//结果大于100w也不采了
		//没有结果就不采了
		//return;
	}else{
		gather("http://www.baidu.com/s?pn=10&wd=".urlencode($row['keyword']),10);
	}
	
}

function gather($url_str_str,$page_no=0){
	global $db,$row,$result_count,$limit_r_count;
	
	//echo 'we gather two page : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$url_str_str.'<br/>';
	echo $row['keyword'].'<br/>';
	
	//$getstr = file_get_contents("test.txt");
	//$getstr = openfile($url_str_str);
	$getstr = my_file_get_contents($url_str_str);
	//$url = "http://bughost.duapp.com/s.php?url=".urlencode($url);
	//$getstr = file_get_contents($url);
	
	
	//没有结果,把这个词删除
	if(strpos($getstr,'<div class="nors">')){
		$sql = "update so set result_count = 0 where this_id = ".$row['this_id'];
		$db->Execute($sql);
		echo $row['keyword'].' 无结果,删除删除删除删除删除删除删除<br/>';
		$result_count = 0;
		return;
	}
	//结果数量统计
	$baidu_result_paten = "/相关结果约(.*?)个/ism";
	preg_match_all($baidu_result_paten, $getstr, $brc);
	
	$result_count = str_replace(",","",$brc[1][0]);
	if($result_count){}else{
		$baidu_result_paten = "/相关结果(.*?)个/ism";
		preg_match_all($baidu_result_paten, $getstr, $brc);
		$result_count = str_replace(",","",$brc[1][0]);
	}
	//print_r($brc);
	echo 'JG : '.$result_count.'<br/>';
	if($result_count>$limit_r_count){
		$sql = "update so set result_count = $result_count where this_id = ".$row['this_id'];
		$db->Execute($sql);
		echo $row['keyword'].' 结果太多<br/>';
		$result_count = 0;
		return;
	}

	//
	
	//过滤关键词
	$sql_f = "select * from filter_words";
	$rs_f = $db->GetResultSet($sql_f);
	while($row_f=mysql_fetch_array($rs_f)){
		$getstr = str_replace($row_f['filter_words'],"",$getstr);
	}
//	file_put_contents("test.html",$getstr);
	//end filter_words
	//$baidu_paten = "/(<table\scellpadding=\"0\"\scellspacing=\"0\"\sclass=\"result\"\sid=\"\d+\"\s>(.*?)<\/table>)/ism";
	$baidu_paten = "/(<table\sclass=\"result\"\sid=\"\d+\"(.*?)>(.*?)<\/table>)/ism";
	preg_match_all($baidu_paten, $getstr, $bc);
	$gather_data = array();
	
	foreach ($bc[0] as $val) {		$gather_data_inner = null;
		$gather_data_inner = array();	
		//echo $val . "\n";
		$baidu_paten_title = "/(<h3\sclass=\"t\">(.*?)<\/h3>)/ism";
		preg_match_all($baidu_paten_title, $val, $bc_title);
//echo $bc_title[2][0];
		$link_paten = '/<a(.*?)href="(.*?)"(.*?)>(.*?)<\/a>/ism';
		preg_match_all($link_paten, $bc_title[2][0], $bc_title_1);		$gather_data_inner[0]="0";		$gather_data_inner[1]="0";		$gather_data_inner[2]="0";		$gather_data_inner[3]="0";		$gather_data_inner[4]="0";		$gather_data_inner[5]="0";				$gather_data_inner[1]=$bc_title_1[4][0];		$gather_data_inner[0]=$bc_title_1[2][0];//地址
		$baidu_paten_content = "/(<div\sclass=\"c-abstract\">(.*?)<\/div>)/ism";
		preg_match_all($baidu_paten_content, $val, $bc_content);		if(!isset($bc_content[2][0])){continue;}
		$gather_data_inner[2]=$bc_content[2][0];//内容
		
		$gather_data_inner[3]=strlen($bc_title_1[4][0]);//标题长度
		$gather_data_inner[4]=strlen($bc_content[2][0]);//内容长度
		//关键词出现次数
		$gather_data_inner[5]=substr_count($bc_content[2][0],"/")+substr_count($bc_title_1[4][0],"/");
		$gather_data[] = $gather_data_inner;
	}
	//print_r($gather_data);exit;

	/*
	//相关词语
	$ralated_keyword_str=cut('<div id="rs">','</div>',$getstr);
	$link_paten = '/<a(.*?)href="(.*?)"(.*?)>(.*?)<\/a>/i';
	preg_match_all($link_paten, $ralated_keyword_str, $r_k);
	//print_r($r_k[4]);
	*/
	//
	if(count($gather_data)){
		if($db->insert_keywords_detail($gather_data,$row['this_id'])=='has'){
			//
			echo 'has '.$row['this_id'];
			$sql = "update so set gather_date =now() where this_id = ".$row['this_id'];
			$db->Execute($sql);
		}else{
			echo 'has not';
			$sql = "update so set gather_date =now() where this_id = ".$row['this_id'];
			$db->Execute($sql);
			if(false && $page_no==0){//现在不需要相关了(电视剧的相关已经抓完了的)
				$rk_content = '';
				foreach ($r_k[4] as $rk) {
					$rk_content.=$rk.'|';
				}
				$sql = "update so set gather_date =now(),related_keyword='$rk_content' where this_id = ".$row['this_id'];
				//echo $sql;
				$db->Execute($sql);
			}
		}
	}else{
		//删除这个
		if(strpos($getstr,"未予显示")){
			$sql = "delete from so where this_id = ".$row['this_id'];
			$db->Execute($sql);
		}		
	}
	echo '<br/>';
	
}

$db->Close();

?>
ok
</body>
</html>
