<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" enctype="multipart/form-data">
<div id="swim_automarket_find_panel_else" class="swim_panel big_text">

	<div class="padding_left_10 big_text_bold">Поиск автозапчастей и аксессуаров:</div>
	<div class="v_i_b"></div>

	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Введите ключевые слова</td>
	<td align="right">
		<input style="border:1px solid #bbbbbb; width:100%;" name="name" value="<?php if (isset($_COOKIE['automarket_find_query_name'])) {echo($_COOKIE['automarket_find_query_name']);} ?>">
	</td>
	</tr>
	</table>

	<div class="v_i_b"></div>	

	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left" valign="bottom" width="1%" class="padding_left_10">
		<input value=" " class="submit_find" type="submit">
	</td>
	<td align="left" valign="bottom" class="padding_left_10">	
		<span class="work_width_photo_6 small_link" onclick="general___swim_hide('swim_automarket_find_panel_else');">убрать</span>
	 </td>
	</tr>
	</table>
	<input name="submit" value="find_automarket_else" type="hidden">
		
		
	</form><?php GeneralImagesPreload::input("images/_general/general___find_submit_hover.png"); ?>
	<div class="v_i_b"></div>
</div>
