var dialog_windows_divchatmouseover=0;
var dialog_windows_newcontentchatmain1;
var dialog_windows_newmessChatMain1;
var dialog_windows_width_message=0;
//var widthcorrect=0;







function dialog_windows_detect_width_message(parent){//������������� ������ ���������, �������� �������, ����� �� ������� ����� ������, �.�. �� ���������� ���� ��� � ������� ������� � ������ ����� ������������ ������ ��� �������� �����


    width=$('#'+parent).width()-92;
    if (width<0){ width=100+'%'; }//��� ����

    dialog_windows_width_message=width;}//�������� �� ������ ����� �������� � �.�.


function dialog_windows_set_width_message(child){//�������� ������
	$('#'+child).width(dialog_windows_width_message);
													//alert(dialog_windows_width_message);
	}


function general___dialog_windows_1_send_message_ajax(id_dialog,text,database,autor,time,textvalue,idmessage,valuesnumber,value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,condition1,condition2,condition3,condition4,condition5,signaturing,pagetype,getvar1,getvar2,getvar3,getvar4,getnumpage,idphoto)	{
	text = text.replace(/\+/g,'%2B'); //����������� �����, ����� �������� �� ��� �����, � �� ��� �����������
	$.post(
	"http://mapstore.org/my_portfolio/tazteam.net/data/components/_general/dialog_windows/dialog_windows_1_send_message_ajax.php",
	{
		'text':text,
		'database':database,
		'autor':autor,//����� value ������ �������
		'time':time,//����� value ������ �������� �������� ���������
		'textvalue':textvalue,//��� ����� �����
		'idmessage':idmessage,//��� ����� ����� ���������
		'valuesnumber':valuesnumber,//������� value ������
		'value1':value1,//�������� ��� �������
		'value2':value2,//�������� ��� �������
		'value3':value3,//�������� ��� �������
		'value4':value4,//�������� ��� �������
		'value5':value5,//�������� ��� �������
		'value6':value6,//�������� ��� �������
		'value7':value7,//�������� ��� �������
		'value8':value8,//�������� ��� �������
		'value9':value9,//�������� ��� �������
		'value10':value10,//�������� ��� �������
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