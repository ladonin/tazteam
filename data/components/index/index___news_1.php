<?php
include("data/components/index/index___news_query_1.php");
NewsBase::detect_first_photo($row['img']); //вычисляем первое фото
?>	
<div class="padding_left_10 padding_right_<?php echo($current_var3); ?>">

    <a href="http://instorage.org/portfolio/tazteam/<?php echo($current_var2); ?>/<?php echo($row['id']); ?>"
       class="lead"><?php
           echo($row['name']);
           ?></a>
    <div class="v_i_b"></div>
    <?php if (NewsBase::$img1_cur) { ?>
        <div style="float:left; margin:0px 10px 5px 0px"><a href="http://instorage.org/portfolio/tazteam/<?php echo($current_var2); ?>/<?php echo($row['id']); ?>"><img src="http://140706.selcdn.com/tazteam/_files/images/<?php echo($current_var2); ?>/<?php echo($row['id']); ?>/<?php echo(NewsBase::return_size_to_photo(NewsBase::$img1_cur, 2)); ?>" width="100" height="100" class="img-rounded"></a></div>
    <?php } ?>

    <p>
        <small>
            <?php echo($row['contentnacked']); ?>...<a href="http://instorage.org/portfolio/tazteam/<?php echo($current_var2); ?>/<?php echo($row['id']); ?>" class="link_normal">читать далее</a>
        </small>	</p>


</div>









