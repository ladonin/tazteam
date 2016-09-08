<table cellpadding="0" cellspacing="0">
<tr>
<td>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<table cellpadding="0" cellspacing="0">
	<tr>
	<td class="padding_left_10">
		<input style="border:1px solid #bbbbbb; width:150px;" name="name" value="<?php if (isset($_COOKIE[GeneralGetVars::$var1.'_find_query_name'])) {echo(htmlspecialchars($_COOKIE[GeneralGetVars::$var1.'_find_query_name'], ENT_QUOTES));} ?>">
		<input name="submit" value="find_news" type="hidden">
		<?php //GeneralImagesPreload::input("images/_general/general___find_submit_hover.png"); ?>
	</td>
	<td class="padding_left_10">
		<input value="найти" class="btn btn-info btn-small" type="submit">
	</td>
	</tr>
	</table>
	</form>
</td>
<?php if (NewsBase::$find_status==1){?>
<td class="padding_left_10" valign="middle">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<input name="submit" value="clearfindnews" type="hidden">
	<input value="очистить поиск" class="btn btn-warning btn-small" type="submit">	
	</form><?php //GeneralImagesPreload::input("images/_general/general___clear_find_submit_text_grey_11_line_hover.png"); ?>
</td>
<?php } ?>

</tr>
</table>