<div 

id="swim_automarket_find_panel" class="<?php
 if (AutomarketBase::$find_status==0) { ?>
swim_panel 
<?php } ?>well">


                <div class="tabbable"> <!-- Only required for left/right tabs -->
                    <ul class="nav nav-tabs">
                        <li style="float:left; padding-top:10px; padding-right:10px;">                      
                            Поиск
                        </li>
                        <li class="active"><a href="#automarket_find_tab3" data-toggle="tab">Автомобили</a></li>
                        <li><a href="#automarket_find_tab1" data-toggle="tab">Запчасти&nbsp;и&nbsp;аксессуары</a></li>
                        <li><a href="#automarket_find_tab2" data-toggle="tab">Покупают</a></li>


<?php if (AutomarketBase::$find_status==1){?>
                        <li>
                        
	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>" style="margin-top: 8px;">
	<input name="submit" value="clearfindautomarket" type="hidden">
	<input value="очистить поиск" class="btn btn-warning btn-mini" type="submit">	
	</form>	
                        
                        </li>

<?php } ?>


                    </ul>
                    <div class="v_i_b"></div>
                    <div class="tab-content">
                        <div class="tab-pane active" id="automarket_find_tab3">
                            <div><?php include("data/components/automarket/panels/panel_find_auto.php");?>
                            </div> </div>
                        <div class="tab-pane" id="automarket_find_tab1">
                            <div><?php include("data/components/automarket/panels/panel_find_else.php");?>
                            </div> </div>
                        <div class="tab-pane" id="automarket_find_tab2">
                            <div><?php include("data/components/automarket/panels/panel_find_else_buy.php");?>
                            </div> 
                        </div>
                    </div>
                </div>


</div>


