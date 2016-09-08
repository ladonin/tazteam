<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" enctype="multipart/form-data" onsubmit="return general___send_message('inputtexttextarea<?php echo(GeneralInputText::$id);?>','inputtexthtml<?php echo(GeneralInputText::$id);?>','inputtextnacked<?php echo(GeneralInputText::$id);?>','ForumCitateId<?php echo(GeneralInputText::$id);?>',1);">
<input name="submit" value="redactforummess" type="hidden">

<span class="link_lead_small">Редактирование сообщения</span><a name="redact" class="panel_text_dark">:</a>

<div class="v_i_b"></div>


<table cellspacing="0" cellpadding="0" width="100%">
<tr>
<td align="left" valign="top">
<div class="padding_right_10">
	<?php 
	
	include("data/components/_general/inputtext/panel_top.php"); ?>
	<div class="v_i_b"></div>
	<textarea maxlength="1000" style="width:508px; height:200px;" class="inputtexttextarea" id="inputtexttextarea<?php echo(GeneralInputText::$id);?>"  name="inputtexttextarea" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'><?php echo(ForumForreg::return_text_message_source(ForumForreg::$id_mesage_to_redact,$MSQLc));?></textarea>
	<div class="v_i_b"></div>
	<input value="" type="hidden" name="ForumCitateId" id="ForumCitateId<?php echo(GeneralInputText::$id);?>">
	<input value="" type="hidden" name="inputtexthtml" id="inputtexthtml<?php echo(GeneralInputText::$id);?>">
	<input value="" type="hidden" name="inputtextnacked" id="inputtextnacked<?php echo(GeneralInputText::$id);?>">


	<div style="float:left;" class="padding_right_10"><input value="Отправить" type="submit" class="btn btn-success btn-small"></div>
	
	
	<div style="float:left;"><a href="<?php echo(GeneralGlobalVars::url);?>/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3."=".GeneralGetVars::$num_page);?>" class="btn btn-warning btn-small">отменить</a></div>
	<div style="clear:both"></div>
	<div class="v_i_b"></div>	
	
	
	<div class="grey">Чтобы цитировать сообщение, просто кликните по кнопке "цитировать" на нужном вам сообщении.<br> Если цитируемое сообщение находится на другой странице, то просто исправьте её номер (имя автора трогать не обязательно).</div>	
	<div class="v_i_b"></div>		
	
	
	
	
</div>
</td>
<td align="left" valign="top" width="225">
	<b class="content_dark">Фото:</b>
	<div style="clear:both"></div>
	<div class="v_i_b"></div>

	<?php
		ForumForreg::set_arrays_for_message_photos_in_redact($MSQLc);
		ForumForreg::display_images_in_redact_message();
		ForumForreg::display_forms_images_in_redact_message();		
		
		
	?>
	
	

	<input type="hidden" name="idmessagetoredact" value="<?php echo(ForumForreg::$id_mesage_to_redact);?>">	
</td>
</tr>
</table>
</form>
<?php GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>