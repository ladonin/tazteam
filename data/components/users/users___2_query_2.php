<?php
	$queryfriends="SELECT id_user,sn_photo_url_from_small,sn_photo_url_from_huge,dir_user,site_photo_format,gen_photo,site_login_status,site_mail_user,gen_login_user,gen_name_user,gen_surname_user,gen_timecoming FROM registrated_users___main_data WHERE id_user IN (";
	$cv2=1;
	foreach(UsersBase::$friends_array as $key=>$value){
		if ($cv2!=1) {$queryfriends.=",";}
		$queryfriends.=$value;
		if ($cv2==$cv1) {break;}
		$cv2++;}
		$queryfriends.=")";
	$resfriends=GeneralMYSQL::query($MSQLc,$queryfriends);	
?>




