/*var offset_top_visible="no";//видимая высота, если ниже, то скрыта

function general___photos_show_visible_photo(src,id,width,height,style,href){//если изображение ниже, то не показывается
	if (offset_top_visible=="no") {offset_top_visible=jQuery('#'+id).offset().top;}//устанавливается в самом начале, показывает реальный отступ о тверха экрана
	if (jQuery('#'+id).offset().top<=offset_top_visible) {
		document.write("<a href=\""+href+"\"><img id="+id+" src="+src+" width="+width+" height="+height+" class="+style+"></a>");}}
		
		
		


function general___show_visible_photo(src,id_img,id_block,width_img,height_img,height_block,style,href){//показ фото, если оно находится в зоне видимости блока
	var offset_max_img=jQuery('#'+id_block).offset().top+height_block; //alert("проверить отступ, должен быть относительно верхней части элемента "+jQuery('#'+id_block).offset().top);
	if (jQuery('#'+id_img).offset().top<=offset_max_img){
		document.write("<a href=\""+href+"\"><img id="+id_img+" src="+src+" width="+width_img+" height="+height_img+" class="+style+"></a>");}}

*/

