<?php
class GeneralUploadBasic{

static public $receptname;

static public function setreceptname(){
	self::$receptname=GeneralGlobalVars::$timeunix."_".rand(100, 999);
	if (GeneralGetVars::$var1){self::$receptname.="_".GeneralGetVars::$var1;}
	if (GeneralGetVars::$var2){self::$receptname.="_".GeneralGetVars::$var2;}	
	if (GeneralGetVars::$var3){self::$receptname.="_".GeneralGetVars::$var3;}	
	if (GeneralGetVars::$var4){self::$receptname.="_".GeneralGetVars::$var4;}}
	
static public function detectpathfile($type,$name,$flag){//устанавливаем реальный путь к файлу ($flag - нужно ли создавать папки для файла или нет)
	if ($type=="images") {$type="images";}
	else {$type="documents";}
	if (GeneralGetVars::$var1=="forum"){
		if ($flag==1){
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3,0777);}
		if ($name) {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3."/".$name;}
		else {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3;}}
		
	if (GeneralGetVars::$var1=="photo"){
		if ($flag==1){
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3,0777);}
		if ($name) {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3."/".$name;}
		else {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".GeneralGetVars::$var3;}}
			
	if (GeneralGetVars::$var1=="automarket"){
			if (AutomarketForreg::$status_announcement==1){
				$curvar=GeneralGetVars::$var3;}
			else if(AutomarketForreg::$status_announcement==2){
				$curvar=GeneralGetVars::$num_page;}
			else {
				$curvar=GeneralGetVars::$num_page;}	
		if ($flag==1){
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".$curvar,0777);}
		if ($name) {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".$curvar."/".$name;}
		else {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".$curvar;}}
	
    
    
    
    

	if (GeneralGetVars::$var1=="garage"){
			if (GarageForreg::$status_announcement==1){
				$curvar=GeneralGetVars::$var3;}
			else if(GarageForreg::$status_announcement==2){
				$curvar=GeneralGetVars::$num_page;}
			else {
				$curvar=GeneralGetVars::$num_page;}	
		if ($flag==1){
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".$curvar,0777);}
		if ($name) {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".$curvar."/".$name;}
		else {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".$curvar;}}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    		
			
	if ((GeneralGetVars::$var1=="news")||(GeneralGetVars::$var1=="articles")){
			if (NewsForreg::$status_news==1){
				$curvar=GeneralGetVars::$var2;}
			else if(NewsForreg::$status_news==2){
				$curvar=GeneralGetVars::$num_page;}
			else {
				$curvar=GeneralGetVars::$num_page;}	
		if ($flag==1){
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1,0777);


			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".$curvar,0777);}
		if ($name) {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".$curvar."/".$name;}
		else {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".$curvar;}}			












	if (GeneralGetVars::$var1=="tests"){
		if ($flag==1){
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2,0777);}
		if ($name) {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2."/".$name;}
		else {
			return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/".GeneralGetVars::$var2;}}









	if (GeneralGetVars::$var1=="users"){
		if ($flag==1){
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type,0777);
			@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1,0777);}
			
			if (GeneralGetVars::$var3=="redactavatar"){
					if ($flag==1){
				@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/avas/".UsersBase::return_dir_catalog(GeneralGetVars::$var2),0777);}
				if ($name) {
					return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/avas/".UsersBase::return_dir_catalog(GeneralGetVars::$var2)."/".$name;}
				else {
					return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/avas/".UsersBase::return_dir_catalog(GeneralGetVars::$var2);}}

			
					
			if ((GeneralGetVars::$var3=="photoalbums")||(GeneralGetVars::$var3=="allphotosinalbum")){
					if ($flag==1){
				@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/photoalbums/".UsersBase::return_dir_catalog(GeneralGetVars::$var2),0777);
				@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/photoalbums/".UsersBase::return_dir_catalog(GeneralGetVars::$var2)."/".GeneralGetVars::$var2,0777);
				@mkdir(GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/photoalbums/".UsersBase::return_dir_catalog(GeneralGetVars::$var2)."/".GeneralGetVars::$var2."/".GeneralGetVars::$var4,0777);}
				if ($name) {
					return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/photoalbums/".UsersBase::return_dir_catalog(GeneralGetVars::$var2)."/".GeneralGetVars::$var2."/".GeneralGetVars::$var4."/".$name;}
				else {
					return GeneralGlobalVars::pathtofiles."/".$type."/".GeneralGetVars::$var1."/photoalbums/".UsersBase::return_dir_catalog(GeneralGetVars::$var2)."/".GeneralGetVars::$var2."/".GeneralGetVars::$var4;}}
					
					

					
					







			
			}}

		
		
		
		
		
		
		
		
static public function loadto_reception($source,$nameinrecept){
	return copy($source,GeneralGlobalVars::pathtoreception."/".$nameinrecept);}
	



}
?>