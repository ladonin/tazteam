<script type="text/javascript">
var dwLN1_Flag_downloading_<?php echo(GeneralDialogWindows::$id_dialog);?>=new Boolean(false);//устанавливается автоматически - можно запрашивать, ожидания подгрузки данных нет
var dialog_windows_1_mouseover_<?php echo(GeneralDialogWindows::$id_dialog);?>=new Boolean(false);



var dwLN1_newmess_<?php echo(GeneralDialogWindows::$id_dialog);?>=new Number();
var dwLN1_adress_<?php echo(GeneralDialogWindows::$id_dialog);?>=new String();//устанавливается ВРУЧНУЮ
var dwLN1_content_<?php echo(GeneralDialogWindows::$id_dialog);?>=new String();

dwLN1_newmess_<?php echo(GeneralDialogWindows::$id_dialog);?>=<?php echo(GeneralDialogWindows::$id_message_current); ?>;//с чего начинать
dwLN1_adress_<?php echo(GeneralDialogWindows::$id_dialog);?>="<?php echo(GeneralGlobalVars::url);?>/data/components/_general/dialog_windows/dialog_windows_1_loading_new_ajax.php";//исполняемый файл

document.getElementById('dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').onmouseover = function() { dialog_windows_1_mouseover_<?php echo(GeneralDialogWindows::$id_dialog);?>=true;}
document.getElementById('dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').onmouseout = function() { dialog_windows_1_mouseover_<?php echo(GeneralDialogWindows::$id_dialog);?>=false;}

$(document).ready(function(){
	setInterval("dwLN1_<?php echo(GeneralDialogWindows::$id_dialog);?>()",<?php echo(GeneralDialogWindows::$period);?>);});

function dwLN1_<?php echo(GeneralDialogWindows::$id_dialog);?>(){
	if (dwLN1_Flag_downloading_<?php echo(GeneralDialogWindows::$id_dialog);?>==false){//alert("=");
		dwLN1_Flag_downloading_<?php echo(GeneralDialogWindows::$id_dialog);?>=true;//идет загрузка - запрет на выполнение, пока не станет false
		var dwLN1_time_on_user_comp_<?php echo(GeneralDialogWindows::$id_dialog);?> = new Date();
		$.post(
		dwLN1_adress_<?php echo(GeneralDialogWindows::$id_dialog);?>+"?act=ajax_jquery",
		{
			'id_dialog':'<?php echo(GeneralInputText::$id);?>',//идентификатор диалога
			'newmess':dwLN1_newmess_<?php echo(GeneralDialogWindows::$id_dialog);?>,//с чего начинаем
			'database':'<?php echo(GeneralDialogWindows::$database);?>',//база данных
			'condition1':'<?php echo(GeneralDialogWindows::$condition1);?>',//условия выборки
			'condition2':'<?php echo(GeneralDialogWindows::$condition2);?>',//условия выборки
			'condition3':'<?php echo(GeneralDialogWindows::$condition3);?>',//условия выборки
			'condition4':'<?php echo(GeneralDialogWindows::$condition4);?>',//условия выборки
			'condition5':'<?php echo(GeneralDialogWindows::$condition5);?>',//условия выборки
			'time_on_user_comp':Math.round(dwLN1_time_on_user_comp_<?php echo(GeneralDialogWindows::$id_dialog);?>.getTime()/1000)//время у пользователя на компьютере
		},
		function(responseText){//alert(responseText);
			if (responseText!=""){
				if (responseText!='\<\!--1--\>'){
					$("#dwLN1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>").show(); //делаем видимым блок с будущим содержимым подгрузки
					$('#dwLN1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>').html($('#dwLN1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>').html()+responseText);
					if (dialog_windows_1_mouseover_<?php echo(GeneralDialogWindows::$id_dialog);?>==false){
						general___scroll_object("dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>",1);}}//крутим вниз
					dwLN1_content_<?php echo(GeneralDialogWindows::$id_dialog);?>=responseText;
					var dwLN1_findresult_<?php echo(GeneralDialogWindows::$id_dialog);?>=dwLN1_content_<?php echo(GeneralDialogWindows::$id_dialog);?>.match(/<\!--(\-?[0-9]{1,})-->$/);
					if (dwLN1_findresult_<?php echo(GeneralDialogWindows::$id_dialog);?>){
						dwLN1_newmess_<?php echo(GeneralDialogWindows::$id_dialog);?>=dwLN1_findresult_<?php echo(GeneralDialogWindows::$id_dialog);?>[1];
						$('#dw1_noonewrite_<?php echo(GeneralDialogWindows::$id_dialog);?>').html('');
						$("#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>").css("overflow-y","scroll");}}
			dwLN1_Flag_downloading_<?php echo(GeneralDialogWindows::$id_dialog);?>=false;});}}//данные загружены и функция завершает свою работу
</script>
<div class="dialog_windows1_5" id="dwLN1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>"></div>