<div class="v_i_b"></div>
<div class="padding_left_10 padding_right_20"><?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_1.php");
$row=GeneralMYSQL::fetch_array($res);

?><?php include("data/components/_general/breadcrumbs.php"); ?>
<span class="huge_text_h1"><?php echo($row['video_name']);?></span>
<div class="v_i_b"></div>
<?php


echo($row['video_code']);
GeneralMYSQL::free($res); ?>

<div class="v_i_b"></div>
<div class="v_i_b"></div>


	<?php
	GeneralDialogWindows::$type=2;//2 -  открывающийся чат
	GeneralDialogWindows::$padding_right=10;	
	GeneralDialogWindows::$id_dialog="video_2_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
	GeneralDialogWindows::$database="video___messages";//база данных диалога
	GeneralDialogWindows::$textforpanel="Написать комментарий";
	GeneralDialogWindows::$namedialog="Комментарии";
	GeneralDialogWindows::$condition1="id_video=".GeneralGetVars::$var2;//условие 1 для базы данных
	//GeneralDialogWindows::$condition2="id_photo=".$row['id_photo'];	//условие 2 для базы данных
	GeneralDialogWindows::$idmessage=2;//где будет номер сообщения	
	GeneralDialogWindows::$valuesnumber=5;//сколько value делаем	
	GeneralDialogWindows::$autor=3;//какую value делаем автором при вставке
	GeneralDialogWindows::$textvalue=4;//где будет текст
	GeneralDialogWindows::$time=5;//какую value делаем временем создания сообщения	при вставке
	GeneralDialogWindows::$value1=GeneralGetVars::$var2;//значение для вставки
	GeneralDialogWindows::$value2="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value3="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value5="";//значение для вставки - потом вставим

	include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
	?>
	<script type="text/javascript">
		$('#div_dialog_1_var_width').width(474);//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
		$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
		$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
	</script>













<div class="v_i_b"></div>
<div class="v_i_b"></div>
<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_2.php");

while($row=GeneralMYSQL::fetch_array($res)) {

?>
<a href="http://instorage.org/portfolio/tazteam/video/<?php echo($row['id']);?>" class="huge_link"><?php echo($row['video_name']);?></a>
<div class="v_i_b"></div>
<?php } 
GeneralMYSQL::free($res); ?>
</div>


