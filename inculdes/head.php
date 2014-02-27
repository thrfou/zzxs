<?php 
	
	$domain_without_www = $_SERVER['HTTP_HOST'];
	$domain_without_www = str_replace("www.","",$domain_without_www);
	
	require('inculdes/key_from.php'); 
	
	require('html/static_head.php');  
	define("_htmlPath_","html/cache/");
	
	if($_SERVER['HTTP_HOST']=='so.com'){
		//define("_htmlEnable_", false);
		define("_htmlEnable_", false);
	}else{
		if($_SERVER["SCRIPT_NAME"]=='/index.php'){
			define("_htmlEnable_", false);//��ҳ��Ϊ������,�����ָ����û���·�жϵ�,����,��ҳ������
		}else{
			define("_htmlEnable_", true);
		}
	}
	


	//����ʱ�䶨�� ��λ����
	if($_SERVER["SCRIPT_NAME"]=='/so.php' 
		||$_SERVER["SCRIPT_NAME"]=='/redirect.php'){
		define("_RehtmlTime_","20");
		//����4320��
	}elseif($_SERVER["SCRIPT_NAME"]=='/archive.php' ){
		define("_RehtmlTime_","20");
		//2����120��
	}else{
		//Ĭ�ϰ���
		define("_RehtmlTime_","600");
	}
	
	$html=new html();
	
	//��������12��,�����һ�»���
	if(date("G")=='0'){
		$cache_update_date = file_get_contents("cache_update_date.txt");
		if($cache_update_date!=date("Y-m-d")){
			$html->delete();
			$html->ischage=true;
			file_put_contents("cache_update_date.txt",date("Y-m-d"));
		}
	}
	//��ʱ��Ҫ�ֶ�����,��������һ���������
	if($_GET['cc']){
		$html->delete();
		$html->ischage=true;
	}
	

	if ($html->check()) {
		$template=$html->read();
		
		//�������������Ĺؼ���
		//ע������������ط���û�ж����ģ�飬Ҫ�������
		if($s_s_keyword){
			if(strrpos($s_s_keyword,'.la') ||
				strrpos($s_s_keyword,'site') ||
				strrpos($s_s_keyword,'tt') || 
				strrpos($s_s_keyword,'com')|| 
				strrpos($s_s_keyword,'.cc')|| 
				strrpos($s_s_keyword,'net')|| 
				strrpos($s_s_keyword,'��')||
				strrpos($s_s_keyword,'.cn')||
				strrpos($s_s_keyword,'.org')||
				strrpos($s_s_keyword,'%')||
				strrpos($s_s_keyword,'&')||
				strrpos($s_s_keyword,'ww')){
			}else{
				if(true){
					include_once('./func.php');
					require_once("./configure.php");
					require_once("./database.php");
					$db = Database::Connect();
					include(dirname(__FILE__) . "/site.php"); 
					$s = new site();
					$site = $s->getSiteByDomain($domain_without_www);
					if(!$site['id']){exit;}
					$sql = "insert into so" .
						"(keyword,keyword_add_date,source_num,source_type,site_id)" .
						" values('$s_s_keyword',now(),5,'HTTP_REFERER',".$site['id'].")";
					$db->ExecuteNoWarning($sql);
					$db->Close();
				}
			}
		}
		
		exit;
	}
	
	ob_start();  
	ob_implicit_flush(0);

	include_once('./func.php');
	require_once("./configure.php");
	require_once("./database.php");
	$db = Database::Connect();
	//������,������·��ȡվ����Ϣ
	//$domain_without_www
	include(dirname(__FILE__) . "/site.php"); 
	$s = new site();
	$site = $s->getSiteByDomain($domain_without_www);
	if(!$site['id']){exit;}
	
	//�������������Ĺؼ���
	//ע������������ط���û�ж����ģ�飬Ҫ�������
	if($s_s_keyword){
		if(strrpos($s_s_keyword,'.la') ||
			strrpos($s_s_keyword,'site') ||
			strrpos($s_s_keyword,'tt') || 
			strrpos($s_s_keyword,'com')|| 
			strrpos($s_s_keyword,'.cc')|| 
			strrpos($s_s_keyword,'net')|| 
			strrpos($s_s_keyword,'��')||
			strrpos($s_s_keyword,'.cn')||
			strrpos($s_s_keyword,'.org')||
			strrpos($s_s_keyword,'%')||
			strrpos($s_s_keyword,'&')||
			strrpos($s_s_keyword,'ww')){
		}else{
			if(true){
				$sql = "insert into so" .
						"(keyword,keyword_add_date,source_num,source_type,site_id)" .
						" values('$s_s_keyword',now(),5,'HTTP_REFERER',".$site['id'].")";
				$db->ExecuteNoWarning($sql);
			}
		}
	}
	
?>