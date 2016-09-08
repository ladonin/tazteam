<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>   <?php include("data/components/_general/breadcrumbs.php"); ?>
<?php
NewsBase::detect_themepage();
NewsBase::convert_cookie_find_query($MSQLc);
GeneralPagesCounter::$find_query=NewsBase::$find_query;
GeneralPagesCounter::calculate($MSQLc, "news","themepage='".NewsBase::$themepage."'",0,0,0,0,GeneralGetVars::$var1);
GeneralPagesCounter::imagespreload();
?>

	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left">
		<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
		<td width="1">
			<?php echo(GeneralPagesCounter::$htmlarrows); ?>
		</td>
		<?php if (GeneralSecurity::detect_administrator()==true){ ?>
		<td width="1" class="padding_left_10">
			<?php if (UsersMyData::$identified==1) {//для зарегистрированных пользователей ?>	
			<input value="новая тема" class="btn btn btn-success btn-small" type="button" onclick="javascript:location.href='<?php echo(GeneralGlobalVars::url."/".GeneralGetVars::$var1."/redact");?>'">
			<?php GeneralImagesPreload::input("images/_general/general___new_announcement_submit_hover.png"); } ?>
		</td>
		<?php } ?>
		<td align="left" width="99%">	
			<?php include("data/components/news/panels/find_buttons.php");?>
		</td>
		</tr>
		</table>
	</td>
	<td align="right" valign="middle">
		<?php echo(GeneralPagesCounter::$htmlcode); ?>
	</td>
	</tr>
	</table>
<div class="v_i_b"></div>
<div class="v_i_b"></div>
<?php


include("data/components/news/news___1_query_1.php");
while($row=GeneralMYSQL::fetch_array($res)) {
NewsBase::detect_first_photo($row['img']);//вычисляем первое фото
?>

	<table cellpadding="0" cellspacing="0" style="width:888px; margin-bottom:10px;">
	<tr>
	<td valign="top" width="110" align="left">
		<a href="http://mapstore.org/my_portfolio/tazteam.net/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row['id']);?>"><?php		
		if ($row['img']==""){?><img src="http://mapstore.org/my_portfolio/tazteam.net/images/_general/general___photo_none_100x100.jpg" width="100" height="100" class="refimage"><?php }
		else {?><img src="http://140706.selcdn.com/tazteam/_files/images/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row['id']);?>/<?php echo(NewsBase::return_size_to_photo(NewsBase::$img1_cur,2));?>" width="100" height="100" class="refimage"><?php } 		
		?></a>
	</td>
		<td valign="top" align="left" class="grey">
		
		<a href="http://mapstore.org/my_portfolio/tazteam.net/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row['id']);?>" class="lead"><?php echo($row['name']);?></a>
		
	<br>
	<?php echo($row['contentnacked']);?>...
<?php if (GeneralSecurity::detect_administrator()==true) { ?>
	<br>
<span class="explanation_dark">Просмотров: <?php echo($row['number_views']);?></span>
<?php } ?>
		
	</td>
	</tr>
	</table><div class="v_i_b"></div>
<?php } 

GeneralMYSQL::free($res);

if (GeneralPagesCounter::$N_max>1){ ?>
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left">
		<?php echo(GeneralPagesCounter::$htmlarrows); ?>
	</td>
	<td align="right" valign="middle">
		<?php echo(GeneralPagesCounter::$htmlcode); ?>
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>

<?php }
GeneralPagesCounter::clearvars(); ?>
</div>