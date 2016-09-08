<div class="photo3_13">
	<span class="small_link_noline" onclick="general___swim_show_hide('redact_photo_in_album_1'); general___swim_hide('new_photo_in_album_1');">Редактировать фото</span>
</div>
<?php
$current_var4="_1";
$current_var1="
	action=\"".GeneralGetVars::$urltosubmit."\" 
	enctype=\"multipart/form-data\" 
	onsubmit=\"return general___redact_photo('".$current_var4."');\">
	<input name=\"id_photo\" value=\"".$row['id_photo']."\" type=\"hidden\">
	<input name=\"submit\" value=\"redactphotoinphoto\" type=\"hidden\"";//текст формы редактирования фото
$current_var2="redact";
$current_var3="Редактировать фотографию";
$current_var5=$row['name_photo'];		
$current_var6=1;
$current_var7="redact_photo_in_album_1";
?>
<div id="redact_photo_in_album_1" class="photo3_14">
	<div class="v_i_b"></div>
	<form method="post" <?php echo($current_var1);?>>
	<?php	include("data/components/_general/panels/work_width_photo_1.php");	?>
	</form>
	<?php if (GeneralDialogWindows::$messages_presence==1){?>	
		<div class="v_i_s"></div>	
		<div class="explanation padding_left_10">Внимание! При смене фото, все текущие комментарии сотрутся.</div>
	<?php } ?>
</div>


<div class="v_i_b"></div>


<?php if (UsersPhotoalbumsBase::$flagonephoto==0){?>
	<div class="photo3_13">
		<div class="v_i_b"></div>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Удалить это фото?');">
		<input name="submit" value="deletephotophoto" type="hidden">
		<input name="id_photo" value="<?php echo($row['id_photo']);?>" type="hidden">
		<input name="nameimg" value="<?php echo($row['id_photo'].".".$row['format_photo']);?>" type="hidden">
		<input value=" " class="submit_delete_photo_text_11" type="submit">	
		</form>
		<?php GeneralImagesPreload::input("images/_general/general___delete_submit_text_11_hover.png");?>
	</div>
<?php } ?>






<div class="photo3_13">
	<div class="v_i_b"></div>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___swim_prompt('Чтобы удалить тему, введите слово: delete','delete');">
	<input name="submit" value="deletephototopic" type="hidden">
	<input value=" " class="submit_delete_topic_text_11" type="submit">	
	</form>
	<?php GeneralImagesPreload::input("images/_general/general___delete_topic_submit_text_11_hover.png");?>
</div>