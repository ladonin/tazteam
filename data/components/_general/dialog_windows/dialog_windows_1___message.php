<div class="v_i_b"></div>




<table cellpadding="0" cellspacing="0">
<tr>
<td align="left" valign="top">
 
    <?php	
    if ($dialog_windows_1_row['m_id_user']>0) { ?>
	<a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($dialog_windows_1_row['m_id_user']);?>" class="refimage"><img src="<?php 
    echo(UsersBase::return_url_photo($dialog_windows_1_row['m_photo'],$dialog_windows_1_row['m_dir_user']."/".$dialog_windows_1_row['m_id_user']."_2.".$dialog_windows_1_row['m_photo_format'],$dialog_windows_1_row['m_photo_url_from_small'],$dialog_windows_1_row['m_photo_url_from_huge']));?>" width="60" height="60" class="img-var"
    style="border-right:3px solid <?php if (UsersBase::return_online($dialog_windows_1_row['m_timecoming'])){?>#f09007<?php }
    else { ?>#e0e0e0<?php } ?>">
    </a>      
     <?php 
    }
    else { ?>
    <img src="http://140706.selcdn.ru/tazteam/images/users/avas/nophoto_2.png" width="60" height="60"
    style="border-right:3px solid #ffffff" class="img-var"/>           
    <?php }  ?>
    
    
</td>
<td align="left" valign="top">
	<div class="padding_left_10 padding_right_10">
    
        <?php        
         if ($dialog_windows_1_row['m_id_user']>0) { ?>
    		<a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo($dialog_windows_1_row['m_id_user']);?>" class="link_lead_small"><?php
    		UsersBase::$cur_user_name=UsersMyData::return_name($dialog_windows_1_row['m_login_user'],$dialog_windows_1_row['m_mail_user'],$dialog_windows_1_row['m_name_user'],$dialog_windows_1_row['m_surname_user'],$dialog_windows_1_row['m_login_status']);
    		echo(UsersBase::$cur_user_name);
    		?></a><?php	
        }
        else { ?>
            <span class="link_lead_small">Гость</span>            
        <?php }
        

          ?>
		<small><div class="grey" style="display:inline;" id="dw1_date_<?php echo($dialog_windows_1_row['id_message']."_".GeneralInputText::$id);?>"></div></small>
<?php
    		if ((($dialog_windows_1_row['m_id_user']!=UsersMyData::$id)&&(UsersMyData::$identified==1))||((UsersMyData::$identified==0)&&(GeneralDialogWindows::return_privacy(GeneralDialogWindows::$getvar1)==2))){
    		echo("<small onclick=\"general___inputtext_ask('inputtexttextarea".GeneralInputText::$id."','".UsersBase::$cur_user_name."');\" style='cursor:pointer'> <a>обратиться</a></small>");} 
        
          ?>
          
          <div class="v_i_s"></div>
          <div style="word-wrap:break-word;"><?php echo($dialog_windows_1_row['text_message']) ;?></div>
	</div>
	<div style="width:100%" id="dw1_content_parent<?php echo($dialog_windows_1_row['id_message']."_".GeneralInputText::$id);?>"> </div>
    
		<?php /*<div class="v_i_s"></div>
	<div class="padding_left_10" style="word-wrap:break-word;"  id="dw1_content_child<?php echo($dialog_windows_1_row['id_message']."_".GeneralInputText::$id);?>">
		<script type="text/javascript"> dialog_windows_set_width_message('dw1_content_child<?php echo($dialog_windows_1_row['id_message']."_".GeneralInputText::$id);?>');</script>
		<?php echo($dialog_windows_1_row['text_message']) ;?>
	</div>*/?>
	
</td>
</tr>
</table>		
<script type="text/javascript">general___date_DMYvHM_show(<?php echo($dialog_windows_1_row['date_message']);?>,'dw1_date_<?php echo($dialog_windows_1_row['id_message']."_".GeneralInputText::$id);?>');</script>
<div class="v_i_b"></div>