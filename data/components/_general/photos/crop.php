<form action="<?php echo(GeneralGetVars::$urltosubmit);?>" method="post">
	<input type="hidden" name="submit" value="cropusersavatar"/>
	<input type="hidden" name="x1" value=""/>
	<input type="hidden" name="y1" value=""/>
	<input type="hidden" name="x2" value=""/>
	<input type="hidden" name="y2" value=""/>
	<input type="hidden" name="w" value=""/>
	<input type="hidden" name="h" value=""/>
	<?php
GeneralImagesCrop::set_sizes();
GeneralImagesCrop::set_selection_area();
include("js/scripts/_general/photos/photos_crop.php");
?>
<span class="grey">Выберите участок фотографии, который будет отображаться помимо вашей личной страницы</span>
<div class="v_i_b"></div>
<img width="400" id="avatar" src="<?php echo(GeneralImagesCrop::$image_url."?".GeneralGlobalVars::$timeunix); ?>" style="float:left;">
<div style="clear:both;"></div>
<div class="v_i_b"></div>


	<input type="submit" value="Изменить" class="btn btn-success btn-small"/>
	<input type="hidden" name="format" value="<?php echo($row['site_photo_format']);?>"/>					
</form>
<?php
//GeneralImagesPreload::input("images/_general/general___send_submit_hover.png"); 
?>