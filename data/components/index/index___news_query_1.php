<?php
$query="
	SELECT 
		id,
		name,
		themepage,
		img,
		LEFT(news.contentnacked, 800) as contentnacked
	FROM news
	WHERE themepage='".$current_var1."'
	ORDER by ".$current_var4." LIMIT 1";
	$res=GeneralMYSQL::query($MSQLc,$query);
	$row=GeneralMYSQL::fetch_array($res);
?>





