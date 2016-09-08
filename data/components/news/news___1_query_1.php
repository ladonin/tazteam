<?php
$query="
SELECT
	news.id as id,
	news.themepage as themepage,
	news.name as name,
	news.img as img,
	news.number_views as number_views,
	LEFT(news.contentnacked, 220) as contentnacked
	FROM
		news 
	WHERE themepage='".NewsBase::$themepage."' ";
	if (NewsBase::$condition_main) {
	$query.=NewsBase::$condition_main." ";}
	$query.="	
	ORDER by id DESC
	LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage;
	$res=GeneralMYSQL::query($MSQLc,$query);
?>