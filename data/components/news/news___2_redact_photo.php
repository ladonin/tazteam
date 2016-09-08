<?php 

if (NewsForreg::$status_news==1){

?>
	<div class="big_text_bold">Загрузить фото:</div>		
	<div class="v_i_b"></div>
<?php
	for($i=1;$i<=20;$i++){
		NewsForreg::$array_redact_news_empty_photos[$i]="";}
	NewsForreg::display_forms_images_in_redact_news();}
	
else if ((NewsForreg::$status_news==1)||(NewsForreg::$status_news==2)){

?>
	<div class="big_text_bold">Обновить фото:</div>		
	<div class="v_i_b"></div>
<?php

	NewsForreg::detect_arrays_attached_photos_for_redact_news(NewsSendTopic::$array_data['img']);

	NewsForreg::display_images_in_redact_news();
NewsForreg::display_forms_images_in_redact_news();

}



?>