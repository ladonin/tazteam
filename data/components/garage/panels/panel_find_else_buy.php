<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___revision_autoarket_find_else_buy_data();">
<div id="swim_automarket_find_panel_else_buy" class="swim_panel content_dark">

	<div class="panel_text_dark">Поиск покупателей:</div>
	<div class="v_i_b"></div>

	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="100">Что покупают</td>
	<td align="right">
		<input style="border:1px solid #bbbbbb; width:100%;" name="name" id="autoarket_find_else_buy_data_name" value="<?php if (isset($_COOKIE['automarket_find_query_name'])) { if ($_COOKIE['automarket_find_query_themepage']==3){echo($_COOKIE['automarket_find_query_name']);}} ?>">
	</td>
	</tr>
	</table>

	<div class="v_i_b"></div>	

	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left" valign="middle" width="1%">
		<input value="" class="submit_find" type="submit">
	</td>
	<td align="left" valign="middle" class="padding_left_10">	
		<a class="link_normal" onclick="general___swim_hide('swim_automarket_find_panel_else_buy');">убрать</a>
	 </td>
	</tr>
	</table>
	<input name="submit" value="find_automarket_else_buy" type="hidden">
		
		

	<div class="v_i_b"></div>
</div>
</form><?php GeneralImagesPreload::input("images/_general/general___find_submit_hover.png"); 

if (isset($_COOKIE['automarket_find_query_themepage'])){
	if ($_COOKIE['automarket_find_query_themepage']==3){?>
	<script type="text/javascript">
		general___swim_show_hide('swim_automarket_find_panel_else_buy');
	</script>
<?php }} ?>