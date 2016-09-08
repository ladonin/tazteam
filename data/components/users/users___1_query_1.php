<?php
$query="
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
		registrated_users___main_data ";
	if (UsersBase::$condition_main) {
	$query.=UsersBase::$condition_main." ";}
	$query.="	
	ORDER by id_user DESC
	LIMIT ".((GeneralPagesCounter::$N_cur-1)*GeneralPagesCounter::$rowsonpage).",".GeneralPagesCounter::$rowsonpage;
	$res=GeneralMYSQL::query($MSQLc,$query);
?>