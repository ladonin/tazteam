<?php 
ForumBase::convert_cookie_find_query($MSQLc);


if (ForumBase::$find_status==1) {
    ?>
    <div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>

<?php
    
  
    
       include("data/components/forum/panels/forum___2_panel_top.php"); 
    
    
    ?>
<div class="well">







    <table cellpadding="0" cellspacing="0" width="100%" style="border-bottom:1px solid #bbbbbb;">
<tr>
<td align="left" style="padding-bottom:5px;"><span class="link_lead_small">Тема</span></td>
<td align="center" width="120" style="padding-bottom:5px;"><span class="link_lead_small">Сообщений</span></td>
<td align="right" width="120" style="padding-bottom:5px;"><span class="link_lead_small">Просмотров</span></td>
</tr>
</table>
    
    <?php
   
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_2.php");
while ($row=GeneralMYSQL::fetch_array($res)) { ?>
<div class="v_i_b"></div>
<div class="v_i_b"></div>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" valign="top">	<a target="_blank" href="http://instorage.org/portfolio/tazteam/forum/<?php echo($row['id_section']."/".$row['id_topic']);?>=1" class="link_lead"><?php echo($row['name_topic']);?></a>
</td>
<td align="center" width="120" valign="middle"><span class="link-carcas"><?php echo($row['number_messages']);?></span></td>
<td align="right" width="120" valign="middle"><span class="link-carcas"><?php echo($row['number_views']);?></span></td>

</tr>
</table>


<div class="v_i_b"></div>
<div class="v_i_b"></div>

<div class="grey_line_1"></div>



<?php } GeneralMYSQL::free($res);?>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
    
    
    
    
    
    
    </div>
    </div><?php 
    
}
else {












GeneralPagesCounter::calculate($MSQLc, "forum___topics_".GeneralGetVars::$var2,0,0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2);
GeneralPagesCounter::imagespreload();?>

<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>

   <?php include("data/components/_general/breadcrumbs.php"); 
   
   
   
   
   include("data/components/forum/panels/forum___2_panel_top.php"); 
   
   
   
   
   
   
                  
   ?>
























<div class="well">
<table cellpadding="0" cellspacing="0" width="100%" style="border-bottom:1px solid #bbbbbb;">
<tr>
<td align="left" style="padding-bottom:5px;"><span class="link_lead_small">Тема</span></td>
<td align="center" width="120" style="padding-bottom:5px;"><span class="link_lead_small">Сообщений</span></td>
<td align="center" width="120" style="padding-bottom:5px;"><span class="link_lead_small">Просмотров</span></td>
<td align="right" width="190" style="padding-bottom:5px;"><span class="link_lead_small">Последнее сообщение</span></td>
</tr>
</table>











<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_1.php");
while ($row=GeneralMYSQL::fetch_array($res)) { ?>
<div class="v_i_b"></div>
<div class="v_i_b"></div>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" valign="top">	<a href="http://instorage.org/portfolio/tazteam/forum/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']);?>=1" class="link_lead"><?php echo($row['name_topic']);?></a>
	<div class="v_i_b"></div>
	<span class="link-carcas grey">Автор: </span> <a href="http://instorage.org/portfolio/tazteam/users/<?php echo($row['id_autor_topic']);?>" class="link-carcas black"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
</td>
<td align="center" width="120" valign="middle"><span class="link-carcas"><?php echo($row['number_messages']);?></span></td>
<td align="center" width="120" valign="middle"><span class="link-carcas"><?php echo($row['number_views']);?></span></td>
<td align="right" width="190" valign="top">
	<a href="http://instorage.org/portfolio/tazteam/users/<?php echo($row['id_autor_last_message']);?>" class="link_normal black"><?php echo(UsersMyData::return_name($row['lm_login_user'],$row['lm_mail_user'],$row['lm_name_user'],$row['lm_surname_user'],$row['lm_login_status']));?></a>
	<div class="v_i_b"></div>
	<span class="grey" id="forum_2_<?php echo($row['id_topic']);?>"></span>
	<script type="text/javascript">general___date_DMYvHM_show(<?php echo($row['date_last_message']);?>,'forum_2_<?php echo($row['id_topic']);?>');</script>
</td>
</tr>
</table>


<div class="v_i_b"></div>
<div class="v_i_b"></div>

<div class="grey_line_1"></div>



<?php } GeneralMYSQL::free($res);?>
</div>
<div class="v_i_b"></div>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
	<?php echo(GeneralPagesCounter::$htmlarrows); ?>
</td>
<td align="right" valign="middle">
	<?php echo(GeneralPagesCounter::$htmlcode); ?>
</td>
</tr>
</table>



<div class="v_i_b"></div>
	
<div class="v_i_b"></div>






	<?php
	GeneralDialogWindows::$getvar1=GeneralGetVars::$var1;	
	GeneralDialogWindows::$getvar2=GeneralGetVars::$var2;	
	GeneralDialogWindows::$getvar3=GeneralGetVars::$var3;	
	GeneralDialogWindows::$getvar4=GeneralGetVars::$var4;	
	GeneralDialogWindows::$num_page=GeneralGetVars::$num_page;
	GeneralDialogWindows::$signaturing="ft";
	GeneralDialogWindows::$type=1;//4 - вытягивается по высоте экрана и предварительно скрытый
	GeneralDialogWindows::$padding_right=0;	
	GeneralDialogWindows::$id_dialog="forum___messages_general2_2_1";//2 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
	GeneralDialogWindows::$database="forum___messages_general2";//база данных диалога
	GeneralDialogWindows::$textforpanel="Написать";
	GeneralDialogWindows::$namedialog="Живой чат";
	GeneralDialogWindows::$condition1="id_section=".GeneralGetVars::$var2;//условие 1 для базы данных
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





















	
<div class="v_i_b"></div>


<?php GeneralPagesCounter::clearvars(); ?>
</div>
<?php } ?>