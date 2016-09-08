<?php
//GeneralPageBasic::increment_view($MSQLc,"photo___photos_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'","id_photo='".PhotoBase::$id_photo_page."'",0,0,0);//плюс просмотр
?>
<div class="v_i_b"></div>






<?php
AutomarketBase::convert_cookie_find_query($MSQLc);//запускаем метод, чтобы определить есть ли поисковый запрос - для показа кнопки - очистить поиск
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_1.php");
$row=GeneralMYSQL::fetch_array($res);
GeneralMYSQL::free($res);



	include("data/components/".GeneralGetVars::$var1."/panels/".GeneralGetVars::$var1."___3_panel_top.php");

AutomarketBase::detect_photos_main($row['img'],$row['img_sizes']);//вычисляем фотографии

AutomarketBase::$mark=$row['mark'];
AutomarketBase::$model=$row['model'];
//AutomarketBase::preload_photos(); //подгружаем другие фотографии
?>


<script type="text/javascript">
	general___set_sizes('<?php echo(GeneralGetVars::$var1);?>','');
</script>




<table cellpadding="0" cellspacing="0" class="automarket3_7">
<tr>
<td align="left" valign="top" class="" id="description_side">
	<div class="padding_right_10">
	<script type="text/javascript">
		$('#description_side').width(automarket_description_width);
	</script>
	<?php
	if ($row['themepage']==1){
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_maindata_auto.php"); }
	else if ($row['themepage']==2)	{
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_maindata_else.php"); }
	else if ($row['themepage']==3)	{
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_maindata_else_buy.php"); }




	if ($row['content']) {
		if ($row['themepage']==1)	{  /*если параметры перед есть*/       ?>
			<div class="v_i_b"></div>
			<div class="v_i_b"></div>
			<div class="panel_1 panel_1_grey">Описание:</div>
			<div class="v_i_s"></div>
			<?php }	?>
		<div class="automarket3_1">
			<p class="p_small_text_h1"><?php echo($row['content']);?></p>
		</div><?php }
	if ($row['themepage']==1){
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_maindata_auto_added.php");}?>
	</div>
	<div class="v_i_b"></div>
	<div class="v_i_b"></div>
</td>
<td align="left" id="photo_side" valign="top">
	<script type="text/javascript">
		$('#photo_side').width(automarket_block_photo_width);
	</script>
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left" width="50%" valign="middle" rowspan="2">
		<table cellpadding="0" cellspacing="0">
		<tr>
		<td style="padding-left:10px; background-color:#0571c4">
			<span class="text_18_light_bold" style="line-height:38px;"><?php echo($row['price']);?> руб.</span>
		</td>
		<td width="38" style="background-image: url('<?php echo(GeneralGlobalVars::url);?>/images/automarket/automarket___price_triangle38.png');">
		</td>
		</tr>
		</table>
	</td>
	<td align="right" width="50%" valign="top" style="padding-right:10px;">
		<span class="explanation">Дата размещения:</span>
		<div style="overflow:hidden; height:3px"> </div>


	</td>
	</tr>
		<tr>
		<td align="right" valign="bottom" style="padding-right:10px;">
			<div class="big_text" id="automarket_date_announcement"></div>
		<script type="text/javascript">general___date_DMY_show(<?php echo($row['date']);?>,'automarket_date_announcement');</script>

		</td>
		</tr>
	</table>
	<div class="v_i_b"></div>

	<table cellpadding="0" cellspacing="0" width="100%" class="automarket3_8" id="automarket_block_photo">
	<tr>
	<td align="center" valign="middle">
	<script type="text/javascript">
		$('#automarket_block_photo').height(automarket_block_photo_height);
	</script>
	<?php
		if (AutomarketBase::$img1){	?>
			<img src="http://140706.selcdn.ru/tazteam/images/automarket/<?php echo($row['id']);?>/<?php echo(AutomarketBase::$img1);?>" width="<?php echo(AutomarketBase::$width1);?>" height="<?php echo(AutomarketBase::$height1);?>" id="automarket_img_photo_big" class="refimage automarket3_3" <?php /*onclick="swimwin('gallery','automarket'); automarket_img_to_gallery(); "*/?>>
			<script type="text/javascript">
				automarket_img_url="http:\/\/140706.selcdn.com\/tazteam\/_files\/images\/automarket\/<?php echo($row['id']);?>\/";
				automarket_img_photo="<?php echo(AutomarketBase::$img1);?>";
				automarket_full_url=automarket_img_url+automarket_img_photo;
				automarket___podgon_po_razmeram_img('automarket_img_photo_big','<?php echo(AutomarketBase::$width1);?>','<?php echo(AutomarketBase::$height1);?>');
				$('#automarket_img_photo_big').attr('src',automarket_full_url);
				//alert((($('#automarket_img_photo_big').height()+(automarket_under_photo_photos_width+5)*2)+100-46));
				//alert(height_body);
				//если слишком высокая фотка, то уменьшаем её
				//}
			</script><?php }
		else{ ?>
			<img id="automarket_img_photo_big">
			<script type="text/javascript">
				automarket_img_url="http:\/\/mapstore.org/my_portfolio/tazteam.net\/images\/_general\/";
				automarket_img_photo="general___photo_none_600x400.jpg";
				automarket_full_url=automarket_img_url+automarket_img_photo;
				$('#automarket_img_photo_big').attr('src',automarket_full_url);
				$('#automarket_img_photo_big').width(automarket_photo_width);
			</script><?php } ?>
	</td>
	</tr>
	</table>
	<div class="v_i_b"></div>

	<?php
	$current_var1=0;
	for($i=1; $i<=20; $i++){
		$varimg="img".$i;
		$varwidth="width".$i;
		$varheight="height".$i;
		if (AutomarketBase::$$varimg){
		$current_var1++;
			?><script type="text/javascript">
				automarket_img_url_cur<?php echo($i);?>="http:\/\/140706.selcdn.com\/tazteam\/_files\/images\/automarket\/<?php echo($row['id']);?>\/";

				automarket_img_photo_cur<?php echo($i);?>="<?php echo(AutomarketBase::$$varimg);?>";
				automarket_img_photo_cur<?php echo($i);?> = automarket_img_photo_cur<?php echo($i);?>.replace("_3.","_2.");//задаем ключ размеров
				automarket_full_url_cur<?php echo($i);?>=automarket_img_url_cur<?php echo($i);?>+automarket_img_photo_cur<?php echo($i);?>;

				automarket_img_photo_to_big_cur<?php echo($i);?>="<?php echo(AutomarketBase::$$varimg);?>";
				automarket_full_url_to_big_cur<?php echo($i);?>=automarket_img_url+automarket_img_photo_to_big_cur<?php echo($i);?>;

				//испытать! предварительная подгрузка других фотографий объявления
				general___preload_one_image(automarket_full_url_to_big_cur<?php echo($i);?>);

			</script><img class="automarket3_2<?php if (!$current_var1%5) { echo("_side");}?>" id="automarket_under_photo_photo<?php echo($i);?>"
			onclick="automarket___perelist_img('automarket_img_photo_big',automarket_full_url_to_big_cur<?php echo($i);?>);
			automarket___podgon_po_razmeram_img('automarket_img_photo_big','<?php echo(AutomarketBase::$$varwidth);?>','<?php echo(AutomarketBase::$$varheight);?>');
			<?php /*gallery_num_photo_func(<?php echo($js);?>);*/?>
			"><script type="text/javascript">
				$('#automarket_under_photo_photo<?php echo($i);?>').attr('src',automarket_full_url_cur<?php echo($i);?>);
				$('#automarket_under_photo_photo<?php echo($i);?>').width(automarket_under_photo_photos_width);
			</script><?php } }?>
			<div class="v_i_b"></div>
			<div class="v_i_b"></div>


			<?php
			//GeneralDialogWindows::$signaturing=1;//1 -  оповещаем всех переписчиков
			GeneralDialogWindows::$type=1;//2 -  открывающийся чат
			GeneralDialogWindows::$padding_right=10;
			GeneralDialogWindows::$id_dialog="automarket_3_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый)
			GeneralDialogWindows::$database="automarket___messages";//база данных диалога
			GeneralDialogWindows::$textforpanel="Написать комментарий";
			GeneralDialogWindows::$namedialog="Комментарии";
			GeneralDialogWindows::$condition1="id_automarket=".GeneralGetVars::$var3;//условие 1 для базы данных
			//GeneralDialogWindows::$condition2="id_photo=".$row['id_photo'];	//условие 2 для базы данных
			GeneralDialogWindows::$idmessage=2;//где будет номер сообщения
			GeneralDialogWindows::$valuesnumber=5;//сколько value делаем
			GeneralDialogWindows::$autor=3;//какую value делаем автором при вставке
			GeneralDialogWindows::$textvalue=4;//где будет текст
			GeneralDialogWindows::$time=5;//какую value делаем временем создания сообщения	при вставке
			GeneralDialogWindows::$value1=GeneralGetVars::$var3;//значение для вставки
			GeneralDialogWindows::$value2="";//значение для вставки - потом вставим
			GeneralDialogWindows::$value3="";//значение для вставки - потом вставим
			GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
			GeneralDialogWindows::$value5="";//значение для вставки - потом вставим

			include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
			?>
			<script type="text/javascript">
				$('#div_dialog_1_var_width').width(automarket_photo_width);//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
				$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
				$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
			</script>




			<div class="v_i_b"></div>
			<div class="v_i_b"></div>






</td>
</tr>
</table>








<?php
AutomarketBase::$condition_added1=" themepage='".GeneralGetVars::$var2."' ";//условия выборки дополительных объявлений
AutomarketBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
if (AutomarketBase::$find_query=="") {//если нет поиска
if (GeneralGetVars::$var2==1) {
	AutomarketBase::$condition_added1.=" AND mark='".AutomarketBase::$mark."' ";
	if ((AutomarketBase::$model)&&(AutomarketBase::$mark==157)) {
		if ((AutomarketBase::$model=="2105")||(AutomarketBase::$model=="2105i")) {AutomarketBase::$condition_added1.="and (model='2105' OR model='2105i')";}
		else if ((AutomarketBase::$model=="2107")||(AutomarketBase::$model=="2107i")||(AutomarketBase::$model=="21074")||(AutomarketBase::$model=="21074i")) {AutomarketBase::$condition_added1.="and (model='2107' OR model='2107i' OR model='21074' OR model='21074i')";}
		else if ((AutomarketBase::$model=="2108")||(AutomarketBase::$model=="2108i")||(AutomarketBase::$model=="21083")||(AutomarketBase::$model=="21083i")) {AutomarketBase::$condition_added1.="and (model='2108' OR model='2108i' OR model='21083' OR model='21083i')";}
		else if ((AutomarketBase::$model=="2109")||(AutomarketBase::$model=="2109i")||(AutomarketBase::$model=="21093")||(AutomarketBase::$model=="21093i")) {AutomarketBase::$condition_added1.="and (model='2109' OR model='2109i' OR model='21093' OR model='21093i')";}
		else if ((AutomarketBase::$model=="21099")||(AutomarketBase::$model=="21099i")) {AutomarketBase::$condition_added1.="and (model='21099' OR model='21099i')";}
		else if ((AutomarketBase::$model=="21010")||(AutomarketBase::$model=="21010i")) {AutomarketBase::$condition_added1.="and (model='21010' OR model='21010i')";}
		else if ((AutomarketBase::$model=="2114")||(AutomarketBase::$model=="21140")) {AutomarketBase::$condition_added1.="and (model='2114' OR model='21140')";}
		else if ((AutomarketBase::$model=="priora")||(AutomarketBase::$model=="PRIORA")||(AutomarketBase::$model=="Priora")||(AutomarketBase::$model=="Приора")||(AutomarketBase::$model=="приора")||(AutomarketBase::$model=="ПРИОРА")) 		{AutomarketBase::$condition_added1.="and (model='priora' OR model='PRIORA' OR model='Priora' OR model='Приора' OR model='приора' OR model='ПРИОРА')";}
		else if ((AutomarketBase::$model=="калина")||(AutomarketBase::$model=="Калина")||(AutomarketBase::$model=="КАЛИНА")||(AutomarketBase::$model=="Kalina")||(AutomarketBase::$model=="kalina")||(AutomarketBase::$model=="KALINA")) 		{AutomarketBase::$condition_added1.="and (model='калина' OR model='Калина' OR model='КАЛИНА' OR model='Kalina' OR model='kalina' OR model='KALINA')";}
		//else {AutomarketBase::$condition_added1.="and model='".AutomarketBase::$model."'";}
		}}}
AutomarketBase::$condition_added2=" themepage='".GeneralGetVars::$var2."' ";//условия выборки дополительных объявлений

include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_added_announcements.php");?>




