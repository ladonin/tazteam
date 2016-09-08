<span class="panel_text_dark_small">Куплю</span>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500">
			<tr valign="top" >
			<td width="180">Название <b class="red">*</b></td>
			<td align="right">
				<input id="automarket_form_name" style="border:1px solid #bbbbbb; width:100%;" name="name" value="<?php echo(AutomarketSendTopic::$array_data['name']); ?>">
			</td>
			</tr>
			</table>

<div class="v_i_b"></div>
<div class="v_i_b"></div>
			<div class="panel_text_dark_small">Описание:</div>
<div class="v_i_b"></div>			

			<textarea maxlength="5000"  style="height:400px;" id="automarket_form_content"  name="content" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'><?php echo(AutomarketSendTopic::$array_data['content_nacked']); ?></textarea>
			<input name="contentnacked" id="automarket_form_contentnacked" value="" type="hidden">

<div class="v_i_b"></div>
<div class="v_i_b"></div>			

			<table cellpadding="0" cellspacing="0" width="500">
			<tr valign="top" >
			<td width="180">Город покупателя</td>
			<td align="right">
				<input style="border:1px solid #bbbbbb; width:100%;" id="automarket_form_city" name="city" maxlength="100" value="<?php echo(AutomarketSendTopic::$array_data['city']); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500">
			<tr valign="top" >
			<td width="180">Регион</td>
			<td align="right">
				<input style="border:1px solid #bbbbbb; width:100%;" id="automarket_form_region" name="region" maxlength="100" value="<?php echo(AutomarketSendTopic::$array_data['region']); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500">
			<tr valign="top" >
			<td width="180">Телефон</td>
			<td align="right">
				<input style="border:1px solid #bbbbbb; width:100%;" id="automarket_form_phone" name="phone" maxlength="50" value="<?php echo(AutomarketSendTopic::$array_data['phone']); ?>">
			</td>
			</tr>
			</table>		