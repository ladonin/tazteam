			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="<?php	if ($flagmarkerror==1) { ?>text12red<?php }	else { ?>text12dark<?php }	?>">Марка</span> <b class="text12red">*</b></td>
			<td align="right">
				<select name="mark" style="width:100%; <?php if ($flagmarkerror==1) { ?>border:1px solid #ff0000;<?php } else {?>border:1px solid #bbbbbb;<?php } ?> font-size:12px;">
					<option value="0" <?php if (!$mark) {echo("selected");} ?>></option>					
					<option value="156" <?php if ($mark==156) {echo("selected");} ?>>АЗЛК (Москвич)</option>						
					<option value="157" <?php if ($mark==157) {echo("selected");} ?>>ВАЗ</option>
					<option value="158" <?php if ($mark==158) {echo("selected");} ?>>ГАЗ</option>
					<option value="159" <?php if ($mark==159) {echo("selected");} ?>>ЗАЗ</option>	
					<option value="160" <?php if ($mark==160) {echo("selected");} ?>>ЗИЛ</option>
					<option value="161" <?php if ($mark==161) {echo("selected");} ?>>ИЖ</option>					
					<option value="162" <?php if ($mark==162) {echo("selected");} ?>>КамАЗ</option>
					<option value="163" <?php if ($mark==163) {echo("selected");} ?>>ЛУАЗ</option>
					<option value="164" <?php if ($mark==164) {echo("selected");} ?>>МАЗ</option>
					<option value="165" <?php if ($mark==165) {echo("selected");} ?>>СеАЗ</option>
					<option value="166" <?php if ($mark==166) {echo("selected");} ?>>СМЗ</option>
					<option value="167" <?php if ($mark==167) {echo("selected");} ?>>ТАГАЗ</option>					
					<option value="168" <?php if ($mark==168) {echo("selected");} ?>>УАЗ</option>					
					<option value="173" <?php if ($mark==173) {echo("selected");} ?>>УРАЛ</option>					
					<option value="169" <?php if ($mark==169) {echo("selected");} ?>>Эксклюзив</option>
					<option value="101" <?php if ($mark==101) {echo("selected");} ?>>ACURA</option>
					<option value="102" <?php if ($mark==102) {echo("selected");} ?>>ALFA ROMEO</option>
					<option value="103" <?php if ($mark==103) {echo("selected");} ?>>ASTON MARTIN</option>
					<option value="104" <?php if ($mark==104) {echo("selected");} ?>>AUDI</option>	
					<option value="105" <?php if ($mark==105) {echo("selected");} ?>>BMW</option>				
					<option value="106" <?php if ($mark==106) {echo("selected");} ?>>BYD</option>				
					<option value="107" <?php if ($mark==107) {echo("selected");} ?>>CADILLAC</option>				
					<option value="108" <?php if ($mark==108) {echo("selected");} ?>>CHERY</option>	
					<option value="109" <?php if ($mark==109) {echo("selected");} ?>>CHEVROLET</option>
					<option value="110" <?php if ($mark==110) {echo("selected");} ?>>CHRYSLER</option>	
					<option value="111" <?php if ($mark==111) {echo("selected");} ?>>CITROEN</option>
					<option value="112" <?php if ($mark==112) {echo("selected");} ?>>DAEWOO</option>
					<option value="113" <?php if ($mark==113) {echo("selected");} ?>>DAIHATSU</option>
					<option value="114" <?php if ($mark==114) {echo("selected");} ?>>DODGE</option>	
					<option value="115" <?php if ($mark==115) {echo("selected");} ?>>FAW</option>				
					<option value="116" <?php if ($mark==116) {echo("selected");} ?>>FIAT</option>				
					<option value="117" <?php if ($mark==117) {echo("selected");} ?>>FORD</option>
					<option value="170" <?php if ($mark==170) {echo("selected");} ?>>FOTON</option>					
					<option value="118" <?php if ($mark==118) {echo("selected");} ?>>GEELY</option>	
					<option value="119" <?php if ($mark==119) {echo("selected");} ?>>GMC</option>
					<option value="120" <?php if ($mark==120) {echo("selected");} ?>>GREAT WALL</option>	
					<option value="121" <?php if ($mark==121) {echo("selected");} ?>>HAFEI</option>
					<option value="122" <?php if ($mark==122) {echo("selected");} ?>>HONDA</option>
					<option value="123" <?php if ($mark==123) {echo("selected");} ?>>HUMMER</option>
					<option value="124" <?php if ($mark==124) {echo("selected");} ?>>HYUNDAI</option>	
					<option value="125" <?php if ($mark==125) {echo("selected");} ?>>INFINITI</option>				
					<option value="126" <?php if ($mark==126) {echo("selected");} ?>>IRAN KHODRO</option>				
					<option value="127" <?php if ($mark==127) {echo("selected");} ?>>ISUZU</option>
					<option value="171" <?php if ($mark==171) {echo("selected");} ?>>IVECO</option>					
					<option value="128" <?php if ($mark==128) {echo("selected");} ?>>JAGUAR</option>	
					<option value="129" <?php if ($mark==129) {echo("selected");} ?>>JEEP</option>
					<option value="130" <?php if ($mark==130) {echo("selected");} ?>>KIA</option>	
					<option value="131" <?php if ($mark==131) {echo("selected");} ?>>LANCIA</option>
					<option value="132" <?php if ($mark==132) {echo("selected");} ?>>LAND ROVER</option>
					<option value="133" <?php if ($mark==133) {echo("selected");} ?>>LEXUS</option>
					<option value="134" <?php if ($mark==134) {echo("selected");} ?>>LIFAN</option>
					<option value="172" <?php if ($mark==172) {echo("selected");} ?>>MAN</option>					
					<option value="135" <?php if ($mark==135) {echo("selected");} ?>>MAZDA</option>				
					<option value="136" <?php if ($mark==136) {echo("selected");} ?>>MERCEDES-BENZ</option>				
					<option value="137" <?php if ($mark==137) {echo("selected");} ?>>MERCURY</option>				
					<option value="138" <?php if ($mark==138) {echo("selected");} ?>>MINI</option>	
					<option value="139" <?php if ($mark==139) {echo("selected");} ?>>MITSUBISHI</option>
					<option value="140" <?php if ($mark==140) {echo("selected");} ?>>NISSAN</option>	
					<option value="141" <?php if ($mark==141) {echo("selected");} ?>>OPEL</option>
					<option value="142" <?php if ($mark==142) {echo("selected");} ?>>PEUGEOT</option>
					<option value="143" <?php if ($mark==143) {echo("selected");} ?>>PORSCHE</option>
					<option value="144" <?php if ($mark==144) {echo("selected");} ?>>RENAULT</option>
					<option value="145" <?php if ($mark==145) {echo("selected");} ?>>ROVER</option>				
					<option value="146" <?php if ($mark==146) {echo("selected");} ?>>SAAB</option>				
					<option value="147" <?php if ($mark==147) {echo("selected");} ?>>SEAT</option>				
					<option value="148" <?php if ($mark==148) {echo("selected");} ?>>SKODA</option>	
					<option value="149" <?php if ($mark==149) {echo("selected");} ?>>SMART</option>
					<option value="150" <?php if ($mark==150) {echo("selected");} ?>>SSANG YONG</option>	
					<option value="151" <?php if ($mark==151) {echo("selected");} ?>>SUBARU</option>
					<option value="152" <?php if ($mark==152) {echo("selected");} ?>>SUZUKI</option>					
					<option value="174" <?php if ($mark==174) {echo("selected");} ?>>TATRA</option>					
					<option value="153" <?php if ($mark==153) {echo("selected");} ?>>TOYOTA</option>
					<option value="154" <?php if ($mark==154) {echo("selected");} ?>>VOLKSWAGEN</option>	
					<option value="155" <?php if ($mark==155) {echo("selected");} ?>>VOLVO</option>
				</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="<?php	if ($flagmodelerror==1) { ?>text12red<?php }	else { ?>text12dark<?php }	?>">Модель</span> <b class="text12red">*</b></td>
			<td align="right">
				<input style="<?php if ($flagmodelerror==1) { ?>border:1px solid #ff0000;<?php } else {?>border:1px solid #bbbbbb;<?php } ?> 
				width:<?php if (($brousertype=="bad")||($brousertype=="opera")) { echo("206"); } else if ($brousertype=="chrome") { echo("208");} else { echo("208"); } ?>px;" name="model" value="<?php echo($model); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Страна-производитель</span></td>
			<td align="right">
				<input style="border:1px solid #bbbbbb; width:<?php if (($brousertype=="bad")||($brousertype=="opera")) { echo("206"); } else if ($brousertype=="chrome") { echo("208");} else { echo("208"); } ?>px;" name="country_producer" value="<?php echo($country_producer); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>		
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Год выпуска</span></td>
			<td align="right">
				<input style="border:1px solid #bbbbbb; width:50px;" name="year_production" value="<?php echo($year_production); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Пробег</span></td>
			<td align="right">
				<input style="border:1px solid #bbbbbb; width:100px;" name="run" value="<?php echo($run); ?>"> <span class="text12dark">км</span>
			</td>
			</tr>
			</table>

