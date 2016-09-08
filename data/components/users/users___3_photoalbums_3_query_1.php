<?php
$query="
SELECT
	photo.id_album AS id_album,
	photo.dir_album AS dir_album,	
	photo.dateloading AS dateloading,
	photo.id_photo AS id_photo,	
	photo.page_photo AS page_photo,	

	photo.format_photo AS format_photo,	
	photo.size_photo AS size_photo,	
	photo.number_views AS number_views,	
 	photo.name_photo AS name_photo,	 	 	 	 	 

	photo.id_user AS t_id_user,
	photo.vote AS vote,
	photo.rank AS rank,
	photo.idkey AS idkey,	
	
	topic_autor.gen_login_user AS t_login_user,
	topic_autor.site_mail_user AS t_mail_user,
	topic_autor.gen_name_user AS t_name_user,
	topic_autor.gen_surname_user AS t_surname_user,
	topic_autor.site_login_status AS t_login_status

	FROM
		(SELECT *
		FROM 
		registrated_users___photoalbums_photos AS pp
		WHERE pp.id_user=".GeneralGetVars::$var2." AND pp.id_album=".GeneralGetVars::$var4." AND pp.id_photo=".UsersPhotoalbumsBase::$id_photo_page."
		LIMIT 1)
		AS photo

	LEFT JOIN
			registrated_users___main_data AS topic_autor
		ON  
			topic_autor.id_user=photo.id_user
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>