<?php if (UsersBase::$flag_self_data_enable == 1) { ?>

    <table cellpadding="5" cellspacing="0" width="100%">
        <tr>
            <td align="left" colspan="2" bgcolor="#38474e" style="color: #ffffff;">
                Личные данные:
                <?php if (UsersBase::$its_mypage == 1) { ?>
                    <span style="cursor:pointer;" style="color:#ffffff;" onclick="general___swim_show_hide('swim_self_data');
                general___swim_show_hide('swim_form_self_data');">(редактировать)</span>
                <?php } ?>
            </td>
        </tr>

        <?php if (UsersBase::$array_self_data_main_enable == 1) { ?>
            <?php if (UsersBase::$array_self_data_main_borndate_enable == 1) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        День рождения:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <?php echo(UsersBase::$array_self_data_main_borndate['gen_borndate_day'] . " " . GeneralDate::date_month_text_show(UsersBase::$array_self_data_main_borndate['gen_borndate_month']));
                        if (UsersBase::$array_self_data_main_borndate['gen_borndate_year'] > 0) {
                            echo(" " . UsersBase::$array_self_data_main_borndate['gen_borndate_year'] . " г.");
                        }
                        ?>  
                    </td>
                </tr>
        <?php } ?>

        <?php if (UsersBase::$array_self_data_main_relations_enable == 1) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Семейное положение:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
            <?php echo(UsersMyData::return_data_relations(UsersBase::$array_self_data_main_relations['gen_relations'], UsersBase::$array_self_data_main_relations['gen_sex'])); ?>

                    </td>
                </tr>
            <?php } ?>
        <?php if (UsersBase::$array_self_data_main['gen_login_user']) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Логин:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$array_self_data_main['gen_login_user']); ?>
                    </td>
                </tr>
            <?php
            }
        }
        ?>

    <?php if (UsersBase::$array_self_data_contacts_enable == 1) { ?>	

            <tr>
                <td align="center" colspan="2" bgcolor="#ffffff" style="border-bottom:1px solid #f1f1f1; border-left:1px solid #dddddd; border-right:1px solid #dddddd;">
                    <div class="v_i_b"></div><span class="panel_text_dark_small">Контактная информация:</span><div class="v_i_b"></div>
                </td>
            </tr>

        <?php if (UsersBase::$array_self_data_contacts['sn_url_vk']) { ?>	
                <tr>
                    <td align="left" bgcolor="#38474e" style="color:#ffffff; border-bottom:1px solid #f1f1f1;">
                        Страница в VK.com:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <a href="http://vk.com/<?php echo(UsersBase::$array_self_data_contacts['sn_url_vk']); ?>" target="_blank" class="link_normal"><?php echo(UsersBase::$array_self_data_contacts['sn_url_vk']); ?></a>
                    </td>
                </tr>
        <?php } ?>	


        <?php if (UsersBase::$array_self_data_contacts_mail_enable == 1) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Mail:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$array_self_data_contacts_mail['site_mail_user']); ?>
                    </td>
                </tr>
        <?php } ?>		

        <?php if (UsersBase::$array_self_data_contacts['mobile_phone']) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Моб. телефон:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$array_self_data_contacts['mobile_phone']); ?>
                    </td>
                </tr>
            <?php } ?>


        <?php if (UsersBase::$array_self_data_contacts['add_phone']) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Доп. телефон:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$array_self_data_contacts['add_phone']); ?>
                    </td>
                </tr>
            <?php } ?>

        <?php if (UsersBase::$array_self_data_contacts['gen_city_name']) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Город:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$array_self_data_contacts['gen_city_name']); ?>
                    </td>
                </tr>
        <?php } ?>


        <?php if (UsersBase::$array_self_data_contacts['gen_state_name']) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Район:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$array_self_data_contacts['gen_state_name']); ?>
                    </td>
                </tr>
        <?php } ?>


        <?php if (UsersBase::$array_self_data_contacts['gen_region_name']) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Регион:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$array_self_data_contacts['gen_region_name']); ?>
                    </td>
                </tr>
            <?php } ?>	



        <?php if (UsersBase::$array_self_data_contacts['gen_country_name']) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Страна:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$array_self_data_contacts['gen_country_name']); ?>
                    </td>
                </tr>
            <?php } ?>			


    <?php } ?>


    <?php if (UsersBase::$array_self_data_activity_enable == 1) { ?>



            <tr>
                <td align="center" colspan="2" bgcolor="#ffffff" style="border-bottom:1px solid #f1f1f1; border-left:1px solid #dddddd; border-right:1px solid #dddddd;">
                    <div class="v_i_b"></div><span class="panel_text_dark_small">Работа:</span><div class="v_i_b"></div>
                </td>
            </tr>


        <?php if (UsersBase::$array_self_data_activity['activity']) { ?>	
                <tr>
                    <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Деятельность:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$array_self_data_activity['activity']); ?>
                    </td>
                </tr>
            <?php } ?>	



    <?php } ?>	



    <?php
