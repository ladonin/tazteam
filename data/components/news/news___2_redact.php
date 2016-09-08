<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="600">
			<tr valign="top" >
			<td width="100">Название <b class="red">*</b></td>
			<td align="right">
				<input id="news_form_name" style="border:1px solid #bbbbbb; width:100%;" name="name" value="<?php echo(NewsSendTopic::$array_data['name']); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>








			<table cellpadding="0" cellspacing="0" width="600">
			<tr valign="top" >
			<td width="100">Keywords</td>
			<td align="right">
				<input id="news_form_keywords" style="border:1px solid #bbbbbb; width:100%;" name="keywords" value="<?php echo(NewsSendTopic::$array_data['keywords']); ?>">
			</td>
			</tr>

			</table>
<div class="v_i_b"></div>



<?php if (!GeneralGetVars::$num_page){?>
			<table cellpadding="0" cellspacing="0" width="600">
			<tr valign="top" >
			<td width="100">Secretword</td>
			<td align="right">
				<input id="news_form_secretword" style="border:1px solid #bbbbbb; width:100%;" name="secretword" value="<?php echo(NewsSendTopic::$array_data['secretword']); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
<?php } ?>











<div class="v_i_b"></div>
			Текст:
<div class="v_i_b"></div>




	<?php 
	GeneralInputText::$type_panels="maximum";
	include("data/components/_general/inputtext/panel_top.php"); ?>
	<div class="v_i_b"></div>
	<textarea style="height:500px; width:590px;" id="inputtexttextarea<?php echo(GeneralInputText::$id);?>"  name="inputtexttextarea" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'><?php echo(NewsSendTopic::$array_data['contenttag']); ?></textarea>
	<input value="" type="hidden" name="inputtexthtml" id="inputtexthtml<?php echo(GeneralInputText::$id);?>">
	<input value="" type="hidden" name="inputtextnacked" id="inputtextnacked<?php echo(GeneralInputText::$id);?>">
	<?php GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>






			