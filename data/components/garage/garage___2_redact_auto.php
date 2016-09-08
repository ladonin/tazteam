<span class="lead">Добавить/редактировать автомобиль</span>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Марка <b class="red">*</b></td>
			<td align="right">
				<select id="garage_form_mark" name="mark" style="width:100%; border:1px solid #bbbbbb;">
					<option value="0" <?php if (GarageSendTopic::$array_data['mark']=="") {echo("selected");} ?>></option>					
					<option value="156" <?php if (GarageSendTopic::$array_data['mark']==156) {echo("selected");} ?>>АЗЛК (Москвич)</option>
					<option value="157" <?php if (GarageSendTopic::$array_data['mark']==157) {echo("selected");} ?>>ВАЗ</option>
					<option value="158" <?php if (GarageSendTopic::$array_data['mark']==158) {echo("selected");} ?>>ГАЗ</option>
					<option value="159" <?php if (GarageSendTopic::$array_data['mark']==159) {echo("selected");} ?>>ЗАЗ</option>	
					<option value="160" <?php if (GarageSendTopic::$array_data['mark']==160) {echo("selected");} ?>>ЗИЛ</option>
					<option value="161" <?php if (GarageSendTopic::$array_data['mark']==161) {echo("selected");} ?>>ИЖ</option>					
					<option value="162" <?php if (GarageSendTopic::$array_data['mark']==162) {echo("selected");} ?>>КамАЗ</option>
					<option value="163" <?php if (GarageSendTopic::$array_data['mark']==163) {echo("selected");} ?>>ЛУАЗ</option>
					<option value="164" <?php if (GarageSendTopic::$array_data['mark']==164) {echo("selected");} ?>>МАЗ</option>
					<option value="165" <?php if (GarageSendTopic::$array_data['mark']==165) {echo("selected");} ?>>СеАЗ</option>
					<option value="166" <?php if (GarageSendTopic::$array_data['mark']==166) {echo("selected");} ?>>СМЗ</option>
					<option value="167" <?php if (GarageSendTopic::$array_data['mark']==167) {echo("selected");} ?>>ТАГАЗ</option>					
					<option value="168" <?php if (GarageSendTopic::$array_data['mark']==168) {echo("selected");} ?>>УАЗ</option>					
					<option value="173" <?php if (GarageSendTopic::$array_data['mark']==173) {echo("selected");} ?>>УРАЛ</option>					
					<option value="169" <?php if (GarageSendTopic::$array_data['mark']==169) {echo("selected");} ?>>Эксклюзив</option>
					<option value="101" <?php if (GarageSendTopic::$array_data['mark']==101) {echo("selected");} ?>>ACURA</option>
					<option value="102" <?php if (GarageSendTopic::$array_data['mark']==102) {echo("selected");} ?>>ALFA ROMEO</option>
					<option value="103" <?php if (GarageSendTopic::$array_data['mark']==103) {echo("selected");} ?>>ASTON MARTIN</option>
					<option value="104" <?php if (GarageSendTopic::$array_data['mark']==104) {echo("selected");} ?>>AUDI</option>	
					<option value="105" <?php if (GarageSendTopic::$array_data['mark']==105) {echo("selected");} ?>>BMW</option>				
					<option value="106" <?php if (GarageSendTopic::$array_data['mark']==106) {echo("selected");} ?>>BYD</option>				
					<option value="107" <?php if (GarageSendTopic::$array_data['mark']==107) {echo("selected");} ?>>CADILLAC</option>				
					<option value="108" <?php if (GarageSendTopic::$array_data['mark']==108) {echo("selected");} ?>>CHERY</option>	
					<option value="109" <?php if (GarageSendTopic::$array_data['mark']==109) {echo("selected");} ?>>CHEVROLET</option>
					<option value="110" <?php if (GarageSendTopic::$array_data['mark']==110) {echo("selected");} ?>>CHRYSLER</option>	
					<option value="111" <?php if (GarageSendTopic::$array_data['mark']==111) {echo("selected");} ?>>CITROEN</option>
					<option value="112" <?php if (GarageSendTopic::$array_data['mark']==112) {echo("selected");} ?>>DAEWOO</option>
					<option value="113" <?php if (GarageSendTopic::$array_data['mark']==113) {echo("selected");} ?>>DAIHATSU</option>
					<option value="114" <?php if (GarageSendTopic::$array_data['mark']==114) {echo("selected");} ?>>DODGE</option>	
					<option value="115" <?php if (GarageSendTopic::$array_data['mark']==115) {echo("selected");} ?>>FAW</option>				
					<option value="116" <?php if (GarageSendTopic::$array_data['mark']==116) {echo("selected");} ?>>FIAT</option>				
					<option value="117" <?php if (GarageSendTopic::$array_data['mark']==117) {echo("selected");} ?>>FORD</option>
					<option value="170" <?php if (GarageSendTopic::$array_data['mark']==170) {echo("selected");} ?>>FOTON</option>					
					<option value="118" <?php if (GarageSendTopic::$array_data['mark']==118) {echo("selected");} ?>>GEELY</option>	
					<option value="119" <?php if (GarageSendTopic::$array_data['mark']==119) {echo("selected");} ?>>GMC</option>
					<option value="120" <?php if (GarageSendTopic::$array_data['mark']==120) {echo("selected");} ?>>GREAT WALL</option>	
					<option value="121" <?php if (GarageSendTopic::$array_data['mark']==121) {echo("selected");} ?>>HAFEI</option>
					<option value="122" <?php if (GarageSendTopic::$array_data['mark']==122) {echo("selected");} ?>>HONDA</option>
					<option value="123" <?php if (GarageSendTopic::$array_data['mark']==123) {echo("selected");} ?>>HUMMER</option>
					<option value="124" <?php if (GarageSendTopic::$array_data['mark']==124) {echo("selected");} ?>>HYUNDAI</option>	
					<option value="125" <?php if (GarageSendTopic::$array_data['mark']==125) {echo("selected");} ?>>INFINITI</option>				
					<option value="126" <?php if (GarageSendTopic::$array_data['mark']==126) {echo("selected");} ?>>IRAN KHODRO</option>				
					<option value="127" <?php if (GarageSendTopic::$array_data['mark']==127) {echo("selected");} ?>>ISUZU</option>
					<option value="171" <?php if (GarageSendTopic::$array_data['mark']==171) {echo("selected");} ?>>IVECO</option>					
					<option value="128" <?php if (GarageSendTopic::$array_data['mark']==128) {echo("selected");} ?>>JAGUAR</option>	
					<option value="129" <?php if (GarageSendTopic::$array_data['mark']==129) {echo("selected");} ?>>JEEP</option>
					<option value="130" <?php if (GarageSendTopic::$array_data['mark']==130) {echo("selected");} ?>>KIA</option>	
					<option value="131" <?php if (GarageSendTopic::$array_data['mark']==131) {echo("selected");} ?>>LANCIA</option>
					<option value="132" <?php if (GarageSendTopic::$array_data['mark']==132) {echo("selected");} ?>>LAND ROVER</option>
					<option value="133" <?php if (GarageSendTopic::$array_data['mark']==133) {echo("selected");} ?>>LEXUS</option>
					<option value="134" <?php if (GarageSendTopic::$array_data['mark']==134) {echo("selected");} ?>>LIFAN</option>
					<option value="172" <?php if (GarageSendTopic::$array_data['mark']==172) {echo("selected");} ?>>MAN</option>					
					<option value="135" <?php if (GarageSendTopic::$array_data['mark']==135) {echo("selected");} ?>>MAZDA</option>				
					<option value="136" <?php if (GarageSendTopic::$array_data['mark']==136) {echo("selected");} ?>>MERCEDES-BENZ</option>				
					<option value="137" <?php if (GarageSendTopic::$array_data['mark']==137) {echo("selected");} ?>>MERCURY</option>				
					<option value="138" <?php if (GarageSendTopic::$array_data['mark']==138) {echo("selected");} ?>>MINI</option>	
					<option value="139" <?php if (GarageSendTopic::$array_data['mark']==139) {echo("selected");} ?>>MITSUBISHI</option>
					<option value="140" <?php if (GarageSendTopic::$array_data['mark']==140) {echo("selected");} ?>>NISSAN</option>	
					<option value="141" <?php if (GarageSendTopic::$array_data['mark']==141) {echo("selected");} ?>>OPEL</option>
					<option value="142" <?php if (GarageSendTopic::$array_data['mark']==142) {echo("selected");} ?>>PEUGEOT</option>
					<option value="143" <?php if (GarageSendTopic::$array_data['mark']==143) {echo("selected");} ?>>PORSCHE</option>
					<option value="144" <?php if (GarageSendTopic::$array_data['mark']==144) {echo("selected");} ?>>RENAULT</option>
					<option value="145" <?php if (GarageSendTopic::$array_data['mark']==145) {echo("selected");} ?>>ROVER</option>				
					<option value="146" <?php if (GarageSendTopic::$array_data['mark']==146) {echo("selected");} ?>>SAAB</option>				
					<option value="147" <?php if (GarageSendTopic::$array_data['mark']==147) {echo("selected");} ?>>SEAT</option>				
					<option value="148" <?php if (GarageSendTopic::$array_data['mark']==148) {echo("selected");} ?>>SKODA</option>	
					<option value="149" <?php if (GarageSendTopic::$array_data['mark']==149) {echo("selected");} ?>>SMART</option>
					<option value="150" <?php if (GarageSendTopic::$array_data['mark']==150) {echo("selected");} ?>>SSANG YONG</option>	
					<option value="151" <?php if (GarageSendTopic::$array_data['mark']==151) {echo("selected");} ?>>SUBARU</option>
					<option value="152" <?php if (GarageSendTopic::$array_data['mark']==152) {echo("selected");} ?>>SUZUKI</option>					
					<option value="174" <?php if (GarageSendTopic::$array_data['mark']==174) {echo("selected");} ?>>TATRA</option>					
					<option value="153" <?php if (GarageSendTopic::$array_data['mark']==153) {echo("selected");} ?>>TOYOTA</option>
					<option value="154" <?php if (GarageSendTopic::$array_data['mark']==154) {echo("selected");} ?>>VOLKSWAGEN</option>	
					<option value="155" <?php if (GarageSendTopic::$array_data['mark']==155) {echo("selected");} ?>>VOLVO</option>
				</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Модель <b class="red">*</b></td>
			<td align="right">
				<input id="garage_form_model" style="border:1px solid #bbbbbb; width:100%;" name="model" value="<?php echo(GarageSendTopic::$array_data['model']); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Страна-производитель</td>
			<td align="right">
				<input id="garage_form_country_producer" style="border:1px solid #bbbbbb; width:100%;" name="country_producer" value="<?php echo(GarageSendTopic::$array_data['country_producer']); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>		
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Год выпуска</td>
			<td align="left">
				<input id="garage_form_year_production" style="border:1px solid #bbbbbb; width:50px;" maxlength="4" name="year_production" value="<?php if (GarageSendTopic::$array_data['year_production']>0){echo(GarageSendTopic::$array_data['year_production']);} ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Пробег, км</td>
			<td align="left">
				<input id="garage_form_run_int" style="border:1px solid #bbbbbb; width:100px;" maxlength="9" name="run_int" value="<?php if (GarageSendTopic::$array_data['run_int']>0){echo(GarageSendTopic::$array_data['run_int']);} ?>">
				<input id="garage_form_run" name="run" type="hidden">
				</td>
			</tr>
			</table>

