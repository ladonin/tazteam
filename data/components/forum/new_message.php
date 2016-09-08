<span class="link_lead_small"><?php echo($current_var4);?></span><a name="message<?php echo(GeneralInputText::$id);?>" class="link_lead_small">:</a>
<div class="v_i_b"></div>
<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top">
<div class="padding_right_10">	<?php

	include("data/components/_general/inputtext/panel_top.php"); ?>
	<div class="v_i_b"></div>
	<textarea maxlength="1000" style="width:<?php echo($width_message_textarea_forum);?>px; height:<?php echo($height_message_textarea_forum);?>px;" class="inputtexttextarea" id="inputtexttextarea<?php echo(GeneralInputText::$id);?>"  name="inputtexttextarea" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'></textarea>

	<div class="v_i_b"></div>
	<input value="" type="hidden" name="ForumCitateId" id="ForumCitateId<?php echo(GeneralInputText::$id);?>">
	<input value="" type="hidden" name="inputtexthtml" id="inputtexthtml<?php echo(GeneralInputText::$id);?>">
	<input value="" type="hidden" name="inputtextnacked" id="inputtextnacked<?php echo(GeneralInputText::$id);?>">

    	<div style="float:left;" class="padding_right_10"><input value="Отправить" class="btn btn-success btn-small" type="submit"></div>


	<div style="clear:both"></div>
</div>	
</td>
<td align="left" valign="top" width="225">


	<b class="content_dark">Приложить фото:</b>
	<div class="v_i_b"></div>
	<input type="file" name="img1" id="img1"> <!--onclick="return general___send_message('inputtexttextarea','inputtexthtml','inputtextnacked','ForumCitateId');"-->
	<div class="v_i_b"></div>
	<input type="file" name="img2" id="img2">
	<div class="v_i_b"></div>
	<input type="file" name="img3" id="img3">

</td>
</tr>
</table>
<?php //GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>