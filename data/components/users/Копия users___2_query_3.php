<?php
$query3="
SELECT
	id_user,
	dir_user,
	sn_id_user_vk,
	sn_id_user_ok,
	sn_id_user_mr,
	sn_id_user_ya,
	sn_id_user_go,
	sn_id_user_fb,
	gen_photo,
	site_photo_format,
	sn_photo_url_from_small,
	sn_photo_url_from_big,
	sn_photo_url_from_huge,
	gen_login_user,
	site_mail_user,
	gen_name_user,
	gen_surname_user,
	site_login_status,
	gen_city_name,
	gen_universities_name,
	gen_borndate_year,
	gen_borndate_month,
	gen_borndate_day,
	gen_timecoming
	FROM
		registrated_users___main_data 
		WHERE id_user!='".GeneralGetVars::$var2."' ";
	if (UsersBase::$condition_added1) {
		$query3.="AND (".UsersBase::$condition_added1.") ";}		
	$query3.="ORDER BY RAND() LIMIT ".UsersBase::limit_added;
		$res3=GeneralMYSQL::query($MSQLc,$query3);
?>