<div class="v_i_b"></div>
<div class="v_i_b"></div>
			<div class="panel_text_dark_small">Основные данные:</div>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Тип двигателя</td>
			<td align="right">
				<select name="motor_type" style="width:100%; ">
					<option value="0" <?php if (GarageSendTopic::$array_data['motor_type']=="") {echo("selected");} ?>></option>
					<option value="11" <?php if (GarageSendTopic::$array_data['motor_type']==11) {echo("selected");} ?>>Бензин карбюратор</option>
					<option value="12" <?php if (GarageSendTopic::$array_data['motor_type']==12) {echo("selected");} ?>>Бензин инжектор</option>
					<option value="13" <?php if (GarageSendTopic::$array_data['motor_type']==13) {echo("selected");} ?>>Бензин ротор</option>				
					<option value="14" <?php if (GarageSendTopic::$array_data['motor_type']==14) {echo("selected");} ?>>Бензин компрессор</option>				
					<option value="15" <?php if (GarageSendTopic::$array_data['motor_type']==15) {echo("selected");} ?>>Бензин турбонаддув</option>				
					<option value="16" <?php if (GarageSendTopic::$array_data['motor_type']==16) {echo("selected");} ?>>Дизель</option>				
					<option value="17" <?php if (GarageSendTopic::$array_data['motor_type']==17) {echo("selected");} ?>>Дизель турбонаддув</option>				
					<option value="18" <?php if (GarageSendTopic::$array_data['motor_type']==18) {echo("selected");} ?>>Гибридный бензиновый</option>
					<option value="19" <?php if (GarageSendTopic::$array_data['motor_type']==19) {echo("selected");} ?>>Гибридный дизельный</option>
					<option value="20" <?php if (GarageSendTopic::$array_data['motor_type']==20) {echo("selected");} ?>>Электрический</option>
				</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>			
			<table cellpadding="0" cellspacing="0" width="500">
			<tr valign="top" >
			<td width="180">Объем двигателя, куб см</td>
			<td align="left">
				<input id="garage_form_motor_vol" maxlength="5" style="border:1px solid #bbbbbb; width:100px;" name="motor_vol" value="<?php echo(GarageSendTopic::$array_data['motor_vol']); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Мощность двигателя, л.с.</td>
			<td align="left">
				<input id="garage_form_power" maxlength="4" style="border:1px solid #bbbbbb; width:100px;" name="power" value="<?php if (GarageSendTopic::$array_data['power']>0){echo(GarageSendTopic::$array_data['power']);} ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">КПП</td>
			<td align="right">
				<select name="KPP" style="width:100%; ">
					<option value="0" <?php if (GarageSendTopic::$array_data['KPP']=="") {echo("selected");} ?>></option>				
					<option value="11" <?php if (GarageSendTopic::$array_data['KPP']==11) {echo("selected");} ?>>Механическая</option>
					<option value="12" <?php if (GarageSendTopic::$array_data['KPP']==12) {echo("selected");} ?>>АКПП</option>
					<option value="13" <?php if (GarageSendTopic::$array_data['KPP']==13) {echo("selected");} ?>>Вариатор</option>
					<option value="14" <?php if (GarageSendTopic::$array_data['KPP']==14) {echo("selected");} ?>>Робот</option>				
					</select>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>			
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Тип привода</td>
			<td align="right">
				<select name="drive_type" style="width:100%; ">
					<option value="0" <?php if (GarageSendTopic::$array_data['drive_type']=="") {echo("selected");} ?>></option>				
					<option value="11" <?php if (GarageSendTopic::$array_data['drive_type']==11) {echo("selected");} ?>>Задний</option>
					<option value="12" <?php if (GarageSendTopic::$array_data['drive_type']==12) {echo("selected");} ?>>Передний</option>
					<option value="13" <?php if (GarageSendTopic::$array_data['drive_type']==13) {echo("selected");} ?>>Полный</option>				
					</select>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Тип кузова</td>
			<td align="right">
				<select name="basket_type" style="width:100%; ">
					<option value="0" <?php if (GarageSendTopic::$array_data['basket_type']=="") {echo("selected");} ?>></option>				
					<option value="11" <?php if (GarageSendTopic::$array_data['basket_type']==11) {echo("selected");} ?>>Седан</option>
					<option value="12" <?php if (GarageSendTopic::$array_data['basket_type']==12) {echo("selected");} ?>>Хэтчбек 3д</option>
					<option value="13" <?php if (GarageSendTopic::$array_data['basket_type']==13) {echo("selected");} ?>>Хэтчбек 5д</option>				
					<option value="14" <?php if (GarageSendTopic::$array_data['basket_type']==14) {echo("selected");} ?>>Универсал</option>
					<option value="15" <?php if (GarageSendTopic::$array_data['basket_type']==15) {echo("selected");} ?>>Внедорожник 3д</option>
					<option value="16" <?php if (GarageSendTopic::$array_data['basket_type']==16) {echo("selected");} ?>>Внедорожник 5д</option>
					<option value="17" <?php if (GarageSendTopic::$array_data['basket_type']==17) {echo("selected");} ?>>Пикап</option>
					<option value="18" <?php if (GarageSendTopic::$array_data['basket_type']==18) {echo("selected");} ?>>Минивен</option>
					<option value="19" <?php if (GarageSendTopic::$array_data['basket_type']==19) {echo("selected");} ?>>Компактвен</option>
					<option value="20" <?php if (GarageSendTopic::$array_data['basket_type']==20) {echo("selected");} ?>>Кабриолет</option>
					<option value="21" <?php if (GarageSendTopic::$array_data['basket_type']==21) {echo("selected");} ?>>Купе</option>
					<option value="22" <?php if (GarageSendTopic::$array_data['basket_type']==22) {echo("selected");} ?>>Родстер</option>
					<option value="23" <?php if (GarageSendTopic::$array_data['basket_type']==23) {echo("selected");} ?>>Лимузин</option>
					</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Обивка салона</td>
			<td align="right">
				<select name="salon" style="width:100%; ">
					<option value="0" <?php if (GarageSendTopic::$array_data['salon']=="") {echo("selected");} ?>></option>				
					<option value="11" <?php if (GarageSendTopic::$array_data['salon']==11) {echo("selected");} ?>>Кожа</option>
					<option value="12" <?php if (GarageSendTopic::$array_data['salon']==12) {echo("selected");} ?>>Ткань</option>
					<option value="13" <?php if (GarageSendTopic::$array_data['salon']==13) {echo("selected");} ?>>Велюр</option>
					<option value="14" <?php if (GarageSendTopic::$array_data['salon']==14) {echo("selected");} ?>>Комбинированный</option>
					</select>
			</td>
			</tr>
			</table>	
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Цвет</td>
			<td align="left">
				<input id="garage_form_color" style="border:1px solid #bbbbbb; width:100px;" name="color" value="<?php echo(GarageSendTopic::$array_data['color']); ?>">
			</td>
			</tr>
			</table>


