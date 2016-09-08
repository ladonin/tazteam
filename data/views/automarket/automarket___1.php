<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
     class="boxShadow3"
     >
         <?php
         include("data/components/_general/breadcrumbs.php");
         AutomarketBase::set_sort(); //вычисляем - кого будем выбирать, тазы, запчасти, другие машины, покупателей
         AutomarketBase::convert_cookie_find_query($MSQLc); //если есть поиск, то запрос перезапишется в этой функции
         GeneralPagesCounter::$find_query = AutomarketBase::$find_query;
         GeneralPagesCounter::calculate($MSQLc, "automarket", 0, 0, 0, 0, 0, GeneralGetVars::$var1);
         GeneralPagesCounter::imagespreload();
         AutomarketBase::detect_order_by($MSQLc);
         include("data/components/automarket/panels/automarket___1_panel_top.php");
         include("data/components/automarket/automarket___1_query_1.php");
         ?>

    <table cellpadding="0" cellspacing="0" style="width:100%;">
        <tr>
            <td valign="top" align="left">

                <?php if ((AutomarketBase::$sort_by == 1) || (AutomarketBase::$sort_by == 2)) { ?>

                <table cellpadding="0" cellspacing="0" width="100%" style="color:#333333; background-color:#e5e5e5;">
                        <tr>
                            <td align="left" valign="top">
                                <div style="width:10px; overflow:hidden;">

                                </div>
                            </td>
                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="width:193px; overflow:hidden;  padding:0px;">


                                    <div style="padding-left:21px;">
                                        <form method="post" action="<?php echo(GeneralGetVars::$urltosubmit); ?>">
                                            <input type="hidden" name="submit" value="automarket_order_by_date"/>
                                            <input type="submit" value="объявление<?php if (AutomarketBase::$order_id == 10) { ?> &#9650;<?php } else if ((AutomarketBase::$order_id == 11) || (AutomarketBase::$order_id == 1)) {
                    ?> &#9660;<?php }
                    ?>" class="btn btn-link btn-small"/>
                                        </form>
                                    </div>

                                </div>

                                <div class="v_i_s"></div>

                            </td>
                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="width:100px; overflow:hidden;  padding:0px 10px;">

                                    <form method="post" action="<?php echo(GeneralGetVars::$urltosubmit); ?>">
                                        <input type="hidden" name="submit" value="automarket_order_by_price"/>
                                        <input type="submit" value="цена<?php if (AutomarketBase::$order_id == 2) { ?> &#9650;<?php } else if (AutomarketBase::$order_id == 3) {
                                                   ?> &#9660;<?php }
                    ?>" class="btn btn-link btn-small"/>
                                    </form>

                                </div><div class="v_i_s"></div>
                            </td>

                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="padding:0px 10px;">
                                    <div style="width:200px; overflow:hidden;">
                                        фото
                                    </div>

                                </div><div class="v_i_s"></div>
                            </td>
                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="width:40px; overflow:hidden;  padding:0px 10px;">

                                    <form method="post" action="<?php echo(GeneralGetVars::$urltosubmit); ?>">
                                        <input type="hidden" name="submit" value="automarket_order_by_year"/>
                                        <input type="submit" value="год<?php if (AutomarketBase::$order_id == 4) { ?> &#9650;<?php } else if (AutomarketBase::$order_id == 5) {
                                               ?> &#9660;<?php }
                                           ?>" class="btn btn-link btn-small"/>
                                    </form>
                                </div><div class="v_i_s"></div>
                            </td>

                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="width:70px; overflow:hidden;  padding:0px 10px;">

                                    <form method="post" action="<?php echo(GeneralGetVars::$urltosubmit); ?>">
                                        <input type="hidden" name="submit" value="automarket_order_by_run"/>
                                        <input type="submit" value="пробег<?php if (AutomarketBase::$order_id == 6) { ?> &#9650;<?php } else if (AutomarketBase::$order_id == 7) {
                                               ?> &#9660;<?php }
                                           ?>" class="btn btn-link btn-small"/>
                                    </form>
                                </div><div class="v_i_s"></div>
                            </td>

                            <td align="left" valign="top">
                                <div class="v_i_s"></div>
                                <div style="width:165px; overflow:hidden;  padding:0px 10px;">
                                    город продавца
                                </div>
                                <div class="v_i_s"></div>
                            </td>

                            <td align="left" valign="top">
                                <div style="width:10px; overflow:hidden;">

                                </div>
                            </td>

                        </tr>
                    </table> 
<?php } else if (AutomarketBase::$sort_by == 3) {
    ?>

                    <table cellpadding="0" cellspacing="0" width="100%" style="color:#333333; background-color:#e5e5e5;">
                        <tr>
                            <td align="left" valign="top">
                                <div style="width:10px; overflow:hidden;">
                                </div>
                            </td>
                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="width:290px; overflow:hidden;  padding:0px;">
                                    <div style="padding-left:21px;">
                                        <form method="post" action="<?php echo(GeneralGetVars::$urltosubmit); ?>">
                                            <input type="hidden" name="submit" value="automarket_order_by_date"/>
                                            <input type="submit" value="объявление<?php if (AutomarketBase::$order_id == 10) { ?> &#9650;<?php } else if ((AutomarketBase::$order_id == 11) || (AutomarketBase::$order_id == 1)) {
        ?> &#9660;<?php }
    ?>" class="btn btn-link btn-small"/>
                                        </form>
                                    </div>
                                </div><div class="v_i_s"></div>
                            </td>
                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="width:100px; overflow:hidden; padding:0px 10px;">
                                    <form method="post" action="<?php echo(GeneralGetVars::$urltosubmit); ?>">
                                        <input type="hidden" name="submit" value="automarket_order_by_price"/>
                                        <input type="submit" value="цена<?php if (AutomarketBase::$order_id == 2) { ?> &#9650;<?php } else if (AutomarketBase::$order_id == 3) {
        ?> &#9660;<?php }
    ?>" class="btn btn-link btn-small"/>
                                    </form>
                                </div><div class="v_i_s"></div>
                            </td>
                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="padding:0px 10px;">
                                    <div style="width:210px; overflow:hidden;">
                                        фото
                                    </div>
                                </div><div class="v_i_s"></div>
                            </td>
                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="width:200px; overflow:hidden;  padding:0px 10px;">
                                    город продавца
                                </div><div class="v_i_s"></div>
                            </td>
                            <td align="left" valign="top">
                                <div style="width:10px; overflow:hidden;">
                                </div>
                            </td>
                        </tr>
                    </table> 


<?php } else if (AutomarketBase::$sort_by == 4) {
    ?>

                    <table cellpadding="0" cellspacing="0" width="100%" style="color:#333333; background-color:#e5e5e5;">
                        <tr>
                            <td align="left" valign="top">
                                <div style="width:10px; overflow:hidden;">
                                </div>
                            </td>
                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="width:535px; overflow:hidden;  padding:0px;">
                                    <div style="padding-left:20px;">
                                        <form method="post" action="<?php echo(GeneralGetVars::$urltosubmit); ?>">
                                            <input type="hidden" name="submit" value="automarket_order_by_date"/>
                                            <input type="submit" value="объявление<?php if (AutomarketBase::$order_id == 10) { ?> &#9650;<?php } else if ((AutomarketBase::$order_id == 11) || (AutomarketBase::$order_id == 1)) {
        ?> &#9660;<?php }
    ?>" class="btn btn-link btn-small"/>
                                        </form>
                                    </div></div><div class="v_i_s"></div>
                            </td>

                            <td align="left" valign="top"><div class="v_i_s"></div>
                                <div style="width:200px; overflow:hidden;  padding:0px 10px;">
                                    город продавца
                                </div><div class="v_i_s"></div>
                            </td>
                            <td align="left" valign="top">
                                <div style="width:10px; overflow:hidden;">
                                </div>
                            </td>
                        </tr>
                    </table> 

<?php }
?>

                <div class="v_i_b"></div>
                <div class="padding_left_10 padding_right_10">