<div class="v_i_b"></div>
<div class="v_i_b"></div>
			<div class="panel_1 panel_1_grey">Основные данные:</div>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Тип двигателя</span></td>
			<td align="right">
				<select name="motor_type" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$motor_type) {echo("selected");} ?>></option>
					<option value="11" <?php if ($motor_type==11) {echo("selected");} ?>>Бензин карбюратор</option>
					<option value="12" <?php if ($motor_type==12) {echo("selected");} ?>>Бензин инжектор</option>
					<option value="13" <?php if ($motor_type==13) {echo("selected");} ?>>Бензин ротор</option>				
					<option value="14" <?php if ($motor_type==14) {echo("selected");} ?>>Бензин компрессор</option>				
					<option value="15" <?php if ($motor_type==15) {echo("selected");} ?>>Бензин турбонаддув</option>				
					<option value="16" <?php if ($motor_type==16) {echo("selected");} ?>>Дизель</option>				
					<option value="17" <?php if ($motor_type==17) {echo("selected");} ?>>Дизель турбонаддув</option>				
					<option value="18" <?php if ($motor_type==18) {echo("selected");} ?>>Гибридный бензиновый</option>
					<option value="19" <?php if ($motor_type==19) {echo("selected");} ?>>Гибридный дизельный</option>
					<option value="20" <?php if ($motor_type==20) {echo("selected");} ?>>Электрический</option>
				</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>			
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Объем двигателя</span></td>
			<td align="right">
				<input style="border:1px solid #bbbbbb; width:100px;" name="motor_vol" value="<?php echo($motor_vol); ?>"> <span class="text12dark">куб см</span>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Мощность двигателя</span></td>
			<td align="right">
				<input style="border:1px solid #bbbbbb; width:100px;" name="power" value="<?php echo($power); ?>"> <span class="text12dark">л.с.</span>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">КПП</span></td>
			<td align="right">
				<select name="KPP" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$KPP) {echo("selected");} ?>></option>				
					<option value="11" <?php if ($KPP==11) {echo("selected");} ?>>Механическая</option>
					<option value="12" <?php if ($KPP==12) {echo("selected");} ?>>АКПП</option>
					<option value="13" <?php if ($KPP==13) {echo("selected");} ?>>Вариатор</option>
					<option value="14" <?php if ($KPP==14) {echo("selected");} ?>>Робот</option>				
					</select>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>			
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Тип привода</span></td>
			<td align="right">
				<select name="drive_type" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$drive_type) {echo("selected");} ?>></option>				
					<option value="11" <?php if ($drive_type==11) {echo("selected");} ?>>Задний</option>
					<option value="12" <?php if ($drive_type==12) {echo("selected");} ?>>Передний</option>
					<option value="13" <?php if ($drive_type==13) {echo("selected");} ?>>Полный</option>				
					</select>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Тип кузова</span></td>
			<td align="right">
				<select name="basket_type" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$basket_type) {echo("selected");} ?>></option>				
					<option value="11" <?php if ($basket_type==11) {echo("selected");} ?>>Седан</option>
					<option value="12" <?php if ($basket_type==12) {echo("selected");} ?>>Хэтчбек 3д</option>
					<option value="13" <?php if ($basket_type==13) {echo("selected");} ?>>Хэтчбек 5д</option>				
					<option value="14" <?php if ($basket_type==14) {echo("selected");} ?>>Универсал</option>
					<option value="15" <?php if ($basket_type==15) {echo("selected");} ?>>Внедорожник 3д</option>
					<option value="16" <?php if ($basket_type==16) {echo("selected");} ?>>Внедорожник 5д</option>
					<option value="17" <?php if ($basket_type==17) {echo("selected");} ?>>Пикап</option>
					<option value="18" <?php if ($basket_type==18) {echo("selected");} ?>>Минивен</option>
					<option value="19" <?php if ($basket_type==19) {echo("selected");} ?>>Компактвен</option>
					<option value="20" <?php if ($basket_type==20) {echo("selected");} ?>>Кабриолет</option>
					<option value="21" <?php if ($basket_type==21) {echo("selected");} ?>>Купе</option>
					<option value="22" <?php if ($basket_type==22) {echo("selected");} ?>>Родстер</option>
					<option value="23" <?php if ($basket_type==23) {echo("selected");} ?>>Лимузин</option>
					</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Обивка салона</span></td>
			<td align="right">
				<select name="salon" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$salon) {echo("selected");} ?>></option>				
					<option value="11" <?php if ($salon==11) {echo("selected");} ?>>Кожа</option>
					<option value="12" <?php if ($salon==12) {echo("selected");} ?>>Ткань</option>
					<option value="13" <?php if ($salon==13) {echo("selected");} ?>>Велюр</option>
					<option value="14" <?php if ($salon==14) {echo("selected");} ?>>Комбинированный</option>
					</select>
			</td>
			</tr>
			</table>	
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Цвет</span></td>
			<td align="right">
				<input style="border:1px solid #bbbbbb; width:<?php if (($brousertype=="bad")||($brousertype=="opera")) { echo("206"); } else if ($brousertype=="chrome") { echo("208");} else { echo("208"); } ?>px;" name="color" value="<?php echo($color); ?>">
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Состояние</span></td>
			<td align="right">
				<select name="state" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$state) {echo("selected");} ?>></option>
					<option value="11" <?php if ($state==11) {echo("selected");} ?>>На запчасти</option>
					<option value="12" <?php if ($state==12) {echo("selected");} ?>>"Перевертыш"</option>
					<option value="13" <?php if ($state==13) {echo("selected");} ?>>Битая</option>
					<option value="14" <?php if ($state==14) {echo("selected");} ?>>Требует ремонта</option>	
					<option value="15" <?php if ($state==15) {echo("selected");} ?>>Удовлетворительное</option>				
					<option value="16" <?php if ($state==16) {echo("selected");} ?>>Хорошее</option>				
					<option value="17" <?php if ($state==17) {echo("selected");} ?>>Отличное</option>				
					<option value="18" <?php if ($state==18) {echo("selected");} ?>>Новая</option>				
				</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>			
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Наличие</span></td>
			<td align="right">
				<select name="presense" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$presense) {echo("selected");} ?>></option>				
					<option value="11" <?php if ($presense==11) {echo("selected");} ?>>В наличии</option>
					<option value="12" <?php if ($presense==12) {echo("selected");} ?>>На заказ</option>
					<option value="13" <?php if ($presense==13) {echo("selected");} ?>>В пути</option>
					</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Таможня</span></td>
			<td align="right">
				<select name="customs" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$customs) {echo("selected");} ?>></option>
					<option value="11" <?php if ($customs==11) {echo("selected");} ?>>Растаможен</option>
					<option value="12" <?php if ($customs==12) {echo("selected");} ?>>Не растаможен</option>
				</select>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>			
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Обмен</span></td>
			<td align="right">
				<select name="changing" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$changing) {echo("selected");} ?>></option>
					<option value="11" <?php if ($changing==11) {echo("selected");} ?>>Интересует</option>
					<option value="12" <?php if ($changing==12) {echo("selected");} ?>>Не интересует</option>
					<option value="13" <?php if ($changing==13) {echo("selected");} ?>>На ТС дешевле</option>
					<option value="14" <?php if ($changing==14) {echo("selected");} ?>>На ТС дороже</option>
					</select>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Продавец</span></td>
			<td align="right">
				<select name="seller" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$seller) {echo("selected");} ?>></option>				
					<option value="11" <?php if ($seller==11) {echo("selected");} ?>>Юр. лицо</option>
					<option value="12" <?php if ($seller==12) {echo("selected");} ?>>Физ. лицо</option>
					</select>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="<?php	if ($flagpriceerror==1) { ?>text12red<?php }	else { ?>text12dark<?php }	?>">Цена</span> <b class="text12red">*</b></td>
			<td align="right">
				<input style="<?php if ($flagpriceerror==1) { ?>border:1px solid #ff0000;<?php } else {?>border:1px solid #bbbbbb;<?php } ?> width:100px;" name="price" maxlength="10" value="<?php echo($price); ?>"> <span class="text12dark">руб</span>
			</td>
			</tr>
			</table>			
		