<div class="v_i_b"></div>





<div class="v_i_b"></div>
			<div class="link_lead">Описание:</div>
<div class="v_i_b"></div>			
			
			<textarea id="garage_form_content" maxlength="5000"  style="height:400px; width: 482px;" name="content" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'><?php echo(GarageSendTopic::$array_data['content_nacked']); ?></textarea>
			<input name="contentnacked" id="garage_form_contentnacked" value="" type="hidden">
			
		
			
			
			
<div class="v_i_b"></div>
<div class="v_i_b"></div>
			<div class="link_lead">Дополнительная информация:</div>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180"><span class="text12dark">Электростеклоподъемники</span></td>
			<td align="right">
				<select name="electro_glass_up" style="width:100%; ">
					<option value="0" <?php if (GarageSendTopic::$array_data['electro_glass_up']=="") {echo("selected");} ?>></option>				
					<option value="11" <?php if (GarageSendTopic::$array_data['electro_glass_up']==11) {echo("selected");} ?>>Все</option>
					<option value="12" <?php if (GarageSendTopic::$array_data['electro_glass_up']==12) {echo("selected");} ?>>Передние</option>
					</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Колесные диски</td>
			<td align="right">
				<select name="disks" style="width:100%; ">
					<option value="0" <?php if (GarageSendTopic::$array_data['disks']=="") {echo("selected");} ?>></option>				
					<option value="11" <?php if (GarageSendTopic::$array_data['disks']==11) {echo("selected");} ?>>Штампованные</option>
					<option value="12" <?php if (GarageSendTopic::$array_data['disks']==12) {echo("selected");} ?>>Сборные</option>
					<option value="13" <?php if (GarageSendTopic::$array_data['disks']==13) {echo("selected");} ?>>Литые</option>
					<option value="14" <?php if (GarageSendTopic::$array_data['disks']==14) {echo("selected");} ?>>Кованые</option>
					</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Размер колесных дисков</td>
			<td align="right">
				<select name="disk_size" style="width:100%; ">
					<option value="0" <?php if (GarageSendTopic::$array_data['disk_size']=="") {echo("selected");} ?>></option>				
					<option value="112" <?php if (GarageSendTopic::$array_data['disk_size']==112) {echo("selected");} ?>>R12</option>
					<option value="113" <?php if (GarageSendTopic::$array_data['disk_size']==113) {echo("selected");} ?>>R13</option>
					<option value="114" <?php if (GarageSendTopic::$array_data['disk_size']==114) {echo("selected");} ?>>R14</option>
					<option value="115" <?php if (GarageSendTopic::$array_data['disk_size']==115) {echo("selected");} ?>>R15</option>
					<option value="116" <?php if (GarageSendTopic::$array_data['disk_size']==116) {echo("selected");} ?>>R16</option>
					<option value="117" <?php if (GarageSendTopic::$array_data['disk_size']==117) {echo("selected");} ?>>R17</option>
					<option value="118" <?php if (GarageSendTopic::$array_data['disk_size']==118) {echo("selected");} ?>>R18</option>
					<option value="119" <?php if (GarageSendTopic::$array_data['disk_size']==119) {echo("selected");} ?>>R19</option>
					<option value="120" <?php if (GarageSendTopic::$array_data['disk_size']==120) {echo("selected");} ?>>R20</option>
					<option value="121" <?php if (GarageSendTopic::$array_data['disk_size']==121) {echo("selected");} ?>>R21</option>				
					<option value="122" <?php if (GarageSendTopic::$array_data['disk_size']==122) {echo("selected");} ?>>R22</option>
					<option value="123" <?php if (GarageSendTopic::$array_data['disk_size']==123) {echo("selected");} ?>>R23</option>
					<option value="124" <?php if (GarageSendTopic::$array_data['disk_size']==124) {echo("selected");} ?>>R24</option>				
					<option value="125" <?php if (GarageSendTopic::$array_data['disk_size']==125) {echo("selected");} ?>>R25</option>
					<option value="126" <?php if (GarageSendTopic::$array_data['disk_size']==126) {echo("selected");} ?>>R26</option>
					<option value="127" <?php if (GarageSendTopic::$array_data['disk_size']==127) {echo("selected");} ?>>R27</option>
					</select>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Антиблокировочная система</td>
			<td align="left">
				<input type="checkbox" name="abs" value="1" <?php if (GarageSendTopic::$array_data['abs']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Газобалонное оборудование</td>
			<td align="left">
				<input type="checkbox" name="gbo" value="1" <?php if (GarageSendTopic::$array_data['gbo']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Бортовой компьютер</td>
			<td align="left">
				<input type="checkbox" name="computer" value="1" <?php if (GarageSendTopic::$array_data['computer']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Кондиционер</td>
			<td align="left">
				<input type="checkbox" name="conditioner" value="1" <?php if (GarageSendTopic::$array_data['conditioner']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Подогрев сидений</td>
			<td align="left">
				<input type="checkbox" name="warm_chair" value="1" <?php if (GarageSendTopic::$array_data['warm_chair']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Сигнализация</td>
			<td align="left">
				<input type="checkbox" name="guard" value="1" <?php if (GarageSendTopic::$array_data['guard']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Парктроник</td>
			<td align="left">
				<input type="checkbox" name="parktronik" value="1" <?php if (GarageSendTopic::$array_data['parktronik']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Подушки безопасности</td>
			<td align="left">
				<input type="checkbox" name="security_pillows" value="1" <?php if (GarageSendTopic::$array_data['security_pillows']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Тонировка стекол</td>
			<td align="left">
				<input type="checkbox" name="toned" value="1" <?php if (GarageSendTopic::$array_data['toned']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Усилитель руля</td>
			<td align="left">
				<input type="checkbox" name="amplifier_rudder" value="1" <?php if (GarageSendTopic::$array_data['amplifier_rudder']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div><div class="v_i_t"></div>
			<table cellpadding="0" cellspacing="0" width="500" style="margin-right: 10px;">
			<tr valign="top" >
			<td width="180">Электронная педаль газа</td>
			<td align="left">
				<input type="checkbox" name="electro_gas" value="1" <?php if (GarageSendTopic::$array_data['electro_gas']) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>			
			
		
