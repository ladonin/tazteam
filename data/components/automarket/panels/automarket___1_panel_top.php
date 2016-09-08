<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left" width="270">	
	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td width="1%" class="padding_right_10">
		<?php echo(GeneralPagesCounter::$htmlarrows); ?>
	</td>
	<td align="left" class="padding_right_10">
		<?php if (UsersMyData::$identified==1) {//для зарегистрированных пользователей ?>	
		<a href="#new_announcement" data-toggle="modal" class="btn btn-success btn-small">новое&nbsp;объявление</a>  
         
         
         <?php/*type="button" onclick="general___swim_hide('swim_automarket_find_panel_autos');  general___swim_hide('swim_automarket_find_panel_else'); general___swim_hide('swim_automarket_find_panel_else_buy'); general___swim_show_hide('swim_new_announcement');">*/?>
		<?php GeneralImagesPreload::input("images/_general/general___new_announcement_submit_hover.png"); }
		else{?>
		<input value="новое объявление" class="btn btn-success btn-small disabled" type="button">
		<?php } ?>		
	</td>
    <td align="left" width="98%">
    	<a class="btn btn-info btn-small" onclick="general___swim_show_hide('swim_automarket_find_panel');">Поиск</a>
    </td>
	</tr>
	</table>
</td>
<td align="right" valign="bottom"><?php echo(GeneralPagesCounter::$htmlcode); ?></td>
</tr>
</table>

<div class="v_i_b"></div>




















<div class="v_i_b"></div>
<table cellpadding="0" cellspacing="0" width="100%">
<tr>
<td align="left">	
	<?php include("data/components/automarket/panels/find_buttons.php");?>
</td>
</tr>
</table>	
<div class="v_i_b"></div>





	
	
<?php
 if (AutomarketBase::$find_status==0) { ?>














 
<div style="float:left; padding-right:10px;">
	<?php if (AutomarketBase::$sort_by==1){ ?><span class="btn btn-inverse disabled">ВАЗ</span><?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_sort_by_taz"/>
		<input type="submit" value="ВАЗ" class="btn btn-info"/>
		</form>
	<?php } ?>
</div>
<div style="float:left; padding-right:10px;">
	<?php if (AutomarketBase::$sort_by==2){ ?>
		<span class="btn btn-inverse disabled">Другие марки</span>
	<?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_sort_by_auto"/>
		<input type="submit" value="Другие марки" class="btn btn-info"/>
		</form>		
	<?php } ?>
</div>
<div style="float:left; padding-right:10px;">
	<?php if (AutomarketBase::$sort_by==3){ ?>
		<span class="btn btn-inverse disabled">Автозапчасти и аксессуары</span>
	<?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_sort_by_else"/>
		<input type="submit" value="Автозапчасти и аксессуары" class="btn btn-info"/>
		</form>	
	<?php } ?>
</div>
<div style="float:left; padding-right:10px; padding-left:10px;">
	<?php if (AutomarketBase::$sort_by==4){ ?>
		<span class="btn btn-inverse disabled">Покупают</span>
	<?php }
	else { ?>
		<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_sort_by_buy"/>
		<input type="submit" value="Покупают" class="btn btn-info"/>
		</form>
	<?php } ?>
</div>



<div style="float:right; padding-left:10px;">
    <div class="btn-group">
    
    <button class="btn btn-info dropdown-toggle" data-toggle="dropdown">Сортировать по <span class="caret"></span></button>
    <ul class="dropdown-menu pull-right">

    <li style="text-align:left; padding:0 20px;">
       	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_date"/>
		<input type="hidden" name="order" value="1"/>     
		<input type="submit" value="дата размещения (по возрастанию)" class="btn btn-link btn-small"/>
		</form>
    </li>
    <li style="text-align:left; padding-left:20px;">
       	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_date"/>
		<input type="submit" value="дата размещения (по убыванию)" class="btn btn-link btn-small"/>
		<input type="hidden" name="order" value="2"/>
		</form>
    </li>
    
    
   
    
	<?php if ((AutomarketBase::$sort_by==1)||(AutomarketBase::$sort_by==2)||(AutomarketBase::$sort_by==3)){ ?>
    
    
    
    
    <li style="text-align:left; padding:0 20px;">
       	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_price"/>
		<input type="hidden" name="order" value="1"/>     
		<input type="submit" value="цена (по возрастанию)" class="btn btn-link btn-small"/>
		</form>
    </li>
    <li style="text-align:left; padding-left:20px;">
       	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_price"/>
		<input type="submit" value="цена (по убыванию)" class="btn btn-link btn-small"/>
		<input type="hidden" name="order" value="2"/>
		</form>
    </li>
    
    	<?php if ((AutomarketBase::$sort_by==1)||(AutomarketBase::$sort_by==2)){ ?>
    <li style="text-align:left; padding:0 20px;">
       	<form method="post"  action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_year"/>
		<input type="hidden" name="order" value="1"/>     
		<input type="submit" value="год выпуска (по возрастанию)" class="btn btn-link btn-small"/>
		</form>
    </li>
    <li style="text-align:left; padding-left:20px;">
       	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_year"/>
		<input type="submit" value="год выпуска (по убыванию)" class="btn btn-link btn-small"/>
		<input type="hidden" name="order" value="2"/>
		</form>
    </li>    
    
    
    <li style="text-align:left; padding:0 20px;">
       	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_run"/>
		<input type="hidden" name="order" value="1"/>     
		<input type="submit" value="пробег (по возрастанию)" class="btn btn-link btn-small"/>
		</form>
    </li>
    <li style="text-align:left; padding-left:20px;">
       	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_run"/>
		<input type="submit" value="пробег (по убыванию)" class="btn btn-link btn-small"/>
		<input type="hidden" name="order" value="2"/>
		</form>
    </li> 
    
    
    
    
    
    
    <li style="text-align:left; padding:0 20px;">
       	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_power"/>
		<input type="hidden" name="order" value="1"/>     
		<input type="submit" value="мощность (по возрастанию)" class="btn btn-link btn-small"/>
		</form>
    </li>
    <li style="text-align:left; padding-left:20px;">
       	<form method="post" action="<?php echo(GeneralGetVars::$urltosubmit);?>">
		<input type="hidden" name="submit" value="automarket_order_by_power"/>
		<input type="submit" value="мощность (по убыванию)" class="btn btn-link btn-small"/>
		<input type="hidden" name="order" value="2"/>
		</form>
    </li> 
    
    
   	<?php } } ?>
    
    
    </ul>
    </div>
</div>






<div style="clear:both;"></div>
<div class="v_i_b"></div>
<?php } ?>	









