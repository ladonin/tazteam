var garage_src_img_photo_big;
var garage_added_announcements_height_toptext=30;


var garage_array_photos = new Array();
var garage_cur_photo=1;


function garage___img_to_gallery() //��� �������� �� ��� ����� ��������� ������� ����� ������� �� ����� ��
{
	garage_src_img_photo_big=document.getElementById('garage_img_photo_big').src;				
	document.getElementById('gallery_img_big').src=garage_src_img_photo_big;
}






function garage___next_photo(id) //��� �������� �� �������� ���� ���������� ����� �� ���������
{
    garage_cur_photo++;

    if (!garage_array_photos[garage_cur_photo]){garage_cur_photo=1;}

	$('#'+id).attr('src',garage_array_photos[garage_cur_photo]);
	


    //���� ��������� ����� ����, ����� ������ �� ������, �.�. ������ ��� ����������
    if (garage_array_photos[(garage_cur_photo+1)]){
        general___preload_one_image(garage_array_photos[(garage_cur_photo+1)]);
        }

}











function garage___podgon_po_razmeram_img(id,width,height){ //������ �� �������� ������� ��������
	curwidth = Number(width);
	curheight = Number(height);
	if (curwidth>=curheight){
		newwidth=garage_photo_width;
		newheight=Math.floor((curheight*newwidth)/curwidth);}
	else {
		newheight=garage_photo_height;
		newwidth=Math.floor((curwidth*newheight)/curheight);}
		
	//������� ������� ������������� ��������
	$('#'+id).removeAttr("width");
	$('#'+id).removeAttr("height");		
	$('#'+id).css({ width: "", height: "" });		
		
	$('#'+id).height(newheight);
	$('#'+id).width(newwidth);
/*
	if ((($('#'+id).height()+(garage_under_photo_photos_width+5)*2)+100-46)>height_body){//-46 �������� �� �����
	//alert(1);
		curheight=$('#'+id).height();
		curwidth=$('#'+id).width();
		newheight=height_body-((garage_under_photo_photos_width+5)*2)+100-46;
		newwidth=(curwidth*newheight)/curheight;	
					
		//if (newwidth<garage_photo_width){					
		$('#'+id).height(newheight);
		$('#'+id).width(newwidth);
		}}*/
		}


//���� ������: max-height, max-width
function garage___podgon_po_razmeram_img_2(id,limit){ //������ �� �������� ������� ��������
	//������������� ������ ����������
	if ($('#'+id).height()>$('#'+id).width()) {//������������ ��������
		//������� ������� ������������� ��������//���������� ������, ������ �� �������, ��� ����� ������ limit
		$('#'+id).removeAttr("width");
		$('#'+id).removeAttr("height");		
		$('#'+id).css({ width: "", height: "" });
		$('#'+id).height(limit);}
	else if ($('#'+id).width()>$('#'+id).height()){//�������������� ��������
		//������� ������� ������������� ��������//���������� ������, ������ �� �������, ��� ����� ������ limit
		$('#'+id).removeAttr("width");
		$('#'+id).removeAttr("height");		
		$('#'+id).css({ width: "", height: "" });	
		$('#'+id).width(limit);}
	else {//���������� ��������
		//������� ������� ������������� ��������
		$('#'+id).removeAttr("width");
		$('#'+id).removeAttr("height");		
		$('#'+id).css({ width: "", height: "" });	
		$('#'+id).width(limit);
		$('#'+id).height(limit);}}




function garage___perelist_img(id,src) //��� �������� �� ��� ����� ��������� ������� ����� ��������� �� ����� ��
{
	$('#'+id).attr('src',src);
	

	/*	if ($('#'+id).width()<garage_photo_width){
	alert();
		curheight=$('#'+id).height();
		curwidth=$('#'+id).width();		
		newwidth=garage_photo_width;
		newheight=(curheight*newwidth)/curwidth;
		$('#'+id).width(newwidth);
		$('#'+id).height(newheight);*/

		//garage___podgon_po_vert_img(id);
		//garage___podgon_po_vert_img(id);

	
}
