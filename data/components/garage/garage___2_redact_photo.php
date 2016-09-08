<?php 

if (GarageForreg::$status_announcement==1){

?>
	<span class="panel_text_dark_small">Загрузить фото:</span>	
	<div class="v_i_b"></div>
<?php
	for($i=1;$i<=20;$i++){
		GarageForreg::$array_redact_announcement_empty_photos[$i]="";}
	GarageForreg::display_forms_images_in_redact_announcement();}
	
else if ((GarageForreg::$status_announcement==1)||(GarageForreg::$status_announcement==2)){

?>
	<span class="panel_text_dark_small">Обновить фото:</span>		
	<div class="v_i_b"></div>
<?php

	GarageForreg::detect_arrays_attached_photos_for_redact_announcement(GarageSendTopic::$array_data['img']);

	GarageForreg::display_images_in_redact_announcement();
GarageForreg::display_forms_images_in_redact_announcement();

}



?>