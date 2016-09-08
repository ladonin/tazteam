<div class="photo3_6">
	<div class="photo3_7">
		<?php
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_2.php");
		while ($row2=GeneralMYSQL::fetch_array($res2)){
			$current_var3++;
			GeneralImagesCalculate::set_size_for_image_in_view($row2['size_photo'],2);//задаем размеры для изображения
			if ($row2['page_photo']<1){//если не задан номер страницы у текущей фотографии, т мы определяем его и записываем в БД
				GeneralPagesCounter::calculate_current($MSQLc, GeneralGetVars::$var1."___photos_".GeneralGetVars::$var2,"id_topic='".$row2['id_topic']."'","id_photo<='".$row2['id_photo']."'",0,0,0);
				PhotoBase::update_page_photo($MSQLc,GeneralPagesCounter::$N_cur_current,"id_topic='".$row2['id_topic']."'","id_photo='".$row2['id_photo']."'",0,0,0);
				PhotoBase::$current_num_page_photo=GeneralPagesCounter::$N_cur_current;}
			else {
				PhotoBase::$current_num_page_photo=$row2['page_photo'];}
			if ((GeneralGetVars::$var3!=$row2['id_topic'])&&($current_var2==1))	{
				$current_var2=0;	?>
				<div class="photo3_8" style="width:20px;height:<?php echo(GeneralImagesCalculate::$view_height);?>px;">	</div>	
				<?php } ?>	
				<div class="photo3_8" id="photo3_id_photo_list_<?php echo($current_var3);?>">
					<script type="text/javascript">
						general___photos_show_visible_photo("<?php echo("http://140706.selcdn.ru/tazteam/images/photo/".GeneralGetVars::$var2."/".$row2['id_topic']."/".$row2['id_photo']."_2.".$row2['format_photo']);?>","photo3_id_photo_list_<?php echo($current_var3);?>","<?php echo(GeneralImagesCalculate::$view_width);?>","<?php echo(GeneralImagesCalculate::$view_height);?>","<?php if((GeneralGetVars::$var3==$row2['id_topic'])&&(PhotoBase::$id_photo_page==$row2['id_photo'])) {echo("refimage_border");} else {echo("refimage");}?>","http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".$row2['id_topic']."=".PhotoBase::$current_num_page_photo);?>");
					</script>					
				</div>
				<?php }
		GeneralMYSQL::free($res2);
		?>
	</div>
	<div class="photo3_9">
		<div class="photo3_1">
			<h1 class="huge_text_h1"><?php echo(GeneralPagetree::$name3);?></h1>
			<div class="v_i_b"></div>
			<span class="explanation"><?php echo($row['name_photo']);?></span>
			<div class="v_i_b"></div>
			<?php if (GeneralGetVars::$var2!=1){?>
			<span class="explanation">Автор: </span><a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['t_id_user']);?>" class="small_dark_link"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
			<?php } ?>
			<div class="v_i_b"></div>
			<span class="explanation">Просмотров: <?php echo($row['number_views']);?></span>
			<div class="v_i_b"></div>
			<div class="v_i_b"></div>		
			<?php 
			if (PhotoBase::detect_belong_topic_to_user()==true){

				$current_var2="components/photo/panel_delete_photo.php";
				$current_var3="components/photo/panel_new_photo.php";				
				include("data/components/_general/panels/rule_photo_in_album.php"); }
			?>
		</div>
	</div>
</div>