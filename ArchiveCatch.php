<?php
/**
 * @todo 抓取最新的归档列表
 * @author shang
 */

require_once "class/Snoopy.class.php";

$targetHost = "http://www.torrentkitty.com/";
$module = "archive";


$snoopy = new Snoopy;
//$snoopy->proxy_host = "183.171.210.192";
//$snoopy->proxy_port = "8080";
$snoopy->agent = "Mozilla/5.0 (Windows NT 6.3; WOW64; rv:26.0) Gecko/20100101 Firefox/26.0";
$snoopy->referer = $targetHost;

if ($snoopy->fetch($targetHost.$module)) {
	$htmlContent = $snoopy->results;
} else {
	$htmlContent =  $snoopy->error;
}

//echo $htmlContent;

 if(preg_match('#<table id="archiveResult">([^$]+)</table>#U',$htmlContent,$itemTable)){
	 $itemHtml = $itemTable[1];
 } 
 if(preg_match_all('#<tr><td class="name">([^$]+)</td><td class="size">.*</td><td class="action"><a href="([^$]+)" title=".*" rel="information">#U',$itemHtml,$items)){
 	print_r($items);
 }

?>
