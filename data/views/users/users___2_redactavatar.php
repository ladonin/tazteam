<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php 
if (UsersBase::detect_its_mypage(1)==true){//определяем - наша страница или нет
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_1.php");//будем использовать этот запрос - ничего страшного, хоть и много всего выводит, но не так часто требуется
	$row=GeneralMYSQL::fetch_array($res);
	GeneralMYSQL::free($res);	
	?>
	<a href="http://instorage.org/portfolio/tazteam/users/<?php echo(GeneralGetVars::$var2);?>" class="btn btn-primary btn-small">к моей странице</a>
	<div class="v_i_b"></div>
	<?php
	if (UsersMyData::$id==GeneralGetVars::$var2){
		include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_top_buttons_to_accounts_sn.php");}	
	?>
	

	<div class="lead"><?php	if ($row['gen_photo']==1){ echo("Загрузить новое фото на сервер");} else {echo("Загрузить фото на сервер");} ?>:</div>

	<div class="v_i_b"></div>
        
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" enctype="multipart/form-data" onsubmit="return general___new_photo('load_photo_img1');">	
	<input name="img1" id="load_photo_img1" type="file" style="width:200px;">
	<input type="hidden" name="submit" value="sendusersavatar">
	<div class="v_i_b"></div>
	<input type="submit" value="Загрузить" class="btn btn-success btn-small">
	</form><div class="v_i_b"></div>
    </div>        


<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>
	<?php
	//GeneralImagesPreload::input("images/_general/general___load_submit_hover.png"); 
	
	
	
	if ($row['gen_photo']==1){//если фото было ранее загружено
		?>
		<div class="lead">Изменить миниатюру:</div>

		<?php	
		GeneralImagesCrop::$image_url="_files/images/users/avas/".$row['dir_user']."/".$row['id_user']."_3.".$row['site_photo_format'];
		include("data/components/_general/photos/crop.php");

		//это означает, что у нас есть загруженное фото на сервере	
		//обновляем картинки
		GeneralImagesPreload::update_photos("users_ava","_files/images/users/avas/".$row['dir_user']."/".$row['id_user'],$row['site_photo_format']);}
		
	?><div class="v_i_b"></div></div><?php
}
?>