<table cellpadding="0" cellspacing="0">
<tr>
<td>
	<a class="btn btn-info btn-small" onclick="general___swim_show_hide('swim_users_find_panel');">Найти&nbsp;участников</a>
</td>
<?php if (UsersBase::$find_status==1){?>
<td class="padding_left_10">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<input name="submit" value="clearfindusers<?php echo($cv1);?>" type="hidden">
	<input value="очистить поиск" class="btn btn-warning btn-small" type="submit">
	</form>	
	<?php //GeneralImagesPreload::input("images/_general/general___clear_find_submit_text_orange_11_line_hover.png"); ?>
</td>
<?php } ?>
</tr>
</table>














