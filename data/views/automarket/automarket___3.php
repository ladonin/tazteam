<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
     class="boxShadow3"
     ><?php
         include("data/components/_general/breadcrumbs.php");




         GeneralPageBasic::increment_view($MSQLc, "automarket", "id='" . GeneralGetVars::$var3 . "'", 0, 0, 0, 0); //плюс просмотр
         if (UsersMyData::$identified != 1) {//если пользователь изменит страницу, чтобы он видел изменения
             //if (!$cache->start(GeneralGetVars::$urlview . "main", 'Static')) {
                 include("data/views/automarket/cache/automarket___3_cached.php");

                 // Останавливаем буферизацию и пишем буфер в файл
                // $cache->end();
             //}
         } else {
             include("data/views/automarket/cache/automarket___3_cached.php");
         }
         ?>
    <div class="v_i_b"></div>
</div>


<div style="float: left; overflow:hidden; width:888px; margin-top:20px; margin-bottom:0px; padding-top:20px; padding-bottom:0px;"
     class="boxShadow3"
     >
<?php
//if (!$cache2->start(GeneralGetVars::$urlview . "down", 'Static')) {

    AutomarketBase::$condition_added1 = " themepage='" . GeneralGetVars::$var2 . "' "; //условия выборки дополительных объявлений
    AutomarketBase::convert_cookie_find_query($MSQLc); //если есть поиск, то запрос перезапишется в этой функции
    if (AutomarketBase::$find_status == 0) {//если нет поиска
        if (GeneralGetVars::$var2 == 1) {
            AutomarketBase::$condition_added1.=" AND mark='" . AutomarketBase::$mark . "' ";
            if ((AutomarketBase::$model) && (AutomarketBase::$mark == 157)) {
                if ((AutomarketBase::$model == "2105") || (AutomarketBase::$model == "2105i")) {
                    AutomarketBase::$condition_added1.="and (model='2105' OR model='2105i')";
                } else if ((AutomarketBase::$model == "2107") || (AutomarketBase::$model == "2107i") || (AutomarketBase::$model == "21074") || (AutomarketBase::$model == "21074i")) {
                    AutomarketBase::$condition_added1.="and (model='2107' OR model='2107i' OR model='21074' OR model='21074i')";
                } else if ((AutomarketBase::$model == "2108") || (AutomarketBase::$model == "2108i") || (AutomarketBase::$model == "21083") || (AutomarketBase::$model == "21083i")) {
                    AutomarketBase::$condition_added1.="and (model='2108' OR model='2108i' OR model='21083' OR model='21083i')";
                } else if ((AutomarketBase::$model == "2109") || (AutomarketBase::$model == "2109i") || (AutomarketBase::$model == "21093") || (AutomarketBase::$model == "21093i")) {
                    AutomarketBase::$condition_added1.="and (model='2109' OR model='2109i' OR model='21093' OR model='21093i')";
                } else if ((AutomarketBase::$model == "21099") || (AutomarketBase::$model == "21099i")) {
                    AutomarketBase::$condition_added1.="and (model='21099' OR model='21099i')";
                } else if ((AutomarketBase::$model == "21010") || (AutomarketBase::$model == "21010i")) {
                    AutomarketBase::$condition_added1.="and (model='21010' OR model='21010i')";
                } else if ((AutomarketBase::$model == "2114") || (AutomarketBase::$model == "21140")) {
                    AutomarketBase::$condition_added1.="and (model='2114' OR model='21140')";
                } else if ((AutomarketBase::$model == "priora") || (AutomarketBase::$model == "PRIORA") || (AutomarketBase::$model == "Priora") || (AutomarketBase::$model == "Приора") || (AutomarketBase::$model == "приора") || (AutomarketBase::$model == "ПРИОРА")) {
                    AutomarketBase::$condition_added1.="and (model='priora' OR model='PRIORA' OR model='Priora' OR model='Приора' OR model='приора' OR model='ПРИОРА')";
                } else if ((AutomarketBase::$model == "калина") || (AutomarketBase::$model == "Калина") || (AutomarketBase::$model == "КАЛИНА") || (AutomarketBase::$model == "Kalina") || (AutomarketBase::$model == "kalina") || (AutomarketBase::$model == "KALINA")) {
                    AutomarketBase::$condition_added1.="and (model='калина' OR model='Калина' OR model='КАЛИНА' OR model='Kalina' OR model='kalina' OR model='KALINA')";
                }
                //else {AutomarketBase::$condition_added1.="and model='".AutomarketBase::$model."'";}
            }
        }
    }
    AutomarketBase::$condition_added2 = " themepage='" . GeneralGetVars::$var2 . "' "; //условия выборки дополительных объявлений

    include("data/components/automarket/automarket___3_added_announcements.php");
    ?>



    <?php
    // Останавливаем буферизацию и пишем буфер в файл
//    $cache2->end();
//}
?>

</div>



<?php /*
          <!-- automarket_photos -->
          <div id="automarket_photos" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="automarket_photosLabel" aria-hidden="true">
          <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h3 id="automarket_photosLabel"><?php echo(AutomarketBase::return_parameters("mark", $row['mark'])." "); echo($row['model']);?></h3>
          </div>
          <div class="modal-body">
















          <div id="myCarousel_automarket" class="carousel slide">
          <ol class="carousel-indicators">

          <?php
          $current_var1=0;
          for($i=1; $i<=20; $i++){
          $varimg="img".$i;
          $varwidth="width ".$i;
          $varheight="height".$i;
          if (AutomarketBase::$$varimg){
          $current_var1++;
          ?>
          <li class="<?php if ($current_var1==1) {?>active<?php } ?>" data-target="#myCarousel_automarket" data-slide-to="<?php echo($current_var1-1);?>"></li>

          <?php } } ?>

          </ol>
          <div class="carousel-inner">

          <?php
          $current_var1=0;
          for($i= 1; $i<=2 0; $i++){
          $varimg="img".$i;
          $varwidth="width".$i;
          $varheight="height".$i;
          if (AutomarketBase::$$varimg){
          $current_var1++;
          ?>

          <div class="item <?php if ($current_var1==1) {?>active<?php } ?>">
          <img src="http://140706.selcdn.ru/tazteam/images/automarket/<?php echo($row['id']);?>/<?php echo(AutomarketBase::$$varimg);?>" alt="" style="max-width: 550px; max-height:395px;">

          </div>

          <?php } } ?>

          </div>
          <a class="left carousel-control" href="#myCarousel_automarket" data-slide="prev">‹</a>
          <a class="right carousel-control" href="#myCarousel_automarket" data-slide="next">›</a>
          </div>

          </div>
          <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
          </div>
          </div>

         */  ?>
 









































