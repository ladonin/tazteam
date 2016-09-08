<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;
"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?>
<?php 
UsersBase::set_points($MSQLc,GeneralGetVars::$var2);//начисляем ему баллы
GeneralPageBasic::increment_view($MSQLc,"registrated_users___photoalbums_photos","id_user='".GeneralGetVars::$var2."'","id_album='".GeneralGetVars::$var4."'","id_photo='".UsersPhotoalbumsBase::$id_photo_page."'",0,0);//плюс просмотр
//include("data/components/_general/panels/panel_in_topic.php");
GeneralPagesCounter::calculate($MSQLc, "registrated_users___photoalbums_photos","id_user='".GeneralGetVars::$var2."'","id_album='".GeneralGetVars::$var4."'",0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3."/".GeneralGetVars::$var4);
include("data/components/users/panels/users___3_photoalbums_3_panel_in_topic.php");
GeneralPagesCounter::imagespreload();


if (GeneralPagesCounter::$N_max>1){
	UsersPhotoalbumsBase::$flagonephoto=0;}



?>


<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_photoalbums_3_query_1.php");
$row=GeneralMYSQL::fetch_array($res);
GeneralMYSQL::free($res);
UsersBase::detect_photoalbums($MSQLc,0,0);//вычисляем фотоальбомы пользователя
UsersPhotoalbumsBase::set_autor_topic($row['t_id_user']);//задаем id автора темы
GeneralImagesCalculate::set_size_for_image_in_view($row['size_photo'],0);//задаем размеры для главного изображения - то, что указано в БД, без пересчета
UsersPhotoalbumsBase::detect_next_num_page_photo($MSQLc,$row['id_photo']);//определяем на какую страницу идем дальше и подгружаем её
?>
<div class="v_i_b"></div>
<table cellpadding="0" cellspacing="0">
<tr>
<td align="left" width="598" valign="top">

		<div style="width:588px; overflow:hidden; text-align:center;">		
		<a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(GeneralGetVars::$var2."/photoalbums/".$row['id_album']."=".UsersPhotoalbumsBase::$next_num_page_photo);?>"><img style="max-height:588px; max-width:588px; " src="http://140706.selcdn.ru/tazteam/images/users/photoalbums/<?php echo($row['dir_album']."/".GeneralGetVars::$var2."/".$row['id_album']."/".$row['id_photo']."_6.".$row['format_photo']);?>" class="refimage">
		</a></div>	

	<?php if (UsersPhotoalbumsBase::$id_next_photo){?>
	<script type="text/javascript">
	next_photo_img_url="http://140706.selcdn.ru/tazteam/images/users/photoalbums/<?php echo($row['dir_album']);?>/<?php echo(GeneralGetVars::$var2."/".$row['id_album']."/".UsersPhotoalbumsBase::$id_next_photo);?>";
	next_photo_img_format="<?php echo(UsersPhotoalbumsBase::$format_next_photo);?>";
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
	GeneralDialogWindows::$signaturing="sf";
	GeneralDialogWindows::$idphoto=$row['id_photo'];
	GeneralDialogWindows::$type=1;//2 -  открывающийся чат
	GeneralDialogWindows::$padding_right=0;
	GeneralDialogWindows::$id_dialog="users_photoalbums_photo_3_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
	GeneralDialogWindows::$database="registrated_users___photoalbums_photos_messages";//база данных диалога
	GeneralDialogWindows::$textforpanel="Написать комментарий";
	GeneralDialogWindows::$namedialog="Комментарии";
	GeneralDialogWindows::$condition1="user=".$row['t_id_user'];//условие 1 для базы данных
	GeneralDialogWindows::$condition2="id_album=".$row['id_album'];	//условие 2 для базы данных	
	GeneralDialogWindows::$condition3="id_photo=".$row['id_photo'];	//условие 2 для базы данных
	GeneralDialogWindows::$valuesnumber=7;//сколько value делаем	
	
	
	GeneralDialogWindows::$idmessage=4;//где будет номер сообщения
	GeneralDialogWindows::$autor=5;//какую value делаем автором при вставке
	GeneralDialogWindows::$textvalue=6;//где будет текст
	GeneralDialogWindows::$time=7;//какую value делаем временем создания сообщения	при вставке
	GeneralDialogWindows::$value1=$row['t_id_user'];//значение для вставки
	GeneralDialogWindows::$value2=$row['id_album'];//значение для вставки
	GeneralDialogWindows::$value3=$row['id_photo'];//значение для вставки - потом вставим
	GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value5="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value6="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value7="";//значение для вставки - потом вставим
	include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
	?>
	<script type="text/javascript">
		//$('#div_dialog_1_var_width').width(photo_width);//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
		//$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
		//$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
	</script>
</td>
<td align="left" valign="top" width="290">
	<?php include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_photoalbums_3_right_panel_1.php"); ?>
</td>	
</tr>
</table><div class="v_i_b"></div>
</div>


