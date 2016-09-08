$(document).ready(function(){ 
$("#general___inputtext_smiles_div_swim").hide();   
$("#general___inputtext_ifaces_div_swim").hide();	
$("#general___inputtext_redactor_div_swim").hide();	
});

var general___inputtext_swim_on_time=400;
var general___inputtext_swim_off_time=700;
var general___inputtext_max_lenght_word=25;

var general___inputtext_time_ifaces_window;
var general___inputtext_time_smiles_window;
var general___inputtext_time_redactor_window;
var general___inputtext_time_tables_window;





var arraycitateNumberId = new Array();//массив информации какой номер сообщений соответствует какому id на текущей странице





var arraytags = 
[ 
	"strong",
	"b",
	"i",
	"s",
	"u",
	"sub",
	"sup",
	"justify",
	"left",
	"right",
	"center",
	"list=ol",
	"list=ul",
	"\*",
	"size=1",
	"size=2",
	"size=3",
	"size=4",
	"size=5",
	"color=gray",
	"color=green",
	"color=purple",
	"color=olive",
	"color=aqua",
	"color=light_blue",
	"color=yellow",
	"color=blue",
	"color=orange",
	"color=red",
	"quote",
	"ask"
];
var arrayalltags = arraytags.slice(); 


function preg_quote(str) {
    return str.replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1");
}






function general___inputtext_block_swims()
{
	$("#general___inputtext_smiles_div_swim").hide("fast");	
	$("#general___inputtext_ifaces_div_swim").hide("fast");
	$("#general___inputtext_redactor_div_swim").hide("fast");
	if (document.getElementById('general___inputtext_tables_div_swim')){$("#general___inputtext_tables_div_swim").hide();}}

function general___inputtext(what,action)
{
	if (action=='on'){
		if (what=="smiles") {
			clearTimeout(general___inputtext_time_smiles_window);
			general___inputtext_time_smiles_window=setTimeout(
			function ()
			{
				$("#general___inputtext_smiles_div_swim").show("fast");
				$("#general___inputtext_ifaces_div_swim").hide();
				$("#general___inputtext_redactor_div_swim").hide();
				if (document.getElementById('general___inputtext_tables_div_swim')){$("#general___inputtext_tables_div_swim").hide();}
			},
			general___inputtext_swim_on_time);
		}
		else if (what=="ifaces") {
			clearTimeout(general___inputtext_time_ifaces_window);
			general___inputtext_time_ifaces_window=setTimeout(
			function ()
			{
				$("#general___inputtext_ifaces_div_swim").show("fast");
				$("#general___inputtext_smiles_div_swim").hide();
				$("#general___inputtext_redactor_div_swim").hide();
				if (document.getElementById('general___inputtext_tables_div_swim')){$("#general___inputtext_tables_div_swim").hide();}
			}, 
			general___inputtext_swim_on_time);
		}
		else if (what=="redactor") {
			clearTimeout(general___inputtext_time_redactor_window);
			general___inputtext_time_redactor_window=setTimeout(
			function ()
			{
				$("#general___inputtext_redactor_div_swim").show("fast");
				$("#general___inputtext_smiles_div_swim").hide();
				$("#general___inputtext_ifaces_div_swim").hide();
				if (document.getElementById('general___inputtext_tables_div_swim')){$("#general___inputtext_tables_div_swim").hide();}
			}, 
			general___inputtext_swim_on_time);
		}
		else if (what=="table") {
			clearTimeout(general___inputtext_time_tables_window);
			general___inputtext_time_tables_window=setTimeout(
			function ()
			{
				$("#general___inputtext_tables_div_swim").show("fast");
				$("#general___inputtext_smiles_div_swim").hide();
				$("#general___inputtext_ifaces_div_swim").hide();
				$("#general___inputtext_redactor_div_swim").hide();
			}, 
			general___inputtext_swim_on_time);
		}
	}
	else {
		if (what=="smiles") {	
			clearTimeout(general___inputtext_time_smiles_window);
			general___inputtext_time_smiles_window=setTimeout(function (){$("#general___inputtext_smiles_div_swim").hide("fast");}, general___inputtext_swim_off_time);
		}
		else if (what=="ifaces") {
			clearTimeout(general___inputtext_time_ifaces_window);
			general___inputtext_time_ifaces_window=setTimeout(function (){$("#general___inputtext_ifaces_div_swim").hide("fast");}, general___inputtext_swim_off_time);
		}
		else if (what=="redactor") {
			clearTimeout(general___inputtext_time_redactor_window);
			general___inputtext_time_redactor_window=setTimeout(function (){$("#general___inputtext_redactor_div_swim").hide("fast");}, general___inputtext_swim_off_time);
		}
		else if (what=="table") {
			clearTimeout(general___inputtext_time_tables_window);
			general___inputtext_time_tables_window=setTimeout(function (){$("#general___inputtext_tables_div_swim").hide("fast");}, general___inputtext_swim_off_time);	
		}}}
		
function savesel(doc){
    if(document.selection){
        doc.sel = document.selection.createRange().duplicate();}}
		

function general___inputtextfocus(where){
    if(document.getElementById(where)){
        document.getElementById(where).focus();}}		
		
		
function general___inputtextincludetag(where,Tag,how){
	if ((how=="smile")||(how=="citate")){
		if (how=="smile"){
			var sm =':' + Tag + ':';}
		else{
			var sm =Tag;}		
		var doc = document.getElementById(where);
		doc.focus();
		if(window.attachEvent && navigator.userAgent.indexOf('Opera') === -1) {
			var s = doc.sel;
			if(s){
				var l = s.text.length;
				s.text = sm + s.text;
				s.moveStart("character", -l);                                           
				s.select();}}
		else{                                              
			 var ss = doc.scrollTop;
			 sel1 = doc.value.substr(0, doc.selectionStart);
			 sel = doc.value.substr(doc.selectionStart, doc.selectionEnd - doc.selectionStart);
			 sel2 = doc.value.substr(doc.selectionEnd);
			 doc.value = sel1 + sm + sel + sel2;
			 doc.selectionStart = sel1.length + sm.length;
			 doc.selectionEnd = doc.selectionStart + sel.length;
			 doc.scrollTop = ss;}}	
	else {
		var Open = '[' + Tag + ']';      
		var Close = '[/' + Tag + ']';		
		var doc = document.getElementById(where);
		doc.focus();		
		if(Tag == 'link')		{var Open = '[' + Tag + '=АДРЕС]';}
		if(Tag == 'url')		{var Open = '[' + Tag + '=АДРЕС]';}		
		
		
		
		if(Tag == 'video')		{var Open = '[' + Tag + ']вставьте сюда HTML-код видео';}
		if(window.attachEvent && navigator.userAgent.indexOf('Opera') === -1) {
			var s = doc.sel;
			if(s){
				var l = s.text.length;
				s.text = Open + s.text + Close;
				s.moveEnd("character", -Close.length);
				s.moveStart("character", -l);
				s.select(); }}
		else{
			 var ss = doc.scrollTop;
			 sel1 = doc.value.substr(0, doc.selectionStart);
			 sel2 = doc.value.substr(doc.selectionEnd);
			 sel = doc.value.substr(doc.selectionStart, doc.selectionEnd - doc.selectionStart);
			 doc.value = sel1 + Open + sel + Close + sel2;
			 doc.selectionStart = sel1.length + Open.length;
			 doc.selectionEnd = doc.selectionStart + sel.length;
			 doc.scrollTop = ss;}}}


			 
			 
			 
			 
			 
			 
			 
			 
