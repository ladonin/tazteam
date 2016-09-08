<?php
$query="
SELECT
	topics.id_topic AS id_topic,
	topics.id_user AS id_autor_topic,
	topics.name_topic AS name_topic,

	photos.last_id_photo AS id_photo,
	pf.format_photo AS format_photo,
	pf.page_photo AS page_photo,
	photos.count_photo AS count_photo,	
	
	
	
	
	topic_autor.gen_login_user AS t_login_user,
	topic_autor.site_mail_user AS t_mail_user,
	topic_autor.gen_name_user AS t_name_user,
	topic_autor.gen_surname_user AS t_surname_user,
	topic_autor.site_login_status AS t_login_status

	FROM
		(SELECT pt.id_topic, pt.id_user, pt.name_topic 
		FROM 
		photo___topics_".GeneralGetVars::$var2." AS pt
		ORDER BY pt.id_topic DESC 
		LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage.") 
		AS topics
	LEFT JOIN 
			(SELECT MAX(pp.id_photo) last_id_photo, COUNT(pp.id_photo) count_photo,pp.id_topic FROM photo___photos_".GeneralGetVars::$var2." as pp GROUP BY pp.id_topic) as photos
		ON  
			photos.id_topic=topics.id_topic
	LEFT JOIN
			photo___photos_".GeneralGetVars::$var2." AS pf
		ON  
			pf.id_photo=photos.last_id_photo AND pf.id_topic=photos.id_topic
	LEFT JOIN
			registrated_users___main_data AS topic_autor
		ON  
			topic_autor.id_user=topics.id_user
	ORDER BY topics.id_topic DESC
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>