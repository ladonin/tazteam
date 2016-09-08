<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>   <?php include("data/components/_general/breadcrumbs.php"); ?>
<?php 
GeneralPageBasic::increment_view($MSQLc,"news","id='".GeneralGetVars::$var2."'",0,0,0,0);//плюс просмотр 
NewsBase::detect_themepage();
NewsBase::convert_cookie_find_query($MSQLc);
include("data/components/news/news___3_query_1.php");
$row=GeneralMYSQL::fetch_array($res);
GeneralMYSQL::free($res);



GeneralPagesCounter::$rowspage_name="rowspagenews1";//копия такой страницы - по присваиванию номеров страниц
GeneralPagesCounter::calculate_to_outer($MSQLc, "news","id>='".GeneralGetVars::$var2."'","themepage='".NewsBase::$themepage."'",NewsBase::$condition_added3,0,0);
?>


<?php if (GeneralSecurity::detect_administrator()==true) { ?>

<table cellpadding="0" cellspacing="0">
<tr>
<td align="left">
	<input value="новая тема" class="btn btn-info btn-mini" type="button" onclick="javascript:location.href='<?php echo(GeneralGlobalVars::url."/".GeneralGetVars::$var1."/redact");?>'">
	<?php GeneralImagesPreload::input("images/_general/general___new_announcement_submit_hover.png"); ?>
</td>
<td align="left" class="padding_left_10">
	<a href="http://mapstore.org/my_portfolio/tazteam.net/<?php echo(GeneralGetVars::$var1);?>/redact=<?php echo($row['id']);?>" class="btn btn-warning btn-mini">редактировать</a>
</td>
<td align="left" class="padding_left_10">
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return confirm('Удалить новость?');">
	<input name="submit" value="deletenews" type="hidden">
	<input name="id" value="<?php echo(GeneralGetVars::$var3);?>" type="hidden">
	<input value="удалить" class="btn btn-danger btn-mini" type="submit">	
	</form>
	<?php //GeneralImagesPreload::input("images/_general/general___delete_submit_text_grey_11_line_hover.png");?>
</td>
</tr>
</table><div class="v_i_b"></div>
<?php } ?>






<?php

NewsBase::detect_photos_main($row['img'],$row['img_sizes']);//вычисляем фотографии
//NewsBase::preload_photos(); //подгружаем другие фотографии
?>
<table cellpadding="0" cellspacing="0" class="news3_7" width="100%">
<tr>
<td align="left" valign="top">









	<div class="lead"><a href="http://mapstore.org/my_portfolio/tazteam.net/<?php echo(GeneralGetVars::$var1);?>=<?php echo(GeneralPagesCounter::$N_cur_to_outer);?>" title="наверх" class="btn btn-primary btn-mini" style="margin-right:5px; margin-bottom:3px;">&#9650;</a> <?php echo($row['name']);?></div>


	
	
<div class="padding_right_10 content_dark">	
		<table cellpadding="0" cellspacing="0" width="888">
		<tr>
		<td valign="top" align="left" bgcolor="#ffffff" class="text_normal">	
        	<?php if (NewsBase::$img1){	?>
        		<div style="float:left; margin:0px 20px 10px 0px"><img src="http://140706.selcdn.com/tazteam/_files/images/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row['id']);?>/<?php echo(NewsBase::$img1);?>" width="400" class="refimage news3_3" <?php /*onclick="swimwin('gallery','news'); news_img_to_gallery(); "*/?>></div>
        	<?php }
        	echo($row['contenthtml']);
        	?>
            
            

        </td>
        </tr>
        </table>	
	
	

	<div style="clear:both"></div>
	<div class="v_i_b"></div>
    
                    	<span class="grey">Дата размещения: </span><span class="explanation_dark" id="news_date_new"></span>
	<script type="text/javascript">general___date_DMY_show(<?php echo($row['date_create']);?>,'news_date_new');</script>
	<div class="v_i_b"></div>
    
    <table cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td align="left" width="50%">
    

    <span class="explanation_dark">Просмотров: <?php echo($row['number_views']);?></span></td>
    <td align="right" width="50%"><script type="text/javascript" src="//yandex.st/share/share.js"
    charset="utf-8"></script>
    <div class="yashare-auto-init" data-yashareL10n="ru"
     data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,gplus"
    
    ></div> 
    </td>
    </tr>
    </table>    
    
    	
	


	
	
</td>
</tr>
</table>


<div style="clear:both"></div>

</div>





