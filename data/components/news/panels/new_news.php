<div id="swim_new_news" class="swim_panel padding_left_10">
	<div class="big_text_bold">Новая тема:</div>
	<div class="v_i_b"></div>
	<?php
	if (GeneralSecurity::detect_administrator()==true) {//для администраторов
		?><form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
			<table cellpadding="0" cellspacing="0" width="200">
			<tr>
			<td align="left" class="big_text">
				<input type="radio" name="themepage" id="news_radio_themepage1" value="1" checked="checked"> <span style="cursor:pointer;" onclick="document.getElementById('news_radio_themepage1').checked='ckecked';">Автотема</span>
				<div class="v_i_b"></div>
				<input type="radio" name="themepage" id="news_radio_themepage2" value="2"> <span style="cursor:pointer;" onclick="document.getElementById('news_radio_themepage2').checked='ckecked';">Другая тема, пока не выбирать</span>
			</td>
			</tr>
			</table>
			<div class="v_i_b"></div>
			<div class="v_i_b"></div>			
			<table cellpadding="0" cellspacing="0" width="200">
			<tr>
			<td align="left" valign="bottom" width="1%">
				<input value=" " class="submit_follow" type="submit">
			</td>
			<td align="left" valign="bottom" class="padding_left_10">	
				<span class="work_width_photo_6 small_link" onclick="general___swim_hide('swim_new_news');">убрать</span>
			 </td>
			</tr>
			</table>
			<input name="submit" value="detectthemepagefornewnews" type="hidden">
		</form><?php
	GeneralImagesPreload::input("images/_general/general___follow_submit_hover.png");
		}
	?>
	<div class="v_i_b"></div>
</div>