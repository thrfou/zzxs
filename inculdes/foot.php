<?php
	$db->Close();
	
	$template = ob_get_contents();  
	$html->write($template);
?>