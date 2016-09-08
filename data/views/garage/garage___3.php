<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>   <?php include("data/components/_general/breadcrumbs.php"); ?><?php
GeneralPageBasic::increment_view($MSQLc,"garage","id='".GeneralGetVars::$var3."'",0,0,0,0);//плюс просмотр
if (UsersMyData::$identified!=1){
//    if (!$cache->start(GeneralGetVars::$urlview."main", 'Static')) {	
        include("data/views/garage/cache/garage___3_cached.php");
        
        // Останавливаем буферизацию и пишем буфер в файл
        //$cache->end(); 
    //}
}
else{
    include("data/views/garage/cache/garage___3_cached.php");
}

?>






<?php

/*

 if (!$cache2->start(GeneralGetVars::$urlview."down", 'Static')) { 
?>
	
<div class="padding_left_10 padding_right_20 content_dark">
<?php
GarageBase::$condition_added1=" themepage='".GeneralGetVars::$var2."' ";//условия выборки дополительных объявлений
GarageBase::convert_cookie_find_query($MSQLc);//если есть поиск, то запрос перезапишется в этой функции
if (GarageBase::$find_status==0) {//если нет поиска
if (GeneralGetVars::$var2==1) {
	GarageBase::$condition_added1.=" AND mark='".GarageBase::$mark."' ";
	if ((GarageBase::$model)&&(GarageBase::$mark==157)) {
		if ((GarageBase::$model=="2105")||(GarageBase::$model=="2105i")) {GarageBase::$condition_added1.="and (model='2105' OR model='2105i')";}
		else if ((GarageBase::$model=="2107")||(GarageBase::$model=="2107i")||(GarageBase::$model=="21074")||(GarageBase::$model=="21074i")) {GarageBase::$condition_added1.="and (model='2107' OR model='2107i' OR model='21074' OR model='21074i')";}
		else if ((GarageBase::$model=="2108")||(GarageBase::$model=="2108i")||(GarageBase::$model=="21083")||(GarageBase::$model=="21083i")) {GarageBase::$condition_added1.="and (model='2108' OR model='2108i' OR model='21083' OR model='21083i')";}	
		else if ((GarageBase::$model=="2109")||(GarageBase::$model=="2109i")||(GarageBase::$model=="21093")||(GarageBase::$model=="21093i")) {GarageBase::$condition_added1.="and (model='2109' OR model='2109i' OR model='21093' OR model='21093i')";}
		else if ((GarageBase::$model=="21099")||(GarageBase::$model=="21099i")) {GarageBase::$condition_added1.="and (model='21099' OR model='21099i')";}	
		else if ((GarageBase::$model=="21010")||(GarageBase::$model=="21010i")) {GarageBase::$condition_added1.="and (model='21010' OR model='21010i')";}	
		else if ((GarageBase::$model=="2114")||(GarageBase::$model=="21140")) {GarageBase::$condition_added1.="and (model='2114' OR model='21140')";}	
		else if ((GarageBase::$model=="priora")||(GarageBase::$model=="PRIORA")||(GarageBase::$model=="Priora")||(GarageBase::$model=="Приора")||(GarageBase::$model=="приора")||(GarageBase::$model=="ПРИОРА")) 		{GarageBase::$condition_added1.="and (model='priora' OR model='PRIORA' OR model='Priora' OR model='Приора' OR model='приора' OR model='ПРИОРА')";}
		else if ((GarageBase::$model=="калина")||(GarageBase::$model=="Калина")||(GarageBase::$model=="КАЛИНА")||(GarageBase::$model=="Kalina")||(GarageBase::$model=="kalina")||(GarageBase::$model=="KALINA")) 		{GarageBase::$condition_added1.="and (model='калина' OR model='Калина' OR model='КАЛИНА' OR model='Kalina' OR model='kalina' OR model='KALINA')";}
		//else {GarageBase::$condition_added1.="and model='".GarageBase::$model."'";}
		}}}
GarageBase::$condition_added2=" themepage='".GeneralGetVars::$var2."' ";//условия выборки дополительных объявлений

include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___3_added_announcements.php");?>



</div>
 <?php 
 // Останавливаем буферизацию и пишем буфер в файл
 $cache2->end(); 
} */?><div class="v_i_b"></div>	</div>

















       <!-- garage_photos -->
        <div id="garage_photos" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="garage_photosLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="garage_photosLabel"><?php echo(garageBase::return_parameters("mark", $row['mark'])." "); echo($row['model']);?></h3>
            </div>
            <div class="modal-body">


<div id="myCarousel_garage" class="carousel slide">
                <ol class="carousel-indicators">                
	<?php
	$current_var1=0;
	for($i=1; $i<=20; $i++){
		$varimg="img".$i;
		$varwidth="width".$i;
		$varheight="height".$i;	
		if (GarageBase::$$varimg){
		$current_var1++;
			?>
<li <?php if ($current_var1==1) {?>class="active"<?php } ?> data-target="#myCarousel_garage" data-slide-to="<?php echo($current_var1-1);?>" class=""></li>
            <?php } } ?> 
                </ol>
                <div class="carousel-inner">
   
	<?php
	$current_var1=0;
	for($i=1; $i<=20; $i++){
		$varimg="img".$i;
		$varwidth="width".$i;
		$varheight="height".$i;	
		if (garageBase::$$varimg){
		$current_var1++;
			?>

                  <div class="item <?php if ($current_var1==1) {?>active<?php } ?>">
                    <img src="http://140706.selcdn.com/tazteam/_files/images/garage/<?php echo($row['id']);?>/<?php echo(garageBase::$$varimg);?>" alt="" style="max-width: 550px; max-height:395px;">
                    <?php/*<div class="carousel-caption">
                      <h4>First Thumbnail label</h4>
                      <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                    </div>*/?>
                  </div>

            <?php } } ?>

                </div>
                <a class="left carousel-control" href="#myCarousel_garage" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel_garage" data-slide="next">›</a>
              </div>

            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Закрыть</button>
            </div>
        </div> 





