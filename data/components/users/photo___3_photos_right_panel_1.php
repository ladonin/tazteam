<div class="photo3_6" id="div_var_margin">
	<script type="text/javascript">
		$('#div_var_margin').css({'margin-left':$('#table_var_width').width()+20+'px'}); 
	</script>
	<?php 
	include("data/components/photo/panels/photo___3_new_photo.php");
	?>
	
	<div class="photo3_7">
		<?php
		$current_var2=1;
		$current_var3=0;
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_2.php");
		while ($row2=GeneralMYSQL::fetch_array($res2)){
			$current_var3++;
			//GeneralImagesCalculate::set_size_for_image_in_view($row2['size_photo'],2);//задаем размеры для изображения
			PhotoBase::detect_current_num_page_photo($MSQLc,$row2['page_photo'],$row2['id_photo'],$row2['id_topic'],GeneralGetVars::$var2);
			if ((GeneralGetVars::$var3!=$row2['id_topic'])&&($current_var2==1))	{//пошли другие фотки
				if ($current_var3>2) {PhotoBase::$flagonephoto=0;}//фотка в нашей теме не единственная
				$current_var2=0;	?>
				<div class="photo3_8" style="width:20px;height:<?php //echo(GeneralImagesCalculate::$view_height);?>50px;">	</div>	
				<?php } ?>	
				<div class="photo3_8" id="photo3_id_photo_list_<?php echo($current_var3);?>">
					<script type="text/javascript">
						general___photos_show_visible_photo("<?php echo("http://140706.selcdn.com/tazteam/_files/images/photo/".GeneralGetVars::$var2."/".$row2['id_topic']."/".$row2['id_photo']."_2.".$row2['format_photo']);?>","photo3_id_photo_list_<?php echo($current_var3);?>","50<?php //echo(GeneralImagesCalculate::$view_width);?>","50<?php //echo(GeneralImagesCalculate::$view_height);?>","<?php if((GeneralGetVars::$var3==$row2['id_topic'])&&(PhotoBase::$id_photo_page==$row2['id_photo'])) {echo("refimage_border");} else {echo("refimage");}?>","http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".$row2['id_topic']."=".PhotoBase::$current_num_page_photo);?>");
					</script>					
				</div>
				<?php }
		GeneralMYSQL::free($res2);
		?>
	</div>
	<div class="photo3_9 padding_left_10">
		<div class="photo3_1">
			<h1 class="huge_text_h1"><?php echo(GeneralPagetree::$name3);?></h1>
		</div>
		
		<div class="big_text padding_right_20"><?php if (!$row['name_photo']) { echo("без названия");} else {echo($row['name_photo']);}?></div>
		<div class="v_i_b"></div>
		<span class="explanation">Дата размещения: </span><span class="explanation" id="photo_3_date_photo"></span>
		<script type="text/javascript">general___date_DMYvHM_show(<?php echo($row['date']);?>,'photo_3_date_photo');</script>
		<?php if (GeneralGetVars::$var2!=1){/*привязка 1 от галереи*/?>
		<div class="v_i_b"></div>			
		<span class="explanation">Автор: </span><a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['t_id_user']);?>" class="small_dark_link"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
		<?php } ?>
		<div class="v_i_b"></div>
		<span class="explanation">Просмотров: <?php echo($row['number_views']);?></span>
		<div class="v_i_b"></div>
	</div>
	<?php 
	if (PhotoBase::detect_belong_topic_to_user()==true){
		?><div class="photo3_9"><?php
			include("data/components/photo/panels/photo___3_rule_photo_1.php"); 
		?></div><?php }
		?>
</div>

