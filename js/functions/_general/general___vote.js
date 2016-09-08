var vote_polar=0;
var vote_rank=0;









function general___vote_ajax(abrev_page,getvar1,getvar2,getvar3,getvar4,getnumpage,id_photo)	{
	//text = text.replace(/\+/g,'%2B'); //����������� �����, ����� �������� �� ��� �����, � �� ��� �����������
	//vote_rank - ������� ����
	if (vote_polar!=0){
		if (vote_polar>0) {document.getElementById('vote_rank').innerHTML=Number(vote_rank)+1;}
		else if ((vote_polar<0)&&(vote_rank>0)) {document.getElementById('vote_rank').innerHTML=Number(vote_rank)-1;}
		$.post(
			"http://mapstore.org/my_portfolio/tazteam.net/data/components/_general/vote/vote_set_ajax.php",
			{
				'rank':vote_rank,
				'polar':vote_polar,
				'getvar1':getvar1,
				'getvar2':getvar2,
				'getvar3':getvar3,
				'getvar4':getvar4,
				'getnumpage':getnumpage,
				'idphoto':id_photo,
				'abrev_page':abrev_page
			},
			function(responseText){
				vote_polar=-vote_polar;//������ ���������� ����� ����������� ��� ������ ������
				if (vote_polar>0){
					vote_rank--;
					document.getElementById('vote_finger_div').className = 'vote_plus';
					}
				else if (vote_polar<0){
					vote_rank++;
					//document.getElementById('vote_finger_div').className = 'vote_minus';
					}
				//alert(responseText);
			});}}

