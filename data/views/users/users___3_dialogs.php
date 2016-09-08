<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php


UsersDialogs::$type_of_correspondence=GeneralPageTree::$othervar1;//передадим данные "из прошлого"
UsersDialogs::set_main_data_of_our_dialog($MSQLc);

/*
echo(UsersDialogs::$dialog_enable." dialog_enable<br>");
echo(UsersDialogs::$type_of_correspondence." type_of_correspondence<br>");
echo(UsersDialogs::$number_table_messages." number_table_messages<br>");
echo(UsersDialogs::$id_correspondence." id_correspondence<br>");
echo(UsersDialogs::$who." who<br>");
echo(UsersDialogs::$is_deleted_by_me." is_deleted_by_me<br>");
echo(UsersDialogs::$is_deleted_by_him." is_deleted_by_him<br>");
echo(UsersDialogs::$our_num_column." our_num_column<br>");
echo(UsersDialogs::$his_num_column." his_num_column<br>");
echo(UsersDialogs::$id_user1." id_user1<br>");
echo(UsersDialogs::$id_user2." id_user2<br>");
echo(UsersDialogs::$max_id." max_id<br>");
*/
if (UsersDialogs::$dialog_enable==1){//если диалог идентифицирован
include("data/components/users/panels/users___3_dialogs_panel_top.php");

	//записываем тему оповещения 10 последним(разным) участникам, у которых еще нет такой темы
	//$getvar1 - имя переписки (диалог, конференция в будущем возможно)
	//$getvar2 - пользователь, который написал
	//$getvar3 - база данных - её номер	
	GeneralDialogWindows::$getvar1=UsersDialogs::$id_correspondence;	
	GeneralDialogWindows::$getvar2=UsersMyData::$id;	
	GeneralDialogWindows::$getvar3=UsersDialogs::$number_table_messages;	
	GeneralDialogWindows::$getvar4=UsersDialogs::$id_correspondence;
	GeneralDialogWindows::$num_page=GeneralGetVars::$num_page;	
	if (UsersDialogs::$is_deleted_by_him==1){//если он удалился из диалога, то никого не оповещаем
		GeneralDialogWindows::$signaturing="";}
	else {//иначе оповещаем его
		GeneralDialogWindows::$signaturing="sm";}
	
		
	GeneralDialogWindows::$height="400px";//1 -  открытый чат	
	GeneralDialogWindows::$pagetype=1;//это диалог пользователей	
	//GeneralDialogWindows::$signaturing=1;//1 -  оповещаем всех переписчиков
	GeneralDialogWindows::$type=3;//вытягивается по высоте экрана
	GeneralDialogWindows::$padding_right=0;	
	GeneralDialogWindows::$id_dialog="users_dialogs_1";//2 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
	GeneralDialogWindows::$database="registrated_users___correspondence_messages_".UsersDialogs::$number_table_messages;//база данных диалога
	GeneralDialogWindows::$textforpanel="Написать";
	GeneralDialogWindows::$namedialog=UsersDialogs::$who_name; 
		if (UsersDialogs::$is_deleted_by_him==1){GeneralDialogWindows::$namedialog.=" - <span style=\"color:#aa3333;\">участник удалил переписку с вами</span>";}
		if (UsersDialogs::$is_deleted_by_me==1){GeneralDialogWindows::$namedialog.=" - <span style=\"color:#33aa33;\">переписка, удаленная вами, восстановлена</span>";}
	
	
	GeneralDialogWindows::$condition1="id_correspondence=".UsersDialogs::$id_correspondence;//условие 1 для базы данных
	//GeneralDialogWindows::$condition2="id_photo=".$row['id_photo'];	//условие 2 для базы данных
	GeneralDialogWindows::$valuesnumber=5;//сколько value делаем	
	GeneralDialogWindows::$idmessage=2;//где будет номер сообщения	
	GeneralDialogWindows::$autor=3;//какую value делаем автором при вставке
	GeneralDialogWindows::$textvalue=5;//где будет текст
	GeneralDialogWindows::$time=4;//какую value делаем временем создания сообщения	при вставке
	GeneralDialogWindows::$value1=UsersDialogs::$id_correspondence;//значение для вставки
	GeneralDialogWindows::$value2="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value3="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value5="";//значение для вставки - потом вставим

	include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
	?>
	<script type="text/javascript">
		$('#div_dialog_1_var_width').width('100%');//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
		$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
		$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
	</script>




<?php



}




?></div>