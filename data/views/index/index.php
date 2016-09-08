<script type="text/javascript">
    window_width = 640;
    width_left_panel = 0;
    window_site_body_width = window_width;
</script>



<?php //if (!$cache->start("index_left_head1", 'Static')) {  ?> 




<div style="float: left; overflow:hidden; width:186px;  height:300px; margin-top:20px;"
     class="boxShadow3"
     >
    <div style="float: left; padding:10px 0;">
    
     <p class="lead"><a href="http://instorage.org/portfolio/tazteam/users" title="Топ участников">Топ участников</a></p>

        <div style="float: left; padding-top:1px;">
            <?php
            $current_var1 = '0,3';
            $current_var2 = " gen_photo!=0 AND id_user NOT IN (155,2397) "; //AND gen_sex='2'
            include("data/components/index/index___top_users.php");
            ?>  
        </div>  
    </div>
</div>



<div style="float: left; overflow:hidden; width:642px; margin-left:20px; margin-top:20px; height:300px;"
     class="boxShadow3"
     >
    <div style="float: left; padding:10px 0;">
    <p class="lead"><a href="http://instorage.org/portfolio/tazteam/photo/2=1" title="Лучшие фото">Лучшие фото</a></p>
        <?php
        $current_var1 = "rank DESC, RAND()";
        $current_var2 = 6;
        $current_var3 = "";
        include("data/components/index/index___photos_top_1.php");
        ?>
    </div>
</div>







<div style="clear: both;"></div>

<div style="float: left; overflow:hidden; width:186px; margin-top:20px; height:705px;"
     class="boxShadow3"
     >
    <div style="float: left; padding-top:10px;">
        <p class="lead">Эксперты</p>
        <?php
        $current_var1 = '8';
        $current_var2 = " gen_photo!=0 "; //AND gen_sex='2'
        include("data/components/index/index___experts_users_1.php");
        ?></div>
</div>









<div style="float: left; overflow:hidden; width:300px; margin-left:20px; margin-right:20px; margin-top:20px;  height:705px;"
     class="boxShadow3"

     >
    <div style="float: left; overflow:hidden; width:300px; height:685px; padding-top:10px;">
        <p class="lead"><a href="http://instorage.org/portfolio/tazteam/articles" title="статьи">Статьи</a>

            <a>/</a>

            <a href="http://instorage.org/portfolio/tazteam/news" title="новости">Новости</a>


        </p>
        <?php
        $current_var1 = "themepage='1' OR themepage='2'";
        $current_var2 = " id DESC ";
        $current_var3 = 16;
        include("data/components/index/index___articles_1.php");
        ?></div>
</div>





<div style="float: left; overflow:hidden; width:282px; margin-top:20px;  height:705px;"
     class="boxShadow3"
     ><div style="float: left; padding-top:10px;">
        <p class="lead"><a href="http://instorage.org/portfolio/tazteam/automarket" title="авторынок">Авторынок</a></p>
        <?php
        $current_var1 = 1;
        //$current_var2=" WHERE themepage='".$current_var1."' AND mark='157' AND photo='1' ";
        $current_var2 = " WHERE photo='1' AND themepage='1' ";
        $current_var3 = 6;
        $current_var4 = "";
        include("data/components/index/index___automarket_1.php");
        ?>
    </div>
</div>
<div style="clear: both;"></div>


<?php
// Останавливаем буферизацию и пишем буфер в файл
//$cache->end(); 
//}
?>        





<div style="float: left; width:546px; margin-right:20px; margin-top:20px;  padding-top:20px; width:546px; min-height: 560px;"
     class="boxShadow3"
     ><div style="float: left;    width:546px;">
             <?php
             GeneralDialogWindows::$height = "495px"; //высота диалогового окна
             GeneralDialogWindows::$getvar1 = 0;
             GeneralDialogWindows::$getvar2 = 0;
             GeneralDialogWindows::$getvar3 = 0;
             GeneralDialogWindows::$getvar4 = 0;
             GeneralDialogWindows::$num_page = 0;
             GeneralDialogWindows::$signaturing = "mc";
             GeneralDialogWindows::$idphoto = 0;
             GeneralDialogWindows::$type = 1; //2 -  открывающийся чат
             GeneralDialogWindows::$padding_right = 0;
             GeneralDialogWindows::$id_dialog = "main_page_1"; //3 - вложенность страницы (а еще это её тип), 1 - номер диалога (у нас он первый) 
             GeneralDialogWindows::$database = "index___chat"; //база данных диалога
             GeneralDialogWindows::$textforpanel = "Написать";
             GeneralDialogWindows::$namedialog = "Чат";
             //GeneralDialogWindows::$condition1="user=1";//условие 1 для базы данных
             GeneralDialogWindows::$valuesnumber = 4; //сколько value делаем	
             GeneralDialogWindows::$idmessage = 1; //где будет номер сообщения
             GeneralDialogWindows::$autor = 2; //какую value делаем автором при вставке
             GeneralDialogWindows::$textvalue = 4; //где будет текст
             GeneralDialogWindows::$time = 3; //какую value делаем временем создания сообщения	при вставке
             GeneralDialogWindows::$value1 = ""; //значение для вставки
             GeneralDialogWindows::$value2 = ""; //значение для вставки
             GeneralDialogWindows::$value3 = ""; //значение для вставки - потом вставим
             GeneralDialogWindows::$value4 = ""; //значение для вставки - потом вставим
             GeneralDialogWindows::$value5 = ""; //значение для вставки - потом вставим
             include("data/components/_general/dialog_windows/dialog_windows_1.php"); //сам диалог
             ?></div>
</div>










<div style="float: left; overflow:hidden; width:282px; margin-top:20px; "
     class="boxShadow3"
     >
    <div style="float: left; overflow:hidden; width:282px;  padding:10px 0;   height: 550px;">
        <p class="lead"><a href="http://instorage.org/portfolio/tazteam/forum" title="форум">Форум</a></p>
        <?php
        $current_var1 = 12;
        include("data/components/index/index___forum_1.php");
        ?>
    </div>
</div>













<div style="clear: both;"></div>











