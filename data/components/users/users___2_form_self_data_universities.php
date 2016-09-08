<?php
	if (UsersBase::$array_self_data_universities_enable==1){ 

	UsersBase::$text_gen_universities_name=explode("  ",UsersBase::$array_self_data_universities['gen_universities_name']);
	UsersBase::$text_gen_universities_faculty_name=explode("  ",UsersBase::$array_self_data_universities['gen_universities_faculty_name']);
	UsersBase::$text_gen_universities_chair_name=explode("  ",UsersBase::$array_self_data_universities['gen_universities_chair_name']);
	UsersBase::$text_gen_universities_graduation=explode("  ",UsersBase::$array_self_data_universities['gen_universities_graduation']);
	UsersBase::$text_gen_universities_education_form=explode("  ",UsersBase::$array_self_data_universities['gen_universities_education_form']);
	UsersBase::$text_gen_universities_education_status=explode("  ",UsersBase::$array_self_data_universities['gen_universities_education_status']);
	$cv5=0;
	foreach(UsersBase::$text_gen_universities_name as $key=>$value){
	$cv5++;
	?>
	<div id="swim_form_self_data_universities_<?php echo($cv5);?>">
		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			ВУЗ:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_name_<?php echo($cv5);?>" value="<?php echo(UsersBase::$text_gen_universities_name[$key]); ?>">			
		</td>
		</tr>
		</table>
		

		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Факультет:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_faculty_name_<?php echo($cv5);?>" value="<?php echo(UsersBase::$text_gen_universities_faculty_name[$key]); ?>">			
		</td>
		</tr>
		</table>

		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Кафедра:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_chair_name_<?php echo($cv5);?>" value="<?php echo(UsersBase::$text_gen_universities_chair_name[$key]); ?>">			
		</td>
		</tr>
		</table>

		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Год окончания:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_graduation_<?php echo($cv5);?>" value="<?php if (isset(UsersBase::$text_gen_universities_graduation[$key])) { if (UsersBase::$text_gen_universities_graduation[$key]>0) {echo(UsersBase::$text_gen_universities_graduation[$key]);}} ?>">			
		</td>
		</tr>
		</table>

		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Форма обучения:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_education_form_<?php echo($cv5);?>" value="<?php echo(UsersBase::$text_gen_universities_education_form[$key]); ?>">
		</td>
		</tr>
		</table>


		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Статус:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_education_status_<?php echo($cv5);?>" value="<?php echo(UsersBase::$text_gen_universities_education_status[$key]); ?>">
		</td>
		</tr>
		</table>

		</div>
		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			
		</td>
		<td align="left" valign="top">
			<table cellpadding="0" cellspacing="0">
			<tr>
			<td>
				<input type="checkbox" name="delete_university_<?php echo($cv5);?>" value="1" style="cursor:pointer;" onclick="general___swim_show_hide('swim_form_self_data_universities_<?php echo($cv5);?>');"> 
			</td>
			<td style="padding-left:5px;"> 
				<font style="line-height:20px;" class="explanation">удалить ВУЗ</font>
			</td>
			</tr>
			</table>
		</td>
		</tr>
		</table>		
		<div class="v_i_s"></div>
		<div class="v_i_s"></div>
		<div class="v_i_b"></div>
		<?php } ?>
			<input type="hidden" name="number_universities" value="<?php echo($cv5);?>">
		
		
		<?php }
		else {
			$cv5=1;	?>

		
		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			ВУЗ:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_name_<?php echo($cv5);?>" value="">			
		</td>
		</tr>
		</table>
		

		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Факультет:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_faculty_name_<?php echo($cv5);?>" value="">			
		</td>
		</tr>
		</table>

		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Кафедра:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_chair_name_<?php echo($cv5);?>" value="">			
		</td>
		</tr>
		</table>

		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Год окончания:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_graduation_<?php echo($cv5);?>" value="">			
		</td>
		</tr>
		</table>

		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Форма обучения:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_education_form_<?php echo($cv5);?>" value="">
		</td>
		</tr>
		</table>


		<table width="508" cellpadding="0"cellspacing="0">
		<tr>
		<td width="170" align="left" valign="top" class="grey">
			Статус:
		</td>
		<td align="left" valign="top">
			<input type="text" style="border:1px solid #bbbbbb; width:100%;" name="universities_education_status_<?php echo($cv5);?>" value="">
		</td>
		</tr>
		</table>		

		<div class="v_i_s"></div>
		<div class="v_i_s"></div>
		<div class="v_i_b"></div>
		<?php } ?>
		<input type="hidden" name="number_universities" value="<?php echo($cv5);?>">		
