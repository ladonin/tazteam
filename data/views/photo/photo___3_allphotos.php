<div style="float: left; overflow:hidden; width:928px; margin-top:20px; padding-top:20px;
padding-left:0px;
padding-right:0px;
"
class="boxShadow3"
>   
<div style="padding-left:20px; padding-right:20px;"><?php include("data/components/_general/breadcrumbs.php"); ?><?php
GeneralPagesCounter::$rowspage_name="rowspagephoto2";//копия такой страницы - по присваиванию номеров страниц
GeneralPagesCounter::calculate_to_outer($MSQLc, "photo___topics_".GeneralGetVars::$var2,"id_topic>='".GeneralGetVars::$var3."'",0,0,0,0);
GeneralPagesCounter::$rowspage_name="";//стираем
GeneralPagesCounter::calculate($MSQLc, "photo___photos_".GeneralGetVars::$var2,"id_topic='".GeneralGetVars::$var3."'",0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3."/allphotos");
GeneralPagesCounter::imagespreload();
?>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="1%">
		<div class="padding_right_10"><?php echo(GeneralPagesCounter::$htmlarrows); ?></div>
	</td>
	<td align="left" width="99%">
    
    
    <a href="http://instorage.org/portfolio/tazteam/<?php echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2);?>=<?php echo(GeneralPagesCounter::$N_cur_to_outer);?>" class="btn btn-primary btn-small" title="наверх">▲</a> 
    
    
    

	</td>
	</tr>
	</table>	
</td>
<td align="right" valign="middle"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>

<div class="v_i_b"></div>

<div class="lead"><?php echo(GeneralPagetree::$name3);?></div>
</div>




<div style="padding-left:14px; padding-right:14px;">



<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_allphotos_query_1.php");
$cv1=0;
PhotoBase::set_autor_topic(GeneralPageTree::$autor);//задаем id автора темы

while ($row=GeneralMYSQL::fetch_array($res)){
	$cv1++;
	GeneralPagesCounter::$rowspage_name="rowspagephoto3";//копия такой страницы - по присваиванию номеров страниц
	PhotoBase::detect_current_num_page_photo($MSQLc,$row['page_photo'],$row['id_photo'],$row['id_topic'],GeneralGetVars::$var2);
	if ($cv1==1){
		include("data/components/".GeneralGetVars::$var1."/panels/".GeneralGetVars::$var1."___3_new_photo.php");	}	?>

	<table cellpadding="0" cellspacing="0" style="width:25%; float:left; margin-bottom:20px;">
	<tr>
	<td valign="top" align="center"><a href="http://instorage.org/portfolio/tazteam/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."=".PhotoBase::$current_num_page_photo);?>" alt="<?php echo($row['name_photo']);?>"><img src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."/".$row['id_photo']."_5.".$row['format_photo']);?>" width="210" height="210"></a></td>
	</tr>
	</table>		
		
		
		
		
	
<?php
if ($cv1%4==0){
    ?>
    <div style="clear:both"></div>
    <?php
    
}
}
GeneralMYSQL::free($res);
UsersBase::set_points($MSQLc,PhotoBase::$id_autor_topic);//начисляем автору баллы
?>


<div style="clear:both"></div>
</div>


<div style="padding-left:20px; padding-right:20px;">
<?php 
if (GeneralPagesCounter::$N_max>1){ ?>
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
<?php 
}
GeneralPagesCounter::clearvars(); ?>


	<?php 
	if (PhotoBase::detect_belong_topic_to_user()==true){
		?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" onsubmit="return general___swim_prompt('Чтобы удалить тему, введите слово: delete','delete');">
		<input name="submit" value="deletephototopic" type="hidden">
		<input value="удалить альбом" type="submit" class="btn btn-danger btn-small">	
		</form>
		<div class="v_i_b"></div>
		<?php // GeneralImagesPreload::input("images/_general/general___delete_topic_submit_text_11_hover.png"); 
		}
	?>
</div>
</div>


