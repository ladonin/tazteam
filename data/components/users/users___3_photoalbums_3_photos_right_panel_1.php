<div class="padding_left_10"><?php 
include("data/components/".GeneralGetVars::$var1."/panels/".GeneralGetVars::$var1."___3_new_photo.php");	
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_2.php");
while ($row2=GeneralMYSQL::fetch_array($res2)){
UsersPhotoalbumsBase::detect_current_num_page_photo($MSQLc,$row2['page_photo'],$row2['id_photo'],$row2['id_album'],GeneralGetVars::$var2);?>
<a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(GeneralGetVars::$var2."/photoalbums/".$row2['id_album']."=".UsersPhotoalbumsBase::$current_num_page_photo);?>" class="refimage"><img src="<?php echo("http://140706.selcdn.com/tazteam/_files/images/users/photoalbums/".$row2['dir_album']."/".GeneralGetVars::$var2."/".$row2['id_album']."/".$row2['id_photo']."_3.".$row2['format_photo']);?>" width="70" height="70" style="border:0px;"></a><?php }
GeneralMYSQL::free($res2);?>
<div class="v_i_b"></div>		

<div class="panel_text_dark">Альбом: <?php echo(GeneralPagetree::$name3);?></div>
<div class="v_i_s"></div>
<?php if (!$row['name_photo']) { echo("без названия");} else {echo($row['name_photo']);}?>
<div class="v_i_b"></div>

















		<span class="explanation">Дата размещения: </span><span class="explanation" id="photo_3_date_photo"></span>
		<script type="text/javascript">general___date_DMYvHM_show(<?php echo($row['dateloading']);?>,'photo_3_date_photo');</script>
		<?php if (GeneralGetVars::$var2!=1){/*привязка 1 от галереи*/?>
		<div class="v_i_b"></div>			
		<span class="explanation">Автор: </span><a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['t_id_user']);?>" class="small_dark_link"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
		<?php } ?>
		<div class="v_i_b"></div>
		<span class="explanation">Просмотров: <?php echo($row['number_views']);?></span>
		<div class="v_i_b"></div>
	</div>
	<?php 
	if (UsersPhotoalbumsBase::detect_belong_topic_to_user()==true){
		?><div class="photo3_9"><?php
			include("data/components/users/panels/users___3_photoalbums_3_rule_photo_1.php"); 
		?></div><?php }
		?>


