<?php
$query="
SELECT
	photo.id_album AS id_album,
	photo.dir_album AS dir_album,	
	photo.id_photo AS id_photo,	
	photo.page_photo AS page_photo,
	photo.format_photo AS format_photo,
	photo.name_photo AS name_photo,	
	photo.id_user AS t_id_user
	FROM
		registrated_users___photoalbums_photos AS photo
	WHERE 
		photo.id_user=".GeneralGetVars::$var2."
		AND
		photo.id_album=".GeneralGetVars::$var4."		
	ORDER BY photo.id_photo DESC 
	LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage;
	$res=GeneralMYSQL::query($MSQLc,$query);
?>