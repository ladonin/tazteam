<table cellpadding="0" cellspacing="0">
<tr>
<td>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td valign="top">
		<input style="width:350px;" name="name" value="<?php 
        
        
        if (isset($_COOKIE[GeneralGetVars::$var1.'_find_query_name'])){echo(htmlspecialchars($_COOKIE[GeneralGetVars::$var1.'_find_query_name'], ENT_QUOTES));} ?>"
        type="text" placeholder="поиск по форуму">
		<input name="submit" value="find_forum" type="hidden">
		<?php //GeneralImagesPreload::input("images/_general/general___find_submit_hover.png"); ?>
	</td>
	<td class="padding_left_10" valign="top">
		<input value="найти" class="btn btn-info btn-small" type="submit">
	</td>
	</tr>
	</table>
	</form>
</td>
<?php if (ForumBase::$find_status==1){?>
<td class="padding_left_10" valign="top">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<input name="submit" value="clearfindforum" type="hidden">
	<input value="очистить поиск" class="btn btn-warning btn-small" type="submit">	
	</form><?php //GeneralImagesPreload::input("images/_general/general___clear_find_submit_text_grey_11_line_hover.png"); ?>
</td>
<?php } ?>

</tr>
</table>