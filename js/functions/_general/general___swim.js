var speedfade=0;
var hat_width_critical=1;
var flag_hat_width_big=0;

function general___swim_alert(text) {
	alert(text);}
	

 


function general___swim_prompt(text,word) {//запрос на подтверждение
	var my_text;
	my_text = prompt(text);
	if (my_text==word){
		return true;}
	return false;}


function general___swim_novisible(id) {
	$("#"+id).hide();}
	
function general___swim_hide(id) {
	$("#"+id).fadeOut(speedfade);}

	
	
function general___swim_show(id) {
	$("#"+id).fadeIn(speedfade);}	
	
	
	
function general___hat_menu_close(id) {
	general___swim_hide(id);
	$('#'+id+'_button').removeClass('active');
}	
	
	
	
	
	
function general___hat_menu_close_all(id) {
	if(id!="q_hat_breadcrumb"){
		general___hat_menu_close('q_hat_breadcrumb');
	}
	
	if(id!="q_hat_market"){
		general___hat_menu_close('q_hat_market');
	}
    
	if(id!="q_hat_see"){
		general___hat_menu_close('q_hat_see');
	}   
    
	if(id!="q_hat_read"){
		general___hat_menu_close('q_hat_read');
	} 
    
	if(id!="q_hat_talk"){
		general___hat_menu_close('q_hat_talk');
	}
    
	if(id!="q_hat_else"){
		general___hat_menu_close('q_hat_else');
	}
    
	if(id!="q_hat_user"){
		general___hat_menu_close('q_hat_user');
	}
    
    
	//...
	
}
	
	
	
function general___hat_menu_detect_view() {
	if ($(window).width()>hat_width_critical){	
		$("#q_hat_market_dropwown").css("display", "none");
		$("#q_hat_see_dropwown").css("display", "none");
		$("#q_hat_read_dropwown").css("display", "none");
		$("#q_hat_talk_dropwown").css("display", "none");        
		$("#q_hat_else_dropwown").css("display", "none");        
		$("#q_hat_user_dropwown").css("display", "none");       
        
        
        
        
		flag_hat_width_big=1;
		//...
	}
	else{
		$("#q_hat_market").css("display", "none");
		$("#q_hat_see").css("display", "none");
		$("#q_hat_read").css("display", "none");
		$("#q_hat_talk").css("display", "none");
		$("#q_hat_else").css("display", "none");
		$("#q_hat_user").css("display", "none");
   
        $("body").css("padding-top", "0");
        $('#navbar_hat').removeClass('navbar-fixed-top');

		//...
	}
   
}
	
	
	
	
	
	
	
	
	
	
	
	
function general___hat_menu_toggle(id) {
	general___hat_menu_close_all(id);
	if ((flag_hat_width_big==1)||(id=='q_hat_breadcrumb')){
		general___swim_show_hide(id); 
		$('#'+id+'_button').toggleClass('active');
	}
}	
	
	
function general___swim_show_hide(id) {
	if ($("#"+id).is(":visible")) {$("#"+id).fadeOut(speedfade);}
	else {$("#"+id).fadeIn(speedfade);}}
	
	
	
	
	
