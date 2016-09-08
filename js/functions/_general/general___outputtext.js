function general___show_short_text(text,lenght_text,id){
	text=$.trim(text);
	text=text.replace(/[ ]*(\n+)[ ]*/gmi,"$1");//убираем пробелы перед и после переноса строк
	pattern1 = new RegExp('\^\(\.{'+lenght_text+'}\)\.\*', 'igm');
	text=text.replace(pattern1,"$1... ");//исправление текста, если он имеет многобуквенные слова

	document.getElementById(id).innerHTML=text;}
	
	