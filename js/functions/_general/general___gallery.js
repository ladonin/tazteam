function general___gallery_set_num_photo(curnum)
{
	document.getElementById('gallery_num_photo').innerHTML=curnum+" из "+gallery_max_image;
	current_image_list=curnum;
}