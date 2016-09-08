<?php
$query="
SELECT
	id_topic,
	id_photo,	
	page_photo,		
	name_photo,		
	format_photo
FROM 
	photo___photos_".GeneralGetVars::$var2." AS pp
	WHERE pp.id_topic=".GeneralGetVars::$var3."		
	ORDER BY pp.id_photo DESC 
	LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage;
$res=GeneralMYSQL::query($MSQLc,$query);
?>