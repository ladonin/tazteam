<form method="post"
action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
onsubmit="return general___automarket_find_announcements_auto();"
enctype="multipart/form-data">
<div id="swim_automarket_find_panel_autos" class="swim_panel big_text">

	<div class="padding_left_10 big_text_bold">Поиск автомобиля:</div>
	<div class="v_i_b"></div>
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Марка</td>
	<td align="right">
				<select name="mark" style="width:100%; border:1px solid #bbbbbb; font-size:12px;">
					<option value="0" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']=="") {echo("selected");}} ?>></option>					
					<option value="156" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==156) {echo("selected");}} ?>>АЗЛК (Москвич)</option>
					<option value="157" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==157) {echo("selected");}} ?>>ВАЗ</option>
					<option value="158" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==158) {echo("selected");}} ?>>ГАЗ</option>
					<option value="159" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==159) {echo("selected");}} ?>>ЗАЗ</option>	
					<option value="160" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==160) {echo("selected");}} ?>>ЗИЛ</option>
					<option value="161" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==161) {echo("selected");}} ?>>ИЖ</option>					
					<option value="162" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==162) {echo("selected");}} ?>>КамАЗ</option>
					<option value="163" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==163) {echo("selected");}} ?>>ЛУАЗ</option>
					<option value="164" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==164) {echo("selected");}} ?>>МАЗ</option>
					<option value="165" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==165) {echo("selected");}} ?>>СеАЗ</option>
					<option value="166" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==166) {echo("selected");}} ?>>СМЗ</option>
					<option value="167" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==167) {echo("selected");}} ?>>ТАГАЗ</option>					
					<option value="168" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==168) {echo("selected");}} ?>>УАЗ</option>					
					<option value="173" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==173) {echo("selected");}} ?>>УРАЛ</option>					
					<option value="169" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==169) {echo("selected");}} ?>>Эксклюзив</option>
					<option value="101" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==101) {echo("selected");}} ?>>ACURA</option>
					<option value="102" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==102) {echo("selected");}} ?>>ALFA ROMEO</option>
					<option value="103" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==103) {echo("selected");}} ?>>ASTON MARTIN</option>
					<option value="104" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==104) {echo("selected");}} ?>>AUDI</option>	
					<option value="105" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==105) {echo("selected");}} ?>>BMW</option>				
					<option value="106" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==106) {echo("selected");}} ?>>BYD</option>				
					<option value="107" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==107) {echo("selected");}} ?>>CADILLAC</option>				
					<option value="108" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==108) {echo("selected");}} ?>>CHERY</option>	
					<option value="109" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==109) {echo("selected");}} ?>>CHEVROLET</option>
					<option value="110" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==110) {echo("selected");}} ?>>CHRYSLER</option>	
					<option value="111" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==111) {echo("selected");}} ?>>CITROEN</option>
					<option value="112" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==112) {echo("selected");}} ?>>DAEWOO</option>
					<option value="113" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==113) {echo("selected");}} ?>>DAIHATSU</option>
					<option value="114" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==114) {echo("selected");}} ?>>DODGE</option>	
					<option value="115" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==115) {echo("selected");}} ?>>FAW</option>				
					<option value="116" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==116) {echo("selected");}} ?>>FIAT</option>				
					<option value="117" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==117) {echo("selected");}} ?>>FORD</option>
					<option value="170" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==170) {echo("selected");}} ?>>FOTON</option>					
					<option value="118" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==118) {echo("selected");}} ?>>GEELY</option>	
					<option value="119" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==119) {echo("selected");}} ?>>GMC</option>
					<option value="120" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==120) {echo("selected");}} ?>>GREAT WALL</option>	
					<option value="121" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==121) {echo("selected");}} ?>>HAFEI</option>
					<option value="122" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==122) {echo("selected");}} ?>>HONDA</option>
					<option value="123" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==123) {echo("selected");}} ?>>HUMMER</option>
					<option value="124" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==124) {echo("selected");}} ?>>HYUNDAI</option>	
					<option value="125" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==125) {echo("selected");}} ?>>INFINITI</option>				
					<option value="126" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==126) {echo("selected");}} ?>>IRAN KHODRO</option>				
					<option value="127" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==127) {echo("selected");}} ?>>ISUZU</option>
					<option value="171" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==171) {echo("selected");}} ?>>IVECO</option>					
					<option value="128" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==128) {echo("selected");}} ?>>JAGUAR</option>	
					<option value="129" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==129) {echo("selected");}} ?>>JEEP</option>
					<option value="130" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==130) {echo("selected");}} ?>>KIA</option>	
					<option value="131" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==131) {echo("selected");}} ?>>LANCIA</option>
					<option value="132" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==132) {echo("selected");}} ?>>LAND ROVER</option>
					<option value="133" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==133) {echo("selected");}} ?>>LEXUS</option>
					<option value="134" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==134) {echo("selected");}} ?>>LIFAN</option>
					<option value="172" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==172) {echo("selected");}} ?>>MAN</option>					
					<option value="135" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==135) {echo("selected");}} ?>>MAZDA</option>				
					<option value="136" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==136) {echo("selected");}} ?>>MERCEDES-BENZ</option>				
					<option value="137" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==137) {echo("selected");}} ?>>MERCURY</option>				
					<option value="138" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==138) {echo("selected");}} ?>>MINI</option>	
					<option value="139" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==139) {echo("selected");}} ?>>MITSUBISHI</option>
					<option value="140" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==140) {echo("selected");}} ?>>NISSAN</option>	
					<option value="141" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==141) {echo("selected");}} ?>>OPEL</option>
					<option value="142" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==142) {echo("selected");}} ?>>PEUGEOT</option>
					<option value="143" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==143) {echo("selected");}} ?>>PORSCHE</option>
					<option value="144" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==144) {echo("selected");}} ?>>RENAULT</option>
					<option value="145" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==145) {echo("selected");}} ?>>ROVER</option>				
					<option value="146" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==146) {echo("selected");}} ?>>SAAB</option>				
					<option value="147" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==147) {echo("selected");}} ?>>SEAT</option>				
					<option value="148" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==148) {echo("selected");}} ?>>SKODA</option>	
					<option value="149" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==149) {echo("selected");}} ?>>SMART</option>
					<option value="150" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==150) {echo("selected");}} ?>>SSANG YONG</option>	
					<option value="151" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==151) {echo("selected");}} ?>>SUBARU</option>
					<option value="152" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==152) {echo("selected");}} ?>>SUZUKI</option>					
					<option value="174" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==174) {echo("selected");}} ?>>TATRA</option>					
					<option value="153" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==153) {echo("selected");}} ?>>TOYOTA</option>
					<option value="154" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==154) {echo("selected");}} ?>>VOLKSWAGEN</option>	
					<option value="155" <?php if (isset($_COOKIE['automarket_find_query_mark'])) {if($_COOKIE['automarket_find_query_mark']==155) {echo("selected");}} ?>>VOLVO</option>
				</select>	
			</td>
	</tr>
	</table>
	<div class="v_i_s"></div>
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Модель</td>
	<td align="right">
		<input style="border:1px solid #bbbbbb; width:100%;" name="model" value="<?php if (isset($_COOKIE['automarket_find_query_model'])) {echo($_COOKIE['automarket_find_query_model']);} ?>">
	</td>
	</tr>
	</table>
	<div class="v_i_s"></div>
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Пробег</td>
	<td align="right">
		<input id="automarket_form_run_int" style="border:1px solid #bbbbbb; width:100%" maxlength="9" name="run_int" value="<?php if (isset($_COOKIE['automarket_find_query_run_int'])) {if ($_COOKIE['automarket_find_query_run_int']>0){echo($_COOKIE['automarket_find_query_run_int']);}} ?>">
	</td>
	</tr>
	</table>
	<div class="v_i_s"></div>
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Тип двигателя</td>
	<td align="right">
		<select name="motor_type" style="width:100%; font-size:12px;">
			<option value="0" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']=="") {echo("selected");}} ?>></option>
			<option value="11" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==11) {echo("selected");}} ?>>Бензин карбюратор</option>
			<option value="12" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==12) {echo("selected");}} ?>>Бензин инжектор</option>
			<option value="13" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==13) {echo("selected");}} ?>>Бензин ротор</option>				
			<option value="14" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==14) {echo("selected");}} ?>>Бензин компрессор</option>				
			<option value="15" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==15) {echo("selected");}} ?>>Бензин турбонаддув</option>				
			<option value="16" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==16) {echo("selected");}} ?>>Дизель</option>				
			<option value="17" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==17) {echo("selected");}} ?>>Дизель турбонаддув</option>				
			<option value="18" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==18) {echo("selected");}} ?>>Гибридный бензиновый</option>
			<option value="19" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==19) {echo("selected");}} ?>>Гибридный дизельный</option>
			<option value="20" <?php if (isset($_COOKIE['automarket_find_query_motor_type'])) {if ($_COOKIE['automarket_find_query_motor_type']==20) {echo("selected");}} ?>>Электрический</option>
		</select>
	</td>
	</tr>
	</table>
	<div class="v_i_s"></div>
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">КПП</td>
	<td align="right">
		<select name="KPP" style="width:100%; font-size:12px;">
			<option value="0" <?php if (isset($_COOKIE['automarket_find_query_KPP'])) {if ($_COOKIE['automarket_find_query_KPP']=="") {echo("selected");}} ?>></option>				
			<option value="11" <?php if (isset($_COOKIE['automarket_find_query_KPP'])) {if ($_COOKIE['automarket_find_query_KPP']==11) {echo("selected");}} ?>>Механическая</option>
			<option value="12" <?php if (isset($_COOKIE['automarket_find_query_KPP'])) {if ($_COOKIE['automarket_find_query_KPP']==12) {echo("selected");}} ?>>АКПП</option>
			<option value="13" <?php if (isset($_COOKIE['automarket_find_query_KPP'])) {if ($_COOKIE['automarket_find_query_KPP']==13) {echo("selected");}}?>>Вариатор</option>
			<option value="14" <?php if (isset($_COOKIE['automarket_find_query_KPP'])) {if ($_COOKIE['automarket_find_query_KPP']==14) {echo("selected");}} ?>>Робот</option>				
		</select>
	</td>
	</tr>
	</table>
	<div class="v_i_s"></div>		
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Год выпуска</td>
	<td align="right">
		<input style="border:1px solid #bbbbbb; width:100%;" maxlength="4" name="year_production" value="<?php if (isset($_COOKIE['automarket_find_query_year_production'])) {if ($_COOKIE['automarket_find_query_year_production']>0){echo($_COOKIE['automarket_find_query_year_production']);}} ?>">
	</td>
	</tr>
	</table>
	<div class="v_i_s"></div>		
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Тип привода</td>
	<td align="right">
		<select name="drive_type" style="width:100%; font-size:12px;">
			<option value="0" <?php if (isset($_COOKIE['automarket_find_query_drive_type'])) {if ($_COOKIE['automarket_find_query_drive_type']=="") {echo("selected");}} ?>></option>				
			<option value="11" <?php if (isset($_COOKIE['automarket_find_query_drive_type'])) {if ($_COOKIE['automarket_find_query_drive_type']==11) {echo("selected");}} ?>>Задний</option>
			<option value="12" <?php if (isset($_COOKIE['automarket_find_query_drive_type'])) {if ($_COOKIE['automarket_find_query_drive_type']==12) {echo("selected");}} ?>>Передний</option>
			<option value="13" <?php if (isset($_COOKIE['automarket_find_query_drive_type'])) {if ($_COOKIE['automarket_find_query_drive_type']==13) {echo("selected");}} ?>>Полный</option>				
		</select>
	</td>
	</tr>
	</table>	
	<div class="v_i_s"></div>		
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Тип кузова</td>
	<td align="right">
		<select name="basket_type" style="width:100%; font-size:12px;">
			<option value="0" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']=="") {echo("selected");}} ?>></option>				
			<option value="11" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==11) {echo("selected");}} ?>>Седан</option>
			<option value="12" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==12) {echo("selected");}} ?>>Хэтчбек 3д</option>
			<option value="13" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==13) {echo("selected");}} ?>>Хэтчбек 5д</option>				
			<option value="14" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==14) {echo("selected");}} ?>>Универсал</option>
			<option value="15" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==15) {echo("selected");}} ?>>Внедорожник 3д</option>
			<option value="16" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==16) {echo("selected");}} ?>>Внедорожник 5д</option>
			<option value="17" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==17) {echo("selected");}} ?>>Пикап</option>
			<option value="18" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==18) {echo("selected");}} ?>>Минивен</option>
			<option value="19" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==19) {echo("selected");}} ?>>Компактвен</option>
			<option value="20" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==20) {echo("selected");}} ?>>Кабриолет</option>
			<option value="21" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==21) {echo("selected");}} ?>>Купе</option>
			<option value="22" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==22) {echo("selected");}} ?>>Родстер</option>
			<option value="23" <?php if (isset($_COOKIE['automarket_find_query_basket_type'])) {if ($_COOKIE['automarket_find_query_basket_type']==23) {echo("selected");}} ?>>Лимузин</option>
		</select>	
	</td>
	</tr>
	</table>	
	
	<div class="v_i_s"></div>		
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Состояние</td>
	<td align="right">
		<select name="state" style="width:100%; font-size:12px;">
			<option value="0" <?php if (isset($_COOKIE['automarket_find_query_state'])) {if ($_COOKIE['automarket_find_query_state']=="") {echo("selected");}} ?>></option>
			<option value="11" <?php if (isset($_COOKIE['automarket_find_query_state'])) {if ($_COOKIE['automarket_find_query_state']==11) {echo("selected");}} ?>>На запчасти</option>
			<option value="12" <?php if (isset($_COOKIE['automarket_find_query_state'])) {if ($_COOKIE['automarket_find_query_state']==12) {echo("selected");}} ?>>"Перевертыш"</option>
			<option value="13" <?php if (isset($_COOKIE['automarket_find_query_state'])) {if ($_COOKIE['automarket_find_query_state']==13) {echo("selected");}} ?>>Битая</option>
			<option value="14" <?php if (isset($_COOKIE['automarket_find_query_state'])) {if ($_COOKIE['automarket_find_query_state']==14) {echo("selected");}} ?>>Требует ремонта</option>	
			<option value="15" <?php if (isset($_COOKIE['automarket_find_query_state'])) {if ($_COOKIE['automarket_find_query_state']==15) {echo("selected");}} ?>>Удовлетворительное</option>				
			<option value="16" <?php if (isset($_COOKIE['automarket_find_query_state'])) {if ($_COOKIE['automarket_find_query_state']==16) {echo("selected");}} ?>>Хорошее</option>				
			<option value="17" <?php if (isset($_COOKIE['automarket_find_query_state'])) {if ($_COOKIE['automarket_find_query_state']==17) {echo("selected");}} ?>>Отличное</option>				
			<option value="18" <?php if (isset($_COOKIE['automarket_find_query_state'])) {if ($_COOKIE['automarket_find_query_state']==18) {echo("selected");}} ?>>Новая</option>				
		</select>
	</td>
	</tr>
	</table>	


	<div class="v_i_s"></div>		
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Регион продавца</td>
	<td align="right">
		<input style="border:1px solid #bbbbbb; width:100%;" id="automarket_form_region" name="region" maxlength="100" value="<?php if (isset($_COOKIE['automarket_find_query_region'])) {echo($_COOKIE['automarket_find_query_region']);} ?>">	
	</td>
	</tr>
	</table>

	<div class="v_i_s"></div>		
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Город продавца</td>
	<td align="right">
		<input style="border:1px solid #bbbbbb; width:100%;" id="automarket_form_city" name="city" maxlength="100" value="<?php if (isset($_COOKIE['automarket_find_query_city'])) {echo($_COOKIE['automarket_find_query_city']);} ?>">
	</td>
	</tr>
	</table>
	
	
	<div class="v_i_s"></div>		
	<table cellpadding="0" cellspacing="0" width="400">
	<tr valign="top" >
	<td width="180" style="padding-left:10px;">Цена</td>
	<td align="right">
		<input id="automarket_form_price_int" style="border:1px solid #bbbbbb; width:100%" name="price_int" maxlength="9" value="<?php if (isset($_COOKIE['automarket_find_query_price_int'])) {if ($_COOKIE['automarket_find_query_price_int']>0){echo($_COOKIE['automarket_find_query_price_int']);}} ?>">
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
		<span class="work_width_photo_6 small_link" onclick="general___swim_hide('swim_automarket_find_panel_autos');">убрать</span>
	 </td>
	</tr>
	</table>	
	
	
		<input name="submit" value="find_automarket_auto" type="hidden">
		
		
	</form><?php GeneralImagesPreload::input("images/_general/general___find_submit_hover.png"); ?>
<div class="v_i_b"></div>	
</div>

	