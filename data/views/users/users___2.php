<?php
UsersBase::set_points($MSQLc, GeneralGetVars::$var2); //начисляем ему баллы	
if (UsersMyData::$identified == 1) {
    UsersBase::set_keyedarray_my_friendship_and_heto($MSQLc);
}//теперь я знаю всех своих друзей и тех, к кому я уже подавал заявку
include("data/components/" . GeneralGetVars::$var1 . "/" . GeneralGetVars::$var1 . "___2_query_1.php");
$row = GeneralMYSQL::fetch_array($res);
GeneralMYSQL::free($res);
UsersBase::set_array_self_data($row);
UsersBase::detect_friends_from_text($row['friendship']);
UsersBase::detect_photoalbums($MSQLc, 0, 0); //0 - берем все альбомы
UsersBase::detect_garage($MSQLc); //определяем автомобили в своем гараже
?>


<div style="float: left;  width:313px;">

    <div style="overflow:hidden; width:273px;  margin-top:20px;" class="boxShadow3">
        <div style="padding:10px 0;">
            <p class="lead"><?php echo(UsersMyData::return_name($row['gen_login_user'], $row['site_mail_user'], $row['gen_name_user'], $row['gen_surname_user'], 0)); ?></p>

            <div style="padding-bottom:5px;" class="grey">             
                <?php
                UsersBase::$cur_user_online = UsersBase::return_online($row['gen_timecoming']);
                if (UsersBase::$cur_user_online) {
                    ?><b style="text-decoration:underline; color:#f07007;">Online</b><?php } else if ((1) || (UsersMyData::$id == 1)) {
                    ?>Прошлый визит <span id="timecomming"></span>
                    <script type="text/javascript">general___date_DMYvHM_show(<?php echo($row['gen_timecoming']); ?>, 'timecomming');</script>
                <?php } //$row['gen_timecoming']>(time()-(3600*24*10)) ?>
            </div>



            <img src="<?php echo(UsersBase::return_url_photo($row['gen_photo'], $row['dir_user'] . "/" . $row['id_user'] . "_3." . $row['site_photo_format'], $row['sn_photo_url_from_big'], $row['sn_photo_url_from_huge'])); ?>" width="270" id="users_img_photo_big" <?php /* onclick="swimwin('gallery','users'); users_img_to_gallery(); " */ ?>>

            <div class="v_i_s"></div>

            <?php
            if (UsersMyData::$identified == 1) {

                if (GeneralGetVars::$var2 == UsersMyData::$id) {//если мы на своей странице
                    if ($row['site_mail_user']) {
                        ?>
                        <div style="margin-top:5px;">
                            <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(GeneralGetVars::$var2 . "/redactpassword"); ?>" class="link_normal" alt="Изменить пароль">Изменить пароль</a>
                        </div>
                    <?php } ?>
                    <div style="margin-top:5px;">
                        <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(UsersMyData::$id . "/redactavatar"); ?>" class="link_normal" alt="Изменить фотографию">Изменить фотографию</a>
                    </div>
                    <div style="margin-top:5px;">
                        <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(UsersMyData::$id . "/mythemes"); ?>" class="link_normal" alt="Мои темы">Мои темы</a>
                    </div>
                    <div style="margin-top:5px;">
                        <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(UsersMyData::$id . "/mytalks"); ?>" class="link_normal" alt="Мои обсуждения">Мои обсуждения</a>
                    </div><div style="margin-top:5px;">
                        <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(UsersMyData::$id . "/signatures"); ?>" class="link_normal" alt="Мои обсуждения">Оповещения</a>
                    </div><div style="margin-top:5px;">
                        <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(UsersMyData::$id . "/dialogs=1"); ?>" class="link_normal" alt="Мои диалоги">Диалоги</a>
                    </div>
                    <?php
                } else {//если мы просто - зарегистрированный пользователь 
                }
            }

            if (UsersBase::detect_its_mypage(2) == false) {//если мы не на своей странице
                if (UsersMyData::$identified == 1) {
                    ?>
                    <div style="margin-top:5px;">
                        <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(GeneralGetVars::$var2); ?>/dialogs" class="small_link_noline">
                            <?php echo(UsersBase::$array_buttons_to_userslists[1]); ?>
                        </a>
                    </div>
                    <?php if ((!isset(UsersForreg::$array_my_friends[GeneralGetVars::$var2])) && (!isset(UsersForreg::$array_my_friends_heto[GeneralGetVars::$var2]))) { ?>
                        <div style="margin-top:5px;">
                            <form method="post" action="<?php echo(GeneralGetVars::$urltosubmit); ?>">
                                <input type="hidden" name="submit" value="userstofriends">
                                <input type="hidden" name="who" value="<?php echo($row['id_user']); ?>">
                                <input type="submit" class="btn btn-link btn-small" value="Добавить в друзья">
                            </form>
                            <?php //GeneralImagesPreload::input("images/users/lists/images/users/lists/users___submit_to_friends_text_11_hover.png");  ?>
                        </div>
                    <?php } ?>
                    <?php
                }
            }
            ?>
            <div style="margin-top:5px;">
                <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(GeneralGetVars::$var2 . "/photoalbums=1"); ?>" class="link_normal" alt="Фотоальбомы">Фотоальбомы</a>
            </div><div style="margin-top:5px;">
                <a href="http://mapstore.org/my_portfolio/tazteam.net/users/<?php echo(GeneralGetVars::$var2 . "/friends=1"); ?>" class="link_normal" alt="друзья">Друзья</a>
            </div>
        </div>
    </div>


    <?php if (UsersBase::$garage_enable == 1) { ?>
        <div style="overflow:hidden; width:273px;  margin-top:20px;  padding-bottom:10px;" class="boxShadow3">
            <div style="padding:10px 0;">
                <p class="lead">Ездит на:</p> 
                <?php foreach (UsersBase::$garage_array as $value) { ?>
                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td align="left" width="120" valign="top">
                                <a href="http://mapstore.org/my_portfolio/tazteam.net/garage/<?php echo($value['themepage']); ?>/<?php echo($value['id']); ?>" alt="<?php echo(GarageBase::return_parameters("mark", $value['mark']) . " " . $value['model']); ?>"
                                   ><img src="http://140706.selcdn.ru/tazteam/images/garage/<?php echo($value['id']); ?>/<?php echo($value['img']); ?>" 
                                      width="110"></a>
                            </td>
                            <td align="left" valign="top">
                                <div style="margin-bottom:0px;">
                                    <a href="http://mapstore.org/my_portfolio/tazteam.net/garage/<?php echo($value['themepage']); ?>/<?php echo($value['id']); ?>" 
                                       class="lead " alt="<?php
                                       echo(GarageBase::return_parameters("mark", $value['mark']) . " " . $value['model']);
                                       ?>"><?php
                                           echo(GarageBase::return_parameters("mark", $value['mark']) . " " . $value['model']);
                                           ?>
                                    </a>
                                </div>
                                <?php
                                if ($value['motor_type']) {
                                    echo(GarageBase::return_parameters("motor_type", $value['motor_type']));
                                    ?>
                                    <div></div>
                                    <?php
                                }
                                if ($value['power']) {
                                    echo($value['power'] . " л.с.");
                                    ?>
                                    
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                <?php } ?> </div>
        </div>

    <?php } ?>

</div> 









<div style="float: left; width:615px;">

    <div style="float: left; width:555px; margin-left:20px; padding-top:20px; padding-bottom:20px; margin-top:20px;" class="boxShadow3">



        <?php /*
          UsersBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
          GeneralPagesCounter::$find_query=UsersBase::$find_query;
          GeneralPagesCounter::$rowspage_name="rowspageusers1";//копия такой страницы - по присваиванию номеров страниц
          GeneralPagesCounter::calculate_to_outer($MSQLc, "registrated_users___main_data","id_user>='".GeneralGetVars::$var2."'",0,0,0,0);
          ?>
          <a href="http://mapstore.org/my_portfolio/tazteam.net/users=<?php echo(GeneralPagesCounter::$N_cur_to_outer);?>" class="link_normal">наверх</a>
          <?php */ ?>

        <?php
        if (UsersBase::detect_its_mypage(2) == true) {//если мы на своей странице
            include("data/components/" . GeneralGetVars::$var1 . "/" . GeneralGetVars::$var1 . "___2_top_buttons_to_accounts_sn.php");
        }


        if (UsersBase::detect_its_mypage(1) == true) {//если мы имеем полный доступ к этой странице независимо от того, кто мы
            if (UsersBase::$flag_self_data_enable == 1) {//есть данные
                ?>
                <div class="tabbable"> <!-- Only required for left/right tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#userdata_tab3" data-toggle="tab">Персональные данные</a></li>
                        <li><a href="#userdata_tab1" data-toggle="tab">Анкета</a></li>
                        <li><a href="#userdata_tab2" data-toggle="tab">Редактировать</a></li>
                        <li style="float:right; padding-top:10px;">                      
                            <img src="http://mapstore.org/my_portfolio/tazteam.net/images/_general/moneta2.png" width="12" height="16" style="margin-bottom:2px;"> <b style="color:#000000;"><?php echo($row['site_points']); ?></b>
                        </li> 
                    </ul>
                    <div class="v_i_b"></div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="userdata_tab3">
                            <div><?php include("data/components/users/users___2_self_data_1.php"); ?>
                            </div> </div>
                        <div class="tab-pane" id="userdata_tab1">
                            <div><?php include("data/components/users/users___2_self_data_2.php"); ?>
                            </div> </div>
                        <div class="tab-pane" id="userdata_tab2">
                            <div><?php include("data/components/users/users___2_form_self_data.php"); ?>
                            </div> 
                        </div>
                    </div>
                </div>


                <?php
            } else {//нет данных
                ?>




                <div class="tabbable"> <!-- Only required for left/right tabs -->
                    <ul class="nav nav-tabs">

                        <li class="active"><a href="#userdata_tab2" data-toggle="tab">Заполнить данные о себе</a></li>
                        <li style="float:right; padding-top:10px;">                     
                            <img src="http://mapstore.org/my_portfolio/tazteam.net/images/_general/moneta2.png" width="12" height="16" style="margin-bottom:2px;"> <b style="color:#000000;"><?php echo($row['site_points']); ?></b>
                        </li> 
                    </ul>
                    <div class="v_i_b"></div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="userdata_tab3">
                            <div><?php include("data/components/" . GeneralGetVars::$var1 . "/" . GeneralGetVars::$var1 . "___2_self_data_1.php"); ?>
                            </div> </div>

                    </div>
                </div>








                <div id="swim_form_self_data" class="swim_panel"></div><div id="swim_self_data"></div>


                <?php include("data/components/" . GeneralGetVars::$var1 . "/" . GeneralGetVars::$var1 . "___2_form_self_data.php"); ?>


                <?php
            }
        } else {
            if (UsersBase::$flag_self_data_enable == 1) {//есть данные 
                ?>
                <div class="tabbable"> <!-- Only required for left/right tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#userdata_tab3" data-toggle="tab">Персональные данные</a></li>
                        <li><a href="#userdata_tab1" data-toggle="tab">Анкета</a></li>
                        <li style="float:right; padding-top:10px;">                            
                           <img src="http://mapstore.org/my_portfolio/tazteam.net/images/_general/moneta2.png" width="12" height="16" style="margin-bottom:2px;"> <b style="color:#000000;"><?php echo($row['site_points']); ?></b>
                        </li> 








                    </ul>
                    <div class="v_i_b"></div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="userdata_tab3">
                            <div><?php include("data/components/" . GeneralGetVars::$var1 . "/" . GeneralGetVars::$var1 . "___2_self_data_1.php"); ?>
                            </div> </div>
                        <div class="tab-pane" id="userdata_tab1">
                            <div><?php include("data/components/" . GeneralGetVars::$var1 . "/" . GeneralGetVars::$var1 . "___2_self_data_2.php"); ?>
                            </div> </div>

                    </div>
                </div>


                <?php
            }
        }
        ?>













    </div>














    <?php if (UsersBase::$count_friends > 0) { ?>
        <div style="float: left; width:555px; margin-left:20px; padding-top:20px; padding-bottom:20px; margin-top:20px;" class="boxShadow3">
        <?php
        include("data/components/" . GeneralGetVars::$var1 . "/" . GeneralGetVars::$var1 . "___2_friends.php");
        ?>


        </div> 


<?php } ?>





<?php 
if (UsersBase::$count_photoalbums>0){?>
        <div style="float: left; width:555px; margin-left:20px; padding-top:20px; padding-bottom:20px; margin-top:20px;" class="boxShadow3">

<?php
  include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___2_photoalbums.php");
  ?>
  </div> 

<?php }?>


    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        <div style="float: left; width:555px; margin-left:20px; padding-top:20px; padding-bottom:20px; margin-top:20px;" class="boxShadow3">

    
    
  <?php
  GeneralDialogWindows::$getvar1=GeneralGetVars::$var1;
  GeneralDialogWindows::$getvar2=GeneralGetVars::$var2;
  GeneralDialogWindows::$getvar3=GeneralGetVars::$var3;
  GeneralDialogWindows::$getvar4=GeneralGetVars::$var4;
  GeneralDialogWindows::$num_page=GeneralGetVars::$num_page;
  GeneralDialogWindows::$signaturing="sw";
  GeneralDialogWindows::$idphoto=0;
  GeneralDialogWindows::$type=1;//2 -  открывающийся чат
  GeneralDialogWindows::$padding_right=0;
  GeneralDialogWindows::$id_dialog="users_wall_1";//3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый)
  GeneralDialogWindows::$database="registrated_users___wall";//база данных диалога
  GeneralDialogWindows::$textforpanel="Оставить запись";
  GeneralDialogWindows::$namedialog="Стена";
  GeneralDialogWindows::$condition1="user=".GeneralGetVars::$var2;//условие 1 для базы данных
  GeneralDialogWindows::$valuesnumber=5;//сколько value делаем


  GeneralDialogWindows::$idmessage=2;//где будет номер сообщения
  GeneralDialogWindows::$autor=3;//какую value делаем автором при вставке
  GeneralDialogWindows::$textvalue=5;//где будет текст
  GeneralDialogWindows::$time=4;//какую value делаем временем создания сообщения	при вставке
  GeneralDialogWindows::$value1=GeneralGetVars::$var2;//значение для вставки
  GeneralDialogWindows::$value2="";//значение для вставки
  GeneralDialogWindows::$value3="";//значение для вставки - потом вставим
  GeneralDialogWindows::$value4="";//значение для вставки - потом вставим
  GeneralDialogWindows::$value5="";//значение для вставки - потом вставим
  include("data/components/_general/dialog_windows/dialog_windows_1.php");//сам диалог
  ?>
  <script type="text/javascript">
  $('#div_dialog_1_var_width').width('100%');
  $('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
  $('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
  </script>
    
    
        </div>
    
    
    
    
    
    
    
    
</div>






<div style="clear:both;"></div>




<div style="width:888px; float:left;  margin-top:20px; padding-top:20px;" class="boxShadow3">


  <?php
  include("data/components/".GeneralGetVars::$var1."/panels/".GeneralGetVars::$var1."___2_panel_right.php");
  ?>


</div>



<div style="clear:both;"></div>

