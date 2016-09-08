







<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
>






<?php

include("data/components/".GeneralGetVars::$var1."/".GeneralGetVars::$var1."___1_query_1.php");
while ($row=GeneralMYSQL::fetch_array($res))
{
    if ((($row['id_section']>=1)&&($row['id_section']<=5))||($row['id_section']==9999)){
        ForumBase::$array_sections[1][]=$row;
    }
    else if (($row['id_section']>=6)&&($row['id_section']<=10)){
        ForumBase::$array_sections[2][]=$row;
    }
    else if (($row['id_section']>=11)&&($row['id_section']<=16)){
        ForumBase::$array_sections[3][]=$row;
    }
    else if (($row['id_section']>=17)&&($row['id_section']<=20)){
        ForumBase::$array_sections[4][]=$row;
    }
    else if (($row['id_section']>=21)&&($row['id_section']<=23)){
        ForumBase::$array_sections[5][]=$row;
    }   
}

//print_r(ForumBase::$array_sections);
GeneralMYSQL::free($res);








?>
<div>
<span class="lead">Форум - общие темы</span><div class="v_i_b"></div></div>
<div class="well">
<?php
include("data/components/forum/forum___1_section_head.php");

foreach(ForumBase::$array_sections[1] as $row){
    include("data/components/forum/forum___1_section.php");
}
?>
</div>

<?php /*

<div class="v_i_b"></div>
<div class="padding_left_20">
<span class="lead">Ремонт автомобиля</span><div class="v_i_b"></div></div>
<div class="well">
<?php
include("data/components/forum/forum___1_section_head.php");

foreach(ForumBase::$array_sections[2] as $row){    
    include("data/components/forum/forum___1_section.php");    
}
?>
</div>


<div class="v_i_b"></div>
<div class="padding_left_20">
<span class="lead">Эксплуатация автомобиля</span><div class="v_i_b"></div></div>
<div class="well">
<?php
include("data/components/forum/forum___1_section_head.php");
foreach(ForumBase::$array_sections[3] as $row){    
    include("data/components/forum/forum___1_section.php");    
}
?>
</div><div class="v_i_b"></div>
<div class="padding_left_20">
<span class="lead">Куплю/Продам</span><div class="v_i_b"></div></div>
<div class="well">
<?php
include("data/components/forum/forum___1_section_head.php");
foreach(ForumBase::$array_sections[4] as $row){    
    include("data/components/forum/forum___1_section.php");    
}
?>
</div>
<div class="v_i_b"></div>
<div class="padding_left_20">
<span class="lead">Рестайлинг</span><div class="v_i_b"></div></div>
<div class="well">
<?php
include("data/components/forum/forum___1_section_head.php");
foreach(ForumBase::$array_sections[5] as $row){    
    include("data/components/forum/forum___1_section.php");    
}
?>
</div>
*/?>



<?php



?>
</div>