<div class="v_i_b"></div>
<div class="v_i_b"></div>
			<div class="panel_1 panel_1_grey white">Описание:</div>
<div class="v_i_b"></div>			
			<div class="photo3_12">
			<textarea maxlength="1000" class="automarket2_1" id="inputcontentautomarkettextarea"  name="inputcontentautomarkettextarea" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'></textarea>
			</div>
		
			
			
			
<div class="v_i_b"></div>
<div class="v_i_b"></div>
			<div class="panel_1 panel_1_grey white">Дополнительная информация:</div>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Электростеклоподъемники</span></td>
			<td align="right">
				<select name="electro_glass_up" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$electro_glass_up) {echo("selected");} ?>></option>				
					<option value="11" <?php if ($electro_glass_up==11) {echo("selected");} ?>>Все</option>
					<option value="12" <?php if ($electro_glass_up==12) {echo("selected");} ?>>Передние</option>
					</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Колесные диски</span></td>
			<td align="right">
				<select name="disks" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$disks) {echo("selected");} ?>></option>				
					<option value="11" <?php if ($disks==11) {echo("selected");} ?>>Штампованные</option>
					<option value="12" <?php if ($disks==12) {echo("selected");} ?>>Сборные</option>
					<option value="13" <?php if ($disks==13) {echo("selected");} ?>>Литые</option>
					<option value="14" <?php if ($disks==14) {echo("selected");} ?>>Кованые</option>
					</select>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Размер колесных дисков</span></td>
			<td align="right">
				<select name="disk_size" style="width:100%; font-size:12px;">
					<option value="0" <?php if (!$disk_size) {echo("selected");} ?>></option>				
					<option value="112" <?php if ($disk_size==112) {echo("selected");} ?>>R12</option>
					<option value="113" <?php if ($disk_size==113) {echo("selected");} ?>>R13</option>
					<option value="114" <?php if ($disk_size==114) {echo("selected");} ?>>R14</option>
					<option value="115" <?php if ($disk_size==115) {echo("selected");} ?>>R15</option>
					<option value="116" <?php if ($disk_size==116) {echo("selected");} ?>>R16</option>
					<option value="117" <?php if ($disk_size==117) {echo("selected");} ?>>R17</option>
					<option value="118" <?php if ($disk_size==118) {echo("selected");} ?>>R18</option>
					<option value="119" <?php if ($disk_size==119) {echo("selected");} ?>>R19</option>
					<option value="120" <?php if ($disk_size==120) {echo("selected");} ?>>R20</option>
					<option value="121" <?php if ($disk_size==121) {echo("selected");} ?>>R21</option>				
					<option value="122" <?php if ($disk_size==122) {echo("selected");} ?>>R22</option>
					<option value="123" <?php if ($disk_size==123) {echo("selected");} ?>>R23</option>
					<option value="124" <?php if ($disk_size==124) {echo("selected");} ?>>R24</option>				
					<option value="125" <?php if ($disk_size==125) {echo("selected");} ?>>R25</option>
					<option value="126" <?php if ($disk_size==126) {echo("selected");} ?>>R26</option>
					<option value="127" <?php if ($disk_size==127) {echo("selected");} ?>>R27</option>
					</select>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Антиблокировочная система (ABS)</span></td>
			<td align="right">
				<input type="checkbox" name="abs" value="1" <?php if ($abs) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Газобалонное оборудование (ГБО)</span></td>
			<td align="right">
				<input type="checkbox" name="gbo" value="1" <?php if ($gbo) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Бортовой компьютер</span></td>
			<td align="right">
				<input type="checkbox" name="computer" value="1" <?php if ($computer) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Кондиционер</span></td>
			<td align="right">
				<input type="checkbox" name="conditioner" value="1" <?php if ($conditioner) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Подогрев сидений</span></td>
			<td align="right">
				<input type="checkbox" name="warm_chair" value="1" <?php if ($warm_chair) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Сигнализация</span></td>
			<td align="right">
				<input type="checkbox" name="guard" value="1" <?php if ($guard) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Парктроник</span></td>
			<td align="right">
				<input type="checkbox" name="parktronik" value="1" <?php if ($parktronik) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Подушки безопасности</span></td>
			<td align="right">
				<input type="checkbox" name="security_pillows" value="1" <?php if ($security_pillows) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Тонировка стекол</span></td>
			<td align="right">
				<input type="checkbox" name="toned" value="1" <?php if ($toned) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>			
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Усилитель руля</span></td>
			<td align="right">
				<input type="checkbox" name="amplifier_rudder" value="1" <?php if ($amplifier_rudder) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>
<div class="v_i_b"></div>
			<table cellpadding="0" cellspacing="0" width="400">
			<tr valign="top" >
			<td width="180" style="padding-left:10px;"><span class="text12dark">Электронная педаль газа</span></td>
			<td align="right">
				<input type="checkbox" name="electro_gas" value="1" <?php if ($electro_gas) { echo("checked"); } ?>>
			</td>
			</tr>
			</table>			
			
		
