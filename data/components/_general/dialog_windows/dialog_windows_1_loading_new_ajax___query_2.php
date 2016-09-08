<?php
$query2="
	SELECT
		messages.id_message AS id_message,
		messages.text_message AS text_message,
		messages.id_user AS m_id_user,
		messages.date_message AS date_message,

		message_autor.gen_login_user AS m_login_user,
		message_autor.site_mail_user AS m_mail_user,
		message_autor.gen_name_user AS m_name_user,
		message_autor.gen_surname_user AS m_surname_user,
		message_autor.site_login_status AS m_login_status,	

		message_autor.gen_timecoming AS m_timecoming,			
		message_autor.gen_photo AS m_photo,			
		message_autor.dir_user AS m_dir_user,
		message_autor.site_photo_format AS m_photo_format,		
		message_autor.sn_photo_url_from_small AS m_photo_url_from_small,
		message_autor.sn_photo_url_from_huge AS m_photo_url_from_huge
		FROM			
			(SELECT 
				".$database.".id_message,
				".$database.".text_message,
				".$database.".id_user,
				".$database.".date_message
			FROM
				".$database."
			WHERE id_message>='".$newmess."' ";
				if ($condition1) {$query2.=" AND ".$database.".".$condition1;}	
				if ($condition2) {$query2.=" AND ".$database.".".$condition2;}
				if ($condition3) {$query2.=" AND ".$database.".".$condition3;}
				if ($condition4) {$query2.=" AND ".$database.".".$condition4;}
				if ($condition5) {$query2.=" AND ".$database.".".$condition5;}
		$query2.="
			ORDER BY 
				id_message ASC) AS messages
		LEFT JOIN 
			registrated_users___main_data AS message_autor
		ON  
			message_autor.id_user=messages.id_user";
$res2=GeneralMYSQL::query($MSQLc,$query2);
?>