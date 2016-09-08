<script type="text/javascript">
var dwLL1_Flag_stop_<?php echo(GeneralDialogWindows::$id_dialog);?>=new Boolean(false);//устанавливается автоматически
var dwLL1_Flag_downloading_<?php echo(GeneralDialogWindows::$id_dialog);?>=new Boolean(false);//устанавливается автоматически
var dwLL1_N_current_<?php echo(GeneralDialogWindows::$id_dialog);?>=new Number();//устанавливается ВРУЧНУЮ (дополнительный параметр)
var dwLL1_max_<?php echo(GeneralDialogWindows::$id_dialog);?>=new Number();//устанавливается ВРУЧНУЮ
var dwLL1_adress_<?php echo(GeneralDialogWindows::$id_dialog);?>=new String();//устанавливается ВРУЧНУЮ

dwLL1_max_<?php echo(GeneralDialogWindows::$id_dialog);?>=<?php echo(GeneralDialogWindows::max_count_loading_messages); ?>;//>>>>>>>>>>>>>>>>>>>>     СКОЛЬКО ПОДГРУЖАЕМ         <<<<<<<<<<<<<<<<<<<<<<<<<
dwLL1_N_current_<?php echo(GeneralDialogWindows::$id_dialog);?>="<?php echo(GeneralDialogWindows::$id_message_start); ?>";//последний подгруженный idkey до аякса записываем в ячейку счетчика
dwLL1_adress_<?php echo(GeneralDialogWindows::$id_dialog);?>="<?php echo(GeneralGlobalVars::url);?>/data/components/_general/dialog_windows/dialog_windows_1_loading_last_ajax.php";//исполняемый файл

var dwLL1_scroll_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>;//прокрутка от верха окна
var dwLL1_height_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?>;//высота тела чата
var dwLL1_scroll_from_bottom_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?>;//прокрутка от низа тела чата
var dwLL1_scroll_real_<?php echo(GeneralDialogWindows::$id_dialog);?>;//текущее положение в теле чата

$(document).ready(function(){
	$('#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').scroll(function(){//при прокрутке в этом окне
		if ((dwLL1_Flag_stop_<?php echo(GeneralDialogWindows::$id_dialog);?>==false)&&(dwLL1_Flag_downloading_<?php echo(GeneralDialogWindows::$id_dialog);?>==false)){
			dwLL1_scroll_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?> = $(this).scrollTop();//узнаем прокрутку от верха окна
			if(dwLL1_scroll_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>==0){ // >>>>>>>>>>>>>>    при каком подъеме к верху начинаем подгружать <<<<<<<<<<<<<<<<
				dwLL1_height_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?> = $("#dw1_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?>").height();
				dwLL1_scroll_from_bottom_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?> = dwLL1_height_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?>;//узнаем прокрутку от низа окна
				if (dwLL1_Flag_stop_<?php echo(GeneralDialogWindows::$id_dialog);?>==false){
					dwLL1_Flag_downloading_<?php echo(GeneralDialogWindows::$id_dialog);?>=true;
					dwLL1_<?php echo(GeneralDialogWindows::$id_dialog);?>();}}}});
	$("#dwLL1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>").hide();//скрываем пока пустой блок подгрузки сообщений
	general___scroll_object("dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>",1);});//в самом начале крутим вниз












function dwLL1_<?php echo(GeneralDialogWindows::$id_dialog);?>()	{
	var dwLL1_time_on_user_comp_<?php echo(GeneralDialogWindows::$id_dialog);?> = new Date();
	$.post(
	dwLL1_adress_<?php echo(GeneralDialogWindows::$id_dialog);?>+"?act=ajax_jquery",
	{
		'id_dialog':'<?php echo(GeneralInputText::$id);?>',//идентификатор диалога
		'N_start':dwLL1_N_current_<?php echo(GeneralDialogWindows::$id_dialog);?>,//с чего начинаем и по убыванию	(здесь не вычитаем, т.к. это число в чатах входит в старт)
		'limit':dwLL1_max_<?php echo(GeneralDialogWindows::$id_dialog);?>,//предел одной подгрузки
		'database':'<?php echo(GeneralDialogWindows::$database);?>',//база данных
		'condition1':'<?php echo(GeneralDialogWindows::$condition1);?>',//условия выборки
		'condition2':'<?php echo(GeneralDialogWindows::$condition2);?>',//условия выборки
		'condition3':'<?php echo(GeneralDialogWindows::$condition3);?>',//условия выборки
		'condition4':'<?php echo(GeneralDialogWindows::$condition4);?>',//условия выборки
		'condition5':'<?php echo(GeneralDialogWindows::$condition5);?>',//условия выборки
		'time_on_user_comp':Math.round(dwLL1_time_on_user_comp_<?php echo(GeneralDialogWindows::$id_dialog);?>.getTime()/1000)//время у пользователя на компьютере
	},
	function(responseText){
		if (responseText!="none"){
			$("#dwLL1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>").show(); //делаем видимым блок с будущим содержимым подгрузки
			$('#dwLL1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>').html(responseText+$('#dwLL1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>').html());
			$(document).ready(function(){
				dwLL1_height_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?> = $('#dw1_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?>').height();//новая высота
				dwLL1_scroll_real_<?php echo(GeneralDialogWindows::$id_dialog);?> = dwLL1_height_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?>-dwLL1_scroll_from_bottom_bodychat_<?php echo(GeneralDialogWindows::$id_dialog);?>;//узнаем прокрутку от низа окна
				$('#dw1_divchat_<?php echo(GeneralDialogWindows::$id_dialog);?>').scrollTop(dwLL1_scroll_real_<?php echo(GeneralDialogWindows::$id_dialog);?>);});
			dwLL1_num_text_<?php echo(GeneralDialogWindows::$id_dialog);?>=responseText;
			var dwLL1_findresult_<?php echo(GeneralDialogWindows::$id_dialog);?>=dwLL1_num_text_<?php echo(GeneralDialogWindows::$id_dialog);?>.match(/<\!--(\-?[0-9]{1,})-->$/);
			if (dwLL1_findresult_<?php echo(GeneralDialogWindows::$id_dialog);?>){
				dwLL1_N_current_<?php echo(GeneralDialogWindows::$id_dialog);?>=Number(dwLL1_findresult_<?php echo(GeneralDialogWindows::$id_dialog);?>[1]);}
			dwLL1_Flag_downloading_<?php echo(GeneralDialogWindows::$id_dialog);?>=false;}
		else{
			dwLL1_Flag_stop_<?php echo(GeneralDialogWindows::$id_dialog);?>=true;}
	});}
</script>
<div style="width:100%; text-align:left;" id="dwLL1_ajax_div_<?php echo(GeneralDialogWindows::$id_dialog);?>"></div>