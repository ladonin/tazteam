
<?php /*
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
<?php include("data/components/garage/panels/find_buttons.php");?>
</td>
<td align="right" width="20%">





	<?php
	GarageBase::set_sort();//вычисляем - кого будем выбирать, тазы, запчасти, другие машины, покупателей
	GarageBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
	GeneralPagesCounter::$find_query=GarageBase::$find_query;
	GeneralPagesCounter::$rowspage_name="rowspagegarage1";//копия такой страницы - по присваиванию номеров страниц
	GeneralPagesCounter::calculate_current($MSQLc,"garage","id>='".GeneralGetVars::$var3."'",0,0,0,0,0);//условия выборки аздаются сортировкой или поиском		
	?>
	<b><a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1."=".GeneralPagesCounter::$N_cur_current);?>" class="link_normal">Другие предложения &uarr;</a></b>	
</td>
</tr>
</table>

*/?>




	<?php
	//GarageBase::set_sort();//вычисляем - кого будем выбирать, тазы, запчасти, другие машины, покупателей
	//GarageBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
	//GeneralPagesCounter::$find_query=GarageBase::$find_query;
	GeneralPagesCounter::$rowspage_name="rowspagegarage1";//копия такой страницы - по присваиванию номеров страниц
	GeneralPagesCounter::calculate_current($MSQLc,"garage","id>='".GeneralGetVars::$var3."'",0,0,0,0,0);//условия выборки аздаются сортировкой или поиском		
	?>













<?php	if (GeneralSecurity::detect_autority($row['id_user'])) { ?>
<table cellpadding="0" cellspacing="0">
<tr>


<td align="left" class="padding_right_10">
	<a href="http://instorage.org/portfolio/tazteam/garage/<?php echo(GeneralGetVars::$var2);?>=<?php echo($row['id']);?>" class="btn btn-info btn-small">редактировать</a>
</td>
<td align="left" class="padding_right_10">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Удалить объявление?');">
	<input name="submit" value="deletegarageannouncement" type="hidden">
	<input name="id" value="<?php echo(GeneralGetVars::$var3);?>" type="hidden">
	<input value="удалить" class="btn btn-danger btn-small" type="submit">	
	</form>	
</td></tr>
</table>
<div class="v_i_b"></div>
<?php }
 ?>








