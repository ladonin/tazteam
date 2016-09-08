<?php
	$query="
	SELECT
		registrated_users___main_data.gen_login_user,
		registrated_users___main_data.site_mail_user,
		registrated_users___main_data.gen_name_user,
		registrated_users___main_data.gen_surname_user,
		registrated_users___main_data.site_login_status,
		registrated_users___main_data.id_user,
		registrated_users___main_data.dir_user,
		registrated_users___main_data.sn_photo_url_from_small,
		registrated_users___main_data.sn_photo_url_from_big,
		registrated_users___main_data.sn_photo_url_from_huge,
		registrated_users___main_data.site_photo_format,
		registrated_users___main_data.gen_photo,
        registrated_users___making_by.forums_messages
	FROM registrated_users___making_by
	LEFT JOIN registrated_users___main_data ON registrated_users___making_by.id_user=registrated_users___main_data.id_user 
	ORDER by forums_messages DESC LIMIT ".$current_var1;
	$res=GeneralMYSQL::query($MSQLc,$query);
    ?>