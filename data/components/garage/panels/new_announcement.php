<div id="swim_new_announcement" class="swim_panel">
	<div class="panel_text_dark">Новое объявление:</div>
	<div class="v_i_b"></div>
	<?php
	if (UsersMyData::$identified==1) {//для зарегистрированных пользователей
		?><form method="post" 
		action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
		enctype="multipart/form-data">		
	
		<div class="panel_text_dark_small">	Продам:</div>
		<div class="v_i_b"></div>	
		<input type="radio" name="themepage" id="automarket_radio_themepage1" value="1" checked="checked"> <span style="cursor:pointer;" onclick="document.getElementById('automarket_radio_themepage1').checked='ckecked';">Автомобили</span>
		<div class="v_i_b"></div>
		<input type="radio" name="themepage" id="automarket_radio_themepage2" value="2"> <span style="cursor:pointer;" onclick="document.getElementById('automarket_radio_themepage2').checked='ckecked';">Автозапчасти и аксессуары</span>
		<div class="v_i_b"></div>
		<div class="v_i_b"></div>
		<input type="radio" name="themepage" id="automarket_radio_themepage3" value="3"> <span style="cursor:pointer;" class="panel_text_dark_small" onclick="document.getElementById('automarket_radio_themepage3').checked='ckecked';">Куплю</span>



			<div class="v_i_b"></div>
			<div class="v_i_b"></div>			
			<table cellpadding="0" cellspacing="0" width="200">
			<tr>
			<td align="left" valign="middle" width="1%">
				<input value="" class="submit_follow" type="submit">
			</td>
			<td align="left" valign="middle" class="padding_left_10">	
				<div class="link_normal" onclick="general___swim_hide('swim_new_announcement');">убрать</div>
			 </td>
			</tr>
			</table>
			<input name="submit" value="detectthemepagefornewautomarket" type="hidden">
		</form><?php
	GeneralImagesPreload::input("images/_general/general___follow_submit_hover.png");
		}
	?>
	<div class="v_i_b"></div>
</div>