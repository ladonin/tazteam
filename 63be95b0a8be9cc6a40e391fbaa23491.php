<?php 
     define('_SAPE_USER', '63be95b0a8be9cc6a40e391fbaa23491');
     require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php'); 
     $sape_articles = new SAPE_articles();
     echo $sape_articles->process_request();
?>