//if ((UsersBase::$array_self_data_universities_enable==1)||(UsersBase::$array_self_data_schools_enable==1))
    if ((UsersBase::$array_self_data_universities['gen_universities_name']) || (UsersBase::$array_self_data_schools['gen_schools_name'])) {
        ?>




            <tr>
                <td align="center" colspan="2" bgcolor="#ffffff" style="border-bottom:1px solid #f1f1f1; border-left:1px solid #dddddd; border-right:1px solid #dddddd;">
                    <div class="v_i_b"></div><span class="panel_text_dark_small">Образование:</span><div class="v_i_b"></div>
                </td>
            </tr>


            <?php
            if ((UsersBase::$array_self_data_universities_enable == 1) && (UsersBase::$array_self_data_universities['gen_universities_name'])) {

                UsersBase::$text_gen_universities_name = explode("  ", UsersBase::$array_self_data_universities['gen_universities_name']);
                UsersBase::$text_gen_universities_faculty_name = explode("  ", UsersBase::$array_self_data_universities['gen_universities_faculty_name']);
                UsersBase::$text_gen_universities_chair_name = explode("  ", UsersBase::$array_self_data_universities['gen_universities_chair_name']);
                UsersBase::$text_gen_universities_graduation = explode("  ", UsersBase::$array_self_data_universities['gen_universities_graduation']);
                UsersBase::$text_gen_universities_education_form = explode("  ", UsersBase::$array_self_data_universities['gen_universities_education_form']);
                UsersBase::$text_gen_universities_education_status = explode("  ", UsersBase::$array_self_data_universities['gen_universities_education_status']);

                foreach (UsersBase::$text_gen_universities_name as $key => $value) {
                    ?>


                    <tr>
                        <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                            <b>ВУЗ:</b>
                        </td>
                        <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                <?php echo(UsersBase::$text_gen_universities_name[$key]); ?>
                        </td>
                    </tr>


                <?php if (isset(UsersBase::$text_gen_universities_faculty_name[$key])) {
                    if (UsersBase::$text_gen_universities_faculty_name[$key]) {
                        ?>

                            <tr>
                                <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                                    Факультет:
                                </td>
                                <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                            <?php echo(UsersBase::$text_gen_universities_faculty_name[$key]); ?>
                                </td>
                            </tr>            

                    <?php }
                } ?>

                <?php if (isset(UsersBase::$text_gen_universities_chair_name[$key])) {
                    if (UsersBase::$text_gen_universities_chair_name[$key]) {
                        ?>


                            <tr>
                                <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                                    Кафедра:
                                </td>
                                <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <?php echo(UsersBase::$text_gen_universities_chair_name[$key]); ?>
                                </td>
                            </tr>            

                    <?php }
                } ?>	

                <?php if (isset(UsersBase::$text_gen_universities_graduation[$key])) {
                    if (UsersBase::$text_gen_universities_graduation[$key]) {
                        ?>

                            <tr>
                                <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                                    Год окончания:
                                </td>
                                <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <?php echo(UsersBase::$text_gen_universities_graduation[$key]); ?>
                                </td>
                            </tr>             



                    <?php }
                } ?>		

                            <?php if (isset(UsersBase::$text_gen_universities_education_form[$key])) {
                                if (UsersBase::$text_gen_universities_education_form[$key]) {
                                    ?>

                            <tr>
                                <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                                    Форма обучения:
                                </td>
                                <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <?php echo(UsersBase::$text_gen_universities_education_form[$key]); ?>
                                </td>
                            </tr>             

                                <?php }
                            } ?>		

                <?php if (isset(UsersBase::$text_gen_universities_education_status[$key])) {
                    if (UsersBase::$text_gen_universities_education_status[$key]) {
                        ?>

                            <tr>
                                <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                                    Статус:
                                </td>
                                <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                            <?php echo(UsersBase::$text_gen_universities_education_status[$key]); ?>
                                </td>
                            </tr>

                        <?php }
                    }
                    ?>

                    <?php }
                ?>

            <?php
            }


            if ((UsersBase::$array_self_data_schools_enable == 1) && (UsersBase::$array_self_data_schools['gen_schools_name'])) {

                UsersBase::$text_gen_schools_name = explode("  ", UsersBase::$array_self_data_schools['gen_schools_name']);
                UsersBase::$text_site_cityschool = explode("  ", UsersBase::$array_self_data_schools['site_cityschool']);
                UsersBase::$text_site_oblastschool = explode("  ", UsersBase::$array_self_data_schools['site_oblastschool']);
                UsersBase::$text_gen_schools_year_from = explode("  ", UsersBase::$array_self_data_schools['gen_schools_year_from']);
                UsersBase::$text_gen_schools_year_to = explode("  ", UsersBase::$array_self_data_schools['gen_schools_year_to']);
                //UsersBase::$text_gen_schools_year_graduated=	explode("  ",UsersBase::$array_self_data_schools['gen_schools_year_graduated']);
                UsersBase::$text_gen_schools_class = explode("  ", UsersBase::$array_self_data_schools['gen_schools_class']);
                UsersBase::$text_gen_schools_speciality = explode("  ", UsersBase::$array_self_data_schools['gen_schools_speciality']);
                UsersBase::$text_site_nametypeschool = explode("  ", UsersBase::$array_self_data_schools['site_nametypeschool']);

                foreach (UsersBase::$text_gen_schools_name as $key => $value) {
                    ?>

                    <tr>
                        <td align="left" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                            <b><?php
                            if (isset(UsersBase::$text_site_nametypeschool[$key])) {
                                if (UsersBase::$text_site_nametypeschool[$key]) {
                                    echo(UsersBase::$text_site_nametypeschool[$key]);
                                } else {
                                    echo("Школа:");
                                }
                            } else {
                                echo("Школа:");
                            }
                            ?></b>
                        </td>
                        <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                            <?php
                            echo(UsersBase::$text_gen_schools_name[$key]);

                            if (isset(UsersBase::$text_site_cityschool[$key])) {
                                if (UsersBase::$text_site_cityschool[$key]) {
                                    echo(", " . UsersBase::$text_site_cityschool[$key]);
                                }
                            }

                            if (isset(UsersBase::$text_site_oblastschool[$key])) {
                                if (UsersBase::$text_site_oblastschool[$key]) {
                                    echo(", " . UsersBase::$text_site_oblastschool[$key]);
                                }
                            }

                            if ((isset(UsersBase::$text_gen_schools_year_from[$key])) && (isset(UsersBase::$text_gen_schools_year_to[$key]))) {
                                if ((UsersBase::$text_gen_schools_year_from[$key]) && (UsersBase::$text_gen_schools_year_to[$key])) {
                                    echo(", " . UsersBase::$text_gen_schools_year_from[$key] . "-" . UsersBase::$text_gen_schools_year_to[$key]);
                                }
                            }

                            if (isset(UsersBase::$text_gen_schools_class[$key])) {
                                if (UsersBase::$text_gen_schools_class[$key]) {
                                    echo(" (" . UsersBase::$text_gen_schools_class[$key] . ")");
                                }
                            }

                            if (isset(UsersBase::$text_gen_schools_speciality[$key])) {
                                if (UsersBase::$text_gen_schools_speciality[$key]) {
                                    echo("<div class=\"v_i_s\"></div>" . UsersBase::$text_gen_schools_speciality[$key]);
                                }
                            }
                            ?>
                        </td>
                    </tr>        

            <?php } ?>

            <?php }
        } ?>


    <?php if (UsersBase::$array_self_data_lichnoe_enable == 1) { ?>

            <tr>
                <td align="center" colspan="2" bgcolor="#ffffff" style="border-bottom:1px solid #f1f1f1; border-left:1px solid #dddddd; border-right:1px solid #dddddd;">
                    <div class="v_i_b"></div><span class="panel_text_dark_small">Личное:</span><div class="v_i_b"></div>
                </td>
            </tr>    

            <?php if (UsersBase::$array_self_data_lichnoe['interests']) { ?>

                <tr>
                    <td align="left" valign="top" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Интересы:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['interests']); ?></div>
                    </td>
                </tr>   

        <?php } ?>

        <?php if (UsersBase::$array_self_data_lichnoe['books']) { ?>

                <tr>
                    <td align="left" valign="top" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Любимые книги:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['books']); ?></div>
                    </td>
                </tr> 

        <?php } ?>	

        <?php if (UsersBase::$array_self_data_lichnoe['games']) { ?>

                <tr>
                    <td align="left" valign="top" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Любимые игры:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['games']); ?></div>
                    </td>
                </tr>   

        <?php } ?>	

        <?php if (UsersBase::$array_self_data_lichnoe['movies']) { ?>



                <tr>
                    <td align="left" valign="top" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Любимые фильмы:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['movies']); ?></div>
                    </td>
                </tr>  

        <?php } ?>	

        <?php if (UsersBase::$array_self_data_lichnoe['tv']) { ?>


                <tr>
                    <td align="left" valign="top" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Любимые телепередачи:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['tv']); ?></div>
                    </td>
                </tr> 

        <?php } ?>	

        <?php if (UsersBase::$array_self_data_lichnoe['about']) { ?>

                <tr>
                    <td align="left" valign="top" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        О себе:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['about']); ?></div>
                    </td>
                </tr> 


        <?php } ?>

        <?php if (UsersBase::$array_self_data_lichnoe['adddata']) { ?>
                <tr>
                    <td align="left" valign="top" bgcolor="#dddddd" style="border-bottom:1px solid #f1f1f1;">
                        Ещё:
                    </td>
                    <td align="left" width="350" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;  border-right:1px solid #dddddd; border-left:1px solid #dddddd;">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['adddata']); ?></div>
                    </td>
                </tr> 

        <?php } ?>

    <?php } ?>

    </table><div class="v_i_b"></div>
<?php } ?>