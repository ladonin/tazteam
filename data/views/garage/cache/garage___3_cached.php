
<?php

GarageBase::convert_cookie_find_query($MSQLc);//запускаем метод, чтобы определить есть ли поисковый запрос - для показа кнопки - очистить поиск
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_1.php");

$row=GeneralMYSQL::fetch_array($res);
GeneralMYSQL::free($res);
    
include("data/components/garage/panels/garage___3_panel_top.php"); 

GarageBase::detect_photos_main($row['img'],$row['img_sizes']);//вычисляем фотографии
GarageBase::$id_autor=$row['id_user'];
GarageBase::$mark=$row['mark'];
GarageBase::$model=$row['model'];
//GarageBase::preload_photos(); //подгружаем другие фотографии
UsersBase::set_points($MSQLc,GarageBase::$id_autor);//начисляем автору баллы
?>




<table cellpadding="0" cellspacing="0">
<tr>

<td align="left" valign="top" width="482">

	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left" valign="top">



    <div class="padding_right_10">



	
	<table cellpadding="5" cellspacing="0" width="100%" bgcolor="#dddddd"  style="cursor:pointer; border:1px solid #999999;" >
	<tr>
	<td align="center" valign="middle" height="460" class="photo_item1">
                <a href="#garage_photos" data-toggle="modal" class="lead"><div class="photo_item3" style="width:458px;">
        &#9658;
        </div></a>
		<div style="max-height: 460px; width:460px; overflow:hidden;" <?php 
    if (GarageBase::$img1){	?>onclick="garage___next_photo('garage_img_photo_big');"<?php }	
    ?>>
    
    
    

    
    
    
    
    
    
    
    
    <?php
		if (GarageBase::$img1){	?>
			<img style="max-height: 460px; max-width: 460px;" src="http://140706.selcdn.com/tazteam/_files/images/garage/<?php echo($row['id']);?>/<?php echo(GarageBase::$img1);?>"   class="refimage" style="cursor:pointer" id="garage_img_photo_big" alt="<?php echo(GeneralPageTree::$title);?>">
<?php }
		else{ ?>
			<img src="http://instorage.org/portfolio/tazteam/images/_general/general___photo_none_600x400.jpg" width="460"  class="refimage" <?php /*onclick="swimwin('gallery','garage'); garage_img_to_gallery(); "*/?>>
<?php } ?>









    








</div>
	</td>
	</tr>
	</table>
	</div>


    <div class="padding_right_10">

    
    
    <div class="v_i_b"></div>
    

	<?php
	$current_var1=0;
	for($i=1; $i<=20; $i++){
		$varimg="img".$i;
		$varwidth="width".$i;
		$varheight="height".$i;	
		if (GarageBase::$$varimg){
		$current_var1++;
			?><script type="text/javascript">
                        
            	
				garage_img_url_cur<?php echo($i);?>="http:\/\/140706.selcdn.com\/tazteam\/_files\/images\/garage\/<?php echo($row['id']);?>\/";

				garage_img_photo_cur<?php echo($i);?>="<?php echo(GarageBase::$$varimg);?>";
				garage_img_photo_cur<?php echo($i);?> = garage_img_photo_cur<?php echo($i);?>.replace("_3.","_2.");//задаем ключ размеров
				garage_full_url_cur<?php echo($i);?>=garage_img_url_cur<?php echo($i);?>+garage_img_photo_cur<?php echo($i);?>;

				garage_img_photo_to_big_cur<?php echo($i);?>="<?php echo(GarageBase::$$varimg);?>";
				garage_full_url_to_big_cur<?php echo($i);?>=garage_img_url_cur<?php echo($i);?>+garage_img_photo_to_big_cur<?php echo($i);?>;


				garage_array_photos[<?php echo($current_var1);?>]=garage_full_url_to_big_cur<?php echo($i);?>;


				//предварительная подгрузка других фотографий объявления
				//general___preload_one_image(garage_full_url_to_big_cur<?php echo($i);?>);
                
                
                //следующая подгружается при смене фото
			</script><img class="refimage" style="margin-bottom:5px;<?php if ($current_var1%5) { echo(" margin-right:5px;");}?>" id="garage_under_photo_photo<?php echo($i);?>" onclick="garage___perelist_img('garage_img_photo_big',garage_full_url_to_big_cur<?php echo($i);?>);
				<?php /*gallery_num_photo_func(<?php echo($js);?>);*/?>"/><script type="text/javascript">	
				$('#garage_under_photo_photo<?php echo($i);?>').attr('src',garage_full_url_cur<?php echo($i);?>);
				$('#garage_under_photo_photo<?php echo($i);?>').width(90);
				//garage___podgon_po_razmeram_img_2('garage_img_photo_big',470);
			</script><?php } } ?>
            
            
 
			<script type="text/javascript">//вторая фотка, если есть
				if (garage_array_photos[2]){
                general___preload_one_image(garage_array_photos[2]);
                }
			</script> 
      </div>

             
			
            

    
    



            



