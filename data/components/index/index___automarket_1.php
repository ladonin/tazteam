<?php
include("data/components/index/index___automarket_1_query_1.php");
$cv = 0;
while ($row = GeneralMYSQL::fetch_array($res)) {
    AutomarketBase::detect_first_photo($row['img']); //вычисляем первое фото
    $cv++;


//их размеры подбираются строго под -20 справа, если будет отклонение, то оно не будет видно, т.к. справа текст на белом фоне
    ?>

    <table cellpadding="0" cellspacing="0">
        <tr>
            <td valign="top" style="padding:0px 10px 0px 0px;" width="1">
                <a href="http://instorage.org/portfolio/tazteam/automarket/<?php echo($current_var1 . "/" . $row['id']); ?>">
                    <img id="automarket_img_vaz<?php echo($cv); ?>" style="height:99px;">
                    <script type="text/javascript">
                        cur_url_img = "http://140706.selcdn.com/tazteam/_files/images/automarket/<?php echo($row['id'] . "/"); ?>";
                        cur_url_name = "<?php echo(AutomarketBase::$img1_cur); ?>";
                        cur_url_name = cur_url_name.replace("_3.", "_5.");
                        $('#automarket_img_vaz<?php echo($cv); ?>').attr('src', cur_url_img + cur_url_name);
                    </script>
                </a>
            </td>
            <td valign="top" align="left">
                <div  style="width:140px; overflow:hidden;">
                    <?php if ($current_var1 == 1) { ?>			
                        <a href="http://instorage.org/portfolio/tazteam/automarket/<?php echo($current_var1 . "/" . $row['id']); ?>" class="lead_gros"><?php echo(AutomarketBase::return_parameters("mark", $row['mark']) . " ");
                echo($row['model']); ?></a>
                        <div></div>	

                        <span class="label label-important normal"><?php echo($row['price']); ?> руб.</span>
                        <div class="v_i_l"></div>
                        <?php if (($row['power']) && (!1)) { ?>				
                            <?php echo($row['power']); ?> л.с.
                            <div class="v_i_s"></div>		
                        <?php } ?>				
                        <?php if (($row['year_production']) && (!1)) { ?>
                            <?php echo($row['year_production']); ?> г.
                            <div class="v_i_s"></div>			
                        <?php } ?>				
                        <?php if ($row['city']) { ?>
                            <?php echo($row['city']); ?>
                            <div class="v_i_s"></div>					
        <?php } ?>


                    <?php } else {
                        ?>
                        <a href="http://instorage.org/portfolio/tazteam/automarket/<?php echo($current_var1 . "/" . $row['id']); ?>" class="lead_gros"><?php echo($row['name']); ?></a>
                        <div></div>
                        <span class="label label-important"><?php echo($row['price']); ?> руб.</span>
                        <div class="v_i_l"></div>
                        <?php echo($row['city']); ?>

    <?php } ?>
                </div>
            </td>
        </tr>
    </table>

    <div class="v_i_b"></div>
<?php }
?>

<div style="clear:both;"></div>

