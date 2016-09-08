var signaturing_page="";
var signaturing_id_photo=0;
var signaturing_period=10000;

var signaturing_list_message="";//������ ���������� ���������
var signaturing_list_friends="";//������ ���������� ������
var signaturing_curent_word="";//�����, ������� ������������ �� �������
//var dialog_windows_newcontentchatmain1;
//var dialog_windows_newmessChatMain1;
var signaturing_pattern_first="";//������ ������������ ,������ ��� �� ������ ��� ������ ������� �� ������������


var signaturing_array_first=new Array();//��������� � ������, ��� ������

var signaturing_array_sign = {//������� ������ ����������
'forum': 0,
'dialogs': 0,
'talking': 0,
'friends': 0
};


var signaturing_array_messages=new Array();//������ � �����������
var signaturing_array_friends=new Array();//������ � �������������� ��������

function general___signature(getvar1,getvar2,getvar3,getvar4,getnumpage){
	setInterval('general___signature_ajax(\''+getvar1+'\',\''+getvar2+'\',\''+getvar3+'\',\''+getvar4+'\',\''+getnumpage+'\')',signaturing_period);}







function general___signature_ajax(getvar1,getvar2,getvar3,getvar4,getnumpage)	{
	//text = text.replace(/\+/g,'%2B'); //����������� �����, ����� �������� �� ��� �����, � �� ��� �����������
	$.post(
	"http://mapstore.org/my_portfolio/tazteam.net/data/components/_general/signature/signature_return_text_ajax.php",
	{
		'getvar1':getvar1,
		'getvar2':getvar2,
		'getvar3':getvar3,
		'getvar4':getvar4,
		'getnumpage':getnumpage,
		'idphoto':signaturing_id_photo,
		'signaturing':signaturing_page
	},
	function(responseText){
		general___signature_ajax_analyze(responseText);
		//alert(responseText);
	});}



function general___signature_ajax_analyze(responseText)	{
//�������� ���
signaturing_array_sign = {//������� ������ ����������
'forum': 0,
'dialogs': 0,
'talking': 0,
'friends': 0
};
signaturing_pattern_first=/([^\|]{0,})\|([^\|]{0,})/gmi;
//����� responce �� 2 ����������
signaturing_array_first = signaturing_pattern_first.exec(responseText);
signaturing_list_message=signaturing_array_first[1];//���������
signaturing_list_friends=signaturing_array_first[2];//������
signaturing_list_message=$.trim(signaturing_list_message);//������� �� ����� �������
signaturing_list_friends=$.trim(signaturing_list_friends);//������� �� ����� �������
signaturing_array_messages = signaturing_list_message.split('  ');//����� ������ ��������� �� ����� ����� ������� ������
//alert(signaturing_list_message);
for (key in signaturing_array_messages) {//��� ������� �������� ������� ���� ������ 2 ������� � ����������� �� � �������������� ������ ������� ������� signaturing_array_sign
	signaturing_curent_word=signaturing_array_messages[key].charAt(0)+signaturing_array_messages[key].charAt(1);

//alert(signaturing_curent_word);

	if ((signaturing_curent_word=="sh")||(signaturing_curent_word=="mc")||(signaturing_curent_word=="ne")||(signaturing_curent_word=="ar")||(signaturing_curent_word=="am")||(signaturing_curent_word=="ga")||(signaturing_curent_word=="vi")||(signaturing_curent_word=="ft")||(signaturing_curent_word=="sf")||(signaturing_curent_word=="sw")){
		signaturing_array_sign['talking']++;}
	else if (signaturing_curent_word=="fm"){
		signaturing_array_sign['forum']++;}
	else if (signaturing_curent_word=="sm"){
		signaturing_array_sign['dialogs']++;}}

signaturing_array_friends = signaturing_list_friends.split('  ');//����� ������ ������ �� ����� ����� ������� ������
for (key in signaturing_array_friends) {//�������������� ������ ������� ������� signaturing_array_sign
	if (signaturing_array_friends[key]>0){
	//alert(signaturing_array_friends[key]);
		signaturing_array_sign['friends']++;}}

for (key in signaturing_array_sign) {
if(key){

	if (document.getElementById('signaturing_'+key)){
	if (signaturing_array_sign[key]>0){

		if (key=="forum"){
		document.getElementById('signaturing_'+key).innerHTML="<span style=\"color:#00cc66;\">("+signaturing_array_sign[key]+")</span>";
		}
	else{
		document.getElementById('signaturing_'+key).innerHTML="<span style=\"color:#cc6600;\">("+signaturing_array_sign[key]+")</span>";}

		if ((document.getElementById('users_friends_tohim'))&&(key=='friends')){
		document.getElementById('users_friends_tohim').innerHTML="<span style=\"color:#cc6600;\">("+signaturing_array_sign[key]+")</span>";

		}
		else if ((document.getElementById('users_dialogs_new'))&&(key=='dialogs')){
		document.getElementById('users_dialogs_new').innerHTML="<span style=\"color:#cc6600;\">("+signaturing_array_sign[key]+")</span>";
		}









		}}

//alert(key+" "+signaturing_array_sign[key]);
}}
//alert("===");
//	�����3  10000 1000000

//	������ ���������  10000000000 10000000000










//alert(responseText);

}

	/*

function general___dialog_windows_1_send_message_ajax(id_dialog,get_var1,get_var2,get_var3,num_page,text,database,autor,time,textvalue,idmessage,valuesnumber,value1,value2,value3,value4,value5,value6,value7,value8,value9,value10,condition1,condition2,condition3,condition4,condition5,signaturing,pagetype,getvar1,getvar2,getvar3,getvar4,getnumpage,idphoto)	{
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
		alert(responseText);
	});}*/