<?php
while ($row = GeneralMYSQL::fetch_array($res)) {
    AutomarketBase::$announcements_enable = 1;
    AutomarketBase::detect_first_photo($row['img']); //вычисляем первое фото
    ?>

                    <?php if ($row['themepage'] == 1) { ?>

                            <div class="well">
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="width:171px; overflow:hidden;  padding:0px;">
                                                <a href="<?php echo(GeneralGlobalVars::url);?>/automarket/<?php echo($row['themepage'] . "/" . $row['id']); ?>" class="lead"><?php echo(AutomarketBase::return_parameters("mark", $row['mark']) . " ");
                    echo($row['model']); ?></a>
                                            </div>

                            <?php if (GeneralSecurity::detect_administrator() == true) { ?>				
                                                <div class="v_i_s"></div>
                                                просмотров: <b><?php echo($row['number_views']); ?></b><?php }
                ?>    
                                        </td>
                                        <td align="left" valign="top">
                                            <div style="width:110px; overflow:hidden; padding-left:10px; padding-top:5px;">
                                                <span class="red"><?php echo($row['price']); ?> руб.</span>    
                                            </div>
                                        </td>

                                        <td align="left" valign="top">
                                            <div style="padding-left:10px;">
                                                <a href="<?php echo(GeneralGlobalVars::url);?>/automarket/<?php echo($row['themepage'] . "/" . $row['id']); ?>"><?php if ($row['img'] == "") { ?><img src="<?php echo(GeneralGlobalVars::url);?>/images/_general/general___photo_none_210x160.png" width="210" height="160" class="refimage"/><?php } else {
                    ?><img src="http://140706.selcdn.ru/tazteam/images/automarket/<?php echo($row['id']); ?>/<?php echo(AutomarketBase::return_size_to_photo(AutomarketBase::$img1_cur, 5)); ?>" width="210" height="160" class="refimage"><?php }
                            ?></a>
                                            </div>
                                        </td>
                                        <td align="left" valign="top">
                                            <div style="width:50px; overflow:hidden;  padding-left:10px; padding-top:5px;">
        <?php if ($row['year_production']) { ?>
                                                    <span class="grey"><?php echo($row['year_production']); ?> г.</span>
        <?php } ?>  
                                            </div>
                                        </td>


                                        <td align="left" valign="top">
                                            <div style="width:80px; overflow:hidden;  padding-left:10px; padding-top:5px;">
        <?php if ($row['run']) { ?>
                                                    <span class="grey"><?php echo($row['run']); ?> км</span>
        <?php } ?> 
                                            </div>
                                        </td>

                                        <td align="left" valign="top">
                                            <div style="width:145px; overflow:hidden;  padding:0px 10px; padding-top:5px;">
        <?php if ($row['city']) { ?><?php echo($row['city']); ?>
                                                    <div class="v_i_s"></div>
            <?php echo($row['region']); ?>
        <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table> 
                            </div>
    <?php } else if (AutomarketBase::$sort_by == 3) {
        ?>
                            <div class="well">
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="left" valign="top">
                                            <div style="width:268px; overflow:hidden;  padding:5px 0px;">
                                                <a href="<?php echo(GeneralGlobalVars::url);?>/automarket/<?php echo($row['themepage'] . "/" . $row['id']); ?>" class="link_lead_big"><?php echo($row['name']); ?></a>
                                            </div>
                                        </td>

                                        <td align="left" valign="top">
                                            <div style="width:100px; overflow:hidden;  padding:7px 10px;">
                                                <span class="red"><?php echo($row['price']); ?> руб.</span>    
                                            </div>
                                        </td>

                                        <td align="left" valign="top">
                                            <div style="padding:0px 10px;">
                                                <a href="<?php echo(GeneralGlobalVars::url);?>/automarket/<?php echo($row['themepage'] . "/" . $row['id']); ?>"><?php if ($row['img'] == "") { ?><img src="<?php echo(GeneralGlobalVars::url);?>/images/_general/general___photo_none_210x160.png" width="210" height="160" class="refimage"/><?php } else {
                        ?><img src="http://140706.selcdn.ru/tazteam/images/automarket/<?php echo($row['id']); ?>/<?php echo(AutomarketBase::return_size_to_photo(AutomarketBase::$img1_cur, 5)); ?>" width="210" height="160" class="refimage"/><?php }
                    ?></a>
                                            </div>
                                        </td>

                                        <td align="left" valign="top">
                                            <div style="width:180px; overflow:hidden;  padding:7px 10px;">
        <?php if ($row['city']) { ?><?php echo($row['city']); ?>
                                                    <div class="v_i_s"></div>
            <?php echo($row['region']); ?>
        <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                                                <?php } else if (AutomarketBase::$sort_by == 4) {
                                                    ?>
                            <div class="well">
                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="left" valign="top"><div class="v_i_s"></div>
                                            <div style="width:558px; overflow:hidden;  padding:5px 0px;">
                                                <a href="<?php echo(GeneralGlobalVars::url);?>/automarket/<?php echo($row['themepage'] . "/" . $row['id']); ?>" class="link_lead_big"><?php echo($row['name']); ?></a>
                                            </div>
                                        </td>

                                        <td align="left" valign="top"><div class="v_i_s"></div>
                                            <div style="width:200px; overflow:hidden;  padding:7px 10px;">
        <?php if ($row['city']) { ?><?php echo($row['city']); ?>
                                                    <div class="v_i_s"></div>
                                <?php echo($row['region']); ?>
                            <?php } ?>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
    <?php }
}
?>

                                        <?php if (AutomarketBase::$announcements_enable == 0) { ?>

                        Объявлений не найдено
<?php
}
GeneralMYSQL::free($res);
?>
                    <?php if (GeneralPagesCounter::$N_max > 1) { ?>
                        <table cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="left" width="270">	
                        <?php echo(GeneralPagesCounter::$htmlarrows); ?>
                                </td>
                                <td align="right" valign="bottom"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
                            </tr>
                        </table>
<?php }
GeneralPagesCounter::clearvars();
?>
                </div>  

            </td>
        </tr>
    </table><div class="v_i_b"></div>
</div>  