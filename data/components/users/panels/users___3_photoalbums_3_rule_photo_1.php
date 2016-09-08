<?php // такое же как и в data\components\photo\panels\photo___3_rule_photo_1.php ?>
<a class="btn btn-info btn-small" onclick="general___swim_show_hide('redact_photo_in_album_1'); general___swim_hide('new_photo_in_album_1');">Редактировать текущее фото&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<?php
$current_var4="_1";
$current_var1="
	action=\"".GeneralGetVars::$urltosubmit."\" 
	enctype=\"multipart/form-data\" 
	onsubmit=\"return general___redact_photo('".$current_var4."');\">
	<input name=\"id_photo\" value=\"".$row['id_photo']."\" type=\"hidden\">
	<input name=\"submit\" value=\"redactphotoinusersphotoalbum\" type=\"hidden\"";//текст формы редактирования фото
$current_var2="redact";
$current_var3="Редактировать фото";
$current_var5=$row['name_photo'];		
$current_var6=1;
$current_var7="redact_photo_in_album_1";
?><div class="v_i_b"></div>
<div id="redact_photo_in_album_1" class="swim_panel well">
	
	<form method="post" <?php echo($current_var1);?>>
	<?php include("data/components/_general/panels/work_width_photo_1.php");	?>
	</form>
	<?php if (GeneralDialogWindows::$messages_presence==1){?>	
		<div class="v_i_s"></div>	
		<div class="red">Внимание! При смене фото, все текущие комментарии сотрутся.</div>
	<?php } ?>
</div>
<div class="v_i_b"></div>
<?php if (UsersPhotoalbumsBase::$flagonephoto==0){?>
	<div class="v_i_b"></div>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Удалить это фото?');">
	<input name="submit" value="deletephotousersphotoalbum" type="hidden">
	<input name="id_photo" value="<?php echo($row['id_photo']);?>" type="hidden">
	<input name="nameimg" value="<?php echo($row['id_photo'].".".$row['format_photo']);?>" type="hidden">
	<input value="удалить фото" class="btn btn-danger btn-small"  type="submit">	
	</form>
	<?php //GeneralImagesPreload::input("images/_general/general___delete_photo_submit_text_11_hover.png");?>
<?php } ?>

	<div class="v_i_b"></div>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___swim_prompt('Чтобы удалить тему, введите слово: delete','delete');">
	<input name="submit" value="deleteusersphotoalbum" type="hidden">
	<input value="Удалить тему" class="btn btn-inverse btn-small" type="submit">	
	</form>
	<?php //GeneralImagesPreload::input("images/_general/general___delete_topic_submit_text_11_hover.png");?>
<div class="v_i_b"></div>