<table cellpadding="0" cellspacing="0">
<tr>
<td>
	<a class="btn btn-info btn-small" onclick="general___swim_hide('swim_new_announcement'); general___swim_show_hide('swim_garage_find_panel_autos');">Поиск</a>
</td>







<?php if (GarageBase::$find_status==1){?>

<td class="padding_left_20">

	
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
	<input name="submit" value="clearfindgarage" type="hidden">
	<input value="очистить поиск" style="color:#cc6600; font-weight:bold;" type="submit">	
	</form>	
	<?php GeneralImagesPreload::input("images/_general/general___clear_find_submit_text_orange_11_line_hover.png"); ?>
	
	
	
	
</td>
<?php } ?>


</tr>
</table>