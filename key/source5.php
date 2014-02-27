<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>google top search</title>
</head>

<body>

<p>
  <?php
if($_POST['submit']){
set_time_limit(0);
	if($_POST['ks']){
		$ks = $_POST['ks'];
		$ks_a = explode("|",$ks);
		if(!count($ks_a)){
			exit;	
		}
		
		include_once('./inc_func.php');
		
		require_once("./inc_configure.php");
		require_once("./inc_database.php");
		$db = Database::Connect();
		
		for($i=0;$i<count($ks_a);$i++){
			if(strrpos($ks_a[$i],'.la') ||
				strrpos($ks_a[$i],'site') ||
				strrpos($ks_a[$i],'tt') || 
				//strrpos($ks_a[$i],'com')|| 
				//strrpos($ks_a[$i],'.cc')|| 
				//strrpos($ks_a[$i],'net')|| 
				strrpos($ks_a[$i],'锟斤拷')||
				//strrpos($ks_a[$i],'.cn')||
				//strrpos($ks_a[$i],'.org')||
				strrpos($ks_a[$i],'ww')){
				echo $ks_a[$i].'跳过<br/><br/>';
				continue;
			}	
			$sql = "insert into so" .
				"(keyword,keyword_add_date,source_num,source_type,site_id)" .
				" values('".$db->Encode(trim($ks_a[$i]))."',now(),5,'GTS',".rand(1,94).")";//4是相关搜索 google top search
				//echo $sql.'<br/>';
			$db->ExecuteNoWarning($sql);
			echo $ks_a[$i].'<br>';
		}
		
		
		$db->Close();
		
		//openfile("http://keywords.jtcsz.com/gather_baidu.php");
		echo 'ok';
	}

}
?>
  
  
  
</p>
<form id="form1" name="form1" method="post" action="">
  <p>keywords  </p>
  <p>keywordsA|keywordsB  </p>
  <p>
    <textarea name="ks" id="ks" cols="45" rows="10"></textarea>
  </p>
  <p><input type="submit" name="submit" value=" - 插 入 - "  /></p>
  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>
