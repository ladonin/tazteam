<script type="text/javascript">


//$.cookie('window_width', $(window).width(), {expires: 5,path: '/'});





</script>

<?php

if ((isset($_COOKIE['window_width']))&&(!1)){

if ($_COOKIE['window_width']>1366){

GeneralPageBasic::$page_size_reclamatype=2;//рекламу справа можно показать
?>
<script type="text/javascript">
widthcorrect=20+1+160;//отступ граница и сама ширина
window_width-=widthcorrect;//отступ граница и сама ширина
window_site_body_width-=widthcorrect;//отступ граница и сама ширина
</script>

<?php





}

}


?>