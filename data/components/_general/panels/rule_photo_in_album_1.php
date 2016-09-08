<div class="redact_photo_in_album_1_1">
	<span class="small_link_noline" onclick="general___swim_show_hide('redact_photo_in_album_1_redact'); general___swim_hide('redact_photo_in_album_1_new');">Обновить фото</span>
</div>
<div id="redact_photo_in_album_1_redact" class="redact_photo_in_album_1_2">
	<div class="v_i_b"></div>
	<form method="post" <?php echo($current_var1);?>>
		<?php
		include("data/components/_general/panels/work_width_photo_1.php");
		?>
	</form>
</div>

<div class="v_i_b"></div>

<div class="redact_photo_in_album_1_1">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>/delete">
	<input name="submit" value="deletephotophoto" type="hidden">
	<input value=" " class="submit_delete_text_11" type="submit">	
	</form>
</div>

<div class="v_i_b"></div>
<div class="v_i_b"></div>
<div class="v_i_b"></div>

<div class="redact_photo_in_album_1_1">
	<img src="http://mapstore.org/my_portfolio/tazteam.net/images/_general/general___new_photo_photo_button.png" width="122" height="47"  class="refimage" onclick="general___swim_show_hide('redact_photo_in_album_1_new'); general___swim_hide('redact_photo_in_album_1_redact');">
</div>
<div id="redact_photo_in_album_1_new" class="redact_photo_in_album_1_2">
	<div class="v_i_b"></div>
	<form method="post" <?php echo($current_var1);?>>
		<?php
		include("data/components/_general/panels/work_width_photo_1.php");
		?>
	</form>
</div>


<?php

/*
редактировать это фото
(текст, который делает втдимым дополнительное поле редактирования)

удалить это фото
(submit в виде текста, со ссылкой текущей + delete в конце, потом после удаления возврат на следующую фотку)

загрузить новое фото
(большая картинка ,при клике на которую делается видимым поле загрузки нового фото)
*/

GeneralPagesCounter::calculate_to_outer($MSQLc, GeneralGetVars::$var1."___topics_".GeneralGetVars::$var2,"id_topic>='".GeneralGetVars::$var3."'",0,0,0,0);
?>
