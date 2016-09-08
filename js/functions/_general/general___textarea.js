var textarea_reg_login=0;
var textarea_reg_password=0;
var textarea_reg_mail=0;
var textarea_input_login=0;
var textarea_input_password=0;



var textarea_repassword_mail=0;
var textarea_repassword_mail_antibot=0;





var textarea_reg_antibot=0;


function general___regtextarea(id,what) {
	
 	if (what=='out')
	{ 
		if (id=='textarea_reg_login') {
		if ((textarea_reg_login==1)&&(document.getElementById('textarea_reg_login').value!="")) {document.getElementById(id).style.backgroundImage="none";}
		else if ((textarea_reg_login==1)&&(document.getElementById('textarea_reg_login').value=="")) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail2.png')";}		
		else if (document.getElementById('textarea_reg_login').value!="") {document.getElementById(id).style.backgroundImage="none";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail.png')";}
		}
		
		else if (id=='textarea_reg_password') {
		if ((textarea_reg_password==1)&&(document.getElementById('textarea_reg_password').value!="")) {document.getElementById(id).style.backgroundImage="none";}
		else if ((textarea_reg_password==1)&&(document.getElementById('textarea_reg_password').value=="")) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password2.png')";}	
		else if (document.getElementById('textarea_reg_password').value!="") {document.getElementById(id).style.backgroundImage="none";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password.png')";}
		}		
		
		else if (id=='textarea_reg_mail') {
		if ((textarea_reg_mail==1)&&(document.getElementById('textarea_reg_mail').value!="")) {document.getElementById(id).style.backgroundImage="none";}
		else if ((textarea_reg_mail==1)&&(document.getElementById('textarea_reg_mail').value=="")) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail2.png')";}	
		else if (document.getElementById('textarea_reg_mail').value!="") {document.getElementById(id).style.backgroundImage="none";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail.png')";}
		}	

		else if (id=='textarea_reg_antibot') {
		if ((textarea_reg_antibot==1)&&(document.getElementById('textarea_reg_antibot').value!="")) {document.getElementById(id).style.backgroundImage="none";}
		else if ((textarea_reg_antibot==1)&&(document.getElementById('textarea_reg_antibot').value=="")) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot2.png')";}	
		else if (document.getElementById('textarea_reg_antibot').value!="") {document.getElementById(id).style.backgroundImage="none";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot.png')";}
		}

	}
	
	
	
	 	if (what=='blur')
	{
		if (id=='textarea_reg_login') {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_login1.png')";
if (document.getElementById('textarea_reg_login').value!="") {document.getElementById(id).style.backgroundImage="none"; textarea_reg_login=0;}}
		else if (id=='textarea_reg_password') {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password.png')";
if (document.getElementById('textarea_reg_password').value!="") {document.getElementById(id).style.backgroundImage="none"; textarea_reg_password=0;} }
		else if (id=='textarea_reg_mail') {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail.png')";
if (document.getElementById('textarea_reg_mail').value!="") {document.getElementById(id).style.backgroundImage="none"; textarea_reg_mail=0;} }
		else if (id=='textarea_reg_antibot') {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot.png')";
if (document.getElementById('textarea_reg_antibot').value!="") {document.getElementById(id).style.backgroundImage="none"; textarea_reg_antibot=0;} }

	}
	


 	if (what=='keyup')
	{
		if (id=='textarea_reg_login'){ 		
		if (document.getElementById('textarea_reg_login').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else if (textarea_reg_login==1) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_login2.png')";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_login1.png')";}
		}
				
		if (id=='textarea_reg_password'){ 		
		if (document.getElementById('textarea_reg_password').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else if (textarea_reg_password==1) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password2.png')";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password.png')";}
		}	
				
		if (id=='textarea_reg_mail'){ 		
		if (document.getElementById('textarea_reg_mail').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else if (textarea_reg_mail==1) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail2.png')";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail.png')";}
		}
		
		if (id=='textarea_reg_antibot'){ 		
		if (document.getElementById('textarea_reg_antibot').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else if (textarea_reg_antibot==1) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot2.png')";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot.png')";}
		}		
			
	}


	if (what=='focus')
	{
		if (id=='textarea_reg_login') {
		
		
		if (document.getElementById('textarea_reg_login').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_login2.png')"; }		
		textarea_reg_login=1;
		textarea_reg_password=0;
		textarea_reg_mail=0;
		textarea_reg_antibot=0;
		}
		else if (id=='textarea_reg_password') {
		if (document.getElementById('textarea_reg_password').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password2.png')";}
		textarea_reg_login=0;
		textarea_reg_password=1;
		textarea_reg_mail=0;
		textarea_reg_antibot=0;
		}
		else if (id=='textarea_reg_mail') {
		if (document.getElementById('textarea_reg_mail').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail2.png')"; }
		textarea_reg_login=0;
		textarea_reg_password=0;
		textarea_reg_mail=1;
		textarea_reg_antibot=0;
		}
		else if (id=='textarea_reg_antibot') {
		if (document.getElementById('textarea_reg_antibot').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot2.png')";}
		textarea_reg_login=0;
		textarea_reg_password=0;
		textarea_reg_mail=0;
		textarea_reg_antibot=1;
		}

	}

}





function general___repasswordtextarea(id,what) {
 	if (what=='out')
	{		
		if (id=='textarea_repassword_mail') {
		if ((textarea_repassword_mail==1)&&(document.getElementById('textarea_repassword_mail').value!="")) {document.getElementById(id).style.backgroundImage="none";}
		else if ((textarea_repassword_mail==1)&&(document.getElementById('textarea_repassword_mail').value=="")) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail2.png')";}	
		else if (document.getElementById('textarea_repassword_mail').value!="") {document.getElementById(id).style.backgroundImage="none";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail.png')";}
		}	

		else if (id=='textarea_repassword_mail_antibot') {
		if ((textarea_repassword_mail_antibot==1)&&(document.getElementById('textarea_repassword_mail_antibot').value!="")) {document.getElementById(id).style.backgroundImage="none";}
		else if ((textarea_repassword_mail_antibot==1)&&(document.getElementById('textarea_repassword_mail_antibot').value=="")) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot2.png')";}	
		else if (document.getElementById('textarea_repassword_mail_antibot').value!="") {document.getElementById(id).style.backgroundImage="none";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot.png')";}
		}

	}
	
	
	
	 if (what=='blur')
	{
	if (id=='textarea_repassword_mail') {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail.png')";
if (document.getElementById('textarea_repassword_mail').value!="") {document.getElementById(id).style.backgroundImage="none"; textarea_repassword_mail=0;} }
		else if (id=='textarea_repassword_mail_antibot') {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot.png')";
if (document.getElementById('textarea_repassword_mail_antibot').value!="") {document.getElementById(id).style.backgroundImage="none"; textarea_repassword_mail_antibot=0;} }

	}
	


 	if (what=='keyup')
	{
		if (id=='textarea_repassword_mail'){ 		
		if (document.getElementById('textarea_repassword_mail').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else if (textarea_repassword_mail==1) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail2.png')";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail.png')";}
		}
		
		if (id=='textarea_repassword_mail_antibot'){ 		
		if (document.getElementById('textarea_repassword_mail_antibot').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else if (textarea_repassword_mail_antibot==1) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot2.png')";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot.png')";}
		}		
			
	}


	if (what=='focus')
	{

		if (id=='textarea_repassword_mail') {
		if (document.getElementById('textarea_repassword_mail').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_mail2.png')"; }
		textarea_repassword_mail=1;
		textarea_repassword_mail_antibot=0;
		}
		else if (id=='textarea_repassword_mail_antibot') {
		if (document.getElementById('textarea_repassword_mail_antibot').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/reg_antibot2.png')";}
		textarea_repassword_mail=0;
		textarea_repassword_mail_antibot=1;
		}

	}

}




function general___inputtextarea(id,what) {
	
 	if (what=='out')
	{ 
		if (id=='textarea_input_login') {
		if ((textarea_input_login==1)&&(document.getElementById('textarea_input_login').value!="")) {document.getElementById(id).style.backgroundImage="none";}
		else if ((textarea_input_login==1)&&(document.getElementById('textarea_input_login').value=="")) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_login2.png')";}		
		else if (document.getElementById('textarea_input_login').value!="") {document.getElementById(id).style.backgroundImage="none";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_login.png')";}
		}
		
		else if (id=='textarea_input_password') {
		if ((textarea_input_password==1)&&(document.getElementById('textarea_input_password').value!="")) {document.getElementById(id).style.backgroundImage="none";}
		else if ((textarea_input_password==1)&&(document.getElementById('textarea_input_password').value=="")) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password2.png')";}	
		else if (document.getElementById('textarea_input_password').value!="") {document.getElementById(id).style.backgroundImage="none";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password.png')";}
		}		
	}
	
	
	
	 	if (what=='blur')
	{
		if (id=='textarea_input_login') {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_login.png')";
if (document.getElementById('textarea_input_login').value!="") {document.getElementById(id).style.backgroundImage="none"; textarea_input_login=0;}}
		else if (id=='textarea_input_password') {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password.png')";
if (document.getElementById('textarea_input_password').value!="") {document.getElementById(id).style.backgroundImage="none"; textarea_input_password=0;} }

	}
	


 	if (what=='keyup')
	{
		if (id=='textarea_input_login'){ 		
		if (document.getElementById('textarea_input_login').value!="") {document.getElementById(id).style.backgroundImage="none"; document.getElementById('textarea_input_password').style.backgroundImage="none";} 
		else if (textarea_input_login==1) {
			document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_login2.png')";
		if (document.getElementById('textarea_input_password').value!="") {document.getElementById('textarea_input_password').style.backgroundImage="none";}
		else {document.getElementById('textarea_input_password').style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password2.png')";}}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_login.png')";}
		
		
		 
		
	
		}
				
		if (id=='textarea_input_password'){ 	
		if (document.getElementById('textarea_input_password').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else if (textarea_input_password==1) {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password2.png')";}
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password.png')";}
		}	
				

		

			
	}


	if (what=='focus')
	{
		if (id=='textarea_input_login') {
		
		
		if (document.getElementById('textarea_input_login').value!="") {document.getElementById(id).style.backgroundImage="none";} 
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_login2.png')"; }		
		textarea_input_login=1;
		textarea_input_password=1;


		}
		else if (id=='textarea_input_password') {
		if ((document.getElementById('textarea_input_password').value!="")||(document.getElementById('textarea_input_login').value!="")) {document.getElementById(id).style.backgroundImage="none";} 
		else {document.getElementById(id).style.backgroundImage="url('http://quitec.org/images/_general/textarea/input_password2.png')";}
		textarea_input_login=0;
		textarea_input_password=1;


		}


	}

}
