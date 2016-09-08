
<?php
AutomarketBase::convert_cookie_find_query($MSQLc); //запускаем метод, чтобы определить есть ли поисковый запрос - для показа кнопки - очистить поиск
include("data/components/automarket/automarket___3_query_1.php");

$row = GeneralMYSQL::fetch_array($res);
GeneralMYSQL::free($res);

include("data/components/automarket/panels/automarket___3_panel_top.php");

AutomarketBase::detect_photos_main($row['img'], $row['img_sizes']); //вычисляем фотографии
AutomarketBase::$id_autor = $row['id_user'];
AutomarketBase::$mark = $row['mark'];
AutomarketBase::$model = $row['model'];
//AutomarketBase::preload_photos(); //подгружаем другие фотографии
UsersBase::set_points($MSQLc, AutomarketBase::$id_autor); //начисляем автору баллы
?>




<table cellpadding="0" cellspacing="0" >
    <tr>
        <td align="left" valign="top" width="408">
            <?php
            if ($row['themepage'] == 1) {
                include("data/components/automarket/automarket___3_maindata_auto.php");
            } else if ($row['themepage'] == 2) {
                include("data/components/automarket/automarket___3_maindata_else.php");
            } else if ($row['themepage'] == 3) {
                include("data/components/automarket/automarket___3_maindata_else_buy.php");
            }
            if ($row['content']) {
                ?>



                <table cellpadding="5" cellspacing="0" width="100%">
                    <tr>
                        <td align="left" bgcolor="#35526a" style="color: #ffffff; padding-left:10px;">
                            Описание:
                        </td>
                    </tr>	
                    <tr>
                        <td align="left" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd; padding:10px;">
                            <div style="width: 388px; overflow: hidden;">
    <?php echo($row['content']); ?>
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="v_i_b"></div><?php
            }
            if ($row['themepage'] == 1) {
                include("data/components/automarket/automarket___3_maindata_auto_added.php");
            }
            ?>












            <?php /*
              <div class="v_i_b"></div>
              <table cellpadding="0" cellspacing="0" width="100%">
              <tr>
              <td align="left" bgcolor="#f1f1f1" style="border-bottom:1px solid #dddddd;border-top:1px solid #dddddd; padding:10px 10px 5px 10px;">
             */ ?>
            	
            <?php /*
              <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
              <!-- квадрат 2 200х90 -->
              <ins class="adsbygoogle"
              style="display:inline-block;width:200px;height:90px"
              data-ad-client="ca-pub-2975914903311715"
              data-ad-slot="8068733470"></ins>
              <script>
              (adsbygoogle = window.adsbygoogle || []).push({});
              </script>
              <?php */ ?>



<?php/*
<div class="v_i_b"></div>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- авторынок1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-2975914903311715"
     data-ad-slot="2006455871"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

*/?>










            <?php /*
              </td>
              </tr>
              </table>



             */ ?>


















            <?php /*
              <div id="mixkt_4294911575"></div>



              <script>
              document.write('<scr' + 'ipt language="javascript" type="text/javascript" src="http://4294911575.kt.mixmarket.biz/show/4294911575/?div=mixkt_4294911575&r=' + escape(document.referrer) + '&rnd=' + Math.round(Math.random() * 100000) + '" charset="UTF-8"><' + '/scr' + 'ipt>');
              </script>
             */ ?>






















        </td>
        <td align="left" valign="top" width="480">









            <table cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="left" valign="top">



