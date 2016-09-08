<?php 
GeneralPageBasic::increment_view($MSQLc,"photo___photos_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'","id_photo='".PhotoBase::$id_photo_page."'",0,0,0);//плюс просмотр
include("data/components/_general/panels/panel_in_topic.php");
GeneralPagesCounter::calculate($MSQLc, "photo___photos_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'",0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3);
GeneralPagesCounter::imagespreload();
?>
<div class="v_i_b"></div>
<div class="grey_line_1"></div>





<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_1.php");
$row=GeneralMYSQL::fetch_array($res);
GeneralMYSQL::free($res);
PhotoBase::set_autor_topic($row['t_id_user']);//задаем id автора темы
GeneralImagesCalculate::set_size_for_image_in_view($row['size_photo'],0);//задаем размеры для главного изображения - то, что указано в БД, без пересчета
PhotoBase::detect_next_num_page_photo($MSQLc,$row['id_photo']);//определяем на какую страницу идем дальше и подгружаем её
//GeneralImagesPreload::input("_files/images/photo/".GeneralGetVars::$var2."/".GeneralGetVars::$var3."/".PhotoBase::$id_next_photo."_7.".PhotoBase::$format_next_photo);
?>



<table cellpadding="0" cellspacing="0" class="photo3_5" id="table_var_width">
<tr>
<td align="center"  class="photo3_10">
	<div class="v_i_b"></div>	
	<div class="padding_right_10"><?php echo(GeneralPagesCounter::$htmlcode); ?></div>
	<div class="v_i_b"></div>
	<a href="http://instorage.org/portfolio/tazteam/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."=".PhotoBase::$next_num_page_photo);?>"><img class="refimage" id="image_var_size" src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."/".$row['id_photo']."_6.".$row['format_photo']);?>" width="500"></a>
	<script type="text/javascript">	
		photo_width_img=<?php echo(GeneralImagesCalculate::$view_width);?>;
		photo_height_img=<?php echo(GeneralImagesCalculate::$view_height);?>;	
		photo_img_url="http:\/\/140706.selcdn.com\/tazteam\/_files\/images\/photo\/<?php echo(GeneralGetVars::$var2."\/".$row['id_topic']."\/".$row['id_photo']);?>";
		photo_img_format="<?php echo($row['format_photo']);?>";
		general___set_sizes('<?php echo(GeneralGetVars::$var1);?>','');

		photo_img_full_url=photo___return_image_to_show(photo_img_url,photo_img_format);

		$('#image_var_size').attr('src',photo_img_full_url);//определяем URL и загружаем картинку в тег IMG
		$('#image_var_size').width(photo_width);
		$('#image_var_size').height(photo_height);

		<?php if (PhotoBase::$id_next_photo){?>
		next_photo_img_url="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo(GeneralGetVars::$var2);?>/<?php echo(GeneralGetVars::$var3);?>/<?php echo(PhotoBase::$id_next_photo);?>";
		next_photo_img_format="<?php echo(PhotoBase::$format_next_photo);?>";
		next_photo_img_full_url=photo___return_image_to_show(next_photo_img_url,next_photo_img_format);
		//next_photo_img_full_url=preg_quote(next_photo_img_full_url);
		general___preload_one_image(next_photo_img_full_url);
		<?php } ?>
	</script>
</td>
</tr>
<tr>
<td align="left">
	<div class="v_i_b"></div>
	<?php
	//GeneralDialogWindows::$signaturing=1;//1 -  оповещаем всех переписчиков
	GeneralDialogWindows::$type=1;//2 -  открывающийся чат
	GeneralDialogWindows::$padding_right=10;
	GeneralDialogWindows::$id_dialog="photo_3_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
	GeneralDialogWindows::$database="photo___messages_".GeneralGetVars::$var2;//база данных диалога
	GeneralDialogWindows::$textforpanel="Написать комментарий";
	GeneralDialogWindows::$namedialog="Комментарии";
	GeneralDialogWindows::$condition1="id_topic=".GeneralGetVars::$var3;//условие 1 для базы данных
	GeneralDialogWindows::$condition2="id_photo=".$row['id_photo'];	//условие 2 для базы данных
	GeneralDialogWindows::$valuesnumber=6;//сколько value делаем	
	GeneralDialogWindows::$idmessage=3;//где будет номер сообщения
	GeneralDialogWindows::$autor=4;//какую value делаем автором при вставке
	GeneralDialogWindows::$textvalue=5;//где будет текст
	GeneralDialogWindows::$time=6;//какую value делаем временем создания сообщения	при вставке
	GeneralDialogWindows::$value1=GeneralGetVars::$var3;//значение для вставки
	GeneralDialogWindows::$value2=$row['id_photo'];//значение для вставки
	GeneralDialogWindows::$value3="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value5="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value6="";//значение для вставки - потом вставим
	include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
	?>
	<script type="text/javascript">
		$('#div_dialog_1_var_width').width(photo_width);//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
		$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
		$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
	</script>
</td>		
</tr>	
</table>
<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_photos_right_panel_1.php");
?>



