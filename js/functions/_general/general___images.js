var offset_top_max_img="none";//максимальное смещение картинки по вертикали
var offset_top_visible="no";//видимая высота, если ниже, то скрыта


function general___photos_show_visible_photo(src,id,width,height,style,href){//если изображение ниже, то не показывается
	if (offset_top_visible=="no") {offset_top_visible=jQuery('#'+id).offset().top;}//устанавливается в самом начале, показывает реальный отступ о тверха экрана
	if (jQuery('#'+id).offset().top<=offset_top_visible) {
		document.write("<a href=\""+href+"\"><img id="+id+" src="+src+" width="+width+" height="+height+" class="+style+"></a>");}}
		
		
		


function general___show_visible_photo(flag_photo_none,src,name_img,id_img,id_block,width_img,height_img,height_block){//показ фото, если оно находится в зоне видимости блока
//id_block - основной блок с объявлениями
//offset_top_max_img - отступ относительно его верхней части + его высота



//при вертикальном отображении берется (сумма отступа от верха окна верхней части основного блока и его высоты = нижняя координата блока(высота блока равна высоте тела содержимого)) и сравнивается с нижней координатой картинки=(отступ от верха верхней части картинки + высота картинки) - не берется сам текущий блок объявления, только по границе картинки
//при горизонтальном отображении берется (сумма отступа от верха окна верхней части основного блока и его высоты (высота блока равна высоте объявления, а не картинки, т.к. тут еще присутствует отступ от граница объявления до картинки, его тоже брем во внимание)) и сравнивается с нижней координатой картинки=(отступ от верха верхней части картинки + высота картинки) - не берется сам текущий блок объявления, только по границе картинки

//alert("height_img "+height_img);
//alert("height_block "+height_block);


	if (offset_top_max_img!="stop"){
		if (offset_top_max_img=="none"){offset_top_max_img=jQuery('#'+id_block).offset().top+height_block;} //отступ относительно его верхней части + его высота

//alert("offset_top_max_img "+offset_top_max_img);
//alert("jQuery('#'+id_block).offset().top "+jQuery('#'+id_block).offset().top);
//alert("jQuery('#'+id_img).offset().top "+jQuery('#'+id_img).offset().top);
		if (flag_photo_none!=3){//3 - если вообще не нужно задавать параметры картинке
		$('#'+id_img).width(width_img);
			$('#'+id_img).height(height_img);
			if (flag_photo_none!=1){
				name_img = name_img.replace("_3.", "_2.");}//вставляем ключ размеров	
			$('#'+id_img).attr('src',src+name_img);}
			
			
			//alert(jQuery('#'+id_block).offset().top);
			//alert(jQuery('#'+id_img).offset().top); alert(offset_top_max_img);
		if ((jQuery('#'+id_img).offset().top+height_img)<=offset_top_max_img){
			return true;}
		else {
			offset_top_max_img="stop";}}
	return false;}



