var speedscroll=100;

	
function general___scroll_body(number) {
	if (number==1){number=100000;}
	else if (number==2){number=0;}
	jQuery('html,body').animate({"scrollTop": number}, speedscroll);} 
	
	
	
function general___scroll_object(id,number) {
	if (number==1){number=100000;}
	else if (number==2){number=0;}
	jQuery('#'+id).animate({"scrollTop": number}, speedscroll);} 
	
	
	
	
function general___scroll_comparating(number) {
	number=$('html,body').scrollTop()+number;
	jQuery('html,body').animate({"scrollTop": number}, speedscroll);} 	
	
	
	