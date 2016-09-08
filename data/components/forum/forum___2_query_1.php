<?php
$query="
SELECT
	topics.id_topic AS id_topic,
	topics.number_views AS number_views,
	topics.id_user AS id_autor_topic,
	topics.number_messages AS number_messages,
	topics.name_topic AS name_topic,

	forum___messages_".GeneralGetVars::$var2.".date_message AS date_last_message,
	forum___messages_".GeneralGetVars::$var2.".id_user AS id_autor_last_message,
	
	last_message_autor.gen_login_user AS lm_login_user,
	last_message_autor.site_mail_user AS lm_mail_user,
	last_message_autor.gen_name_user AS lm_name_user,
	last_message_autor.gen_surname_user AS lm_surname_user,
	last_message_autor.site_login_status AS lm_login_status,

	topic_autor.gen_login_user AS t_login_user,
	topic_autor.site_mail_user AS t_mail_user,
	topic_autor.gen_name_user AS t_name_user,
	topic_autor.gen_surname_user AS t_surname_user,
	topic_autor.site_login_status AS t_login_status

	FROM
		(SELECT ft.id_topic, ft.number_views, ft.id_user, ft.number_messages, ft.name_topic 
		FROM 
		forum___topics_".GeneralGetVars::$var2." AS ft
		ORDER BY ft.id_topic DESC 
		LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage.") 
		AS topics
	LEFT JOIN
			(SELECT fm.id_topic, MAX(fm.id_message) id_lastmessage FROM forum___messages_".GeneralGetVars::$var2." AS fm GROUP BY fm.id_topic) AS last_messages
		ON 
			last_messages.id_topic=topics.id_topic
	LEFT JOIN 
			forum___messages_".GeneralGetVars::$var2."
		ON  
			forum___messages_".GeneralGetVars::$var2.".id_topic=last_messages.id_topic AND forum___messages_".GeneralGetVars::$var2.".id_message=last_messages.id_lastmessage
	LEFT JOIN
			registrated_users___main_data AS topic_autor
		ON  
			topic_autor.id_user=topics.id_user
	LEFT JOIN
			registrated_users___main_data AS last_message_autor
		ON  
			last_message_autor.id_user=forum___messages_".GeneralGetVars::$var2.".id_user
	ORDER BY topics.id_topic DESC
	";
	$res=GeneralMYSQL::query($MSQLc,$query);
?>