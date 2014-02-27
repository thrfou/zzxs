<?php
	
	class site{
	
		/*
			每天更新网站权重,这样在发送关键词的时候,可以针对性的发送,权重高,发送量就大
		*/
		function reCalculatorWeight(){
			
		}
		
		/*
			根据权重,随机获取网站
		*/
		function getSite(){
			
		}
		
		function getSiteById(){
			
		}
		
		/*
			根据域名来获取网站,不包括www
		*/
		function getSiteByDomain($domain){
			global $db;
			$sql ="select * from site where domain='$domain'";
		    $r = $db->GetResultSet($sql);
			$row = mysql_fetch_array($r);
			return $row;
		}
	
		
	}
	
?>