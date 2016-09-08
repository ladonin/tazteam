
<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_2.php");


if (GeneralMYSQL::num_rows($res2)<AutomarketBase::min_additional_announcements){
	AutomarketBase::$condition_added1=AutomarketBase::$condition_added2;//альтернативный поиск, если недостаточно дополнительных олбъявлений записано в БД
	AutomarketBase::$find_query="";
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_2.php");}
	while($row2=GeneralMYSQL::fetch_array($res2)) {
		AutomarketBase::detect_first_photo($row2['img']);//вычисляем первое фото
		?>
			<table cellpadding="0" cellspacing="0" style="float:left; margin-bottom:20px;" width="50%">
			<tr>
			<td valign="top" width="210">
				<a href="<?php echo(GeneralGlobalVars::url);?>/automarket/<?php echo(GeneralGetVars::$var2."/".$row2['id']);?>"><?php
		if ($row2['img']==""){?><img src="<?php echo(GeneralGlobalVars::url);?>/images/_general/general___photo_none_210x160.png" width="210" height="160" class="refimage"><?php }
		else {?><img src="http://140706.selcdn.ru/tazteam/images/automarket/<?php echo($row2['id']);?>/<?php echo(AutomarketBase::return_size_to_photo(AutomarketBase::$img1_cur,5));?>" width="210" height="160" class="refimage"><?php } ?></a>
			</td>
			<td valign="top" align="left" style="padding:0px 10px 0px 10px;">

			<div style="padding:5px 0px; overflow:hidden; width:185px;" class="grey">
			<?php if ($row2['themepage']==1){?>
				<a href="<?php echo(GeneralGlobalVars::url);?>/automarket/<?php echo(GeneralGetVars::$var2."/".$row2['id']);?>" class="lead"><?php echo(AutomarketBase::return_parameters("mark", $row2['mark'])." "); echo($row2['model']);?></a>
				<div></div>
 				<span class="label label-important" style=" font-size:1.1em;"><?php echo($row2['price']);?> руб.</span>
<div class="v_i_s"></div>
				<?php if (($row2['power']>0)&&(!1)){?>

				<?php echo($row2['power']);?> лс.<div class="v_i_s"></div>
				<?php } ?>

				<?php if ($row2['year_production']>0){?>
				<?php echo($row2['year_production']);?> г.<div class="v_i_s"></div>
				<?php } ?>
				<?php if ($row2['city']){?>
				<span class="link_lead black"><?php echo($row2['city']);?></span>
				<?php } ?>


			<?php }
			else {?>
				<a href="<?php echo(GeneralGlobalVars::url);?>/automarket/<?php echo(GeneralGetVars::$var2."/".$row2['id']);?>" class="lead"><?php echo($row2['name']);?></a>
				<div></div>
                	<span class="label label-important"><?php echo($row2['price']);?> руб.</span><div class="v_i_s"></div>
                <?php if ($row2['city']){?>
				<span class="link_lead black"><?php echo($row2['city']);?></span>
				<?php } ?>



			<?php } ?>
			</div>
		</td>
		</tr>
		</table>
<?php }
GeneralMYSQL::free($res2); ?>
<div style="clear:both;"></div>