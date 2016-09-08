<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;
"
class="boxShadow3"
>
   <?php include("data/components/_general/breadcrumbs.php"); ?>
<?php 
GeneralPageBasic::increment_view($MSQLc,"photo___photos_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'","id_photo='".PhotoBase::$id_photo_page."'",0,0,0);//плюс просмотр
GeneralPagesCounter::calculate($MSQLc, "photo___photos_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'",0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3);
include("data/components/photo/panels/photo___3_panel_in_topic.php");
GeneralPagesCounter::imagespreload();




if (GeneralPagesCounter::$N_max>1){
	PhotoBase::$flagonephoto=0;}


?>


<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_1.php");
$row=GeneralMYSQL::fetch_array($res);
GeneralMYSQL::free($res);
PhotoBase::set_autor_topic($row['t_id_user']);//задаем id автора темы
GeneralImagesCalculate::set_size_for_image_in_view($row['size_photo'],0);//задаем размеры для главного изображения - то, что указано в БД, без пересчета
PhotoBase::detect_next_num_page_photo($MSQLc,$row['id_photo'],$row['idkey'],$row['id_topic']);//определяем на какую страницу идем дальше и подгружаем её
//GeneralImagesPreload::input("_files/images/photo/".GeneralGetVars::$var2."/".GeneralGetVars::$var3."/".PhotoBase::$id_next_photo."_7.".PhotoBase::$format_next_photo);
UsersBase::set_points($MSQLc,PhotoBase::$id_autor_topic);//начисляем автору баллы
?>




<div class="v_i_b"></div>
<table cellpadding="0" cellspacing="0">
<tr>
<td align="left" width="598" valign="top">

		<div style="width:588px; overflow:hidden; text-align:center;">		
			<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".PhotoBase::$id_next_topic."=".PhotoBase::$next_num_page_photo);?>"><img style="max-height:588px; max-width:588px;" src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."/".$row['id_photo']."_6.".$row['format_photo']);?>" class="refimage">
</a></div>


	<?php if (PhotoBase::$id_next_photo){?>
	<script type="text/javascript">
	next_photo_img_url="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo(GeneralGetVars::$var2);?>/<?php echo(PhotoBase::$id_next_topic);?>/<?php echo(PhotoBase::$id_next_photo);?>";
	next_photo_img_format="<?php echo(PhotoBase::$format_next_photo);?>";
	next_photo_img_full_url=next_photo_img_url+'_6.'+next_photo_img_format;
	general___preload_one_image(next_photo_img_full_url);
	</script>
	<?php } ?>

	<div class="v_i_b"></div>
	<?php
	GeneralDialogWindows::$getvar1=GeneralGetVars::$var1;	
	GeneralDialogWindows::$getvar2=GeneralGetVars::$var2;	
	GeneralDialogWindows::$getvar3=GeneralGetVars::$var3;	
	GeneralDialogWindows::$getvar4=GeneralGetVars::$var4;	
	GeneralDialogWindows::$num_page=GeneralGetVars::$num_page;
	GeneralDialogWindows::$signaturing="ga";
	GeneralDialogWindows::$idphoto=$row['id_photo'];//кого обсуждаем
	GeneralDialogWindows::$type=1;//2 -  открывающийся чат
	GeneralDialogWindows::$padding_right=0;
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
		//$('#div_dialog_1_var_width').width(photo_width);//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
		//$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
		//$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
	</script>
</td>
<td align="left" valign="top" width="290">




	<?php include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_photos_right_panel_1.php"); ?>



</td>	
</tr>
</table><div class="v_i_b"></div>
</div>
