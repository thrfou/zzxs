<?php
header("Content-type:text/html; charset=utf-8");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('memory_limit', '120M'); 
if (!defined('THINK_PATH'))	exit();
    return array(
        'URL_MODEL'=>1, 
		'ISHTML'=>0,
		'DEFAULT_THEME'=>'qiubai',
		'ROOT'=>$_SERVER['DOCUMENT_ROOT'],
		'URL' =>strtolower(array_shift(explode('/',$_SERVER['SERVER_PROTOCOL']))).'://'.$_SERVER['SERVER_NAME'],
		'YICMS_VERSION'=>'无限版',
		'YICMS_COPY'=>'Powered by <a href="http://shop106923367.taobao.com" target="_blank">shangwei168</a> 无限版&nbsp;&copy; 2012-2013 <a href="http://shop106923367.taobao.com" target="_blank">静静传媒</a>',
		'YiCMS_COPYRIGHT'=>'2012 shop61854386',
		'APP_GROUP_LIST' => 'Home,Admin,User',
		'DEFAULT_GROUP' =>'Home',
		'TMPL_FILE_DEPR' => '_',
		
		// 'SHOW_PAGE_TRACE'=>1,	//显示 TRACE 信息
		// 'SHOW_RUN_TIME'=>true,          // 运行时间显示
		// 'SHOW_ADV_TIME'=>true,          // 显示详细的运行时间
		// 'SHOW_DB_TIMES'=>true,          // 显示数据库查询和写入次数
		// 'SHOW_CACHE_TIMES'=>true,       // 显示缓存操作次数
		// 'SHOW_USE_MEM'=>true,           // 显示内存开销
		// 'SHOW_LOAD_FILE' =>true,   // 显示加载文件数
		// 'SHOW_FUN_TIMES'=>true ,  // 显示函数调用次数
     );
?>