<?php
include("data/components/index/index___tests_1_query_1.php");
$row = GeneralMYSQL::fetch_array($res);
?>

<div style="padding-left:10px;"> 
    <p class="lead">Тест на знания ПДД</p>
</div>


<div class="padding_left_10 padding_right_20">

    <table cellpadding="0" cellspacing="0" width="640">
        <tr>
            <td valign="top" align="left" bgcolor="#ffffff">
                <?php if ($row['photo'] == 1) { ?>



                    <a href="http://mapstore.org/my_portfolio/tazteam.net/tests/1=<?php echo($row['id']); ?>">
                        <img src="http://140706.selcdn.com/tazteam/_files/images/tests/1/<?php echo($row['id']); ?>.jpg" height="200" class="img-rounded"/>
                    </a><div class="v_i_b"></div><?php } ?>

                <div class="well">


                    <?php echo($row['ask']); ?>
                </div>

            </td>
        </tr>
        <tr>
            <td valign="top" align="left">


                <?php
                $cv1 = $row['rightanswer'];
                $cv4 = $row['legend'];
                if ($row['answer1']) {
                    $cv2 = 1;
                    $cv3 = $row['answer1'];
                    include("data/components/tests/tests___3_ask.php");
                }

                if ($row['answer2']) {
                    $cv2 = 2;
                    $cv3 = $row['answer2'];
                    include("data/components/tests/tests___3_ask.php");
                }

                if ($row['answer3']) {
                    $cv2 = 3;
                    $cv3 = $row['answer3'];
                    include("data/components/tests/tests___3_ask.php");
                }

                if ($row['answer4']) {
                    $cv2 = 4;
                    $cv3 = $row['answer4'];
                    include("data/components/tests/tests___3_ask.php");
                }
                ?>
            </td>
        </tr>
    </table>
</div>
<div style="clear:both"></div>