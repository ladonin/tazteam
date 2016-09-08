<div class="padding_left_10 padding_right_20 ">

	<?php
	GeneralDialogWindows::$height="700px";//высота диалогового окна
	GeneralDialogWindows::$getvar1=GeneralGetVars::$var1;	
	GeneralDialogWindows::$getvar2=0;	
	GeneralDialogWindows::$getvar3=0;	
	GeneralDialogWindows::$getvar4=0;	
	GeneralDialogWindows::$num_page=0;
	GeneralDialogWindows::$signaturing="ch";
	GeneralDialogWindows::$idphoto=0;
	GeneralDialogWindows::$type=1;//2 -  открывающийся чат
	GeneralDialogWindows::$padding_right=0;
	GeneralDialogWindows::$id_dialog="chat_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
	GeneralDialogWindows::$database="chat___chat";//база данных диалога
	GeneralDialogWindows::$textforpanel="Написать";
	GeneralDialogWindows::$namedialog="Открытый чат";
	//GeneralDialogWindows::$condition1="user=1";//условие 1 для базы данных
	GeneralDialogWindows::$valuesnumber=4;//сколько value делаем	
	GeneralDialogWindows::$idmessage=1;//где будет номер сообщения
	GeneralDialogWindows::$autor=2;//какую value делаем автором при вставке
	GeneralDialogWindows::$textvalue=4;//где будет текст
	GeneralDialogWindows::$time=3;//какую value делаем временем создания сообщения	при вставке
	GeneralDialogWindows::$value1="";//значение для вставки
	GeneralDialogWindows::$value2="";//значение для вставки
	GeneralDialogWindows::$value3="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value5="";//значение для вставки - потом вставим
	include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
	?>
	

</div>