<?php if ($row['themepage'] != 3) { ?>


                            <div class="padding_left_10">

                                <table cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="right">			

                                            <b style="font-size:21px; color:#b40b03;" class="lead"><?php echo($row['price']); ?> руб.</b>

                                        </td>
                                    </tr>
                                </table>
                                <div class="v_i_b"></div>


                                <table cellpadding="5" cellspacing="0" width="100%" style="cursor:pointer; border:1px solid #999999;" >
                                    <tr>
                                        <td align="center" valign="middle" height="460" class="photo_item1">



    <?php /*
      <a target="_blank" href="http://140706.selcdn.ru/tazteam/images/automarket/<?php echo($row['id']);?>/<?php  echo(GeneralImagesCalculate::return_size_to_photo(AutomarketBase::$img1, '3', '1'));?>" id="automarket_photo_ref" class="lead"><div class="photo_item3" style="width:458px;">
      &#9658;
      </div></a> */ ?>







                                            <div style="width:458px; max-height:458px; overflow:hidden; text-align:center;" <?php
                                                if (AutomarketBase::$img1) { /* ?>onclick="automarket___next_photo('automarket_img_photo_big');"<?php */
                                                }
                                                ?>><?php if (AutomarketBase::$img1) { ?>
                                                    <a target="_blank" href="http://140706.selcdn.ru/tazteam/images/automarket/<?php echo($row['id']); ?>/<?php echo(GeneralImagesCalculate::return_size_to_photo(AutomarketBase::$img1, '3', '1')); ?>" id="automarket_photo_ref" class="lead"><img style="max-width:458px; max-height:458px; cursor:pointer;" src="http://140706.selcdn.ru/tazteam/images/automarket/<?php echo($row['id']); ?>/<?php echo(AutomarketBase::$img1); ?>" id="automarket_img_photo_big" alt="<?php echo(GeneralPageTree::$title); ?>"></a>
    <?php } else {
        ?>
                                                    <img src="http://mapstore.org/my_portfolio/tazteam.net/images/_general/general___photo_none_600x400.jpg" width="458"  class="refimage" <?php /* onclick="swimwin('gallery','automarket'); automarket_img_to_gallery(); " */ ?>>
    <?php } ?></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>












                            <div class="padding_left_10">







                                <div class="v_i_b"></div>


                                <div style="width:473px;">


                                    <?php
                                    $current_var1 = 0;
                                    for ($i = 1; $i <= 20; $i++) {
                                        $varimg = "img" . $i;
                                        $varwidth = "width" . $i;
                                        $varheight = "height" . $i;
                                        if (AutomarketBase::$$varimg) {
                                            $current_var1++;
                                            ?><script type="text/javascript">


                                                automarket_img_url_cur<?php echo($i); ?> = "http:\/\/140706.selcdn.com\/tazteam\/_files\/images\/automarket\/<?php echo($row['id']); ?>\/";

                                                automarket_img_photo_cur<?php echo($i); ?> = "<?php echo(AutomarketBase::$$varimg); ?>";
                                                automarket_img_photo_cur<?php echo($i); ?> = automarket_img_photo_cur<?php echo($i); ?>.replace("_3.", "_2.");//задаем ключ размеров
                                                automarket_full_url_cur<?php echo($i); ?> = automarket_img_url_cur<?php echo($i); ?> + automarket_img_photo_cur<?php echo($i); ?>;

                                                automarket_img_photo_to_big_cur<?php echo($i); ?> = "<?php echo(AutomarketBase::$$varimg); ?>";
                                                automarket_full_url_to_big_cur<?php echo($i); ?> = automarket_img_url_cur<?php echo($i); ?> + automarket_img_photo_to_big_cur<?php echo($i); ?>;


                                                automarket_array_photos[<?php echo($current_var1); ?>] = automarket_full_url_to_big_cur<?php echo($i); ?>;


                                                //предварительная подгрузка других фотографий объявления
                                                //general___preload_one_image(automarket_full_url_to_big_cur<?php echo($i); ?>);


                                                //следующая подгружается при смене фото
                                            </script><img class="refimage" style="margin-bottom:5px;<?php if ($current_var1 % 5) {
                                                echo(" margin-right:5px;");
                                            } ?>" id="automarket_under_photo_photo<?php echo($i); ?>" onclick="automarket___perelist_img('automarket_img_photo_big', automarket_full_url_to_big_cur<?php echo($i); ?>);
            <?php /* gallery_num_photo_func(<?php echo($js);?>); */ ?>"/><script type="text/javascript">
                                        $('#automarket_under_photo_photo<?php echo($i); ?>').attr('src', automarket_full_url_cur<?php echo($i); ?>);
                                        $('#automarket_under_photo_photo<?php echo($i); ?>').width(90);
                                        //automarket___podgon_po_razmeram_img_2('automarket_img_photo_big',470);
                                            </script><?php }
    } ?>
                                </div>


                                <script type="text/javascript">//вторая фотка, если есть
                                    if (automarket_array_photos[2]) {
                                        general___preload_one_image(automarket_array_photos[2]);
                                    }
                                </script> 
                            </div>
