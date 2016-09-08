var dialog_windows_divchatmouseover=0;
var dialog_windows_newcontentchatmain1;
var dialog_windows_newmessChatMain1;
var dialog_windows_width_message=0;
//var widthcorrect=0;







function dialog_windows_detect_width_message(parent){//устанавливаем ширину сообщения, ставится заранее, чтобы не сбилась потом аяксом, т.к. он возвращает весь код с длинным текстом и только потом определяется ширина уже длинного блока
	
    
    width=$('#'+parent).width()-92;
    if (width<0){ width=100+'%'; }//для осла
    
    dialog_windows_width_message=width;}//поправка на ширины фотки отступов и т.д.


function dialog_windows_set_width_message(child){//копируем ширину
	$('#'+child).width(dialog_windows_width_message);
													//alert(dialog_windows_width_message);
	}


function general___dialog_windows_1_send_message_ajax(id_dialog,text,database,autor,time,textvalue,idmessage,valuesnumber,value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,condition1,condition2,condition3,condition4,condition5,signaturing,pagetype,getvar1,getvar2,getvar3,getvar4,getnumpage,idphoto)	{
	text = text.replace(/\+/g,'%2B'); //преобразуем плюсы, чтобы передать их как плюсы, а не как спецсимволы
	$.post(
	"http://instorage.org/portfolio/tazteam/data/components/_general/dialog_windows/dialog_windows_1_send_message_ajax.php", 
	{
		'text':text,
		'database':database,
		'autor':autor,//какую value делаем автором
		'time':time,//какую value делаем временем создания сообщения
		'textvalue':textvalue,//где будет текст
		'idmessage':idmessage,//где будет номер сообщения
		'valuesnumber':valuesnumber,//сколько value делаем	
		'value1':value1,//значение для вставки
		'value2':value2,//значение для вставки
		'value3':value3,//значение для вставки
		'value4':value4,//значение для вставки
		'value5':value5,//значение для вставки
		'value6':value6,//значение для вставки
		'value7':value7,//значение для вставки
		'value8':value8,//значение для вставки
		'value9':value9,//значение для вставки
		'value10':value10,//значение для вставки
		'condition1':condition1,	
		'condition2':condition2,		
		'condition3':condition3,		
		'condition4':condition4,		
		'condition5':condition5,
		'signaturing':signaturing,
		'pagetype':pagetype,
		'getvar1':getvar1,
		'getvar2':getvar2,
		'getvar3':getvar3,
		'getvar4':getvar4,
		'getnumpage':getnumpage,
		'idphoto':idphoto
	}, 
	function(responseText){
		setTimeout("dwLN1_"+id_dialog+"()",10);
		//alert(responseText);
	});}