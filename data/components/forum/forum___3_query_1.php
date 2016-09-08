<?php
$query="
SELECT	
	forum___messages_".GeneralGetVars::$var2.".id_topic AS id_topic,	
	forum___messages_".GeneralGetVars::$var2.".id_message AS id_message,
	forum___messages_".GeneralGetVars::$var2.".id_user AS id_autor_message,	
	forum___messages_".GeneralGetVars::$var2.".date_message AS date_message,	
	forum___messages_".GeneralGetVars::$var2.".number_redactions AS number_redactions,
	forum___messages_".GeneralGetVars::$var2.".date_last_redaction AS date_last_redaction,
	forum___messages_".GeneralGetVars::$var2.".id_message_to_citate AS id_message_to_citate,	
	forum___messages_".GeneralGetVars::$var2.".text_message AS text_message,		
	forum___messages_".GeneralGetVars::$var2.".imagesattached AS images_message,	
	forum___messages_".GeneralGetVars::$var2.".imagesattached_sizes AS imagessizes_message,		

	message_autor.gen_login_user AS m_a_login_user,
	message_autor.site_mail_user AS m_a_mail_user,
	message_autor.gen_name_user AS m_a_name_user,
	message_autor.gen_surname_user AS m_a_surname_user,
	message_autor.site_login_status AS m_a_login_status,
	message_autor.gen_timecoming AS m_a_timecoming,			
	message_autor.gen_photo AS m_a_photo,	
	message_autor.site_photo_format AS m_a_photo_format,	
	message_autor.dir_user AS m_a_dir_user,
	message_autor.sn_photo_url_from_small AS m_a_photo_url_from_small,
	message_autor.sn_photo_url_from_huge AS m_a_photo_url_from_huge,
	
	message_autor_making.forums_messages AS m_a_count_messages,

	citate_autor.id_user AS c_a_id_user,
	citate_autor.gen_login_user AS c_a_login_user,
	citate_autor.site_mail_user AS c_a_mail_user,
	citate_autor.gen_name_user AS c_a_name_user,
	citate_autor.gen_surname_user AS c_a_surname_user,
	citate_autor.site_login_status AS c_a_login_status,	
	citate_autor_making.forums_messages AS c_a_count_messages,	

	messages_with_citate.text_message AS text_citate,
	messages_with_citate.imagesattached AS images_citate,
	messages_with_citate.imagesattached_sizes AS imagessizes_citate,

	forum_topics.id_user AS autor_topic
	
	
	
	
	
	
	
	
	
	
	FROM
		(SELECT	
			forum___messages_".GeneralGetVars::$var2.".id_topic,	
			forum___messages_".GeneralGetVars::$var2.".id_message,
			forum___messages_".GeneralGetVars::$var2.".id_user,	
			forum___messages_".GeneralGetVars::$var2.".date_message,	
			forum___messages_".GeneralGetVars::$var2.".number_redactions,
			forum___messages_".GeneralGetVars::$var2.".date_last_redaction,
			forum___messages_".GeneralGetVars::$var2.".id_message_to_citate,
			forum___messages_".GeneralGetVars::$var2.".imagesattached,
			forum___messages_".GeneralGetVars::$var2.".imagesattached_sizes,
			forum___messages_".GeneralGetVars::$var2.".text_message
		FROM 
		forum___messages_".GeneralGetVars::$var2." 
		WHERE forum___messages_".GeneralGetVars::$var2.".id_topic='".GeneralGetVars::$var3."'
		ORDER BY forum___messages_".GeneralGetVars::$var2.".id_message ASC 
		LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage."		
		)
		AS forum___messages_".GeneralGetVars::$var2."
	LEFT JOIN
			registrated_users___main_data AS message_autor
		ON  
			message_autor.id_user=forum___messages_".GeneralGetVars::$var2.".id_user
		
	LEFT JOIN
			registrated_users___making_by AS message_autor_making
		ON  
			message_autor_making.id_user=forum___messages_".GeneralGetVars::$var2.".id_user		
		
		
		
		
		
		
		
		
		
		
		
		
		
	LEFT JOIN
			forum___topics_".GeneralGetVars::$var2." AS forum_topics
		ON  
			forum_topics.id_topic=forum___messages_".GeneralGetVars::$var2.".id_topic		
			
	LEFT JOIN			
			forum___messages_".GeneralGetVars::$var2." AS messages_with_citate
		ON			
			forum___messages_".GeneralGetVars::$var2.".id_message_to_citate=messages_with_citate.id_message AND forum___messages_".GeneralGetVars::$var2.".id_topic=messages_with_citate.id_topic
	LEFT JOIN
			registrated_users___main_data AS citate_autor			
		ON  
			messages_with_citate.id_user=citate_autor.id_user
			
	LEFT JOIN
			registrated_users___making_by AS citate_autor_making			
		ON  
			messages_with_citate.id_user=citate_autor_making.id_user			
			
			
			
			
			
			
			
			
			
			
	ORDER BY forum___messages_".GeneralGetVars::$var2.".id_message ASC
	";
	//echo($query);
	$res=GeneralMYSQL::query($MSQLc,$query);
?>