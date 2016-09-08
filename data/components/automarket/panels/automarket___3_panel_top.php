
<?php /*
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
<?php include("data/components/automarket/panels/find_buttons.php");?>
</td>
<td align="right" width="20%">





	<?php
	AutomarketBase::set_sort();//вычисляем - кого будем выбирать, тазы, запчасти, другие машины, покупателей
	AutomarketBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
	GeneralPagesCounter::$find_query=AutomarketBase::$find_query;
	GeneralPagesCounter::$rowspage_name="rowspageautomarket1";//копия такой страницы - по присваиванию номеров страниц
	GeneralPagesCounter::calculate_current($MSQLc,"automarket","id>='".GeneralGetVars::$var3."'",0,0,0,0,0);//условия выборки аздаются сортировкой или поиском
	?>
	<b><a href="<?php echo(GeneralGlobalVars::url);?>/<?php echo(GeneralGetVars::$var1."=".GeneralPagesCounter::$N_cur_current);?>" class="link_normal">Другие предложения &uarr;</a></b>
</td>
</tr>
</table>

*/?>




	<?php
	AutomarketBase::set_sort();//вычисляем - кого будем выбирать, тазы, запчасти, другие машины, покупателей
	AutomarketBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
	GeneralPagesCounter::$find_query=AutomarketBase::$find_query;
	GeneralPagesCounter::$rowspage_name="rowspageautomarket1";//копия такой страницы - по присваиванию номеров страниц
	GeneralPagesCounter::calculate_current($MSQLc,"automarket","id>='".GeneralGetVars::$var3."'",0,0,0,0,0);//условия выборки аздаются сортировкой или поиском
	?>



<table cellpadding="0" cellspacing="0">
<tr>
<?php	if (GeneralSecurity::detect_autority($row['id_user'])) { ?>
<td align="left">
	<a href="<?php echo(GeneralGlobalVars::url);?>/automarket/<?php echo(GeneralGetVars::$var2);?>=<?php echo($row['id']);?>" class="btn btn-warning btn-mini">редактировать</a>
</td>
<td align="left" class="padding_left_10">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Удалить объявление?');">
	<input name="submit" value="deleteautomarketannouncement" type="hidden">
	<input name="id" value="<?php echo(GeneralGetVars::$var3);?>" type="hidden">
	<input value="удалить" class="btn btn-danger btn-mini" type="submit">
	</form>
</td>
<?php }
if (UsersMyData::$identified==1){ ?>
<td align="left" class="padding_left_10">
	<a class="btn btn-info btn-mini" onclick="general___swim_hide('swim_automarket_find_panel_autos'); general___swim_hide('swim_automarket_find_panel_else_buy');  general___swim_hide('swim_automarket_find_panel_else'); general___swim_show_hide('swim_new_announcement');">новое&nbsp;объявление</a>
</td>
<?php } ?>
<td>
</td>
</tr>
</table>
<div class="v_i_b"></div>

<?php include("data/components/automarket/panels/new_announcement.php");?>
<?php //include("data/components/automarket/panels/panel_find_auto.php");?>
<?php //include("data/components/automarket/panels/panel_find_else.php");?>
<?php //include("data/components/automarket/panels/panel_find_else_buy.php");?>




