<?php

	ini_set('pcre.backtrack_limit', 10000000);//默认的只有100000
	header("Content-type: text/html; charset=utf-8");
	function subString2($str, $start, $length) {
		if(!isset($str{$start})) return '...';
		//判断起始位置
		if(ord($str{$start}) < 192) {
			if(!isset($str{$start + 1})) return '...';
			if(ord($str{$start + 1}) >= 192) {
				$start++;
			} else {
				if(!isset($str{$start + 2})) return '...';
				if(ord($str{$start + 2}) >= 192) {
					$start += 2;
				}
			}
		}
		//长度不足
		if(!isset($str{$start + $length - 1})) return substr($str, $start);
		//判断结束位置
		if(ord($str{$start + $length -1}) >= 224) {
			return substr($str, $start, $length + 2) . '...';
		} elseif(ord($str{$start + $length -1}) >= 192 || ord($str{$start + $length -2}) >= 224){
			return substr($str, $start, $length + 1) . '...';
		} else {
			return substr($str, $start, $length) . '...';
		}
	}
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
	$content = my_file_get_contents("http://www.qiushibaike.com/");
	//echo $content;
	
							
	$content_paten_all = "/(<div\sclass=\"block\suntagged\smb15\sbs2\"\sid=\'(.*?)\'>(.*?)<div\sclass=\"sharebox)/ism";
	preg_match_all($content_paten_all, $content, $car);
	$index_t = 0;
	
	include_once('./inc_func.php');
	require_once("./inc_configure.php");
	require_once("./inc_database.php");
	$db = Database::Connect();
	foreach($car[0] as $ccc){
		$index_t++;
		//print_r($content);
		$content_paten = "/(<div\sclass=\"content\"\stitle=\"(.*?)\">(.*?)<\/div>)/ism";
		preg_match_all($content_paten, $ccc, $cr);
		//$c_array = $cr[3];
		echo $index_t;
		$c_use = $cr[3][0];
		$c_use = str_replace("(来自糗百)","",$c_use);
		$ttt = subString2($c_use,0,60);
		$img_paten = "/(<img\ssrc=\"http:\/\/pic.qiushibaike.com\/system\/pictures(.*?)\/>)/ism";
		preg_match_all($img_paten, $ccc, $cimg);
		
		$img = '';
		if(isset($cimg[0][0])){
			$img = $cimg[0][0];
		}
		//print_r($img);
		
		$user_paten = "/(<a\shref=\"\/users\/(.*?)>(.*?)<\/a)/ism";
		preg_match_all($user_paten, $ccc, $uu);
		$users = $uu[3][0];
		if($users){}else{$users='四川麻将';}
		$sql = "INSERT INTO `yi_news` (`id`, `title`, `uid`, `author`, `email`, `content`, `tag`, 
										   `pic`, `video`, `time`, `click`, `taxis`, `pid`, `state`, 
										   `ismake`, `yes`, `no`, `reply`, `type`) VALUES
											(null, '".$db->Encode($ttt)."', 23, '".$db->Encode($users)."', 'thrfou@gmail.com', '".$db->Encode($c_use.'<br/>'.$img)."',
											'', '', '', ".(time()+$index_t*4).", 4, 0, 3, 1, 0, 1, 0, 0, 0)";
		
		//echo $sql.'<br/>';
		$db->ExecuteNoWarning($sql);
	}
	

		
		
?>