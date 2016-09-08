<div class="list_horizontal1_1">
<?php
include($current_var1);
while ($list_horizontal_1_row1=GeneralMYSQL::fetch_array($list_horizontal_1_res)){
GeneralImagesCalculate::set_size_for_image_in_view($list_horizontal_1_row['size_photo'],$current_var2);//задаем размеры для изображения	?>	
	<div class="list_horizontal1_2">
		<img src="<?php echo($current_var3);?>" width="<?php echo(GeneralImagesCalculate::$view_width);?>" height="<?php echo(GeneralImagesCalculate::$view_height);?>" class="refimage">
	</div>
	<?php }
	GeneralMYSQL::free($list_horizontal_1_res);
	?>
</div>