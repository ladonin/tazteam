var automarket_src_img_photo_big;
var automarket_added_announcements_height_toptext=30;


var automarket_array_photos = new Array();
var automarket_cur_photo=1;


function automarket___img_to_gallery() //��� �������� �� ��� ����� ��������� ������� ����� ������� �� ����� ��
{
	automarket_src_img_photo_big=document.getElementById('automarket_img_photo_big').src;				
	document.getElementById('gallery_img_big').src=automarket_src_img_photo_big;
}






function automarket___next_photo(id) //��� �������� �� �������� ���� ���������� ����� �� ���������
{
    automarket_cur_photo++;

    if (!automarket_array_photos[automarket_cur_photo]){automarket_cur_photo=1;}

	$('#'+id).attr('src',automarket_array_photos[automarket_cur_photo]);
    $('#automarket_photo_ref').attr('href',automarket_array_photos[automarket_cur_photo].replace("_3.","_1."));

    //���� ��������� ����� ����, ����� ������ �� ������, �.�. ������ ��� ����������
    if (automarket_array_photos[(automarket_cur_photo+1)]){
        general___preload_one_image(automarket_array_photos[(automarket_cur_photo+1)]);
    }
}











function automarket___podgon_po_razmeram_img(id,width,height){ //������ �� �������� ������� ��������
	curwidth = Number(width);
	curheight = Number(height);
	if (curwidth>=curheight){
		newwidth=automarket_photo_width;
		newheight=Math.floor((curheight*newwidth)/curwidth);}
	else {
		newheight=automarket_photo_height;
		newwidth=Math.floor((curwidth*newheight)/curheight);}
		
	//������� ������� ������������� ��������
	$('#'+id).removeAttr("width");
	$('#'+id).removeAttr("height");		
	$('#'+id).css({ width: "", height: "" });		
		
	$('#'+id).height(newheight);
	$('#'+id).width(newwidth);
/*
	if ((($('#'+id).height()+(automarket_under_photo_photos_width+5)*2)+100-46)>height_body){//-46 �������� �� �����
	//alert(1);
		curheight=$('#'+id).height();
		curwidth=$('#'+id).width();
		newheight=height_body-((automarket_under_photo_photos_width+5)*2)+100-46;
		newwidth=(curwidth*newheight)/curheight;	
					
		//if (newwidth<automarket_photo_width){					
		$('#'+id).height(newheight);
		$('#'+id).width(newwidth);
		}}*/
		}


//���� ������: max-height, max-width
function automarket___podgon_po_razmeram_img_2(id,limit){ //������ �� �������� ������� ��������
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




function automarket___perelist_img(id,src) //��� �������� �� ��� ����� ��������� ������� ����� ��������� �� ����� ��
{
	$('#'+id).attr('src',src);
    $('#automarket_photo_ref').attr('href',src.replace("_3.","_1."));

	/*	if ($('#'+id).width()<automarket_photo_width){
	alert();
		curheight=$('#'+id).height();
		curwidth=$('#'+id).width();		
		newwidth=automarket_photo_width;
		newheight=(curheight*newwidth)/curwidth;
		$('#'+id).width(newwidth);
		$('#'+id).height(newheight);*/

		//automarket___podgon_po_vert_img(id);
		//automarket___podgon_po_vert_img(id);

	
}
