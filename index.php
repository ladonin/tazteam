<?php
//ini_set("memory_limit","1024M");//ООП НОВЫЙ КОД задаем параметр сервера для зашрузки файлов большого размера
$start = microtime(1); //для проверки скорости//////////////////////////////////////

require("data/models/_general/GlobalVars.php"); //библиотека глобальных переменных сервера
require("data/models/_general/MySQL.php"); //функции и глобальные переменные MySQL
require("data/models/_general/PageBasic.php"); //базовая библиотека для работы внешне со страницей
require("data/models/_general/Cookies.php"); //базовая библиотека работы с куками
require("data/models/_general/Security.php"); //базовая библиотека работы с введенными данными
require("data/models/_general/GetVars.php"); //проверка входящих GET-переменных
require("data/models/_general/Date.php"); //работа с датами
require("data/models/_general/Robot.php"); //автоработы
require("data/models/_general/PageTree.php"); //проверка на существование страницы и в случае существования - определение "дерева" нахождения страницы
require("data/models/_general/ImagesPreload.php"); //предварительная подгрузка скрытых картинок
require("data/models/_general/UserName.php"); //показывает имена пользоватетелей (работает быстрее sql-функции в 4 раза)
require("data/models/_general/Directories.php"); //функции для определения директории и работы с директориями, а также определение номера таблицы в базе данных
//require("data/models/_general/Cache.php"); //базовая библиотека кеширования
require("data/models/users/MyData.php"); //базовая библиотека работы с Вами
require("data/models/users/Base.php");
require("data/models/users/Mail.php"); //базовая библиотека работы с почтой
require("data/models/_general/InputText.php");
//require_once ("data/models/_general/Cache/Lite/Output.php"); 

GeneralPageBasic::$pagestatus = "view"; //просмотр
$current_var1 = ""; //вспомогательная переменная
$current_var2 = ""; //вспомогательная переменная
$current_var3 = ""; //вспомогательная переменная
$current_var4 = ""; //вспомогательная переменная
$current_var5 = ""; //вспомогательная переменная
$current_var6 = ""; //вспомогательная переменная
$current_var7 = ""; //вспомогательная переменная
$chat_var = ""; //вспомогательная переменная для чата
$cv1 = ""; //вспомогательная переменная (маленькая)
$cv2 = ""; //вспомогательная переменная (маленькая)
$cv3 = ""; //вспомогательная переменная (маленькая)
$cv4 = ""; //вспомогательная переменная (маленькая)
$cv5 = ""; //вспомогательная переменная (маленькая)
$cv6 = ""; //вспомогательная переменная (маленькая)
$cv7 = ""; //вспомогательная переменная (маленькая)
$width_message_textarea_forum=590;//для кнопки "задать вопрос"
$height_message_textarea_forum=200;

$MSQLc = GeneralMYSQL::connect(1); //подключаемся к  основной ДБ как root
//mysqli_query($MSQLc,'SET NAMES UTF8');//на время
GeneralGlobalVars::set(); //устанавливаем глобальные переменные
GeneralGetVars::revision($MSQLc);
GeneralGetVars::save_page_url_in_cookies(); //потому что куки рядом с гет переменными видны только на одну перезагрузку, поэтому отдельно

if (GeneralGetVars::$var1) {
    include_once("data/models/" . GeneralGetVars::$var1 . "/Base.php");
}//базовая библиотека для конкретной страницы
if ((GeneralGetVars::$var3 === "photoalbums") || (GeneralGetVars::$var3 === "allphotosinalbum")) {
    include_once("data/models/" . GeneralGetVars::$var1 . "/PhotoalbumsBase.php");
}//базовая библиотека для конкретной страницы	

GeneralSecurity::cookiescontrol($MSQLc);
UsersMyData::identification($MSQLc);
GeneralPageTree::setvars($MSQLc); //глобальные переменные дерева сайта (наличие страницы, адрес страницы по названиям)
//подгружаем индивидуальные библиотеки
if (UsersMyData::$identified == 1) {
    include("data/lists/" . GeneralPageTree::$url . "_php_library_reg.php");
} else {
    include("data/lists/" . GeneralPageTree::$url . "_php_library_noreg.php");
}
//GeneralPagebasic::detect_scroll();//определеяем прокрутку на странице

