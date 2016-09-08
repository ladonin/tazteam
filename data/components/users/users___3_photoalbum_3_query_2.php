<?php
$query2="	
	(SELECT	id_photo,page_photo,id_topic,format_photo,size_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE id_topic='".GeneralGetVars::$var3."' ORDER BY id_photo ASC LIMIT ".PhotoBase::detect_and_return_left_num_photo().",".PhotoBase::count_photos_self_in_list.")
	UNION ALL
	(SELECT	id_photo,page_photo,id_topic,format_photo,size_photo FROM photo___photos_".GeneralGetVars::$var2." WHERE id_topic!='".GeneralGetVars::$var3."' ORDER BY RAND() LIMIT ".PhotoBase::count_photos_random_in_list.")
	";
$res2=GeneralMYSQL::query($MSQLc,$query2);
?>