<?php

//,
//	LEFT(news.contentnacked, 80) as contentnacked
$query2="
SELECT
	news.id as id,
	news.themepage as themepage,
	news.name as name,
	news.img as img
FROM
	news WHERE id<'".GeneralGetVars::$var2."' AND themepage='".NewsBase::$themepage."' ";	//в будущем убрать 	 and img!=''
if (NewsBase::$condition_added1) {
	$query2.="AND ".NewsBase::$condition_added1." ";}		
$query2.="ORDER BY id DESC LIMIT ".NewsBase::limit_added;
	$res2=GeneralMYSQL::query($MSQLc,$query2);
?>