<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
	<a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>" class="btn btn-primary btn-small">к&nbsp;моей странице</a>
</td>	
</tr>
</table>
	<div class="v_i_b"></div>


<?php 
if (UsersBase::detect_its_mypage(2)==true){//определяем - наша страница или нет
	
	//UsersMyData::$id=1;
	?>

	
	
	<div class="lead">Мои темы</div>	
	
	
	
	
	
	<b class="link_lead">Форум</b>	
	<div class="v_i_b"></div>
	<?php 
	$cv=0;
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_mythemes_query_forum_1.php");
	while($row=GeneralMYSQL::fetch_array($res)) {
		?><a href="http://instorage.org/portfolio/tazteam/forum/<?php echo($row['id_section']);?>/<?php echo($row['id_topic']);?>=1" class="link_lead_topic"><?php echo($row['name_topic']);?></a>
		<div class="v_i_b"></div>
		<?php	
		$cv=1;}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }
	
	
	
	
	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Галерея</b>	
	<div class="v_i_b"></div>
	<?php
	$cv=0;
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_mythemes_query_photo_1.php");
	while($row=GeneralMYSQL::fetch_array($res)) {
		?><a href="http://instorage.org/portfolio/tazteam/photo/<?php echo($row['id_section']);?>/<?php echo($row['id_topic']);?>/allphotos=1" class="link_lead_topic"><?php echo($row['name_topic']);?></a>
		<div class="v_i_b"></div>
		<?php	
		$cv=1;}
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }	
	
	
	
	?>
	<div class="v_i_b"></div>
	<b class="link_lead">Объявления</b>	
	<div class="v_i_b"></div>
	<?php
	$cv=0;
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_mythemes_query_automarket_1.php");
	while($row=GeneralMYSQL::fetch_array($res)) { ?>
	<a href="http://instorage.org/portfolio/tazteam/automarket/<?php echo($row['themepage']);?>/<?php echo($row['id']);?>" class="link_lead_topic">
	<?php if ($row['themepage']==1){ ?>
		<span class="grey">продам</span> <?php echo(AutomarketBase::return_parameters("mark", $row['mark'])." "); echo($row['model']);?>
	<?php } 
	else if ($row['themepage']==2){ ?>
		<span class="grey">продам</span> <?php echo($row['name']);?>
	<?php } 
	
	else if ($row['themepage']==3){ ?>
		<span class="grey">куплю</span>  <?php echo($row['name']);?>
	<?php }	
	?>
	</a>
	<div class="v_i_b"></div>
	<?php	
	$cv=1;}	
	if ($cv==0){ ?>
	не найдено
	<div class="v_i_b"></div>
	<?php }	
	
	
	
	
	
	
	
	
	
	
	
}
?></div>