<?php
$query="
SELECT
	photo.id_topic AS id_topic,

	photo.id_photo AS id_photo,	
	photo.page_photo AS page_photo,	
	
	photo.name_photo AS name_photo,		
	photo.format_photo AS format_photo,	

	 	 	 	 	 	 
	
	photo___topics_".GeneralGetVars::$var2.".id_user AS t_id_user

	

	FROM
		(SELECT *
		FROM 
		photo___photos_".GeneralGetVars::$var2." AS pp
		WHERE pp.id_topic=".GeneralGetVars::$var3."		
		ORDER BY pp.id_photo DESC 
		LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage.")
		AS photo
	LEFT JOIN
			photo___topics_".GeneralGetVars::$var2."
		ON  
			photo___topics_".GeneralGetVars::$var2.".id_topic=photo.id_topic";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>