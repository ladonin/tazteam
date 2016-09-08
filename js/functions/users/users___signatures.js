


function users___signatures_detect_ajax(get_var1,get_var2,get_var3,get_var4,num_page)	{
	$.post(
	"http://instorage.org/portfolio/tazteam/data/components/users/signatures/signatures_detect_ajax.php?get_var1="+get_var1+"&get_var2="+get_var2+"&get_var3="+get_var3+"&get_var4="+get_var4+"&num_page="+num_page,{	}, 
	function(responseText){
	alert(responseText);	
		//users___signatures_show(responseText);

	});}