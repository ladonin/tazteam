<?php 

if (AutomarketForreg::$status_announcement==1){

?>
	<span class="panel_text_dark_small">Загрузить фото:</span>	
	<div class="v_i_b"></div>
<?php
	for($i=1;$i<=20;$i++){
		AutomarketForreg::$array_redact_announcement_empty_photos[$i]="";}
	AutomarketForreg::display_forms_images_in_redact_announcement();}
	
else if ((AutomarketForreg::$status_announcement==1)||(AutomarketForreg::$status_announcement==2)){

?>
	<span class="panel_text_dark_small">Обновить фото:</span>		
	<div class="v_i_b"></div>
<?php

	AutomarketForreg::detect_arrays_attached_photos_for_redact_announcement(AutomarketSendTopic::$array_data['img']);

	AutomarketForreg::display_images_in_redact_announcement();
AutomarketForreg::display_forms_images_in_redact_announcement();

}



?>