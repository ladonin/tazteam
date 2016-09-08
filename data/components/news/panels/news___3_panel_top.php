<?php
GeneralPagesCounter::$rowspage_name="rowspagenews1";//копия такой страницы - по присваиванию номеров страниц
GeneralPagesCounter::calculate_to_outer($MSQLc, "news","id>='".GeneralGetVars::$var2."'","themepage='".NewsBase::$themepage."'",0,0,0);
?>



<table cellpadding="0" cellspacing="0">
<tr>
<td align="left" style="width:10px; padding:0px 10px 0px 10px;">
	<a href="<?php echo(GeneralGlobalVars::url);?>/<?php echo(GeneralGetVars::$var1);?>=<?php echo(GeneralPagesCounter::$N_cur_to_outer);?>" class="big_link">наверх</a>
</td>
</tr>
</table>













<?php if (GeneralSecurity::detect_administrator()==true) { ?>
<div class="v_i_b"></div>



<table cellpadding="0" cellspacing="0">
<tr>
<td align="left" class="padding_left_10">
	<input value=" " class="submit_new_announcement" type="button" onclick="javascript:location.href='<?php echo(GeneralGlobalVars::url."/".GeneralGetVars::$var1."/redact");?>'">
	<?php GeneralImagesPreload::input("images/_general/general___new_announcement_submit_hover.png"); ?>
</td>
<td align="left" class="padding_left_10">
	<a href="<?php echo(GeneralGlobalVars::url);?>/<?php echo(GeneralGetVars::$var1);?>/redact=<?php echo($row['id']);?>" class="small_dark_link">редактировать</a>
</td>
<td align="left" class="small_dark_link padding_left_10">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Удалить новость?');">
	<input name="submit" value="deletenews" type="hidden">
	<input name="id" value="<?php echo(GeneralGetVars::$var3);?>" type="hidden">
	<input value=" " class="submit_delete_text_grey_11_line" type="submit">	
	</form>
	<?php GeneralImagesPreload::input("images/_general/general___delete_submit_text_grey_11_line_hover.png");?>
</td>

</tr>
</table>
<?php } ?>
<div class="v_i_b"></div>
<div class="grey_line_1"></div>
<div class="v_i_b"></div>


