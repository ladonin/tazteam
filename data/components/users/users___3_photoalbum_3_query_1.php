<?php
$query="
SELECT
	photo.id_topic AS id_topic,
	photo.date AS date,
	photo.id_photo AS id_photo,	
	photo.page_photo AS page_photo,	
	
	
	photo.format_photo AS format_photo,	
	photo.size_photo AS size_photo,	
	photo.number_views AS number_views,	
 	photo.name_photo AS name_photo,		 	 	 	 	 	 
	
	photo___topics_".GeneralGetVars::$var2.".id_user AS t_id_user,	

	
	topic_autor.gen_login_user AS t_login_user,
	topic_autor.site_mail_user AS t_mail_user,
	topic_autor.gen_name_user AS t_name_user,
	topic_autor.gen_surname_user AS t_surname_user,
	topic_autor.site_login_status AS t_login_status
	
	
	

	FROM
		(SELECT *
		FROM 
		photo___photos_".GeneralGetVars::$var2." AS pp
		WHERE pp.id_topic=".GeneralGetVars::$var3." AND pp.id_photo=".PhotoBase::$id_photo_page."
		LIMIT 1)
		AS photo
	LEFT JOIN
			photo___topics_".GeneralGetVars::$var2."
		ON  
			photo___topics_".GeneralGetVars::$var2.".id_topic=photo.id_topic
	LEFT JOIN
			registrated_users___main_data AS topic_autor
		ON  
			topic_autor.id_user=photo___topics_".GeneralGetVars::$var2.".id_user
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>