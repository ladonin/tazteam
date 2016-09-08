<div class="photo3_11"><?php echo($current_var4);?>:</div>
<div class="photo2_13">
	<div class="photo2_15">
		<input type="file" name="img1" id="new_phototopic_img1">
	</div>
	<div class="v_i_b"></div>
	<div class="photo2_17">Описание к фото:</div>
	<div class="v_i_b"></div>
	<textarea maxlength="1000" class="inputtexttextarea photo2_16" id="inputtexttextarea_1"  name="inputtexttextarea_1" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'></textarea>
	<div class="v_i_b"></div>
	<div class="photo2_11">
		<input value=" " class="submit_send" type="submit">
	</div>
	<?php if ((GeneralGetVars::$var1="photo")&&(GeneralPageTree::$nesting==2)) {//если это сообщение при создании темы ?>
		<div class="photo2_12 small_link" onclick="general___swim_show_hide('swim_new_topic');">убрать</div>
		<div style="clear:both"></div>
	<?php } ?>
</div>
<?php GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>