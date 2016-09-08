<?php
$query="SELECT 
			gen_login_user,
			site_mail_user,
			gen_name_user,
			gen_surname_user,
			site_login_status,
			id_user,
			dir_user,
			sn_photo_url_from_small,
			sn_photo_url_from_big,
			sn_photo_url_from_huge,
			site_photo_format,
			gen_photo,
            site_points
		FROM registrated_users___main_data
		WHERE ".$current_var2." ORDER by site_points DESC, RAND() LIMIT ".$current_var1;
		$res=GeneralMYSQL::query($MSQLc,$query);
?>





