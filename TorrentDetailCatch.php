<?php
/**
 * @todo 抓取种子详情
 * @author shang
 */
 
 require_once "class/Snoopy.class.php";

$targetHost = "http://www.torrentkitty.com/";
$module = "information/66C890828FDF4D36283639A17EAC8A97B7D455F3";


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

 if(preg_match('#<table class="detailSummary">([^$]+)</table>#U',$htmlContent,$itemTable)){
	 echo $itemHtml = $itemTable[1];
 } 
 
  if(preg_match_all('#<tr><td class="name">([^$]+)</td><td class="size">.*</td><td class="action"><a href="([^$]+)" title=".*" rel="information">#U',$itemHtml,$items)){
 	print_r($items);
 }
 
?>
