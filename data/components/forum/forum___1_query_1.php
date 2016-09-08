<?php
$query="
SELECT
	forum___sections.id_section AS id_section,
	forum___sections.name_section AS name_section,
	forum___sections.explanation_section AS explanation_section,
	forum___sections.number_topics AS number_topics,

	forum___sections.id_last_topic AS id_topic,
	forum___sections.name_last_topic AS name_topic,
	forum___sections.id_autor_last_topic AS id_autor_topic,

	registrated_users___main_data.gen_login_user AS login_user,
	registrated_users___main_data.site_mail_user AS mail_user,
	registrated_users___main_data.gen_name_user AS name_user,
	registrated_users___main_data.gen_surname_user AS surname_user,
	registrated_users___main_data.site_login_status AS login_status

	FROM 
		forum___sections
	LEFT JOIN 
			registrated_users___main_data
		ON  
			registrated_users___main_data.id_user=forum___sections.id_autor_last_topic
			
	ORDER BY forum___sections.id_section
	";	
	$res=GeneralMYSQL::query($MSQLc,$query);
?>