<?php
$dialog_windows_1_query="
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
		message_autor.site_photo_format AS m_photo_format,
		message_autor.dir_user AS m_dir_user,
		message_autor.sn_photo_url_from_small AS m_photo_url_from_small,
		message_autor.sn_photo_url_from_huge AS m_photo_url_from_huge			

		FROM			
			(SELECT 
				".GeneralDialogWindows::$database.".id_message,
				".GeneralDialogWindows::$database.".text_message,
				".GeneralDialogWindows::$database.".id_user,
				".GeneralDialogWindows::$database.".date_message
			FROM
				".GeneralDialogWindows::$database."
			WHERE id_message>'".GeneralDialogWindows::$id_message_start."'";
				if (GeneralDialogWindows::$condition1) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition1;}	
				if (GeneralDialogWindows::$condition2) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition2;}
				if (GeneralDialogWindows::$condition3) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition3;}
				if (GeneralDialogWindows::$condition4) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition4;}
				if (GeneralDialogWindows::$condition5) {$dialog_windows_1_query.=" AND ".GeneralDialogWindows::$database.".".GeneralDialogWindows::$condition5;}	
		$dialog_windows_1_query.="
			ORDER BY 
				id_message ASC) AS messages
		LEFT JOIN 
			registrated_users___main_data AS message_autor
		ON  
			message_autor.id_user=messages.id_user";
$dialog_windows_1_res=GeneralMYSQL::query($MSQLc,$dialog_windows_1_query);		