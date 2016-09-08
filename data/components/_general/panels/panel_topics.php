<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" width="220">


	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="1%">
		<div class="padding_right_10"><?php echo(GeneralPagesCounter::$htmlarrows); ?></div>
	</td>
	<td align="left" width="99%"><?php

		if ((GeneralGetVars::$var1=="photo")&&(GeneralGetVars::$var2==1)){//если мы на странице ТОП от тазтим
			if (GeneralSecurity::detect_administrator()==true){?>
				<input value="создать альбом" class="btn btn-success btn-small" type="button" onclick="general___swim_show_hide('swim_new_topic');">
				<?php GeneralImagesPreload::input("images/_general/general___new_topic_submit_hover.png");}}
		
		else if (UsersMyData::$identified==1) {//для зарегистрированных пользователей ?>	
			<input value="создать альбом" class="btn btn-success btn-small" type="button" onclick="general___swim_show_hide('swim_new_topic');">
			<?php GeneralImagesPreload::input("images/_general/general___new_topic_submit_hover.png"); } 
		else {?>
		<input value="создать альбом" class="btn btn-success btn-small disabled" type="button">
		<?php } ?>	
	</td>
	</tr>
	</table>	

	
	
</td>
<td align="right" valign="bottom"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>



