<table cellpadding="0" cellspacing="0">
<tr>
<?php 
if (ForumForreg::$status_redactmessagepanel==1){//если статус панели равен 1, то есть есть смысл проверять возможность показа панели редактирования
	if (ForumForreg::detect_available_to_redact_or_delete_message($row['id_message'],$row['id_autor_message'])==true){
	if (GeneralPagesCounter::$whole_rows>1){?>
		<td width="1" valign="middle"><div class="padding_right_10">
			<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
			enctype="multipart/form-data" onsubmit="return confirm('Вы уверены, что хотите удалить сообщение №<?php echo($current_var1);?>?');">
			<input name="id_message" value="<?php echo($row['id_message']);?>" type="hidden">
			<input name="submit" value="deleteforummess" type="hidden">
			<input value="удалить" class="btn btn-link btn-small" type="submit">	
			<?php //GeneralImagesPreload::input("images/_general/general___delete_submit_text_grey_9_hover.png"); ?>
			</form></div>
		</td>
	<?php } ?>
	<td width="1" valign="middle"><div class="padding_right_10">
		<input value="редактировать" class="btn btn-link btn-small" type="button"  onclick="javascript:location.href='http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1);?>/<?php echo(GeneralGetVars::$var2);?>/<?php echo(GeneralGetVars::$var3);?>=<?php echo(GeneralGetVars::$num_page);?>/r=<?php echo($current_var1);?>#redact'">	
		<?php //GeneralImagesPreload::input("images/_general/general___redact_submit_text_grey_9_hover.png"); ?></div>
	</td>
	<?php }}?>
<td valign="middle"><div class="padding_right_10">
	<input value="цитировать" class="btn btn-link btn-small" type="button" onclick="javascript:location.href='#message<?php echo(GeneralInputText::$id);?>'; general___inputtextincludecitate('inputtexttextarea<?php echo(GeneralInputText::$id);?>', '<?php echo($current_var1);?>','<?php echo($current_var2);?>');">	
	<?php //GeneralImagesPreload::input("images/_general/general___citate_submit_text_blue_11_hover.png"); ?></div>
</td>

<?php if (UsersMyData::$id!=$row['id_autor_message']){//если это не наше сообщение ?>
<td valign="middle"><div class="padding_right_10">
	<input value="обратиться" type="button" class="btn btn-link btn-small" onclick="javascript:location.href='#message<?php echo(GeneralInputText::$id);?>';		general___inputtext_ask('inputtexttextarea<?php echo(GeneralInputText::$id);?>','<?php echo($current_var2);?>');">	
	<?php //general___scroll_comparating(-100); GeneralImagesPreload::input("images/_general/general___ask_submit_text_blue_11_hover.png"); ?></div>
</td>
<?php } ?>
</tr>
</table>
<script type="text/javascript">general___inputtextsetarraycitateNumberId(<?php echo($current_var1);?>,<?php echo($row['id_message']);?>);</script>