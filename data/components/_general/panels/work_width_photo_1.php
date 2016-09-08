<?php if($current_var2) { ?>
<div class="lead"><?php echo($current_var3);?>:</div>
<?php } ?>




<input type="file" name="img1" style="width:170px;" id="load_photo_img1<?php echo($current_var4);?>">
<div class="v_i_b"></div>
<div class="link_lead_small">Описание к фото:</div>
<div class="v_i_b"></div>
<textarea maxlength="1000" style="height:100px; width: 224px;" id="inputtexttextarea_1<?php echo($current_var4);?>"  name="inputtexttextarea_1" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'><?php echo($current_var5);?></textarea>
<div class="v_i_b"></div>



<?php if ($current_var6==1) {//если разрешено ?><div style="float:left; margin-right:10px;" class="btn btn-warning btn-small" onclick="general___swim_hide('<?php echo($current_var7);?>');">убрать</div><?php } ?>
	<div style="float:left;"><input value="сохранить" class="btn btn-success btn-small" type="submit"></div>

	<div style="clear:both"></div>










<?php //GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>






<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="right" width="50%"> </td>
<td align="left" width="50%"> </td>
</tr>
</table>