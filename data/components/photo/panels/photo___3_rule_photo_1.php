



<?php 

	if (PhotoBase::detect_belong_topic_to_user()==true){?>
		<a class="btn btn-success btn-small" onclick="general___swim_show_hide('new_photo_in_album_1'); general___swim_hide('redact_photo_in_album_1');">Загрузить новое фото в альбом</a>
		<?php
		$current_var4="_2";
		$current_var1="
			action=\"".GeneralGetVars::$urltosubmit."\" 
			enctype=\"multipart/form-data\"
			onsubmit=\"return general___new_photo('".$current_var4."');\">	
			<input name=\"submit\" value=\"sendnewphotoinphoto\" type=\"hidden\"";//текст формы редактирования фото
		$current_var2="new";
		$current_var3="Загрузить новое фото";
		$current_var5="";		
		$current_var6=1;
		$current_var7="new_photo_in_album_1";
		?><div class="v_i_b"></div>
		<div id="new_photo_in_album_1" class="swim_panel well">
			
			<form method="post" <?php echo($current_var1);?>>
			<?php	

        if($current_var2) { ?>
            <div class="lead"><?php echo($current_var3);?>:</div>
        <?php } ?>
        <input type="file" name="img1" style="width:170px;" id="load_photo_img1<?php echo($current_var4);?>">
        <div class="v_i_b"></div>
        <div class="link_lead ">Описание к фото:</div>
        <textarea maxlength="1000" style="height:100px; width:224px" id="inputtexttextarea_1<?php echo($current_var4);?>"  name="inputtexttextarea_1" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'><?php echo($current_var5);?></textarea>
        <div class="v_i_b"></div>
        
        <?php if ($current_var6==1) {//если разрешено ?>
            <div style="float:left;" class="btn btn-warning btn-small" onclick="general___swim_hide('<?php echo($current_var7);?>');">убрать</div><?php 
        } ?>
        
        <div style="float:left;" class="padding_left_10"><input value="отправить" class="btn btn-success btn-small " type="submit"></div>

    	
        <?php //GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>
        <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="right" width="50%"> </td>
        <td align="left" width="50%"> </td>
        </tr>
        </table>
        
        <?php
            //include("data/components/_general/panels/work_width_photo_1.php");	
        ?>
			</form>
		</div>
		<?php } ?>





















<?php // такое же как и в data\components\users\panels\users___3_photoalbums_3_rule_photo_1.php ?>
<a class="btn btn-info btn-small" onclick="general___swim_show_hide('redact_photo_in_album_1'); general___swim_hide('new_photo_in_album_1');">Редактировать текущее фото&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
<?php
$current_var4="_1";
$current_var1="
	action=\"".GeneralGetVars::$urltosubmit."\" 
	enctype=\"multipart/form-data\" 
	onsubmit=\"return general___redact_photo('".$current_var4."');\">
	<input name=\"id_photo\" value=\"".$row['id_photo']."\" type=\"hidden\">
	<input name=\"submit\" value=\"redactphotoinphoto\" type=\"hidden\"";//текст формы редактирования фото
$current_var2="redact";
$current_var3="Редактировать фото";
$current_var5=$row['name_photo'];		
$current_var6=1;
$current_var7="redact_photo_in_album_1";
?>	<div class="v_i_b"></div>
<div id="redact_photo_in_album_1" class="swim_panel well">

	<form method="post" <?php echo($current_var1);?>>
	<?php include("data/components/_general/panels/work_width_photo_1.php");	?>
	</form>
	<?php if (GeneralDialogWindows::$messages_presence==1){?>	
		<div class="v_i_s"></div>	
		<div class="red">Внимание! При смене фото, все текущие комментарии сотрутся.</div>
	<?php } ?>
</div>

<?php if (PhotoBase::$flagonephoto==0){?>
	<div class="v_i_b"></div>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Удалить это фото?');">
	<input name="submit" value="deletephotophoto" type="hidden">
	<input name="id_photo" value="<?php echo($row['id_photo']);?>" type="hidden">
	<input name="nameimg" value="<?php echo($row['id_photo'].".".$row['format_photo']);?>" type="hidden">
	<input value="Удалить фото" class="btn btn-danger btn-small" type="submit">	
	</form>
	<?php //GeneralImagesPreload::input("images/_general/general___delete_photo_submit_text_11_hover.png");?>
<?php } ?>

<div class="v_i_b"></div>
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___swim_prompt('Чтобы удалить тему, введите слово: delete','delete');">
	<input name="submit" value="deletephototopic" type="hidden">
	<input value="Удалить тему" class="btn btn-inverse btn-small" type="submit">	
	</form>
	<?php //GeneralImagesPreload::input("images/_general/general___delete_topic_submit_text_11_hover.png");?>
<div class="v_i_b"></div>