<?php /*


   <div class="padding_left_10">   

            

			<div class="v_i_b"></div>
			<?php
			GeneralDialogWindows::$getvar1=GeneralGetVars::$var1;	
			GeneralDialogWindows::$getvar2=GeneralGetVars::$var2;	
			GeneralDialogWindows::$getvar3=GeneralGetVars::$var3;	
			GeneralDialogWindows::$getvar4=GeneralGetVars::$var4;	
			GeneralDialogWindows::$num_page=GeneralGetVars::$num_page;
			GeneralDialogWindows::$signaturing="am";
			GeneralDialogWindows::$type=1;//2 -  открывающийся чат
			GeneralDialogWindows::$padding_right=0;			
			GeneralDialogWindows::$id_dialog="garage_3_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
			GeneralDialogWindows::$database="garage___messages";//база данных диалога
			GeneralDialogWindows::$textforpanel="Написать комментарий";
			GeneralDialogWindows::$namedialog="Комментарии";
			GeneralDialogWindows::$condition1="id_garage=".GeneralGetVars::$var3;//условие 1 для базы данных
			//GeneralDialogWindows::$condition2="id_photo=".$row['id_photo'];	//условие 2 для базы данных
			GeneralDialogWindows::$idmessage=2;//где будет номер сообщения	
			GeneralDialogWindows::$valuesnumber=5;//сколько value делаем	
			GeneralDialogWindows::$autor=3;//какую value делаем автором при вставке
			GeneralDialogWindows::$textvalue=4;//где будет текст
			GeneralDialogWindows::$time=5;//какую value делаем временем создания сообщения	при вставке
			GeneralDialogWindows::$value1=GeneralGetVars::$var3;//значение для вставки
			GeneralDialogWindows::$value2="";//значение для вставки - потом вставим
			GeneralDialogWindows::$value3="";//значение для вставки - потом вставим
			GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
			GeneralDialogWindows::$value5="";//значение для вставки - потом вставим

			include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
			?>
			<script type="text/javascript">
				$('#div_dialog_1_var_width').width(460);//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
				$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
				$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
			</script>
            
             </div>
           
            
            */?>
            
            
            
            
            					
			</td>
			</tr>
			</table>					
					
					
					
		
			
			
			
			
			
			
</td>
<td align="left" valign="top" width="406">









	<?php 
	if ($row['themepage']==1){
		include("data/components/garage/garage___3_maindata_auto.php"); }
	if ($row['content']) { ?>
    
    
    
<table cellpadding="5" cellspacing="0" width="100%">
<tr>
<td align="left" bgcolor="#35526a" style="color: #ffffff; padding-left:10px;">
Описание:
</td>
</tr>	
<tr>
<td align="left" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding-left:10px; padding-right:10px;">
<?php echo($row['content']);?>
</td>
</tr>
</table>
<div class="v_i_b"></div><?php }
	if ($row['themepage']==1){
		include("data/components/garage/garage___3_maindata_auto_added.php");}?>

</td>
</tr>
</table>


