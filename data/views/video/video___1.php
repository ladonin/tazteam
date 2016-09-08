<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php
VideoBase::set_sort();//вычисляем - кого будем выбирать, тазы, запчасти, другие машины, покупателей
//VideoBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
GeneralPagesCounter::$find_query=VideoBase::$find_query;
GeneralPagesCounter::calculate($MSQLc, "video",0,0,0,0,0,GeneralGetVars::$var1);
GeneralPagesCounter::imagespreload();?>


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

		<div class="v_i_b"></div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

<?php
 if (VideoBase::$find_status==0) { ?>

 
<div style="float:left; padding-right:10px;">
	<?php if (VideoBase::$sort_by==1){ ?><span class="btn btn-inverse disabled">Обзор и тест-драйвы</span><?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="video_sort_by_drive">
		<input type="submit" value="Обзор и тест-драйвы" class="btn btn-info">
		</form>		
	<?php } ?>
</div>
<div style="float:left; padding-right:10px;">
	<?php if (VideoBase::$sort_by==2){ ?>
		<span class="btn btn-inverse disabled">Экстремальное вождение</span>
	<?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="video_sort_by_extrime">
		<input type="submit" value="Экстремальное вождение" class="btn btn-info">
		</form>		
	<?php } ?>
</div>
<div style="float:left; padding-right:10px;">
	<?php if (VideoBase::$sort_by==3){ ?>
		<span class="btn btn-inverse disabled">Тюнинг</span>
	<?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="video_sort_by_tuning">
		<input type="submit" value="Тюнинг" class="btn btn-info">
		</form>	
	<?php } ?>
</div>
<div style="float:left; padding-right:10px;">
	<?php if (VideoBase::$sort_by==999){ ?>
		<span class="btn btn-inverse disabled">Прочее</span>
	<?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="video_sort_by_else">
		<input type="submit" value="Прочее" class="btn btn-info">
		</form>
	<?php } ?>
</div>
<div style="clear:both;"></div>
<div class="v_i_b"></div>
<div class="v_i_b"></div>

<?php } ?>

	
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

	

<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" width="99%">
	<?php 
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___1_query_1.php");
	while($row=GeneralMYSQL::fetch_array($res)) {
		VideoBase::$announcements_enable=1;	?>
		<a href="http://instorage.org/portfolio/tazteam/video/<?php echo($row['themepage']."/".$row['id']);?>" class="link_topic"><?php echo($row['video_name']);?></a>
		<div class="v_i_b"></div>
	<?php }
	if (VideoBase::$announcements_enable==0) { ?>
		<div class="explanation">Видео не найдено</div>
	<?php }
	GeneralMYSQL::free($res); ?>
</td>
</tr>
</table>	

	
	
<?php 
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