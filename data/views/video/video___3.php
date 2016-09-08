<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php
GeneralPageBasic::increment_view($MSQLc,"video","id='".GeneralGetVars::$var3."'",0,0,0,0);
GeneralPagesCounter::$rowspage_name="rowspagevideo1";//копия такой страницы - по присваиванию номеров страниц
GeneralPagesCounter::calculate_to_outer($MSQLc, "video","id>='".GeneralGetVars::$var3."'","themepage='".GeneralGetVars::$var2."'",0,0,0);
?>





	<?php
	include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_1.php");
	$row=GeneralMYSQL::fetch_array($res);
	?>
<a href="<?php echo(GeneralGlobalVars::url);?>/<?php echo(GeneralGetVars::$var1);?>=<?php echo(GeneralPagesCounter::$N_cur_to_outer);?>" class="btn btn-primary btn-mini" style="margin-bottom:7px; margin-right:5px;" title="наверх">▲</a>

	<span class="lead"><?php echo($row['video_name']);?></span>
	<div class="v_i_b"></div>
	<?php echo($row['video_code']);
	GeneralMYSQL::free($res); ?>
	<div class="v_i_b"></div>
	<span class="explanation_dark">Просмотров: <?php echo($row['number_views']);?></span>
	<div class="v_i_b"></div>
    
    
    
    
    <div style="width:607px;">
	<?php
	GeneralDialogWindows::$getvar1=GeneralGetVars::$var1;	
	GeneralDialogWindows::$getvar2=GeneralGetVars::$var2;	
	GeneralDialogWindows::$getvar3=GeneralGetVars::$var3;	
	GeneralDialogWindows::$getvar4=GeneralGetVars::$var4;	
	GeneralDialogWindows::$num_page=GeneralGetVars::$num_page;
	GeneralDialogWindows::$signaturing="vi";
	GeneralDialogWindows::$type=1;//2 -  открывающийся чат
	GeneralDialogWindows::$padding_right=0;	
	GeneralDialogWindows::$id_dialog="video_3_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
	GeneralDialogWindows::$database="video___messages";//база данных диалога
	GeneralDialogWindows::$textforpanel="Написать комментарий";
	GeneralDialogWindows::$namedialog="Комментарии";
	GeneralDialogWindows::$condition1="id_video=".GeneralGetVars::$var3;//условие 1 для базы данных
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
		$('#div_dialog_1_var_width').width(100%);//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
		$('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
		$('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
	</script>
    </div>
    
    
    
    
    
    
    
	<div class="v_i_b"></div>
	<div class="v_i_b"></div>
	
	
	<div class="lead">Другое видео из этой темы:</div>
	<div class="v_i_b"></div>	
	
	
	
	
	
<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_query_2.php");
while($row=GeneralMYSQL::fetch_array($res)) {	?>
	<a href="<?php echo(GeneralGlobalVars::url);?>/video/<?php echo($row['themepage']."/".$row['id']);?>" class="link_topic"><?php echo($row['video_name']);?></a>
	<div class="v_i_b"></div>
<?php } 
GeneralMYSQL::free($res); ?>

</div>

