var news_src_img_photo_big;
var news_added_announcements_height_toptext=30;


function news___img_to_gallery() //при кликаньи на эту фотку смен€етс€ больша€ фотка галереи на такую же
{
	news_src_img_photo_big=document.getElementById('news_img_photo_big').src;				
	document.getElementById('gallery_img_big').src=news_src_img_photo_big;
}




function news___podgon_po_razmeram_img(id,width,height){ //подгон по размерам большой картинки
	curwidth = Number(width);
	curheight = Number(height);
	if (curwidth>=curheight){
		newwidth=news_photo_width;
		newheight=Math.floor((curheight*newwidth)/curwidth);}
	else {
		newheight=news_photo_height;
		newwidth=Math.floor((curwidth*newheight)/curheight);}
		
	//очищаем прошлые установленные значени€
	$('#'+id).removeAttr("width");
	$('#'+id).removeAttr("height");		
	$('#'+id).css({ width: "", height: "" });		
		
	$('#'+id).height(newheight);
	$('#'+id).width(newwidth);
/*
	if ((($('#'+id).height()+(news_under_photo_photos_width+5)*2)+100-46)>height_body){//-46 поправка по верху
	//alert(1);
		curheight=$('#'+id).height();
		curwidth=$('#'+id).width();
		newheight=height_body-((news_under_photo_photos_width+5)*2)+100-46;
		newwidth=(curwidth*newheight)/curheight;	
					
		//if (newwidth<news_photo_width){					
		$('#'+id).height(newheight);
		$('#'+id).width(newwidth);
		}}*/
		}









function news___perelist_img(id,src) //при кликаньи на эту фотку смен€етс€ больша€ фотка авторынка на такую же
{
	$('#'+id).attr('src',src);
	

	/*	if ($('#'+id).width()<news_photo_width){
	alert();
		curheight=$('#'+id).height();
		curwidth=$('#'+id).width();		
		newwidth=news_photo_width;
		newheight=(curheight*newwidth)/curwidth;
		$('#'+id).width(newwidth);
		$('#'+id).height(newheight);*/

		//news___podgon_po_vert_img(id);
		//news___podgon_po_vert_img(id);

	
}
