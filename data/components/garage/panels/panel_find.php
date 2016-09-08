<table cellpadding="0" cellspacing="0" class="panel_topics_1">
<tr>
<td align="left" class="panel_topics_2">
	
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="1%">
		<div class="padding_right_10"><?php echo(GeneralPagesCounter::$htmlarrows); ?></div>
	</td>
	<td align="left" width="99%">
		<?php if (UsersMyData::$identified==1) {//для зарегистрированных пользователей ?>	
		<input value="" class="submit_new_announcement" type="button" onclick="general___swim_show_hide('swim_new_announcement');">
		<?php GeneralImagesPreload::input("images/_general/general___new_announcement_submit_hover.png"); } 
		else{?>
		<input value="" class="submit_new_announcement_deactive" type="button">
		<?php } ?>		
	</td>
	</tr>
	</table>	

	
	
</td>
<td align="right" class="panel_topics_3" valign="bottom"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>


<div class="v_i_b"></div>



<?php include("data/components/automarket/panels/new_announcement.php");?>
<div class="grey_line_1"></div>
<div class="v_i_b"></div>