function general___inputtext_ask(where,name){
    var Open = '[ask]';      
    var Close = '[/ask]';
    var doc = document.getElementById(where);
    doc.focus();    
    if(window.attachEvent && navigator.userAgent.indexOf('Opera') === -1) {
        var s = doc.sel;
        if(s){
            var l = s.text.length;
            s.text = Open + name + Close + ', ';}}
    else {
         var ss = doc.scrollTop;
         sel1 = doc.value.substr(0, doc.selectionStart);
         sel2 = doc.value.substr(doc.selectionEnd);
         doc.value = sel1 + Open + name + Close + ', ' + sel2;
         doc.scrollTop = ss;}}
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 

function general___inputtextconverthtml(text){
	//text = text.replace(/&/gm,'&amp;');
	//text = text.replace(/</gm,'&lt;');//есть в php security - в real_escape	
	//text = text.replace(/>/gm,'&gt;');
	return text;}


function general___inputtext_basic(text,revision_max_lenght_word){
	text=$.trim(text);
	text=text.replace(/[ ]*(\n+)[ ]*/gmi,"$1");//убираем пробелы перед и после переноса строк
		//pattern1 = new RegExp('\(\[\^\\s\]{'+general___inputtext_max_lenght_word+'}\)\[\^\\s\]{1,}', 'igm');
		//text=text.replace(pattern1,"$1... ");//исправление текста, если он имеет многобуквенные слова	
	text = general___inputtextconverthtml(text);
	return text;}

	
	
	
	
function preg_quote (str, delimiter) {
  // *     example 1: preg_quote("$40");
  // *     returns 1: '\$40'
  // *     example 2: preg_quote("*RRRING* Hello?");
  // *     returns 2: '\*RRRING\* Hello\?'
  // *     example 3: preg_quote("\\.+*?[^]$(){}=!<>|:");
  // *     returns 3: '\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:'
  return (str + '').replace(new RegExp('[.\\\\+*?\\[\\^\\]$(){}=!<>|:\\' + (delimiter || '') + '-]', 'g'), '\\$&');
}
	
	
	
function preg_quote_slash_plus (str) {
	str=str.replace(/\\/gmi,'\\');
  return str;}
	
	
	
	
	
	
