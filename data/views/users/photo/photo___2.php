<?php 
GeneralPagesCounter::calculate($MSQLc, "photo___topics_".GeneralGetVars::$var2,0,0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2);
GeneralPagesCounter::imagespreload();



if ((GeneralGetVars::$var2!=1)||(GeneralSecurity::detect_administrator()==true)){/*привязка 1 от галереи*/
	include("data/components/_general/panels/panel_topics.php");


?><div class="v_i_b"></div>


<div id="swim_new_topic" class="swim_panel">
	<?php
	if (UsersMyData::$identified==1) {//для зарегистрированных пользователей
		?><form method="post" 
		action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
		enctype="multipart/form-data" 
		onsubmit="return general___send_topic_photo('inputnametopictextarea','_1');">
		<input name="submit" value="sendphototopic" type="hidden"><?php
		include("data/components/photo/panels/photo___2_new_topic.php");
		$current_var4="_1";	
		$current_var1="";
		$current_var2="redact";
		$current_var3="Приложить фотографию";
		$current_var5="";		
		$current_var6=1;
		$current_var7="swim_new_topic";
		include("data/components/_general/panels/work_width_photo_1.php");
		?></form><?php }
	?>
	<div class="v_i_b"></div>
</div>


<div class="grey_line_1"></div>
<?php
}

?>




<div class="photo2_1"><?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_1.php");
while ($row=GeneralMYSQL::fetch_array($res)){
	PhotoBase::detect_current_num_page_photo($MSQLc,$row['page_photo'],$row['id_photo'],$row['id_topic'],GeneralGetVars::$var2);

?>



	<table cellpadding="0" cellspacing="0" style="width:25%; float:left; padding-right:10px; padding-bottom:10px;">
	<tr>
	<td valign="top" align="left">




<div class="photo2_6" <?php if (GeneralGetVars::$var2==1){/*привязка 1 от галереи*/?>style="height:230px;"<?php } ?>>
<table cellpadding="0" cellspacing="0" class="photo2_2">
<tr>
<td class="photo2_3">
	<div class="photo2_4">
		<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."=".PhotoBase::$current_num_page_photo);?>" class="big_link_h1"><?php echo($row['name_topic']);?></a>
		<?php if (GeneralGetVars::$var2!=1){/*привязка 1 от галереи*/?>
		<div class="v_i_b_h1"></div>
		<span class="explanation">Автор: </span> <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_autor_topic']);?>" class="small_dark_link"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
		<?php } ?>
	</div>
</td>
</tr>
<tr>
<td onclick="javascript:location.href='http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."=".PhotoBase::$current_num_page_photo);?>'" 
style="cursor:pointer; background-image: url(http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."/".$row['id_photo']."_5.".$row['format_photo']);?>); background-repeat:no-repeat;"> </td>
</tr>
</table>

<?php if (GeneralGetVars::$var2!=1){/*привязка 1 от галереи*/?>
	
<?php if ($row['count_photo']>1) { ?>

<table cellpadding="0" cellspacing="0" class="photo2_5">
<tr>
<td class="photo2_3">
	<div class="photo2_9">
		<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']);?>=1" class="big_link_h1"><?php echo($row['name_topic']);?></a>
		<div class="v_i_b_h1"></div>
		<span class="explanation">Автор: </span> <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_autor_topic']);?>" class="small_dark_link"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
	</div>
</td>
</tr>
<tr>
<td  class="photo2_8"> </td>
</tr>
</table>

<?php if ($row['count_photo']>2) { ?>
<table cellpadding="0" cellspacing="0" class="photo2_7">
<tr>
<td class="photo2_3">
	<div class="photo2_9">
		<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']);?>=1" class="big_link_h1"><?php echo($row['name_topic']);?></a>
		<div class="v_i_b_h1"></div>
		<span class="explanation">Автор: </span> <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_autor_topic']);?>" class="small_dark_link"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
	</div>
</td>
</tr>
<tr>
<td  class="photo2_8"> </td>
</tr>
</table>

<?php } } }?>
</div>
</td>
</tr>
</table>

<?php
}
GeneralMYSQL::free($res);
?>


</div>
<div style="clear:both"></div>
<?php 
if (GeneralGetVars::$var2!=1){/*привязка 1 от галереи*/
	include("data/components/_general/panels/panel_numeric_pages_in_down.php"); }

GeneralPagesCounter::clearvars(); ?>









