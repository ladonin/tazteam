<div id="swim_form_self_data_borndate">


		<table cellpadding="0" cellspacing="0" border="0" width="100%">
		<tr>
		<td style="width:70px;">
			<select id="bornday" name="born_day" style="width:70px; border:1px solid #bbbbbb;">
				<option value="">День:</option>						
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>							
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>							
				<option value="9">9</option>
				<option value="10">10</option>							
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>							
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>							
				<option value="19">19</option>
				<option value="20">20</option>							
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>							
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>							
				<option value="29">29</option>
				<option value="30">30</option>
			</select>
		</td>
		<td width="10" align="left">	
		</td>					
		<td style="width:90px;">
			<select id="bornmonth" name="born_month" style="width:90px; border:1px solid #bbbbbb;" onChange="users___calendar_set_borndate_changefrommonth(this.selectedIndex);">
				<option value="">Месяц:</option>						
				<option value="1">Января</option>
				<option value="2">Февраля</option>
				<option value="3">Марта</option>
				<option value="4">Апреля</option>							
				<option value="5">Мая</option>
				<option value="6">Июня</option>
				<option value="7">Июля</option>
				<option value="8">Августа</option>							
				<option value="9">Сентября</option>
				<option value="10">Октября</option>							
				<option value="11">Ноября</option>
				<option value="12">Декабря</option>
			</select>
		</td>	
		<td width="10" align="left">	
		</td>						
		<td>					
			<select id="bornyear" name="born_year" style="width:100%; border:1px solid #bbbbbb;" onChange="users___calendar_set_borndate_changefromyear();">
			</select>	
		</td>
		</tr>
		</table>		
		
		
		</div>
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td>
			<input type="checkbox" name="date_delete" value="1" style="cursor:pointer;" onclick="general___swim_show_hide('swim_form_self_data_borndate');"> 
		</td>
		<td style="padding-left:5px;" valign="middle"> 
			убрать дату
		</td>
		</tr>
		</table> 
		
<div class="v_i_b"></div>
		
		
		
		
		<script type="text/javascript">
		users___calendar_set_borndate(<?php echo(UsersBase::$array_self_data_main_borndate['gen_borndate_day']); ?>,<?php echo(UsersBase::$array_self_data_main_borndate['gen_borndate_month']); ?>,<?php echo(UsersBase::$array_self_data_main_borndate['gen_borndate_year']); ?>);
		users___calendar_set_borndate_changefrommonth(document.getElementById("bornmonth").selectedIndex);
		users___calendar_set_borndate_changefromyear();
		</script>