<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px; padding-bottom:20px;"
class="boxShadow3"
>
	
	<?php
	GeneralDialogWindows::$getvar1=GeneralGetVars::$var1;	
	GeneralDialogWindows::$getvar2=GeneralGetVars::$var2;	
	GeneralDialogWindows::$getvar3=GeneralGetVars::$var3;	
	GeneralDialogWindows::$getvar4=GeneralGetVars::$var4;	
	GeneralDialogWindows::$num_page=GeneralGetVars::$num_page;
	
	if (NewsBase::$themepage==1){
		GeneralDialogWindows::$signaturing="ne";}
	else if (NewsBase::$themepage==2){
		GeneralDialogWindows::$signaturing="ar";}
	GeneralDialogWindows::$type=1;//2 -  открывающийся чат
	GeneralDialogWindows::$padding_right=0;	
	GeneralDialogWindows::$id_dialog="news_3_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
	GeneralDialogWindows::$database="news___messages";//база данных диалога
	GeneralDialogWindows::$textforpanel="Написать комментарий";
	GeneralDialogWindows::$namedialog="Комментарии";
	GeneralDialogWindows::$condition1="id_news=".GeneralGetVars::$var2;//условие 1 для базы данных
	//GeneralDialogWindows::$condition2="id_photo=".$row['id_photo'];	//условие 2 для базы данных
	GeneralDialogWindows::$valuesnumber=5;//сколько value делаем	
	GeneralDialogWindows::$idmessage=2;//где будет номер сообщения	
	GeneralDialogWindows::$autor=3;//какую value делаем автором при вставке
	GeneralDialogWindows::$textvalue=4;//где будет текст
	GeneralDialogWindows::$time=5;//какую value делаем временем создания сообщения	при вставке
	GeneralDialogWindows::$value1=GeneralGetVars::$var2;//значение для вставки
	GeneralDialogWindows::$value2="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value3="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
	GeneralDialogWindows::$value5="";//значение для вставки - потом вставим
	include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
	?>
	<script type="text/javascript">
		$('#div_dialog_1_var_width').width('100%');//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
		$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
		$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
	</script>
	</div>	
	<div class="v_i_b"></div>

</div>
<?php
NewsBase::$condition_added1=" themepage='".GeneralGetVars::$var2."' ";//условия выборки дополительных объявлений
NewsBase::$condition_added2=" 1 ";//условия выборки дополительных объявлений
?>
</div>

<?php //if (!$cache4->start(GeneralGetVars::$urlview."foot", 'Static')) { ?>

<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px; padding-bottom:20px;"
class="boxShadow3"
>



	<?php
	include("data/components/news/news___3_query_2.php");
	if (GeneralMYSQL::num_rows($res2)<NewsBase::min_additional_news){
		NewsBase::$condition_added1=NewsBase::$condition_added2;//альтернативный поиск, если недостаточно дополнительных олбъявлений записано в БД
		include("data/components/news/news___3_query_2.php");}
        
    $cv1=0;
	while($row2=GeneralMYSQL::fetch_array($res2)) {
	   $cv1++;
       
       
	NewsBase::detect_first_photo($row2['img']);//вычисляем первое фото
	?>
	<table cellpadding="0" cellspacing="0" style="width:50%; float:left; margin-bottom:10px;">
	<tr>
	<td valign="top" width="100" align="left">
			<a href="http://mapstore.org/my_portfolio/tazteam.net/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row2['id']);?>"><?php		
			if ($row2['img']==""){?><img src="http://mapstore.org/my_portfolio/tazteam.net/images/_general/general___photo_none_100x100.jpg" width="100" height="100" class="refimage"><?php }
			else {?><img src="http://140706.selcdn.com/tazteam/_files/images/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row2['id']);?>/<?php echo(NewsBase::return_size_to_photo(NewsBase::$img1_cur,2));?>" width="100" height="100" class="refimage"><?php } 		
			?></a>
	</td>
	<td valign="top" align="left">
		<div  style="width:320px; overflow:hidden;  padding:5px 10px 5px 10px;">
			<a href="http://mapstore.org/my_portfolio/tazteam.net/<?php echo(GeneralGetVars::$var1);?>/<?php echo($row2['id']);?>"  class="link_lead " <?php if ($cv1>5){echo("rel=\"nofollow\"");} ?>><?php echo($row2['name']);?></a>
			<?php /*<div class="v_i_s"></div>
            <noindex><div class="grey"><?php echo($row2['contentnacked']);?>...</div></noindex>*/?>
		</div>
	</td>
	</tr>
	</table>
<?php } ?>
<?php GeneralMYSQL::free($res2); ?>	
</div>
 <?php 
 // Останавливаем буферизацию и пишем буфер в файл
 //$cache4->end(); 
//} ?>

