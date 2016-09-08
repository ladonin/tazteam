<?php if (UsersBase::$flag_self_data_enable == 1) { ?>












    <table cellpadding="2" cellspacing="0" width="100%">
        <?php if (UsersBase::$array_self_data_main_enable == 1) { ?>

            <?php if (UsersBase::$array_self_data_main_borndate_enable == 1) { ?>	
                <tr>
                    <td align="left" class="grey">
                        День рождения:
                    </td>
                    <td align="left"  width="350">
                        <?php echo(UsersBase::$array_self_data_main_borndate['gen_borndate_day'] . " " . GeneralDate::date_month_text_show(UsersBase::$array_self_data_main_borndate['gen_borndate_month']));
                        if (UsersBase::$array_self_data_main_borndate['gen_borndate_year'] > 0) {
                            echo(" " . UsersBase::$array_self_data_main_borndate['gen_borndate_year'] . " г.");
                        }
                        ?>  
                    </td>
                </tr>   
        <?php } ?>






        <?php if (UsersBase::$array_self_data_main['gen_login_user']) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Логин:
                    </td>
                    <td align="left"  width="350">
                <?php echo(UsersBase::$array_self_data_main['gen_login_user']); ?>
                    </td>
                </tr>     
            <?php
            }
        }
        ?>







    <?php if (UsersBase::$array_self_data_contacts_enable == 1) { ?>	

            <tr>
                <td align="left" colspan="2">
                    <div class="v_i_s"></div><span  class="lead">Контактная информация:</span>
                </td>
            </tr>

               




        <?php if (UsersBase::$array_self_data_contacts['sn_url_vk']) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Страница в VK.com:
                    </td>
                    <td align="left"  width="350">
                        <a href="http://vk.com/<?php echo(UsersBase::$array_self_data_contacts['sn_url_vk']); ?>" target="_blank" class="blue"><?php echo(UsersBase::$array_self_data_contacts['sn_url_vk']); ?></a>
                    </td>
                </tr>   
        <?php } ?>	





        <?php if (UsersBase::$array_self_data_contacts_mail_enable == 1) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Mail:
                    </td>
                    <td align="left"  width="350">
                <?php echo(UsersBase::$array_self_data_contacts_mail['site_mail_user']); ?>
                    </td>
                </tr>    
        <?php } ?>		




        <?php if (UsersBase::$array_self_data_contacts['mobile_phone']) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Моб. телефон:
                    </td>
                    <td align="left"  width="350">
                <?php echo(UsersBase::$array_self_data_contacts['mobile_phone']); ?>
                    </td>
                </tr>   
            <?php } ?>


        <?php if (UsersBase::$array_self_data_contacts['add_phone']) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Доп. телефон:
                    </td>
                    <td align="left"  width="350">
                <?php echo(UsersBase::$array_self_data_contacts['add_phone']); ?>
                    </td>
                </tr>  
            <?php } ?>



        <?php if (UsersBase::$array_self_data_contacts['gen_country_name']) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Страна:
                    </td>
                    <td align="left"  width="350">
                <?php echo(UsersBase::$array_self_data_contacts['gen_country_name']); ?>
                    </td>
                </tr> 
            <?php } ?>
            
        <?php if (UsersBase::$array_self_data_contacts['gen_region_name']) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Регион:
                    </td>
                    <td align="left"  width="350">
                <?php echo(UsersBase::$array_self_data_contacts['gen_region_name']); ?>
                    </td>
                </tr>
            <?php } ?>      
            
            
            
            
            
        <?php if (UsersBase::$array_self_data_contacts['gen_state_name']) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Район:
                    </td>
                    <td align="left"  width="350">
                <?php echo(UsersBase::$array_self_data_contacts['gen_state_name']); ?>
                    </td>
                </tr> 
        <?php } ?> 
            
            
            
            
            









        <?php if (UsersBase::$array_self_data_contacts['gen_city_name']) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Город:
                    </td>
                    <td align="left"  width="350">
                <?php echo(UsersBase::$array_self_data_contacts['gen_city_name']); ?>
                    </td>
                </tr> 
        <?php } ?>













	



			


    <?php } ?>

    </table>
<?php } ?>