
        
       
<a class="link_pagecounter_light black" onclick="tests___choose('test_answer<?php echo($cv2);?>');">
<?php echo($cv3); ?>
</a>






<div id="test_answer<?php echo($cv2);?>"  style="display:none;" class="padding_right_10">
    <table cellpadding="0" cellspacing="0" width="100%">
    <tr>
    <td align="left" width="17">
    
    </td>
    <td align="left"><div class="v_i_b"></div><small>
    <?php if ($cv1==$cv2) { ?><span class="label label-success"><?php echo("Это правильный ответ!"); ?></span><?php }
    else { ?><span class="label label-important"><?php echo("Неправильный ответ!"); ?></span><?php } ?>
    <?php echo($cv4); ?></small>
    </td>
    </tr>
    </table>
</div>







<div class="v_i_b"></div>