if (UsersMyData::$id == 1) {
    //UsersMyData::$id=11615;
    //ini_set('display_errors', 1); /////////////////////////////
    //error_reporting(E_ALL);
}///////////////////////////////////
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo(GeneralPageTree::$title); ?></title>
        <meta name="description" content="">
        <meta name="keywords" content="<?php echo(str_replace(" ", ",", trim(GeneralPageTree::$keywords))); ?>">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="google-site-verification" content="rr8h6e4jsB36N_h5CoBupN3LUXna2DhtOYHg_9nzEKw">
        <meta name='yandex-verification' content='7c2a3a7e1b6dfd6b' />
        <meta name="4d88a69ce36aad5b651e142429b1f5f9" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="http://instorage.org/portfolio/tazteam/favicon.ico" type="image/x-icon">
        <link rel="shortcut icon" href="http://instorage.org/portfolio/tazteam/favicon.ico" type="image/x-icon">

        <link rel="stylesheet" type="text/css" href="http://instorage.org/portfolio/tazteam/css/_general/carcas.css">
        <?php /* <link rel="stylesheet" type="text/css" href="http://instorage.org/portfolio/tazteam/css/_general/text.css">
          <link rel="stylesheet" type="text/css" href="http://instorage.org/portfolio/tazteam/css/index/carcas.css">
          <link rel="stylesheet" type="text/css" href="http://instorage.org/portfolio/tazteam/css/index/text.css">
         */ ?>


        <?php /* if (GeneralGetVars::$var1) {?>
          <link rel="stylesheet" type="text/css" href="http://instorage.org/portfolio/tazteam/css/<?php echo(GeneralGetVars::$var1);?>/carcas.css">
          <link rel="stylesheet" type="text/css" href="http://instorage.org/portfolio/tazteam/css/<?php echo(GeneralGetVars::$var1);?>/text.css">
          <?php } */ ?>
        <!-- Bootstrap -->
        <link href="http://instorage.org/portfolio/tazteam/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">
        <link href="http://instorage.org/portfolio/tazteam/bootstrap/css/bootstrap-responsive.css" rel="stylesheet" media="screen">

        <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/jquery/jquery.js'></script>
        <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/general___images_preload.js'></script>
        <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/general___swim.js'></script>
        <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/general___scroll.js'></script>
        <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/general___ajax.js'></script>
        <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/general___textarea.js'></script>
        <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/general___send_to_server.js'></script>
        <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/general___brousers.js'></script>
        <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/jquery/jquery.cookie.js'></script>
        <?php if (UsersMyData::$identified == 1) { ?>
            <script type='text/javascript' src='http://instorage.org/portfolio/tazteam/js/functions/_general/general___signature.js'></script>
            <?php
        }
        include("data/lists/" . GeneralPageTree::$url . "_js.txt"); //подгрузка списка подключаемых  js файлов 
        ?>
        <?php /* <link type="text/css" rel="stylesheet" href="http://is.mixmarket.biz/css/uni/partner.css"> */ ?>

        <style>
            a {
                cursor:pointer;    
            }
        </style>

    </head>

    <body style="padding-top:34px; background-color:#bbbbbb;
    <?php /*   background-attachment: fixed;      background-image: url(images/texture/tkan_grey.png);
      background-repeat:repeat; */ ?>">

          <script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-36088453-1']);
          _gaq.push(['_trackPageview']);
          (function() {
          var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
          ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
          </script>

        <?php
        GeneralPageBasic::$general_width_blocks_in_list = "50%";
        GeneralPageBasic::$general_width_div_in_block_in_list = "250px";
        GeneralPageBasic::$general_width_table_for_gallery = "25%";
        ?>

        <script type="text/javascript">
            window_width = 918;
            width_left_panel = 0;
            window_site_body_width = window_width;
        </script>
        <?php //include("js/scripts/_general/sizes/detect_sizes.php"); //определяем ширину окна пользователя   ?>
        <script type="text/javascript">
            timeserver =<?php echo(GeneralGlobalVars::$timeunix); ?>;
<?php if (UsersMyData::$identified == 1) { ?>
                //$(document).ready(function(){
                //general___signature_ajax('<?php echo(GeneralGetVars::$var1); ?>','<?php echo(GeneralGetVars::$var2); ?>','<?php echo(GeneralGetVars::$var3); ?>','<?php echo(GeneralGetVars::$var4); ?>','<?php echo(GeneralGetVars::$num_page); ?>');
                //general___signature('<?php echo(GeneralGetVars::$var1); ?>','<?php echo(GeneralGetVars::$var2); ?>','<?php echo(GeneralGetVars::$var3); ?>','<?php echo(GeneralGetVars::$var4); ?>','<?php echo(GeneralGetVars::$num_page); ?>');});
<?php } ?>
        </script>

        <div class="navbar navbar-inverse navbar-fixed-top" id="navbar_hat">
            <div class="navbar-inner" style="min-width:968px;">
                <div class="row-fluid hat">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="http://instorage.org/portfolio/tazteam" style="padding:4px 20px 10px 20px;">
                        <img src="http://instorage.org/portfolio/tazteam/images/_general/logos/logo_taz.png" style="height:12px;">
                    </a>
                    <div class="nav-collapse collapse navbar-responsive-collapse">
                        <ul class="nav">
                            <li class="divider-vertical"></li>
                            <?php /* if (GeneralPageTree::$nesting > 0) { ?>
                              <li class="dropdown" id="q_hat_breadcrumb_button">
                              <a class="dropdown-toggle" onclick="general___hat_menu_toggle('q_hat_breadcrumb');">
                              <i class="icon-chevron-down icon-white"></i>
                              </a>
                              </li>
                              <li class="divider-vertical"></li>
                              <?php } */ ?>
                            <li class="dropdown" id="q_hat_market_button">
                                <a href="http://instorage.org/portfolio/tazteam/automarket">
                                    Авторынок
                                </a>
                            </li>
                            <li class="divider-vertical"></li>
                            <li class="dropdown" id="q_hat_market_button">
                                <a href="http://instorage.org/portfolio/tazteam/forum">
                                    Форум
                                </a>
                            </li>
                            <li class="divider-vertical"></li>
                            

                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    Еще
                                </a>
                                <ul class="dropdown-menu">    
                                    <li><a href="http://urcclub.nethouse.ru" target="_blank">TAZTEAM SHOP</a></li>
                                    <li><a href="http://instorage.org/portfolio/tazteam/users">Участники</a></li>
                                    <li><a href="#calculator" data-toggle="modal">Калькулятор</a></li>
                                    <li><a href="http://instorage.org/portfolio/tazteam/articles">Статьи</a></li>                                 
                                    <li><a href="http://instorage.org/portfolio/tazteam/news">Новости</a></li>                                    
                                    <li><a href="http://instorage.org/portfolio/tazteam/photo/2=1">Фото - авто участников</a></li>
                                    <li><a href="http://instorage.org/portfolio/tazteam/photo/1=1">Фото - лучшие подборки</a></li>
                                    <li><a href="http://instorage.org/portfolio/tazteam/video">Видео</a></li>
                                    <li><a href="http://instorage.org/portfolio/tazteam/garage">Гараж</a></li>                                    
                                    <li><a href="http://instorage.org/portfolio/tazteam/tests/1=60">Тесты ПДД</a></li>
                                </ul>
                            </li>
                          <li class="divider-vertical"></li> 
                            <li>
                            <button style="padding:0px 10px; margin-top:6px; margin-left:10px; margin-right:10px;" type="submit" class="btn btn-warning btn-mini" href="#<?php echo((UsersMyData::$identified == 1) ? 'new_announcement':'enter'); ?>" data-toggle="modal">Дать&nbsp;объявление</button>
                            </li>
                                 
                                 
                                 
                                 
                                 
                             
                            <li>
                            <button style="padding:0px 10px; margin-top:6px; margin-left:10px; margin-right:10px;" type="submit" class="btn btn-success btn-mini" href="#<?php echo((UsersMyData::$identified == 1) ? 'new_topic_forum':'enter'); ?>" data-toggle="modal">Задать&nbsp;вопрос</button>
                            </li>      
                                 
                                 
                                 
                                 
                                 
                                 
                                                        
      
                        </ul>
                        <ul class="nav pull-right">
                            <li><a href="http://instorage.org/portfolio/tazteam/games">
                                    <?php if (UsersMyData::$score > 0) { ?><b class="white"><?php
                                        echo(UsersMyData::$score);
                                    }
                                    ?></b>&nbsp;<img src="http://instorage.org/portfolio/tazteam/images/_general/moneta.png" width="16" height="16" style="margin-bottom:1px;"></a></li>

                            <li class="divider-vertical"></li>
<?php if (UsersMyData::$identified == 1) { ?>

                                <li class="dropdown" id="q_hat_user_button">
                                    <a class="dropdown-toggle" data-toggle="dropdown" onclick="general___hat_menu_toggle('q_hat_user');">
    <?php echo(UsersMyData::$name); ?>
                                    </a>
                                    <ul class="dropdown-menu" id="q_hat_user_dropwown">
                                        <li><a href="<?php echo(GeneralGlobalVars::url . "/users/" . UsersMyData::$id); ?>">Моя страница</a> <span id="signaturing_friends"></span></li>
                                        <li><a href="<?php echo(GeneralGlobalVars::url . "/users/" . UsersMyData::$id); ?>/friends=1">Друзья</a> <span id="signaturing_friends"></span></li>
                                        <li><a href="<?php echo(GeneralGlobalVars::url . "/users/" . UsersMyData::$id); ?>/signatures">Оповещения</a> <span id="signaturing_talking"></span> <span id="signaturing_forum"></span></li>
                                        <li><a href="<?php echo(GeneralGlobalVars::url . "/users/" . UsersMyData::$id . "/dialogs=1"); ?>">Сообщения</a> <span id="signaturing_dialogs"></span></li>
                                        <li class="divider"></li>
                                        <li class="text-center">
                                            <form method="post" action="<?php echo(GeneralGetVars::$urltosubmit); ?>" class="navbar-form" style="margin:-5px 0 5px 0;">
                                                <input name="submit" value="quit" type="hidden">		
                                                <input name="UsersMyDataQuit" value="1" type="hidden">
                                                <button type="submit" class="btn btn-primary btn-small">Выход</button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <?php
                            } else {
                                ?>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" style="padding:0 20px;">
                                        <img src="images/_general/button_off_16.png" height="16" width="16" style="margin-top:10px; margin-bottom:9px;">
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#enter" data-toggle="modal">Войти</a></li>
                                        <li><a href="#registration" data-toggle="modal">Зарегистрироваться</a></li>
                                    </ul>
                                </li>
<?php } ?>

                        </ul>
                    </div><!-- /.nav-collapse -->
                </div>

                <div id="q_hat_market" class="sub_menu_hat" style="display:none;">
                    <div class="nav-collapse collapse" style="padding-top:2px;">
                        <div class="row-fluid">
                            <ul class="nav">
                                <li class="">
                                    <a class="close" onclick="general___hat_menu_toggle('q_hat_market');">&times;</a>
                                </li>		
                                <li class="divider-vertical-sub-menu"></li>
                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/automarket">Авторынок</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="q_hat_see" class="sub_menu_hat" style="display:none;">
                    <div class="nav-collapse collapse" style="padding-top:2px;">
                        <div class="row-fluid">
                            <ul class="nav">
                                <li class="">
                                    <a class="close" onclick="general___hat_menu_toggle('q_hat_see');">&times;</a>
                                </li>		
                                <li class="divider-vertical-sub-menu"></li>
                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/photo/2=1">Фото - авто участников</a>
                                </li>

                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/photo/1=1">Фото - лучшие подборки</a>
                                </li>

                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/video">Видео</a>
                                </li>
                            </ul>                            
                        </div>
                    </div>
                </div>

                <div id="q_hat_read" class="sub_menu_hat" style="display:none;">
                    <div class="nav-collapse collapse" style="padding-top:2px;">
                        <div class="row-fluid">
                            <ul class="nav">
                                <li class="">
                                    <a class="close" onclick="general___hat_menu_toggle('q_hat_read');">&times;</a>
                                </li>		
                                <li class="divider-vertical-sub-menu"></li>
                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/news">Новости</a>
                                </li>

                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/articles">Статьи</a>
                                </li>
                            </ul>                            
                        </div>
                    </div>
                </div>

                <div id="q_hat_talk" class="sub_menu_hat" style="display:none;">
                    <div class="nav-collapse collapse" style="padding-top:2px;">
                        <div class="row-fluid">
                            <ul class="nav">
                                <li class="">
                                    <a class="close" onclick="general___hat_menu_toggle('q_hat_talk');">&times;</a>
                                </li>		
                                <li class="divider-vertical-sub-menu"></li>
                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/forum">Форум</a>
                                </li>

                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/users">Участники</a>
                                </li>
                            </ul>                            
                        </div>
                    </div>
                </div>

                <div id="q_hat_else" class="sub_menu_hat" style="display:none;">
                    <div class="nav-collapse collapse" style="padding-top:2px;">
                        <div class="row-fluid">
                            <ul class="nav">
                                <li class="">
                                    <a class="close" onclick="general___hat_menu_toggle('q_hat_else');">&times;</a>
                                </li>		
                                <li class="divider-vertical-sub-menu"></li>
                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/garage">Гараж</a>
                                </li>

                                <li class="">
                                    <a href="#calculator" data-toggle="modal">Калькулятор</a>
                                </li>

                                <li class="">
                                    <a href="http://instorage.org/portfolio/tazteam/tests/1=<?php echo(rand(1, GeneralGlobalVars::count_tests)); ?>">Тесты ПДД</a>
                                </li>
                            </ul>                            
                        </div>
                    </div>
                </div>

                <div id="q_hat_user" class="sub_menu_hat" style="display:none;">
                    <div class="nav-collapse collapse" style="padding-top:2px;">
                        <div class="row-fluid">
                            <ul class="nav">

                                <li class="">
                                    <a class="close" onclick="general___hat_menu_toggle('q_hat_user');">&times;</a>
                                </li>
                                <li class="divider-vertical-sub-menu"></li> 
                                <li class="">
                                    <a href="<?php echo(GeneralGlobalVars::url . "/users/" . UsersMyData::$id); ?>">Моя страница</a>
                                </li>

                                <li class="">
                                    <a href="<?php echo(GeneralGlobalVars::url . "/users/" . UsersMyData::$id . "/dialogs=1"); ?>">Сообщения</a>
                                </li>


                                <li class="">
                                    <a href="<?php echo(GeneralGlobalVars::url . "/users/" . UsersMyData::$id); ?>/signatures">Оповещения</a>
                                </li>

                                <li class="">
                                    <a href="<?php echo(GeneralGlobalVars::url . "/users/" . UsersMyData::$id); ?>/friends=1">Друзья</a>
                                </li>

                                <li class="divider-vertical-sub-menu"></li> 
                                <li class="">
                                    <form method="post" style="margin:2px 0 0px 18px;" action="<?php echo(GeneralGetVars::$urltosubmit); ?>" class="navbar-form" style="margin:-5px 0 5px 0;">
                                        <input name="submit" value="quit" type="hidden">		
                                        <input name="UsersMyDataQuit" value="1" type="hidden">
                                        <button type="submit" class="btn btn-inverse btn-mini">Выход</button>
                                    </form>
                                </li>  
                            </ul>                            
                        </div>
                    </div>
                </div>

            </div><!-- /navbar-inner -->
        </div><!-- /navbar -->

        <!-- calculator -->
        <div id="calculator" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="calculatorLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="calculatorLabel">Выберите калькулятор</h3>
            </div>
            <div class="modal-body">
                <a href="http://instorage.org/portfolio/tazteam/calculator/1">Расчет мощности двигателя</a>
                <br>
                <a href="http://instorage.org/portfolio/tazteam/calculator/2">Расчет времени прохождения дистанции 402 м</a>
                <br>                            
                <a href="http://instorage.org/portfolio/tazteam/calculator/3">Расчет rs и степени сжатия мотора</a><br>    
                <a href="http://instorage.org/portfolio/tazteam/calculator/4">Расчет степени сжатия для турбо мотора</a><br>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
            </div>
        </div>  

<?php if (UsersMyData::$identified == 0) { ?>
            <!-- enter -->
            <div id="enter" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="enterLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="enterLabel">Вход</h3>
                </div>
                <div class="modal-body">
    <?php //include("data/components/_general/form_enter.php"); ?>
Вход временно недоступен
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
                </div>
            </div>

            <!-- registration -->
            <div id="registration" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registrationLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="registrationLabel">Регистрация</h3>
                </div>
                <div class="modal-body">
    <?php //include("data/components/_general/form_registration.php"); ?>
Регистрация временно недоступна
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
                </div>
            </div>   

            <!-- problems -->
            <div id="problems" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="problemsLabel" aria-hidden="true">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="problemsLabel">Ошибка доступа</h3>
                </div>
                <div class="modal-body">
    <?php include("data/components/_general/form_autorize_problems.php"); ?>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
                </div>
            </div>  

    <?php if (UsersMyData::$reg_status == 1) { ?>
                <div class="alert alert-success"><button type="button" class="close btn-small" data-dismiss="alert">закрыть &times;</button>
                    Регистрация почти закончена! На вашу почту отправлено письмо с подтверждением. Откройте письмо, чтобы активировать свою персональную страницу.
                </div>
            <?php } ?>

    <?php if (UsersMydata::$send_mail_for_repassword_status == 1) { ?>
                <div class="alert alert-success"><button type="button" class="close btn-small" data-dismiss="alert">закрыть &times;</button>
                    На вашу почту отправлено письмо со ссылкой перехода на страницу смены пароля.
                </div>
            <?php } ?>
<?php } ?>

        <script type="text/javascript">
            general___hat_menu_detect_view();
        </script>

        <table cellpadding="0" cellspacing="0" width="100%" border="0">
            <tr>
                <td align="center">
                    <table cellpadding="0" cellspacing="0" width="928" border="0">
                        <tr>
                            <td align="left">
                                <?php /* if ((GeneralPageTree::$url!=="news/news___1")&&(GeneralPageTree::$url!=="articles/articles___1")&&(GeneralPageTree::$url!=="forum/forum___1")&&(GeneralGetVars::$var1!="")&&(GeneralGetVars::$var1!=="photo")&&(GeneralGetVars::$var1!=="users")&&(GeneralGetVars::$var3!=="photoalbums")&&(GeneralGetVars::$var1!=="tests")){ ?>                

                                  <table cellpadding="0" cellspacing="0" width="928" bgcolor="#ffffff">
                                  <tr>
                                  <td align="center">

                                  <div style="width:908px; background-color:#ffffff; border:1px solid #ffffff;">
                                  <div class="v_i_b"></div>
                                  <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                                  <tr>
                                  <td valign="middle" align="left" class="padding_left_10">

                                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                  <!-- квадрат 160х90 -->
                                  <ins class="adsbygoogle"
                                  style="display:inline-block;width:160px;height:90px"
                                  data-ad-client="ca-pub-2975914903311715"
                                  data-ad-slot="9956949077"></ins>
                                  <script>
                                  (adsbygoogle = window.adsbygoogle || []).push({});
                                  </script>

                                  </td>
                                  <td valign="middle" align="right"  class="padding_right_10">

                                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                  <!-- 728х90 автомобили -->
                                  <ins class="adsbygoogle"
                                  style="display:inline-block;width:728px;height:90px"
                                  data-ad-client="ca-pub-2975914903311715"
                                  data-ad-slot="6278139074"></ins>
                                  <script>
                                  (adsbygoogle = window.adsbygoogle || []).push({});
                                  </script>

                                  </td>
                                  </tr>
                                  </table>
                                  <div class="v_i_b"></div>
                                  </div>
                                  <div class="v_i_b"></div>

                                  </td>
                                  </tr>
                                  </table>
                                  <?php } */ ?>
<?php if ((GeneralPageTree::$url !== "articles/articles___1") && (GeneralPageTree::$url !== "news/news___1") && (GeneralPageTree::$url !== "forum/forum___1") && (GeneralGetVars::$var1 != "") && (GeneralGetVars::$var1 !== "garage") && (GeneralGetVars::$var1 !== "photo") && (GeneralGetVars::$var1 !== "users") && (GeneralGetVars::$var3 !== "photoalbums") && (GeneralGetVars::$var1 !== "tests") && (GeneralGetVars::$var1 !== "games")) { ?>                
                                    <div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:15px;"
                                         class="boxShadow3"
                                         >
                                        <div class="no-adb">
                                            <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
                                                <tr>
                                                    <td valign="top" align="left">                                  
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                    <!-- 728х90 автомобили -->
                                    <ins class="adsbygoogle"
                                         style="display:inline-block;width:728px;height:90px"
                                         data-ad-client="ca-pub-2975914903311715"
                                         data-ad-slot="6278139074"></ins>
                                    <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
                                    </script>

                                                    </td>

                                                    <td align="right" valign="top" style="padding-left:20px;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- квадрат 160х90 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:160px;height:90px"
     data-ad-client="ca-pub-2975914903311715"
     data-ad-slot="9956949077"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <?php
                                }

                                if (GeneralPageTree::$enable == 1) {

                                    include("data/views/" . GeneralPageTree::$url . ".php");
                                }
                                ?>
                                <div style="clear: both;"></div>
                                <div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:15px;"
                                     class="boxShadow3"
                                     >

                                    <table width="100%">
                                        <tr>
                                            <td align="center"><div class="no-adb">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 728x90___2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-2975914903311715"
     data-ad-slot="2860420274"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>



<?php
$width_message_textarea_forum=400;
$height_message_textarea_forum=100;
include('data/components/forum/new_topic_modal.php');?>
<?php 

include("data/components/automarket/panels/new_announcement.php");?>






                                <div style="clear: both;"></div>

                                <?php /*

                                  <div style="width:888px;  margin-top:20px;" class="boxShadow3"><div class="v_i_b"></div>
                                  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                                  <!-- 728х90 автомобили -->
                                  <ins class="adsbygoogle"
                                  style="display:inline-block;width:728px;height:90px"
                                  data-ad-client="ca-pub-2975914903311715"
                                  data-ad-slot="6278139074"></ins>
                                  <script>
                                  (adsbygoogle = window.adsbygoogle || []).push({});
                                  </script>
                                  </div>
                                 */ ?>

                                <div style="clear: both;"></div>

                                <div style="width:888px;  margin-top:20px;">

                                    <table cellpadding="0" cellspacing="0" width="100%">
                                        <tr>
                                            <td align="center">

                                                <?php /*
                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/news" class="link_lead_topic">Новости</a>
                                                  </div>
                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/articles" class="link_lead_topic">Статьи</a>
                                                  </div>
                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/forum" class="link_lead_topic">Форум</a>
                                                  </div>
                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/users" class="link_lead_topic">Участники</a>
                                                  </div>

                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/garage" class="link_lead_topic">Гараж</a>
                                                  </div>
                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/automarket" class="link_lead_topic">Авторынок</a>
                                                  </div>
                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/tests/1=1" class="link_lead_topic">Тесты ПДД</a>
                                                  </div>
                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/shop" class="link_lead_topic">TAZTEAM SHOP</a>
                                                  </div>

                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/photo/2=1" class="link_lead_topic">Фото - авто участников</a>
                                                  </div>
                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/photo/1=1" class="link_lead_topic">Фото - лучшие подборки</a>
                                                  </div>
                                                  <div style="margin-bottom:5px;">
                                                  <a href="http://instorage.org/portfolio/tazteam/video" class="link_lead_topic">Видео</a>
                                                  </div>
                                                 */ ?>                                        

                                                <div style="margin-top:5px; margin-bottom:5px;">



                                                    <?php
                                                    if (UsersMyData::$id == 1) {
                                                        ?>
                                                        <!--LiveInternet counter--><script type="text/javascript"><!--
                                                        document.write("<a href='http://www.liveinternet.ru/click' " +
                                                                    "target=_blank><img src='//counter.yadro.ru/hit?t29.1;r" +
                                                                    escape(document.referrer) + ((typeof (screen) == "undefined") ? "" :
                                                                    ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                                                                            screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                                                                    ";" + Math.random() +
                                                                    "' alt='' title='LiveInternet: показано количество просмотров и" +
                                                                    " посетителей' " +
                                                                    "border='0' width='88' height='120'><\/a>")
                                                            //--></script><!--/LiveInternet-->
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <!--LiveInternet counter--><script type="text/javascript"><!--
                                                            document.write("<a href='//www.liveinternet.ru/click' " +
                                                                    "target=_blank><img src='//counter.yadro.ru/hit?t45.1;r" +
                                                                    escape(document.referrer) + ((typeof (screen) == "undefined") ? "" :
                                                                    ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?
                                                                            screen.colorDepth : screen.pixelDepth)) + ";u" + escape(document.URL) +
                                                                    ";" + Math.random() +
                                                                    "' alt='' title='LiveInternet' " +
                                                                    "border='0' width='31' height='31'><\/a>")
                                                            //--></script><!--/LiveInternet-->

                                                    <?php }
                                                    ?>			
                                                </div>                       

                                                <div style="margin-right:5px; display:inline;">
                                                    <a href="http://instorage.org/portfolio/tazteam/users/1" class="link_lead_topic white">Разработка</a>
                                                </div>                                              
                                                <div style="margin-right:5px; display:inline;">
                                                    <a href="http://instorage.org/portfolio/tazteam/users/155" class="link_lead_topic white">Влас Прудов</a>
                                                </div> 
                                                <div style="margin-right:5px; display:inline;">
                                                    <a href="http://instorage.org" class="link_lead_topic white">instorage.org</a>
                                                </div>

                                                <div style="margin-top:5px; margin-bottom:5px;"  class="link_lead_topic white">
                                                    © TAZTEAM, 2012 - <?php echo(date('Y')); ?>
                                                </div>                             

                                            </td>
                                        </tr>
                                    </table>    

                                </div>

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <script type="text/javascript">
                                                            jQuery(document).ready(function() {
                                                                general___preload_images([<?php echo(GeneralImagesPreload::output()); ?>]);
                                                            });
        </script>

        <script src="bootstrap/js/bootstrap.js"></script>

        <script type="text/javascript">
<?php if (UsersMyData::$problems_status == 1) { ?>
                                                                $('#problems').modal('show');
<?php } ?>
        </script>

        <?php /* боремся с adblock 
          <script type="text/javascript" >
          var ads = "no-adb";onload=function(){if (document.getElementsByClassName == undefined) {document.getElementsByClassName = function(className){var hasClassName = new RegExp("(?:^|\s)" + className + "(?:$|\s)");var allElements = document.getElementsByTagName("*");var results = [];var element;for (var i = 0; (element = allElements[i]) != null; i++) {var elementClass = element.className;if (elementClass && elementClass.indexOf(className) != -1 && hasClassName.test(elementClass))results.push(element);}return results;}}   blocked = 0;var ad_nodes = document.getElementsByClassName(ads);for(i in ad_nodes){
          if (ad_nodes[i].offsetHeight == 0){blocked = 1;
          document.write("<table width=\"100%\"><tr><td valign=\"top\" align=\"left\">Уважаемый пользователь! Мы обнаружили, что вы блокируете показ рекламы на нашем сайте, просим внести наш сайт в список исключения, так как наш контент предоставляется на бесплатной основе, поэтому единственным доходом является реклама на сайте. А она даёт мотивацию работать дальше и создавать интересные решения для вашего сайта. Спасибо за понимание.</td><td width=\"1%\" valign=\"top\"><img src=\"http://instorage.org/portfolio/tazteam/images/_general/auto_old.jpg\" width=\"170\" style=\"margin-left:10px;\"></td></tr></table><b>Чтобы внести сайт instorage.org/portfolio/tazteam в список исключений, достаточно:</b><br /><br /><b><big>Chrome</big></b><ol><li>В браузере вверху справа нажать на логотип ABP и затем на кнопку \"включено на этом сайте\", тем самым отключив Adblock для сайта instorage.org/portfolio/tazteam</li></ol>или<br /><br /><ol><li>перейти в браузере в раздел \"Настройки\"</li><li>Расширения</li><li>AdBlock Plus</li><li>кнопка \"Настройки\"</li><li>Белый список доменов</li><li>ввести адрес instorage.org/portfolio/tazteam</li><li>Добавить домен</li><li>готово</li></ol><br /><b><big>Firefox</big></b><ol><li>В браузере вверху справа нажать на логотип ABP и затем на кнопку \"отключить на instorage.org/portfolio/tazteam\"</li></ol>или<br /><br /><ol><li>перейти в браузере в раздел \"Дополнения\"</li><li>Расширения</li><li>AdBlock Plus</li><li>кнопка \"Настройки фильтров\"</li><li>Добавить группу фильтров</li><li>справа \"Добавить фильтр\"</li><li>вставляем адрес http://instorage.org/portfolio/tazteam</li><li>нажимаем Enter</li><li>убираем галочку напротив созданной ссылки</li><li>готово</li></ol>");
          }}}</script>
         */ ?>
         
         
         
         
<script type="text/javascript">
<!--
document.write('<img src="http://tr.mixmarket.biz/t.php?id=3560756&uid=1294945932&r=' + escape(document.referrer) + '&t=' + (new Date()).getTime() + '" width="1" height="1"/>');var mix_tracker_shown=true;var uni_tracker_shown=true;
//-->
</script>
<noscript><img src="http://tr.mixmarket.biz/t.php?id=3560756&amp;uid=1294945932" width="1" height="1" alt=""/></noscript>
         
         
         
         <!-- разместите на месте показа блока -->
<div id="mixkt_4294910437"></div>
<!-- разместите на месте показа блока -->
<div id="mixkt_4294907498"></div>

<!-- разместите в самом конце страницы, перед тегом </body> -->
<script>
document.write('<scr' + 'ipt language="javascript" type="text/javascript" src="http://4294910437.kt.mixmarket.biz/show/4294910437/?div=mixkt_4294910437&r=' + escape(document.referrer) + '&rnd=' + Math.round(Math.random() * 100000) + '" charset="UTF-8"><' + '/scr' + 'ipt>');
</script>



<!-- разместите в самом конце страницы, перед тегом </body> -->
<script>
document.write('<scr' + 'ipt language="javascript" type="text/javascript" src="http://4294907498.kt.mixmarket.biz/show/4294907498/?div=mixkt_4294907498&r=' + escape(document.referrer) + '&rnd=' + Math.round(Math.random() * 100000) + '" charset="UTF-8"><' + '/scr' + 'ipt>');
</script>

         
         
    </body>
</html>
<?php
GeneralMYSQL::close($MSQLc);
if (UsersMyData::$id == 1) {
    ?><B><?PHP echo (round((microtime(1) - $start), 5)); ?></B><?php }
?>