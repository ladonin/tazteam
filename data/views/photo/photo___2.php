<div style="float: left; overflow:hidden; width:928px; margin-top:20px; padding-top:20px;
padding-left:0px;
padding-right:0px;
"
class="boxShadow3"
>   
<div style="padding-left:20px; padding-right:20px;"><?php include("data/components/_general/breadcrumbs.php"); ?>
<?php 
GeneralPagesCounter::calculate($MSQLc, "photo___topics_".GeneralGetVars::$var2,0,0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2);
GeneralPagesCounter::imagespreload();
if ((GeneralGetVars::$var2!=1)||(GeneralSecurity::detect_administrator()==true)){/*привязка 1 от галереи*/
	include("data/components/_general/panels/panel_topics.php");?>
<div class="v_i_b"></div>
<div id="swim_new_topic" class="swim_panel well">
	<?php
	if (UsersMyData::$identified==1) {//для зарегистрированных пользователей
		?><form method="post" 
		action="<?php echo(GeneralGetVars::$urltosubmit);?>" 
		enctype="multipart/form-data" 
		onsubmit="return general___send_topic_photo('inputnametopictextarea','_1');">
		<input name="submit" value="sendphototopic" type="hidden"><?php
		$current_var1="Новый альбом:";?>
            <div class="lead"><?php echo($current_var1);?></div>
            <textarea maxlength="1000" style="height:100px; width:834px" id="inputnametopictextarea"  name="inputnametopictextarea" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'></textarea>
          
        <?php
		//include("data/components/photo/panels/photo___2_new_topic.php");
		$current_var4="_1";	
		$current_var1="";
		$current_var2="redact";
		$current_var3="Приложить первую фотографию";
		$current_var5="";		
		$current_var6=1;
		$current_var7="swim_new_topic";?>

        
        
        <?php if($current_var2) { ?>
            <div class="v_i_b"></div><div class="lead"><?php echo($current_var3);?>:</div>
        <?php } ?>
        <input type="file" name="img1" style="width:170px;" id="load_photo_img1<?php echo($current_var4);?>">
        <div class="v_i_b"></div>
        <div class="link_lead ">Описание к фото:</div>
        <textarea maxlength="1000" style="height:100px; width:834px" id="inputtexttextarea_1<?php echo($current_var4);?>"  name="inputtexttextarea_1" onselect='savesel(this)' onchange='savesel(this)' onclick='savesel(this)' onfocus='savesel(this)'><?php echo($current_var5);?></textarea>
        <div class="v_i_b"></div>
        
        <?php if ($current_var6==1) {//если разрешено ?>
            <div style="float:left;" class="btn btn-warning btn-small" onclick="general___swim_hide('<?php echo($current_var7);?>');">убрать</div><?php 
        } ?>
        
        <div style="float:left;" class="padding_left_10"><input value="отправить" class="btn btn-success btn-small " type="submit"></div>

    	<div style="clear:both"></div>
        <?php //GeneralImagesPreload::input("images/_general/general___send_submit_hover.png");?>
        <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
        <td align="right" width="50%"> </td>
        <td align="left" width="50%"> </td>
        </tr>
        </table>        
        <?php
    		//include("data/components/_general/panels/work_width_photo_1.php");
    	?>
        </form>
    <?php }	?>

</div>
<?php /*
	<a href="http://mapstore.org/my_portfolio/tazteam.net/photo" class="link_normal">наверх</a>
<div class="v_i_t"></div>*/?>





<?php } ?>
</div>
<div style="padding-left:14px; padding-right:14px;">
<div class="v_i_b"></div>
<?php
include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_query_1.php");
$current_var1=0;
while ($row=GeneralMYSQL::fetch_array($res)){
    $current_var1++;
    ?>

	<table cellpadding="0" cellspacing="0" style="width:25%; float:left; margin-bottom:20px; margin-right: 0px;">
	<tr>
	<td valign="top" align="center">

            <a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."=1"/*.PhotoBase::$current_num_page_photo*/);?>"><img src="http://140706.selcdn.com/tazteam/_files/images/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."/".$row['id_photo']."_5.".$row['format_photo']);?>" width="210" height="210"/></a>
        <?php /*echo(GeneralGetVars::$var2."/".$row['id_topic']."/allphotos=1*/?>
        
        </td>
		</tr> 
		<tr>
		<td align="center">
		<div style="padding:5px 0 0 0;">
				<a href="http://mapstore.org/my_portfolio/tazteam.net/photo/<?php echo(GeneralGetVars::$var2."/".$row['id_topic']."=1"/*.PhotoBase::$current_num_page_photo*/);?>" class="link_lead_small"><?php echo($row['name_topic']);?></a>
				<?php /*if (GeneralGetVars::$var2!=1){//привязка 1 от галереи?>
				<?php <div class="v_i_s"></div>
				<span class="link_lead_topic">Автор: </span> <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($row['id_autor_topic']);?>" class="link_normal"><?php echo(UsersMyData::return_name($row['t_login_user'],$row['t_mail_user'],$row['t_name_user'],$row['t_surname_user'],$row['t_login_status']));?></a>
				<?php } */?>
		</div>
		</td>
		</tr>

</table>
<?php
if ($current_var1%4==0){
    ?>
    <div style="clear:both"></div>
    <?php
    
}


}
GeneralMYSQL::free($res);
?>
<div style="clear:both"></div>
</div>
<div style="padding-left:20px; padding-right:20px;">
<?php 
if (GeneralGetVars::$var2!=1){/*привязка 1 от галереи*/

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
<?php }
}
GeneralPagesCounter::clearvars(); ?>
</div>
</div>