function general___inputtextconverttags_href(text){
/*
для проверки
1 [link=АДРЕС][/link]
2 [link=][/link]
3 [link=АДРЕС]ывавыа[/link]
4 [link=ывавыавыа][/link]
5 [link= АДРЕС ]орп[/link]
6 [link=АДРЕС]  [/link]
7 [link=  АДРЕС   ]  [/link]
8 [link=АДР
ЕС][/link]
9 [link=пар
пар][/link]
10 [link=АДРЕС]вапвап срспа[/link]
11 [link=АДРЕС]апрпар
[/link]
12 [link=АДРЕС]парпарпар
аарпоаорп[/link]
*/
	arrayalltags.push('link');
	//[0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+       -  шаблон для ссылки
	//добавили проход через функцию
	text=text.replace(/\[link=([.\s\S]+?)\/link\]/gmi,function(args){//выбираем нужные участки и обрабатываем их своей функцией
		link=args.toString();
		link = link.replace(/\[link=([^\]]*)\][\n\s\t]*/gmi,'[link=$1]');//убираем пробелы, табуляцию и перенос строк перед ссылкой
		link = link.replace(/[\n\s\t]*\[\/link\]/gmi,'[/link]');//убираем пробелы, табуляцию и перенос строк после ссылки
		link = link.replace(/\[link=[\s]*АДРЕС[\s]*\][\s]*\[\/link\]/gmi,'');//если не введены данные
		link = link.replace(/\[link=[\s]*\//gmi,'[link=');//убираем лишние символы на месте ссылки

		
		link = link.replace(/\[link=[\s]*https:\/\//gmi,'[link=');//убираем лишние символы на месте ссылки			
		link = link.replace(/\[link=[\s]*http:\/\//gmi,'[link=');//убираем лишние символы на месте ссылки			
		
		
		link = link.replace(/\[link=[\s]*([^\]\n\t]{1,})\][\s]*http\:\/\/([^\[]{1,})[\s]*\[\/link\]/gmi,'[link=$1]$2[/link]');//убираем лишние символы на месте названия
		
		
		
		
		link = link.replace(/\[link=[\s]*\][\s]*\[\/link\]/gm,'');//если не введены данные			
		link = link.replace(/\[link=[\s]*\][\s]*\[\/link\]/gm,'');//если не введены данные
		//если дебил не ввел адрес, то вставляем название на место адреса	
		link=link.replace(/\[link=[\s]*АДРЕС[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/link\]/gmi,function(args){
			args=args.toString();
			args = args.replace(/\[link=[\s]*АДРЕС[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/link\]/gmi,"<a href='http://$1'  target='_blank' class='refmessage'>$1</a>");
			return args;});
		link=link.replace(/\[link=[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/link\]/gmi,function(args){
			args=args.toString();
			args = args.replace(/\[link=[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/link\]/gmi,"<a href='http://$1' target='_blank' class='refmessage'>$1</a>");
			return args;});
		//если дебил не ввел название, то вставляем адрес на место названия
		link=link.replace(/\[link=[\s]*([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)[\s]*\][\s]*\[\/link\]/gmi,function(args){
			args=args.toString();
			args = args.replace(/\[link=[\s]*([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)[\s]*\][\s]*\[\/link\]/gmi,"<a href='http://$1'  target='_blank' class='refmessage'>$1</a>");
			return args;});
		//дорабатываем остальные ссылки от нормального
		
		
		link = link.replace(/\[link=[\s]*([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)[\s]*\][\s]*([^\[]{1,})[\s]*\[\/link\]/gmi,"<a href='http://$1' target='_blank' class='refmessage'>$2</a>");
		return link;});
	return text;}	

	
	
	
	

function general___inputtextconverttags_href_backup(text){
/*
для проверки
1 [link=АДРЕС][/link]
2 [link=][/link]
3 [link=АДРЕС]ывавыа[/link]
4 [link=ывавыавыа][/link]
5 [link= АДРЕС ]орп[/link]
6 [link=АДРЕС]  [/link]
7 [link=  АДРЕС   ]  [/link]
8 [link=АДР
ЕС][/link]
9 [link=пар
пар][/link]
10 [link=АДРЕС]вапвап срспа[/link]
11 [link=АДРЕС]апрпар
[/link]
12 [link=АДРЕС]парпарпар
аарпоаорп[/link]
*/
	arrayalltags.push('link');
	//[0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+       -  шаблон для ссылки
	//добавили проход через функцию
	text=text.replace(/\[link=([.\s\S]+?)\/link\]/gmi,function(args){//выбираем нужные участки и обрабатываем их своей функцией
		link=args.toString();
		link = link.replace(/\[link=([^\]]*)\][\n\s\t]*/gmi,'[link=$1]');//убираем пробелы, табуляцию и перенос строк перед ссылкой
		link = link.replace(/[\n\s\t]*\[\/link\]/gmi,'[/link]');//убираем пробелы, табуляцию и перенос строк после ссылки
		link = link.replace(/\[link=[\s]*АДРЕС[\s]*\][\s]*\[\/link\]/gmi,'');//если не введены данные
		link = link.replace(/\[link=[\s]*\//gmi,'[link=');//убираем лишние символы на месте ссылки

		
		link = link.replace(/\[link=[\s]*https:\/\//gmi,'[link=');//убираем лишние символы на месте ссылки			
		link = link.replace(/\[link=[\s]*http:\/\//gmi,'[link=');//убираем лишние символы на месте ссылки			
		
		
		link = link.replace(/\[link=[\s]*([^\]\n\t]{1,})\][\s]*http\:\/\/([^\[]{1,})[\s]*\[\/link\]/gmi,'[link=$1]$2[/link]');//убираем лишние символы на месте названия
		
		link = link.replace(/\[link=[\s]*\][\s]*\[\/link\]/gm,'');//если не введены данные			
		link = link.replace(/\[link=[\s]*\][\s]*\[\/link\]/gm,'');//если не введены данные
		//если дебил не ввел адрес, то вставляем название на место адреса	
		link=link.replace(/\[link=[\s]*АДРЕС[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/link\]/gmi,function(args){
			args=args.toString();
			args = args.replace(/\[link=[\s]*АДРЕС[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/link\]/gmi,"<a href='http://$1' rel='nofollow' target='_blank' class='refmessage'>$1</a>");
			return args;});
		link=link.replace(/\[link=[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/link\]/gmi,function(args){
			args=args.toString();
			args = args.replace(/\[link=[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/link\]/gmi,"<a href='http://$1' rel='nofollow' target='_blank' class='refmessage'>$1</a>");
			return args;});
		//если дебил не ввел название, то вставляем адрес на место названия
		link=link.replace(/\[link=[\s]*([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)[\s]*\][\s]*\[\/link\]/gmi,function(args){
			args=args.toString();
			args = args.replace(/\[link=[\s]*([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)[\s]*\][\s]*\[\/link\]/gmi,"<a href='http://$1' rel='nofollow' target='_blank' class='refmessage'>$1</a>");
			return args;});
		//дорабатываем остальные ссылки от нормального
		link = link.replace(/\[link=[\s]*([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)[\s]*\][\s]*([^\[]{1,})[\s]*\[\/link\]/gmi,"<a href='http://$1' rel='nofollow' target='_blank' class='refmessage'>$2</a>");
		return link;});
	return text;}	
	
	
	
	
	
function general___inputtextconverttags_t_href(text){
/*
для проверки
1 [link=АДРЕС][/link]
2 [link=][/link]
3 [link=АДРЕС]ывавыа[/link]
4 [link=ывавыавыа][/link]
5 [link= АДРЕС ]орп[/link]
6 [link=АДРЕС]  [/link]
7 [link=  АДРЕС   ]  [/link]
8 [link=АДР
ЕС][/link]
9 [link=пар
пар][/link]
10 [link=АДРЕС]вапвап срспа[/link]
11 [link=АДРЕС]апрпар
[/link]
12 [link=АДРЕС]парпарпар
аарпоаорп[/link]
*/
	arrayalltags.push('url');
	//[0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+       -  шаблон для ссылки
	//добавили проход через функцию
	text=text.replace(/\[url=([.\s\S]+?)\/url\]/gmi,function(args){//выбираем нужные участки и обрабатываем их своей функцией
		link=args.toString();
		link = link.replace(/\[url=([^\]]*)\][\n\s\t]*/gmi,'[url=$1]');//убираем пробелы, табуляцию и перенос строк перед ссылкой
		link = link.replace(/[\n\s\t]*\[\/url\]/gmi,'[/url]');//убираем пробелы, табуляцию и перенос строк после ссылки
		link = link.replace(/\[url=[\s]*АДРЕС[\s]*\][\s]*\[\/url\]/gmi,'');//если не введены данные
		link = link.replace(/\[url=[\s]*\//gmi,'[url=');//убираем лишние символы на месте ссылки

		
		link = link.replace(/\[url=[\s]*https:\/\//gmi,'[url=');//убираем лишние символы на месте ссылки			
		link = link.replace(/\[url=[\s]*http:\/\//gmi,'[url=');//убираем лишние символы на месте ссылки			
		
		
		link = link.replace(/\[url=[\s]*([^\]\n\t]{1,})\][\s]*http\:\/\/([^\[]{1,})[\s]*\[\/url\]/gmi,'[url=$1]$2[/url]');//убираем лишние символы на месте названия
		
		
		
		
		link = link.replace(/\[url=[\s]*\][\s]*\[\/url\]/gm,'');//если не введены данные			
		link = link.replace(/\[url=[\s]*\][\s]*\[\/url\]/gm,'');//если не введены данные
		//если дебил не ввел адрес, то вставляем название на место адреса	
		link=link.replace(/\[url=[\s]*АДРЕС[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/url\]/gmi,function(args){
			args=args.toString();
			args = args.replace(/\[url=[\s]*АДРЕС[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/url\]/gmi,"<a href='http://$1'  target='_blank' class='refmessage'>$1</a>");
			return args;});
		link=link.replace(/\[url=[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/url\]/gmi,function(args){
			args=args.toString();
			args = args.replace(/\[url=[\s]*\]([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)\[\/url\]/gmi,"<a href='http://$1' target='_blank' class='refmessage'>$1</a>");
			return args;});
		//если дебил не ввел название, то вставляем адрес на место названия
		link=link.replace(/\[url=[\s]*([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)[\s]*\][\s]*\[\/url\]/gmi,function(args){
			args=args.toString();
			args = args.replace(/\[url=[\s]*([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)[\s]*\][\s]*\[\/url\]/gmi,"<a href='http://$1'  target='_blank' class='refmessage'>$1</a>");
			return args;});
		//дорабатываем остальные ссылки от нормального
		
		
		link = link.replace(/\[url=[\s]*([0-9a-zа-я\.\/\_\@\:\-\$\%\&\?\*\(\)\+\=\#№\!\<\>\|]+)[\s]*\][\s]*([^\[]{1,})[\s]*\[\/url\]/gmi,"<a href='http://$1' target='_blank' class='refmessage'>$2</a>");
		return link;});
	return text;}		
	
	
	
	
	
	
	
	
	
	
	
	
	
function general___inputtextconverttags_formatter(text)
{
	var pattern1_1;
	var pattern1_2;

	var pattern2_1;
	var pattern2_2;
		
	var count1;
	var count2;
	var tag;
	for (var key in arraytags) 
	{		
		tag=arraytags[key];
		
		pattern1_1="["+tag+"]";
		pattern1_2="[/"+tag+"]";

		pattern2_1 = new RegExp('\\['+tag+'\\]', 'igm');
		pattern2_2 = new RegExp('\\[\\/'+tag+'\\]', 'igm');
		
		var count1=(text.split(pattern1_1).length - 1);
		var count2=(text.split(pattern1_2).length - 1);
		
		if ((count1+count2)>0)//если тэг есть
		{
			if (count1!=count2)//если закр и откр не совпадают (повреждены)
			{
				if ((tag=="\*")||(tag=="list=ol")||(tag=="list=ul"))//если поврежден список, то удаляем все элементы списка
				{
					text = text.replace(/\[\*\]/gm,'');			
					text = text.replace(/\[\/\*\]/gm,'');				
				
					text = text.replace(/\[list=ol\]/gm,'');
					text = text.replace(/\[\/list=ol\]/gm,'');

					text = text.replace(/\[list=ul\]/gm,'');
					text = text.replace(/\[\/list=ul\]/gm,'');

					text = text.replace(/<ol>/gm,'');
					text = text.replace(/<\/ol>/gm,'');
					
					text = text.replace(/<ul>/gm,'');
					text = text.replace(/<\/ul>/gm,'');

					text = text.replace(/<li>/gm,'');
					text = text.replace(/<\/li>/gm,'');
				}
				else //очистка поврежденных тегов!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! тут
				{
					text = text.replace(pattern2_1,'');
					text = text.replace(pattern2_2,'');			
				}
			}
			else //если $count1==$count2
			{
				if (tag=="strong")
				{
					text = text.replace(/\[strong\]/gm,'<strong>');
					text = text.replace(/\[\/strong\]/gm,'</strong>');
				}
				else if (tag=="b")
				{
					text = text.replace(/\[b\]/gm,'<b>');
					text = text.replace(/\[\/b\]/gm,'</b>');	
				}
				else if (tag=="i")
				{
					text = text.replace(/\[i\]/gm,'<i>');
					text = text.replace(/\[\/i\]/gm,'</i>');	
				}
				else if (tag=="s")
				{		
					text = text.replace(/\[s\]/gm,'<s>');
					text = text.replace(/\[\/s\]/gm,'</s>');
				}
				else if (tag=="u")
				{		
					text = text.replace(/\[u\]/gm,'<u>');
					text = text.replace(/\[\/u\]/gm,'</u>');	
				}
				else if (tag=="sub")
				{		
					text = text.replace(/\[sub\]/gm,'<sub>');
					text = text.replace(/\[\/sub\]/gm,'</sub>');
				}
				else if (tag=="sup")
				{		
					text = text.replace(/\[sup\]/gm,'<sup>');
					text = text.replace(/\[\/sup\]/gm,'</sup>');	
				}
				else if (tag=="justify")
				{
					text = text.replace(/\[justify\]/gm,"<div align='justify'>");
					text = text.replace(/\[\/justify\]/gm,'</div>');
				}
				else if (tag=="left")
				{
					text = text.replace(/\[left\]/gm,"<div align='left'>");
					text = text.replace(/\[\/left\]/gm,'</div>');		
				}
				else if (tag=="right")
				{		
					text = text.replace(/\[right\]/gm,"<div align='right'>");
					text = text.replace(/\[\/right\]/gm,'</div>');
				}
				else if (tag=="center")
				{
					text = text.replace(/\[center\]/gm,"<div align='center'>");
					text = text.replace(/\[\/center\]/gm,'</div>');
				}
				else if (tag=="list=ol")
				{
					text = text.replace(/\[list=ol\]/gm,'<ol>');
					text = text.replace(/\[\/list=ol\]/gm,'</ol>');
				}
				else if (tag=="list=ul")
				{		
					text = text.replace(/\[list=ul\]/gm,'<ul>');
					text = text.replace(/\[\/list=ul\]/gm,'</ul>');		
				}
				else if (tag=="\*")
				{
					text = text.replace(/\[\*\]/gm,'<li>');
					text = text.replace(/\[\/\*\]/gm,'</li>');
				}
				else if (tag=="quote")
				{
					text = text.replace(/\[quote\]/gm,"<div><b style='padding-left:11px;'>Цитата:</b></div><div class='quote'>");
					text = text.replace(/\[\/quote\]/gm,'</div>');
				}
				else if (tag=="size=1")
				{
					text = text.replace(/\[size=1\]/gm,"<span style='font-size:11px'>");
					text = text.replace(/\[\/size=1\]/gm,"</span>");			
				}
				else if (tag=="size=2")
				{
					text = text.replace(/\[size=2\]/gm,"<span style='font-size:13px'>");
					text = text.replace(/\[\/size=2\]/gm,"</span>");
				}
				else if (tag=="size=3")
				{
					text = text.replace(/\[size=3\]/gm,"<span style='font-size:15px'>");
					text = text.replace(/\[\/size=3\]/gm,"</span>");	
				}
				else if (tag=="size=4")
				{
					text = text.replace(/\[size=4\]/gm,"<span style='font-size:19px'>");
					text = text.replace(/\[\/size=4\]/gm,"</span>");	
				}
				else if (tag=="size=5")
				{
					text = text.replace(/\[size=5\]/gm,"<span style='font-size:23px'>");
					text = text.replace(/\[\/size=5\]/gm,"</span>");	
				}
				else if (tag=="color=gray")
				{
					text = text.replace(/\[color=gray\]/gm,"<span style='color:#474747'>");
					text = text.replace(/\[\/color=gray\]/gm,"</span>");
				}
				else if (tag=="color=green")
				{
					text = text.replace(/\[color=green\]/gm,"<span style='color:#1d7c31'>");
					text = text.replace(/\[\/color=green\]/gm,"</span>");	
				}
				else if (tag=="color=purple")
				{
					text = text.replace(/\[color=purple\]/gm,"<span style='color:#6b1d7c'>");
					text = text.replace(/\[\/color=purple\]/gm,"</span>");		
				}
				else if (tag=="color=olive")
				{
					text = text.replace(/\[color=olive\]/gm,"<span style='color:#6c9141'>");
					text = text.replace(/\[\/color=olive\]/gm,"</span>");	
				}
				else if (tag=="color=aqua")
				{
					text = text.replace(/\[color=aqua\]/gm,"<span style='color:#138e93'>");
					text = text.replace(/\[\/color=aqua\]/gm,"</span>");	
				}
				else if (tag=="color=light_blue")
				{
					text = text.replace(/\[color=light_blue\]/gm,"<span style='color:#649bd6'>");
					text = text.replace(/\[\/color=light_blue\]/gm,"</span>");		
				}
				else if (tag=="color=yellow")
				{
					text = text.replace(/\[color=yellow\]/gm,"<span style='color:#d3cc00'>");
					text = text.replace(/\[\/color=yellow\]/gm,"</span>");		
				}
				else if (tag=="color=blue")
				{
					text = text.replace(/\[color=blue\]/gm,"<span style='color:#103ab3'>");
					text = text.replace(/\[\/color=blue\]/gm,"</span>");
				}
				else if (tag=="color=orange")
				{
					text = text.replace(/\[color=orange\]/gm,"<span style='color:#c26400'>");
					text = text.replace(/\[\/color=orange\]/gm,"</span>");
				}
				else if (tag=="color=red")
				{
					text = text.replace(/\[color=red\]/gm,"<span style='color:#b71919'>");
					text = text.replace(/\[\/color=red\]/gm,"</span>");
				}
				
				
				else if (tag=="ask")
				{
					text = text.replace(/\[ask\]/gm,"<span class=\"ask_in_chat\">");
					text = text.replace(/\[\/ask\]/gm,"</span>");
				}				
				
				
				
				
				
				
				
				
				
				
				
			}
		}
	}
	return text;}

function general___inputtextconverttags_tables(text){	
	arrayalltags.push('table');
	arrayalltags.push('tr');
	arrayalltags.push('trblue');
	arrayalltags.push('trred');
	arrayalltags.push('td200');
	arrayalltags.push('td100');
	arrayalltags.push('td50');
	arrayalltags.push('td340');
	arrayalltags.push('td400');
	arrayalltags.push('td-2');
	arrayalltags.push('td-3');
	arrayalltags.push('td-7');
	arrayalltags.push('td-6');
	arrayalltags.push('td-5');
	arrayalltags.push('td-4');

	//убираем возможные переносы строк в теле таблицы
	text=text.replace(/\[\/\|table\|\]/gm,"[/|table|][fortablecur]");	
	text=text.replace(/\|\][\s]{0,}(\n){0,}[\s]{0,}\[\|/gm,"|][|");		
	text=text.replace(/\|\][\s]{0,}(\n){0,}[\s]{0,}\[\/\|/gm,"|][/|");	
	text=text.replace(/\[\/\|table\|\]\[ fortablecur\]/gm,"[/|table|]");	
	text=text.replace(/\[\|td([0-9]{0,})\|\][\s]{0,}(\n){0,}[\s]{0,}/gm,"[|td$1|]");
	text=text.replace(/[\s]{0,}(\n){0,}[\s]{0,}\[\/\|td/gm,"[/|td");
	text=text.replace(/\|\][\s]{0,}(\n){0,}[\s]{0,}\[\/\|/gm,"|][/|");
	text=text.replace(/\[\|table\|\]/gm,"<table cellpadding='0' cellspacing='0' class='table_builder'>");
	text=text.replace(/\[\/\|table\|\]/gm,"</table>");
	text=text.replace(/\[\|tr\|\]/gm,"<tr class='table_tr_builder'>");
	text=text.replace(/\[\/\|tr\|\]/gm,"</tr>");
	text=text.replace(/\[\|trblue\|\]/gm,"<tr class='table_trblue_builder'>");
	text=text.replace(/\[\/\|trblue\|\]/gm,"</tr>");
	text=text.replace(/\[\|trred\|\]/gm,"<tr class='table_trred_builder'>");
	text=text.replace(/\[\/\|trred\|\]/gm,"</tr>");
	text=text.replace(/\[\|td\|\]/gm,"<td class='table_td_builder'>");
	text=text.replace(/\[\/\|td\|\]/gm,"</td>");
	text=text.replace(/\[\|td50\|\]/gm,"<td class='table_td_builder50'>");
	text=text.replace(/\[\/\|td50\|\]/gm,"</td>");
	text=text.replace(/\[\|td100\|\]/gm,"<td class='table_td_builder100'>");
	text=text.replace(/\[\/\|td100\|\]/gm,"</td>");
	text=text.replace(/\[\|td200\|\]/gm,"<td class='table_td_builder200'>");
	text=text.replace(/\[\/\|td200\|\]/gm,"</td>");
	text=text.replace(/\[\|td340\|\]/gm,"<td class='table_td_builder340'>");
	text=text.replace(/\[\/\|td340\|\]/gm,"</td>");
	text=text.replace(/\[\|td400\|\]/gm,"<td class='table_td_builder400'>");
	text=text.replace(/\[\/\|td400\|\]/gm,"</td>");
	text=text.replace(/\[\|td-2\|\]/gm,"<td colspan='2' class='table_td_builder_colspan'>");
	text=text.replace(/\[\/\|td-2\|\]/gm,"</td>");
	text=text.replace(/\[\|td-3\|\]/gm,"<td colspan='3' class='table_td_builder_colspan'>");
	text=text.replace(/\[\/\|td-3\|\]/gm,"</td>");
	text=text.replace(/\[\|td-4\|\]/gm,"<td colspan='4' class='table_td_builder_colspan'>");
	text=text.replace(/\[\/\|td-4\|\]/gm,"</td>");
	text=text.replace(/\[\|td-5\|\]/gm,"<td colspan='5' class='table_td_builder_colspan'>");
	text=text.replace(/\[\/\|td-5\|\]/gm,"</td>");
	text=text.replace(/\[\|td-6\|\]/gm,"<td colspan='6' class='table_td_builder_colspan'>");
	text=text.replace(/\[\/\|td-6\|\]/gm,"</td>");
	text=text.replace(/\[\|td-7\|\]/gm,"<td colspan='7' class='table_td_builder_colspan'>");
	text=text.replace(/\[\/\|td-7\|\]/gm,"</td>");
	return text;}

	
	
	
function general___inputtextconverttags_video(text){
	arrayalltags.push('video');
	

	
	//http://vk.com/video_ext.php?oid=20823351&id=167388290&hash=90b798d1cd8789d7&hd=1 
	
	//alert(text);
	text=text.replace(/\[video\]([.\s\S]+?)\[\/video\]/gmi,function(args){//выбираем нужные участки и обрабатываем их своей функцией
		video=args.toString();
		video = video.replace(/<iframe/gmi,'');
		video = video.replace(/type=\"text\/html\"/gmi,'');		
		video = video.replace(/&lt;iframe/gmi,'');
		video = video.replace(/allowfullscreen/gmi,'');
		video = video.replace(/src=\"/gmi,'');
		video = video.replace(/width=\"[0-9]*\"/gmi,'');
		video = video.replace(/height=\"[0-9]*\"/gmi,'');
		video = video.replace(/frameborder=\"[0-9]*\"/gmi,'');		
		video = video.replace(/><\/iframe>/gmi,'');
		video = video.replace(/&gt;&lt;\/iframe&gt;/gmi,'');

		video = video.replace(/\"/gmi,'');
		video = video.replace(/[ ]*/gmi,'');


		//alert(link);
		return video;});

		text = text.replace(/\[video\]([.\s\S]+?)\[\/video\]/gmi,"<table cellpadding=\"0\" cellspacing=\"10\" width=\"100%\"><tr><td align=\"center\"><iframe width=\"560\" height=\"315\" src=\"$1\" frameborder=\"0\" allowfullscreen></iframe></td></tr></table>");
	return text;}
	
	
function general___inputtextconverttags_code(text){
	arrayalltags.push('code');
	var count1=(text.split('\[code\]').length - 1);
	var count2=(text.split('\[\/code\]').length - 1);
	if ((count1+count2)>0){//если тэг есть	
		if (count1==count2){//если закр и откр совпадают		
			text=text.replace(/\[code\]([\s\S]+?)\[\/code\]/gmi,function(args){//выбираем нужные участки и обрабатываем их своей функцией 
				code=args.toString();
				code=code.replace(/\[code\][\s]+/gmi,"[code]");	//удаляем ненужные нетекстные символы в начале кода
				code=code.replace(/([\s]+)\[\/code\]/gmi,"[/code]");	//удаляем ненужные нетекстные символы в конце кода

				code=code.replace(/\[code\]/gmi,"");	//удаляем открывающий тег кода
				code=code.replace(/\[\/code\]/gmi,""); //удаляем закрывающий тег кода
				var count3=(code.split('\n').length - 1);	
				var num="";
				for (var i=0; i<=count3; i++) {	num+=i+1+"<br>"; }		
				var line = "<div class='div_forum_codeline'>"+num+"</div>";
				code=code.replace(/[ ]{1,}$/gmi,"");//удаляем ненужные пробелы в конце кода		
				code=code.replace(/\n/gmi,"<br>");//делаем свое преобразование переносов строки
				return "<table border='1' style='text-size:11px;' class='php' cellpadding='0' cellspacing='0'><tr><td valign='top' align='right' width='1%' class='td_forum_codeline'>"+line+"</td><td class='td_forum_codetext' valign='top'><div class='div_forum_codetext' ><div style='margin:0px;' class='prettyprint'>"+code+"</div></div></td></tr></table>";	
			});}}
	return text;}

function general___inputtextconverttags_placing(text){
	text=text.replace(/[ ]{1,}\n/gm,"\n");//убираем пробелы перед переносом строки
	
	//убираем лишние переносы строк между блочными элементами
	text=text.replace(/ol>[\n]{1}([\n\r]*)<table/gm,"ol>$1<table");
	text=text.replace(/ol>[\n]{1}([\n\r]*)<div/gm,"ol>$1<div");
	text=text.replace(/ol>[\n]{1}([\n\r]*)<ul/gm,"ol>$1<ul");
	text=text.replace(/ol>[\n]{1}([\n\r]*)<ol/gm,"ol>$1<ol");

	text=text.replace(/ul>[\n]{1}([\n\r]*)<table/gm,"ul>$1<table");		
	text=text.replace(/ul>[\n]{1}([\n\r]*)<div/gm,"ul>$1<div");
	text=text.replace(/ul>[\n]{1}([\n\r]*)<ol/gm,"ul>$1<ol");
	text=text.replace(/ul>[\n]{1}([\n\r]*)<ul/gm,"ul>$1<ul");

	text=text.replace(/table>[\n]{1}([\n\r]*)<table/gm,"table>$1<table");		
	text=text.replace(/table>[\n]{1}([\n\r]*)<div/gm,"table>$1<div");	
	text=text.replace(/table>[\n]{1}([\n\r]*)<ol/gm,"table>$1<ol");	
	text=text.replace(/table>[\n]{1}([\n\r]*)<ul/gm,"table>$1<ul");	

	text=text.replace(/div>[\n]{1}([\n\r]*)<table/gm,"div>$1<table");			
	text=text.replace(/div>[\n]{1}([\n\r]*)<div/gm,"div>$1<div");	
	text=text.replace(/div>[\n]{1}([\n\r]*)<ol/gm,"div>$1<ol");	
	text=text.replace(/div>[\n]{1}([\n\r]*)<ul/gm,"div>$1<ul");

	//убираем ВСЕ переносы строк внутри блочных элементов позиционирования
	text=text.replace(/div align=\'center\'>[\n\r]{1,}/gm,"div align='center'>");
	text=text.replace(/div align=\'left\'>[\n\r]{1,}/gm,"div align='left'>");		
	text=text.replace(/div align=\'right\'>[\n\r]{1,}/gm,"div align='right'>");			
	text=text.replace(/div align=\'justify\'>[\n\r]{1,}/gm,"div align='justify'>");		
	text=text.replace(/[\n\r]{1,}<\/div>/gm,"</div>");		

	//добиваем остальные лишние пробелы после блочных элементов рядом с простым текстом
	text=text.replace(/table>[\n]{1}/gm,"table>");
	text=text.replace(/div>[\n]{1}/gm,"div>");
	text=text.replace(/ul>[\n]{1}/gm,"ul>");
	text=text.replace(/ol>[\n]{1}/gm,"ol>");

	//убираем ВСЕ пререносы строк в блочном элементе спика
	text=text.replace(/<ol>[\n\r]{1,}/gm,"<ol>");
	text=text.replace(/<ul>[\n\r]{1,}/gm,"<ul>");
	text=text.replace(/[\n\r]{0,}<li>[\n\r]{0,}/gm,"<li>");
	text=text.replace(/[\n\r]{0,}<\/li>[\n\r]{0,}/gm,"</li>");
	
	return text;}

function general___inputtextconverttags_smiles(text){
	text=text.replace(/:cry:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/cry.gif' class='smile'>");	
	text=text.replace(/:D:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/D.gif' class='smile'>");		
	text=text.replace(/:fear:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/fear.gif' class='smile'>");	
	text=text.replace(/:think:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/think.gif' class='smile'>");	
	text=text.replace(/:no:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/no.gif' class='smile'>");
	text=text.replace(/:wacko:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/wacko.gif' class='smile'>");
	text=text.replace(/:smile:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/smile.gif' class='smile'>");
	text=text.replace(/:thanks:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/thanks.gif' class='smile'>");
	text=text.replace(/:good:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/good.gif' class='smile'>");
	text=text.replace(/:palms:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/palms.gif' class='smile'>");
	text=text.replace(/:fury:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/fury.gif' class='smile'>");
	text=text.replace(/:firtoy:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/smiles/firtoy.gif' class='smile'>");
	return text;}

function general___inputtextconverttags_ifaces(text){
	text=text.replace(/:yaoming:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/yaoming.gif' class='iface'>");
	text=text.replace(/:yaoming2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/yaoming2.gif' class='iface'>");
	text=text.replace(/:yaoming3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/yaoming3.gif' class='iface'>");
	text=text.replace(/:yaowoman:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/yaowoman.gif' class='iface'>");
	text=text.replace(/:yaowoman2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/yaowoman2.gif' class='iface'>");
	text=text.replace(/:yaowoman3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/yaowoman3.gif' class='iface'>");
	text=text.replace(/:men:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/men.gif' class='iface'>");
	text=text.replace(/:men2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/men2.gif' class='iface'>");
	text=text.replace(/:men3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/men3.gif' class='iface'>");
	text=text.replace(/:men4:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/men4.gif' class='iface'>");
	text=text.replace(/:men5:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/men5.gif' class='iface'>");
	text=text.replace(/:pokerface:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/pokerface.gif' class='iface'>");
	text=text.replace(/:pokerface2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/pokerface2.gif' class='iface'>");
	text=text.replace(/:pokerface3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/pokerface3.gif' class='iface'>");
	text=text.replace(/:people:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people.gif' class='iface'>");
	text=text.replace(/:cerealguy:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/cerealguy.gif' class='iface'>");
	text=text.replace(/:people2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people2.gif' class='iface'>");
	text=text.replace(/:people3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people3.gif' class='iface'>");
	text=text.replace(/:people4:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people4.gif' class='iface'>");
	text=text.replace(/:people5:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people5.gif' class='iface'>");
	text=text.replace(/:people6:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people6.gif' class='iface'>");
	text=text.replace(/:people7:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people7.gif' class='iface'>");
	text=text.replace(/:people8:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people8.gif' class='iface'>");
	text=text.replace(/:people9:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people9.gif' class='iface'>");
	text=text.replace(/:people10:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people10.gif' class='iface'>");
	text=text.replace(/:people11:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people11.gif' class='iface'>");
	text=text.replace(/:people12:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people12.gif' class='iface'>");
	text=text.replace(/:people13:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people13.gif' class='iface'>");
	text=text.replace(/:people14:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people14.gif' class='iface'>");
	text=text.replace(/:people15:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people15.gif' class='iface'>");
	text=text.replace(/:people16:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people16.gif' class='iface'>");
	text=text.replace(/:people17:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people17.gif' class='iface'>");
	text=text.replace(/:people18:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people18.gif' class='iface'>");
	text=text.replace(/:people19:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people19.gif' class='iface'>");
	text=text.replace(/:people20:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people20.gif' class='iface'>");
	text=text.replace(/:people21:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people21.gif' class='iface'>");
	text=text.replace(/:people22:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people22.gif' class='iface'>");
	text=text.replace(/:people23:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people23.gif' class='iface'>");
	text=text.replace(/:people24:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people24.gif' class='iface'>");
	text=text.replace(/:people25:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people25.gif' class='iface'>");
	text=text.replace(/:people26:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people26.gif' class='iface'>");
	text=text.replace(/:people27:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people27.gif' class='iface'>");
	text=text.replace(/:people28:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people28.gif' class='iface'>");
	text=text.replace(/:people29:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/people29.gif' class='iface'>");
	text=text.replace(/:rageguy:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/rageguy.gif' class='iface'>");
	text=text.replace(/:rageguy2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/rageguy2.gif' class='iface'>");
	text=text.replace(/:cat:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/cat.gif' class='iface'>");
	text=text.replace(/:cat2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/cat2.gif' class='iface'>");
	text=text.replace(/:cat3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/cat3.gif' class='iface'>");
	text=text.replace(/:cat4:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/cat4.gif' class='iface'>");
	text=text.replace(/:cat5:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/cat5.gif' class='iface'>");
	text=text.replace(/:cat6:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/cat6.gif' class='iface'>");
	text=text.replace(/:cat7:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/cat7.gif' class='iface'>");
	text=text.replace(/:cat8:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/cat8.gif' class='iface'>");
	text=text.replace(/:ololosh:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/ololosh.gif' class='iface'>");
	text=text.replace(/:ololosh2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/ololosh2.gif' class='iface'>");
	text=text.replace(/:ololosh3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/ololosh3.gif' class='iface'>");
		
	text=text.replace(/:troll:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll.gif' class='iface'>");			
	text=text.replace(/:troll2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll2.gif' class='iface'>");			
	text=text.replace(/:troll3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll3.gif' class='iface'>");


	text=text.replace(/:troll4:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll4.gif' class='iface'>");
	text=text.replace(/:troll5:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll5.gif' class='iface'>");
	text=text.replace(/:troll6:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll6.gif' class='iface'>");
	text=text.replace(/:troll7:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll7.gif' class='iface'>");
	text=text.replace(/:troll8:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll8.gif' class='iface'>");
	text=text.replace(/:troll9:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll9.gif' class='iface'>");
	text=text.replace(/:troll10:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll10.gif' class='iface'>");
	text=text.replace(/:troll11:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll11.gif' class='iface'>");
	text=text.replace(/:troll12:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll12.gif' class='iface'>");
	text=text.replace(/:troll13:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll13.gif' class='iface'>");
	text=text.replace(/:troll14:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/troll14.gif' class='iface'>");


	text=text.replace(/:memface:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface.gif' class='iface'>");
	text=text.replace(/:memface2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface2.gif' class='iface'>");
	text=text.replace(/:memface3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface3.gif' class='iface'>");
	text=text.replace(/:memface4:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface4.gif' class='iface'>");
	text=text.replace(/:memface5:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface5.gif' class='iface'>");
	text=text.replace(/:memface6:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface6.gif' class='iface'>");
	text=text.replace(/:memface7:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface7.gif' class='iface'>");
	text=text.replace(/:memface8:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface8.gif' class='iface'>");
	text=text.replace(/:memface9:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface9.gif' class='iface'>");
	text=text.replace(/:memface10:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface10.gif' class='iface'>");
	text=text.replace(/:memface11:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface11.gif' class='iface'>");
	text=text.replace(/:memface12:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/memface12.gif' class='iface'>");

	text=text.replace(/:car:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car.gif' class='iface'>");
	text=text.replace(/:car2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car2.gif' class='iface'>");
	text=text.replace(/:car3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car3.gif' class='iface'>");
	text=text.replace(/:car4:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car4.gif' class='iface'>");
	text=text.replace(/:car5:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car5.gif' class='iface'>");
	text=text.replace(/:car6:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car6.gif' class='iface'>");
	text=text.replace(/:car7:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car7.gif' class='iface'>");
	text=text.replace(/:car8:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car8.gif' class='iface'>");
	text=text.replace(/:car9:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car9.gif' class='iface'>");
	text=text.replace(/:car10:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car10.gif' class='iface'>");
	text=text.replace(/:car11:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car11.gif' class='iface'>");
	text=text.replace(/:car12:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car12.gif' class='iface'>");
	text=text.replace(/:car13:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car13.gif' class='iface'>");
	text=text.replace(/:car14:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car14.gif' class='iface'>");
	text=text.replace(/:car15:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car15.gif' class='iface'>");
	text=text.replace(/:car16:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car16.gif' class='iface'>");
	text=text.replace(/:car17:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car17.gif' class='iface'>");
	text=text.replace(/:car18:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car18.gif' class='iface'>");
	text=text.replace(/:car19:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car19.gif' class='iface'>");
	text=text.replace(/:car20:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car20.gif' class='iface'>");
	text=text.replace(/:car21:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car21.gif' class='iface'>");
	text=text.replace(/:car22:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car22.gif' class='iface'>");
	text=text.replace(/:car23:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car23.gif' class='iface'>");
	text=text.replace(/:car24:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car24.gif' class='iface'>");
	text=text.replace(/:car25:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car25.gif' class='iface'>");
	text=text.replace(/:car26:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car26.gif' class='iface'>");
	text=text.replace(/:car27:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car27.gif' class='iface'>");
	text=text.replace(/:car28:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car28.gif' class='iface'>");
	text=text.replace(/:car29:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car29.gif' class='iface'>");
	text=text.replace(/:car30:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car30.gif' class='iface'>");
	text=text.replace(/:car31:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car31.gif' class='iface'>");
	text=text.replace(/:car32:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car32.gif' class='iface'>");
	text=text.replace(/:car33:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/car33.gif' class='iface'>");

	text=text.replace(/:taz:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/taz.gif' class='iface'>");
	text=text.replace(/:taz2:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/taz2.gif' class='iface'>");
	text=text.replace(/:taz3:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/taz3.gif' class='iface'>");
	text=text.replace(/:taz4:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/taz4.gif' class='iface'>");
	text=text.replace(/:taz5:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/taz5.gif' class='iface'>");
	text=text.replace(/:taz6:/gm,"<img src='http://mapstore.org/my_portfolio/tazteam.net/images/_general/inputtext/ifaces/taz6.gif' class='iface'>");
		
	return text;}

function general___inputtextconverttags_ending(text){
	text=text.replace(/\n/gm,"<br>");//превращаем оставшиеся переносы строк в br
	text=text.replace(/[\s]{1,}/gm," ");//превращаем оставшиеся чередующиеся небуквенные символы в одиночный пробел
	return text;}

function general___inputtext_tagsnacking(text){//удаляем все теги с целью проверки ввел ли какой свой текст пользователь
	var tag;
	var pattern1;
	var pattern2;
	text=general___inputtextdeletetags_citate(text);//очищаем текст от тегов цитирования
	text=text.replace(/[\n\t\s]+/gmi," ");//переносы строк, пробелы и табуляцию заменяем на одиночный пробел
	for (var key in arrayalltags) {
		tag=arrayalltags[key];
		//удаляем текущие теги
		if (tag=="link"){
			text=text.replace(/\[link\]/gmi,"");
			text=text.replace(/\[link\]/gmi,"");			
			text=text.replace(/\[link=\]/gmi,"");
			text=text.replace(/\[link=(.*?)\]/gmi,"");
			text=text.replace(/\[\/link\]/gmi,"");}
		else if (tag=="video"){
			text=text.replace(/\[video\]/gmi,"");
			text=text.replace(/\[\/video\]/gmi,"");}
		else if ((/^table|tr|trblue|trred|td200|td100|td50|td340|td400|td-2|td-3|td-4|td-5|td-6|td-7$/).test(tag)){
			pattern1 = new RegExp('\\[\\|'+tag+'\\|\\]', 'igm');
			pattern2 = new RegExp('\\[\\/\\|'+tag+'\\|\\]', 'igm');
			text=text.replace(pattern1,"");
			text=text.replace(pattern2,"");}
		else if (tag=="code"){
			text=text.replace(/\[code\]/gmi,"");			
			text=text.replace(/\[\/code\]/gmi,"");}
		else {
			if (tag=="\*") {tag="\\\*";}
			pattern1 = new RegExp('\\['+tag+'\\]','igm');
			pattern2 = new RegExp('\\[\\/'+tag+'\\]','igm');
			text=text.replace(pattern1,"");
			text=text.replace(pattern2,"");}}
	text=general___inputtext_basic(text);//преобразуем html теги и уберем пробелы по краям
	return text;}

function general___inputtextsetarraycitateNumberId(number,id){//вставляем в массив пояснение номер - id
	arraycitateNumberId[number]=id;}

function general___inputtextincludecitate(textto,number,who){//вставляем в текст цитату
	general___inputtextincludetag(textto, "[цитирование сообщения №"+number+" ("+who+")]\n",'citate');}
	




function general___comfortability_number(number,id){
	if ((number/10)<1){}
	else if ((number/100)<1){}
	else if ((number/1000)<1){}
	else if ((number/10000)<1){number=number.replace(/([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})/gmi,"$1 $2$3$4");}
	else if ((number/100000)<1){number=number.replace(/([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})/gmi,"$1$2 $3$4$5");}
	else if ((number/1000000)<1){number=number.replace(/([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})/gmi,"$1$2$3 $4$5$6");}	
	else if ((number/10000000)<1){number=number.replace(/([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})/gmi,"$1 $2$3$4 $5$6$7");}	
	else if ((number/100000000)<1){number=number.replace(/([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})/gmi,"$1$2 $3$4$5 $6$7$8");}
	else if ((number/1000000000)<1){number=number.replace(/([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})([0-9]{1})/gmi,"$1$2$3 $4$5$6 $7$8$9");}
	document.getElementById(id).value=number;
	return number;}










	
function general___inputtextdeletetags_citate(text){//удаляем теги цитирования
	text=text.replace(/\[[\s]*цитирование[\s]*сообщения[\s]*№[0-9]+[\s]*\([\s]*[^\]]+?\)[\s]*\][\n\t\s]*/gmi,"");//очищаем текст от тегов цитирования
	return text;}

function general___inputtextconverttags_citate(text,inputnumbertocitate){//определяем тег цитирования
	if (document.getElementById(inputnumbertocitate)){
		numbercitate = text.match(/\[[\s]*цитирование[\s]*сообщения[\s]*№([0-9]+)[\s]*\([\s]*[^\]]+?\)[\s]*\]/i);//записываем значения тега в переменную POST
		if (numbercitate){
				id=arraycitateNumberId[numbercitate[1]];}
		else{
			id=0;}
		document.getElementById(inputnumbertocitate).value=id; }	//alert(document.getElementById(inputnumbertocitate).value);	
	text=general___inputtextdeletetags_citate(text);//очищаем текст от возможных тегов цитирования
	return text;}

function general___inputtexttohtml(text,inputnumbertocitate){
	if 	((/[\d\D]/m).test(text)){//alert(text);
		text=general___inputtext_basic(text);//alert(text);
		text=general___inputtextconverttags_citate(text,inputnumbertocitate);//alert(text);
		text=general___inputtextconverttags_smiles(text);//alert(text);
		text=general___inputtextconverttags_ifaces(text);		//alert(text);
		text=general___inputtextconverttags_formatter(text);//alert(text);
		text=general___inputtextconverttags_href(text);//alert(text);
		text=general___inputtextconverttags_t_href(text);	

		text=general___inputtextconverttags_tables(text);		//alert(text);
		
		text=general___inputtextconverttags_video(text);		//alert(text);
		text=general___inputtextconverttags_code(text);//alert(text);
		text=general___inputtextconverttags_placing(text);//alert(text);
		text=general___inputtextconverttags_ending(text);
		//alert(text);

		return text;}
	else {
		return 0;}}

function general___inputtextsubmit(textfrom,texttohtml,texttonack,inputnumbertocitate){
	var text=document.getElementById(textfrom).value;
	texthtml=general___inputtexttohtml(text,inputnumbertocitate);
	document.getElementById(texttohtml).value=texthtml;	
	textnacked=general___inputtext_tagsnacking(text);	
	if (document.getElementById(texttonack)){
		document.getElementById(texttonack).value=textnacked;}
		//alert(document.getElementById(textfrom).value);
		//alert(document.getElementById(texttonack).value);
		//alert(document.getElementById(texttohtml).value);
	return textnacked;}

	

	