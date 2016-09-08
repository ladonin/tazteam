<div style="float: left; overflow:hidden; width:888px; margin-top:20px; padding-top:20px;"
class="boxShadow3"
><?php include("data/components/_general/breadcrumbs.php"); ?><?php
TestsBase::detect_themepage();

GeneralPagesCounter::calculate($MSQLc, "tests","themepage='".TestsBase::$themepage."'",0,0,0,0,GeneralGetVars::$var1."/".GeneralGetVars::$var2);
GeneralPagesCounter::imagespreload();
?>

	<table cellpadding="0" cellspacing="0" width="100%">
	<tr>
	<td align="left">
		<table cellpadding="0" cellspacing="0" width="100%">
		<tr>
		<td width="1">
			<?php echo(GeneralPagesCounter::$htmlarrows); ?>
		</td>
		</tr>
		</table>
	</td>
	<td align="right" valign="middle">
		<?php echo(GeneralPagesCounter::$htmlcode); ?>
	</td>
	</tr>
	</table>

<div class="v_i_b"></div>

<?php


include("data/components/tests/tests___3_query_1.php");
while($row=GeneralMYSQL::fetch_array($res)) {



    /*	tests.id as id,
	tests.themepage as themepage,
	tests.ask as ask,
	tests.answer1 as answer1,
	tests.answer2 as answer2,
	tests.answer3 as answer3,
	tests.answer4 as answer4,
	tests.rightanswer as rightanswer,
	tests.legend as legend,
	tests.photo as photo,*/


?>


	<table cellpadding="0" cellspacing="0" style="width:100%;">
	<tr>
	<td align="center">
        <div class="v_i_b"></div>
        <?php echo(GeneralPageTree::$title);?>
        <div class="v_i_b"></div>
        <a href="http://mapstore.org/my_portfolio/tazteam.net/<?php
        echo(GeneralGetVars::$var1."/".GeneralGetVars::$var2."=");

        echo(rand(1,GeneralGlobalVars::count_tests));
        /*
        if (GeneralGetVars::$num_page==GeneralPagesCounter::$N_max){
            echo(1);
        }
        else {
            echo(GeneralGetVars::$num_page+1);
        }*/
        ?>">
                <?php if ($row['photo']==1) { ?>
        		  <img src="http://140706.selcdn.com/tazteam/_files/images/tests/<?php echo(GeneralGetVars::$var2."/".GeneralGetVars::$num_page);?>.jpg" height="200" class="refimage"/>
                <?php }
                else { ?>
        		  <img src="http://140706.selcdn.com/tazteam/_files/images/tests/none.jpg" height="200" class="refimage"/>
                <?php } ?>
        </a>

	</td>
    </tr>
	<tr>
	<td align="left">
<?PHP /*
        <div class="v_i_b"></div>
        <table cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
        <tr>
        <td valign="middle" align="left">

            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- ����� ������� -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:15px"
                 data-ad-client="ca-pub-2975914903311715"
                 data-ad-slot="2278521952"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

        </td>
        </tr>
        </table>
        */?>
        <div class="padding_left_5">
            <div class="v_i_b"></div>
            <span class="lead"><?php echo($row['ask']);?></span>
            <div class="v_i_b"></div>
            <div class="v_i_b"></div>
        </div>

	</td>
    </tr>
    <tr>
    <td align="left">
        <div class="padding_left_5">
        <?php
        $cv1=$row['rightanswer'];
        $cv4=$row['legend'];
        if ($row['answer1']) {
            $cv2=1;
            $cv3=$row['answer1'];
            include("data/components/tests/tests___3_ask.php");
        }

        if ($row['answer2']) {
            $cv2=2;
            $cv3=$row['answer2'];
            include("data/components/tests/tests___3_ask.php");
        }

        if ($row['answer3']) {
            $cv2=3;
            $cv3=$row['answer3'];
            include("data/components/tests/tests___3_ask.php");
        }

        if ($row['answer4']) {
            $cv2=4;
            $cv3=$row['answer4'];
            include("data/components/tests/tests___3_ask.php");
        }
        ?>
        </div>
	</td>
	</tr>
	</table>
<?php }

GeneralMYSQL::free($res);

GeneralPagesCounter::clearvars();


/*


?>





	<table cellpadding="0" cellspacing="0">
	<tr>
	<td align="center" height="100">
<div class="v_i_b"></div>



<div id="mixkt_4294917820"></div>



<script>
document.write('<scr' + 'ipt language="javascript" type="text/javascript" src="http://4294917820.kt.mixmarket.biz/show/4294917820/?div=mixkt_4294917820&r=' + escape(document.referrer) + '&rnd=' + Math.round(Math.random() * 100000) + '" charset="UTF-8"><' + '/scr' + 'ipt>');
</script>



	</td>
	</tr>
	</table>
<?php */ ?>



















<?php /*
<div class="v_i_b"></div>


		<table cellpadding="0" cellspacing="0" width="928">
		<tr>
		<td align="left" bgcolor="#ffffff">

            <div class="padding_left_10">

            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- footer1 -->
            <ins class="adsbygoogle"
                 style="display:inline-block;width:728px;height:90px"
                 data-ad-client="ca-pub-2975914903311715"
                 data-ad-slot="8591467872"></ins>
            <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
            </script></div>

		</td>
		</tr>
		</table>
        */ ?></div>