<?php } ?>
                        <div class="padding_left_10">            



                            <div class="v_i_b"></div>

    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- авторынок под фото 468 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-2975914903311715"
     data-ad-slot="5395179076"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>










                            <?php include("data/components/automarket/automarket___3_autor.php"); ?>
                            <div class="v_i_b"></div>
                            <?php
                            GeneralDialogWindows::$getvar1 = GeneralGetVars::$var1;
                            GeneralDialogWindows::$getvar2 = GeneralGetVars::$var2;
                            GeneralDialogWindows::$getvar3 = GeneralGetVars::$var3;
                            GeneralDialogWindows::$getvar4 = GeneralGetVars::$var4;
                            GeneralDialogWindows::$num_page = GeneralGetVars::$num_page;
                            GeneralDialogWindows::$signaturing = "am";
                            GeneralDialogWindows::$type = 1; //2 -  открывающийся чат
                            GeneralDialogWindows::$padding_right = 0;
                            GeneralDialogWindows::$id_dialog = "automarket_3_1"; //3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
                            GeneralDialogWindows::$database = "automarket___messages"; //база данных диалога
                            GeneralDialogWindows::$textforpanel = "Написать комментарий";
                            GeneralDialogWindows::$namedialog = "Комментарии";
                            GeneralDialogWindows::$condition1 = "id_automarket=" . GeneralGetVars::$var3; //условие 1 для базы данных
                            //GeneralDialogWindows::$condition2="id_photo=".$row['id_photo'];	//условие 2 для базы данных
                            GeneralDialogWindows::$idmessage = 2; //где будет номер сообщения	
                            GeneralDialogWindows::$valuesnumber = 5; //сколько value делаем	
                            GeneralDialogWindows::$autor = 3; //какую value делаем автором при вставке
                            GeneralDialogWindows::$textvalue = 4; //где будет текст
                            GeneralDialogWindows::$time = 5; //какую value делаем временем создания сообщения	при вставке
                            GeneralDialogWindows::$value1 = GeneralGetVars::$var3; //значение для вставки
                            GeneralDialogWindows::$value2 = ""; //значение для вставки - потом вставим
                            GeneralDialogWindows::$value3 = ""; //значение для вставки - потом вставим
                            GeneralDialogWindows::$value4 = ""; //значение для вставки - потом вставим
                            GeneralDialogWindows::$value5 = ""; //значение для вставки - потом вставим

                            include("data/components/_general/dialog_windows/dialog_windows_1.php"); //сам диалог
                            ?>
                            <script type="text/javascript">
                                $('#div_dialog_1_var_width').width(460);//он пока 500 и вначале мы должны его уменьшить, иначе он не даст уменьшиться таблице
                                $('#table_var_width').width($('#div_dialog_1_var_width').width());//таблица может не уменьшиться до конца из-за панели навигации в ней
                                $('#div_dialog_1_var_width').width($('#table_var_width').width());//утрамбовываем
                            </script>


                        </div>







                    </td>
                </tr>
            </table>					










        </td>
    </tr>
</table>
