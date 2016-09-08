<?php if (UsersBase::$flag_self_data_enable == 1) { ?>












    <table cellpadding="2" cellspacing="0" width="100%">
      

            
            
            
            
            
            
            
        <?php if (UsersBase::$array_self_data_main_relations_enable == 1) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Семейное положение:
                    </td>
                    <td align="left"  width="350">
            <?php echo(UsersMyData::return_data_relations(UsersBase::$array_self_data_main_relations['gen_relations'], UsersBase::$array_self_data_main_relations['gen_sex'])); ?>

                    </td>
                </tr>
                
                  
                
                
                
            <?php } ?>  
            
            
            

    <?php if (UsersBase::$array_self_data_activity_enable == 1) { ?>



            <tr>
                <td align="left" colspan="2">
                    <div class="v_i_s"></div><span class="lead">Работа:</span>
                </td>
            </tr>





        <?php if (UsersBase::$array_self_data_activity['activity']) { ?>	
                <tr>
                    <td align="left" class="grey">
                        Деятельность:
                    </td>
                    <td align="left" width="350">
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
                <td align="left" colspan="2">
                    <div class="v_i_s"></div><span class="lead">Образование:</span>
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
                        <td align="left" class="grey" valign="top">
                            <b>ВУЗ:</b>
                        </td>
                        <td align="left" width="350">
                <?php echo(UsersBase::$text_gen_universities_name[$key]); ?>
                        </td>
                    </tr>





                <?php if (isset(UsersBase::$text_gen_universities_faculty_name[$key])) {
                    if (UsersBase::$text_gen_universities_faculty_name[$key]) {
                        ?>




                            <tr>
                                <td align="left" class="grey" valign="top">
                                    Факультет:
                                </td>
                                <td align="left" width="350">
                            <?php echo(UsersBase::$text_gen_universities_faculty_name[$key]); ?>
                                </td>
                            </tr>     
                    <?php }
                } ?>

                <?php if (isset(UsersBase::$text_gen_universities_chair_name[$key])) {
                    if (UsersBase::$text_gen_universities_chair_name[$key]) {
                        ?>



                            <tr>
                                <td align="left" class="grey" valign="top">
                                    Кафедра:
                                </td>
                                <td align="left" width="350">
                        <?php echo(UsersBase::$text_gen_universities_chair_name[$key]); ?>
                                </td>
                            </tr>     
                    <?php }
                } ?>	

                <?php if (isset(UsersBase::$text_gen_universities_graduation[$key])) {
                    if (UsersBase::$text_gen_universities_graduation[$key]) {
                        ?>





                            <tr>
                                <td align="left" class="grey" valign="top">
                                    Год окончания:
                                </td>
                                <td align="left" width="350">
                        <?php echo(UsersBase::$text_gen_universities_graduation[$key]); ?>
                                </td>
                            </tr>    


                    <?php }
                } ?>		

                            <?php if (isset(UsersBase::$text_gen_universities_education_form[$key])) {
                                if (UsersBase::$text_gen_universities_education_form[$key]) {
                                    ?>





                            <tr>
                                <td align="left" class="grey" valign="top">
                                    Форма обучения:
                                </td>
                                <td align="left" width="350">
                        <?php echo(UsersBase::$text_gen_universities_education_form[$key]); ?>
                                </td>
                            </tr>    
                                <?php }
                            } ?>		

                <?php if (isset(UsersBase::$text_gen_universities_education_status[$key])) {
                    if (UsersBase::$text_gen_universities_education_status[$key]) {
                        ?>




                            <tr>
                                <td align="left" class="grey" valign="top">
                                    Статус:
                                </td>
                                <td align="left" width="350">
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
                        <td align="left" class="grey" valign="top">
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
                        <td align="left" width="350">
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
                <td align="left" colspan="2">
                    <div class="v_i_s"></div><span class="lead">Личное:</span>
                </td>
            </tr>    

                


            <?php if (UsersBase::$array_self_data_lichnoe['interests']) { ?>




                <tr>
                    <td align="left" valign="top" class="grey">
                        Интересы:
                    </td>
                    <td align="left" width="350">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['interests']); ?></div>
                    </td>
                </tr>  
        <?php } ?>

        <?php if (UsersBase::$array_self_data_lichnoe['books']) { ?>




                <tr>
                    <td align="left" valign="top" class="grey">
                        Любимые книги:
                    </td>
                    <td align="left" width="350">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['books']); ?></div>
                    </td>
                </tr> 
        <?php } ?>	

        <?php if (UsersBase::$array_self_data_lichnoe['games']) { ?>

                <tr>
                    <td align="left" valign="top" class="grey">
                        Любимые игры:
                    </td>
                    <td align="left" width="350">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['games']); ?></div>
                    </td>
                </tr>  
        <?php } ?>	

        <?php if (UsersBase::$array_self_data_lichnoe['movies']) { ?>



                <tr>
                    <td align="left" valign="top" class="grey">
                        Любимые фильмы:
                    </td>
                    <td align="left" width="350">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['movies']); ?></div>
                    </td>
                </tr>  
        <?php } ?>	

        <?php if (UsersBase::$array_self_data_lichnoe['tv']) { ?>


                <tr>
                    <td align="left" valign="top" class="grey">
                        Любимые телепередачи:
                    </td>
                    <td align="left" width="350">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['tv']); ?></div>
                    </td>
                </tr> 
        <?php } ?>	

        <?php if (UsersBase::$array_self_data_lichnoe['about']) { ?>

                <tr>
                    <td align="left" valign="top" class="grey">
                        О себе:
                    </td>
                    <td align="left" width="350">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['about']); ?></div>
                    </td>
                </tr> 

        <?php } ?>

        <?php if (UsersBase::$array_self_data_lichnoe['adddata']) { ?>
                <tr>
                    <td align="left" valign="top" class="grey">
                        Ещё:
                    </td>
                    <td align="left" width="350">
                        <div style="word-wrap:break-word; width:340px;"><?php echo(UsersBase::$array_self_data_lichnoe['adddata']); ?></div>
                    </td>
                </tr> 
                
        <?php } ?>

    <?php } ?>

    </table>
<?php } ?>