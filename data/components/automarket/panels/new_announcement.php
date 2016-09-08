            <!-- new_announcement automarket -->
            <div id="new_announcement" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="new_announcementLabel" aria-hidden="true">
            
<form method="post" 
		action="http://instorage.org/portfolio/tazteam/submit.php?get_var1=automarket" 
		enctype="multipart/form-data">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3 id="new_announcementLabel">Новое объявление</h3>
                </div>
                <div class="modal-body">

		<div class="link_lead">	Продам:</div>
	    <div class="v_i_s"></div>
		<input type="radio" style="margin-bottom:8px;" name="themepage" id="automarket_radio_themepage1" value="1" checked="checked"> <span style="cursor:pointer;" onclick="document.getElementById('automarket_radio_themepage1').checked='ckecked';">Автомобиль</span>

		<input type="radio" style="margin-bottom:8px; margin-left:10px;" name="themepage" id="automarket_radio_themepage2" value="2"> <span style="cursor:pointer;" onclick="document.getElementById('automarket_radio_themepage2').checked='ckecked';">Автозапчасти и аксессуары</span>

		<div class="v_i_b"></div>
		<input type="radio" style="margin-bottom:8px;" name="themepage" id="automarket_radio_themepage3" value="3"> <span style="cursor:pointer;" class="link_lead " onclick="document.getElementById('automarket_radio_themepage3').checked='ckecked';">Куплю</span>
		<input name="submit" value="detectthemepagefornewautomarket" type="hidden">

	
                </div>
                <div class="modal-footer">
                    <input value="Далее" class="btn btn-success btn-small" type="submit">
                </div>
                
               </form>
            </div> 